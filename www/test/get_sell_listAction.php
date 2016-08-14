<?php
/**
 * 根据条件获取所有挂单数据
 * @author xyn<email:yanan.xu@fmscm.com,phone:15001230575>
 * @date 20160105
 * @version 2.0
 * @param int $user_id
 * @param int $company_id
 * @param int $is_my
 * @param int $is_login
 * @param int $num
 * @param int $offset
 * @param int $status
 * @param int $invoice_mode
 * @param int $pmin
 * @param int $pmax
 * @param int $sell_mode
 * @param int $sell_type
 * @param int $target_user_id
 * @param int $target_company_id
 * @param int $show_empty_quantity
 * @param string $order_by
 * @param string $company_name
 * @param string $class_ids
 * @param string $brand_ids
 * @param string $house_ids
 * @param string $instru_ids
 * @param string $people_ids
 * @param string $codes
 * @param string $startdate
 * @return array
 */
class get_sell_listAction extends Action {

    public function run(){
    	try {
    		$data = $this->checkSign();
			//判断是否为白名单，是否有user_id参数
			$this->validate_sign($data);
			
			$userId = isset($data['user_id']) ? intval($data['user_id']): 0;
			$companyId = isset($data['company_id']) ? intval($data['company_id']): 0;
			$isMy = isset($data['is_my']) ? intval($data['is_my']): 0;//是否为自己挂单，0否1是，0则统计自己挂单，1统计非自己挂单
			$isLogin = isset($data['is_login']) ? intval($data['is_login']): 1;//是否为登录状态，若为不登陆状态，则userId非必填
			
			//查询条件-------start
			$num = isset($data['num'])?intval($data['num']):10;//每页显示数量
			$offset = isset($data['offset']) ? intval($data['offset']): 0;//当前页减1
			$status = isset($data['status']) ? intval($data['status']): 0;//挂单状态
			$invoiceMode = isset($data['invoice_mode']) ? intval($data['invoice_mode']): 0;//票据状态
			$pmin = isset($data['pmin']) ? $data['pmin']: '';//升贴水最小值，注意，若为空则不传，否者会被转为int 0;
			$pmax = isset($data['pmax']) ? $data['pmax']: '';//升贴水最大值，注意，若为空则不传，否者会被转为int 0;
			$sellMode = isset($data['sell_mode']) ? intval($data['sell_mode']): 0;//挂单方式 1一口价 2浮动价 3定向交易
			$sellType = isset($data['sell_type']) && $data['sell_type'] != 0 ? intval($data['sell_type']): 1;//交易类型，1当前卖出，2历史卖出
			$targetUserId = isset($data['target_user_id']) ? intval($data['target_user_id']): 0;//定向购买者编号
			$targetCompanyId = isset($data['target_company_id']) ? intval($data['target_company_id']): 0;//定向公司id
			$showEmptyQuantity= isset($data['show_empty_quantity']) ? intval($data['show_empty_quantity']): 0;//是否显示库存为0的挂单,0否，1是
			$orderBy = isset($data['order_by']) && $data['order_by'] != '' ? addslashes($data['order_by']): ' create_time DESC';//排序
			$companyName = isset($data['company_name']) ? addslashes($data['company_name']): '';//挂单者公司名称
			$sellModes = (isset($data['sell_modes']) && $data['sell_modes'] != '' )? explode(',', $data['sell_modes']) : array();//品牌
			$classIds = (isset($data['class_ids']) && $data['class_ids'] != '' )? explode(',', $data['class_ids']) : array();//品类
			$brandIds = (isset($data['brand_ids']) && $data['brand_ids'] != '' )? explode(',', $data['brand_ids']) : array();//品牌
			$houseIds = (isset($data['house_ids']) && $data['house_ids'] != '' )? explode(',', $data['house_ids']) : array();//仓库
			$instruIds = (isset($data['instru_ids']) && $data['instru_ids'] != '')? explode(',', $data['instru_ids']) : array();//合约号
			$peopleIds = (isset($data['people_ids']) && $data['people_ids'] != '')? explode(',', $data['people_ids']) : array();//交易员
			$codes = (isset($data['codes']) && $data['codes'] != '')? explode(',', $data['codes']) : array();//连续交易交易单号
            $startdate = (isset($data['startdate']) && $data['startdate'] != '' && date("Y-m-d 00:00:00",strtotime($data['startdate'] ))==$data['startdate'] ) ? $data['startdate'] : "";
                                //查询条件-------end
            
			if(!empty($classIds)) {
				foreach($classIds as $key => $classId) {
					$classIds[$key] = intval($classId);
				}
			}
	    	if(!empty($brandIds)) {
				foreach($brandIds as $key => $brandId) {
					$brandIds[$key] = intval($brandId);
				}
			}
	    	if(!empty($houseIds)) {
				foreach($houseIds as $key => $houseId) {
					$houseIds[$key] = intval($houseId);
				}
			}
	    	if(!empty($instruIds)) {
				foreach($instruIds as $key => $instruId) {
					$instruIds[$key] = addslashes($instruId);
				}
			}
    		if(!empty($codes)) {
				foreach($codes as $key => $code) {
					$codes[$key] = addslashes($code);
				}
			}
	    	if(!empty($peopleIds)) {
				foreach($peopleIds as $key => $peopleId) {
					$peopleIds[$key] = intval($peopleId);
				}
			}
			$condition = array(
				'user_id' => $userId,
				'company_id' => $companyId,
				'pmin' => $pmin,
				'pmax' => $pmax,
				'status' => $status,
				'invoice_mode' => $invoiceMode,
				'company_name' => $companyName,
				'sell_mode' => $sellMode,
				'sell_type' => $sellType,
			    'target_user_id' => $targetUserId,
			    'target_company_id' => $targetCompanyId,
				'sell_modes' => $sellModes,
				'class_ids' => $classIds,
				'brand_ids' => $brandIds,
				'house_ids' => $houseIds,
	            'instru_ids' =>$instruIds,
				'people_ids' =>$peopleIds,
				'codes' =>$codes,
			    'show_empty_quantity'=>$showEmptyQuantity,
				'is_my'=>$isMy,
				'order_by' => $orderBy
			);
			if($sellMode == 2) {
				$condition['pmin'] = $pmin;
				$condition['pmax'] = $pmax;
			}else {
				$condition['deal_price_min'] = $pmin;
				$condition['deal_price_max'] = $pmax;
			}
			if(!empty($peopleIds)) {
				unset($condition['user_id']);
			} 
                               if(!empty($startdate)){
                                   $condition['create_time_min'] = $startdate;
                               }
			$list = sellModel::getInstance()->getTradingsByCondition($num, $offset, $condition);
			echo $this->apiResult->setSuccess($list);return;
    	}catch (Exception $e){
			echo $this->apiResult->setError( $e->getCode(), $e->getMessage());
			return ;
		}
    }
}