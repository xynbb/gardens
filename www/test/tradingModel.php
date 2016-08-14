<?php

class tradingModel extends Model
{
	private $crypt_keys = array('seller_mobile','create_mobile');
    public $_table 	= "trading";
    public $_fields = array('id','order_code','delivery_code','contract_code','warehouse_id','warehouse_name','invoice_mode','warehouse_order_code','sell_id','category_id','category_name','brand_id','brand_name','sku','class_id','class_name','sell_type','sell_mode','margin','penalty','futures_price','premium','deal_price','discount_amount','price_amount','coupons','quantity_amount','real_weight','settlement_quantity','settlement_money','breach_quantity','stage','status','deal_time','source','contract_status','invoice_status','finance_status','no_breach_status','breach_money','breach_oper_offer','breach_status','breach_type','seller_id','seller_name','seller_mobile','seller_company_id','seller_company_name','create_id','create_name','create_mobile','create_company_id','create_company_name','create_ip','create_time','update_time','usn','payment_result_msg','payment_end_time','payment_batch');

    public function __construct() {
        parent::__construct();
        $this->db();
    }
	/**
	 * 根据状态获取阶段
	 * Enter description here ...
	 * @param unknown_type $data
	 */
	private function stage_change($data){
		if(isset($data['status'])){
			$data['stage'] = intval($data['status']/100) * 100;
		}
		return $data;
	}
    
	/**
	 * 根据用户id获取交易单数据
	 * @param int $userId
	 * @@param int $stage
	 * @@param int $status
	 * @return array
	 * @author xyn
	 * @time 20151120
     */
    public function getTradingByUserId($userId, $stage = 0, $status = 0) {
    	$param = array(':create_id' => $userId);
        $sql = "SELECT ".implode(',', $this->_fields)."  FROM `{$this->_table}` WHERE create_id=:create_id";
        if($stage) {
        	$sql .= " AND stage=:stage";
        	$param[':stage'] = $stage;
        }
    	if($status) {
        	$sql .= " AND status=:status";
        	$param[':status'] = $status;
        }
        $data = $this->all($sql, $param);
        if(!empty($data)){
       		 $data = $this->decrypt($data,2,$this->crypt_keys);
        }
        return $data;
    }

    /**
	 * 获取一条交易单信息
	 * @param int $id
	 * @@param string $fields
	 * @return array
	 * @author xyn
	 * @time 20151120
     */
    public function getRow($id, $fields = '',$master=false) {
    	if($fields == '') {
    		$fields = implode(',', $this->_fields);
    	}
        $sql = "SELECT {$fields}  FROM `{$this->_table}` WHERE id=:id";
        $param = array(':id' => $id);
        $data = $this->row($sql, $param,$master);
        if(!empty($data)){
       		 $data = $this->decrypt($data,1,$this->crypt_keys);
        }
        return $data;
    }

    /**
     * 根据条件获取一条交易单信息
     * mxtong 20151211
     */
    public function getTradingRow($data, $fields = '') {
        $where = " 1";
        $param = array();
        if(isset($data['company_id']) && !empty($data['company_id'])){
            $where .= " AND (create_company_id=:company_id  OR  seller_company_id=:company_id)";
            $param['company_id'] = $data['company_id'];

        }
        if(isset($data['order_code']) && !empty($data['order_code'])){
            $where .= " AND order_code=:order_code";
            $param['order_code'] = $data['order_code'];
        }

        if($fields == '') {
            $fields = implode(',', $this->_fields);
        }
        $sql = "SELECT {$fields}  FROM `{$this->_table}` WHERE {$where}";

        $data = $this->row($sql, $param);
        if(!empty($data)){
            $data = $this->decrypt($data,1,$this->crypt_keys);
        }
        return $data;

    }

	/**
	 * 根据挂单id获取交易单数据
	 * @param int $sellId
	 * @@param string $fields
	 * @return array
	 * @author xyn
	 * @time 20151120
     */
    public function getTradingBySellId($sellId, $fields = '') {
    	if($fields == '') {
    		$fields = implode(',', $this->_fields);
    	}
        $sql = "SELECT {$fields}  FROM `{$this->_table}` WHERE sell_id=:sell_id";
        $param = array(':sell_id' => $sellId);
        $data = $this->all($sql, $param);
        if(!empty($data)){
       		 $data = $this->decrypt($data,2,$this->crypt_keys);
        }
        return $data;
    }

    /**
     * 批量根据挂单 id 获取交易数据
     *
     * @author FangHao
     * @param  array $sellIds  ids to query
     * @param  string $fields  fields to return
     * @return array           query result
     */
    public function getTradingsBySellIds(array $sellIds, array $fields = array()) {
        $sellIds = array_map('intval', $sellIds);
        if (empty($sellIds)) {
            return false;
        }
        if (empty($fields)) {
            $fields = implode(',', $this->_fields);
        } else {
            $fields = implode(',', $fields);
        }

        $query = "SELECT {$fields} FROM `{$this->_table}`
                WHERE sell_id IN (" .
                    implode(',', $sellIds) .
                    ");";
        return $this->all($query);
    }

    /**
     * 批量根据订单号获取交易信息
     *
     * @author FangHao
     * @param  array  $orderCodes 要查询的订单号
     * @param  array  $fields     要查询的字段
     * @param  array  $data       查询条件
     * @return array              查询结果
     */
    public function getTradingsByOrderCodes(array $orderCodes, array $fields = array(),array $data=array()) {
        if (empty($orderCodes)) {
            return false;
        }
        if (empty($fields)) {
            $fields = implode(',', $this->_fields);
        } else {
            $fields = implode(',', $fields);
        }

        $query = "SELECT {$fields} FROM `{$this->_table}`
                  WHERE order_code IN (" .
                    implode(',', $orderCodes) .
                    ") ";

        if (isset($data['breach_status'])){  //违约类型
            $query .= " AND breach_status =".$data['breach_status'];
        }
        return $this->all($query);
    }

    /**
	 * 根据ids获取交易单信息
	 * @param int $ids
	 * @@param string $fields
	 * @return array
	 * @author xyn
	 * @time 20151120
     */
    public function getTradingsByIds($ids, $fields = '') {
    	if($fields == '') {
    		$fields = implode(',', $this->_fields);
    	}
    	if(is_array($ids)){
    		$ids_str = implode(',', $ids);
    	}
    	else{
    		$ids_str = $ids;
    	}
        $sql = "SELECT {$fields}  FROM `{$this->_table}` WHERE `id` IN(".$ids_str.")";
        $data = $this->all($sql);
        if(!empty($data)){
       		 $data = $this->decrypt($data,2,$this->crypt_keys);
        }
        return $data;
    }

    /**
	 * 根据ids获取交易单信息，直接读主库
	 * @param int $ids
	 * @@param string $fields
	 * @return array
	 * @author xyn
	 * @time 20151120
     */
    public function getTradingsByIdsForMaster($ids, $fields = '', $master = false) {
    	if($fields == '') {
    		$fields = implode(',', $this->_fields);
    	}
    	if(is_array($ids)){
    		$ids_str = implode(',', $ids);
    	}
    	else{
    		$ids_str = $ids;
    	}
        $sql = "SELECT {$fields}  FROM `{$this->_table}` WHERE `id` IN(".$ids_str.")";
        //$data = $this->all($sql);

        $data = $this->all($sql,array(),$master);
        if(!empty($data)){
       		 $data = $this->decrypt($data,2,$this->crypt_keys);
        }
        return $data;
    }
    
    /**
	 * 根据company_ids获取交易单信息
	 * @param int $companyIds
	 * @@param string $fields
	 * @return array
	 * @author xyn
	 * @time 20151120
     */
    public function getTradingsByCompanyIds($companyIds, $fields = '') {
    	if($fields == '') {
    		$fields = implode(',', $this->_fields);
    	}
        $sql = "SELECT {$fields}  FROM `{$this->_table}` WHERE `create_company_id` IN(".implode(',', $companyIds).")";
        $data = $this->all($sql);
        if(!empty($data)){
       		 $data = $this->decrypt($data,2,$this->crypt_keys);
        }
        return $data;
    }

    /**
	 * 插入交易单
	 * @@param array $data
	 * @return int
	 * @author xyn
	 * @time 20151120
     */
	public function insert($data)
	{
		if(!empty($data)){
			$data = $this->encrypt($data, 1 , $this->crypt_keys);
		}
		$this->add($data);
		return $this->insert_id();
	}

	/**
	 * 修改数据
	 * @time 20151110
	 * @author xyn
	 */
	public function updateData($tradingId, $update)
	{
		if(!empty($update)){
			$update = $this->encrypt($update, 1, $this->crypt_keys);
		}
		if(!isset($update['stage'])){
            $update = $this->stage_change($update);
        }
		return $this->update($update, "id=:id", array(':id' => $tradingId));
	}

	/**
	 * 修改数据
	 * @time 20151110
	 * @author xyn
	 */
	public function updateOrderCode($orderCode, $update)
	{
        if(!isset($update['stage'])){
            $update = $this->stage_change($update);
        }
        $where = "order_code=:order_code";
        $params = array(':order_code' => $orderCode);
        if(isset($update['status'])){
            $where .= " AND status<:status";
            $params[':status'] = $update['status'];
        }
		return $this->update($update,$where, $params);
	}

    /**
     * 修改trading数据
     * mxtong 20151211
     */
    public function updateTradingData($data, $whereData, $whereStr='order_code=:order_code'){
        if(empty($data)){
            return 0;
        }
        return $this->update($data, $whereStr, $whereData);
    }

	/**
	 *获得我的买入列表信息
	 *@param array $data
	 *@author zengdongni
	 *@time 20151119
	 *return array
	 **/
	public function get_mybuy_list($data,$oper_type=1){
	    $return = array();
	    $params=array();

	    if((!is_numeric($data['company_id']) && $data['company_id'] <= 0)) {
	        return $return;
	    }

	    if($oper_type == 1){  //买入
	        $sql = " select `".implode('`,`', $this->_fields)."` from `{$this->_table}` where  `create_company_id` =:company_id";
	        $sql_count="select count(1) as all_num from `{$this->_table}` where `create_company_id`=:company_id";
	    }
	    if($oper_type == 2){ //卖出
	        $sql = " select `".implode('`,`', $this->_fields)."` from `{$this->_table}` where `seller_company_id` =:company_id";
	        $sql_count="select count(1) as all_num from `{$this->_table}` where `seller_company_id`=:company_id";

          /*  if (isset($data['user_id']) && !empty($data['user_id'])){
                $sql.=" and `seller_id`=:seller_id";
                $sql_count.=" and `seller_id`=:seller_id";
                $params[':seller_id'] = $data['user_id'];
            }*/
	    }
	    $params[':company_id'] = $data['company_id'];

        $sql.=" AND `status` not in(101,103) ";//买入卖出列表不包含创建中，创建失败订单
        $sql_count.=" AND `status` not in(101,103) ";

        if (isset($data['breach_status']) && !empty($data['breach_status'])){  //违约状态
            $sql .= " AND `breach_status` =:breach_status ";
            $sql_count.=" AND `breach_status` =:breach_status ";
            $params[':breach_status'] = $data['breach_status'];
        }

        if (isset($data['breach_type']) && !empty($data['breach_type'])){  //违约类型
            $sql .= " AND breach_type IN(".$data['breach_type'].") ";
            $sql_count.=" AND breach_type IN(".$data['breach_type'].") ";
        }

         if (isset($data['stage']) && is_numeric($data['stage'])){
             $sql.=" and `stage`=:stage";
             $sql_count.=" and `stage`=:stage";
             $params[':stage'] = $data['stage'];
         }

	    if (isset($data['status']) && is_numeric($data['status'])){
	        $sql.=" and `status`=:status";
	        $sql_count.=" and `status`=:status";
	        $params[':status'] = $data['status'];
	    }
	    if (isset($data['order_bdate']) && !empty($data['order_bdate'])){
	        $sql.=" and `create_time` >=:order_bdate";
	        $sql_count.=" and `create_time`>=:order_bdate";
	        $params[':order_bdate'] = $data['order_bdate'];
	    }
	    if (isset($data['order_edate']) && !empty($data['order_edate'])){
	        $sql.=" and `create_time` <=:order_edate";
	        $sql_count.=" and `create_time`<=:order_edate";
	        $params[':order_edate'] = $data['order_edate'];
	    }
	    if (isset($data['company_name']) && !empty($data['company_name']) && $oper_type == 1){ //买入
	        $sql.=" and `seller_company_name` LIKE :company_name";
	        $sql_count.=" and `seller_company_name` LIKE  :company_name";
	        $params[':company_name'] ='%'.$data['company_name'].'%';
	    }

	    if (isset($data['company_name']) && !empty($data['company_name']) && $oper_type == 2){ //卖出
	        $sql.=" and `create_company_name` LIKE :company_name";
	        $sql_count.=" and `create_company_name` LIKE  :company_name";
	        $params[':company_name'] ='%'.$data['company_name'].'%';
	    }
	    if (isset($data['contract_status']) && is_numeric($data['contract_status'])){
	        if($data['contract_status']==888){
	            $sql.=" and `contract_status`>=202";
	            $sql_count.=" and `contract_status`>=202";
	        }else{
    	        $sql.=" and `contract_status`=:contract_status";
    	        $sql_count.=" and `contract_status`=:contract_status";
    	        $params[':contract_status'] = $data['contract_status'];
	        }
	    }
	    if (isset($data['contract_code']) && is_numeric(substr($data['contract_code'],3))){
	        $sql.=" and `contract_code`=:contract_code";
	        $sql_count.=" and `contract_code`=:contract_code";
	        $params[':contract_code'] = $data['contract_code'];
	    }
	    $sql.=" order by `create_time`  desc ";
	    // 分页
        $page=(isset($data['page']) && $data['page']>1)?$data['page']-1:0;

	    if (isset($data['page_num']) && is_numeric($data['page_num'])){
	        $offset = $page * (isset($data['page_num'])?$data['page_num']:10);
	        $sql.=" limit {$offset},{$data['page_num']}";
	    }

	    $list=$this->all($sql,$params);
	    if(!empty($list)){
	        $list = $this->decrypt($list,2,$this->crypt_keys);
	    } 
	    
	    $count=$this->one($sql_count,$params);

	    $res['detail'] = $list;
	    $res['all_num'] = $count;

	    return $res;
	}

    /**
     *获得我的买入列表信息
     *@param array $data
     *@author zengdongni
     *@time 20151119
     *return array
     **/
    public function get_breach_list($data,$oper_type=1){
        $return = array();
        $params=array();

        if((!is_numeric($data['company_id']) && $data['company_id'] <= 0)) {
            return $return;
        }
        $sql = " select `".implode('`,`', $this->_fields)."` from `{$this->_table}` where ";
        $sql_count="select count(1) as all_num from `{$this->_table}` where  ";

        if($oper_type == 1){  //我的违约
            $sql .= " ((`breach_type` in (130,110)  and `create_company_id`=:company_id) or (`breach_type`=120 and `seller_company_id`=:company_id))";
            $sql_count .="  ((breach_type in (130,110)  and `create_company_id`=:company_id) or (`breach_type`=120 and `seller_company_id`=:company_id))";
        }
        if($oper_type == 2){ //对方违约
            $sql .= "   ((`breach_type` in (130,110)  and `seller_company_id` =:company_id) or (`breach_type`=120 and `create_company_id`=:company_id))";
            $sql_count .=" ((`breach_type` in (130,110)  and `seller_company_id` =:company_id) or (`breach_type`=120 and `create_company_id`=:company_id))";

        }
        $params[':company_id'] = $data['company_id'];

        if (isset($data['status']) && is_numeric($data['status'])){
            $sql.=" and `status`=:status";
            $sql_count.=" and `status`=:status";
            $params[':status'] = $data['status'];
        }
        if (isset($data['order_bdate']) && !empty($data['order_bdate'])){
            $sql.=" and `create_time` >=:order_bdate";
            $sql_count.=" and `create_time`>=:order_bdate";
            $params[':order_bdate'] = $data['order_bdate'];
        }
        if (isset($data['order_edate']) && !empty($data['order_edate'])){
            $sql.=" and `create_time` <=:order_edate";
            $sql_count.=" and `create_time`<=:order_edate";
            $params[':order_edate'] = $data['order_edate'];
        }
        if (isset($data['company_name']) && !empty($data['company_name'])){
            $sql.=" and `seller_company_name` LIKE :company_name";
            $sql_count.=" and `seller_company_name` LIKE  :company_name";
            $params[':company_name'] ='%'.$data['company_name'].'%';
        }

        $sql.=" order by `create_time`  desc ";
        // 分页
        $page=(isset($data['page']) && $data['page']>1)?$data['page']-1:0;

        if (isset($data['page_num']) && is_numeric($data['page_num'])){
            $offset = $page * (isset($data['page_num'])?$data['page_num']:10);
            $sql.=" limit {$offset},{$data['page_num']}";
        }

        $list=$this->all($sql,$params);
        if(!empty($list)){
            $list = $this->decrypt($list,2,$this->crypt_keys);
        }

        $count=$this->one($sql_count,$params);

        $res['list'] = $list;
        $res['all_num'] = $count;

        return $res;
    }







    /**
	 *获得我的买入详情
	 *@param array $data
	 *@author zengdongni
	 *@time 20151119
	 *return array
	 **/
	public function get_mybuy_detail($data){
	    $return = array();
	    $params=array();

	    if(!isset($data['order_code']) && empty($data['order_code'])) {
	        return $return;
	    }
	    $sql = " select `".implode('`,`', $this->_fields)."` from `{$this->_table}` where `order_code` =:order_code";
	    $params[':order_code'] = $data['order_code'];

	    $list=$this->row($sql,$params);
	    return $list;
	}

	/**
	*根据搜索条件获取数据
	*@author wanggang
	*@param array $condition
	*@time 20151215
	*@return array
	**/
	public function getTradingsByCondition($condition = array()) {
		$params = array();
		$sql ="SELECT `".implode( "`,`" , $this->_fields )."` FROM {$this->_table} WHERE 1 AND status !=101 AND status !=103";
		//只显示当天数据
		if(isset($condition['sameDay']) && !empty($condition['sameDay'])){
			$sql .= " AND create_time >= '".date("Y-m-d")." 00:00:01' AND create_time <= '".date("Y-m-d")." 59:59:59'";
		}
		if(isset($condition['user_id']) && $condition['user_id'] != 0 ) {
			$params[':user_id'] = $condition['user_id'];
			$sql .= " AND create_id = :user_id";
		}
		if(isset($condition['company_id']) && $condition['company_id'] != 0) {
			$params[':company_id'] = $condition['company_id'];
			$sql .= " AND create_company_id = :company_id";
		}
		if(isset($condition['status']) && $condition['status']) {
			$params[':status'] = $condition['status'];
			$sql .= " AND status=:status";
		}
        if(isset($condition['finance_status']) && $condition['finance_status']) {
            $params[':finance_status'] = $condition['finance_status'];
            $sql .= " AND finance_status=:finance_status";
        }
		if(isset($condition['stage']) && $condition['stage']) {
			$params[':stage'] = $condition['stage'];
			$sql .= " AND stage=:stage";
		}
		if(isset($condition['company_name']) && $condition['company_name']) {
			$params[':create_company_name'] = "%{$condition['company_name']}%";
			$sql .= " AND create_company_name LIKE :create_company_name";
		}
		if(isset($condition['code_name']) && $condition['code_name']) {
			$params[':code_name'] = "%{$condition['code_name']}%";
			$sql .= " AND order_code LIKE :code_name";
		}
		if(isset($condition['sell_type']) && $condition['sell_type']) {
			$params[':sell_type'] = $condition['sell_type'];
            $sql .= " AND sell_type = :sell_type";
        }
		if(isset($condition['class_ids']) && !empty($condition['class_ids'])) {
			//$params[':class_ids'] = $condition['class_ids'];
			$sql .= " AND class_id IN('".implode("','", $condition['class_ids'])."')";
		}
		if(isset($condition['brand_ids']) && !empty($condition['brand_ids'])) {
			//$params[':brand_ids'] = $condition['brand_ids'];
			$sql .= " AND brand_id IN('".implode("','", $condition['brand_ids'])."')";
		}
        if(isset($condition['warehousesIds']) && !empty($condition['warehousesIds'])) {
            //$params[':brand_ids'] = $condition['brand_ids'];
            $sql .= " AND warehouse_id IN('".implode("','", $condition['warehousesIds'])."')";
        }
		if(isset($condition['people_ids']) && !empty($condition['people_ids'])) {
			//$params[':people_ids'] = $condition['people_ids'];
			$sql .= " AND create_id IN('".implode("','", $condition['people_ids'])."')";
		}
		if(isset($condition['order_by'])) {
			$sql .= " ORDER BY {$condition['order_by']}";
		}
		if(isset($condition['num']) && $condition['num']) {
			$sql .= " LIMIT ".($condition['offset']*$condition['num']).", {$condition['num']}";
		}
		$list = $this->all($sql, $params);
		if(!empty($list)){
			$list = $this->decrypt($list,2,$this->crypt_keys);
		}
		return $list;
	}

	/**
	 * 根据订单状态统计数据
	 * @param int $userId
	 * @@param int $companyId
	 * @@param int $status
	 * @@param int $type 1买方、2卖方
	 * @return array
	 * @author xyn
	 * @time 20151120
     */
    public function countTradingByStatus($status, $userId = 0, $companyId = 0, $type = 1) {
    	$param = array(':status' => $status);
        $sql = "SELECT COUNT(*) AS count  FROM `{$this->_table}` WHERE status=:status";
        if($userId && $type == 1) {
        	$sql .= " AND create_id=:create_id";
        	$param[':create_id'] = $userId;
        }
    	if($companyId && $type == 1) {
        	$sql .= " AND create_company_id=:create_company_id";
        	$param[':create_company_id'] = $companyId;
        }
   	 	if($userId && $type == 2) {
        	$sql .= " AND seller_id=:seller_id";
        	$param[':seller_id'] = $userId;
        }
    	if($companyId && $type == 2) {
        	$sql .= " AND seller_company_id=:seller_company_id";
        	$param[':seller_company_id'] = $companyId;
        }
        
        $param[':start_time'] = date('Y-m-d')." 08:59:59";
		$param[':end_time'] = date('Y-m-d')." 23:59:59";
		
		$sql .= " AND create_time >= :start_time AND create_time <= :end_time AND breach_status=0";
        
        return $this->one($sql, $param);;
    }
    
	/**
	 * 根据订单合同签署状态统计数据
	 * @param int $userId
	 * @@param int $companyId
	 * @@param int $status
	 * @@param int $type 1买方、2卖方
	 * @return array
	 * @author xyn
	 * @time 20151120
     */
    public function countTradingByContractStatus($contract_status, $userId = 0, $companyId = 0, $type = 1) {
    	$param = array(':contract_status' => $contract_status);
        $sql = "SELECT COUNT(*) AS count  FROM `{$this->_table}` WHERE contract_status=:contract_status";
        if($userId && $type == 1) {
        	$sql .= " AND create_id=:create_id";
        	$param[':create_id'] = $userId;
        }
    	if($companyId && $type == 1) {
        	$sql .= " AND create_company_id=:create_company_id";
        	$param[':create_company_id'] = $companyId;
        }
   	 	if($userId && $type == 2) {
        	$sql .= " AND seller_id=:seller_id";
        	$param[':seller_id'] = $userId;
        }
    	if($companyId && $type == 2) {
        	$sql .= " AND seller_company_id=:seller_company_id";
        	$param[':seller_company_id'] = $companyId;
        }
        
        $param[':start_time'] = date('Y-m-d')." 08:59:59";
		$param[':end_time'] = date('Y-m-d')." 23:59:59";
		
		$sql .= " AND create_time >= :start_time AND create_time <= :end_time AND breach_status=0";
        
        return $this->one($sql, $param);;
    }
    
	/**
	 * 通过名称搜索发生交易关系的企业
	 * @@param int $companyId
	 * @@param int $type 1买方、2卖方
	 * @return array
	 * @author wanggang
	 * @time 20151221
     */
    public function getTradingByCompanyId($companyId = 0,$keyword='', $type = 1) {

        $sql = "";

    	if($companyId && $type == 1) {
    		$sql = "SELECT DISTINCT create_company_id,create_company_name FROM `{$this->_table}` WHERE (seller_company_id=:seller_company_id OR create_company_id=:create_company_id) and create_company_name like :create_company_name and (`status`=".TRADE_STATUS_COMPLETE_SUCCEED." or breach_status=".TRADE_STATUS_BREACH_OF_CONTRACT_SUCCEED.")";
            $param[':seller_company_id'] = $companyId;
            $param[':create_company_id'] = $companyId;
            $param[':create_company_name'] = "%".$keyword."%";
        }

   	 	if($companyId && $type == 2) {
           $sql = "SELECT DISTINCT seller_company_id,seller_company_name FROM `{$this->_table}` WHERE  (seller_company_id=:seller_company_id OR create_company_id=:create_company_id) and seller_company_name like :seller_company_name and (`status`=".TRADE_STATUS_COMPLETE_SUCCEED." or breach_status=".TRADE_STATUS_BREACH_OF_CONTRACT_SUCCEED.")";
            $param[':seller_company_id'] = $companyId;
            $param[':create_company_id'] = $companyId;
            $param[':seller_company_name'] = "%".$keyword."%";
        }
        
        if(empty($sql)){ return ;}
        
        return $this->all($sql, $param);
    }
    
    /**
     * 根据时间段获取交易量
     * @param date("Y-m-d H:i:s") $data['start_time']
	 * @param date("Y-m-d H:i:s") $data['end_time']
	 * @return array
     * @param unknown_type $data
     * @author subenjiang
     * @time 20151230
     */
    public function getTradingTimeAmonut($data){
    	
    	$param = array();
    	
        $sql = "SELECT " . implode(',', $this->_fields) .
               "  FROM `{$this->_table}`
               WHERE 1";
        if (!empty($data['start_time'])) {
            $sql .= " AND create_time >= :start_time";
            $param[':start_time'] = $data['start_time'];
        }
        
        if (!empty($data['start_time'])) {
            $sql .= " AND create_time <= :end_time";
            $param[':end_time'] = $data['end_time'];
        }
      
      return $this->all($sql, $param);
    }

    /**
     * 根据时间段获取交易最大交易额
     * @param date("Y-m-d H:i:s") $data['start_time']
     * @param date("Y-m-d H:i:s") $data['end_time']
     * @return array
     * @param unknown_type $data
     * @author subenjiang
     * @time 20151230
     */
    public function getTradingAmonutStar($data){
        $param = array();

        $sql = "SELECT SUM(`price_amount`) `amount`, SUM(`quantity_amount`) `number`, `seller_company_id`, `seller_company_name` FROM `{$this->_table}` WHERE 1";
        if (!empty($data['start_time'])) {
            $sql .= " AND create_time >= :start_time";
            $param[':start_time'] = $data['start_time'];
        }
        if (!empty($data['start_time'])) {
            $sql .= " AND create_time <= :end_time";
            $param[':end_time'] = $data['end_time'];
        }
        $sql .= " GROUP BY `seller_company_id` ORDER BY `amount` DESC LIMIT 1";

        return $this->row($sql, $param);
    }
    
    
    /**
     * 根据时间段获取交易量
     * @param date("Y-m-d H:i:s") $data['start_time']
	 * @param date("Y-m-d H:i:s") $data['end_time']
	 * @return array
     * @param unknown_type $data
     * @author subenjiang
     * @time 20151230
     */
    public function getTradingTimeTotal($data){
    	$param = array();
        $sql = "SELECT " . implode(',', $this->_fields) .
               "  FROM `{$this->_table}`
               WHERE 1";
        if (!empty($data['start_time'])) {
            $sql .= " AND update_time >= :start_time";
            $param[':start_time'] = $data['start_time'];
        }
        if (!empty($data['end_time'])) {
            $sql .= " AND update_time <= :end_time";
            $param[':end_time'] = $data['end_time'];
        }
    	if (isset($data['status']) && !empty($data['status'])) {
            $sql .= " AND status = :status";
            $param[':status'] = $data['status'];
        }
    	if (isset($data['breach_status'])) {
            $sql .= " AND breach_status = :breach_status";
            $param[':breach_status'] = $data['breach_status'];
        }
      return $this->all($sql, $param);
    }

    /**
     * 获取违约列表分页
     * @author zhangtao<email:tao.zhang@fmscm.com,phone:15811014096>
     * @date 20160111
     * @version 2.0
     * @param int $page
     * @param int $pageSize
     * @param int $type
     * return array()
     */

    public function getList($page=1,$pageSize=20,$data)
    {
        $params = array();
        $result = array(
            'rows' => array(),
            'total' => 0
        );
        $sql = "SELECT `".implode('`,`', $this->_fields)."` FROM {$this->_table} WHERE `breach_status`>0";
        $sql_count = "select count(".$this->_pk.") from ".$this->_table." WHERE breach_status>0";
        if(isset($data['sell_type'])){
        	$sql .= " AND `sell_type` =:sell_type";
        	$sql_count .= " AND `sell_type` =:sell_type";
        	$params[':sell_type'] = $data['sell_type'];
        }
		if(isset($data['breach_status'])){
			$sql .= " AND `breach_status`=:breach_status";
        	$sql_count .= " AND `breach_status`=:breach_status";
        	$params[':breach_status'] = $data['breach_status'];
		}
    	if(isset($data['order_code'])){
			$sql .= " AND `order_code`=:order_code";
        	$sql_count .= " AND `order_code`=:order_code";
        	$params[':order_code'] = $data['order_code'];
		}
        $sql .= " ORDER BY create_time DESC";
        if(isset($page) && $page && isset($pageSize)){
            $sql .= " limit ".(($page-1)*$pageSize).", {$pageSize}";
        }
        $res = $this->all($sql,$params);
        $total = $this->one($sql_count,$params);
        $result['rows'] = $res;
        $result['total']=$total;
        return $result;
    }
     /**
	  * 获取违约列表分页
	  * @author zhangtao<email:tao.zhang@fmscm.com,phone:15811014096>
	  * @date 20160112
	  * @version 2.0
	  * @param array $data
	  * return resource
	  */
    public function update_break($data)
    {
        $sql_where = " id =".intval($data['id']);
		return $this->execute("UPDATE ".$this->_table." SET breach_status=".$data['status'].",update_time='".date('Y-m-d H:i:s')."' where {$sql_where}");
    }
    /**
     * 通过公司名称来获取连续交易的交易单id
     * @author zhangtao<email:tao.zhang@fmscm.com,phone:15811014096>
	 * @date 20160112
     * @param $type
     * @param $company_name
     * @param $offset
     * @param $length
     */
    public function get_chain_id_by_company_name($type=1,$company_name,$offset=0,$length=10){
    	$sql = "SELECT id FROM {$this->_table} WHERE sell_type=2";
    	if($type == 1){
    		$sql .= " AND seller_company_name like '%{$company_name}%'";
   		}else{
   			$sql .= " AND create_company_name like '%{$company_name}%'";
   		}
    	$sql .= " LIMIT {$offset},{$length}";
    	return $this->all($sql, array());
    }
    /**
     * 获取连续交易的trading
     * @param unknown_type $start
     * @param unknown_type $end
     * @param unknown_type $buyer_company
     * @param unknown_type $seller_company
     * @param unknown_type $is_breach
     * @param unknown_type $page_num
     * @param unknown_type $per_page
     */
    public function get_chain_tradings($start,$end,$buyer_company,$seller_company,$is_breach,$page_num=0,$per_page=10){
    	$sql = "SELECT * FROM {$this->_table}"; 
    	$count_sql = "SELECT count(*) as cnt FROM {$this->_table}";
    	$sql_where = " WHERE sell_type=2 AND status NOT IN(101,103) AND warehouse_order_code!=''";
    	if(!empty($start)){
    		$sql_where .= " AND create_time>='{$start} 00:00:00'";
    	}
    	if(!empty($end)){
    		$sql_where .= " AND create_time<='{$end} 23:59:59'";
    	}
    	if(!empty($buyer_company)){
    		$sql_where .= " AND create_company_name LIKE '%{$buyer_company}%'";
    	}
   		if(!empty($seller_company)){
    		$sql_where .= " AND seller_company_name LIKE '%{$seller_company}%'";
    	}
    	if(!empty($is_breach)){
    		$sql_where .= ($is_breach-1)>0?" AND breach_status!=0":" AND breach_status=0";
    	}
    	$sql .= $sql_where." ORDER BY id DESC LIMIT ".($page_num-1)*$per_page.",".$per_page;
    	//echo $sql;exit;
    	$count_sql .= $sql_where;
    	$result = array();
    	$result['list'] = $this->all($sql,array());
    	$result['count'] = $this->one($count_sql,array());
    	return $result;
    }
    /**
     * 检测某组交易单是否有未处理完违约的订单
     * @param $ids
     */
    public function checkTradingsBreach($ids){
    	$sql = "SELECT COUNT(*) AS cnt FROM {$this->_table} WHERE status!=701 AND breach_status>0 AND id IN ($ids)";
    	return $this->one($sql, array());
    }
    
	/**
	 * 根据挂单仓单获取交易单数据
	 * @param int $sellId
	 * @@param string $fields
	 * @return array
	 * @author subenjiang
	 * @time 20151120
     */
    public function getTradingWarehouse($warehouse_order_code,$fields='') {
  
        $sql = "SELECT {$fields}  FROM `{$this->_table}` WHERE warehouse_order_code=:warehouse_order_code";
        
        $param = array(':warehouse_order_code' => $warehouse_order_code);
        
        return $this->row($sql,$param);
    }
    /**
     * 实例化类
     * */
    public static function getInstance() {
        if(!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

}
