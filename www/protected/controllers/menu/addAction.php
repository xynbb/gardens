<?php
class addAction extends Action {
    
    public function run($id=0){
		
        if($this->_isAjax())
		{
			$this->save();
		}
		
		$this->page($id);
    }
    
    //保存数据
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
                    $actions[$k]['tap']				= 0;
                    $actions[$k]['is_show']			= $_POST['m']['actions']['is_show'][$k];
                }
            }
        }
        	
        $_POST['m']['actions']		= empty($actions)?"":$actions;
        	
        //设置parent_id
        $path 						= explode(",", trim($_POST['m']['path'],','));
        $cnt						= count($path)-1;
        $cnt						= $cnt<0?0:$cnt;
        $_POST['m']['parent_id']	= $path[$cnt];
        $_POST['m']['create_time']	= date("Y-m-d H:i:s");
        $_POST['m']['create_id']	= $this->user['id'];
        $_POST['m']['status']		= 1;
        $_POST['m']['tap']			= 0;
        $_POST['m']['actions'] 		= !empty($_POST['m']['actions'])?json_encode($_POST['m']['actions']):"";
        $re                         =  rbac_menuModel::getInstance()->add($_POST['m']);
        //保存数据
        if($re)
        {
            $id = rbac_menuModel::getInstance()->insert_id();
            //修改path
            rbac_menuModel::getInstance()->updateMenuPath($id);
        
            $this->success(array('js'=>"alert('保存成功!');"._PARENT_RELOAD_._LAYER_CLOSE_),true);
        }
        else
        {
            $this->error(array('js'=>"alert('保存失败!');"),true);
        }
    }
    
    //页面
    private function page($id) {
        //获取上级菜单
        $this->view['select'] 	= rbac_menuModel::getInstance()->getMenuSelect();
        $this->view['id'] 		= $id;
        
        $this->view('/index');
    }
}