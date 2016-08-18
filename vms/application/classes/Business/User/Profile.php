<?php
/**
 * 用户模型
 * @author  xinhua.wang
 * @date  2014/03/13 
 * @version 1.0
 * 
 */
class Business_User_Profile extends Business {

	/**
	 * 获取用户信息
	 * @param int $userId  用户id
	 * @return array
	 */
	public function getUserProfileByUserId($userId) {
		if(!is_numeric($userId)) {
			return array();
		}
		return Dao::factory('User_Profile')->getUserProfileByUserId($userId);
	}

	/**
	 * 获取用户信息列表
	 * @param integer $offset
	 * @param integer $number
	 * @return array
	 */
	public function getUserProfiles($offset = 0, $number = 0) {
		$userCertificates = Dao::factory('User_Certificate')->getUserCertificates($offset, $number);
		$userIds = array();
		foreach((array)$userCertificates as $userCertificate) {
			$userIds[] = $userCertificate['user_id'];
		}
		if(!$userIds) {
			return array();
		}

		return Dao::factory('User_Profile')->getUserProfilesByUserIds($userIds);
	}

	/**
	 * 根据搜索条件获取用户信息列表(没有找到有使用的地方,暂时保留再观察下)
	 * @param integer $offset
	 * @param integer $number
	 * @param array $searchConditions
	 * @return array
	public function getUserProfilesBySearchConditions($offset = 0, $number = 0, array $searchConditions = array()) {
		$approve = NULL;
		$userCertificates = Dao::factory('User_Certificate')->getUserCertificatesBySearchConditions($offset, $number, $approve, $searchConditions);

		$userIds = array();
		foreach($userCertificates as $userCertificate) {
			$userIds[] = $userCertificate['user_id'];
		}
		if(!$userIds) {
			return array();
		}

		return Dao::factory('User_Profile')->getUserProfilesByUserIds($userIds);
	}
	 */

	/**
	 * 创建用户信息
	 * @param array $values
	 * @throws Business_Exception
	 */
	public function createUserProfile(array $values) {
		$fields = array(
			'user_id' => 0,
			'style_id' => 0,
			'banner_image' => '',
			'previous_banner_image' => '',
			'footer_background_color' => '',
			'domain' => '',
			'website' => '',
			'remark' => '',
			'certificate' => 0,
			'approve_status' => 0,
			'is_active' => 0,
			'status' => 0,
			'create_time' => time(),
			'update_time' => time(),
		);
		$userId = Arr::get($values, 'user_id', 0);
		$styleId = Arr::get($values, 'style_id', 0);
		$certificate = Arr::get($values, 'certificate', 0);
		$approveStatus = Arr::get($values, 'approve_status', 0);
		$isActive = Arr::get($values, 'is_active', 0);
		$status = Arr::get($values, 'status', 0);
		$errors = array();
		if(!is_numeric($userId) || $userId <= 0) {
			$errors[] = '用户ID不能为空';
		}
		if(!is_numeric($styleId)) {
			$errors[] = '主题ID不合法';
		}
		if(!is_numeric($certificate)) {
			$errors[] = '认证类型不合法';
		}
		if(!is_numeric($approveStatus)) {
			$errors[] = '认证审核状态不合法';
		}
		if(!is_numeric($isActive)) {
			$errors[] = '激活信息不合法';
		}
		if(!is_numeric($status)) {
			$errors[] = '用户状态不合法';
		}
		if($errors) {
			throw new Business_Exception(implode(' ', $errors));
		}
		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;
		return Dao::factory('User_Profile')->insert($values);
	}
	/**
	 * 
	 * 通过用户id更新用户信息
	 * @param array $values
	 * @return integer
	 */
	public  function updateByUserId(array $values = array()) {
		$fields = array(
			'style_id' => '',
			'background_image' => '',
			'banner_image' => '',
			'previous_banner_image' => '',
			'footer_background_color' => '',
			'domain' => '',
			'update_time' => time(),
		);
		$userId = Arr::get($values, 'user_id', 0);
		$errors = array();
		if(!$userId) {
			$errors[] = '用户不能为空！';
		}
		// 后续添加其他错误信息
		if($errors) {
			throw new Business_Exception(implode(' ', $errors));
		}
		// 后续判定是否存在重复值等信息
		$values = array_intersect_key($values, $fields);
	
		return Dao::factory('User_Profile')->updateByUserId($userId, $values);
	}

	/**
	 * 通过用户id更新用户认证信息
	 * @param array $values
	 * @return integer
	 */
	public  function updateCertificate(array $values = array()) {
		$fields = array (
			'certificate' => Dao_User_Certificate::TYPE_NONE,
			'approve_status' => Dao_User_Certificate::APPROVE_TODO,
			'is_active' => Dao_User_Certificate::NOT_ACTIVE,
			'status' => Dao_User_Certificate::STATUS_NORMAL,
			'remark' => '',
			'update_time' => time(),
		);

		$userId = Arr::get($values, 'user_id', 0);
		$certificate = Arr::get($values, 'certificate', NULL);
		$approveStatus = Arr::get($values, 'approve_status', NULL);
		$isActive = Arr::get($values, 'is_active', NULL);
		$status = Arr::get($values, 'status', NULL);
		$remark = Arr::get($values, 'remark', '');

		$errors = array();
		if(!$userId) {
			$errors[] = '用户不能为空！';
		}
		if($certificate === NULL) {
			unset($fields['certificate']);
			unset($values['certificate']);
		} elseif(!in_array($certificate, array(Dao_User_Certificate::TYPE_NONE, Dao_User_Certificate::TYPE_INDIVIDUAL, Dao_User_Certificate::TYPE_ORGANIZATION))) {
			$errors[] = '认证类型错误！';
		}
		if($approveStatus === NULL) {
			unset($fields['approve_status']);
			unset($values['approve_status']);
		} elseif(!in_array($approveStatus, array(Dao_User_Certificate::APPROVE_TODO, Dao_User_Certificate::APPROVE_SUCCESS, Dao_User_Certificate::APPROVE_FAIL))) {
			$errors[] = '审核状态错误！';
		}
		if($isActive === NULL) {
			unset($fields['is_active']);
			unset($values['is_active']);
		} elseif(!in_array($isActive, array(Dao_User_Certificate::IS_ACTIVE, Dao_User_Certificate::NOT_ACTIVE))) {
			$errors[] = '激活状态错误！';
		}
		if($status === NULL) {
			unset($fields['status']);
			unset($values['status']);
		} elseif(!in_array($status, array(Dao_User_Certificate::STATUS_NORMAL, Dao_User_Certificate::STATUS_DELETED))) {
			$errors[] = '用户状态错误！';
		}
		if($errors) {
			throw new Business_Exception(implode(' ', $errors));
		}

		unset($values['user_id']);

		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;

		return Dao::factory('User_Profile')->updateByUserId($userId, $values);
	}

	/**
	 * 驳回用户背景图
	 * @param array $values
	 * @return integer
	 */
	public function rejectBackgroundImage($values) {
		$fields = array (
			'background_image' => '',
			'remark' => '',
			'update_time' => time()
		);

		$userId = Arr::get($values, 'user_id', 0);
		$remark = Arr::get($values, 'remark', '');

		$errors = array();
		if(!$userId) {
			$errors[] = '用户ID不能为空！';
		}
		$userProfile = Dao::factory('User_Profile')->getUserProfileByUserId($userId);
		if(!$userProfile[0]) {
			$errors[] = '不存在的用户！';
		}
		if(!$remark) {
			$errors[] = '原因不能为空！';
		}
		if($errors) {
			throw new Business_Exception(implode(',', $errors));
		}

		unset($values['user_id']);
		$values['background_image'] = $userProfile[0]['previous_background_image'];
		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;

		return Dao::factory('User_Profile')->updateByUserId($userId, $values);
	}

	/**
	 * checkDomain 根据用户id和域名获取用户完整信息
	 * @param mixed $domain 
	 * @access public
	 * @return array 
	 */
	public function getRecordByDomain($userId, $domain) {
		if (!is_numeric($userId) || $userId <= 0 || empty($domain)) {
			return array();
		}
		return Dao::factory('User_Profile')->getRecordByDomain($userId, $domain);
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

		return Dao::factory('User_Profile')->updateByUserId($userId, $values);
	}
}
