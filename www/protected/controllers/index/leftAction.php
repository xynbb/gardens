<?php
class leftAction extends Action {
    public function run($id=0){
        
        $menu_model = rbac_menuModel::getInstance();
        
        $this->view['list']		 = array();
        $this->view['p_name']	 = array();
        
        if(empty($id)) return ;
        
        $this->view['p_name'] = $menu_model->getNameById($id);
            	
        if($this->isSuper)
        {
            $list = $menu_model->getLeftMenu($id);

            $this->view['list'] = $this->setMenu($list);
        }
        else
        {
            $list = $menu_model->getMenuByRole(implode(',', array_keys($this->role)),$id);
    
            $this->view['list'] = $this->setMenu($list);
        }
        
		$this->view('left');
    }
    
    private function setMenu($list)
    {
        if(empty($list)) return array();
    
        $menu = array();
    
        foreach ($list as $k=>$v)
        {
            $menu[]			= $v;
            	
            $controller 	= $v['controller'];
            $actions 		= !empty($v['actions'])?json_decode($v['actions'],true):array();
    
            foreach ($actions as $k1=>$v1)
            {
                if(!empty($v1['is_show']))
                {
                    $controller = empty($v1['controller'])?$controller:$v1['controller'];
                    	
                    if($this->isSuper||$this->checkCA($controller,$v1['action']))
                    {
                        $menu[$k]['urls'][$k1]['name'] = $v1['zh_name'];
                        	
                        if(!empty($v1['url']))
                            $menu[$k]['urls'][$k1]['url'] = $v1['url'].(empty($v1['query_string'])?'':'?'.$v1['query_string']);
                        else
                            $menu[$k]['urls'][$k1]['url'] = "/{$controller}/{$v1['action']}"."?menu_id={$v['id']}".(empty($v1['query_string'])?'':'&'.$v1['query_string']);;
                    }
                }
            }
        }
        return $menu;
    }
}