<?php
class Model_System extends Model_BaseModel {
	
	public function getCreateTime($format = NULL) {
		return $format ? date($format, $this->create_time) : $this->create_time;
	}

	public function getUpdateTime($format = NULL) {
		return $format ? date($format, $this->update_time) : $this->update_time;
	}

	public function getName() {
		return HTML::chars($this->name);
	}
	
	public function getDomain() {
		return HTML::chars($this->domain);
	}
}
