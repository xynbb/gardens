<?php
/**
 * 个人中心模板主题
 * @author  xinhua.wang
 * @date  2014/03/18
 * @version 1.0
 * 
 */
class Business_User_Style extends Business {

	/**
	 * 获取模板主题
	 * @param int $styleId  参数
	 * @return array
	 */
	public function getStyleByStyleId($styleId) {
		if(!is_numeric($styleId)) {
			return array();
		}
		return Dao::factory('User_Style')->getStyleByStyleId($styleId);
	}
	/**
	 * 查询列表
	 * @param integer $offset
	 * @param integer $number
	 * @return array
	 */
	public function getStyles($offset = 0, $number = 0) {
		return Dao::factory('User_Style')->getStyles($offset, $number);
	}
}
