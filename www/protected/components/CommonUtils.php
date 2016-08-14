<?php
/**
 * Created by PhpStorm.
 * User: bianjichao
 * Date: 15/10/30
 * Time: 下午1:18
 */

class CommonUtils {

    public static function img_sign($config_name)
    {
        $data = array('time'=>time(),'config_name'=>$config_name);

        ksort($data);

        $keys   = array_keys($data);
        $values = array_values($data);

        $data['sign'] = md5(implode('',$keys).implode('',$values).UP_KEY);

        return json_encode($data);
    }
	
	public static function icpLog($operateType='',$operateName='',$result=false,$type=4){

		if($result == true){
			$result = '成功';
		}else{
			$result = '失败';
		}

		$msg = array(
			"account"=> $_SESSION['_user_']['uname'], //用户名
			"type" => $operateType, //类型 添加 修改 删除
			"ip" => Yii::app()->request->userHostAddress, //登录IP
			"module"=>"SITE_SETTINGS", //模块 CRM yunying
			"operate "=> $operateName, //动作 新闻 焦点图管理 公告管理 重置个人密码 交易时间管理
			"result"=> $result, //结果 成功 失败
			"time"=>date("Y-m-d H:i:s") //时间
		);
		
		Fun::addIcpLog($type,$msg);
	}
/**
     * 订单状态
     * User: zengdongni
     * Date: 15/11/18
     */
    public static function getOrderStatus($key=''){


        $payment_status_name=array(
            '101'=>'下单异常',
            '102'=>'创建成功',
            '103'=>'创建失败',

            '201'=>'已入库',
            '202'=>'未签署',
            '203'=>'买家签署成功',
            '204'=>'卖家签署成功',
            '205'=>'签署失败',

            '301'=>'待付款',
            '302'=>'买家付款成功',
            '303'=>'卖家收款成功',
            '304'=>'买家部分付款成功',
            '305'=>'卖家部分收款成功',
            '306'=>'付款失败',
            '401'=>'待结算',
            '402'=>'结算成功',
            '403'=>'结算失败',
            '501'=>'待转权',
            '502'=>'转权成功',
            '503'=>'转权失败',

            '601'=>'待开发票',
            '602'=>'已开发票',

            '701'=>'已完成',

            '801'=>'违约待处理',
            '802'=>'买家违约',
            '803'=>'卖家违约',
            '804'=>'运营发起违约',
            '805'=>'违约处理完成',
            '806'=>'违约处理失败',


            '801110'=>'违约待处理', //订单详情交易跟踪使用
            '801120'=>'违约待处理', //订单详情交易跟踪使用
            '801130'=>'违约待处理', //订单详情交易跟踪使用

            '805110'=>'违约处理完成', //订单详情交易跟踪使用
            '805120'=>'违约处理完成', //订单详情交易跟踪使用
            '805130'=>'违约处理完成', //订单详情交易跟踪使用

            '806110'=>'违约处理失败', //订单详情交易跟踪使用
            '806120'=>'违约处理失败', //订单详情交易跟踪使用
            '806130'=>'违约处理失败', //订单详情交易跟踪使用

            '30201'=>'部分付款成功', //详情日志使用 java状态
            '40201'=>'部分转权成功',//详情日志使用 java状态
        );
        $result['PAYMENT_STATUS_NAME']=$payment_status_name;// 结算单状态名 (使用：我的买入卖出详情页日志)


        if($key === ''){
            return $result;
        }

        if(isset($result[$key])){
            return $result[$key];
        }

        return '';

    }
}