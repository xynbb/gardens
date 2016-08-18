<?php
 /**
 * 部门管理控制器
 */ 
class Controller_Department extends Controller_Render {

	protected $_layout = 'layouts/department';
	
	protected $_checkLogin = TRUE;
	
	public function action_index() {
		return Controller::redirect('department/list');
	}

	/**
	 * 部门列表
	 */
	public function action_list() {

		$departments = Business::factory('Department')->getDepartments();
		$this->_layout->content = View::factory('department/list')
			->set('departments', $departments);
	}

	/**
	 * 添加
	 */
	public function action_add() {
		return Misc::message('不需要添加部门！<br/>美信员工使用邮箱登陆后会自动创建部门。', 'department/list');
		$departments = Business::factory('Department')->getDepartments();

		$this->_layout->content = View::factory('department/form')
			->bind('department', $department)
			->set('departments', $departments);
	}

	/**
	 * 添加保存,暂不会使用
	 */
	public function action_save() {
		$this->_contentType = 'application/json';
		return $this->success('不需要添加部门!');
		
		$this->_contentType = 'application/json';
		$department = array(
				'name' => Arr::get($_POST, 'name', ''),
				'parent_id' => Arr::get($_POST, 'parent_id', 0),
				'sequence' => Arr::get($_POST, 'sequence', 0),
		);
		
		$errors = array();
		try {
			$result = Business::factory('Department')->create($department);
			if(!$result[0]) {
				return $this->failed('添加部门失败');
			}

			Logger::write('添加部门 '.$result[0].' 成功');
			return $this->success('添加部门成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}		
	}

	/**
	 * 修改
	 */	
	public function action_edit() {
		$departmentId = Arr::get($_GET, 'department_id', 0);
		
		$department = Business::factory('Department')->getDepartmentByDepartmentId($departmentId);
		if($department->count() == 0) {
			return Misc::message('部门不存在', 'department/list');
		}
		$department = $department->current();
		$departments = Business::factory('Department')->getDepartmentsArray();
		$this->_layout->content = View::factory('department/form')
			->bind('department', $department)
			->set('departments', $departments);
	}
	
	/**
	 * 保存修改
	 */
	 public function action_modify() {
		$this->_contentType = 'application/json';
		$department = array(
				'department_id' => Arr::get($_POST, 'department_id', 0),
				'name' => Arr::get($_POST, 'name', ''),
				'sequence' => Arr::get($_POST, 'sequence', 0),
				'parent_id' => Arr::get($_POST, 'parent_id', 0),
		);
		
		$errors = array();
		try {
			$result = Business::factory('Department')->update($department);
			if(!$result) {
				return $this->failed('修改部门 '.$department['department_id'].' 失败');
			}

			Logger::write('修改部门 '.$department['department_id'].' 成功');
			return $this->success('修改部门成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}
	}

	/**
	 * 删除部门
	 */
	public function action_delete() {
		$this->_contentType = 'application/json';
		$departmentId = Arr::get($_GET, 'department_id', 0);
		
		$errors = array();
		try {
			$result = Business::factory('Department')->delete($departmentId);
			if(!$result) {
				return $this->failed('删除部门 '.$departmentId.' 失败');
			}

			Logger::write('删除部门 '.$departmentId.' 成功');
			return $this->success('删除部门成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}
	}

	/**
	 * 删除部门中的帐号
	 */
	public function action_deleteAccount() {
		$this->_contentType = 'application/json';
		$accountId = Arr::get($_GET, 'account_id', 0);
		$departmentId = Arr::get($_GET, 'department_id', 0);
		
		$errors = array();
		try {
			$result = Business::factory('Department')->deleteAccount($departmentId, $accountId);
			if(!$result) {
				return $this->failed('删除部门中的帐号 '.$departmentId.' '.$accountId.' 失败');
			}

			Logger::write('删除部门中的帐号 '.$departmentId.' '.$accountId.' 成功');
			return $this->success('删除部门中的帐号成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}		
	}

	/**
	 * 部门成员列表
	 */
	public function action_members() {
		$departmentId = Arr::get($_GET, 'department_id');
		$accounts = Business::factory('Department')->getAccountsByDepartmentId($departmentId);
		if(!$accounts) {
			return Misc::warning('该部门暂无成员！');
		}
		$this->_layout->content = View::factory('department/members')
			->set('accounts', $accounts)
			->set('departmentId', $departmentId);
	}
}
