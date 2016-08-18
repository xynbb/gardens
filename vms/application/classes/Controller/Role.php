<?php

/**
 * GVS角色业务层
 */
class Controller_Role extends Controller_Render {

	protected $_layout = 'layouts/role';
	protected $_checkLogin = TRUE;

	/**
	 * 显示已创建角色列表
	 */
	public function action_index() {
		return Controller::redirect('role/list');
	}

	/**
	 * 根据部门查看角色
	 */
	public function action_list() {
		//--获取当前所有部门列表
		$departments = Business::factory('Department')->getDepartments();
		//--获取所有角色列表
		$roles = Business::factory('Role')->getRoles();
		//--获取所有角色对应的部门信息
		
		$this->_layout->content = View::factory('role/list')
			->bind('roles', $roles)
			->set('departments', $departments);
	}

	/**
	 * 创建角色页面
	 */
	public function action_add() {
		//--获取当前所有部门列表
		$departments = Business::factory('Department')->getDepartmentsArray();
		//--获取所有角色对应的部门信息
		$this->_layout->content = View::factory('role/form')
			->bind('role', $role)
			->set('departments', $departments);
	}

	/**
	 * 添加角色信息
	 */
	public function action_save() {
		$this->_contentType = 'application/json';
		$name = Arr::get($_POST, 'name');
		$departmentId = Arr::get($_POST, 'department_id');
		$role = array(
		    'name' => $name,
		    'department_id' => $departmentId,
		);
		//--错误信息数组
		$errors = array();
		try {
			$result = Business::factory('Role')->create($role);
			if (!$result[0]) {
				return $this->failed('添加角色失败');
			}

			Logger::write('添加角色 ' . $result[0] . ' 成功');
			return $this->success('添加成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}
		
	}

	/**
	 * 修改角色页面
	 * @param number roleId
	 */
	public function action_edit() {
		$roleId = Arr::get($_GET, 'role_id', 0);
		if (!$roleId) {
			return Misc::message('参数错误');
		}
		$role = Business::factory('Role')->getRoleByRoleId($roleId);
		if ($role->count() == 0) {
			return Misc::message('角色不存在', URL::site('role/list'));
		}
		$role = $role->current();
		//--获取部门信息
		$departments = Business::factory('Department')->getDepartmentsArray();
		
		$this->_layout->content = View::factory('role/form')
			->bind('role', $role)
			->set('departments', $departments);
	}

	/**
	 * 更新角色信息
	 * @param number roleId
	 */
	public function action_modify() {
		$this->_contentType = 'application/json';
		$role = array(
		    'role_id' => Arr::get($_POST, 'role_id', 0),
		    'name' => Arr::get($_POST, 'name', ''),
		    'department_id' => Arr::get($_POST, 'department_id', 0)
		);
		$errors = array();
		try {
			$result = Business::factory('Role')->update($role);
			if (!$result) {
				return $this->failed('修改角色 ' . $role['role_id'] . ' 失败');
			}
			
			Logger::write('修改角色 ' . $role['role_id'] . ' 成功');
			return $this->success('修改角色成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}
	}

	/**
	 * 删除一个角色
	 * 当此角色下面有关联用户时 不能删除此角色
	 * 需要删除角色权限表
	 * 需要重置角色下所属用户角色
	 * @param int roleId
	 * @return json
	 */
	public function action_delete() {
		$this->_contentType = 'application/json';
		$roleId = Arr::get($_GET, 'role_id', 0);
		$errors = array();
		try {
			$result = Business::factory('Role')->delete($roleId);
			if (!$result) {
				return $this->failed('删除角色 ' . $roleId . ' 失败');
			}
			
			Logger::write('删除角色 ' . $roleId . ' 成功');
			return $this->success('删除角色成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}
		
	}

	/**
	 * 角色帐号列表
	 */
	public function action_members() {
		$roleId = Arr::get($_GET, 'role_id', 0);
		$accounts = Business::factory('Account')->getAccountsByRoleId($roleId);

		if (!$accounts) {
			return Misc::warning('该角色暂无成员！');
		}
		
		$this->_layout->content = View::factory('role/members')
			->set('accounts', $accounts);
	}

	/**
	 * 角色赋予权限
	 */
	public function action_privilege() {
		$roleId = Arr::get($_GET, 'role_id', 0);

		if (!$roleId) {
			return Misc::message('参数有误', URL::site('role/list'));
		}

		$role = Business::factory('Role')->getRoleByRoleId($roleId);
		if ($role->count() == 0) {
			return Misc::message('未找到记录', URL::site('role/list'));
		}
		$role = $role->current();
		$systems = Business::factory('System')->getSystems();
		$navigators = Business::factory('Privilege')->getNavigators();
		$menus = Business::factory('Privilege')->getMenus();
		$controllers = Business::factory('Privilege')->getControllers();
		
		$privileges = Business::factory('Role')->getPrivilegesByRoleId($role->getRoleId());
		
		$systemId = $systems->current()->getSystemId();
		
		$this->_layout->content = View::factory('role/privilege')
			->bind('privileges', $privileges)
			->set('role', $role)
			->set('systems', $systems)
			->set('navigators', $navigators)
			->set('menus', $menus)
			->set('controllers', $controllers)
			->set('systemId', $systemId);
	}

	/**
	 * 赋予权限
	 */
	public function action_grant() {
		$this->_contentType = 'application/json';
		$roleId = Arr::get($_GET, 'role_id', 0);
		$privilegeIds = Arr::get($_POST, 'privilege_ids', '');
		$privilegeIds = explode(',', $privilegeIds);

		$errors = array();
		try {
			$result = Business::factory('Role')->grant($roleId, $privilegeIds);
			if (!$result[0]) {
				return $this->failed('赋予权限 ' . $roleId . ' 失败');
			}
			
			Logger::write('赋予权限 ' . $roleId . ' 成功');
			return $this->success('赋予权限成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}
	}

	/**
	 * 收回权限
	 */
	public function action_revoke() {
		$this->_contentType = 'application/json';
		$roleId = Arr::get($_GET, 'role_id', 0);
		$privilegeIds = Arr::get($_POST, 'privilege_ids', '');
		$privilegeIds = explode(',', $privilegeIds);

		$errors = array();
		try {
			$result = Business::factory('Role')->revoke($roleId, $privilegeIds);
			if (!$result) {
				return $this->failed('收回权限 ' . $roleId . ' 失败');
			}
			
			Logger::write('收回权限 ' . $roleId . ' 成功');
			return $this->success('收回权限成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}
	}
}
