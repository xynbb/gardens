<?php

/**
 * @desc 区管理模块
 */
class Controller_Area extends Controller_Render {

	protected $_layout = 'layouts/garden';
	protected $_checkLogin = TRUE;

	/**
	 * 添加
	 */
	public function action_add() {
		$type = Arr::get($_GET, 'type', 1);
		$gardenId = Arr::get($_GET, 'garden_id', 0);

		$this->_layout->content = View::factory('area/form')
			->set('type', $type)
			->set('gardenId', $gardenId);
	}

	/**
	 * 编辑
	 */
	public function action_edit() {
		$id = Arr::get($_GET, 'id', 0);
		$type = Arr::get($_GET, 'type', 1);
		$gardenId = Arr::get($_GET, 'garden_id', 0);
		$row = NULL;

		$row = Business::factory('Area')->getRowById($id);
		if ($id && !is_object($row)) {
			return Misc::message('区不存在', 'garden/list');
		}
		$this->_layout->content = View::factory('area/form')
			->set('row', $row)
			->set('type', $type)
			->set('gardenId', $gardenId);
	}

	/**
	 * 保存
	 */
	public function action_save() {
		$this->_contentType = 'application/json';
		$id = Arr::get($_POST, 'id', 0);

		$save = array(
			'garden_id' => Arr::get($_POST, 'garden_id', '0'),
			'name' => Arr::get($_POST, 'name', ''),
			//'type' => Arr::get($_POST, 'type', '1'),
			'sort' => Arr::get($_POST, 'sort', '0'),
			'status' => Arr::get($_POST, 'status', '1'),
			'update_time' => time()
		);
		$errors = array();
		try {

			if($id) {
				$result = Business::factory('Area')->update($id, $save);
				Logger::write('修改区 ' . $id . ' 成功');
			} else {
				$save['create_time'] = time();
				$result = Business::factory('Area')->create($save);
				$result = $result[0];
				Logger::write('添加区 ' . $result . ' 成功');
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
			return Misc::message('区不存在', 'area/list');
		}
		try {
			//检查是否存在区
			$result = Business::factory('Area')->check($id);
			if (!$result) {
				return Misc::message('请先删除区下面排', 'area/list');
			}
			
			$update = array(
				'status' => -1,
				'update_time' => time()
			);
			$result = Business::factory('Area')->update($id, $update);
			if (!$result) {
				return $this->failed('删除区 ' . $id . ' 失败');
			}

			Logger::write('删除区 ' . $id . ' 成功');
			return $this->success('删除成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}		
	}
}
