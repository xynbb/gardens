<?php
class suggestModel extends Model {

	public $_table = 'suggest';

    public $_fields = array('id','user_id','mobile','username','content','status','add_time','win_number','win_reason','win_address','win_status','win_time','win_sendtime');

	public function __construct() {
		parent::__construct();
		$this->db('dazong');
	}

    //获取建议（吐槽）详情
    public function getSuggestInfo($id)
    {
        $sql = "select `".implode('`,`', $this->_fields)."` from ".$this->_table." where `id` = {$id} order by id desc ";
        $list = $this->row($sql);
        return !empty($list)?$list:array();
    }
    
	/**
	 * 实例化类
	 * */
	public static function getInstance() {
		
		if(!(self::$_instance instanceof self)) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}
}