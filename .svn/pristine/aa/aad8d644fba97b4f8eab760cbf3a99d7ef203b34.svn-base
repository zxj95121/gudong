<?php
namespace app\index\controller;

use app\common\model\UserModel;
use app\common\model\MomentModel;
use app\common\model\ThumbModel;
use app\common\model\CommentModel;
use app\common\model\CollectionModel;
use app\common\model\UserSubModel;

// use app\common\service\helperService;
use app\common\service\Wechat;
use think\Db;
use think\Validate;
use think\Session;

class See extends Base
{
    public function _initialize()
    {
        parent::_initialize();
    }

    //看说说页
    public function seeMoment(){

        $uid = Session::get('uid');

        $identity = UserModel::getIdentity($uid);
        $this->assign('identity', $identity);

        $request = $this->request->param();
        $mid = $request['mid'];

        $obj = MomentModel::getMomentDetail($mid);
        $data[] = $obj;
        // var_dump($obj);

        $commentObj = CommentModel::getOneMomentComment($mid);


        $this->assign('momentsObj',$data);
        // $this->assign('mid',$mid);
        // $this->assign('uid',$uid);
        // $this->assign('identity',$identity);//用户身份，0未注册，1会员，2非会员
        // $this->assign('commentObj',$commentObj);

        // return $this->fetch($this->_layout . "/index/seeMoment");
        return $this->fetch($this->_layout . "/index_new/seeMoment");
    }

    //收藏别人的说说页
    public function collect()
    {
    	$uid = Session::get('uid');
    	$identity = UserModel::getIdentity($uid);

    	if ($identity != 1) {
    		return json(['errcode' => 4]);
    	}

    	//开始进行收藏
    	$request = $this->request->param();
    	$mid = $request['mid'];
    	$type = $request['type'];

    	$mobj = MomentModel::get($mid);
    	if ($mobj['user_id'] == $uid) {
    		return json(['errcode' => 2]);
    	}

    	$collect = new CollectionModel();
        if ($type) {
            //收藏
            //判断是否有数据
            $count = $collect->where('user_id', $uid)
                ->where('moment_id', $mid)
                ->count('*');
            
            if ($count > 0) {
                //查看是否已經是收藏的狀態，如果是，直接返回錯誤信息
                $ccount = $collect->where('user_id', $uid)
                    ->where('moment_id', $mid)
                    ->where('status', 1)
                    ->count('*');
                if ($ccount) {
                    return json(['errcode' => 10]);
                }
                $data = array(
                    'status' => 1
                );
            } else {
                $data = array(
                    'user_id' => $uid,
                    'moment_id' => $mid,
                    'add_ts' => time()
                );
                $collect->saveData($data);

                return json(['errcode' => 0]);
            }
        } else {
            $data = array(
                'status' => 2
            );
        }
        //进行更新数据

        
        $where = array(
            'user_id' => $uid,
            'moment_id' => $mid
        );
        $collect->saveData($data, $where);
        return json(['errcode' => 0]);
    }

    public function comment()
    {
    	$uid = Session::get('uid');
    	$identity = UserModel::getIdentity($uid);

    	if ($identity != 1) {
    		return json(['errcode' => 1]);
    	}

    	$userObj = UserModel::get($uid);

    	$request = $this->request->param();
    	$msg = Wechat::emoji_encode(strip_tags($request['msg']));
    	$mid = $request['mid'];

        if(isset($request['cid'])) {
            //说明这是回复某个人的评论
            $cid = $request['cid'];

            $insertId = CommentModel::mewComment($uid, $mid, $msg, $cid);
            return json(['errcode'=>0, 'cid'=>$insertId, 'name'=>$userObj['user_name'], 'uid'=>Session::get('uid')]);
        }

    	$insertId = CommentModel::mewComment($uid, $mid, $msg);
    	return json(['errcode'=>0, 'cid'=>$insertId, 'name'=>$userObj['user_name'], 'uid'=>Session::get('uid')]);
    }

}