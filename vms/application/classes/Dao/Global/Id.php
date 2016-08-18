<?php
class Dao_Global_Id extends Dao {
	
	protected $_db = 'video';
	
	protected $_tableName = 'global_id';
	
	protected $_primaryKey = 'video_id';
	
	/**
	 * 生成视频id
	 * @return array
	 */
	public function generate() {
		$token = md5(uniqid());
		$result = DB::insert($this->_tableName)
			->columns(array('token', 'create_time'))
			->values(array($token, time()))
			->execute($this->_db);
		return $result[0] ? array('video_id' => $result[0], 'token' => $token) : array();
	}
	
	/**
	 * 获取video_id记录
	 * @param integer $videoId
	 * @return array
	 */
	public function getVideoId($videoId) {
		return DB::select('video_id', 'token')
			->from($this->_tableName)
			->where('video_id', '=', $videoId)
			->execute($this->_db)
			->as_array();
	}
	
	/**
	 * 删除一个video_id记录（证明已被使用）
	 * @param integer $videoId
	 * @return integer
	 */
	public function delete($videoId) {
		return DB::delete($this->_tableName)
			->where('video_id', '=', $videoId)
			->execute($this->_db);
	}
}