<?php
/**
 * 数据库访问类 - 角色权限关系
 * @author dongjie
 */
class Dao_Role_Privilege extends Dao {
	
	protected $_db = 'account';
	
	protected $_tableName = 'role_privilege';
	
	protected $_primaryKey = 'role_privilege_id';

	/**
	 * 获取一个角色权限关系
	 * @param integer $roleId
	 * @return array
	 */
	public function getRolePrivilegesByRoleId($roleId = 0) {
		return DB::select('*')
			->from($this->_tableName)
			->where('role_id', '=', $roleId)
			->execute($this->_db)
			->as_array();
	}
	
	/**
	 * 获取一组角色权限关系
	 * @param array $roleIds
	 * @return array
	 */
	public function getRolePrivilegesByRoleIds(array $roleIds = array()) {
		if(!$roleIds) {
			return array();
		}
		
		return DB::select('*')
			->from($this->_tableName)
			->where('role_id', 'IN', $roleIds)
			->execute($this->_db)
			->as_array();
	}
	
	/**
	 * 检查角色权限关系是否存在
	 * @param integer $roleId
	 * @param integer $privilegeId
	 * @return array
	 */
	public function checkConflict($roleId = 0, $privilegeId = 0) {
		return DB::select('*')
			->from($this->_tableName)
			->where('role_id', '=', $roleId)
			->where('privilege_id', '=', $privilegeId)
			->execute($this->_db)
			->as_array();
	}

	/**
	 * 插入角色权限关系
	 * @param array $values
	 * @return array
	 */
	public function generate(array $values = array()) {
		if(!$values) {
			return array(0, 0);
		}
		
		$columns = array_keys($values[0]);
		
		$insert = DB::insert($this->_tableName)
			->columns($columns);
		foreach($values as $value) {
			$insert->values(array_values($value));
		}
		return $insert->execute($this->_db);
	}

	/**
	 * 删除角色权限关系
	 * @param integer $roleId
	 * @param integer $privilegeId
	 * @return integer
	 */
	public function delete($roleId = 0, $privilegeId = 0) {
		if(!$privilegeId) {
			return 1;
		}
		
		return DB::delete($this->_tableName)
			->where('role_id', '=', $roleId)
			->where('privilege_id', '=', $privilegeId)
			->execute($this->_db);
	}
	
	/**
	 * 批量删除角色权限关系
	 * @param number $roleId
	 * @param array $privilegeIds
	 */
	public function batchDelete($roleId = 0, array $privilegeIds = array()) {
		if(!$privilegeIds) {
			return 1;
		}
		
		return DB::delete($this->_tableName)
			->where('role_id', '=', $roleId)
			->where('privilege_id', 'IN', $privilegeIds)
			->execute($this->_db);
	}
}