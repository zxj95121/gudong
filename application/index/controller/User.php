<?php
namespace app\index\controller;

use app\common\model\UserModel;
use app\common\model\UserSubModel;
// use app\common\service\helperService;
use app\common\service\Wechat;
use think\Db;
use think\Validate;
use think\Session;

class User extends Base
{
    public function _initialize()
    {
        parent::_initialize();
    }

    //前端获取手机验证码
    public function getCode()
    {
    	$request = $this->request->param();

    	if (!isset($request['tel'])) {
    		return json(['errcode' => 1]);
    	}

    	$tel = $request['tel'];
    	//此处进行发送验证码
    	/*
    	*/
    	// $code = ''.rand(100, 999).rand(100, 999);
    	$code = 99999;
    	Session::set('tel', $tel);
    	Session::set('code', $code);
    	return json(['errcode' => 0, 'code'=> $code]);
    }


    //前端请求判断checkYcode是否可用或合法
    public function checkYcode()
    {
        $request = $this->request->param();
        $ycode = $request['ycode'];

        $count = UserModel::where(['ycode'=>$ycode])
            ->count();

        if ($count) {
            return json(['errcode' => 0]);//有这个邀请码
        } else {
            return json(['errcode' => 1]);//没有邀请码
        }
    }

    //前端注册新用户
    public function newUser()
    {
    	$request = $this->request->param();

    	// if (!isset($request['tel']) || !isset($request['phoneCode'])) {
    	// 	return json(['errcode' => -1]);
    	// }

    	// if ($request['tel'] != Session::get('tel') || $request['phoneCode'] != Session::get('code')) {
    	// 	return json(['errcode' => 1, 'reason' => '数据不对，验证失败']);
    	// }

            
        //再次验证code是否对
        $ycode = $request['ycode'];
        $count = UserModel::where(['ycode'=>$ycode])
            ->count();
        if (!$count) {
            exit;//非法入侵，直接退出
        }
        //去查找用户的信息
        // $userObj = Wechat::getUserInfo(Session::get('openid'));
        $yUser = UserModel::get(['ycode' => $ycode]);

        //生成新用户的邀请码
        do {
            $newCode = '' . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);

            //检查该邀请码是否已经存在
            $isexits = UserModel::where(['ycode'=>$newCode])
                ->count();

            if (!$isexits) {
                break;
            }

        }while (1);

    	$data = array(
    		'mobile' => $request['tel'],
            'yid' => $yUser['user_id'],
            'ycode' => $newCode
            // 'yanzhi' => 20000
    	);


        Db::startTrans();
        try{
            $userModel = new UserModel();
            $userModel->saveData($data, ['openid' => Session::get('openid')]);

            //然后注册送研值
            UserModel::addFaceScore('register', Session::get('uid'));
            // UserModel::addFaceScore('invite', $yUser['user_id']);//转移到付费成功后
            // 提交事务
            Db::commit();
            return json(['errcode' => 0]);
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
        }
    	
    	// Session::set('uid', $user_id);

    	return json(['errcode' => 3]);
    }



    /*
        用户付费
        变成VIP付费会员
    */
    public function payVip()
    {
        $uid = Session::get('uid');
        $userObj = UserModel::get($uid);

        $this->assign('userObj', $userObj);

        $extral = UserModel::getPayVipPrice($uid);
        $this->assign('extral', $extral);
        $this->assign('real_ext', str_replace(',', '', ''.$extral));
        return $this->fetch($this->_layout . "/index/payVip");
    }

    //ajax toVip (研值足够)
    public function toVip()
    {
        $request = $this->request->param();

        if (!isset($request['extral'])) {
            echo '呵呵哒';
            exit;
        }

        $extral = $request['extral'];

        $uid = Session::get('uid');
        $extral_real = UserModel::getPayVipPrice($uid);

        if ($extral != $extral_real) {
            return json(['errcode' => 1]);
        }

        if ($extral == 0) {
            //这是用户不需要支付金钱的情况
            $userObj = UserModel::get($uid);
            $userObj->yanzhi = $userObj->yanzhi - 1999;
            $userObj->isMember = 1;
            $userObj->save();

            //给邀请人加积分
            if ($userObj['yid']) {
                UserModel::addFaceScore('invite', $userObj['yid']);
            }
            return json(['errcode' => 0]);
        }
    }


    public function subscribe()
    {
        $uid = Session::get('uid');

        $request = $this->request->param();
        $sub_uid = $request['uid'];//被关注人的ID

        UserSubModel::newSub($uid, $sub_uid);

        return json(['errcode'=>0]);
    }
}