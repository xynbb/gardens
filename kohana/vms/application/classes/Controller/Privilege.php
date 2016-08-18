<?php

/**
 * 权限管理控制器
 * @author baishen
 */
class Controller_Privilege extends Controller_Render {

	protected $_layout = 'layouts/privilege';
	protected $_checkLogin = TRUE;

	/**
	 * 权限列表
	 */
	public function action_index() {
		return Controller::redirect('privilege/list');
	}

	/**
	 * 权限列表
	 */
	public function action_list() {
		$systems = Business::factory('System')->getSystems();
		$navigators = Business::factory('Privilege')->getNavigators();
		$menus = Business::factory('Privilege')->getMenus();
		$controllers = Business::factory('Privilege')->getControllers();
		
		try {
			$systemId = $systems->current()->getSystemId();
		} catch (Exception $e) {
			//
		}

		$this->_layout->content =  View::factory('privilege/list')
				->set('systems', $systems)
				->set('navigators', $navigators)
				->set('menus', $menus)
				->set('controllers', $controllers)
				->set('systemId', $systemId);
	}

	/**
	 * 添加
	 */
	public function action_add() {
		$systems = Business::factory('System')->getSystems();
		$modules = Business::factory('Module')->getModules();
		$navigators = Business::factory('Privilege')->getNavigators();
		$menus = Business::factory('Privilege')->getMenus();

		$this->_layout->content =  View::factory('privilege/form')
			->bind('privilege', $privilege)
			->set('systems', $systems)
			->set('modules', $modules)
			->set('navigators', $navigators)
			->set('menus', $menus);
	}

	/**
	 * 添加保存
	 */
	public function action_save() {
		$this->_contentType = 'application/json';
		$privilege = array(
				'name' => Arr::get($_POST, 'name', ''),
				'module_id' => Arr::get($_POST, 'module_id', 0),
				'system_id' => Arr::get($_POST, 'system_id', 0),
				'parent_id' => Arr::get($_POST, 'parent_id', 0),
				'controller' => Arr::get($_POST, 'controller', ''),
				'action' => Arr::get($_POST, 'action', ''),
				'target' => Arr::get($_POST, 'target', ''),
				'type' => Arr::get($_POST, 'type', ''),
				'is_display' => Arr::get($_POST, 'is_display', 1),
				'icon' => Arr::get($_POST, 'icon', ''),
				'sequence' => Arr::get($_POST, 'sequence', 0),
		);
		
		$errors = array();
		try {
			$result = Business::factory('Privilege')->create($privilege);
			if (!$result[0]) {
				return $this->failed('添加权限失败');
			}

			Logger::write('添加权限 ' . $result[0] . ' 成功');
			return $this->success('添加权限成功');

		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}
	}

	/**
	 * 修改
	 */
	public function action_edit() {
		$privilegeId = Arr::get($_GET, 'privilege_id', 0);
		if (!$privilegeId) {
			return Misc::message('权限Id有误', URL::site('privilege/list'));
		}
		
		$privilege = Business::factory('Privilege')->getPrivilegeByPrivilegeId($privilegeId);
		if ($privilege->count() == 0) {
			return Misc::message('权限不存在', URL::site('privilege/list'));
		}
		$privilege = $privilege->current();
		
		$systems = Business::factory('System')->getSystems();
		$modules = Business::factory('Module')->getModules();
		$navigators = Business::factory('Privilege')->getNavigators();
		$menus = Business::factory('Privilege')->getMenus();

		$this->_layout->content = View::factory('privilege/form')
			->bind('privilege', $privilege)
			->set('systems', $systems)
			->set('modules', $modules)
			->set('navigators', $navigators)
			->set('menus', $menus);
	}

	/**
	 * 保存修改
	 */
	public function action_modify() {
		$this->_contentType = 'application/json';
		$privilege = array (
				'privilege_id' => Arr::get($_POST, 'privilege_id', 0),
				'name' => Arr::get($_POST, 'name', ''),
				'module_id' => Arr::get($_POST, 'module_id', 0),
				'system_id' => Arr::get($_POST, 'system_id', 0),
				'parent_id' => Arr::get($_POST, 'parent_id', 0),
				'controller' => Arr::get($_POST, 'controller', ''),
				'action' => Arr::get($_POST, 'action', ''),
				'target' => Arr::get($_POST, 'target', ''),
				'type' => Arr::get($_POST, 'type', ''),
				'is_display' => Arr::get($_POST, 'is_display', 1),
				'icon' => Arr::get($_POST, 'icon', ''),
				'sequence' => Arr::get($_POST, 'sequence', 0),
		);
		
		$errors = array();
		try {
			$result = Business::factory('Privilege')->update($privilege);
			if(!$result) {
				return $this->failed('修改权限 '.$privilege['privilege_id'].' 失败');
			}

			Logger::write('修改权限 '.$privilege['privilege_id'].' 成功');
			return $this->success('修改权限成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}
	}

	/**
	 * 删除
	 */
	public function action_delete() {
		$this->_contentType = 'application/json';
		$privilegeId = Arr::get($_GET, 'privilege_id', 0);
		if (!$privilegeId) {
			return Misc::message('权限ID有误', URL::site('privilege/list'));
		}
		$errors = array();
		try {
			$result = Business::factory('Privilege')->delete($privilegeId);
			if (!$result) {
				return $this->failed('删除权限 ' . $privilegeId . ' 失败');
			}

			Logger::write('删除权限 ' . $privilegeId . ' 成功');
			return $this->success('删除权限成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}
	}
}
