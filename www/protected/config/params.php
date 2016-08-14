<?php
// this contains the application parameters that can be maintained via GUI
return array(
	// this is displayed in the header section
	'title'=>'My Yii Blog',
	// this is used in error pages
	'adminEmail'=>'webmaster@example.com',
	// number of posts displayed per page
	'postsPerPage'=>10,
	// maximum number of comments that can be displayed in recent comments portlet
	'recentCommentCount'=>10,
	// maximum number of tags that can be displayed in tag cloud portlet
	'tagCloudCount'=>20,
	// whether post comments need to be approved before published
	'commentNeedApproval'=>true,
	// the copyright information displayed in the footer section
	'copyrightInfo'=>'Copyright &copy; 2009 by My Company.',
	//浏览器检测
	'user_agent'=>isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:null,
	'error'  =>  array(
		'21011' =>  '参数缺失(time不存在)',
		'21012' =>  '参数缺失(sign不存在)',
		'21013' =>  '签名超时',
		'21014' =>  '签名错误',
		'21015' =>  '参数错误',
		'21016'	=>	'参数缺失',
		'21017' =>  '当前未登录',
		'21018' =>  '当前环境错误',
		'21019' =>  '环境错误',
		'21020' =>  '接口不能重复调用',
	    '21021' =>  '参数格式错误（data非json）',
		//公共获取挂单数据
		'21101' =>  '挂单数据不存在',
		'21102' =>  '非当前用户的定向卖出单信息',
		'21103' =>  '非当前用户的卖出单信息',            
		//撤单操作
		'21121' =>  '挂单状态错误',
		'21122' =>  '仓储库存已为0',
		'21123' =>  '仓单号暂未生成',
		'21124' =>  '撤单请求，数据返回失败',
		'21125' =>  '撤单请求失败',
		'21126' =>  '撤单请求返回失败',
		'21127' =>  '撤单请求入库失败',
		//调价操作
		'21131' =>  '挂单状态错误',
		'21132' =>  '仓储库存已为0',
		'21133' =>  '浮动挂单升贴水无变化',
		'21134' =>  '固定价格挂单价格无变化',
		'21135' =>  '调价修改太频繁',
		'21136' =>  '调价请求入库失败',
		//定向批量撤单
		'21141' =>  '批量撤单请求失败',
		//定向买家拒绝
		'21151'	=>	'该定向挂单不属于登录用户',
		'21152' =>  '挂单状态错误',
		'21153' =>  '仓储库存已为0',
		'21154' =>  '仓单号暂未生成',
		'21155' =>  '撤单请求，数据返回失败',
		'21156' =>  '撤单请求失败',
		'21157' =>  '撤单请求返回失败',
		'21158' =>  '撤单请求入库失败',
		//连续交易
		'21161' =>  '连续交易数据不存在',
		'21162' =>  '撤单请求入库失败'
	),
	//redis公用key
	'redis_key' => array(
			'LOGOUT_CODE' => 'LOGOUT_CODE',						//会员登出时间key
			'USER_INFO' => 'user_com:user:id:',					//用户信息
			'COMPANY_INFO' => 'user_com:company:id:',			//公司信息
			'TRADING_AMOUNT' => 'deal_com:trading:amount:',		//时间表 redis 常量
			'USER_LOGIN_UNIQUE' => 'user_com:login:unique:user:',//唯一登录验证  常量
			'WEBTRIVIA' => 'crm_com:webtrivia:id:',				//首页碎片redis 常量
			'TRADING_AMOUNT' => 'TRADING_AMOUNT',				//交易钟展示问题
			'CAROUSEL_FIGURE' => 'crm_com:figure',               //首页轮播图
			'ACCOUNT_LOCKUP' => 'user_com:user:lockup:',         //账户锁定时间
			'SOFWARE' => 'crm_com:software:type:',               //获取pc客户端、飞马安全卫士下载
			'WEB:NOTICE:ON' => 'WEB:NOTICE:ON',					 //站内信开关
			'EMAIL:NOTICE:ON' => 'EMAIL:NOTICE:ON',				 //邮件开关
			'SMS:NOTICE:ON' => 'SMS:NOTICE:ON',					 //短信开关
			'COOKIE_TIME' => 'settings:cookie:time',			 //设置cookie时间
			'STATIC_VERSION' => 'settings:version'               //设置静态文件后缀版本号
	)
);
