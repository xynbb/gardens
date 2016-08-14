<?php
class addAction extends Action {
    
    public function run($id=0){
        
        if($this->_isAjax())
        {
           $this->save();
        }
		
        $this->page($id);
    }
    
    //页面
    private function page($id)
    {
        //获取上级菜单
        $this->view['select'] = rbac_roleModel::getInstance()->getRoleSelect();
        $this->view['id']     = $id;
        
        $this->view("/index");
    }
    
    //保存
    private function save()
    {
        //设置parent_id
        $path 						= explode(",", trim($_POST['r']['path'],','));
        $cnt						= count($path)-1;
        $cnt						= $cnt<0?0:$cnt;
        $_POST['r']['parent_id']	= $path[$cnt];
        $_POST['r']['create_time']	= date("Y-m-d H:i:s");
        $_POST['r']['create_id']	= $this->user['id'];
        $_POST['r']['status']		= 1;
        
        $re = rbac_roleModel::getInstance()->add($_POST['r']);
        //保存数据
        if($re) {
            $id = rbac_roleModel::getInstance()->insert_id();
            //修改path
            rbac_roleModel::getInstance()->updateRolePath($id);
            $this->success(array('js'=>"alert('保存成功!');"._PARENT_RELOAD_._LAYER_CLOSE_),true);
        } else {
            $this->error(array('js'=>"alert('保存失败!');"),true);
        }
    }
}