<?php
class SQLTools
{
	/**
	 * @author whf
	 * @date 20151029
	 * 创建搜索条件
	 * @param mixed $where
	 * @param array $fields
	 * return array
	 */
	public static function createWhere($where,$fields=null)
	{
		//操作符
		$operator = array('eq'=>'=','neq'=>'<>','gt'=>'>','lt'=>'<','ge'=>'>=','le'=>'<=','like'=>'like','llike'=>'like','rlike'=>'like','not_like'=>'not like','not_llike'=>'not like','not_rlike'=>'not like','in'=>'in','not_in'=>'not in');
		//运算符
		$logical  = array('and','or');
		//括号
		$bracket  = array('left_bracket'=>'(','right_bracket'=>')');
		//条件的配置
		$wconf	  = array('field'=>'','logical'=>'and','operator'=>'=','operator_key'=>'eq','index'=>'','alias'=>'','value'=>'?','left_bracket'=>'','right_bracket'=>'','bind_value'=>'');
		
		$new_where	= array();
		
		if( empty($where) || !is_array($where) ) return $new_where;

		foreach ($where as $k=>$v)
		{
			//数据查询基本不存在查空的情况 所以忽略此查询
			if($v==='') continue;
			
			//当key为数字时并且存在此条件时
			if(is_numeric($k) && isset($new_where[$k]))
			{
				$new_where[] = $v;
				continue;
			}
			
			//当key为数字时并且不存在此条件时
			if(is_numeric($k) && !isset($new_where[$k]))
			{
				$new_where[$k] = $v;
				continue;
			}
			
			//条件的配置
			$_where	= $wconf;
			//拼合条件
			if(is_string($k)&&!is_array($v))
			{
				foreach (explode('-', $k) as $w)
				{
					$w = strtolower($w);
					
					//设置运算符
					if(in_array($w, $logical))
					{
						$_where['logical']  = $w;
						
						continue;
					}
					//设置操作符
					if(array_key_exists($w,$operator))
					{
						$_where['operator'] 	= $operator[$w];
						$_where['operator_key'] = $w;
						
						
						continue;
					}
					//设置条件顺序
					if(is_numeric($w))
					{
						$_where['index'] 	= intval($w);
						
						continue;
					}
					//设置括号
					if(isset($bracket[$w]))
					{
						$_where[$w] 	= $bracket[$w];
						
						continue;
					}
					
					$_w 			 	= explode('.', $w);

					if(count($_w)==1)//设置字段
					{
						$_where['field'] = SQLTools::trim($_w[0],false);
					}
					
					if(count($_w)==2 )
					{
						$_where['alias'] = SQLTools::trim($_w[0]);
						$_where['field'] = SQLTools::trim($_w[1],false);
					}
				}
				
				$_where['bind_value'] = $v;
			}
			
			//拼合条件
			if(is_string($k)&&is_array($v))
			{
				$_where['alias'] 		= SQLTools::trim((isset($v['alias'])?$v['alias']:''),false);
				$_where['field'] 		= SQLTools::trim($k,false);
				$_where['logical'] 		= SQLTools::trim((isset($v['logical'])?$v['logical']:''),false);
				$_where['operator'] 	= SQLTools::trim((isset($v['operator'])?$v['operator']:''),false);
				$_where['operator_key'] = SQLTools::trim((isset($v['operator_key'])?$v['operator_key']:''),false);
				$_where['index'] 		= SQLTools::trim((isset($v['index'])?$v['index']:''),false);
				$_where['bind_value'] 	= SQLTools::trim((isset($v['value'])?$v['value']:''),false);
			}
			
				
			//不存在字段
			if(!empty($fields) && !in_array($_where['field'], $fields))
			{
				return $new_where;
			}
			//设置where
			if((empty($_where['index']) && $_where['index']!==0)||isset($new_where[$_where['index']]))
				$new_where[]   			     = SQLTools::setWhere($_where);
			else
				$new_where[$_where['index']] = SQLTools::setWhere($_where);
		}

		return $new_where;
	}


	/**
	 * @author whf
	 * @date 20151029
	 * 生成条件
	 * @param array $_where
	 */
	public static function setWhere($_where)
	{
		$field = empty($_where['alias'])?"`{$_where['field']}`":"`{$_where['alias']}`.`{$_where['field']}`";

		switch ($_where['operator_key'])
		{
			case 'like':
			case 'not_like'://两边模糊搜索
				$where 		= " {$_where['logical']} {$_where['left_blocket']} {$_where['field']} {$_where['operator']} {$_where['value']} {$_where['right_blocket']}";
				$bind_value = "%{$_where['bind_value']}%";
				break;
			case 'llike':
			case 'not_llike'://左侧模糊搜索
				$where 		= " {$_where['logical']} {$_where['left_blocket']} {$_where['field']} {$_where['operator']} {$_where['value']} {$_where['right_blocket']}";
				$bind_value = "%{$_where['bind_value']}";
				break;
			case 'rlike':
			case 'not_rlike'://右侧模糊搜索
				$where 		= " {$_where['logical']} {$_where['left_blocket']} {$_where['field']} {$_where['operator']} {$_where['value']} {$_where['right_blocket']}";
				$bind_value = "{$_where['bind_value']}%";
				break;
			case 'in':
			case 'not_in'://in
				$where 		= " {$_where['logical']}  {$_where['left_blocket']} {$_where['field']} {$_where['operator']}({$_where['value']}) {$_where['right_blocket']}";
				$bind_value = $_where['bind_value'];
				break;
			default:
				$where 		= " {$_where['logical']} {$_where['left_blocket']} {$_where['field']} {$_where['operator']}{$_where['value']} {$_where['right_blocket']}";
				$bind_value = $_where['bind_value'];
				break;
		}
		
		return array('where'=>$where,'bind_value'=>$bind_value);
	}
	
	/**
	 * @author whf
	 * @date 20151029
	 * 创建方法
	 * @param object $class 对象
	 * @param string $name 方法名称
	 * @param array $arguments 参数
	 */
	public static function createMethod($class,$name, $arguments)
	{
		//判断是否存在
		if(strpos($name, "isBy")!==false)
		{
			if(preg_match_all("/([a-zA-Z]{1}[a-z]*)?[^A-Z]/",str_replace( "isBy", "",$name),$array))
			{
				$condition = strtolower(implode('_', $array[0]));

				return call_user_func_array(array($class,'isBy'),array($condition,$arguments[0]));
			}
		}
		
		//根据某个字段获取信息
		if(strpos($name, "getFieldsBy")!==false)
		{
			if(preg_match_all("/([a-zA-Z]{1}[a-z]*)?[^A-Z]/",str_replace( "getFieldsBy", "",$name),$array))
			{
				$condition = strtolower(implode('_', $array[0]));
		
				return call_user_func_array(array($class,'getFieldsBy'),array(null,$condition,$arguments[0]));
			}
		}
		
		//根据某个字段获取信息
		if(strpos($name, "getAllBy")!==false)
		{
			if(preg_match_all("/([a-zA-Z]{1}[a-z]*)?[^A-Z]/",str_replace( "getAllBy", "",$name),$array))
			{
				$condition = strtolower(implode('_', $array[0]));
		
				return call_user_func_array(array($class,'getAllBy'),array(isset($arguments[2])?$arguments[2]:null,$condition,$arguments[0],isset($arguments[1])?$arguments[1]:20));
			}
		}

		//根据某个字段获取某个字段的信息
		if(strpos($name, "getFieldsBy")===false && strpos($name, "get")!==false && strpos($name, "By")>0)
		{
			$fields  = explode("By", substr($name, 3));

			if(preg_match_all("/([a-zA-Z]{1}[a-z]*)?[^A-Z]/",$fields[0],$select)&&preg_match_all("/([a-zA-Z]{1}[a-z]*)?[^A-Z]/",$fields[1],$condition))
			{
				$select = strtolower(implode('_', $select[0]));
				$condition  = strtolower(implode('_', $condition[0]));

				return call_user_func_array(array($class,'getBy'),array($select,$condition,$arguments[0]));
			}
		}
	}
	
	/**
	 * @author whf
	 * @date 20151029
	 * 创建类的属性
	 * @param array $data
	 */
	public static function createPropertyFields($data)
	{
		$property = 'public $_fields = array(';

		foreach ($data as $v)
			$property .= "'{$v['column']}',";

		return trim($property,',').");";
	}

	/**
	 * @author whf
	 * @date 20151029
	 * 替换空字符串
	 * @param string $str 字符串
	 * @param bool $trim 
	 */
	public static function trim($str,$trim=true)
	{
		$search = $trim?array("\r\n", "\r", "\n","\t",' ','`'):array("\r\n", "\r", "\n","\t");

		return str_replace($search,'',$str);
	}

	/**
	 * @author whf
	 * @date 20151029
	 * 创建字段
	 * @param array $fields 字段
	 * @param array $trueFields 真实的字段
	 */
	public static function createFields($fields,$trueFields=null)
	{
		$_fields = "";

		//字符串的
		if(!empty($fields)&&is_string($fields))
		{
			$fields  = explode(',',$fields);
				
			foreach($fields as $v)
			{
				if(preg_match("/([`a-zA-z0-9_]+\.)?([`a-zA-z0-9_]+)([ ]*[as]*[ ]*)([`a-zA-z0-9_]*)/",$v,$field))
				{
					if((!empty($trueFields)&&in_array(SQLTools::trim($field[2]),$trueFields))||empty($trueFields))
						$_fields .= SQLTools::setFields(SQLTools::trim(trim($field[1],'.'),false),SQLTools::trim($field[2],false),SQLTools::trim($field[4],false)).",";
				}
			}
				
			return trim($_fields,',');
		}
		
		//是数组的时候
		if(!empty($fields)&&is_array($fields))
		{
			foreach($fields as $v)
			{
				if(preg_match("/([`a-zA-z0-9_]+\.)?([`a-zA-z0-9_]+)([ ]*[as]*[ ]*)([`a-zA-z0-9_]*)/",$v,$field))
				{
					if((!empty($trueFields)&&in_array(SQLTools::trim($field[2]),$trueFields))||empty($trueFields))
						$_fields .= SQLTools::setFields(SQLTools::trim(trim($field[1],'.'),false),SQLTools::trim($field[2],false),SQLTools::trim($field[4],false)).",";
				}
			}
				
			return trim($_fields,',');
		}

		return "*";
	}

	/**
	 * @author whf
	 * @date 20151029
	 * 设置字段
	 * @param string $table
	 * @param string $field
	 * @param string $as
	 */
	public static function setFields($table=null,$field=null,$as=null)
	{
		$_field  = "";

		if(!empty($_field)) $_field  = "`".SQLTools::trim($table)."`.";
		if(!empty($field))  $_field .= "`".SQLTools::trim($field)."`";
		if(!empty($as))     $_field .= " as `".SQLTools::trim($as)."`";

		return $_field;
	}

	/**
	 * @author whf
	 * @date 20151029
	 * 过滤字符串
	 * @param string $str
	 */
	public static function escape($str)
	{
		return htmlspecialchars(addslashes($str));
	}
	
	/**
	 * @author whf
	 * @date 20151029
	 * 分页
	 * @param int $total 总数
	 * @param int $size 每页显示的行数
	 * @param int $page_size 显示多少页码
	 * @param int $page 当前第几页
	 * @param string $page_arg 分页的参数字符串
	 * @param string $base_url 基础URL
	 * @param string $page_method 调用的分页方法
	 */
	public static function paging($total,$size,$page_size,$page,$page_arg,$base_url,$page_method)
	{
		return SQLTools::$page_method($total,$size,$page_size,$page,$page_arg,$base_url);
	}

	/**
	 * @author whf
	 * @date 20151029
	 * 分页为字符串的分页
	 * @param int $total
	 * @param int $size
	 * @param int $page_size
	 * @param int $page
	 * @param string $page_arg
	 * @param string $base_url
	 */
	public static function paging_2($total,$size,$page_size,$page,$page_arg,$base_url)
	{
		$page = ($page < 1) ? 1 : $page;
		$cutpage_num	=	(int)ceil($total/$size);
		$se 			= 	(int)floor($page_size/2);
		$start_num		=	$page - $se;
	
		if($start_num < 1)
			$start_num = 1;
	
		$end_num 	= 	$start_num + $page_size - 1;
			
		if($end_num > $cutpage_num)
			$end_num = $cutpage_num;
		else if($end_num < $page_size)
			$start_num = 1;
	
		if($start_num > $page_size && $end_num - $start_num + 1 < $page_size)
			$start_num = $end_num - $page_size + 1;
	
		
		$pages = "<div class='message'>共<i class='blue'>{$total}</i>条记录，当前显示第&nbsp;<i class='blue'>{$page}&nbsp;</i>页</div>";
		
		$pages .= '<ul class="paginList">';
	
		if($page > 1)
			$pages .= '<li class="paginItem"><a href="'.site_url($base_url.set_arg($page_arg, count($page_arg)-1, $page-1)).'">&lt;</a></li>';
		else
			$pages .= '<li class="paginItem"><a href="javascript:;">&lt;</a></li>';
	
		for($i=$start_num;$i<=$end_num;$i++)
		{
			if ($i == $page)
				$pages .= '<li class="paginItem current"><a href="javascript:void(0);">'.$i.'</a></li>';
			else
				$pages .= '<li  class="paginItem"><a href="'.site_url($base_url.set_arg($page_arg, count($page_arg)-1, $i)).'">'.$i.'</a></li>';
		}
	
		if($page < $cutpage_num)
			$pages .= '<li class="paginItem"><a href="'.site_url($base_url.set_arg($page_arg, count($page_arg)-1, $page+1)).'">&gt;</a></li>';
		else
			$pages .= '<li class="paginItem"><a href="javascript:;">&gt;</a></li>';
	
		$pages .="</ul>";
	
		return !empty($total)?$pages:'';
	}
	
	/**
	 * @author whf
	 * @date 20151029
	 * 分页
	 * @param int $total
	 * @param int $size
	 * @param int $page_size
	 * @param int $page
	 */
	public static function paging_1($total,$size,$page_size,$page)
	{
		$page = ($page < 1) ? 1 : $page;
		$cutpage_num	=	(int)ceil($total/$size);
		$se 			= 	(int)floor($page_size/2);
		$start_num		=	$page - $se;

		if($start_num < 1)
			$start_num = 1;

		$end_num 	= 	$start_num + $page_size - 1;
			
		if($end_num > $cutpage_num)
			$end_num = $cutpage_num;
		else if($end_num < $page_size)
			$start_num = 1;

		if($start_num > $page_size && $end_num - $start_num + 1 < $page_size)
			$start_num = $end_num - $page_size + 1;
		
		$pages = "<div class='message'>共<i class='blue'>{$total}</i>条记录，当前显示第&nbsp;<i class='blue'>{$page}&nbsp;</i>页</div>";
		
		$pages .= '<ul class="paginList">';
		$pages .= '<li class="paginItem"><a href="javascript:search(1);">首页</a></li>';
			
		if($page > 1)
		{
			$pages .= '<li class="paginItem"><a href="javascript:search('.($page - 1).');">«</a></li>';
		}


		for($i=$start_num;$i<=$end_num;$i++)
		{
			if ($i == $page)
				$pages .= '<li class="paginItem current"><a href="javascript:void(0);">'.$i.'</a></li>';
			else
				$pages .= '<li class="paginItem"><a href="javascript:search('.$i.');">'.$i.'</a></li>';
		}

		if($page < $cutpage_num)
		{
			$next_num = $page + 1;
			$pages .= '<li class="paginItem"><a href="javascript:search('.$next_num.');">»</a></li>';
			
		}
		
		$pages .= '<li class="paginItem"><a href="javascript:search('.$cutpage_num.');">末页</a></li>';

		//if($cutpage_num > $end_num)
			

		$pages .="</ul>";

		return $pages;
	}

	
}