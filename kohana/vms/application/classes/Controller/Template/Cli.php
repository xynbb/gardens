<?php
class Controller_Template_Cli extends Controller {
	
	public function before() {
	}
	
	public function execute() {
		// Execute the "before action" method
		$this->before();
		
		// Determine the action to use
		$action = 'action_'.$this->request->action();
		
		// If the action doesn't exist, it's a 404
		if ( ! method_exists($this, $action))
		{
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
	}
	
	public function after() {
	}
}