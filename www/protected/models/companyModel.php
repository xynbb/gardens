<?php
class companyModel extends Model
{
    public $_table = 'company';

    public $_fields = array('id','user_temp_mobile','name','fax_num','office_address','legal_person','identity','identity_card','mobile','operation_scale','operation_name','operation_mobile','operation_email','account','seats_no','license_pic','license_num','license_finance','license_range','license_type','license_regtime','license_address','code_pic','ex_code','code','tax_number','tax_pic','vat_price','vat_type','vat_time','vat_version','vat_invoice','vat_num','vat_code','vat_company','vat_identification','vat_address','vat_mobile','vat_account','vat_account_num','credit_code','credit_pic','contract_pic_num', 'logo','address','source','is_auth','is_check','is_complete','is_change','check_time','status','create_id','create_time','update_time','whitelist_status');

    public function __construct() {
        parent::__construct();
        $this->db('dazong');
    }

    /**
	 * 根据公司编号修改是否开启白名单
	 * @author subenjiang<email:benjiang.su@fmscm.com,phone:18511866287>
	 * @date 20160218
	 * @version 2.0
	 * @return array
	 */
    public function updateCompany($company,$id){
    	return $this->update($company,"id=:id",array(':id'=>$id));
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
