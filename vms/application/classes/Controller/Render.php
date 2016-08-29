<?php
class Controller_Render extends Controller {

	protected $_layout = 'layout/default';
	
	protected $_checkLogin = FALSE;
	
	protected $_autoRender = TRUE;
	
	protected $_contentType = 'text/html';	// text/html, text/xml, application/json
	
	protected $_jsonp = NULL;
	
	protected $_errors = array();
	
	protected $_data = array();
	
	protected $_message = '';
	
	protected $_code = 1;
	
	public function before() {
		parent::before();
		
		if($this->_autoRender === TRUE) {
			if($this->_contentType == 'text/html') {
				$this->_layout = View::factory($this->_layout);
			}
		}
	}
	
	public function execute() {
		try{
			// Execute the "before action" method
			$this->before();
			//Author::instance()->isLogin();
			if($this->_checkLogin) {
				if(!Author::instance()->isLogin()) {
					// throw new Login_Exception('Not logged in.');
					Controller::redirect('/author');
				}
				if(!ACL::access($this->request->controller(), $this->request->action())) {
					$body = array(
						'code' => 0,
						'message' => '无权访问',
						'data' => $this->_data = array(
							'controller' => $this->request->controller(),
							'action' => $this->request->action()
							)
					);
					if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

						Logger::write('/'.$this->request->controller().'/'.$this->request->action().'-'.$body['message']);

						if($this->_jsonp) {
							$body = $this->_jsonp .'('. json_encode($body) .');';
						} else {
							$body = json_encode($body);
						}

						return $this->response->body($body);
					} else {

						return Controller::redirect('/power?message='.urlencode(json_encode($body)));
					}
				}
			}

			// Determine the action to use
			$action = 'action_'.$this->request->action();

			// If the action doesn't exist, it's a 404
			if ( ! method_exists($this, $action)) {
				throw HTTP_Exception::factory(404,
						'The requested URL :uri was not found on this server.',
						array(':uri' => $this->request->uri())
				)->request($this->request);
			}

			// Execute the action itself
			$this->{$action}();

			// Execute the "after action" method
			$this->after();

			// Return the response
			return $this->response;
		} catch (Throwable $ex) {
			echo $ex->getMessage();
		}
	}
	
	public function after() {
		if($this->_autoRender === TRUE) {
			
			$this->response->headers('Content-type', $this->_contentType);
			
			$body = array(
				'code' => $this->_code,
				'message' => $this->_message,
				'data' => $this->_data
			);
			
			if($this->_contentType == 'text/html') {
				$body = $this->_layout->render();
			}
			
			if($this->_contentType == 'text/xml') {
				$body = XMLHelper::arrayToXML($body);
			}
			
			if($this->_contentType == 'application/json') {
				if($this->_jsonp) {
					$body = $this->_jsonp .'('. json_encode($body) .');';
				} else {
					$body = json_encode($body);
				}
			}
			
			$this->response->body($body);
		}
	
		parent::after();
	}
	
	public function failed($message = '') {
		$this->_code = 0;
		$this->_message = $message;
		$this->_data = $this->_errors;
	}
	
	public function success($message = '') {
		$this->_code = 1;
		$this->_message = $message;
		$this->_errors = array();
	}
}
