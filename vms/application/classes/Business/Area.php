<?php

/**
 * 业务逻辑类 —— 区管理
 */
class Business_Area extends Business {

	/**
	 * 检查数据
	 * @param number $id
	 * @return array
	 */
	public function check($id) {
		$areas = Dao::factory('Rows')->getRowsByAreaId($id);
		if($areas->count() > 0) {
			return false;
		}
		return true;
	}

	/**
	 * 获得列表分页
	 * @param array $condition
	 * @param number $page
	 * @param number $size
	 * @param string $key
	 */
	public function getPagination($condition = array(), $page = 1, $size = 1, $key = 'page') {
		$count = Dao::factory('Area')->countRowByKeyword($condition);

		return Pagination::factory()
			->total($count)
			->number($size)
			->key($key)
			->execute();
	}

	/**
	 * 获得列表
	 * @param array $condition
	 * @param number $number
	 * @param number $offset
	 */
	public function getList($condition = array(), $number = 0, $offset = 0) {

		return Dao::factory('Area')->getRowsByKeyword($condition, $number, $offset);
	}

	/**
	 * 获取单条
	 * @param number $id
	 * @return array
	 */
	public function getRowById($id = 0) {
		return Dao::factory('Area')->getRowById($id);
	}

	/**
	 * 插入一个记录
	 * @param array $values
	 * @return array
	 */
	public function create($values = array()) {
		$name = Arr::get($values, 'name', '');

		$errors = array();
		if (!$name) {
			$errors[] = '名称不能为空！';
		}
		if ($errors) {
			throw new Business_Exception(implode(' ', $errors));
		}

		return Dao::factory('Area')->insert($values);
	}

	/**
	 * 更新一条记录
	 * @param array $values
	 * @param  int $id
	 * @return integer
	 */
	public function update($id, $values = array()) {
		$name = Arr::get($values, 'name', '');

		$errors = array();
		if (isset($values['name']) && $name == '') {
			$errors[] = '名称不能为空！';
		}
		if ($errors) {
			throw new Business_Exception(implode(' ', $errors));
		}
		unset($values['id']);

		return Dao::factory('Area')->updateById($id, $values);
	}

}
