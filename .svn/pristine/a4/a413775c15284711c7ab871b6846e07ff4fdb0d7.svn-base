<?php
/**
 * Created by PhpStorm.
 * User: vowkin
 * Date: 2017/5/20
 * Time: 11:27
 */
namespace app\common\service;

class interfaceService
{
    public static $errorInfo = null;

    /**
     * @param $url
     * @param string $param
     * @param bool $is_ssl 是否启用ssl请求
     * @return mixed
     */


    /**
     *  微信二维码接口
     * @param $data
     */
    public static  function returnErWeiCode($content){
     
        $public_key = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDkMateIwsasBD9NT2n5iUc2RM5
jERDyComwLyOCn0XIBNW246j2yd/yhGXFFKLJ2R2wqGn7RON+tE7901eDkqsqAX9
vFZ3zWBHUczWzwSS4htSS047XJOWk+cKuRwPHxX0hZwyUjBMLW7Ig2jDNGqI7MO2
KgUvqZxoMrB4PQ7OfQIDAQAB
-----END PUBLIC KEY-----';
 
        // $data = json_encode(['content'=>'http://www.baidu.com','level'=>'M','size'=>3]);
        // //echo $data;exit;
        // //公钥
        // $publicKey  = openssl_pkey_get_public($public_key);
        // $encrypted = '';
        // foreach (str_split($data, 117) as $chunk) {
        //     openssl_public_encrypt($chunk, $encryptData, $publicKey);
        //     $encrypted .= $encryptData;
        // }
        // $data = base64_encode($encrypted);

        $data = json_encode(['ssl_ts'=>time(),'content'=>$content,'level'=>'M',"size"=>'3',"is_down"=>1]);
        $moniOpenssl = helperService::http_post('https://wechatapi.ahamu.cn/base/moniOpenssl',$data,true);
        //echo $data."\n";
        $data = urlencode($moniOpenssl);
        //$return = httpPost('https://wechatapi.ahamu.cn/Qrcode/QR',$data);
        return "https://wechatapi.ahamu.cn/Qrcode/QR?encrypted={$data}";
    }
    
}