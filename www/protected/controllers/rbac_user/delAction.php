<?php
class delAction extends Action {
    
    public function run(){
        
    if(!$this->_isAjax()) return ;
    
    if(!isset($_POST['id']) || empty($_POST['id'])) $this->error("删除失败！");
	
    $re  = rbac_userModel::getInstance()->update(array('status'=>2),'id=:id', array('id'=>$_POST['id']));
		
	if(is_numeric($re))
		$this->success("删除成功！");
	else
		$this->error("删除失败！");
    }
}