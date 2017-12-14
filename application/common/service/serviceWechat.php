<?php
/**
 * Created by PhpStorm.
 * User: vowkin
 * Date: 2017/5/22
 * Time: 21:49
 */

namespace app\common\service;
use app\common\service\helperService;
use think\Config;

class serviceWechat
{
    public function getConfigJs($param=[]){
        $param['companyCode'] = Config::get('companyCode');
        $res = helperService::http_post('http://vapi.ahamu.cn/index/WechatJs/getConfigJs?leo_debug=leo',json_encode($param));
        return $res;
    }

    public function getToken($param=[]){
        $param['companyCode'] = Config::get('companyCode');
        $res = helperService::http_post('http://vapi.ahamu.cn/index/WechatJs/getToken?leo_debug=leo',json_encode($param));
        return $res;
    }
}