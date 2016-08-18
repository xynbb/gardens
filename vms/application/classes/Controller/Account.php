<?php

class Controller_Account extends Controller_Render {

	protected $_layout = 'layouts/account';
	protected $_checkLogin = TRUE;

	public function action_index() {
		Controller::redirect('account/list');
	}

	/**
	 * 帐号列表
	 */
	public function action_list() {
		$keyword = Arr::get($_GET, 'keyword', '');
		$page = Arr::get($_GET, 'page', 0);
		$size = 20;

		$pagination = Business::factory('Account')->getPagination($keyword, $page, $size);
		$accounts = Business::factory('Account')->getAccountByKeyword($keyword, $pagination->number, $pagination->offset);

		$this->_layout->content = View::factory('account/list')
			->set('accounts', $accounts)
			->set('pagination', $pagination);
	}

	/**
	 * 添加帐号
	 */
	public function action_add() {
		$departments = Business::factory('Department')->getDepartmentsArray();
		$roles = Business::factory('Role')->getRoles();
		

		$this->_layout->content = View::factory('account/form')
			->bind('account', $account)
			->bind('accountDepartments', $accountDepartments)
			->bind('accountRoles', $accountRoles)
			->set('departments', $departments)
			->set('roles', $roles);
	}
	/**
	 * 修改帐号
	 */
	public function action_edit() {
		$accountId = Arr::get($_GET, 'account_id', 0);
		$account = Business::factory('Account')->getAccountByAccountId($accountId);
		if ($account->count() == 0) {
			return Misc::message('帐号不存在', 'account/list');
		}
		$account = $account->current();
		$accountDepartments = Business::factory('Account')->getAccountDepartments($accountId);
		$accountRoles = Business::factory('Account')->getAccountRoles($accountId);
		$departments = Business::factory('Department')->getDepartmentsArray();
		$roles = Business::factory('Role')->getRoles();

		$this->_layout->content = View::factory('account/form')
			->bind('account', $account)
			->bind('accountDepartments', $accountDepartments)
			->bind('accountRoles', $accountRoles)
			->set('departments', $departments)
			->set('roles', $roles);
	}

	/**
	 * 新增保存
	 */
	public function action_save() {
		$this->_contentType = 'application/json';
		$account = array(
		    'given_name' => Arr::get($_POST, 'given_name', ''),
		    'name' => Arr::get($_POST, 'name', ''),
		    'password' => trim(Arr::get($_POST, 'password', '')),
		    'email' => Arr::get($_POST, 'email', ''),
		    'mobile' => Arr::get($_POST, 'mobile', ''),
		    'phone' => Arr::get($_POST, 'phone', ''),
		    'department_ids' => Arr::get($_POST, 'department_ids', array()),
		    'role_ids' => Arr::get($_POST, 'role_ids', array())
		);
		$errors = array();
		if(!$account['password']) {
			$this->failed('请输入密码');
			return;
		}
		try {
			$result = Business::factory('Account')->create($account);
			if (!$result) {
				return $this->failed('添加帐号失败');
			}
			Logger::write('添加帐号成功');
			return $this->success('添加帐号成功');

		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}
	}

	/**
	 * 修改保存
	 */
	public function action_modify() {
		$this->_contentType = 'application/json';
		$accountId = Arr::get($_POST, 'account_id', 0);
		$account = array(
		    'account_id' => $accountId,
		    'given_name' => Arr::get($_POST, 'given_name', ''),
		    'name' => Arr::get($_POST, 'name', ''),
		    'password' => Arr::get($_POST, 'password', ''),
		    'email' => Arr::get($_POST, 'email', ''),
		    'mobile' => Arr::get($_POST, 'mobile', ''),
		    'phone' => Arr::get($_POST, 'phone', ''),
		);
		$departmentIds = Arr::get($_POST, 'department_ids', array());
		$roleIds = Arr::get($_POST, 'role_ids', array());
		$errors = array();
		try {
			$result = Business::factory('Account')->update($account);
			if (!$result) {
				$errors[] = '修改帐号 ' . $accountId . ' 失败';
			}

			$result = Business::factory('Account')->updateDepartments($accountId, $departmentIds);
			if (!$result) {
				$errors[] = '修改帐号部门 ' . $accountId . ' 失败';
			}

			$result = Business::factory('Account')->updateRoles($accountId, $roleIds);
			if (!$result) {
				$errors[] = '修改帐号角色 ' . $accountId . ' 失败';
			}
			if ($errors) {
				return $this->failed(implode(' ',$errors));
			}
			Logger::write('修改帐号 ' . $accountId . ' 成功');
			return $this->success('修改帐号成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}
		
	}

	/**
	 * 屏蔽帐号
	 */
	public function action_delete() {
		$this->_contentType = 'application/json';
		$accountId = Arr::get($_GET, 'account_id', 0);
		$account = Business::factory('Account')->getAccountByAccountId($accountId);
		$errors = array();

		if ($account->count() == 0) {
			return Misc::message('帐号不存在', 'account/list');
		}

		try {
			$result = Business::factory('Account')->delete($accountId);
			if (!$result) {
				$errors[] = '屏蔽帐号 ' . $accountId . ' 失败';
			}
			if ($errors) {
				return $this->failed(implode("\t", $errors));
			}
			Logger::write('屏蔽帐号 ' . $accountId . ' 成功');
			return $this->success('屏蔽帐号成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}
	}

	/**
	 * 恢复帐号
	 */
	public function action_renormal() {
		$this->_contentType = 'application/json';
		$accountId = Arr::get($_GET, 'account_id', 0);
		$errors = array();
		$account = Business::factory('Account')->getAccountByAccountId($accountId);
		if ($account->count() == 0) {
			return Misc::message('帐号不存在', 'account/list');
		}

		try {
			$result = Business::factory('Account')->renormal($accountId);
			if (!$result) {
				return $this->failed('恢复帐号 ' . $accountId . ' 失败');
			}
			
			Logger::write('恢复帐号 ' . $accountId . ' 成功');
			return $this->success('恢复帐号成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}
	}
}
