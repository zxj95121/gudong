<?php
namespace app\index\controller;

use app\common\service\Wechat;


class Special
{
    public function _initialize()
    {
        parent::_initialize();
    }

    //获取access_token,临时供其他服务器请求接口
    public function getAccessToken()
    {
    	return json(['result' => Wechat::access_token_true()]);
	}
}