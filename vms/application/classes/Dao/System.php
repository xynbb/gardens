<?php

/**
 * 数据库操作类 —— 系统
 */
class Dao_System extends Dao {

	protected $_db = 'account';
	protected $_tableName = 'system';
	protected $_primaryKey = 'system_id';
	protected $_modelName = 'Model_System';

	/**
	 * 插入一行
	 * @param array $values
	 * @return array
	 */
	public function insert(array $values) {
		return DB::insert($this->_tableName)
				->columns(array_keys($values))
				->values(array_values($values))
				->execute($this->_db);
	}

	/**
	 * 按ID更新一行
	 * @param integer $systemId
	 * @param array $values
	 * @return integer
	 */
	public function updateBySystemId($systemId, array $values = array()) {
		if (!$values) {
			return 0;
		}
		return DB::update($this->_tableName)
				->set($values)
				->where('system_id', '=', $systemId)
				->execute($this->_db);
	}

	/**
	 * 获取系统列表
	 * @param number $number
	 * @param number $offset
	 * @return array
	 */
	public function getSystems($number = 0, $offset = 0) {
		$select = DB::select('*')
			->from($this->_tableName)
			->order_by('system_id', 'ASC');
		if ($number) {
			$select->limit($number);
		}
		if ($offset) {
			$select->offset($offset);
		}
		return $select->as_object('Model_System')->execute($this->_db);
	}

	/**
	 * 获取一条记录
	 * @param number $systemId
	 * @return array
	 */
	public function getSystemBySystemId($systemId = 0) {
		return DB::select('*')
				->from($this->_tableName)
				->where('system_id', '=', $systemId)
				->as_object('Model_System')
				->execute($this->_db);
	}

	/**
	 * 删除一条记录
	 * @param number $systemId
	 * @return integer
	 */
	public function delete($systemId = 0) {
		return DB::delete($this->_tableName)
				->where('system_id', '=', $systemId)
				->execute($this->_db);
	}

}
