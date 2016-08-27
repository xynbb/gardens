<?php

/**
 * @desc 园管理模块
 */
class Controller_Garden extends Controller_Render {

	protected $_layout = 'layouts/garden';
	protected $_checkLogin = TRUE;

	public function action_index() {
		Controller::redirect('garden/list');
	}

	/**
	 * 列表
	 */
	public function action_list() {
		$gardens = Business::factory('Garden')->getList();
		$areas = Business::factory('Area')->getList();
		$rows = Business::factory('Rows')->getList();

		$this->_layout->content = View::factory('Garden/list')
			->set('rows', $rows)
			->set('areas', $areas)
			->set('gardens', $gardens);
	}

	/**
	 * 添加
	 */
	public function action_add() {
		$type = Arr::get($_GET, 'type', 1);
		$this->_layout->content = View::factory('garden/form')
			->set('type', $type);
	}

	/**
	 * 编辑
	 */
	public function action_edit() {
		$id = Arr::get($_GET, 'id', 0);
		$type = Arr::get($_GET, 'type', 1);
		$row = NULL;

		$row = Business::factory('Garden')->getRowById($id);
		if ($id && !is_object($row)) {
			return Misc::message('园不存在', 'garden/list');
		}
		$this->_layout->content = View::factory('garden/form')
			->set('row', $row)
			->set('type', $type);
	}

	/**
	 * 保存
	 */
	public function action_save() {
		$this->_contentType = 'application/json';
		$id = Arr::get($_POST, 'id', 0);

		$save = array(
			'name' => Arr::get($_POST, 'name', ''),
			'type' => Arr::get($_POST, 'type', '1'),
			'sort' => Arr::get($_POST, 'sort', '0'),
			'status' => Arr::get($_POST, 'status', '1'),
			'update_time' => time()
		);
		$errors = array();
		try {

			if($id) {
				$result = Business::factory('Garden')->update($id, $save);
				Logger::write('修改园 ' . $id . ' 成功');
			} else {
				$save['create_time'] = time();
				$result = Business::factory('Garden')->create($save);
				$result = $result[0];
				Logger::write('添加园 ' . $result . ' 成功');
			}
			if (!$result) {
				return $this->failed('操作失败');
			}
			return $this->success('操作成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}
		
		
	}

	/**
	 * 删除
	 */
	public function action_delete() {
		$this->_contentType = 'application/json';
		$id = Arr::get($_GET, 'id', 0);
		$errors = array();
		
		if (!$id) {
			return Misc::message('园不存在', 'garden/list');
		}
		try {
			//检查是否存在区
			$result = Business::factory('Garden')->check($id);
			if (!$result) {
				return Misc::message('请先删除园下面区', 'garden/list');
			}
			
			$update = array(
				'status' => -1,
				'update_time' => time()
			);
			$result = Business::factory('Garden')->update($id, $update);
			if (!$result) {
				return $this->failed('删除园 ' . $id . ' 失败');
			}

			Logger::write('删除园 ' . $id . ' 成功');
			return $this->success('删除成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}		
	}
}
