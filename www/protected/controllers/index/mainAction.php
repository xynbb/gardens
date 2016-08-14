<?php
class mainAction extends Action {

	public $needLogin = false;
    public function run(){
		$login = array();

		if($this->_isPost())
		{
		    $username 	= Yii::app()->request->getParam('username' , '');//加密后唯一串
		    $passwd 	= Yii::app()->request->getParam('passwd' , '');//加密后唯一串
		    
			if(empty($username)) $this->error('账户不能为空！','/');
			
			if(empty($passwd)) $this->error('密码不能为空！','/');
			
			$login = rbac_userModel::getInstance()->login($username,$passwd);

			if($login === '-1')
			{
				$this->error('账户不存在！','/');
			}
			
			if($login === '-2')
			{
				$this->error('账户被禁用！','/');
			}
			
			if($login === '-3')
			{
				$this->error('密码错误！','/');
			}			
			
			header('Location:/');
        }

		if($this->isLogin)
		{

			$this->checkLogin();
			
			$this->view('main');
		}
		else
		{
			$this->view('login');
		}
    }
}