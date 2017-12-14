<?php
namespace app\common\model;

use app\common\model\UserModel;

use think\Db;
use think\Session;

class UserFriendModel extends BaseModel
{
    protected $table = 'user_friend';

    public static function newFriend($uid,  $sub_uid)
    {
    	$flight = new UserFriendModel();
    	$flight->id = $uid;
    	$flight->fid = $sub_uid;
    	$flight->add_st = time();
    	$flight->save();

    	$flight = new UserFriendModel();
    	$flight->fid = $uid;
    	$flight->id = $sub_uid;
    	$flight->add_st = time();
    	$flight->save();
    }
}
