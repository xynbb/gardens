<?php

/**
 * 系统管理基本数据操作控制器
 * @desc 系统管理模块
 * @package account
 */
class Controller_System extends Controller_Render {

	protected $_layout = 'layouts/default';
	protected $_checkLogin = TRUE;

	public function action_index() {
		Controller::redirect('system/list');
	}

	/**
	 * 系统列表
	 */
	public function action_list() {
		$systems = Business::factory('System')->getSystems();
 
		$this->_layout->content = View::factory('system/list')
				->set('systems', $systems);
	}

	/**
	 * 添加系统
	 */
	public function action_add() {
		$this->_layout->content = View::factory('system/form')
				->bind('system', $system);
	}

	/**
	 * 添加保存
	 */
	public function action_save() {
		$this->_contentType = 'application/json';
		$system = array(
				'name' => Arr::get($_POST, 'name', ''),
				'domain' => Arr::get($_POST, 'domain', ''),
		);
		
		$errors = array();
		try {
			$result = Business::factory('System')->create($system);
			if (!$result[0]) {
				return $this->failed('添加系统失败');
			}
			
			Logger::write('添加系统 ' . $result[0] . ' 成功');
			return $this->success('添加系统成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}
		
		
	}

	/**
	 * 修改系统
	 */
	public function action_edit() {
		$systemId = Arr::get($_GET, 'system_id', 0);
		if (!$systemId) {
			return Misc::message('系统不存在', 'system/list');
		}
		$system = Business::factory('System')->getSystemBySystemId($systemId);
		if ($system->count() == 0) {
			return Misc::message('系统不存在', 'system/list');
		}
		$system = $system->current();
		
		$this->_layout->content = View::factory('system/form')
				->bind('system', $system);
	}

	/**
	 * 修改保存
	 */
	public function action_modify() {
		$this->_contentType = 'application/json';
		$system = array(
		    'system_id' => Arr::get($_POST, 'system_id', 0),
		    'name' => Arr::get($_POST, 'name', ''),
		    'domain' => Arr::get($_POST, 'domain', ''),
		);

		$errors = array();
		try {
			$result = Business::factory('System')->update($system);
			if (!$result) {
				return $this->failed('修改系统 ' . $system['system_id'] . ' 失败');
			}

			Logger::write('修改系统 ' . $system['system_id'] . ' 成功');
			return $this->success('修改成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}
	}

	/**
	 * 删除系统
	 */
	public function action_delete() {
		$this->_contentType = 'application/json';
		$systemId = Arr::get($_GET, 'system_id', 0);
		$errors = array();
		
		if (!$systemId) {
			return Misc::message('系统不存在', 'system/list');
		}

		try {
			$result = Business::factory('System')->delete($systemId);
			if (!$result) {
				return $this->failed('删除系统 ' . $systemId . ' 失败');
			}

			Logger::write('删除系统 ' . $systemId . ' 成功');
			return $this->success('删除成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}		
	}
}
