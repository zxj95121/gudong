<?php
namespace app\index\controller;

use app\common\model\UserModel;
use app\common\model\MomentModel;
use app\common\model\ThumbModel;
use app\common\model\CommentModel;
use app\common\model\CollectionModel;
use app\common\model\UserNoseeModel;

use app\common\service\helperService;
use app\common\service\requestService;
use app\common\service\Wechat;

use think\Db;
use think\Validate;
use think\Session;

class Moment extends Base
{
    public function _initialize()
    {
        parent::_initialize();
    }

    public function proMoment()
    {
        $this->getWechatJs();
        return $this->fetch($this->_layout . "/index_new/proMoment");
    }

    //我的说说页
    public function myMoment(){

        $uid = Session::get('uid');

        $momentModel = new MomentModel();
        $momentList = $momentModel->where('user_id', $uid)
            ->where('status', 1)
            ->order('add_ts desc')
            ->select();

        foreach($momentList as &$val){
            // $img = eval($val['img']);
            $data =substr(stripslashes($val['img']), 1, -1);
            $val['img'] = substr(explode(',', $data)[0], 1, -1);

            $val['add_ts'] = date('Y-m-d H:i:s', $val['add_ts']);
        }
		
        $identity = UserModel::getIdentity($uid);

        $this->assign('identity', $identity);
        $this->assign('momentList',$momentList);

        return $this->fetch($this->_layout . "/index/myMoment");
    }


    public function myMomentShow()
    {
        $request = $this->request->param();
        if (!isset($request['mid'])) {
            exit;//
        }
        $mid = $request['mid'];

        // $obj = MomentModel::get($mid)->toArray();
        // $data =substr(stripslashes($obj['img']), 1, -1);
        // $data = explode(',', $data);

        // foreach ($data as $value) {
        //     $last = substr($value, 1, -1);
        //     $obj['images'][] = $last;

        // }
        // $obj['img'] = substr($data[0], 1, -1);
        // $obj['add_ts'] = date('Y-m-d H:i:s', $obj['add_ts']);
        // $obj['lastImg'] = $last;

        // //用户信息
        // $userObj = UserModel::get($obj['user_id']);
        // $obj['headimg'] = $userObj->header_img;
        // $obj['name'] = $userObj->user_name;

        $obj = MomentModel::getMomentDetail($mid);

        $this->assign('obj', $obj);
        $this->assign('mid', $mid);

        return $this->fetch($this->_layout . '/index/myMomentShow');
    }


    //用户（我的收藏）
    public function myCollect()
    {
        $uid = Session::get('uid');

        if (!$uid) {
            echo '请注册或重新登录!';
            exit;
        }

        //说说收藏
        $collectionObj = CollectionModel::getUserCollects($uid);
        
        foreach ($collectionObj as &$value) {
            $data =substr(stripslashes($value['img']), 1, -1);
            $value['img'] = substr(explode(',', $data)[0], 1, -1);

            $value['add_ts'] = date('Y-m-d H:i:s', $value['add_ts']);
        }

        //活动收藏
        $collectionActObj = CollectionModel::getUserCollects($uid, 1);
        
        foreach ($collectionActObj as &$value) {
            $data =substr(stripslashes($value['img']), 1, -1);
            $value['img'] = substr(explode(',', $data)[0], 2, -1);

            $value['add_ts'] = date('Y-m-d H:i:s', $value['add_ts']);
        }

        $this->assign('collectionObj', $collectionObj);
        $this->assign('collectionActObj', $collectionActObj);

        return $this->fetch($this->_layout . '/index/myCollection');
    }


    //我的评论

    public function myComment()
    {
        $uid = Session::get('uid');



        if (!$uid) {
            echo '请注册或重新登录!';
            exit;
        }

        //说说评论
        $sayObj = CommentModel::getUserComments($uid);
        
        foreach ($sayObj as &$value) {
            $data =substr(stripslashes($value['img']), 1, -1);
            $value['img'] = substr(explode(',', $data)[0], 1, -1);

            $value['add_ts'] = date('Y-m-d H:i:s', $value['add_ts']);
        }

        $actObj = CommentModel::getUserComments($uid, 1);
        
        foreach ($actObj as &$value) {
            $data =substr(stripslashes($value['img']), 1, -1);
            $value['img'] = substr(explode(',', $data)[0], 2, -1);

            $value['add_ts'] = date('Y-m-d H:i:s', $value['add_ts']);
        }

        $this->assign('sayObj', $sayObj);
        $this->assign('actObj', $actObj);
        return $this->fetch($this->_layout . '/index/myComment');
    }

    //1oIvk79vy_Q0YI1g0WN-YVtuFORFcsRdzI4_L7reVxd5WSn2rsKQYUmc8c58IAij
    public function newProMoment()
    {
        $uid = Session::get('uid');
        $identity = UserModel::getIdentity($uid);
        if ($identity != 1) {
            //非会员不允许发表说说
            exit;

        }

        $request = $this->request->param();

        $content = $request['content'];
        $see = $request['see'];
        $media = explode(',', $request['media']);

        //对media里面的每一个东西，都要进行下载到本地

        $file = Wechat::downloadMedia($media);
        if (!$file) {
        	//下载图片失败
        	return json(['errcode' => 1]);
        }
        $images = '[';
        foreach($file as $value) {
            $images .= '"'.$value.'",';
        }
        $images = substr($images, 0, -1).']';
        $images = addslashes($images);

        $momentModel = new MomentModel();

        $data = array(
            'user_id' => Session::get('uid'),
            'img' => $images,
            'see' => $see,
            'content' => Wechat::emoji_encode(strip_tags(addslashes($content))),
            'add_ts' => time()
        );

        $mid = $momentModel->saveData($data);

        return json(['errcode' => 0]);
    }

    //发布说说
    public function newMoment()
    {
        $uid = Session::get('uid');
        $identity = UserModel::getIdentity($uid);
        if ($identity != 1) {
            //非会员不允许发表说说
            exit;

        }

    	$request = $this->request->param();

    	$content = $request['content'];
        if(isset($request['see'])) {
            $see = 0;//私密
        } else {
            $see = 1;
        }
    	// $images = $request['images'];
        $files = request()->file("image");

        $images = '';
        foreach ($files as $file) {
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'. DS . 'img');
            // var_dump($info);
            //exit;
            if($info){
                // 成功上传后 获取上传信息
                $src = '/uploads/img/'.$info->getSaveName();//输出文件web访问路径
                $images .= str_replace('\\', '/', $src).',';
            }else{
                // 上传失败获取错误信息
                // echo $file->getError();
                echo 3;//文件因其他原因上传失败
                exit;
            }
        }
        
        $images = substr($images, 0, -1);

    	$images = '["'.str_replace(',', '","', $images).'"]';
    	$images = addslashes($images);

    	$momentModel = new MomentModel();

    	// $userObj = UserModel::get(Session::get('uid'));
    	$data = array(
    		'user_id' => Session::get('uid'),
    		'img' => $images,
            'see' => $see,
    		'content' => addslashes($content),
    		'add_ts' => time()
    	);

    	$mid = $momentModel->saveData($data);

        // $momentArr = MomentModel::get($mid)->toArray();
        // $momentArr['img'] = stripslashes($momentArr['img']);
        // $momentArr['add_ts'] = date('Y-m-d H:i:s', $momentArr['add_ts']);
        // $momentArr['errcode'] = 0;
    	return redirect('index/moment/myMoment');
    }


    //删除说说
    public function deleteSelfMoment()
    {
        if (!Session::get('uid')) {
            exit;
        }
        $request = $this->request->param();
        $mid = $request['mid'];

        if (MomentModel::delOneMoment($mid))
            $data = ['errcode' => 0];
        else
            $data = ['errcode' => 1];

        return json($data);
    }

    /**
     * [noseeAjax 不看某人]
     * @author wells
     * @return [int] [uid]
     */
    public function noseeAjax()
    {
        $request = $this->request->param();
        $user_id = $request['uid'];
        $uid = Session::get('uid');

        if ($user_id == $uid) {
            return json(array('errcode' => 1));
        }

        $flight = new UserNoseeModel();
        $flight->uid = $uid;
        $flight->nosee_id = $user_id;
        $flight->add_ts = time();
        $flight->save();

        return json(array('errcode' => 0));
    }

    /**
     * [moment_see description]
     * @author wells
     * @return [int] [mid]
     */
    public function moment_see()
    {
        $request = $this->request->param();
        $mid = $request['mid'];
        $see = $request['see'];

        $flight = MomentModel::get($mid);

        if (Session::get('uid') != $flight->user_id) {
            //非正常用户发起请求
            return json(['errcode' => 1]);
        }

        $flight->see = $see;
        $flight->save();
        return json(['errcode' => 0]);
    }

    //用户点赞
    public function thumb()
    {
        $max_thumb = 10;//对单个说说不限时间最大点赞数目
        $request = $this->request->param();
        $mid = $request['mid'];
        if (!isset($request['type']))
            $type = 1;
        else
            $type = $request['type'];

        $thumb = new ThumbModel();
        $time = strtotime(date('Y-m-d').' 00:00:00');//今天零点
        $jia = 1;
        if ($type) {
            //点赞
            //判断今天是否有数据
            
            $count = $thumb->where('user_id', Session::get('uid'))
                ->where('moment_id', $mid)
                ->where('add_ts', '>=', $time)
                ->count('*');
            
            if ($count > 0) {
                //查找之前的times
                $thumbObj = ThumbModel::where(['user_id'=>Session::get('uid'), 'moment_id'=>$mid])
                    ->where('add_ts', '>=', $time)
                    ->find();
                if ($thumbObj['times'] >= $max_thumb) {
                    //对该说说今日点赞已达上限
                    $data = ['errcode' => 1];
                    return json($data);
                }
                $jia = ($thumbObj['times']+1) > $max_thumb ? 0 : 1;
                $times = $thumbObj['times']+$jia;

                 $data = array(
                    'status' => 1,
                    'times' => $times
                );

                 //此处也要进行研值+1
                UserModel::addFaceScore('thumb');

            } else {
                $data = array(
                    'user_id' => Session::get('uid'),
                    'moment_id' => $mid,
                    'add_ts' => time()
                );
                $thumb->saveData($data);

                //此处要进行研值+1
                UserModel::addFaceScore('thumb');
                return json(['errcode' => 0, 'jia'=>$jia]);
            }
        } else {
            $data = array(
                'status' => 2
            );
        }
        //进行更新数据

        
        $where = array(
            'user_id' => Session::get('uid'),
            'moment_id' => $mid,
        );
        $flight = ThumbModel::where($where)
            ->where('add_ts', '>', $time)
            ->find();
        foreach ($data as $k => $v) {
            $flight->$k = $v;
        }
        $flight->save();
        // $thumb->saveData($data, $where);
        return json(['errcode' => 0, 'jia'=>$jia]);
    }

    //评论.html,带上说说
    public function comment()
    {
        $request = $this->request->param();
        $mid = $request['mid'];

        $obj = CommentModel::getOneMomentComment($mid);

        $this->assign('mid', $mid);
        $this->assign('obj', $obj);

        return $this->fetch($this->_layout . '/index/pinglun');
    }

    //删除自己说说的评论
    public function deleteComment()
    {
        $request = $this->request->param();
        $cid = $request['cid'];

        $flight = CommentModel::get($cid);
        $flight->status = 2;
        $flight->save();

        return json(['errcode' => 0]);
    }


    //设置说说可见性
    public function setSee()
    {
        $request = $this->request->param();
        $mid = $request['mid'];
        $see = $request['see'];

        MomentModel::setSee($mid, $see);

        return json(['errcode' => 0]);
    }

    public function upload()
	{
		$file = request()->file("image");
        // $file = $_FILES['image']; 
        // $upload = new \Think\Upload();// 实例化上传类      
        // $info = $upload->upload();
        // var_dump($info);
        // exit;
        // $name = date('YmdHis').rand(1000,9999).explode('.',$file['name'])[1];
        // if (move_uploaded_file($file['tmp_name'], ROOT_PATH . 'public' . DS . 'uploads'. DS . 'img' . DS . $name)) {
        //     // echo "File is valid, and was successfully uploaded.\n";
        //     $src = '/uploads/img/'.$name;//输出文件web访问路径
        //     $src = str_replace('\\', '/', $src);
        //     echo $src;
        // }
        // exit;
		if($file){
	        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'. DS . 'img');
            // var_dump($info);
            //exit;
	        if($info){
	            // 成功上传后 获取上传信息
	            $src = '/uploads/img/'.$info->getSaveName();//输出文件web访问路径
	            $src = str_replace('\\', '/', $src);
	            echo $src;
                exit;
	        }else{
	            // 上传失败获取错误信息
	            // echo $file->getError();
	            echo 3;//文件因其他原因上传失败
                exit;
	        }
	    } else {
            echo '没有文件';
        }
	}





    /*xin






    */

    public function showComments()
    {
        $request = $this->request->param();
        $mid = $request['mid'];

        

        return $this->fetch($this->_layout . '/index_new/showComments');
    }
}