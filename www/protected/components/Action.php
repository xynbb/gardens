<?php
/**
 * 增加输出api结果支
 *
 */

class Action extends CAction
{
	use TraitController;
	
    /**
     * apiResult对象
     *
     * @var unknown_type
     */
    public $apiResult;
	
	public $view    		= array();
	//用户信息
	public 	  $user 	 	= array();
	//是否登录
	public    $isLogin 	 	= false;
	//角色信息
	public    $role  	 	= array();
	//权限信息
	private   $priv		 	= array();
	//是否需要登录
	public $needLogin		= true;
	//无登陆状态或者无后台操作权限跳转根目录
	public $loginUrl  		= '/';
	//是否为超级管理员
	protected $isSuper 	 	= false;
	//不检查的Action    true/Action
	protected $noCheck 	 	= array('index','main','top','left','right','footer','logout','newpassword');
	
    public function __construct($controller,$id){

        parent::__construct($controller,$id);
        
        define('__CONTROLLER__' ,substr(strtolower(get_class($controller)),0,-10));
        define('__ACTION__'     ,$id);
		
        $this->apiResult = new ApiResult;
        //初始化
        $this->init();
        //检查用户信息
        $this->checkLogin();
        //获取操作配置文件
        //$this->getActionConfig();
        $this->addSiteLog();
    }
	
    //初始化
    private function init()
    {
        $this->view['_this']	 = $this;
		$this->view['_user']	 = $_SESSION['_user_'];
		$this->view['_isSuper']  = $_SESSION['isSuper'];
		
        define('_LAYER_CLOSE_'	, 'parent.layer.closeAll();');
        define('_PARENT_SEARCH_', 'parent.main_iframe.rightFrame.search();');
        define('_PARENT_RELOAD_', 'parent.main_iframe.rightFrame.location.reload();');
    }
    
    
    //获取config配置信息
    private function getActionConfig()
    {
        $configName = "coder/".$this->controller->id;
    
        $this->config->load($configName,TRUE,true);//加载自定义配置文件
    
        $config = $this->config->item($configName);//定义配置文件属性
    
        $_js_  = isset($config['js'][$this->id])?$config['js'][$this->id]:array();
        $_js_p = isset($config['js']['default'])?$config['js']['default']:array();
    
        $this->view['_js_'] = array_merge($_js_,$_js_p);
    
        $_css_  = isset($config['css'][$this->id])?$config['css'][$this->id]:array();
        $_css_p = isset($config['css']['default'])?$config['css']['default']:array();
    
        $this->view['_css_']  = array_merge($_css_,$_css_p);
    
        $this->view['_body_style_'] = isset($config['body_style'][$this->id])?$config['body_style'][$this->id]:'';
    
        $this->view['_code_'] = isset($config['code'][$this->id])?$config['code'][$this->id]:array();
    }
    
    
    //检查登录
    protected function checkLogin()
    {
        //获取登录信息
        $this->getUserInfo();
		
        //登录过期用
        if(!$this->isLogin)
        {
            //不需要登录
            if($this->needLogin===false||(is_array($this->needLogin)&&in_array($this->id, $this->needLogin))) return true;
    
            	
            $this->error('您没有登录或登录已过期',$this->loginUrl,'_parent');
        }
    
        //检查权限
        $this->checkPriv();
    }
    
    
    //获取用户信息
    private function getUserInfo()
    {
        $this->view['user'] = $this->user = rbac_userModel::getInstance()->getUserInfo(null);
    
        if(!empty($this->user) )
        {
            $this->isLogin = true;
            $this->view['role'] = $this->role = rbac_user_roleModel::getInstance()->getRoleIdsByUserId($this->user['id']);
            $this->view['priv'] = $this->priv = rbac_privModel::getInstance()->getPrivByRoleIds(array_keys($this->role));
        }
    }
    
    //检查权限
    protected function checkPriv()
    {
        if($this->isLogin)
        {
            //验证是否存在角色
            if(empty($this->role))
            {
                rbac_userModel::getInstance()->destroy_session();
    
                $this->error("对不起您没权利操作后台！",$this->loginUrl,'_parent');
            }
			
            //超级管理员不检查权限
            if($this->isSuper()||$this->noCheck()){
				return true;
			}
			
			//检查权限
            if(!$this->checkCA($this->controller->id, $this->id))
            {
                $this->error("您没有权限操作1！",$this->loginUrl,'_parent');
            }
          
        }
    }
    
    //验证是否为超级管理员
    private function isSuper()
    {
        if(!isset($_SESSION['isSuper']))
        {
            //验证是否为超级管理员
            if(!empty($this->role))
            {
                foreach ($this->role as $v)
                {
                    if(!empty($v['is_super'])) $_SESSION['isSuper']  = true;
                }
            }
        }
    
        $this->isSuper  = isset($_SESSION['isSuper'])?$_SESSION['isSuper']:false;
    
        return $this->isSuper;
    }
    
    //过滤公共方法
    private function noCheck()
    {
        //不验证当前controller
        if($this->noCheck===false) return true;
   
        //去除不需要验证的 action
        if(!empty($this->noCheck)&&in_array($this->id, $this->noCheck)) return true;
    
        return false;
    }
    
    //检查 Controller 和 Action
    public function checkCA($controller,$action)
    {
        if($this->isSuper) return true;
    
        if(!$this->isLogin || !isset($this->priv[$controller]) || !in_array($action, $this->priv[$controller]))
            return false;
    
        return true;
    }
    
    //获取导航
    public function getNav()
    {

        $menu_id = $this->request('menu_id');
    
        $nav = '<div class="place"><span>位置：</span><ul class="placeul"><li><a href="/index/right">首页</a></li>';

        if(!empty($menu_id))
        {
            $menuModel = rbac_menuModel::getInstance();
            $path	    = $menuModel->getPathById($menu_id);
            	
            $path		= substr($path, 2);
            $menu		= $menuModel->getParentByIds($path);
            
            if(!empty($menu))
            {
                foreach ($menu as $k=>$v)
                {
                    if(empty($k))
                    {
                        $nav .= "<li><a href='/index/left?id={$v['id']}' target='leftFrame'>{$v['name']}</a></li>";
                    }
                    else
                    {
                        $nav .= "<li><a href='javascript:;'>{$v['name']}</a></li>";
                    }
                    	
                    $controller 	= $v['controller'];
                    $actions 		= !empty($v['actions'])?json_decode($v['actions'],true):array();
                    	
                    foreach ($actions as $k1=>$v1)
                    {
                        $controller = empty($v1['controller'])?$controller:$v1['controller'];
    
                        if($this->getId()==$v1['action']&&Yii::app()->getController()->id==$controller)
                        {
                            $nav .= "<li><a href='".("/{$controller}/{$v1['action']}"."?menu_id={$v['id']}".(empty($v1['query_string'])?'':'&'.$v1['query_string']))."'>{$v1['zh_name']}</a></li>";
                        }
    
                    }
                    	
                }
            }
        }
    
        $nav .= '</ul></div>';
        return $nav;
    }
    
    public function view($view,$return=false){
        return $this->getController()->render($view,$this->view,$return);
    }
	
	/**
	 * @author whf
	 * @time 20151010
	 * 判断是否为Ajax提交
	 * @return boole
	 */
	protected function _isAjax()
	{
		return !empty($_POST['ajax'])?true:false;
	}

	/**
	 * @author whf
	 * @time 20151010
	 * 判断是否为post提交
	 * @return boole
	 */
	protected function _isPost()
	{
		return $this->_method("POST");
	}
	
	/**
	 * @author whf
	 * @time 20151010
	 * 判断是否为GET提交
	 * @return boole
	 */
	protected function _isGet()
	{
		return $this->_method("GET");
	}

	/**
	 * @author whf
	 * @time 20151010
	 * 判断提交方式
	 * @param String $method POST/GET
	 */
	private function _method($method)
	{
		return ($_SERVER['REQUEST_METHOD']==$method)?true:false;
	}
	
	/**
	 * 操作错误跳转的快捷方法
	 * @access protected
	 * @param string $arg0
	 * @param string $arg1
	 * @param int $arg2
	 * @return void
	 */
	protected function error($arg0='',$arg1='',$target='',$time = 0)
	{
	    if($this->_isAjax())
	        die(json_encode(array('status'=>false,'data'=>$arg0,"eval"=>empty($arg1)?false:true)));
	    else
	        $this->jump($arg0,0,$arg1,$time,$target);
	}
	
	/**
	 * 操作成功跳转的快捷方法
	 * @access protected
	 * @param string $arg0
	 * @param string $arg1
	 * @param int $arg2
	 * @return void
	 */
	protected function success($arg0='',$arg1='',$target='',$time = 0)
	{
	    if($this->_isAjax())
	        die(json_encode(array('status'=>true,'data'=>$arg0,"eval"=>empty($arg1)?false:true)));
	    else
	        $this->jump($arg0,1,$arg1,$time,$target);
	}
	
	/**
	 * 默认跳转操作 支持错误导向和正确跳转
	 * 调用模板显示 默认为public目录下面的success页面
	 * 提示页面为可配置 支持模板标签
	 * @param string $message 提示信息
	 * @param Boolean $status 状态
	 * @param string $jumpUrl 页面跳转地址
	 * @param int $time 时间
	 * @access private
	 * @return void
	 */
	private function jump($message,$status,$jumpUrl,$time,$target)
	{
		$config['jump']['urls'] 	= array(
							array('title'=>'首页','url'=>'/'),
							array('title'=>'首页','url'=>'/'),
							array('title'=>'首页','url'=>'/'),
							);
		$config['jump']['success'] 	= array('title'=>'成功','tpl'=>'/index/jump');
		$config['jump']['error'] 	= array('title'=>'错误','tpl'=>'/index/jump');
		$config['jump']['time']		= 3;
	    $data 				= array();
	
	    if(!empty($jumpUrl)&&is_array($jumpUrl))
	    {
	        $data['urls'] 	= array_merge($jumpUrl,$config['jump']['urls']);
	        $data['info']	= $message;
	    }
	
	    if(!empty($jumpUrl)&&is_string($jumpUrl))
	    {
	        $data['urls']	= $config['jump']['urls'];
	        $data['info']	= array("url"=>$jumpUrl,"msg"=>$message,'target'=>$target);
	    }
	
	    if(empty($jumpUrl))
	    {
	        $data['urls']	= $config['jump']['urls'];
	        $data['info']	= array("url"=>"-1","msg"=>$message,'target'=>$target);
	    }
	
	
	
	    $data['title']		= $status?$config['jump']['success']['title'] : $config['jump']['error']['title'];
	    $data['status'] 	= $status;// 状态
	    $data['time'] 		= empty($time)?$config['jump']['time']:$time;
	    $this->view 		= array_merge($data,$this->view);
	
	    $tpl 				= $status?$config['jump']['success']['tpl']:$config['jump']['error']['tpl'];
	    $html 				= $this->view($tpl,true);
	    	
	    die($html);
	}

    /**
     * @author whf
     * @time 20151010
     * REQUEST 获取
     * @param string $name GET的健
     * @param string $default 默认值
     * @param boole $escape 是否转义
     * @return string/array
     */
    public function request($name,$default='',$escape=true)
    {
        $param = Yii::app()->request->getParam($name);
        if( !isset( $param ) ) return $default;

        return is_string($param)?$this->escape($param,$escape):$param;
    }
    /**
     * @author whf
     * @time 20151010
     * 转义
     * @param string $str 字符串
     * @param boole $escape 是否转义
     * @return string
     */
    public function escape($str,$escape=true)
    {
        return $escape?htmlspecialchars(addslashes($str)):$str;
    }
    
	/**
	 * 操作日志记录
	 * @author subenjiang<email:benjiang.su@fmscm.com,phone:18511866287>
	 * @date 20160218
	 * @version 2.0
	 * @return array
	 */
	public function addSiteLog(){
		
		if(empty($this->user) || __CONTROLLER__ == 'index') {
			return ;
		}
		
		$param = file_get_contents("php://input");
		
		$data['url'] = urldecode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
		$data['controller'] = __CONTROLLER__;
		$data['action'] = __ACTION__;
		$data['data'] = empty($param)?'':urldecode($param);
		$data['post_data'] = empty($_POST)?'':json_encode($_POST);
		$data['get_data'] = empty($_GET)?'':json_encode($_GET);
		$data['create_time'] = date("Y-m-d H:i:s");
		$data['create_ip'] = $this->get_ip();
		$data['create_id'] = $this->user['id'];
		$data['create_name'] = $this->user['uname'];
		
		site_logModel::getInstance()->saveSiteLog($data);
	}
}