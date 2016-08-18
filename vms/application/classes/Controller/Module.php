<?php
/**
 * 模块管理控制器
 * @author dongjie
 */
class Controller_Module extends Controller_Render {

	protected $_layout = 'layouts/default';
	
	protected $_checkLogin = TRUE;

	public function action_index() {
		return Controller::redirect('module/list');
	}
	
	/**
	 * 模块列表
	 */
	public function action_list() {
		$modules = Business::factory('Module')->getModules();
		$systems = Business::factory('System')->getSystems();
		
		$this->_layout->content = View::factory('module/list')
			->set('modules', $modules)
			->set('systems', $systems);
	}
	
	/**
	 * 添加模块
	 */
	public function action_add() {
		$systems = Business::factory('System')->getSystems();
		
		$this->_layout->content = View::factory('module/form')
			->set('systems', $systems)
			->bind('module', $module);
	}
	
	/**
	 * 修改模块
	 */
	public function action_edit() {
		$moduleId = Arr::get($_GET, 'module_id', 0);
		$module = Business::factory('Module')->getModuleByModuleId($moduleId);
		if($module->count() == 0) {
			return Misc::message('模块不存在', 'module/list');
		}
		$module = $module->current();
		$systems = Business::factory('System')->getSystems();
				
		$this->_layout->content = View::factory('module/form')
			->set('systems', $systems)
			->bind('module', $module);
	}
	
	/**
	 * 添加保存
	 */
	public function action_save() {
		$this->_contentType = 'application/json';
		$module = array (
				'name' => Arr::get($_POST, 'name', ''),
				'module' => Arr::get($_POST, 'module', ''),
				'system_id' => Arr::get($_POST, 'system_id', 0),
				'portal' => Arr::get($_POST, 'portal', ''),
		);
		
		$errors = array();
		try {
			$result = Business::factory('Module')->create($module);
			if(!$result[0]) {
				return $this->failed('添加模块失败');
			}
			Logger::write('添加模块 '.$result[0].' 成功');
			return $this->success('添加成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}		
	}
	
	/**
	 * 保存修改
	 */
	public function action_modify() {
		$this->_contentType = 'application/json';
		$moduleId = Arr::get($_POST, 'module_id', 0);
		$module = array (
				'module_id' => Arr::get($_POST, 'module_id', 0),
				'name' => Arr::get($_POST, 'name', ''),
				'module' => Arr::get($_POST, 'module', ''),
				'system_id' => Arr::get($_POST, 'system_id', 0),
				'portal' => Arr::get($_POST, 'portal', ''),
		);
		
		$errors = array();
		try {
			$result = Business::factory('Module')->update($module);
			if(!$result) {
				return $this->failed('修改模块 '.$moduleId.' 失败');
			}
			Logger::write('修改模块 '.$moduleId.' 成功');
			return $this->success('修改模块成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}
	}
	
	/**
	 * 删除
	 */
	public function action_delete() {
		$this->_contentType = 'application/json';
		$moduleId = Arr::get($_GET, 'module_id', 0);
		
		$errors = array();
		try {
			$result = Business::factory('Module')->delete($moduleId);
			if(!$result) {
				return $this->failed('删除模块 '.$moduleId.' 失败');
			}
			Logger::write('删除模块 '.$moduleId.' 成功');
			return $this->success('删除模块成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}		
	}
}
