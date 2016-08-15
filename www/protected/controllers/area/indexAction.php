<?php
class indexAction extends Action {

    public function run(){

        $this->view['list'] = areaModel::getInstance()->getList();

        if(!$this->_isAjax())
            $this->view('/index');
        else
            $this->success($this->view('index_result',true));
    }
}