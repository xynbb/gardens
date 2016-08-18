<?php
/**
 * GVS角色数据访问层
 */
class Dao_Role extends Dao {

	protected $_db = 'account';

	protected $_tableName = 'role';

	protected $_primaryKey = 'role_id';

	/**
	 * 插入一个新角色
	 * @param array $values
	 * @return array
	 */
	public function insert(array $values = array()) {
		if(!$values) {
			return array(0, 0);
		}
		return DB::insert($this->_tableName)
			->columns(array_keys($values))
			->values(array_values($values))
			->execute($this->_db);
	}

	/**
	 * 更新角色信息
	 * @param number $roleId
	 * @param array $values
	 * @return integer
	 */
	public function updateByRoleId($roleId, array $values = array()) {
		if(!$values) {
			return 0;
		}
		return DB::update($this->_tableName)
			->set($values)
			->where('role_id', '=', $roleId)
			->execute($this->_db);
	}

	/**
	 * 删除一个新角色
	 * @param number $roleId
	 * @return integer
	 */
	public function delete($roleId) {
		return DB::delete($this->_tableName)
			->where('role_id', '=', $roleId)
			->execute($this->_db);
	}

	/**
	 * 获取角色
	 * @param number $number
	 * @param number $offset
	 * @return array
	 */
	public function getRoles($number = 0, $offset = 0) {
		$select =  DB::select('*')
			->from($this->_tableName);
		if($offset) {
			$select->offset($offset);
		}
		if($number) {
			$select->limit($number);
		}
		return $select->as_object('Model_Role')->execute($this->_db);

	}

	/**
	 * 获取单个角色
	 * @param number $roleId
	 * @return array
	 */
	public function getRoleByRoleId($roleId = 0) {
		return DB::select('*')
			->from($this->_tableName)
			->where('role_id', '=', $roleId)
			->as_object('Model_Role')
			->execute($this->_db);
	}

	/**
	 * 根据多个角色ID获取角色
	 * @param array $roleIds
	 * @return array
	 */
	public function getRolesByRoleIds(array $roleIds = array()) {
		if(!$roleIds) {
			return array();
		}
		return DB::select('*')
			->from($this->_tableName)
			->where('role_id', 'IN', $roleIds)
			->as_object('Model_Role')
			->execute($this->_db);
	}
	/**
	 * 根据部门id，要添加的角色寻找
	 * @param  int    $departmentId 
	 * @param  string $roleName     
	 * @return object             
	 */
	public function getRoleByRoleNameAndDepartmentId(int $departmentId,$roleName) {
		return DB::select('*')
				->from($this->_tableName)
				->where('name', '=', $roleName)
				->and_where('department_id', '=', $departmentId)
				->as_object('Model_Role')
				->execute($this->_db);
	}
}
