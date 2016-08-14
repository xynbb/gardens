<?php
trait TraitController {

    /**
     * @author subenjiang
     * @time 20151010
     * REQUEST 获取IP
     * Enter description here ...
     */
    public function get_ip()
    {
        static $ip = false;
    
        if (false != $ip) {
            return $ip;
        }

        if(isset($_SERVER['DZ_HTTP_CLIENT_IP']) && !empty($_SERVER['DZ_HTTP_CLIENT_IP'])) {
        	return $_SERVER['DZ_HTTP_CLIENT_IP'];
        }
    
        $keys = array(
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR'
        );
    
        foreach ($keys as $item) {
            if (!isset($_SERVER[$item])) {
                continue;
            }
    
            $curIp = $_SERVER[$item];
            $curIp = explode('.', $curIp);
            if (count($curIp) != 4) {
                break;
            }
    
            foreach ($curIp as & $sub) {
                if (($sub = intval($sub)) < 0 || $sub > 255) {
                    break 2;
                }
            }
    
            $curIpBin = $curIp[0] << 24 | $curIp[1] << 16 | $curIp[2] << 8 | $curIp[3];
            $masks = array(// hexadecimal ip  ip mask
                array(0x7F000001, 0xFFFF0000), // 127.0.*.*
                array(0x0A000000, 0xFFFF0000), // 10.0.*.*
                array(0xC0A80000, 0xFFFF0000) // 192.168.*.*
            );
            foreach ($masks as $ipMask) {
                if (($curIpBin & $ipMask[1]) === ($ipMask[0] & $ipMask[1])) {
                    break 2;
                }
            }
    
            return $ip = implode('.', $curIp);
        }
    
        return $ip = $_SERVER['REMOTE_ADDR'];
    }
	
	public function get_ip_loc($queryIP){ 
		
        $url = 'http://ip.qq.com/cgi-bin/searchip?searchip1='.$queryIP; 

        $ch = curl_init($url); 

        curl_setopt($ch,CURLOPT_ENCODING ,'gb2312'); 

        curl_setopt($ch, CURLOPT_TIMEOUT, 10); 

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回 

        $result = curl_exec($ch); 

        $result = mb_convert_encoding($result, "utf-8", "gb2312"); // 编码转换，否则乱码 

        curl_close($ch); 

        preg_match("@<span>(.*)</span></p>@iU",$result,$ipArray); 

        $loc = $ipArray[1]; 

        return $loc; 

    }
}