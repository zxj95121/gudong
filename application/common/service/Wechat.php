<?php
/**
 * Created by Sublime;
 * User: wells
 * Date: 2017/11/16
 * Time: 15:07
 */
namespace app\common\service;

use app\common\model\AccessTokenModel;

use think\Session;

class Wechat
{

	private $appid = 'wxd189fa8b150a7219';
	private $appsecret = 'c2cd85ae17acad2ccc92bea2a79e6f9c';
    public function __construct()
    {
        
    }

    public function getAppid()
    {
    	return $this->appid;
    }

    public function getAppsecret()
    {
    	return $this->appsecret;
    }


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
        return json_decode($output, true);
    }


    //获取用户access_token
    public static function access_token()
    {
        $result = self::curl('http://gudong.ahamu.cn/index/special/getAccessToken');
        return $result['result'];
    }

    //获取用户access_token
    public static function access_token_true()
    {
    	$flight = AccessTokenModel::get(1);

    	$last_time = $flight->created_at;

    	if (time() - $last_time > 3600) {
    		//重新获取access_token
    		$wechat = new Wechat();
    		$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$wechat->getAppid().'&secret='.$wechat->getAppsecret();
    		$result = self::curl($url);
    		
    		$access_token = $result['access_token'];
    		$flight->access_token = $access_token;
            $flight->created_at = time();
    		$flight->save();
    		return $access_token;
    	} else {
    		return $flight->access_token;
    	}
    }


    //通过UnionID机制,必须用户与公众号产生交互才可以调用此方法
    public static function getUserInfo($openid)
    {
    	$url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.self::access_token().'&openid='.$openid.'&lang=zh_CN';

    	$result = self::curl($url);

    	return $result;
    }


    //下载多媒体
    public static function downloadMedia($mediaArr)
    {
        $file = array();
        foreach ($mediaArr as $mediaid) {
            // $url = 'https://api.weixin.qq.com/cgi-bin/media/get?access_token='.self::access_token().'&media_id='.$mediaid;
            $url = 'http://file.api.weixin.qq.com/cgi-bin/media/get?access_token='.self::access_token().'&media_id='.$mediaid;
            
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_HEADER, 0); 
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));   
            curl_setopt($ch, CURLOPT_NOBODY, 0);    //对body进行输出。
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $package = curl_exec($ch);
            $httpinfo = curl_getinfo($ch);
           
            curl_close($ch);
            $media = array_merge(array('mediaBody' => $package), $httpinfo);
            //求出文件格式
            preg_match('/\w\/(\w+)/i', $media["content_type"], $extmatches);
            // $fileExt = explode('.', $media['content-disposition'])[1].substr(0, -1);
            $fileExt = $extmatches[1];
            if ($fileExt == 'json')
            	return false;
            $filename = '/uploads/mphoto/'.date('YmdHis').rand(1000,9999).".{$fileExt}";

            file_put_contents($_SERVER['DOCUMENT_ROOT'].$filename,$media['mediaBody']);
            $file[] = $filename;
        }

        return $file;
    }

    //把传进来的时间戳变成已过去的时间

    public static function timetostr($time)
    {
        $now = time();
        $space = $now - $time;

        if ($space < 60) {
            return '刚刚';
        } else if ($space < 3600) {
            return (int)($space/60).'分钟';
        } else if ($space < 3600*24) {
            return (int)($space/3600).'小时';
        } else if ($space < 3600*24*365) {
            return (int)($space/3600/24).'天前';
        } else {
            return (int)($space/3600/24/365).'年前';
        }
    }


    public static function emoji_decode($str) {
        $strDecode = preg_replace_callback('|\[\[EMOJI:(.*?)\]\]|', function($matches){  
            return rawurldecode($matches[1]);
        }, $str);

        return $strDecode;
    }

    public static function emoji_encode($str){
        $strEncode = '';

        $length = mb_strlen($str,'utf-8');

        for ($i=0; $i < $length; $i++) {
            $_tmpStr = mb_substr($str,$i,1,'utf-8');    
            if(strlen($_tmpStr) >= 4){
                $strEncode .= '[[EMOJI:'.rawurlencode($_tmpStr).']]';
            }else{
                $strEncode .= $_tmpStr;
            }
        }

        return $strEncode;
    }
}