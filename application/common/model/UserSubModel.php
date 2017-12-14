<?php
namespace app\common\model;

use app\common\model\UserModel;
use app\common\model\UserFriendModel;


use think\Db;
use think\Session;

class UserSubModel extends BaseModel
{
    protected $table = 'user_sub';

    public static function newSub($uid, $sub_uid)
    {
        $count = UserSubModel::where(['uid'=>$uid, 'sub_uid'=>$sub_uid])
            ->count();

        if ($count) {
            //有值，改状态
            $flight = UserSubModel::get(['uid'=>$uid, 'sub_uid'=>$sub_uid]);
            $flight->status = 1;
            $flight->add_ts = time();
            $flight->save();
        } else {
            //插入新值
            $flight = new UserSubModel();
            $flight->uid = $uid;
            $flight->sub_uid = $sub_uid;
            $flight->add_ts = time();
            $flight->save();
        }

        //判断用户有没有关注他

        $usub = UserSubModel::where(['uid'=>$sub_uid, 'sub_uid'=>$uid])
            ->count();

        if ($usub) {
            //他们两是相互关注
            $fcount = UserFriendModel::where(['uid'=>$uid, 'fid'=>$fid])
                ->count();
            if ($fcount) {
                $data = array('status'=>1);
                //已经有好友数据，将两个好友的好友数据全部变为1
                $this->saveData($data, ['uid'=>$uid, 'fid'=>$sub_uid]);
                $this->saveData($data, ['uid'=>$sub_uid, 'fid'=>$uid]);
            } else {
                //插入新的friend数据,两条记录
                UserFriendModel::newFriend($uid,  $sub_uid);//该方法直接插两条数据
            }
        }
    }

    //获取某个用户的用户关注数量
    public static function getUSN($uid)
    {
    	//获取用户关注的数量
    	$count = UserSubModel::where(['uid' => $uid, 'status'=>1])
    		->count();
    	return $count;
    }

    //获取某个用户粉丝数
    public static function getUFN($uid)
    {
    	$count = UserSubModel::where(['sub_uid' => $uid, 'status'=>1])
    		->count();
    	return $count;
    }
}
