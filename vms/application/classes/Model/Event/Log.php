<?php

/**
 * 视频事件日志信息model
 * @author pengmeng
 */
class Model_Event_Log extends Model_BaseModel {

	public function getCreateTime($format = NULL) {
		return $format ? date($format, $this->create_time) : $this->create_time;
	}

	public function getEventTime($format = NULL) {
		return $format ? date($format, $this->event_time) : $this->event_time;
	}

	public function getParamsArray() {
		return json_decode($this->post, true);
	}
	public function getParamsJson() {
		return $this->params;
	}
	public function getMessage() {
		return HTML::chars($this->message);
	}

}
