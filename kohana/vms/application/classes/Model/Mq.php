<?php
/**
 * 队列
 * @author baishen
 */
class Model_Mq extends Model_BaseModel {

	const STATUS_NORMAL = 0;
	const STATUS_DELETED = -1;
	const UNSYNCHRONIZED = 0;	
	const SYNCHRONIZED = 1;	

	public function getCreateTime($format = NULL) {
		return $format ? date($format, $this->create_time) : $this->create_time;
	}

	public function getUpdateTime($format = NULL) {
		return $format ? date($format, $this->update_time) : $this->update_time;
	}

	public function getName() {
		return HTML::chars($this->name);
	}

	public function getQueueName() {
		return HTML::chars($this->queue_name);
	}

	public function getDescription() {
		return HTML::chars($this->description);
	}

	public function getDepartment() {
		return HTML::chars($this->department);
	}

	public function getSystem() {
		return HTML::chars($this->system);
	}

	public function getContactor() {
		return HTML::chars($this->contactor);
	}

	public function getEmail() {
		return HTML::chars($this->email);
	}

	public function getPhone() {
		return HTML::chars($this->phone);
	}

	public function getCallback() {
		return HTML::chars($this->callback);
	}

	public function getSynchronize($text = false) {
		if(!$text) {
			return $this->synchronize;
		}
		switch($this->synchronize) {
			case self::SYNCHRONIZED:
				return '<span class="text-success">已同步</span>';
				break;
			case self::UNSYNCHRONIZED:
				return '<span class="text-danger">未同步</span>';
				break;
			default:
				return $this->synchronize;
		}
	}

	public function getStatus($text = false) {
		if(!$text) {
			return $this->status;
		}
		switch($this->status) {
			case self::STATUS_NORMAL:
				return '<span class="text-success">正常</span>';
				break;
			case self::STATUS_DELETED:
				return '<span class="text-danger">删除</span>';
				break;
			default:
				return $this->status;
		}
	}
}
