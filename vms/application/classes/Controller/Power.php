<?php
/**
 * 访问权限限制提示页
 * @date 2016-05-12
 * @author quanhengzhe <[quanhengzhe@gomeplus.com]>
 */
class Controller_Power extends Controller {
	
	static public $errors = '';
	static public $code = 0;
	static public $time = 3;
	static public $redirect = '';
	
	public function action_index() {
		self::$code = json_decode(urldecode($_GET['message']),true)['code'];
		self::$errors = json_decode(urldecode($_GET['message']),true)['message'];
		self::$redirect = '/'.json_decode(urldecode($_GET['message']),true)['data']['controller'].'/list';
		
		$layout = View::factory('layouts/power');
		$layout->content = View::factory('power/power')
			->set('error', self::$errors)
			->set('code', self::$code)
			->set('redirect', self::$redirect)
			->set('time', self::$time);
		$this->response->body($layout->render());
	}
}