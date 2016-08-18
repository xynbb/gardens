<?php
/**
 * 数据库操作类 —— 权限
 * @author  baishen
 */
class Dao_Privilege extends Dao {
	protected $_db = 'account';

	protected $_tableName = 'privilege';

	protected $_primaryKey = 'privilege_id';

	/**
	 * 递归获取权限
	 * @param integer $parentId
	 * @param array $privileges
	 * @return array
	 */
	public static function recursive($parentId = 0, $privileges) {
		
		static $return = array();
		static $depth = 0;

		if(!$privileges) {
			return array();
		}
		
		$depth++;

		foreach($privileges as $privilege) {
			if($parentId == $privilege['parent_id']) {
				$return[$privilege['privilege_id']] = $privilege;
				$return[$privilege['privilege_id']]['depth'] = $depth;
				self::recursive($privilege['privilege_id'], $privileges);
			}
		}

		return  $return;
	}
	

	/**
	 * 插入权限
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
	 * 更新权限
	 * @param integer $privilegeId
	 * @param array $values
	 * @return integer
	 */
	public function updateByPrivilegeId($privilegeId, array $values = array()) {
		if(!$privilegeId || !$values) {
			return 0;
		}
		return DB::update($this->_tableName)
			->set($values)
			->where('privilege_id', '=', $privilegeId)
			->execute($this->_db);
	}

	/**
	 * 获取权限列表
	 * @param integer $number
	 * @param integer $offset
	 * @return array
	 */
	public function getPrivileges($number = 0, $offset = 0) {
		$select = DB::select('*')
			->from($this->_tableName)
			->order_by('system_id', 'DESC')
			->order_by('sequence', 'ASC')
			->order_by('privilege_id', 'DESC');
		if($number) {
			$select->limit($number);
		}
		if($offset) {
			$select->offset($offset);
		}
		$privileges = $select->as_object('Model_Privilege')->execute($this->_db);
		return $privileges;
	}

	/**
	 * 获取一个权限
	 * @param integer $privilegeId
	 * @return array
	 */
	public function getPrivilegeByPrivilegeId($privilegeId) {
		return DB::select('*')
			->from($this->_tableName)
			->where('privilege_id', '=', $privilegeId)
			->as_object('Model_Privilege')
			->execute($this->_db);
	}

	/**
	 * 获取一组权限
	 * @param array $privilegeIds
	 * @return array
	 */
	public function getPrivilegesByPrivilegeIds($privilegeIds = array()) {
		if(!$privilegeIds) {
			return array();
		}
		return DB::select('*')
			->from($this->_tableName)
			->where('privilege_id', 'IN', $privilegeIds)
			->order_by('sequence', 'ASC')
			->order_by('privilege_id', 'DESC')
			->as_object('Model_Privilege')
			->execute($this->_db);
	}

	/**
	 * 根据父ID获取权限列表
	 * @param integer $parentId
	 * @return array
	 */
	public function getPrivilegesByParentId($parentId) {
		if($parentId <= 0){
			return array();
		}
		return DB::select('*')
			->from($this->_tableName)
			->where('parent_id', '=', $parentId)
			->as_object('Model_Privilege')
			->execute($this->_db);		
	}

	/**
	 * 根据名字获取权限信息
	 * @param number $privilegeId
	 * @param string $name
	 * @return array
	 */
	public function getPrivilegeByName($name, $privilegeId = 0) {
		$select = DB::select('*')
			->from($this->_tableName)
			->where('name', '=', $name);
		if($privilegeId) {
			$select->where('privilege_id', '!=', $privilegeId);
		}
		return $select->as_object('Model_Privilege')->execute($this->_db);
	}

	/**
	 * 判断是否存在冲突
	 * @param number $privilegeId
	 * @param number $systemId
	 * @param string $controller
	 * @param string $action
	 * @return array
	 */
	public function checkConflict($privilegeId = 0, $systemId, $moduleId, $controller, $action) {
		$select = DB::select('*')
			->from($this->_tableName)
			->where('system_id', '=', $systemId)
			->where('module_id', '=', $moduleId)
			->where('controller', '=', $controller)
			->where('action', '=', $action);
		if($privilegeId) {
			$select->where('privilege_id', '!=', $privilegeId);
		}
		return $select->execute($this->_db)->as_array();
	}

	/**
	 * 根据类型获取权限
	 * @param string $type
	 * @return array
	 */
	public function getPrivilegeByType($type) {
		return DB::select('*')
			->from($this->_tableName)
			->where('type', '=', $type)
			->order_by('sequence', 'ASC')
			->order_by('privilege_id', 'DESC')
			->as_object('Model_Privilege')
			->execute($this->_db);
	}

	/**
	 * 删除权限
	 * @param integer $privilegeId
	 * @return integer
	 */
	public function delete($privilegeId = 0) {
		if($privilegeId <= 0){
			return 0;
		}
		return DB::delete($this->_tableName)
			->where('privilege_id', '=', $privilegeId)
			->execute($this->_db);
	}

	/**
	 * 根据系统ID取得权限
	 * @param number $systemId
	 * @return  array
	 */
	public function getPrivilegesBySystemId($systemId = 0) {
		if($systemId <=0){
			return array();
		}
		return DB::select('*')
		->from($this->_tableName)
		->where('system_id', '=', $systemId)
		->execute($this->_db)
		->as_array();
	}

	/**
	 * 根据模块ID取得权限
	 * @param number $moduleId
	 * @return  array
	 */
	public function getPrivilegesByModuleId($moduleId = 0) {
		if($moduleId <= 0){
			return array();
		}
		return DB::select('*')
			->from($this->_tableName)
			->where('module_id', '=', $moduleId)
			->execute($this->_db)
			->as_array();
	}
	
	/**
	 * 更新模块
	 * @param number $moduleId
	 * @param array $values
	 * @return integer
	 */
	public function updateModuleByModuleId($moduleId = 0, array $values = array()) {
		if($moduleId <= 0){
			return 0;
		}
		
		return DB::update($this->_tableName)
			->set($values)
			->where('module_id', '=', $moduleId)
			->execute($this->_db);
	}
}
