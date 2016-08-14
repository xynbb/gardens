<?php

/**
 * 富文本XSS防攻击净化服务
 * @author weiguang3
 *
 */
require_once 'simple_html_dom.php';
require_once 'anti_xss.class.php';

class XssPurifyService extends CComponent {
	
	private $antiXss = null;
	
	public function init(){
		
	}
	
	
	
	public function __construct(){
		$this->antiXss = new anti_xss();
	}
	
	
	public function purify($content){
		if(empty($content)){
			return '';
		}
		
		//$antiXss->debug = true;
		return $this->antiXss->purify($content);
	}
	
}

?>