<?php

/**
 * GVS角色逻辑层
 * 
 */
class Business_Role extends Business {

	/**
	 * 创建角色
	 * @param array $values
	 * @return array
	 */
	public function create(array $values) {
		$fields = array(
		    'name' => '',
		    'department_id' => '',
		    'create_time' => time(),
		    'update_time' => time()
		);

		$name = Arr::get($values, 'name');
		$departmentId = Arr::get($values, 'department_id');
		$errors = array();
		if (!$name) {
			$errors[] = '角色名称不能为空 ';
		}
		if (!$departmentId) {
			$errors[] = '部门不能为空 ';
		}
		$role = Dao::factory('Role')->getRoleByRoleNameAndDepartmentId($departmentId,$name)->current();

		if ($role) {
			$errors[] = '部门 '.$departmentId.' 下已存在 '.$name.' 角色';
		}
		if ($errors) {
			throw new Business_Exception(implode(' ', $errors));
		}

		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;
		
		return Dao::factory('Role')->insert($values);
	}

	/**
	 * 更新角色信息
	 * 需要同时更新角色与用户的关系表
	 * @param array $values
	 * @return integer
	 */
	public function update(array $values) {
		$fields = array(
		    'name' => '',
		    'department_id' => 0,
		    'update_time' => time()
		);
		$roleId = Arr::get($values, 'role_id');
		$name = Arr::get($values, 'name');
		$departmentId = Arr::get($values, 'department_id');

		$errors = array();
		if (!$name) {
			$errors[] = '角色名称不能为空！';
		}
		if (!$departmentId) {
			$errors[] = '部门不能为空！';
		}
		$role = Dao::factory('Role')->getRoleByRoleNameAndDepartmentId($departmentId,$name)->current();

		if ($role) {
			$errors[] = '部门 '.$departmentId.' 下已存在 '.$name.' 角色';
		}
		if ($errors) {
			throw new Business_Exception(implode(' ', $errors));
		}

		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;
		
		return Dao::factory('Role')->updateByRoleId($roleId, $values);
	}

	/**
	 * 获取全部角色
	 * @param integer $number
	 * @param integer $offset
	 * @return array
	 */
	public function getRoles($number = 0, $offset = 0) {
		return Dao::factory('Role')->getRoles($number, $offset);
	}

	/**
	 * 删除一个角色
	 * 当此角色下面有关联用户时 不能删除此角色
	 * 需要删除角色权限表
	 * @param integer $roleId
	 * @return integer
	 */
	public function delete($roleId = 0) {
		$errors = array();
		if (!$roleId) {
			$errors[] = '参数错误';
		}
		//1、系统管理员 2、资源管理员 3、普通用户
		if ($roleId == 1 || $roleId == 2 || $roleId == 3) {
			$errors[] = '系统内置角色不能删除';
		}
		//获取此角色下所有有效账号
		$accountRoles = Dao::factory('Account_Role')->getAccountRolesByRoleId($roleId);
		if (count($accountRoles)) {
			$errors [] = '角色下已有账号 无法删除 请联系管理员';
		}
		if ($errors) {
			throw new Business_Exception(implode(' ', $errors));
		}
		//删除关联的角色权限
		$rolePrivileges = Dao::factory('Role_Privilege')->getRolePrivilegesByRoleId($roleId);
		$rolePrivilegeIds = array();
		foreach ($rolePrivileges as $rolePrivilege) {
			$rolePrivilegeIds [] = Arr::get($rolePrivilege, 'privilege_id');
		}
		$rolePrivilegeDelete = Dao::factory('Role_Privilege')->batchDelete($roleId, $rolePrivilegeIds);
		if (!$rolePrivilegeDelete) {
			$errors [] = '删除角色权限失败';
		}
		if ($errors) {
			throw new Business_Exception(implode(' ', $errors));
		}
		return Dao::factory('Role')->delete($roleId);
	}

	/**
	 * 根据id获取角色信息
	 * @param integer $roleId
	 * @return array
	 */
	public function getRoleByRoleId($roleId = 0) {
		return Dao_Role::factory('Role')->getRoleByRoleId($roleId);
	}

	/**
	 * 角色权限赋予
	 * @param integer $roleId
	 * @param array $privilegeIds
	 * @return array
	 */
	public function grant($roleId, array $privilegeIds = array()) {
		$role = Dao::factory('Role')->getRoleByRoleId($roleId);
		if (count($role) == 0) {
			throw new Business_Exception('角色不存在');
		}

		$values = array();
		foreach ($privilegeIds as $privilegeId) {
			$values[] = array(
			    'role_id' => $roleId,
			    'privilege_id' => $privilegeId,
			    'create_time' => time()
			);
		}

		Dao::factory('Role_Privilege')->batchDelete($roleId, $privilegeIds);
		return Dao::factory('Role_Privilege')->generate($values);
	}

	/**
	 * 角色权限收回
	 * @param integer $roleId
	 * @param array $privilegeIds
	 * @return array
	 */
	public function revoke($roleId, array $privilegeIds = array()) {
		return Dao::factory('Role_Privilege')->batchDelete($roleId, $privilegeIds);
	}

	/**
	 * 查询一个角色的权限
	 * @param integer $roleId
	 * @return array
	 */
	public function getPrivilegesByRoleId($roleId) {
		$rolePrivileges = Dao::factory('Role_Privilege')->getRolePrivilegesByRoleId($roleId);

		if (!$rolePrivileges) {
			return array();
		}

		$privilegeIds = array();
		foreach ($rolePrivileges as $rolePrivilege) {
			$privilegeIds[] = $rolePrivilege['privilege_id'];
		}
		return Dao::factory('Privilege')->getPrivilegesByPrivilegeIds($privilegeIds);
	}

	/**
	 * 按帐号获取一组角色
	 * @param array $accountIds
	 * @return array
	 */
	public function getRolesByRoleIds(array $roleIds = array()) {
		return Dao::factory('Role')->getRolesByRoleIds($roleIds);
	}

}
