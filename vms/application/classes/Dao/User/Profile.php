<?php
/**
 * 用户模型
 * @author  xinhua.wang
 * @date  2014/03/13 
 * @version 1.0
 * 
 */
class Dao_User_Profile extends Dao {
	
	protected $_db = 'vblog';

	protected $_tableName = 'user_profile';
	
	protected $_routeDB = Slice_DB::MODE_NONE;
	
	protected $_routeTable = Slice_Table::MODE_MOD_256;	
	
	/**
	 * 获取用户信息
	 * @param int $userId
	 * @return array
	 */
	public function getUserProfileByUserId($userId) {
		if($userId <= 0) {
			return array();
		}
		return DB::select('*')
			->from($this->_tableName($userId))
			->where('user_id', '=', $userId)
			->execute($this->_db($userId))
			->as_array();
	}

	/**
	 * 创建用户信息
	 * @param array $values
	 * @return multitype:number |Ambigous <object, mixed, number, Database_Result_Cached, multitype:>
	 */
	public function insert(array $values) {
		$userId = $values['user_id'];
		if($userId <= 0) {
			return array(0, 0);
		}
		return DB::insert($this->_tableName($userId))
			->columns(array_keys($values))
			->values(array_values($values))
			->execute($this->_db($userId));
	}

	/**
	 * 通过用户id更新用户信息
	 * @param integer $userId
	 * @param array $values
	 * @return integer
	 */
	public function updateByUserId($userId, array $values = array()) {
		if(!$values) {
			return 0;
		}
		return DB::update($this->_tableName($userId))
			->set($values)
			->where('user_id', '=', $userId)
			->execute($this->_db($userId));
	}

	/**
	 * getRecordByDomain 根据域名获取用户设置记录
	 * 
	 * @param integer $domain 
	 * @access public
	 * @return array
	 */
	public function getRecordByDomain($userId, $domain) {
		if (!$userId || !$domain) {
			return array();	
		}
		return DB::select('*')
			->from($this->_tableName($userId))
			->where('domain', '=', $domain)
			->execute($this->_db)
			->as_array();
	} 
}
