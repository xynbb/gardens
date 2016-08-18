<?php
/**
 * 用户认证
 * @author  xinhua.wang
 * @date  2014/03/18 
 * @version 1.0
 * 
 */
class Business_User_Certificate extends Business {

	/**
	 * 获取用户认证信息
	 * @param interger $userId
	 * @return array
	 */
	public function getUserCertificateByUserId($userId) {
		if($userId <= 0 || !is_numeric($userId)) {
			return array();
		}
		return Dao::factory('User_Certificate')->getUserCertificateByUserId($userId);
	}

	/**
	 * 根据分组ID获取用户认证信息
	 * @param interger $categoryId
	 * @return array
	 */
	public function getUserCertificateByCategoryId($categoryId) {
		if($categoryId <= 0 || !is_numeric($categoryId)) {
			return array();
		}
		return Dao::factory('User_Certificate')->getUserCertificateByCategoryId($categoryId);
	}

	/**
	 * 获取用户认证信息列表
	 * @param integer $approve
	 * @param integer $number
	 * @param integer $offset
	 * @return array
	 */
	public function getUserCertificatesByApprove($approve, $number = 0, $offset = 0) {
		if(!in_array($approve, array(Dao_User_Certificate::APPROVE_TODO, Dao_User_Certificate::APPROVE_SUCCESS, Dao_User_Certificate::APPROVE_FAIL))) {
			return array();
		}
		return Dao::factory('User_Certificate')->getUserCertificatesByApprove($approve, $number, $offset);
	}

	/**
	 * 统计用户认证信息记录数
	 * @param integer $approve
	 * @return integer
	 */
	public function countUsersByApprove($approve = NULL) {
		if($approve !== NULL && !in_array($approve, array(Dao_User_Certificate::APPROVE_TODO, Dao_User_Certificate::APPROVE_SUCCESS, Dao_User_Certificate::APPROVE_FAIL))) {
			return 0;
		}
		return Dao::factory('User_Certificate')->countCertificateUserByApprove($approve);
	}

	/**
	 * 获取用户认证信息列表
	 * @param integer $offset
	 * @param integer $number
	 * @return array
	 */
	public function getUserCertificates($offset = 0, $number = 0) {
		return Dao::factory('User_Certificate')->getUserCertificates($offset, $number);
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
		return Dao::factory('User_Certificate')->searchGuppyUsers($approveStatus, $isSensitive, $status, $type, $categoryId, $name, $userId, $operateAccount, $order, $number, $offset);
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
		return Dao::factory('User_Certificate')->countGuppyUser($approveStatus, $isSensitive, $status, $type, $categoryId, $name, $userId, $operateAccount);
	}

	/**
	 * 创建认证
	 * @param array $values
	 * @return array
	 */
	public function create(array $values) {
		$fields = array (
			'user_id' => 0,
			'category_id' => 0,
			'type' => 0,
			'approve_status' => Dao_User_Certificate::APPROVE_TODO,
			'is_active' => Dao_User_Certificate::NOT_ACTIVE,
			'is_sensitive' => Dao_User_Certificate::NOT_SENSITIVE,
			'status' => Dao_User_Certificate::STATUS_NORMAL,
			'name' => '',
			'gender' => 0,
			'employees' => 0,
			'address' => '',
			'weibo_nickname' => '',
			'contact_name' => '',
			'title' => '',
			'credential_type' => 0,
			'credential_number' => '',
			'identity' => 0,
			'department' => '',
			'email' => '',
			'phone' => '',
			'mobile' => '',
			'qq' => '',
			'contact_weibo_nickname' => '',
			'demo_url' => '',
			'demo_description' => '',
			'website' => '',
			'operate_account' => 0,
			'remark' => '',
			'create_time' => time(),
			'update_time' => time(),
		);

		$userId = Arr::get($values, 'user_id', 0);
		$type = Arr::get($values, 'type', 0);
		$name = Arr::get($values, 'name', '');
		$gender = Arr::get($values, 'gender', '');
		$employees = Arr::get($values, 'employees', 0);
		$address = Arr::get($values, 'address', '');
		$weiboNickname = Arr::get($values, 'weibo_nickname', '');
		$contactName = Arr::get($values, 'contact_name', '');
		$title = Arr::get($values, 'title', '');
		$credentialType = Arr::get($values, 'credential_type', 0);
		$credentialNumber = Arr::get($values, 'credential_number', '');
		$identity = Arr::get($values, 'identity', 0);
		$department = Arr::get($values, 'department', '');
		$email = Arr::get($values, 'email', '');
		$mobile = Arr::get($values, 'mobile', '');
		$phone = Arr::get($values, 'phone', '');
		$qq = Arr::get($values, 'qq', '');
		$contactWeiboNickname = Arr::get($values, 'contact_weibo_nickname', '');
		$demoUrl1 = Arr::get($values, 'demo_url_1', '');
		$demoUrl2 = Arr::get($values, 'demo_url_2', '');
		$demoUrl3 = Arr::get($values, 'demo_url_3', '');
		$demoDescription = Arr::get($values, 'demo_description', '');
		$website = Arr::get($values, 'website', '');

		$errors = array();
		if(!$userId) {
			$errors[] = '用户ID不能为空！';
		}
		if(!in_array($type, array(Dao_User_Certificate::TYPE_INDIVIDUAL, Dao_User_Certificate::TYPE_ORGANIZATION))) {
			$errors[] = '类型错误！';
		}
		if(!$name) {
			$errors[] = '姓名不能为空！';
		}
		if($type == Dao_User_Certificate::TYPE_INDIVIDUAL) {
			if(!in_array($gender, array(Dao_User_Certificate::GENDER_MALE, Dao_User_Certificate::GENDER_FEMALE))) {
				$errors[] = '性别错误！';
			}
			if(!in_array($identity, array(Dao_User_Certificate::IDENTITY_STUDENT, Dao_User_Certificate::IDENTITY_SOCIAL))) {
				$errors[] = '身份错误！';
			}
		}
		if($type == Dao_User_Certificate::TYPE_ORGANIZATION) {
			if(!$employees) {
				$errors[] = '机构人数不能为空！';
			}
			if(!$address) {
				$errors[] = '机构通讯地址不能为空！';
			}
			if(!$contactName) {
				$errors[] = '接口人姓名不能为空！';
			}
			if(!$title) {
				$errors[] = '接口人职务不能为空！';
			}
			if(!$contactWeiboNickname) {
				$errors[] = '接口人微博昵称不能为空！';
			}
		}
		if(!$weiboNickname) {
			$errors[] = '微博昵称为空！';
		}
		if(!in_array($credentialType, array(Dao_User_Certificate::CREDENTIAL_TYPE))) {
			$errors[] = '证件类型错误！';
		}
		if(!$credentialNumber) {
			$errors[] = '证件号码错误！';
		}
		if(!$email) {
			$errors[] = '电子邮箱不能为空！';
		}
		if(!$mobile) {
			$errors[] = '手机号码不能为空！';
		}
		if($errors) {
			throw new Business_Exception(implode(' ', $errors));
		}

		unset($values['demo_url_1']);
		unset($values['demo_url_2']);
		unset($values['demo_url_3']);
		$demoUrl = array ($demoUrl1, $demoUrl2, $demoUrl3);
		$values['demo_url'] = json_encode($demoUrl);

		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;

		return Dao::factory('User_Certificate')->insert($values);
	}

	/**
	 * 通过用户id更新用户认证信息
	 * @param array $values
	 * @return integer
	 */
	public function updateByUserId(array $values = array()) {
		$fields = array (
			'category_id' => 0,
			'type' => 0,
			'approve_status' => Dao_User_Certificate::APPROVE_TODO,
			'is_active' => Dao_User_Certificate::NOT_ACTIVE,
			'is_sensitive' => Dao_User_Certificate::NOT_SENSITIVE,
			'status' => Dao_User_Certificate::STATUS_NORMAL,
			'name' => '',
			'gender' => 0,
			'employees' => 0,
			'address' => '',
			'weibo_nickname' => '',
			'contact_name' => '',
			'title' => '',
			'credential_type' => 0,
			'credential_number' => '',
			'identity' => 0,
			'department' => '',
			'email' => '',
			'phone' => '',
			'mobile' => '',
			'qq' => '',
			'contact_weibo_nickname' => '',
			'demo_url' => '',
			'demo_description' => '',
			'website' => '',
			'operate_account' => 0,
			'remark' => '',
			'update_time' => time(),
		);

		$userId = Arr::get($values, 'user_id', 0);
		$type = Arr::get($values, 'type', 0);
		$name = Arr::get($values, 'name', '');
		$gender = Arr::get($values, 'gender', '');
		$employees = Arr::get($values, 'employees', 0);
		$address = Arr::get($values, 'address', '');
		$weiboNickname = Arr::get($values, 'weibo_nickname', '');
		$contactName = Arr::get($values, 'contact_name', '');
		$title = Arr::get($values, 'title', '');
		$credentialType = Arr::get($values, 'credential_type', 0);
		$credentialNumber = Arr::get($values, 'credential_number', '');
		$identity = Arr::get($values, 'identity', 0);
		$department = Arr::get($values, 'department', '');
		$email = Arr::get($values, 'email', '');
		$mobile = Arr::get($values, 'mobile', '');
		$phone = Arr::get($values, 'phone', '');
		$qq = Arr::get($values, 'qq', '');
		$contactWeiboNickname = Arr::get($values, 'contact_weibo_nickname', '');
		$demoUrl1 = Arr::get($values, 'demo_url_1', '');
		$demoUrl2 = Arr::get($values, 'demo_url_2', '');
		$demoUrl3 = Arr::get($values, 'demo_url_3', '');
		$demoDescription = Arr::get($values, 'demo_description', '');
		$website = Arr::get($values, 'website', '');

		$errors = array();
		if(!$userId) {
			$errors[] = '用户ID不能为空！';
		}
		if(!in_array($type, array(Dao_User_Certificate::TYPE_INDIVIDUAL, Dao_User_Certificate::TYPE_ORGANIZATION))) {
			$errors[] = '类型错误！';
		}
		if(!$name) {
			$errors[] = '姓名不能为空！';
		}
		if($type == Dao_User_Certificate::TYPE_INDIVIDUAL) {
			if(!in_array($gender, array(Dao_User_Certificate::GENDER_MALE, Dao_User_Certificate::GENDER_FEMALE))) {
				$errors[] = '性别错误！';
			}
			if(!in_array($identity, array(Dao_User_Certificate::IDENTITY_STUDENT, Dao_User_Certificate::IDENTITY_SOCIAL))) {
				$errors[] = '身份错误！';
			}
		}
		if($type == Dao_User_Certificate::TYPE_ORGANIZATION) {
			if(!$employees) {
				$errors[] = '机构人数不能为空！';
			}
			if(!$address) {
				$errors[] = '机构通讯地址不能为空！';
			}
			if(!$contactName) {
				$errors[] = '接口人姓名不能为空！';
			}
			if(!$title) {
				$errors[] = '接口人职务不能为空！';
			}
			if(!$title) {
				$errors[] = '接口人姓名不能为空！';
			}
			if(!$contactWeiboNickname) {
				$errors[] = '接口人微博昵称不能为空！';
			}
		}
		if(!$weiboNickname) {
			$errors[] = '微博昵称为空！';
		}
		if(!in_array($credentialType, array(Dao_User_Certificate::CREDENTIAL_TYPE))) {
			$errors[] = '证件类型错误！';
		}
		if(!$credentialNumber) {
			$errors[] = '证件号码错误！';
		}
		if(!$email) {
			$errors[] = '电子邮箱不能为空！';
		}
		if(!$mobile) {
			$errors[] = '手机号码不能为空！';
		}
		if($errors) {
			throw new Business_Exception(implode(' ', $errors));
		}

		unset($values['user_id']);
		unset($values['demo_url_1']);
		unset($values['demo_url_2']);
		unset($values['demo_url_3']);
		$demoUrl = array ($demoUrl1, $demoUrl2, $demoUrl3);
		$values['demo_url'] = json_encode($demoUrl);

		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;

		return Dao::factory('User_Certificate')->updateByUserId($userId, $values);
	}

	/**
	 * 通过用户id更新用户基本认证信息
	 * @param array $values
	 * @return integer
	 */
	public function updateInfoByUserId(array $values = array()) {
		$fields = array (
			'name' => '',
			'type' => 0,
			'gender' => 0,
			'employees' => 0,
			'website' => '',
			'address' => '',
			'weibo_nickname' => '',
			'contact_name' => '',
			'title' => '',
			'credential_type' => 0,
			'credential_number' => '',
			'identity' => 0,
			'department' => '',
			'email' => '',
			'phone' => '',
			'mobile' => '',
			'qq' => '',
			'contact_weibo_nickname' => '',
			'update_time' => time(),
		);

		$userId = Arr::get($values, 'user_id', 0);
		$type = Arr::get($values, 'type', 0);
		$name = Arr::get($values, 'name', '');
		$gender = Arr::get($values, 'gender', '');
		$employees = Arr::get($values, 'employees', 0);
		$address = Arr::get($values, 'address', '');
		$weiboNickname = Arr::get($values, 'weibo_nickname', '');
		$contactName = Arr::get($values, 'contact_name', '');
		$title = Arr::get($values, 'title', '');
		$credentialType = Arr::get($values, 'credential_type', 0);
		$credentialNumber = Arr::get($values, 'credential_number', '');
		$identity = Arr::get($values, 'identity', 0);
		$department = Arr::get($values, 'department', '');
		$email = Arr::get($values, 'email', '');
		$mobile = Arr::get($values, 'mobile', '');
		$phone = Arr::get($values, 'phone', '');
		$qq = Arr::get($values, 'qq', '');
		$contactWeiboNickname = Arr::get($values, 'contact_weibo_nickname', '');
		$website = Arr::get($values, 'website');

		$errors = array();
		if(!$userId) {
			throw new Business_Exception('用户ID不能为空！');
		}
		if(!in_array($type, array(Dao_User_Certificate::TYPE_INDIVIDUAL, Dao_User_Certificate::TYPE_ORGANIZATION))) {
			throw new Business_Exception('类型错误！');
		}
		if(!$name) {
			throw new Business_Exception('姓名不能为空！');
		}
		if($type == Dao_User_Certificate::TYPE_INDIVIDUAL) {
			if(!in_array($gender, array(Dao_User_Certificate::GENDER_MALE, Dao_User_Certificate::GENDER_FEMALE))) {
				throw new Business_Exception('性别错误！');
			}
			if(!in_array($identity, array(Dao_User_Certificate::IDENTITY_STUDENT, Dao_User_Certificate::IDENTITY_SOCIAL))) {
				throw new Business_Exception('身份错误！');
			}

			if(!in_array($credentialType, array(Dao_User_Certificate::CREDENTIAL_TYPE))) {
				throw new Business_Exception('证件类型错误！');
			}
			if(!$credentialNumber) {
				throw new Business_Exception('证件号码错误！');
			}
			if(!$email) {
				throw new Business_Exception('电子邮箱不能为空！');
			}
			if(!$mobile) {
				throw new Business_Exception('手机号码不能为空！');
			}
		}
		if($type == Dao_User_Certificate::TYPE_ORGANIZATION) {
			if(!$employees) {
				throw new Business_Exception('机构人数不能为空！');
			}
			if(!$address) {
				throw new Business_Exception('机构通讯地址不能为空！');
			}
			if(!$contactName) {
				throw new Business_Exception('接口人姓名不能为空！');
			}
			if(!$title) {
				throw new Business_Exception('接口人职务不能为空！');
			}
			/*if(!$contactWeiboNickname) {
				throw new Business_Exception('接口人微博昵称不能为空！');
			}*/

		}

		if(!$weiboNickname) {
			throw new Business_Exception('微博昵称为空！');
		}
		
		unset($values['user_id']);

		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;

		return Dao::factory('User_Certificate')->updateByUserId($userId, $values);
	}

	/**
	 * 审核不通过
	 * @param array $values
	 * @return integer
	 */
	public function approveStatusFail(array $values = array()) {
		$fields = array (
			'approve_status' => Dao_User_Certificate::APPROVE_FAIL,
			'remark' => '',
			'operate_account' => 0,
			'update_time' => time()
		);

		$userId = Arr::get($values, 'user_id', 0);
		$remark = Arr::get($values, 'remark', '');
		$operateAccount = Arr::get($values, 'operate_account', 0);

		$errors = array();
		if(!$userId) {
			$errors[] = '用户ID不能为空！';
		}
		$userCertificate = Dao::factory('User_Certificate')->getUserCertificateByUserId($userId);
		if(!$userCertificate[0]) {
			$errors[] = '不存在的用户！';
		}
		if(!$remark) {
			$errors[] = '审核不通过原因不能为空！';
		}
		if($operateAccount <= 0) {
			$errors[] = '修改者ID不能为空！';
		}
		if($errors) {
			throw new Business_Exception(implode(',', $errors));
		}

		unset($values['user_id']);
		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;

		$result = Dao::factory('User_Certificate')->updateByUserId($userId, $values);
		if(!$result) {
			throw new Business_Exception('修改用户认证表失败！');
		}


		return $result;
	}

	/**
	 * 审核通过
	 * @param array $values
	 * @return integer
	 */
	public function approveStatusSuccess(array $values = array()) {
		$fields = array (
			'approve_status' => Dao_User_Certificate::APPROVE_SUCCESS,
			'remark' => '',
			'operate_account' => 0,
			'update_time' => time()
		);

		$userId = Arr::get($values, 'user_id', 0);
		$operateAccount = Arr::get($values, 'operate_account', 0);

		$errors = array();
		if(!$userId) {
			$errors[] = '用户ID不能为空！';
		}
		$userCertificate = Dao::factory('User_Certificate')->getUserCertificateByUserId($userId);
		if(!$userCertificate[0]) {
			$errors[] = '不存在的用户！';
		}
		if($operateAccount <= 0) {
			$errors[] = '修改者ID不能为空！';
		}
		if($errors) {
			throw new Business_Exception(implode(',', $errors));
		}

		unset($values['user_id']);
		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;

		$result = Dao::factory('User_Certificate')->updateByUserId($userId, $values);
		if(!$result) {
			throw new Business_Exception('修改用户认证表失败！');
		}


		return $result;
	}

	/**
	 * 重新审核
	 * @param array $values
	 * @return integer
	 */
	public function approveStatusTodo(array $values = array()) {
		$fields = array (
			'approve_status' => Dao_User_Certificate::APPROVE_TODO,
			'remark' => '',
			'operate_account' => 0,
			'update_time' => time()
		);

		$userId = Arr::get($values, 'user_id', 0);
		$operateAccount = Arr::get($values, 'operate_account', 0);

		$errors = array();
		if(!$userId) {
			$errors[] = '用户ID不能为空！';
		}
		$userCertificate = Dao::factory('User_Certificate')->getUserCertificateByUserId($userId);
		if(!$userCertificate[0]) {
			$errors[] = '不存在的用户！';
		}
		if($operateAccount <= 0) {
			$errors[] = '修改者ID不能为空！';
		}
		if($errors) {
			throw new Business_Exception(implode(',', $errors));
		}

		unset($values['user_id']);
		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;

		$result = Dao::factory('User_Certificate')->updateByUserId($userId, $values);
		if(!$result) {
			throw new Business_Exception('修改用户认证表失败！');
		}


		return $result;
	}

	/**
	 * 设置敏感用户
	 * @param array $values
	 * @return integer
	 */
	public function setSensitive(array $values = array()) {
		$fields = array (
			'is_sensitive' => Dao_User_Certificate::IS_SENSITIVE,
			'operate_account' => 0,
			'update_time' => time()
		);

		$userId = Arr::get($values, 'user_id', 0);
		$operateAccount = Arr::get($values, 'operate_account', 0);

		$errors = array();
		if(!$userId) {
			$errors[] = '用户ID不能为空！';
		}
		if($operateAccount <= 0) {
			$errors[] = '修改者ID不能为空！';
		}
		if($errors) {
			throw new Business_Exception(implode(',', $errors));
		}

		unset($values['user_id']);
		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;

		$result = Dao::factory('User_Certificate')->updateByUserId($userId, $values);
		if(!$result) {
			throw new Business_Exception('修改用户认证表失败！');
		}

		return $result;
	}

	/**
	 * 取消敏感用户
	 * @param array $values
	 * @return integer
	 */
	public function unsetSensitive(array $values = array()) {
		$fields = array (
			'is_sensitive' => Dao_User_Certificate::NOT_SENSITIVE,
			'operate_account' => 0,
			'update_time' => time()
		);

		$userId = Arr::get($values, 'user_id', 0);
		$operateAccount = Arr::get($values, 'operate_account', 0);

		$errors = array();
		if(!$userId) {
			$errors[] = '用户ID不能为空！';
		}
		if($operateAccount <= 0) {
			$errors[] = '修改者ID不能为空！';
		}
		if($errors) {
			throw new Business_Exception(implode(',', $errors));
		}

		unset($values['user_id']);
		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;

		$result = Dao::factory('User_Certificate')->updateByUserId($userId, $values);
		if(!$result) {
			throw new Business_Exception('修改用户认证表失败！');
		}

		return $result;
	}

	/**
	 * 下线用户
	 * @param array $values
	 * @return integer
	 */
	public function delete(array $values = array()) {
		$fields = array (
			'status' => Dao_User_Certificate::STATUS_DELETED,
			'operate_account' => 0,
			'update_time' => time()
		);

		$userId = Arr::get($values, 'user_id', 0);
		$operateAccount = Arr::get($values, 'operate_account', 0);

		$errors = array();
		if(!$userId) {
			$errors[] = '用户ID不能为空！';
		}
		if($operateAccount <= 0) {
			$errors[] = '修改者ID不能为空！';
		}
		if($errors) {
			throw new Business_Exception(implode(',', $errors));
		}

		unset($values['user_id']);
		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;

		$result = Dao::factory('User_Certificate')->updateByUserId($userId, $values);
		if(!$result) {
			throw new Business_Exception('修改用户认证表失败！');
		}

		$profileValues = array (
			'status' => $values['status'],
			'update_time' => $values['update_time'],
		);
		$result = Dao::factory('User_Profile')->updateByUserId($userId, $profileValues);
		if(!$result) {
			throw new Business_Exception('修改用户信息表失败！');
		}

		return $result;
	}

	/**
	 * 上线用户
	 * @param array $values
	 * @return integer
	 */
	public function renormal(array $values = array()) {
		$fields = array (
			'status' => Dao_User_Certificate::STATUS_NORMAL,
			'operate_account' => 0,
			'update_time' => time()
		);

		$userId = Arr::get($values, 'user_id', 0);
		$operateAccount = Arr::get($values, 'operate_account', 0);

		$errors = array();
		if(!$userId) {
			$errors[] = '用户ID不能为空！';
		}
		if($operateAccount <= 0) {
			$errors[] = '修改者ID不能为空！';
		}
		if($errors) {
			throw new Business_Exception(implode(',', $errors));
		}

		unset($values['user_id']);
		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;

		$result = Dao::factory('User_Certificate')->updateByUserId($userId, $values);
		if(!$result) {
			throw new Business_Exception('修改用户认证表失败！');
		}

		$profileValues = array (
			'status' => $values['status'],
			'update_time' => $values['update_time'],
		);
		$result = Dao::factory('User_Profile')->updateByUserId($userId, $profileValues);
		if(!$result) {
			throw new Business_Exception('修改用户信息表失败！');
		}

		return $result;
	}

	/**
	 * 更新分组状态
	 * @param array $values
	 * @return integer
	 */
	public function updateCategory(array $values = array()) {

		$fields = array (
			'category_id' => 0,
			'update_time' => time(),
		);

		$userId = Arr::get($values, 'user_id', 0);
		$categoryId = Arr::get($values, 'category_id', 0);

		$errors = array();
		if(!$userId) {
			$errors[] = '用户ID不能为空！';
		}
		if(!$categoryId) {
			$errors[] = '分组ID不能为空！';
		}
		if($errors) {
			throw new Business_Exception(implode(' ', $errors));
		}

		$category = Dao::factory('Certificate_Category')->getCertificateCategoryByCategoryId($categoryId);
		if(!$category) {
			throw new Business_Exception('分组不存在');
		}

		unset($values['user_id']);
		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;

		return Dao::factory('User_Certificate')->updateByUserId($userId, $values);
	}
	/**
	 * 用户激活
	 * @param array $values
	 * @return integer
	 */
	public function setActive(array $values = array()) {
		$fields = array (
			'is_active' => 0,
			'update_time' => time()
		);

		$userId = Arr::get($values, 'user_id', 0);
		$isActive = Arr::get($values, 'is_active', 0);

		$errors = array();
		if(!$userId) {
			$errors[] = '用户ID不能为空！';
		}
		if(!in_array($isActive, array(Dao_User_Certificate::NOT_ACTIVE, Dao_User_Certificate::IS_ACTIVE))) {
			$errors[] = '参数有误';
		}
		if($errors) {
			throw new Business_Exception(implode(',', $errors));
		}

		unset($values['user_id']);
		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;

		return Dao::factory('User_Certificate')->updateByUserId($userId, $values);
	}
}
