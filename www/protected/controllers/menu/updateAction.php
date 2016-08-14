<?php
class updateAction extends Action {
    
    public function run($id=0){
        //获取menuController信息
		$this->view['menu'] 	= rbac_menuModel::getInstance()->getMenuById(empty($id)?$_POST['m']['id']:$id);
		
		if($this->_isAjax())
		{
		    $this->save();
		}
		
		$this->page();
    }
    
    //页面
    private function page() {
        //获取上级菜单
        $this->view['select']	= rbac_menuModel::getInstance()->getMenuSelect();
        
        $this->view('/index');
    }
    
    //保存
    private function save() {
        
        $actions = array();
        	
        if(isset($_POST['m']['actions'])&&!empty($_POST['m']['actions']))
        {
            //组装子级菜单数组actions
            foreach ($_POST['m']['actions']['is_show'] as $k=>$v)
            {
                if(!empty($_POST['m']['actions']['action'][$k])||!empty($_POST['m']['actions']['url'][$k]))
                {
                    $actions[$k]['zh_name']			= $_POST['m']['actions']['zh_name'][$k];
                    $actions[$k]['controller'] 		= $_POST['m']['actions']['controller'][$k];
                    $actions[$k]['action'] 			= $_POST['m']['actions']['action'][$k];
                    $actions[$k]['query_string'] 	= $_POST['m']['actions']['query_string'][$k];
                    $actions[$k]['url'] 			= $_POST['m']['actions']['url'][$k];
                    $actions[$k]['is_show']			= $_POST['m']['actions']['is_show'][$k];
                }
            }
        }
        
        $_POST['m']['actions']		= empty($actions)?"":$actions;
        $_POST['m']['path']			= $_POST['m']['path'].$_POST['m']['id'].",";
        
        //设置parent_id
        $path 						= explode(",", trim($_POST['m']['path'],','));
        $cnt						= count($path)-2;
        $cnt						= $cnt<0?0:$cnt;
        $_POST['m']['parent_id']	= $path[$cnt];
        $_POST['m']['update_time']	= date("Y-m-d H:i:s");
        $_POST['m']['update_id']	= $this->user['id'];
        $_POST['m']['actions'] 		= !empty($_POST['m']['actions'])?json_encode($_POST['m']['actions']):"";
        	
        	
        //修改子级path
        rbac_menuModel::getInstance()->updateMenuPath($this->view['menu']['path'],$_POST['m']['path']);
        	
        //保存数据
        if(rbac_menuModel::getInstance()->update($_POST['m'], 'id=:id',array(':id'=>$_POST['m']['id'])))
            $this->success(array('js'=>"alert('保存成功!');"._PARENT_RELOAD_._LAYER_CLOSE_),true);
        else
            $this->error(array('js'=>"alert('保存失败!');"),true);
    }
}