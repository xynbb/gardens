<?php
/**
 * User: Administrator
 * Date: 2016/3/22
 * Time: 16:42
 * Function：
 * @param
 * @return
 */

/**
 * 加密，解密方法。
 * @author zhangtao@sohu-inc.com
 * @param string $string
 * @param string $key
 * @param string $operation encode|decode
 * @return string
 */
header("Content-type:text/html;charset=utf-8");
$keywords = $_GET['key'];
$key = 'GARDENS';
$strs = en_crypt($keywords,$key,'decode');
echo "<center><h1>解密结果为：".$strs."</h1></center>";
exit;
function en_crypt($string, $key, $operation = 'encode') {
    $keyLength = strlen($key);
    $string = (strtolower($operation) == 'decode') ? base64_decode($string) : substr(md5($string . $key), 0, 8) . $string;
    $stringLength = strlen($string);
    $rndkey = $box = array();
    $result = '';

    for ($i = 0; $i <= 255; $i++) {
        $rndkey[$i] = ord($key[$i % $keyLength]);
        $box[$i] = $i;
    }

    for ($j = $i = 0; $i < 256; $i++) {
        $j = ($j + $box[$i] + $rndkey[$i]) % 256;
        $tmp = $box[$i];
        $box[$i] = $box[$j];
        $box[$j] = $tmp;
    }

    for ($a = $j = $i = 0; $i < $stringLength; $i++) {
        $a = ($a + 1) % 256;
        $j = ($j + $box[$a]) % 256;
        $tmp = $box[$a];
        $box[$a] = $box[$j];
        $box[$j] = $tmp;
        $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
    }

    if (strtolower($operation) == 'decode') {

        if (substr($result, 0, 8) == substr(md5(substr($result, 8) . $key), 0, 8)) {
            return substr($result, 8);
        } else {
            return '';
        }
    } else {
        return base64_encode($result);
    }
}
