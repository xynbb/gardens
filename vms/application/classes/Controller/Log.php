<?php
/**
 * 日志管理控制器
 * @author baishen
 */
class Controller_Log extends Controller_Render {

	protected $_layout = 'layouts/default';
	
	protected $_checkLogin = TRUE;

	public function action_index() {
		Controller::redirect('log/list');
	}

	/**
	 * 日志列表
	 */
	public function action_list() {
		$keyword = Arr::get($_GET, 'keyword', '');
		$number = Arr::get($_GET, 'number', 20);
		$size = 20;
		$pagination = Business::factory('Log')->getPagination($keyword, $number, $size);
		$logs = Business::factory('Log')->getLogList($keyword, $pagination->number, $pagination->offset);

		$this->_layout->content = View::factory('log/list')
			->set('logs', $logs)
			->set('pagination', $pagination);
	}

	/**
	 * 异常日志列表
	 */
	public function action_crashes() {
		$keyword = Arr::get($_GET, 'keyword', '');
		$number = Arr::get($_GET, 'number', 20);
		$size = 20;

		$pagination = Business::factory('Log_Crash')->getCrashPagination($keyword, $number, $size);
		$crashes = Business::factory('Log_Crash')->getCrashesList($keyword, $pagination->number, $pagination->offset);

		$this->_layout->content = View::factory('log/crashes')
			->set('crashes', $crashes)
			->set('pagination', $pagination);
	}
}
