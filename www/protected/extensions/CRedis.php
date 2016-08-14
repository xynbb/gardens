<?php
/**
* Curl wrapper for Yii
* @author hackerone
*/
class CRedis extends CComponent{
	
	public $options;
	
    public $hostname;
    
    public $port;
    
	private $_redis;
	
	/**
	 * 获取一个值
	 *
	 * @param unknown_type $key
	 * @return unknown
	 */
	public function get($key){
		return $this->_redis->get($key);
	}
	
	/**
	 * 设置一个值
	 *
	 * @param unknown_type $key
	 * @param unknown_type $value
	 * @return unknown
	 */
	public function set($key,$value){
		return $this->_redis->set($key,$value);
	}
	
	/**
	 * 如果不存在则设置值
	 *
	 * @param unknown_type $key
	 * @param unknown_type $value
	 * @return unknown
	 */
	public function setnx($key,$value){
		return $this->_redis->setnx($key,$value);
	}
	
	/**
	 * 值
	 *
	 * @param unknown_type $key
	 * @return unknown
	 */
	public function delete($key){
		return $this->_redis->delete($key);
	}
	
	/**
	 * 设置一个值 并且设置有效期 单位秒
	 * @param unknown $key
	 * @param number $seconds
	 * @param unknown $value
	 */
	public function setex($key,$seconds,$value){
		return $this->_redis->setex($key,$seconds,$value);
	}
	
	/**
	 * 增加一个值
	 *
	 * @param unknown_type $key
	 * @param unknown_type $num
	 * @return unknown
	 */
	public function  incrBy($key,$num=1){
		return $this->_redis->incrBy($key,$num);
	}
	
	/**
	 * 减少一个值
	 *
	 * @param unknown_type $key
	 * @param unknown_type $num
	 * @return unknown
	 */
	public function   decrBy($key,$num=1){
		return $this->_redis->decrBy($key,$num);
	}
	
	public function   lPush($key,$value){
		return $this->_redis->lPush($key,$value);
	}
	
	public function mget($keys){
		return $this->_redis->mget($keys);
	}
	
	public function exists($key){
		return $this->_redis->exists($key);
	}

    /**
     * 自增hash的field的值
     * @param unknown $key
     * @param unknown $field
     * @param number $value
     */
    public function hIncrBy($key, $field, $value=1){
        return $this->_redis->hIncrBy($key, $field, intval($value));
    }


    /**
     * 获取hash中的全部数据
     * @param unknown $key
     */
    public function hGetAll($key){
        return $this->_redis->hGetAll($key);
    }

    /**
     * 设置hash数据
     * @param $key
     * @param $hashkey
     * @param $val
     * @return mixed
     */
    public function hset($key,$hashkey,$val){
        return $this->_redis->hset($key,$hashkey,$val);
    }

    /**
     * 获取hash数据
     * @param $key
     * @param $hashkey
     * @return mixed
     */
    public function hget($key,$hashkey){
        return $this->_redis->hget($key,$hashkey);
    }

    //返回列表的头元素
    public function lPop($key){
        return $this->_redis->lPop($key);
    }

    //加入到列表尾部
    public function rPush($key,$val){
        return $this->_redis->rPush($key,$val);
    }
	
	// initialize curl
	public function init(){
		try{
			$this->_redis = new Redis();
			$this->_redis->connect($this->options['hostname'],$this->options['port']);
			//添加redis密码
			if(isset($this->options['password']) && !empty($this->options['password'])){
				$this->_redis->auth($this->options['password']);
			}
		}catch(Exception $e){
			throw new CException('Curl not installed');
		}
	}
}
