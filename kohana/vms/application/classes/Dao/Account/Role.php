<?php
/**
 * 数据库访问类 - 帐号角色关系
 * @author dongjie
 */
class Dao_Account_Role extends Dao {

	protected $_db = 'account';
	
	protected $_tableName = 'account_role';
	
	protected $_primaryKey = 'account_role_id';
	
	/**
	 * 获取一个帐号的角色关系
	 * @param integer $accountId
	 * @return array
	 */
	public function getAccountRolesByAccountId($accountId) {
		return DB::select('*')
			->from($this->_tableName)
			->where('account_id', '=', $accountId)
			->as_object('Model_Account_Role')
			->execute($this->_db);
	}
	
	/**
	 * 获取一组帐号的角色关系
	 * @param array $accountIds
	 * @return array
	 */
	public function getAccountRolesByAccountIds(array $accountIds) {
		if(!$accountIds) {
			return array();
		}
		return DB::select('*')
			->from($this->_tableName)
			->where('account_id', 'IN', $accountIds)
			->as_object('Model_Account_Role')
			->execute($this->_db);
	}
	
	/**
	 * 获取一个角色下的所有帐号
	 * @param integer $roleId
	 * @return array
	 */
	public function getAccountRolesByRoleId($roleId) {
		return DB::select('*')
			->from($this->_tableName)
			->where('role_id', '=', $roleId)
			->as_object('Model_Account_Role')
			->execute($this->_db);
	}
	
	/**
	 * 删除一个帐号的角色关系
	 * @param integer $accountId
	 * @return integer
	 */
	public function deleteByAccountId($accountId) {
		return DB::delete($this->_tableName)
			->where('account_id', '=', $accountId)
			->execute($this->_db);
	}
	
	/**
	 * 生成帐号与角色关系
	 * @param integer $accountId
	 * @param array $roleIds
	 * @return integer
	 */
	public function generate($accountId, array $roleIds, $time) {
		$columns = array('account_id', 'role_id', 'create_time');
		$insert = DB::insert($this->_tableName)
			->columns($columns);
		foreach($roleIds as $roleId) {
			$values = array($accountId, $roleId, $time);
			$insert->values($values);
		}
		return $insert->execute($this->_db);
	}

	/**
	 * 插入用户角色关系
	 * @param array $values
	 * @return array
	 */
	public function insert(array $values) {
		if(!$values) {
			return array(0, 0);
		}
		return DB::insert($this->_tableName)
			->columns(array_keys($values))
			->values(array_values($values))
			->execute($this->_db);
	}
}
