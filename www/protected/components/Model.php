<?php
Yii::import('application.extensions.SQLTools');
class Model extends CFormModel
{
	protected  static $_instance;
	//数据库连接池
	private    static $_dbs = array();
	//主键
	public $_pk 			= '';
	//字段
	public $_fields 		= array();
	//sql
	public $_sql	   		= '';
	//table
	public $_table			= '';
	//读
	public $_db_r	    	= '';
	//写
	public $_db_w	    	= '';
	//条件
	private $_where			= '';
	//条件
	public $where			= '';
	//搜索字段
	public $_search_fields 	= '';
	//分页方法
	public $page_method		= '';
	//组
	public $group			= array();
	//当前组
	public $group_cur		= '';
	//打印sql
	public $sql_debug		= true;
	//事物对象
	private $trans 			= null;
	
	private $condition		= array();

	public function __construct()
	{
		parent::__construct();
        $this->_pk = 'id';
	}

	/**
	 * @author whf
	 * @time 20151012
	 * 选择数据库
	 * @param string $db
	 */
	public function db($db = null)
	{
		$this->group_cur = empty($db)?'db':$db;
		return $this;
	}
	
	/**
	 * @author whf
	 * @time 20151012
	 * 链接写的数据库
	 */
	private function db_write()
	{
		if(empty($this->_db_w))
		{
			$g			 = $this->check_group('w');
			$this->_db_w = !empty($g)?$this->_bd($g):'';
		}
		
		return $this;
	}
	
	/**
	 * @author whf
	 * @time 20151012
	 * 链接读的数据库
	 */
	private function db_read()
	{
		if(empty($this->_db_r))
		{
			$g			 = $this->check_group('r');
			$this->_db_r = !empty($g)?$this->_bd($g):'';
		}
		
		return $this;
	}
	
	/**
	 * 
	 * 检查数据库组
	 * @param string $name
	 */
	private function check_group($name)
	{
		return empty($this->group_cur)?$name:$this->group_cur.'_'.$name;
	}
	
	/**
	 * @author whf
	 * @time 20151012
	 * 链接数据库
	 */
	private function _bd($g)
	{
		if(!isset(self::$_dbs[$g])||empty(self::$_dbs[$g]))
			$db =  self::$_dbs[$g] = yii::app()->$g;
		else
			$db =  self::$_dbs[$g];
			
		return $db;
	}
	
	
	/**
	 * @author whf
	 * @time 20151012
	 * 设置表名
	 * @param string $table 表
	 */
	public function getTable($table = null)
	{
		return empty($table)?$this->_table:$table;
	}
	
	
	/**
	 * @author whf
	 * @time 20151012
	 * 操作写库
	 * @param string $sql
	 */
	private function write($sql=null,$params = array())
	{
		$cmd = $this->db_write()->_db_w->createCommand($sql);
		$this->bindParams($cmd,$params);//绑定sql参数
		$this->sql_debug($sql,$params);//debug sql
		return $cmd;
	}
	
	/**
	 * @author whf
	 * @time 20151012
	 * 操作读库
	 * @param string $sql
	 */
	private function read($sql=null,$params = array())
	{
		$cmd = $this->db_read()->_db_r->createCommand($sql);
		$this->bindParams($cmd,$params);//绑定sql参数
		$this->sql_debug($sql,$params);//debug sql
		return $cmd;
	}

	/**
	 * @author whf
	 * @time 20151012
	 * 生成最后一条sql
	 * @param string $sql
	 */
	private function sql_debug($sql,$params)
	{
		if($this->sql_debug && !empty($params))
		{
			$search 	= array_keys($params);
			$replace	= array_values($params);
			
			if(is_numeric($search[0]))
			{
				$search = array_pad(array(),count($search),'?');
			}
			
			$this->_sql = str_replace($search,$replace,$sql);
		}
	}
		
	/**
	 * @author whf
	 * @time 20151012
	 * 绑定sql参数
	 * @return
	 */
	private function bindParams(&$cmd,$params = array())
	{
		if(!empty($params))
		{
			foreach($params as $k=>$v)
			{
				$cmd->bindParam($k, $params[$k]);
			}
		}
	}
	
	/**
	 * @author whf
	 * @time 20151012
	 * 执行写入sql
	 * @param string $sql
	 */
	public function execute($sql,$params = array())
	{
		return $this->write($sql,$params)->execute();
	}
	
	/**
	 * @author whf
	 * @time 20151012
	 * 获取一行数据
	 * @param string $sql
	 */
	public function row($sql,$params = array())
	{
		return $this->read($sql,$params)->queryRow();
	}
	
	/**
	 * @author whf
	 * @time 20151012
	 * 获取一个字段
	 * @param string $sql
	 */
	public function one($sql,$params = array())
	{
		return $this->read($sql,$params)->queryScalar();
	}

	/**
	 * @author whf
	 * @time 20151012
	 * 获取所有数据
	 * @param string $sql
	 */
	public function all($sql,$params = array())
	{
		return $this->read($sql,$params)->queryAll();
	}

    /**
     * 获取带分页的数据
     * @author bjc
     * @param $conditions
     * @param int $page
     * @param int $pagesize
     * @param array $parasm
     */
    public function getPagesData($conditions,$page=1,$pagesize=10,$params=array(),$order_by="c_time desc"){

        $result = array(
            'rows' => array(),
            'total' => 0
        );

        $sql = "select ".implode(",",$this->_fields)." from ".$this->_table;
        $sql_count = "select count(".$this->_pk.") from ".$this->_table;

        if(!empty($conditions)){
            $sql .= " WHERE $conditions";
            $sql_count .= " WHERE $conditions";
        }
        $sql .= " ORDER BY $order_by";

        $total = $this->one($sql_count,$params);
        if($total>0){
            $pagesize<1 && $pagesize=10;
            $pages = ceil($total/$pagesize);
            $page>$pages && $page = $pages;
            $page<1 && $page =1;

            $limit = ($page-1)*$pagesize.",".$pagesize;

            $sql .= " LIMIT $limit";

            $result['rows'] = $this->all($sql,$params);
            $result['total'] = $total;
        }

        return $result;


    }
	
	/**
	 * @author whf
	 * @time 20151012
	 * 获取所有数据
	 * @param string $sql
	 */
	public function column($sql,$params = array())
	{
		return $this->read($sql,$params)->queryColumn();
	}

	
	/**
	 * @author whf
	 * @time 20151012
	 * 添加
	 * @param array $data
	 * @param string $table
	 */
	public function add($data,$table=null)
	{
		$data	= $this->filter_fields($data);//过滤字段
		$table 	= $this->getTable($table);//获取表
		
		return $this->write()->insert($table,$data);//执行sql
	}
	
	/**
	 * @author whf
	 * @time 20151012
	 * 获取最后插入编号
	 */
	public function insert_id()
	{		
		return $this->db_write()->_db_w->getLastInsertID();
	}

	/**
	 * 
	 * @author whf
	 * @time 20151012
	 * 修改
	 * @param array $columns
	 * @param array/string $where
	 * @param string $table
	 */

	public function update($columns,$conditions='',$params=array ( ),$table=null)
	{
        $columns['update_time'] = date("Y-m-d H:i:s");

        if(isset($columns[$this->_pk])) unset($columns[$this->_pk]);

		$columns = $this->filter_fields($columns);//过滤字段
		$table 	 = $this->getTable($table);//获取表
		//$conditions	 = !empty($conditions)&&is_array($conditions)?$conditions:array($this->_pk=>$conditions);//生成where条件
		
		return $this->write()->update($table,$columns,$conditions,$params);
	}


    /*
	public function getAttributes()
	{
		
		return $this->db_read()->_db_r->canGetProperty();
	}
    */

	/**************事务 start********************/

	/**
	 * @author whf
	 * @time 20151012
	 * 开启事务
	 */
	public function trans_start()
	{
		$this->trans = $this->db_write()->_db_w->beginTransaction();
	}

	/**
	 * @author whf
	 * @time 20151012
	 * 提交数据
	 */
	public function trans_complete()
	{
		if($this->trans)
		{
			$this->trans->commit();
			
			$this->trans = null;
		}
	}

	/**
	 * @author whf
	 * @time 20151012
	 * 事务回滚
	 */
	public function trans_rollback()
	{
		if($this->trans)
		{
			$this->trans->rollback();
			
			$this->trans = null;
		}
	}

	/**************事务 end********************/
	
	/**
	 * @author whf
	 * @time 20151012
	 * 过滤字段
	 * @param array $data
	 */
	public function filter_fields($data)
	{
		foreach ($data as $k=>$v)
		{
			if(!in_array($k, $this->_fields)) unset($data[$k]);
		}
		
		return $data;
	}
	
	//-----------------------------------前台项目不建议用--------------------------------------

	/**
	 * @author whf
	 * @time 20151012
	 * 获取所有数据
	 */
	public function getAll()
	{
		$select = $this->createFields();//创建字段
		$sql 	= "select {$select} from ".$this->getTable();

		return $this->all($sql);
	}
	
	
	/**
	 * @author whf
	 * @time 20151012
	 * 获取数量
	 * @param array/string $condition
	 * @param string/number $arg
	 */
	public function count($condition,$arg=null)
	{
		$condition	= $this->mergeCondition($condition, $arg);//合并条件
		
		$sql	= "select count(1)  from ".$this->getTable()." where 1  {$condition['where']}";

		return $this->one($sql,$condition['bind_value']);
	}

	/**
	 * @author whf
	 * @time 20151012
	 * 根据字段判断是否存在
	 * @param array $condition
	 * @param string/number $arg
	 */
	public function isBy($condition=null,$arg=null)
	{
		return $this->count($condition,$arg);
	}

	/**
	 * @author whf
	 * @time 20151012
	 * 根据条件获取某个字段
	 * @param string $select
	 * @param array/string $condition
	 * @param string/number $arg
	 * @param string $table
	 * @param string $other
	 */
	public function getBy($field,$condition,$arg=null,$other=null)
	{
		$condition	= $this->mergeCondition($condition, $arg);//合并条件
		
		return $this->one("select {$field}  from ".$this->getTable()." where 1 {$condition['where']} {$other}",$condition['bind_value']);
	}

	/**
	 * @author whf
	 * @time 20151012
	 * 根据条件获取某条数据
	 * @param string/array $fields
	 * @param array/string $condition
	 * @param string/number $arg
	 */
	public function getFieldsBy($fields,$condition,$arg=null)
	{
		$select 	= $this->createFields($fields);//创建字段
		$condition	= $this->mergeCondition($condition, $arg);//合并条件

		return $this->row("select {$select}  from ".$this->getTable()." where 1 {$condition['where']}",$condition['bind_value']);
	}
	
	/**
	 * @author whf
	 * @time 20151012
	 * 虎丘所有数据根据条件
	 * @param string/array $fields
	 * @param array/string $condition
	 * @param string/number $arg
	 * @param string/int $limit
	 * @param string $other
	 */
	public function getAllBy($fields,$condition,$arg=null,$limit=10,$other='')
	{
		$select 	= $this->createFields($fields);//创建
		$condition	= $this->mergeCondition($condition, $arg);//合并条件
		$limit 		= !empty($limit)?" limit {$limit} ":'';

		return $this->all("select {$select}  from ".$this->getTable()." where 1 {$condition['where']} {$other} {$limit}",$condition['bind_value']);
	}
	
	
	/**
	 * @author whf
	 * @time 20151012
	 * 查询
	 * @param array/string $condition
	 * @param string $other
	 * @param string $table
	 */
	public function find($condition,$other=null)
	{
		$fields		= isset($condition['fields'])?$condition['fields']:'';
		$fields 	= $this->createFields($fields);//创建字段
		$limit		= isset($condition['limit'])?" limit {$condition['limit']}":'';
		$other		= isset($condition['other'])?$condition['other']:'';
		$where  	= isset($condition['where'])?$condition['where']:'';
		$condition	= $this->mergeCondition($where, null);//合并条件
		$one 		= isset($condition['one'])?$condition['one']:false;//是否为单条数据
		
		if($one)
			return $this->row("select {$fields} from ".$this->getTable()." where 1 {$condition['where']} {$other} limit 1",$condition['bind_value']);//单条数据
		else
			return $this->all("select {$fields} from ".$this->getTable()." where 1 {$condition['where']} {$other} {$limit}",$condition['bind_value']);//所有数据
	}



	/**
	 * @author whf
	 * @time 20151012
	 * 搜索
	 * @param array $options
	 */
	public function search($options=array())
	{
		$re		= array();//返回结果集
		$where 	= isset($options['sql'])&&!empty($options['sql'])?"":" where 1 ";//基础where
		$sql 	= isset($options['sql'])&&!empty($options['sql'])?SQLTools::trim($options['sql'],false):'';//sql
		$page	= isset($options['page'])&&!empty($options['page'])?$options['page']:1;//页码
		$size	= isset($options['size'])&&!empty($options['size'])?$options['size']:10;//每页显示的数量
		$_pk	= isset($this->_pk)&&!empty($this->_pk)?$this->_pk:"id";//设置主键
		$order	= isset($options['order'])&&!empty($options['order'])?$options['order']:"order by {$_pk} desc";//排序
		$fields = $this->setSearchFields($options);//创建字段
		$_where = $this->setSearchWhere($options);//创建搜索条件
		$sqlarr	= $this->setSearchSQL($sql, $_where,$where);//设置sql
		$sql	= $sqlarr['sql'];
		$fields = empty($sqlarr['fields'])?$fields:$sqlarr['fields'];
		//---------------处理分页-----------------
		$sql_cnt		= str_replace("[fields]", "count(1) as cnt", $sql);
		$cnt 			= $this->row($sql_cnt,$_where['bind_value']);
		$pageName		= isset($this->pageName)?$this->pageName:"page";
		$page			= isset($_POST[$pageName])&&is_numeric($_POST[$pageName])&&$_POST[$pageName]>=1?$_POST[$pageName]:$page;
		$_page			= (int)ceil($cnt['cnt']/$size);
		$page			= $_page<$page?1:$page;//页码
		$offset 		= ($page-1)*$size;//查询启示位置

		//---------------查询数据-----------------
		$sql_list 		= str_replace("[fields]", $fields, $sql)." {$order} limit {$offset},{$size}";//完整sql
		$re['list'] 	= $this->all($sql_list,$_where['bind_value']);//查询所有数据

		//---------------分页处理-----------------
		$page_method 	= $this->setSearchPage($options);//获取搜索分页
		$page_num		= isset($options['page_arg'])?$options['page_arg']:'';//获取页码
		$base_url		= isset($options['base_url'])?$options['base_url']:'';//基础URL
		$re['paging']	= SQLTools::paging($cnt['cnt'],$size,9,$page,$page_num,$base_url,$page_method);//生成分页信息

		return $re;
	}
	
	/**
	 * 设置搜索字段
	 * @author whf
	 * @time 20151012
	 * @param array $options
	 */
	private function setSearchFields($options)
	{
		if(isset($options['fields'])&&!empty($options['fields']))
			$fields = $this->createFields($options['fields']);//根据$options['fields']设置字段
		else if(isset($this->_search_fields)&&!empty($this->_search_fields))
			$fields = $this->createFields($this->_search_fields);//根据搜索的_search_fields属性设置字段
		else
			$fields = $this->createFields();//查询所有字段
		
		return $fields;
	}
	
	/**
	 * 设置搜索条件
	 * @author whf
	 * @time 20151012
	 * @param array $options
	 */
	private function setSearchWhere($options)
	{
		$this->_where 		= array();
		
		$where = '';
		
		if(isset($this->where)&&!empty($this->where))
			$this->setCondition($this->where);//根据属性添加where

		if(isset($options['where'])&&!empty($options['where'])&&is_array($options['where']))
			$this->setCondition($options['where']);//根据数组$options['where']添加where 

		if(isset($_POST['s'])&&!empty($_POST['s']))
			$this->setCondition($_POST['s']);//根据提交的数据添加where
			
		return $this->createWhere($options['where'],$options['bind_values']);//创建where
	}
	
	/**
	 * 设置搜索条件
	 * @author whf
	 * @time 20151012
	 * @param string $sql
	 * @param string $where
	 */
	private function setSearchSQL($sql,$where,$where_str)
	{
		if(empty($sql))
		{
			$sql = "select [fields] from ".$this->getTable().$where_str.$where['where'];//拼接sql
			
			return array('sql'=>$sql,'fields'=>'');
		}
		
		if(strpos($sql,"[fields]")===false && preg_match_all("/^(select)(.*)(from)(.*)$/i",$sql,$sql_arr))
		{
			$sql 	= $sql_arr[1][0]." [fields] ".$sql_arr[3][0].$sql_arr[4][0].$where['where'];
			$fields = $sql_arr[2][0];
			
			return array('sql'=>$sql,'fields'=>$fields);
		}
		
		$sql = $sql.$where.$where_str;//拼接sql
		
		return array('sql'=>$sql,'fields'=>'');
	}
	
	/**
	 * 设置分页方法
	 * @author whf
	 * @time 20151012
	 * @param array $options
	 */
	private function setSearchPage($options)
	{
		//获取分页方法名
		if(isset($options['page_method'])&&!empty($options['page_method']))
			$page_method = $options['page_method'];
		else if(isset($this->page_method)&&!empty($this->page_method))
			$page_method = $this->page_method;
		else
			$page_method = 'paging_1';
			
		return $page_method;
	}
	
	/**
	 * @author whf
	 * @time 20151012
	 * 获取字段
	 */
	public function getPropertyFields()
	{
		$table 		= $this->getTable();
		$table	 	= explode('.', $table);
		$database 	= '';
		
		if(count($table)==2)
		{
			$database	= $table[0];
			$database 	= !empty($database)?"and TABLE_SCHEMA='{$database}'":'';
			$table		= $table[1];
		}
		else
		{
			$table		= $table[0];
		}
		
		$data 		= $this->all("SELECT `COLUMN_NAME` as `column`  FROM information_schema. `COLUMNS` WHERE table_name = '".$table."' {$database};");

		die(SQLTools::createPropertyFields($data));
	}
	
	/**
	 * @author whf
	 * @time 20151012
	 * 获取最后一条sql
	 */
	public function lastSql()
	{
		return $this->_sql;
	}

	/**
	 * @author whf
	 * @time 20151012
	 * 创建字段
	 * @param string/array $fields
	 */
	protected function createFields($fields=null)
	{
		return SQLTools::createFields($fields,$this->_fields);
	}

	/**
	 * @author whf
	 * @time 20151012
	 * 创建where
	 */
	private function createWhere($where='',$bind_values=array())
	{
		$this->_where = array_merge($this->_where,SQLTools::createWhere($this->condition,$this->_fields));
		
		ksort($this->_where);
		
		$i = 0;
		$where 		= '';
		$bind_value = array();
		
		if(!empty($this->_where))
		{
			foreach ($this->_where as $v)
			{
				$where 				.= $v['where'];
				$bind_value[++$i] 	=  $v['bind_value'];
			}
		}
		
		if(is_string($where) && !empty($where) && is_array($bind_values) && !empty($bind_values))
		{
			$where .= $where;
			
			foreach ($bind_value as $v)
			{
				$bind_value[++$i]  =  $v;
			}
		}
		
		$this->condition 	= array();
		
		return array('where'=>$where,'bind_value'=>$bind_value);
	}

	/**
	 * @author whf
	 * @time 20151012
	 * 设置条件
	 * @param array $where
	 */
	public function setCondition($condition)
	{
		//条件合并
		$this->condition = array_merge($this->condition,$condition);
	}
	
	/**
	 * @author whf
	 * @time 20151012
	 * 合并条件
	 * @param array/string $condition
	 * @param string/number $arg
	 */
	private function mergeCondition($condition,$arg)
	{
		$this->_where = array();
		
		//$condition 数组时设置条件
		if(!empty($condition)&&is_array($condition))
		{
			$this->setCondition($condition);
		}
		//$condition 字符串时设置条件
		if(!empty($condition)&&is_string($condition))
		{
			$this->setCondition(array($condition=>$arg));
		}
		//生成条件语句		
		return $this->createWhere();
	}
	
	
/**
	 * 
	 * 手机号加密
	 * @param string  $data 手机号 或者 一维数组 或者 二维数组
	 * @param number  $type    
	 * 		          0    代表只传入手机号 
	 *		          1    代表只传入 一维数组 参数 
	 						 mobile  		  手机号 
	 *						 identity_number 身份证号  
	 *						 license_num  营业执照号
	 *						 code 		     组织机构代码
	 *						 tax_number   税务证号
	 *						 email 		      邮箱
	 *						 vat_num  	     发票号
	 *						 vat_code     发票代码
	 *   		      2    代表只传入 二维数组 参数  mobile  
	 */
	public function encrypt( $data , $type = 0 ,$is_object = false,$keys=array()){

		$apiResult = new ApiResult();
		if( $type == 0 && empty($data) ){
			return $apiResult->setError('类型参数不正确');
		}
		if( $type == 1 && empty($data) ){
			return $apiResult->setError('参数不正确，需要一维数组');
		}
		if( $type == 2 && empty($data) ){
			return $apiResult->setError('参数不正确，需要二维数组');
		}
		$aes = Yii::app()->aes;

		$aes->set_key(AES_KEY);
		$aes->require_pkcs5();
		
		if($is_object){
			$data = json_decode(CJSON::encode($data),TRUE);
		}
		
		if( !empty($data)  &&   is_string($data)   ){
			
			return $aes->encrypt($data);

		}elseif(!empty($data)  &&  is_array($data)  && $type == 1 ){
			
			$data = self::setWhere($data,$aes,$keys);
			
			return $data;
			
		}elseif(!empty($data)  &&  is_array($data)  && $type == 2 ){

			$res= array();
		
			foreach($data as $key=>$item){

				$item = self::setWhere($item,$aes,$keys);

				$res[] = $item;

			}

			return $res;
		}
		
	}
	
	/**
	 * 
	 * 手机号解密
	 * @param string  $data 手机号 或者 一维数组 或者 二维数组
	 * @param number  $type    
	 * 		          0    代表只传入手机号 
	 *		          1    代表只传入 一维数组 参数 
	 *						 mobile  		  手机号 
	 *						 identity_number 身份证号  
	 *						 license_num  营业执照号
	 *						 code 		     组织机构代码
	 *						 tax_number   税务证号
	 *						 email 		      邮箱
	 *						 vat_num  	     发票号
	 *						 vat_code     发票代码
	 *   		      2    代表只传入 二维数组 参数  mobile  
	 */
	public function decrypt( $data, $type=0,$is_object = false,$keys=array()){
		
		$aes = Yii::app()->aes;
		
		$aes->set_key(AES_KEY);
		$aes->require_pkcs5();
		
		if($is_object){
			$data = json_decode(CJSON::encode($data),TRUE);
		}
		
		if( !empty($data)  && is_string($data)  ){
		
			return $aes->decrypt($data);

		}elseif(!empty($data)  &&  is_array($data)  && $type == 1 ){

			$data = self::deSetWhere($data,$aes,$keys);

			return $data;

		}elseif(!empty($data)  &&  is_array($data)  && $type == 2 ){

			$res = array();

			foreach($data as $key=>$item){
				
				$item = self::deSetWhere($item,$aes,$keys);

				$res[] = $item;
				
			}
			
			return $res;
		}
		
	}
	
	
	public static function setWhere($data,$aes,$keys=array()){
		
		if(empty($keys)){
			$keys = array('operation_mobile','operation_email','mobile','identity_card','idcard','license_num','code','tax_number','vat_num','email','vat_code','credit_code');
		}
		foreach($keys as $item){
			if(isset($data[$item])) 
			$data[$item] = @$aes->encrypt($data[$item]);	
		}
		
		return $data;
	}

	public static function deSetWhere($data,$aes,$keys=array()){
		
		if(empty($keys)){
			$keys = array('operation_mobile','operation_email','mobile','identity_card','idcard','license_num','code','tax_number','vat_num','email','vat_code','credit_code');
		}
		foreach($keys as $item){
			if(isset($data[$item])) 
			$data[$item] = @$aes->decrypt($data[$item]);	
		}
		return $data;
	}

	/**
	 * @author whf
	 * @time 20151012
	 * 创建不存在的方法
	 * @param string $name
	 * @param array $arguments
	 */
	public function __call($name, $arguments)
	{
		return SQLTools::createMethod($this, $name, $arguments);
	}
	
	private function __clone(){}
}