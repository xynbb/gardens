<?php
class addAction extends Action {
    
    public function run(){
		
        if($this->_isAjax())
		{
			$this->save();
		}
		
		$this->page();
    }
    
    //保存数据
    private function save() {
        
		$masterModel = rbac_userModel::getInstance();
		$row = $masterModel->check_uname($_POST['m']['uname']);
	
		if(!empty($row))
		{
			$this->error(array('js'=>"alert('此账户已存在!');"._LAYER_CLOSE_),true);
		}
		
		$_POST['m']['create_time']	= date("Y-m-d H:i:s");
		$_POST['m']['login_time']	= date("Y-m-d H:i:s");			
		$_POST['m']['create_id']	= $this->user['id'];
		$_POST['m']['update_id']	= $this->user['id'];
		$_POST['m']['update_time']	= $_POST['m']['create_time'];
		$_POST['m']['passwd']		= md5('88888888');
		$_POST['m']['tap']			= 0;

		//保存数据
		if(rbac_userModel::getInstance()->add($_POST['m']))
			$this->success(array('js'=>"alert('保存成功!');"._PARENT_SEARCH_._LAYER_CLOSE_),true);
		else
			$this->error(array('js'=>"alert('保存失败!');"),true);
    }
    
    //页面
    private function page() {
        $this->view('/index');
    }
}