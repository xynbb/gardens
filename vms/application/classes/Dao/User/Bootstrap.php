<?php
/**
* 用户引导状态DAO
* @author  wuchaobo
* @date 2014年5月22日 下午3:59:28
*/ 
class Dao_User_Bootstrap extends Dao {
	const USERINDEX = 'user';
	const USERPROFILE = 'profile';
	
	protected $_db = 'vblog';
	protected $_tableName = 'user_bootstrap';
	
	/**
	 * getUserBootstrapByUserId
	 * 根据用户id获取引导记录
	 * @param integer $userId 
	 * @param integer $page 
	 * @access public
	 * @return array
	 */
	public function getUserBootstrapByUserId($userId, $page) {
		return DB::select('*')
			->from($this->_tableName)
			->where('user_id', '=', $userId)
			->and_where('page', '=', $page)
			->execute($this->_db)
			->as_array();
	}

	/**
	 * create 
	 * 创建一条引导记录
	 * @param array $values 
	 * @access public
	 * @return integer
	 */
	public function create($values) {
		return DB::insert($this->_tableName)
			->columns(array_keys($values))
			->values(array_values($values))
			->execute($this->_db);
	}
}
