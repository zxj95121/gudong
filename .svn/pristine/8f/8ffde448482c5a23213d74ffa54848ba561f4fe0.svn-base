<?php
namespace app\index\controller;
// use app\common\model\ArrangeModel;
// use app\common\model\CouponModel;
// use app\common\model\StaffModel;
// use app\common\model\StageModel;
// use app\common\model\TechnicianModel;
// use app\common\model\UserCouponModel;
use app\common\model\UserModel;

use app\common\service\serviceWechat;
use app\common\service\Wechat;
use think\Config;
use think\Controller;
use think\Session;
use think\Request;


class Base extends Controller
{
    protected $_layout = null;
    protected $userinfo = null;//这个值不允许被调用，仅仅Base内部网页授权后进行调用
    /**
     * 初始化
     */
    public function _initialize()
    {
        header('content-type:text/html;charset=utf-8');
        $this->_layout = 'Default';
        $showTop = Config::get('top');
        $this->assign('base_path', '/static/index');
        $this->assign('showTop', $showTop);
        //设置用户session;方便本地测试
        if(strpos($this->request->domain(), 'u.dong')) {
            Session::set('openid', 'oY_EK1S_s1Gcji46K7f22mniA8cQ');
            Session::set('uid', '1');
        }

        if (Session::get('urlParam')) {
            $up = Session::get('urlParam');
            Session::set('urlParam', '');
            $this->redirect($this->request->url(true).'&'.$up);
            return;
        }
        
        if (!Session::get('openid')) { //没有openid Session，就走网页授权
            $data = $this->request->param();
            if ($data) {
                if (isset($data['openid']) && isset($data['nickname'])) {
                    //说说刚刚网页授权跳转回来
                    Session::set('openid', $data['openid']);
                    $this->userinfo = $data;
                }
            }

            if (!Session::get('openid')) {
                $url = $this->request->url(true);
                $msg = explode('?', $url);
                if (strpos($url, '?')) {
                    Session::set('urlParam', $msg[1]);
                } else {
                    Session::set('urlParam', '');
                }
                
                $this->getOAuth($msg[0]);
            }
        }

        if (!Session::get('uid')) {
            //根据openid去获取用户的uid
            $result = $this->initUid();
            if (!$result) {
                $this->redirect('/index/index/login');
            }
        }


        //再判断用户的身份，非注册会员直接跳到注册页面
        $identity = UserModel::getIdentity(Session::get('uid'));
        if ($identity == 0) {
            $request = Request::instance();
            if ((!$request->isAjax()) && !strpos($this->request->url(true), '/index/index/login'))
                $this->redirect('/index/index/login');
        }


        //-----------------网页授权及用户身份相关代码开始

        // $this->codeCheck();

        // if (!Session::get('openid')) {
        //     //进行微信网页授权，获取用户的openid
        //     $this->redirect($this->oauthUrl());
        // }

        // if (!Session::get('uid')) {
        //     //根据openid去获取用户的uid
        //     $result = $this->initUid();

        //     //这里做了循环，如果数据库没有用户的openid，
        //     //并且网页授权失败，则重新调，重新网页授权。
        //     //重点是，为啥他的微信网页授权就失败!获取用户的信息，返回了errcode
        //     if (!$result) {
        //         $this->redirect('/index/index/index');
        //     }
        // }

        //-----------------网页授权及用户身份相关代码结束


        $this->assign('uid', Session::get('uid'));
    }

    //获取要跳转的网页授权链接
    private function oauthUrl()
    {
        $redirect_url = urlencode($this->request->url(true));
        $wechat = new Wechat();
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$wechat->getAppid().'&redirect_uri='.$redirect_url.'&response_type=code&scope=snsapi_base&state=1#wechat_redirect';
        return $url;
    }

    //检查是否为网页授权跳转过来带code参数的
    private function codeCheck()
    {
        if (isset($_GET['code']) && isset($_GET['state'])) {
            $wechat = new Wechat();
            $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$wechat->getAppid().'&secret='.$wechat->getAppsecret().'&code='.$_GET['code'].'&grant_type=authorization_code';

            $result = Wechat::curl($url);
            if (isset($result['openid'])) {
                Session::set('openid', $result['openid']);
            }
        }
    }

    //根据openid来找uid，找不到也没关系，说明该微信用户尚未注册账户
    private function initUid()
    {
        $openid = Session::get('openid');
        $flight = UserModel::where(['openid'=>$openid])
            ->find();

        if ($flight) {
            Session::set('uid', $flight->user_id);
        } else {
            //如果没有找到，则将此用户存入数据库

            $user_id = UserModel::newOpenidUser($this->userinfo);
            Session::set('uid', $user_id);

            return false;
        }
        return true;
    }


    public function getOAuth($url){
        if(Session::get('openid')){
            return false;
        }
        $notify_url = $url;
        // $notify_url = 'http://'.$_SERVER['SERVER_NAME']."/index/Oauth/getUserInfo";
         // var_dump($notify_url);
         // exit;
        $notify_url = base64_encode($notify_url);
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: http://vapi.ahamu.cn/index/wechat/authorize.html?notify_url={$notify_url}&companyCode=".Config::get('companyCode'));
        exit;
    }


    //获取微信jssdk
    protected function getWechatJs(){
        $serviceWechat = new serviceWechat();
        $res = $serviceWechat->getConfigJs([]);
        $res = json_decode($res,true);
        if(!isset($res['code']) || $res['code'] != 200){
            die('获取jsapi数据失败，请重新尝试！'.$res['msg']);
        }
        $jsapi_ticket = $res['data'];
        $timestamp = time();
        $nonceStr = rand(10000,80000);
        $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        $sign = "jsapi_ticket=$jsapi_ticket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";
        $signature = sha1($sign);
        $this->assign('signature',$signature);
        $this->assign('timestamp',$timestamp);
        $this->assign('nonceStr',$nonceStr);
        $this->assign('appId',Config::get('APPID'));
    }
}           
