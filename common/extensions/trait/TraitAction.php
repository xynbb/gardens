<?php
trait TraitAction {
	//越权user编号
	protected $sign_user_id = 0;
	
	protected $ukeyRandKey = 'user:ukeyRand:';
	
    /**
     * @author xyn<email:yanan.xu@fmscm.com,phone:15001230575>
     * @time 20151010
     * 签名检查
     * @return boole
     */
    public function checkSign($isCheck=true) {

        try{
            $data = file_get_contents("php://input");//所有参数json格式
            $dataArr = json_decode($data,true);
            //数据格式错误
            if(!empty($data) && !is_array($dataArr)) {
                throw new Exception( Yii::app()->params['error'][21021] , 21021);
            }
            //转义数据
            if(!empty($dataArr)) {
                $dataArr = $this->escapeArray($dataArr);
            }
            //不检查签名
            if(!$isCheck) {
                return $dataArr;
            }

            $sign = Yii::app()->request->getParam('sign' , '');//加密后唯一串
            $time = Yii::app()->request->getParam('time' , 0);//时间戳
            $userId = Yii::app()->request->getParam('user_id' , 0);//登录用户id
            $rand = Yii::app()->request->getParam('rand' , '');//随机数
            $env = Yii::app()->request->getParam('env' , '');//环境test,dev,publish,local
			$this->sign_user_id = $userId;//越权user编号

            //若在白名单中则不用验证签名
			$ip = $this->get_ip();
            //$ip = (isset($_SERVER['HTTP_DZ_CLIENT_IP']) && !empty($_SERVER['HTTP_DZ_CLIENT_IP']))? $_SERVER['HTTP_DZ_CLIENT_IP'] : $_SERVER['HTTP_CLIENT_IP'];

            $position = strrpos($ip,'.');
            if(in_array($ip, $_SERVER['WHITE_LIST']) || in_array(substr($ip,0,$position+1).'*',$_SERVER['WHITE_LIST'])) {
                
				//环境变量，判断当前环境，不传可能redis会冲突
				if($env == '') {
					throw new Exception( Yii::app()->params['error'][21018] , 21018);
				}
				//若环境变量非当前环境，则抛异常
				if($env != $_SERVER['DZ_ENVIRONMENT']) {
					throw new Exception( Yii::app()->params['error'][21019] , 21019);
				}
				return $dataArr;
            }
            //不传userId抛异常
            if(empty($userId)) {
                throw new Exception( Yii::app()->params['error'][21017] , 21017);
            }
            //计算sign过期时间，时间戳错误则抛异常
            if($time == 0) {
                throw new Exception( Yii::app()->params['error'][21011]."(rand)" , 21011);
            }
            //随机数，防止10分钟内同一接口重复调用
            if($rand == '') {
                throw new Exception( Yii::app()->params['error'][21011]."(rand)" , 21011);
            }
            //加密后标识,用于和规则生成后的值做比较，不一样则异常
            if($sign == '') {
                throw new Exception( Yii::app()->params['error'][21012] , 21012);
            }
            //过期时间,大于10分钟过期
            $exp = abs(time()-$time);
            if($exp > 600) {
                throw new Exception( Yii::app()->params['error'][21013] , 21013);
            }
			

            $redisTools = Yii::app()->redis_r;
            //规则匹配
            $key = $redisTools->get(API_KEY.$userId);
			//增加apikey不存在漏洞修复
			if(empty($key)){
				throw new Exception('当前用户尚未登录或不存在' , 21021);
			}
			
            $_sign = md5($data.$key.$userId.$rand.$env.$time);
            if($_sign != $sign) {
                throw new Exception( Yii::app()->params['error'][21014] , 21014);
            }
            //若redis中有值则抛异常，不能重复调用接口
            $redis_sign = $redisTools->get($_sign);
            if(!empty($redis_sign) && $redis_sign == $_sign) {
                throw new Exception( Yii::app()->params['error'][21020] , 21020);
            }
            //放入redis
            $redisW = Yii::app()->redis_w;
            $redisW->setex($_sign,600,$_sign);
			Fun::addLog(4,$dataArr);
			
            return $dataArr;
        }catch (Exception $e){
			$error_info = json_encode(array(
								'code' => $e->getCode(),
								'msg' => $e->getMessage(),
								'data' => ''
						  ));
			Fun::addLog(2,$error_info);			  
            echo $error_info;
            die();
        }

    }
	
    /**
     * @author gang.wang<email:gang.wang@fmscm.com,phone:15011526743>
     * @time 20160317
     * 越权校验
     * @return json异常
     */
	public function  validate_sign($data=array()){
        //判断是否为白名单，是否有user_id参数
        if(!empty($this->sign_user_id) && (!isset($data['user_id']) || empty($data['user_id']))){
            throw new Exception('参数获取失败',21003);
        }
        //判断是否为白名单，user_id越权校验
        if(!empty($this->sign_user_id) && $this->sign_user_id != $data['user_id']) {
            throw new Exception('非法操作',21004);
        }
        //判断是否为白名单，company_id越权校验
        if(!empty($this->sign_user_id) && isset($data['company_id']) && !empty($data['company_id']) && $this->get_company_id() != $data['company_id']){
            throw new Exception('非法操作',21005);
        }
    }

	/**
	 * @author wanggang<email:gang.wang@fmscm.com,phone:15011526743>
     * @time 20160317
     * 越权user编号查询企业编号
     * @return 企业编号
	 */
	public function get_company_id($user_id = 0) {
		if(empty($user_id)) {//参数user_id为空时使用签名sign_user_id
			$user_id = $this->sign_user_id;
		}
		//todo $company_id = 调用获取公司编号接口;
		$url = USER_API_SITE.'/userapi/get_company';
		$result = Curl::jPost($url,json_encode(array('user_id'=>$user_id)));

		if(!isset($result['code']) || $result['code'] != 20200){
			return 0;
		}
		return isset($result['data']['id'])?$result['data']['id']:0;
	}
    
    /**
     * @author whf<email:hongfeng.wang@fmscm.com,phone:18600367942>
     * @date 20160129
     * @version 1.0
     * @param array $arr
     * @return array
     */
    public function escapeArray($arr)
    {
        foreach($arr as $k=>$v)
        {
            if (is_string($v)){
                $temp = json_decode($v,true);

                if( is_array($temp) && !empty($temp) ){//json数据继续转义每一个值元素
                    $temp = $this->escapeArray($temp);
                    $arr[$k] = json_encode($temp);
                }else{
                    $arr[$k] = htmlspecialchars(addslashes($v));
                }
            }else if (is_array($v)) { //若为数组，则再转义.
                $arr[$k] = $this->escapeArray($v);
            }
        }
        
        return $arr;
    }

    /**
     * @author subenjiang
     * @time 20151010
     * REQUEST 获取IP
     * Enter description here ...
     */
    public function get_ip()
    {
        static $ip = false;
    
        if (false != $ip) {
            return $ip;
        }

        $keys = array(
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR'
        );
    
        foreach ($keys as $item) {
            if (!isset($_SERVER[$item])) {
                continue;
            }
    
            $curIp = $_SERVER[$item];
            $curIp = explode('.', $curIp);
            if (count($curIp) != 4) {
                break;
            }
    
            foreach ($curIp as & $sub) {
                if (($sub = intval($sub)) < 0 || $sub > 255) {
                    break 2;
                }
            }
    
            $curIpBin = $curIp[0] << 24 | $curIp[1] << 16 | $curIp[2] << 8 | $curIp[3];
            $masks = array(// hexadecimal ip  ip mask
                array(0x7F000001, 0xFFFF0000), // 127.0.*.*
                array(0x0A000000, 0xFFFF0000), // 10.0.*.*
                array(0xC0A80000, 0xFFFF0000) // 192.168.*.*
            );
            foreach ($masks as $ipMask) {
                if (($curIpBin & $ipMask[1]) === ($ipMask[0] & $ipMask[1])) {
                    break 2;
                }
            }
    
            return $ip = implode('.', $curIp);
        }
    
        return $ip = $_SERVER['REMOTE_ADDR'];
    }
	
	public function get_ip_loc($queryIP){ 
		
        $url = 'http://ip.qq.com/cgi-bin/searchip?searchip1='.$queryIP; 

        $ch = curl_init($url); 

        curl_setopt($ch,CURLOPT_ENCODING ,'gb2312'); 

        curl_setopt($ch, CURLOPT_TIMEOUT, 10); 

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回 

        $result = curl_exec($ch); 

        $result = mb_convert_encoding($result, "utf-8", "gb2312"); // 编码转换，否则乱码 

        curl_close($ch); 

        preg_match("@<span>(.*)</span></p>@iU",$result,$ipArray); 

        $loc = $ipArray[1]; 

        return $loc; 

    } 
    
	/**
	 * 
	 * 上传图片签名
	 * @author wanggang
	 * @param string $config_name 配置名称
	 */
	public function upload_sign($config_name)
	{
		$data = array('time'=>time(),'config_name'=>$config_name);
		
		ksort($data);
	
		$keys   = array_keys($data);
			
	    $values = array_values($data);
		
		$sign = md5(implode('',$keys).implode('',$values).API_KEY);

		return $sign;
	}
	
	/**
	 * 用户U盾验证
	 * @author subenjiang<email:benjiang.su@fmscm.com,phone:18511866287>
	 * @date 20160108
	 * @version 2.0
	 * @return array
	 */
	public function checkUkeySign($user=array(),$uug=array()){
		return true;	
		if(empty($user) || empty($uug)) {
			throw new Exception('U盾验签失败',21101);
		}
		
		if(empty($user['uuid']) || empty($uug['time']) || empty($user['id']) || empty($user['ukey_rand'])){
			throw new Exception("U盾验证失败",21102);
		}
		
		//读取redis存在的ukey_rand
		$redis = Yii::app()->redis_r;
        $ukeyRand = $redis->get($this->ukeyRandKey.$user['id']);
        
		$webSign_1 = md5($user['uuid'].','.$uug['time'].','.$uug['rand'].','.$user['id'].','.$user['ukey_rand']);
		
		$webSign_2 = md5($user['uuid'].','.$uug['time'].','.$uug['rand'].','.$user['id'].','.$ukeyRand);
		
		$pcSign = $uug['sign'];
		//U盾验证
		if( !in_array($pcSign,array($webSign_2,$webSign_1))){
			throw new Exception("U盾验证失败",21103);
		}
			
	}  
}
