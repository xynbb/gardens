<?php

/**
 * @desc 排管理模块
 */
class Controller_Rows extends Controller_Render {

	protected $_layout = 'layouts/garden';
	protected $_checkLogin = TRUE;

	/**
	 * 添加
	 */
	public function action_add() {
		$type = Arr::get($_GET, 'type', 1);
		$areaId = Arr::get($_GET, 'area_id', 0);

		$this->_layout->content = View::factory('rows/form')
			->set('type', $type)
			->set('areaId', $areaId);
	}

	/**
	 * 编辑
	 */
	public function action_edit() {
		$id = Arr::get($_GET, 'id', 0);
		$type = Arr::get($_GET, 'type', 1);
		$areaId = Arr::get($_GET, 'area_id', 0);
		$row = NULL;

		$row = Business::factory('Rows')->getRowById($id);
		if ($id && !is_object($row)) {
			return Misc::message('排不存在', 'garden/list');
		}
		$this->_layout->content = View::factory('rows/form')
			->set('row', $row)
			->set('type', $type)
			->set('areaId', $areaId);
	}

	/**
	 * 保存
	 */
	public function action_save() {
		$this->_contentType = 'application/json';
		$id = Arr::get($_POST, 'id', 0);

		$save = array(
			'area_id' => Arr::get($_POST, 'area_id', '0'),
			'name' => Arr::get($_POST, 'name', ''),
			//'type' => Arr::get($_POST, 'type', '1'),
			'sort' => Arr::get($_POST, 'sort', '0'),
			'status' => Arr::get($_POST, 'status', '1'),
			'update_time' => time()
		);
		$errors = array();
		try {

			if($id) {
				$result = Business::factory('Rows')->update($id, $save);
				Logger::write('修改排 ' . $id . ' 成功');
			} else {
				$save['create_time'] = time();
				$result = Business::factory('Rows')->create($save);
				$result = $result[0];
				Logger::write('添加排 ' . $result . ' 成功');
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
			return Misc::message('排不存在', 'rows/list');
		}
		try {
			//检查是否存在区
			$result = Business::factory('Rows')->check($id);
			if (!$result) {
				return Misc::message('请先删除排下的墓位', 'rows/list');
			}
			
			$update = array(
				'status' => -1,
				'update_time' => time()
			);
			$result = Business::factory('Rows')->update($id, $update);
			if (!$result) {
				return $this->failed('删除排 ' . $id . ' 失败');
			}

			Logger::write('删除排 ' . $id . ' 成功');
			return $this->success('删除成功');
		} catch (Throwable $ex) {
			return $this->failed($ex->getMessage());
		}		
	}
}
