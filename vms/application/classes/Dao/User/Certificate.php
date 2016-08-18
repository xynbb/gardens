<?php
/**
 * 用户认证模型
 * @author  xinhua.wang
 * @date  2014/03/13 
 * @version 1.0
 * 
 */
class Dao_User_Certificate extends Dao {
	
	protected $_db = 'vblog';

	protected $_tableName = 'user_certificate';

	const TYPE_NONE = 0;
	const TYPE_INDIVIDUAL = 1;//个人认证
	const TYPE_ORGANIZATION = 2;//企业认证

	const APPROVE_FAIL = -1;//审核失败
	const APPROVE_TODO = 0;//待审核
	const APPROVE_SUCCESS = 1;//审核通过

	const IS_ACTIVE = 1;//已激活
	const NOT_ACTIVE = 0;//未激活

	const IS_SENSITIVE = 1;//敏感用户
	const NOT_SENSITIVE = 0;//非敏感用户

	const STATUS_DELETED = -1;//下线
	const STATUS_NORMAL = 0;//正常

	const GENDER_MALE = 0;//男
	const GENDER_FEMALE = 1;//女

	const CREDENTIAL_TYPE = 1;//证据类型

	const IDENTITY_STUDENT = 1;//身份学生
	const IDENTITY_SOCIAL = 2;//身份社会人士

	const SEARCH_TYPE_NAME = 'name';//按照机构名称搜索
	const SEARCH_TYPE_ID = 'user_id';//按照机构id搜索
	const SEARCH_TYPE_ACCOUNT = 'operate_account';//按照最后修改人搜索

	/**
	 * 根据审核状态获取一组用户认证信息
	 * @param integer $approve
	 * @param integer $number
	 * @param integer $offset
	 * @return array
	 */
	public function getUserCertificatesByApprove($approve, $number = 0, $offset = 0) {
		$select = DB::select('*')
			->from($this->_tableName)
			->order_by('create_time', 'DESC')
			->where('approve_status', '=', $approve);
		if($offset) {
			$select->offset($offset);
		}
		if($number) {
			$select->limit($number);
		}
		return $select->execute($this->_db)->as_array();
	}

	/**
	 * 获取一组用户认证信息
	 * @param integer $offset
	 * @param integer $number
	 * @param integer $approve
	 * @return array
	 */
	public function getUserCertificates($offset = 0, $number = 0) {
		$select = DB::select('*')
			->from($this->_tableName)
			->order_by('create_time', 'DESC');
		if($offset) {
			$select->offset($offset);
		}
		if($number) {
			$select->limit($number);
		}
		return $select->execute($this->_db)->as_array();
	}

	/**
	 * 获取一组用户认证数量
	 * @param integer $approve
	 * @return array
	 */
	public function countCertificateUserByApprove($approve = NULL) {

		$select = DB::select(DB::expr('COUNT(*) AS recordCount'))
			->from($this->_tableName);
		if($approve !== NULL) {
			$select->where('approve_status', '=', $approve);
		}
		return $select->execute($this->_db)->get('recordCount');
	}	

	/**
	 * 获取用户认证信息
	 * @param integer $userId  用户id
	 * @return array
	 */
	public function getUserCertificateByUserId($userId) {
		return DB::select('*')
			->from($this->_tableName)
			->where('user_id', '=', $userId)
			->execute($this->_db)
			->as_array();
	}

	/**
	 * 根据分组ID获取用户认证信息
	 * @param interger $categoryId
	 * @return array
	 */
	public function getUserCertificateByCategoryId($categoryId) {
		return DB::select('*')
			->from($this->_tableName)
			->where('category_id', '=', $categoryId)
			->execute($this->_db)
			->as_array();
	}

	/**
	 * insert 插入一条用户认证信息
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
	 * 通过用户id更新用户认证信息
	 * @param integer $userId
	 * @param array $values
	 * @return integer
	 */
	public function updateByUserId($userId, array $values = array()) {
		if(!$values) {
			return 0;
		}
		return DB::update($this->_tableName)
			->set($values)
			->where('user_id', '=', $userId)
			->execute($this->_db);
	}

	/**
	 * 搜索认证的用户数量(用于视角)
	 * @param integer $approve
	 * @param integer $type
	 * @param integer $categoryId 
	 * @param integer $isSensitive
	 * @param integer $status
	 * @param string $name
	 * @param integer $userId
	 * @param integer $operateAccount
	 * @return integer
	 */
	public function countGuppyUser($approveStatus = NULL, $isSensitive = NULL, $status = NULL, $type = 0, $categoryId = 0, $name = '', $userId = 0, $operateAccount = 0) {
		$select = DB::select(DB::expr('COUNT(*) AS recordCount'))
			->from($this->_tableName);
		if($approveStatus !== NULL) {
			$select->and_where('approve_status', '=', $approveStatus);
		}
		if($isSensitive !== NULL) {
			$select->and_where('is_sensitive', '=', $isSensitive);
		}
		if($status !== NULL) {
			$select->and_where('status', '=', $status);
		}
		if($type) {
			$select->and_where('type', '=', $type);
		}
		if($categoryId) {
			$select->and_where('category_id', '=', $categoryId);
		}
		if($name) {
			$select->and_where('name', '=', $name);
		}
		if($userId) {
			$select->and_where('user_id', '=', $userId);
		}
		if($operateAccount) {
			$select->and_where('operate_account', '=', $operateAccount);
		}
		return $select->execute($this->_db)->get('recordCount');
	}

	/**
	 * 搜索认证的用户(用于视角)
	 * @param integer $approve
	 * @param integer $type
	 * @param integer $categoryId 
	 * @param integer $isSensitive
	 * @param integer $status
	 * @param string $name
	 * @param integer $userId
	 * @param integer $operateAccount
	 * @param string $desc
	 * @param integer $number
	 * @param integer $offset
	 * @return array
	 */
	public function searchGuppyUsers($approveStatus = NULL, $isSensitive = NULL, $status = NULL, $type = 0, $categoryId = 0, $name = '', $userId = 0, $operateAccount = 0, $order = 'DESC', $number = 0, $offset = 0) {
		$select = DB::select('*')
			->from($this->_tableName);
		if($approveStatus !== NULL) {
			$select->and_where('approve_status', '=', $approveStatus);
		}
		if($isSensitive !== NULL) {
			$select->and_where('is_sensitive', '=', $isSensitive);
		}
		if($status !== NULL) {
			$select->and_where('status', '=', $status);
		}
		if($type) {
			$select->and_where('type', '=', $type);
		}
		if($categoryId) {
			$select->and_where('category_id', '=', $categoryId);
		}
		if($name) {
			$select->and_where('name', '=', $name);
		}
		if($userId) {
			$select->and_where('user_id', '=', $userId);
		}
		if($operateAccount) {
			$select->and_where('operate_account', '=', $operateAccount);
		}
		if($order) {
			$select->order_by('create_time', $order);
		}
		if($number) {
			$select->limit($number);
		}
		if($offset) {
			$select->offset($offset);
		}
		return $select->execute($this->_db)->as_array();
	}
}
