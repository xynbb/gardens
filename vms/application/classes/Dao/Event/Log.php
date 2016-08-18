<?php

/**
 * 事件日志事件信息数据访问层
 * @author renhai
 */
class Dao_Event_Log extends Dao {

    protected $_db = 'video';
    protected $_tableName = 'event_log';
    protected $_primaryKey = 'event_log_id';
    protected $_modelName = 'Model_Event_Log';
    protected $_routeDB = Slice_DB::MODE_NONE;
    protected $_routeTable = Slice_Table::MODE_MOD_64;

    /**
     * 插入一条事件日志
     * @param array values
     * @return array
     */
    public function insert(array $values) {
        return DB::insert($this->_tableName($values['video_id']))
	        ->columns(array_keys($values))
	        ->values(array_values($values))
	        ->execute($this->_db($values['video_id']));
    }

    /**
     * 获取一组事件日志的信息
     * @param int $videoId
     * @return array(object)
     */
    public function getEventsByVideoId($videoId) {
        return DB::select('*')
	        ->from($this->_tableName($videoId))
	        ->as_object($this->_modelName)
	        ->where('video_id', '=', $videoId)
	        ->order_by('event_log_id,create_time', 'asc')
	        ->execute($this->_db($videoId));
    }
    
}
