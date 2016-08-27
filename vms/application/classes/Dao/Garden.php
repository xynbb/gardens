<?php
/**
 * 数据库操作类 —— 园
 */
class Dao_Garden extends Dao {
	protected $_db = 'account';

	protected $_tableName = 'garden';

	protected $_primaryKey = 'id';

	/**
	 * 根据关键字获取日志列表
	 * @param array $condition
	 * @param integer $offset
	 * @param integer $number
	 * @return array
	 */
	public function getRowsByKeyword($condition, $number = 0, $offset = 0) {
		$select = DB::select('*')
			->from($this->_tableName)
			->where('status', '!=', -1)
			->order_by('id', 'DESC');
		if(isset($condition['name']) && $condition['name'] != '') {
			$select->where('id', '=', $condition['name']);
			$select->or_where('name', '=', $condition['name']);
		}
		if($number) {
			$select->limit($number);
		}
		if($offset) {
			$select->offset($offset);
		}
		return $select->as_object('Model_Garden')->execute($this->_db);
	}


	/**
	 * 根据关键字获取数量
	 * @param array $condition
	 * @return integer
	 */
	public function countRowByKeyword($condition = array()) {
		$select = DB::select(DB::expr('COUNT(*) AS recordCount'))
			->from($this->_tableName)
			->where('status', '!=', -1);
		if(isset($condition['name']) && $condition['name'] != '') {
			$select->where('id', '=', $condition['name']);
			$select->or_where('name', '=', $condition['name']);
		}
		return $select->execute($this->_db)->get('recordCount');
	}


	/**
	 * 根据ID获取信息
	 * @param integer $id
	 * @return array
	 */
	public function getRowById($id) {
		return DB::select('*')
			->from($this->_tableName)
			->where($this->_primaryKey, '=', $id)
			->as_object('Model_Garden')
			->execute($this->_db)
			->current();
	}

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
	 * 更新一行
	 * @param array $values
	 * @return integer
	 */
	public function updateById($id, $values) {
		if (!$values) {
			return 0;
		}
		return DB::update($this->_tableName)
			->set($values)
			->where('id', '=', $id)
			->execute($this->_db);
	}

}
