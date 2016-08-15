<?php
class addAction extends Action {
    
    public function run() {
        if($this->_isAjax()) {
           $this->save();
        }
		
        $this->page();
    }
    
    //展示
    private function page() {
        $this->view("/index");
    }
    
    //保存
    private function save() {
        $insert = array(
            'name' => $_POST['r']['name'],
            'sort' => $_POST['r']['sort'],
            'status' => $_POST['r']['status'],
            'create_time' => date("Y-m-d H:i:s"),
            'update_time' => date("Y-m-d H:i:s")
        );
        
        $res = gardenModel::getInstance()->insert($insert);
        //保存数据
        if($res) {
            $this->success(array('js'=>"alert('保存成功!');"._PARENT_RELOAD_._LAYER_CLOSE_),true);
        } else {
            $this->error(array('js'=>"alert('保存失败!');"),true);
        }
    }
}