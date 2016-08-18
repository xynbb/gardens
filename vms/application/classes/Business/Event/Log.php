<?php

/**
 * 视频事件管理业务逻辑类
 */
class Business_Event_Log extends Business {

	/**
	 * 插入新视频事件
	 * @param array $values
	 * @return inter
	 */
	public function create(array $values) {
		$fields = array(
		    'video_id' => 0,
		    'message' => '',
		    'params' => '',
		    'ip' => '',
		    'create_time' => time(),
		);

		//获取传入的信息
		$videoId = $values['video_id'];
		$message = $values['message'];
		$ip = $values['ip'];
		$createTime = $values['create_time'];
		$params = $values['params'];
		//判断必填项
		$errors = array();
		if (!$videoId) {
			$errors[] = 'video_id不能为空！';
		}
		if (!$message) {
			$errors[] = 'message内容不能为空！';
		}
		if (!$ip) {
			$errors[] = 'IP不能为空！';
		}
		if (!$createTime) {
			$errors[] = 'createTime不能为空！';
		}
		if ($errors) {
			throw new Business_Exception(implode(' ', $errors));
		}

		$data = array_merge($fields, array(
		    'video_id' => $videoId,
		    'message' => $message,
		    'params' => $params,
		    'ip' => $ip,
		    'create_time' => $createTime,
		));

		return Dao::factory("Event_Log")->insert($data);
	}

	/**
	 * 根据视频事件id查询视频事件信息
	 * @param integer $videoId
	 * @return array
	 */
	public function getEventsByVideoId($videoId) {
		//获取视频转码，分发状态
		$video = Dao::factory('Video')->getVideoByVideoId($videoId)->current();
		
		//视频转码日志
		$videoLogs = Dao::factory('Event_Log')->getEventsByVideoId($videoId)->as_array();
		foreach ($videoLogs as $key => $log) {
			$videoLogs[$key]->create_time = date('Y-m-d H:i:s',$log->create_time);
		}
		$videoEventLogs = array('videoLogs' => $videoLogs, 'convert_status' => $video->convert_status,'distribute_status' => $video->distribute_status);
		return $videoEventLogs;
	}

}
