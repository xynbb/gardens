<?php

/**
 * 业务逻辑类 —— 权限管理
 * @author baishen
 */
class Business_Privilege extends Business {

	/**
	 * 添加权限
	 * @param array $values
	 * @return array
	 */
	public function create(array $values) {

		$fields = array(
		    'name' => '',
		    'system_id' => 0,
		    'module_id' => 0,
		    'parent_id' => 0,
		    'domain' => '',
		    'portal' => '',
		    'controller' => '',
		    'action' => '',
		    'target' => '',
		    'type' => '',
		    'icon' => '',
		    'is_display' => 1,
		    'sequence' => 0,
		    'create_time' => time(),
		    'update_time' => time(),
		);

		$values['system_id'] = is_numeric($values['system_id']) ? $values['system_id'] : 0;
		$values['module_id'] = is_numeric($values['module_id']) ? $values['module_id'] : 0;
		$values['parent_id'] = is_numeric($values['parent_id']) ? $values['parent_id'] : 0;

		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;

		$errors = array();
		if (!$values['name']) {
			$errors[] = '名称不能为空！';
		}
		if (!$values['system_id']) {
			$errors[] = '系统不能为空！';
		}
		if (!$values['module_id']) {
			$errors[] = '请选择模块！';
		}
		if (!in_array($values['type'], array('navigator', 'menu', 'controller'))) {
			$errors[] = '请选择类型！';
		}
		if (($values['type'] == 'controller' || $values['type'] == 'menu') && $values['parent_id'] == 0) {
			$errors[] = '请选择上级权限';
		}
		if ($values['parent_id']) {
			$parentPrivilege = Dao::factory('Privilege')->getPrivilegeByPrivilegeId($values['parent_id']);
			if (!count($parentPrivilege)) {
				$errors[] = '不存在的上级权限';
			}
			$parentPrivilege = $parentPrivilege->current();
			if ($values['type'] == 'controller' && $parentPrivilege->type != 'menu') {
				$errors[] = '控制器的上级权限必须是菜单';
			}
			if ($values['type'] == 'menu' && $parentPrivilege->type != 'navigator') {
				$errors[] = '菜单的上级权限必须是导航';
			}
			if ($values['type'] == 'navigator') {
				$errors[] = '导航不需要选择上级权限';
			}
		}

		if ($values['controller'] && $values['action']) {
			$privileges = Dao::factory('Privilege')->checkConflict(0, $values['system_id'], $values['module_id'], $values['controller'], $values['action']);
			if (count($privileges)) {
				$privilege = $privileges[0];
				$errors[] = '您所添加的权限已经存在！privilege_id:' . $privilege['privilege_id'];
			}
		}

		$privilege = Dao::factory('Privilege')->getPrivilegeByName($values['name']);
		if (count($privilege) > 0) {
			$errors[] = '权限名称重复！';
		}

		if ($errors) {
			throw new Business_Exception(implode(' ', $errors));
		}

		$systems = Dao::factory('System')->getSystemBySystemId($values['system_id']);
		if (count($systems)) {
			$system = $systems[0];
			$values['domain'] = $system->domain;
		}
		$modules = Dao::factory('Module')->getModuleByModuleId($values['module_id']);
		if (count($modules)) {
			$module = $modules->current();
			$values['portal'] = $module->portal;
			$values['module'] = $module->module;
		}

		return Dao::factory('Privilege')->insert($values);
	}

	/**
	 * 更新权限
	 * @param array $values
	 * @return array
	 */
	public function update(array $values = array()) {

		$fields = array(
		    'name' => '',
		    'system_id' => 0,
		    'module_id' => 0,
		    'parent_id' => 0,
		    'domain' => '',
		    'portal' => '',
		    'controller' => '',
		    'action' => '',
		    'target' => '',
		    'type' => '',
		    'icon' => '',
		    'is_display' => 1,
		    'sequence' => 0,
		    'create_time' => time(),
		    'update_time' => time(),
		);

		$privilegeId = Arr::get($values, 'privilege_id', 0);
		$values['system_id'] = is_numeric($values['system_id']) ? $values['system_id'] : 0;
		$values['module_id'] = is_numeric($values['module_id']) ? $values['module_id'] : 0;
		$values['parent_id'] = is_numeric($values['parent_id']) ? $values['parent_id'] : 0;

		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;

		$errors = array();
		if (!$values['name']) {
			$errors[] = '名称不能为空！';
		}
		if (!$values['system_id']) {
			$errors[] = '系统不能为空！';
		}
		if (!in_array($values['type'], array('navigator', 'menu', 'controller'))) {
			$errors[] = '请选择类型！';
		}
		if (($values['type'] == 'controller' || $values['type'] == 'menu') && $values['parent_id'] == 0) {
			$errors[] = '请选择上级权限';
		}
		if ($values['parent_id']) {
			$parentPrivilege = Dao::factory('Privilege')->getPrivilegeByPrivilegeId($values['parent_id']);
			if (!count($parentPrivilege)) {
				$errors[] = '不存在的上级权限';
			}
			$parentPrivilege = $parentPrivilege->current();
			if ($values['type'] == 'controller' && $parentPrivilege->type != 'menu') {
				$errors[] = '控制器的上级权限必须是菜单';
			}
			if ($values['type'] == 'menu' && $parentPrivilege->type != 'navigator') {
				$errors[] = '菜单的上级权限必须是导航';
			}
			if ($values['type'] == 'navigator') {
				$errors[] = '导航不需要选择上级权限';
			}
		}

		if ($values['controller'] && $values['action']) {
			$privileges = Dao::factory('Privilege')->checkConflict(0, $values['system_id'], $values['module_id'], $values['controller'], $values['action']);
			if (count($privileges)) {
				$privilege = $privileges[0];
				if ($privilege['privilege_id'] != $privilegeId) {
					$errors[] = '您所添加的权限已经存在！privilege_id:' . $privilege['privilege_id'];
				}
			}
		}

		$privilege = Dao::factory('Privilege')->getPrivilegeByName($values['name'], $privilegeId);
		if (count($privilege) > 0) {
			$errors[] = '权限名称重复！';
		}

		if ($errors) {
			throw new Business_Exception(implode(' ', $errors));
		}

		$systems = Dao::factory('System')->getSystemBySystemId($values['system_id']);
		if (count($systems)) {
			$system = $systems->current();
			$values['domain'] = $system->domain;
			$values['portal'] = $system->portal;
		}
		$modules = Dao::factory('Module')->getModuleByModuleId($values['module_id']);
		if (count($modules)) {
			$module = $modules->current();
			$values['portal'] = $module->portal;
			$values['module'] = $module->module;
		}

		return Dao::factory('Privilege')->updateByPrivilegeId($privilegeId, $values);
	}

	/**
	 * 获取权限列表
	 * @param integer $number
	 * @param integer $offset
	 * @return array
	 */
	public function getPrivileges($number = 0, $offset = 0) {
		return Dao::factory('Privilege')->getPrivileges($number, $offset);
	}

	/**
	 * 获取一个权限
	 * @param integer $privilegeId
	 * @return array
	 */
	public function getPrivilegeByPrivilegeId($privilegeId = 0) {
		return Dao::factory('Privilege')->getPrivilegeByPrivilegeId($privilegeId);
	}

	/**
	 * 删除一个权限
	 * @param integer $privilegeId
	 * @return integer
	 */
	public function delete($privilegeId = 0) {
		$privileges = Dao::factory('Privilege')->getPrivilegesByParentId($privilegeId);
		if ($privileges->current()) {
			throw new Business_Exception('有下级权限存在，不能删除！');
		}

		return Dao::factory('Privilege')->delete($privilegeId);
	}

	/**
	 * 获取当前用户的所有权限
	 * @param integer $accountId
	 * @return array
	 */
	public function getPrivilegesByAccountId($accountId = 0) {
		if ($accountId == 1) {
			return Dao::factory('Privilege')->getPrivileges();
		}

		//取得帐号的所有角色
		$roleIds = array();
		$accountRoles = Dao::factory('Account_Role')->getAccountRolesByAccountId($accountId);
		foreach ($accountRoles as $accountRole) {
			$roleIds[] = $accountRole->role_id;
		}
		if (!$roleIds) {
			return array();
		}

		//取得角色权限对应关系
		$privilegeIds = array();
		$rolePrivileges = Dao::factory('Role_Privilege')->getRolePrivilegesByRoleIds($roleIds);
		foreach ($rolePrivileges as $rolePrivilege) {
			$privilegeIds[] = $rolePrivilege['privilege_id'];
		}
		if (!$privilegeIds) {
			return array();
		}

		//返回所有权限
		return Dao::factory('Privilege')->getPrivilegesByPrivilegeIds($privilegeIds);
	}

	/**
	 * 获取角色的所有权限
	 * @param integer $roleId
	 * @return array
	 */
	public function getPrivilegeIdsByRoleId($roleId = 0) {
		$privilegeIds = array();
		$rolePrivileges = Dao::factory('Role_Privilege')->getRolePrivilegesByRoleId($roleId);
		foreach ($rolePrivileges as $rolePrivilege) {
			$privilegeIds[] = $rolePrivilege['privilege_id'];
		}

		return $privilegeIds;
	}

	/**
	 * 获取所有导航
	 * @return array
	 */
	public function getNavigators() {
		return Dao::factory('Privilege')->getPrivilegeByType('navigator');
	}

	/**
	 * 获取所有菜单
	 * @return array
	 */
	public function getMenus() {
		return Dao::factory('Privilege')->getPrivilegeByType('menu');
	}

	/**
	 * 获取所有控制器
	 * @return array
	 */
	public function getControllers() {
		return Dao::factory('Privilege')->getPrivilegeByType('controller');
	}

	/**
	 * 通过系统ID获取一个系统下的权限
	 * @param integer $systemId
	 * @return array
	 */
	public function getPrivilegesBySystemId($systemId) {
		if ($systemId <= 0) {
			return array();
		}
		return Dao::factory('Privilege')->getPrivilegesBySystemId($systemId);
	}

}
