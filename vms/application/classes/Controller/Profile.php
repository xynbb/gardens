<?php

class Controller_Profile extends Controller_Render {

	protected $_layout = 'layouts/default';
	protected $_checkLogin = TRUE;

	public function action_index() {
		$this->_layout->content = View::factory('profile/index');
	}

	public function action_edit() {
		$accountId = Author::instance()->accountId();
		
		$account = Business::factory('Account')->getAccountByAccountId($accountId);
		if ($account->count() == 0) {
			return Misc::message('帐号不存在', 'account/list');
		}
		$account = $account->current();
		
		$this->_layout->content = View::factory('profile/edit')
				->bind('account', $account);
	}

	public function action_password() {
		$accountId = Author::instance()->accountId();
		
		$account = Business::factory('Account')->getAccountByAccountId($accountId);
		if ($account->count() == 0) {
			return Misc::message('帐号不存在', 'account/list');
		}
		$account = $account->current();

		$this->_layout->content = View::factory('profile/password')
				->bind('account', $account);
	}

	public function action_modify() {
		$this->_contentType = 'application/json';
		$account = array(
				'account_id' => Arr::get($_POST, 'account_id', ''),
				'given_name' => Arr::get($_POST, 'given_name', ''),
				'email' => Arr::get($_POST, 'email', ''),
				'mobile' => Arr::get($_POST, 'mobile', ''),
				'phone' => Arr::get($_POST, 'phone', ''),
		);
	
		$errors = array();
		try {
			$accountId = Author::instance()->accountId();
			if ($accountId != $account['account_id']) {
				return $this->failed('只能修改自己的资料');
			}
			$result = Business::factory('Account')->updateInfo($account);
			if (!$result) {
				return $this->failed('修改我的资料 ' . $account['account_id'] . ' 失败');
			}

			Logger::write('修改我的资料 ' . $account['account_id'] . ' 成功');
			return $this->success('修改我的资料成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}
	}

	public function action_savepassword() {
		$this->_contentType = 'application/json';
		$account = array(
				'account_id' => Arr::get($_POST, 'account_id', ''),
				'oldpassword' => Arr::get($_POST, 'oldpassword', ''),
				'password' => Arr::get($_POST, 'password', ''),
				'repassword' => Arr::get($_POST, 'repassword', ''),
		);
	
		$errors = array();
		try {
			$accountId = Author::instance()->accountId();
			if ($accountId != $account['account_id']) {
				return $this->failed('只能修改自己的资料');
			}
			$result = Business::factory('Account')->updatePassword($account);
			if (!$result) {
				return $this->failed('修改我的密码 ' . $account['account_id'] . ' 失败');
			}

			Logger::write('修改我的密码 ' . $account['account_id'] . ' 成功');
			return $this->success('修改我的密码成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}
	}
}
