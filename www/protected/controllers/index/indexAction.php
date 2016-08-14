<?php
class indexAction extends Action {
	public $needLogin = false;
    public function run(){
		
		$this->view('index');
    }
}