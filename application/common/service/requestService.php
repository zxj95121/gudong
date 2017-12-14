<?php
/**
 * Created by PhpStorm.
 * User: vowkin
 * Date: 2017/5/20
 * Time: 11:27
 */
namespace app\common\service;

class requestService
{
	/**
	* @author 张贤健
	* @function curl请求微信接口等
	* @program $url,$data=null
	*/
	public static function curl($url, $data = null)
	{
		// ------------------------------------------------------------------------
        //curl发送接口请求信息
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return json_decode($output,true);
    }
}