<?php
/**
 * Created by PhpStorm.
 * User: vowkin
 * Date: 2017/5/22
 * Time: 12:12
 */

namespace app\common\service;

use app\admin\service\ServiceAddressApi;
use app\common\model\ArrangeModel;
use app\common\model\CouponModel;
use app\common\model\ProjectModel;
use app\common\model\StoreModel;
use app\common\model\UserCouponModel;
use app\common\model\UserModel;
use think\Session;

class ServiceSmsApi extends BaseService
{
    /**
     * 发送短信
     * @param array $param
     * @return mixed
     */
    public function sendCode($param=[]){
        $res = $this->Request_call('index/Sms/sendCode',$param);
        return $res;
    }

    /**
     * 发送短信接口
     * @param array $param
     * @return mixed
     */
    public function sendMessage($param=[]){
        $res = BaseService::Request_call('index/Sms/sendMessage',$param);
        return $res;
    }

    /**
     *获取短信验证
     * @param array $param
     * @return mixed
     */
    public function checkCode($param=[]){
        $res = $this->Request_call('index/Sms/checkCode',$param);
        return $res;
    }

    /**
     * 判断是否是第一次下单
     * @param $user_no
     * @param $storeId
     * @param array $params
     * @param bool $wx
     * @param string $arrangeNo
     */
    public function  checkFirstPay($user_no,$storeId,$params=[],$wx=false,$arrangeNo=''){
        $arrangeModel = new ArrangeModel();
        $arrangeInfo = $arrangeModel->getOne(['user_no'=>$user_no,'status'=>['NEQ','4']]);
        $userModel = new UserModel();
        $userInfo = $userModel->getOne(['user_no'=>$user_no]);
        $SmsModel = new ServiceSmsApi();
        if(!$arrangeInfo){//是否是第一次消费

            $couponModel = new CouponModel();
            $userCouponModel = new UserCouponModel();
            $userCouponInfo = $userCouponModel->getMulti(['user_no'=>$user_no]);//得到用户已领取的优惠券
            $couId = array();
            if($userCouponInfo){
                foreach ($userCouponInfo as $res){
                    $couId[] = $res['coupon_id'];
                }
            }
            $userCoupon = $couponModel->getMulti(['coupon_type'=>3,'status'=>1,'coupon_id'=>['not in',$couId]]);

            if(!empty($userCoupon)){
                $this->insertCoupon($userCoupon,$user_no,$params);
                $count = count($userCoupon);
                $couponMoney = '';
                foreach ($userCoupon as $coupon){
                    $couponMoney += $coupon['coupon_price'];
                }
                //新收注册获得优惠券
                $this->newUserGetYh($userInfo,$count,$couponMoney);
//                $SmsModel->sendMessage(['mobile'=>"{$userInfo['mobile']}",'temp_id'=>'145034','temp_params'=>['num'=>"{$count}",'money'=>"{$couponMoney}/100"]]);
            }
        }else{
            $storeModel = new StoreModel();
            $storeInfo = $storeModel->getOne(['store_id'=>$storeId]);
            //预约成功
            $this->oneConsumption($userInfo,$storeInfo);
//            $SmsModel->sendMessage(['mobile'=>"{$userInfo['mobile']}",'temp_id'=>'144969','temp_params'=>['store'=>$storeInfo['store_name']]]);
        }

        if($wx){
           $re = $arrangeModel->getArr(['arrange_no'=>$arrangeNo]);
            $time=date('m-d H:i',$re['start_time']);
            $this->arrangeSuccess($userInfo,$arrangeInfo);
//           $this->sendMessage(['mobile'=>"{$userInfo['mobile']}",'temp_id'=>'144889','temp_params'=>['pay_style'=>"微信",'store_name'=>"{$re['store_name']}",'service_name'=>"{$re['project_name']}",'number'=>"{$re['number']}",'time'=>"{$time}"]]);
        }
    }


    /**
     * 优惠券插入
     * @param string $userCoupon
     * @param string $user_no
     * @param array $params
     * @return bool
     */
    public function insertCoupon($userCoupon='',$user_no='',$params=[]){

//        $couponModel = new CouponModel();
        $new = isset($params['new'])?$params['new']:2;
        $userCouponModel = new UserCouponModel();
        $userCouponInfo = $userCouponModel->getMulti(['user_no'=>$user_no]);//得到用户已领取的优惠券
        $couId = array();
        if($userCouponInfo){
            foreach ($userCouponInfo as $res){
                $couId[] = $res['coupon_id'];
            }
        }
        //$userCoupon = $couponModel->getMulti(array_filter(['coupon_type'=>3,'status'=>1]));
        if(!empty($userCoupon)){
            $data = array();
            foreach ($userCoupon as $coupon){
                $data[] = [
                    'user_no'=>$user_no,
                    'coupon_price'=>$coupon['coupon_price'],
                    'coupon_id'=>$coupon['coupon_id'],
                    'add_ts'=>time(),
                    'end_time'=>time()+$coupon['expire_ts']*86400,
                    'status'=>1,
                    'start_time'=>$coupon['add_ts'],
                    'from'=>1,
                    'coupon_no'=>$coupon['coupon_no'],
                    'original_user_no'=>$user_no,
                ];
            }

//            $userCouponModel = new UserCouponModel();
            $return = $userCouponModel->insertAll($data);
            if($return === false){
                die("插入优惠券失败！");
            }
            if($new ==1 ){
                $url = url("/index/index/user_coupon");
                header("location:$url");
                exit;
            }elseif ($new == 3){
                $url = url('/index/index/mall_order_pay',['is_project'=>$params['is_project'],'arrange_no'=>$params['arrange_no'],'arrangeTs'=>$params['arrangeTs'],'serviceId'=>$params['serviceId'],'danJia'=>$params['danJia'],'new'=>$new]);
                header("location:$url");
                exit;
            }
            return true;
        }
        return false;
    }

/*******************************************************************************************************************/

    /**
     * 优惠券领取成功发送短信
     */
    public static function sendCouponMessage(){
        $SmsModel = new ServiceSmsApi();
        $userModel = new UserModel();
        $str='尊敬的用户您好，恭喜您成功领取一份特别优惠，请在个人中心查看信息。';

        $userInfo = $userModel->getOne(['user_no'=>Session::get('user_no')]);
        $mobile=$userInfo['mobile'];
//        echo $mobile;exit;
        $temp_id='145033';
        $array=['aa'=>'11'];
        $res=$SmsModel->sendMessage(['mobile'=>$mobile,'temp_id'=>$temp_id,'temp_params'=>$array]);
//        dump($res);exit;
    }

    /**
     * 赠送优惠券发送短信
     * @param $mobile
     * @param $user_name
     */
    public static function sendCouponMobile($mobile,$user_name){
        $SmsModel = new ServiceSmsApi();
        $str='亲，您的好友{{user_name}}给你一份惊喜，请在前往秘舍公众号查看。';
        $mobile=$mobile;
        $temp_id='144893';
        $array=['user_name'=>$user_name];
        $res=$SmsModel->sendMessage(['mobile'=>$mobile,'temp_id'=>$temp_id,'temp_params'=>$array]);
//        dump($res);exit;
    }

    /**
     * 增长服务兑换
     */
    public static function sendExchangeMessage(){
        $SmsModel = new ServiceSmsApi();
        $userModel = new UserModel();
        $userInfo = $userModel->getOne(['user_no'=>Session::get('user_no')]);
        $storeModel = new StoreModel();
        $storeId = Session::get('storeId');
        $storeInfo = $storeModel->getOne(['store_id'=>$storeId]);

        $mobile=$userInfo['mobile'];
        $temp_id='144971';
        $array=['store'=>$storeInfo['store_name'],'service_name'=>Session::get('serviceName')];
        $res=$SmsModel->sendMessage(['mobile'=>$mobile,'temp_id'=>$temp_id,'temp_params'=>$array]);
//        dump($res);exit;
    }

    /**
     * 增值服务发送后台
     * @param $VSInfo
     */
    public static function sendExchangeMessageAdmin($VSInfo){
        $SmsModel = new ServiceSmsApi();
        $storeModel = new StoreModel();
        $storeInfo = $storeModel->getOne(['store_id'=>$VSInfo['store_id']]);
        $userModel = new UserModel();
        $userInfo = $userModel->getOne(['user_no'=>Session::get('user_no')]);

        $mobile=$storeInfo['sms_phone'];
        $temp_id='145176';
        $array=['admin_name'=>$storeInfo['contact'],'user_tel'=>$userInfo['mobile'],
            'service_name'=>$VSInfo['valueService_name']];
        $SmsModel->sendMessage(['mobile'=>$mobile,'temp_id'=>$temp_id,'temp_params'=>$array]);
    }


    /**
     * 新手注册获得优惠券
     * @param $userInfo
     */
    public static function newUserGetYh($userInfo){
        $SmsModel = new ServiceSmsApi();
        $str='尊敬的用户，恭喜您成为我们秘舍的一员，特给你一份惊喜，请在个人中心查看。';
        $mobile=$userInfo['mobile'];
        $temp_id='145034';
        $array=[];
        $SmsModel->sendMessage(['mobile'=>$mobile,'temp_id'=>$temp_id,'temp_params'=>$array]);
    }

    /**
     * 预约成功
     * @param $userInfo
     * @param $arrangeInfo
     */
    public static function arrangeSuccess($userInfo,$arrangeInfo){
        $SmsModel = new ServiceSmsApi();
        $projectModel=new ProjectModel();
        $project=$projectModel->getOne(['project_id'=>$arrangeInfo['project_id']]);
        $str='尊敬的用户您好，你已成功预约{{service_name}}，详细信息请在秘舍中查看。';
        $mobile=$userInfo['mobile'];
        $temp_id='144889';
        $array=['service_name'=>$project['project_name']];
        $SmsModel->sendMessage(['mobile'=>$mobile,'temp_id'=>$temp_id,'temp_params'=>$array]);
    }

    /**
     * 第一次消费
     * @param $userInfo
     * @param $sore
     */
    public static function oneConsumption($userInfo,$sore){
        $SmsModel = new ServiceSmsApi();
        $str='尊敬的用户您好，恭喜您在{{sore}}预约成功，我们为您提供最优质服务。';
        $mobile=$userInfo['mobile'];
        $temp_id='145223';
        $array=['sore'=>$sore['store_name']];
        $res=$SmsModel->sendMessage(['mobile'=>$mobile,'temp_id'=>$temp_id,'temp_params'=>$array]);
//        dump($res);exit;
    }
}