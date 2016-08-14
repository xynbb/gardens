<?php
/**
 * 我的买入,卖出
 * @author zdn<email:dongni.zeng@fmscm.com,phone:13121194117>
 * @date 20151119
 * @version 2.0
 * @param int $user_id
 * @param string $company_id
 * @param int $oper_type
 * @param int $stage
 * @param int status
 * @return array
 */
class order_listAction extends Action {

    public function run(){
        try {
	        $data = $this->checkSign();
	       //判断是否为白名单，是否有user_id参数
			$this->validate_sign($data);
			
	        if( !isset($data['user_id']) || empty($data['user_id']) ){
	            throw new Exception("user_id传参失败" , 21001);
	        }
	        if( !isset($data['company_id']) || empty($data['company_id']) ){
	            throw new Exception("company_id传参失败" , 21002);
	        }
            //验证用户与公司是否匹配
            $userinfo = Curl::jPost(GET_USER_INFO, json_encode(array('user_id' => $data['user_id'])));
            if(empty($userinfo) || $userinfo['code'] != 20200){
                throw new Exception("user_id传参失败" , 21001);
            }
            if(empty($userinfo['data']['company']) || $data['company_id'] != $userinfo['data']['company']['id']){
                throw new Exception("company_id传参失败" , 21002);
            }

	        if( !isset($data['oper_type']) ){//1买入 2卖出
	            throw new Exception("oper_type传参失败" , 21003);
	        }

            $query_param['user_id']=$data['user_id'];  //老板可以查看所有订单

            $query_param['company_id']=$data['company_id'];
            $query_param['oper_type']=$data['oper_type'];
            $query_param['stage']=(isset($data['stage']) &&!empty($data['stage'])) ?$data['stage']:'';
            $query_param['status']=(isset($data['status']) &&!empty($data['status'])) ?$data['status']:'';
            $query_param['contract_status']=isset($data['contract_status'])?$data['contract_status']:'';
	        $query_param['page']=isset($data['page'])?$data['page']:'1';
	        $query_param['page_num']=isset($data['page_size'])?$data['page_size']:'10';
	        $query_param['order_bdate']=isset($data['order_bdate'])?$data['order_bdate']:'';
	        $query_param['order_edate']=isset($data['order_edate'])?$data['order_edate']:'';
	        $query_param['company_name']=isset($data['company_name'])?$data['company_name']:'';
	        $query_param['contract_code']=isset($data['contract_code'])?$data['contract_code']:'';

            $query_param['breach_type']=isset($data['breach_type'])?$data['breach_type']:'';

	       $list =tradingModel::getInstance()->get_mybuy_list($query_param,$query_param['oper_type']);//我的买入,卖出
	       //tradingModel::getInstance()->lastSql(); //打印sql
	       echo $this->apiResult->setSuccess(array('data'=>empty($list['detail'])?array():$list['detail'],'page'=>array('total'=>empty($list['all_num'])?0:$list['all_num'])),20200); return;
        
        } catch (Exception $e){
            echo $this->apiResult->setError( $e->getCode(), $e->getMessage());
            return ;
        }
    }
}