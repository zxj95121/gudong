<?php
/**
 * Created by PhpStorm.
 * User: vowkin
 * Date: 2017/5/22
 * Time: 13:15
 */
namespace app\common\service;

use think\Cookie;

class BaseService
{
    public  $Api_host = '';
    private $_token = null;
    private $_account=null;
    public function __construct()
    {
        $this->_account=config('account');
        $this->Api_host = config('Api_host');
        $this->_token = Cookie::get('vpi_token');
        if(!$this->_token){
            $this->_token = $this->getToken($this->_account);
        }
    }

    public function Request_call($url, $param=[]) {

        if(!is_array($param)){
            throw new \RuntimeException('HTTP POST 参数必须是数组');
        }
        $param['token'] = $this->_token;
        $param['companyCode']=$this->_account['companyCode'];
        $param = json_encode($param);
        $url = $this->Api_host.$url;
        $tmpInfo = helperService::http_post_Api($url,$param);
        if( 40044 == $tmpInfo['code']){
            $this->getToken($this->_account);
            $tmpInfo = $this->Request_call($url,json_decode($param,true));
        }
        return $tmpInfo;
    }
    //获取token
    public function getToken($param){
        $res = $this->Request_call('index/auth/authorization',$param);
        $token = $res['data']['access_token'];
        Cookie::set('vpi_token',$token);
        return $token;
    }
}