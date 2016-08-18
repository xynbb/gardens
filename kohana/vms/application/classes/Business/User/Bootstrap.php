<?php
/**
* 用户引导状态Business
* @author  wuchaobo
* @date 2014年5月22日 下午3:53:08
*/ 
class Business_User_Bootstrap extends Business {
	/**
	 * 获取个人首页引导记录
	 * @param integer $userId
	 * @return array
	 */
	public function getUserIndexBootstrapByUserId($userId) {
		if(!is_numeric($userId) || $userId <= 0) {
			return array();
		}
		return Dao::factory('User_Bootstrap')->getUserBootstrapByUserId($userId, Dao_User_Bootstrap::USERINDEX);
	}
	/**
	 * 获取个人中心引导记录
	 * @param integer $userId
	 * @return array
	 */
	public function getUserProfileBootstrapByUserId($userId) {
		if(!is_numeric($userId) || $userId <= 0) {
			return array();
		}
		return Dao::factory('User_Bootstrap')->getUserBootstrapByUserId($userId, Dao_User_Bootstrap::USERPROFILE);
	}
	/**
	 * createUserBootstrap 
	 * 创建一条引导记录
	 * @param array $values 
	 * @access public
	 * @return integer 
	 */
	public function createUserBootstrap($values) {
		$fields = array(
			'user_id' => '0',
			'page' => '',
			'create_time' => time()
		);
		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;
		$errors = array();
		if(!is_numeric($values['user_id']) || $values['user_id'] <= 0 ) {
			$errors[] = '用户ID错误';
		}
		if($values['page'] == '') {
			$errors[] = '页面标识不能为空';
		}
		if(!empty($errors)) {
			throw new Business_Exception(implode(' ', $errors));
		}
		return Dao::factory('User_Bootstrap')->create($values);
	}
}
