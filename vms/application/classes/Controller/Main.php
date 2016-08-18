<?php
class Controller_Main extends Controller_Render{

	protected $_layout = 'layouts/main';
	
	protected $_checkLogin = TRUE;
	
	public function action_index() {
		
		$privileges = Business::factory('Privilege')->getPrivilegesByAccountId(Author::accountId());
		$this->_layout->content = View::factory('main/index')
			->bind('privileges', $privileges);
	}
}