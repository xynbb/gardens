<?php
/**
* 个人中心模板主题模型
* @author  xinhua.wang
* @date 2014年3月18日
*/ 
class Dao_User_Style extends Dao {
	protected $_db = 'vblog';
	
	protected $_tableName = 'style';
	
	protected $_primaryKey = 'style_id';
	
	/**
	 * 
	 * 获取主题信息
	 * @param integer $styleId 主题id
	 * @return array
	 */
	public function getStyleByStyleId($styleId) {
		if(empty($styleId)) {
			return array();
		}
		return DB::select('*')
		    ->from($this->_tableName)
		    ->where('style_id', '=', $styleId)
		    ->execute($this->_db)
		    ->as_array();
	}

	/**
	 * 获取模板主题列表
	 * @param integer $offset
	 * @param integer $pagesize
	 * @return array
	 */
	public function getStyles($offset = 0, $number = 0) {
		$select = DB::select('*')
			->from($this->_tableName)
			->order_by('style_id', 'ASC');

		if($offset) {
			$select->offset($offset);
		}
		if($number) {
			$select->limit($number);
		}
		return $select->execute($this->_db)->as_array();
	}
}
