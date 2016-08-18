<?php
class Controller_Author extends Controller {
	
	protected $_layout = 'layouts/login';
	
	public function action_index() {
		$content = View::factory($this->_layout)->render();
		$this->response->body($content);
	}

	public function action_login() {
		$name = Arr::get($_POST, 'name', '');
		$password = Arr::get($_POST, 'password', '');
		$loginResult = Business::factory('Author')->login($name, $password);
		if($loginResult === TRUE) {
			return Controller::redirect('/');
		} elseif($loginResult === FALSE) {
			return Misc::message('登录失败，请使用邮箱前缀和密码登录', 'author');
		} else {
			return Misc::message($loginResult, 'author');
		}
	}
	
	public function action_logout() {
		$logoutResult = Business::factory('Author')->logout();
		if($logoutResult === TRUE) {
			Controller::redirect('/');
		} else {
			Misc::message($logoutResult, 'author');
		}
	}
}
