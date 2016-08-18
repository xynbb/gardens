<?php
class Dao_Module extends Dao {

	protected $_db = 'account';
	
	protected $_tableName = 'module';
	
	protected $_primaryKey = 'module_id';
	
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
	 * @param integer $moduleId
	 * @param array $values
	 * @return integer
	 */
	public function update($moduleId, array $values = array()) {
		if(!$values) {
			return 0;
		}
		return DB::update($this->_tableName)
			->set($values)
			->where('module_id', '=', $moduleId)
			->execute($this->_db);
	}
	
	/**
	 * 删除一行
	 * @param integer $moduleId
	 * @return integer
	 */
	public function delete($moduleId) {
		return DB::delete($this->_tableName)
			->where('module_id', '=', $moduleId)
			->execute($this->_db);
	}
	
	/**
	 * 获取一行
	 * @param integer $moduleId
	 * @return array
	 */
	public function getModuleByModuleId($moduleId) {
		return DB::select('*')
			->from($this->_tableName)
			->where('module_id', '=', $moduleId)
			->as_object('Model_Module')
			->execute($this->_db);
	}
	
	/**
	 * 获取一组记录
	 * @param number $number
	 * @param number $offset
	 * @return array
	 */
	public function getModules($number = 0, $offset = 0) {
		$select = DB::select('*')
			->from($this->_tableName)
			->order_by('module_id', 'ASC');
		if($number) {
			$select->limit($number);
		}
		if($offset) {
			$select->offset($offset);
		}
		return $select->as_object('Model_Module')->execute($this->_db);
	}
}