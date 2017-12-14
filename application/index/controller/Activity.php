<?php
namespace app\index\controller;

use app\common\model\UserModel;
use app\common\model\MomentModel;
use app\common\model\ThumbModel;
use app\common\model\ActivityModel;
use app\common\model\CommentModel;
use app\common\model\CollectionModel;
use app\common\model\RedRecordModel;
use app\common\model\ProvinceModel;
use app\common\model\CityModel;
use app\common\model\AreaModel;
use app\common\model\GiftOrderModel;

use app\common\service\helperService;
use app\common\service\requestService;
use think\Db;
use think\Validate;
use think\Session;

class Activity extends Base
{
    public function _initialize()
    {
        parent::_initialize();
    }

    //点赞活动页
    public function thumb($aid)
    {
    	$request = $this->request->param();
        $aid = $request['aid'];
        $type = $request['type'];

        $thumb = new ThumbModel();
        $jia = 1;

        //点赞
        //判断是否有数据
        $count = $thumb->where('user_id', Session::get('uid'))
            ->where('activity_id', $aid)
            ->count('*');
        
        if ($count > 0) {
            //查找之前的times
            $thumbObj = ThumbModel::get(['user_id'=>Session::get('uid'), 'activity_id'=>$aid]);
            $jia = ($thumbObj['times']+1) > 100 ? 0 : 1;
            $times = $thumbObj['times']+$jia;

             $data = array(
                'times' => $times
            );
        } else {
            $data = array(
                'user_id' => Session::get('uid'),
                'activity_id' => $aid,
                'add_ts' => time()
            );
            $thumb->saveData($data);

            //改变活动的数据
	        $flight = ActivityModel::get($aid);
	        $flight->thumbs = $flight->thumbs + $jia;
	        $flight->save();

            return json(['errcode' => 0, 'jia'=>$jia]);
        }
        //进行更新数据
        
        $where = array(
            'user_id' => Session::get('uid'),
            'activity_id' => $aid
        );
        $thumb->saveData($data, $where);


        //改变活动的数据
        $flight = ActivityModel::get($aid);
        $flight->thumbs = $flight->thumbs + $jia;
        $flight->save();

        return json(['errcode' => 0, 'jia'=>$jia]);
    }

    //活动收藏页
    public function collect(){
    	$uid = Session::get('uid');
    	$identity = UserModel::getIdentity($uid);

    	if ($identity != 1) {
    		return json(['errcode' => 2]);
    	}

    	//开始进行收藏
    	$request = $this->request->param();
    	$aid = $request['aid'];

    	// $mobj = MomentModel::get($aid);
    	// if ($mobj['user_id'] == $uid) {
    	// 	return json(['errcode' => 2]);
    	// }

    	$collect = new CollectionModel();
            //收藏
        //判断是否有数据
        $count = $collect->where('user_id', $uid)
            ->where('activity_id', $aid)
            ->where('status', 1)
            ->count('*');
        
        if ($count > 0) {
            return json(['errcode' => 3, 'data'=>'已经收藏过了']);
        } else {
            $data = array(
                'user_id' => $uid,
                'activity_id' => $aid,
                'add_ts' => time()
            );
            $collect->saveData($data);

            return json(['errcode' => 0]);
        }
    }

    //会员评论ajax请求
    public function comment()
    {
    	$uid = Session::get('uid');
    	$identity = UserModel::getIdentity($uid);

    	if ($identity != 1) {
    		return json(['errcode' => 1]);
    	}

    	$userObj = UserModel::get($uid);

    	$request = $this->request->param();
    	$msg = $request['msg'];
    	$aid = $request['aid'];

    	$insertId = CommentModel::mewComment($uid, $aid, $msg, 1);//第四个参数1表示活动评论
    	return json(['errcode'=>0, 'cid'=>$insertId, 'name'=>$userObj['user_name']]);
    }


    public function redPack()
    {
        //只有付费会员才能参与活动
        $identity = UserModel::getIdentity(Session::get('uid'));
        if ($identity == 0) {
            return $this->redirect('/index/index/login');
        } else if ($identity == 2) {
            return $this->redirect('/index/user/payVip');
        }

        $request = $this->request->param();
        $aid = $request['aid'];


        //根据aid查活动详情
        $act_obj = ActivityModel::getOneRedPack($aid);
        $this->assign('act_obj', $act_obj);

        $userObj = UserModel::get(Session::get('uid'));
        $this->assign('userObj', $userObj);
        //抽奖页
        return $this->fetch($this->_layout . '/index/redPack');
    }


    //红包参与处理页
    public function redPackDeal()
    {
        $request = $this->request->param();
        if (!isset($request['aid'])) {
            exit;
        }

        if (!Session::get('uid')) {
            exit;
        }

        $uid = Session::get('uid');
        $aid = $request['aid'];

        //活动详情
        $act_obj = ActivityModel::getOneRedPack($aid);
        $userObj = UserModel::get($uid);
        if ($act_obj['config']['pay'] > $userObj['yanzhi']) {
            return $this->redirect('/index/activity/redPack', ['aid' => $aid]);
        }

        $num = rand($act_obj['config']['min'], $act_obj['config']['max']);

        $userObj->yanzhi = $userObj['yanzhi'] - $act_obj['config']['pay'] + $num + $act_obj['config']['back'];

        $userObj->save();

        //将信息记录
        $message_id = RedRecordModel::newRecord($uid, $aid, $num);

        return $this->redirect('/index/activity/redPackResult', ['id' => $message_id]);
    }

    //活动展示页
    public function redPackResult()
    {
        $request = $this->request->param();
        $id = $request['id'];

        $joinObj = RedRecordModel::get($id);

        //活动详情
        $act_obj = ActivityModel::getOneRedPack($joinObj->aid);
        $userObj = UserModel::get($joinObj->uid);

        $this->assign('joinObj', $joinObj);
        $this->assign('act_obj', $act_obj);
        $this->assign('userObj', $userObj);

        return $this->fetch($this->_layout . '/index/redPackResult');
    }



    //研值送礼活动首页
    public function sendGift()
    {
        $identity = UserModel::getIdentity(Session::get('uid'));
        if ($identity == 0) {
            return $this->redirect('/index/index/login');
        } else if ($identity == 2) {
            return $this->redirect('/index/user/payVip');
        }
        $request = $this->request->param();
        $aid = $request['aid'];

        //根据aid查活动详情
        $act_obj = ActivityModel::get($aid);
        $this->assign('act_obj', $act_obj);


        //用户信息
        $userObj = UserModel::get(Session::get('uid'));
        $this->assign('userObj', $userObj);
        $this->assign('need', 1000);

        return $this->fetch($this->_layout . '/index/sendGift');
    }


    //参加礼品活动的ajax方法
    public function joinGift()
    {
    	$request = $this->request->param();
        $detailAddress = $request['address'];
        $name = $request['name'];
        $phone = $request['mobile'];
        $cost=$request['cost'];
        $proName=$request['proName'];
        $miCost=$cost*(-1);
    	$result = UserModel::addFaceScore($miCost);
    	if($result==false){
    		return json(['errcode' => 1]);
    	}
    	else{
    		$flight = new GiftOrderModel();
	        $flight->uid = Session::get('uid');
	        $flight->add_ts = time();
	        $flight->detail = $detailAddress;
	        $flight->name = $name;
	        $flight->phone = $phone;
			$flight->cost = $cost;
			$flight->product_name = $proName;
	        $flight->save();
	        //扣除对应的研值
	        return json(['errcode' => 0]);
    	}
       
    }
    

    //查出省市区的代码


    //配合ProvinceModel里面的getObj的方法
            // $obj = ProvinceModel::getObj();

        // $data = array();
        // foreach ($obj as $key => $value) {
        //     // var_dump($value['name']);
        //     $pid = $value['id'];
        //     $data[$key]['text'] = $value['name'];
        //     $data[$key]['value'] = $pid;
        //     $cityObj = CityModel::all(['pid'=>$pid]); 

        //     if (count($cityObj) > 0) {
        //         $data[$key]['children'] = array();
            
        //         foreach ($cityObj as $ke => $va) {
        //             $cid = $va['id'];

        //             $data[$key]['children'][$ke]['text'] = $va['name'];
        //             $data[$key]['children'][$ke]['value'] = $cid;


        //             $areaObj = AreaModel::all(['cid'=>$cid]);
        //             if (count($areaObj) > 0) {
        //                 foreach ($areaObj as $k => $v) {
        //                     $data[$key]['children'][$ke]['children'][$k]['text'] = $v['name'];
        //                     $data[$key]['children'][$ke]['children'][$k]['value'] = $v['id'];
        //                 }
        //             }
        //         }
        //     }
        // }
        // $str = json_encode($data);

        // var_dump($str);
}