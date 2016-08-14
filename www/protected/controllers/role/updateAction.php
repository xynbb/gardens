<?php
class updateAction extends Action {
    
    public function run($id=0){
        //获取menu信息
        $this->view['info'] = rbac_roleModel::getInstance()->getRoleById(empty($id)?$_POST['r']['id']:$id);
        
        if($this->_isAjax())
        {
           $this->save();
        }
        
        $this->page();
    }
    
    private function page() {
        //获取上级菜单
        $this->view['select'] = rbac_roleModel::getInstance()->getRoleSelect();
        
        $this->view("/index");
    }
    
    private function save() {
        $_POST['r']['path']			= $_POST['r']['path'].$_POST['r']['id'].",";
        
        //设置parent_id
        $path 						= explode(",", trim($_POST['r']['path'],','));
        $cnt						= count($path)-2;
        $cnt						= $cnt<0?0:$cnt;
        $_POST['r']['parent_id']	= $path[$cnt];
        $_POST['r']['update_time']	= date("Y-m-d H:i:s");
        $_POST['r']['update_id']	= $this->user['id'];
         
        //修改子级path
        rbac_roleModel::getInstance()->updateRolePath($this->view['info']['path'],$_POST['r']['path']);
         
        //保存数据
        if(rbac_roleModel::getInstance()->update($_POST['r'],'id=:id', array(':id'=>$_POST['r']['id'])))
            $this->success(array('js'=>"alert('保存成功!');"._PARENT_RELOAD_._LAYER_CLOSE_),true);
        else
            $this->error(array('js'=>"alert('保存失败!');"),true);
    }
}