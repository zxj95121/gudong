<?php
namespace app\common\model;
/**
 * 发布状态表
 * Class MomentModel
 * @package app\common\model
 */

use app\common\model\UserModel;
use app\common\model\ThumbModel;
use app\common\model\CommentModel;
use app\common\model\CollectionModel;
use app\common\model\UserSubModel;

use app\common\service\Wechat;

use think\Session;
use think\Db;

class MomentModel extends BaseModel
{
    protected $table = 'moment';

    public function getMomentPage($page,$pageSize,$condition = [],$is_count = false, $order = '')
    {
        $this->alias('moment')
            ->field('moment.*,user.user_name');
        $join = [
            ['user user', 'user.user_id=moment.user_id', 'LEFT'],
        ];

        if (!empty($order)) {
            $this->order($order);
        }
        if (!empty($condition)) {
            $this->where($condition);
        }
        if($is_count){
            return $this->page($page,$pageSize)->count();
        }
        return $this->join($join)->page($page,$pageSize)->select();
    }

    /**
     * 获取多条数据信息
     * @param array $condition
     * @param string $order
     * @return array
     */
    public function getMomentInfo($condition=[],$order=''){

        $this->alias('moment')
            ->field('moment.*,user.user_name');
        $join = [
            ['user user', 'user.user_id=moment.user_id', 'LEFT'],
        ];
        if($condition){
            $this->where($condition);
        }

        if($order){
            $this->order($order);
        }

        return $this->join($join)->column('*');

    }


    //获取某条说说详情
    public static function getMomentDetail($mid, $comment_limit=0)
    {
        $obj = MomentModel::get($mid)->toArray();
        $data =substr(stripslashes($obj['img']), 1, -1);
        $data = explode(',', $data);

        foreach ($data as $value) {
            $obj['images'][] = substr($value, 1, -1);
        }
        $obj['img'] = substr($data[0], 1, -1);
        $obj['content'] = Wechat::emoji_decode(stripcslashes($obj['content']));
        // $obj['add_ts'] = date('Y-m-d H:i:s', $obj['add_ts']);
        $obj['add_ts_pre'] = $obj['add_ts'];
        $obj['add_ts'] = Wechat::timetostr($obj['add_ts']);

        //获取这条说说的所有评论
        $obj['comments'] = CommentModel::getOneMomentComment($mid);

        // $obj['comments'] = array_slice($obj['comments'], 0, 3);

        //用户信息
        $userObj = UserModel::get($obj['user_id']);
        $obj['headimg'] = $userObj->header_img;
        $obj['name'] = $userObj->user_name;

        //再去获取说说的点赞，评论，收藏的数量
        $obj['thumb_num'] = ThumbModel::where(['moment_id'=>$obj['moment_id'], 'status'=>1])
            ->sum('times');
        $obj['thumb_num'] = $obj['thumb_num'] ? $obj['thumb_num'] : 0;

        $obj['comment_num'] = CommentModel::where(['moment_id'=>$obj['moment_id'], 'status'=>1, /*'comment_id'=>0*/])//状态1，说说对应，comment_id必须是0
            ->count();

        $obj['collect_num'] = CollectionModel::where(['moment_id'=>$obj['moment_id'], 'status'=>1])
            ->count();

        //当前用户是否已经点赞或是否已经收藏或者是否已经关注
        $obj['is_thumb'] = ThumbModel::where(['moment_id'=>$mid, 'user_id'=>Session::get('uid'), 'status'=>1])
            ->count();

        $obj['is_collect'] = CollectionModel::where(['moment_id'=>$mid, 'user_id'=>Session::get('uid'), 'status'=>1])
            ->count();
        if ($obj['user_id'] == Session::get('uid'))
            $obj['is_sub'] = 1;
        else
            $obj['is_sub'] = UserSubModel::where(['uid'=>Session::get('uid'), 'sub_uid'=>$obj['user_id'], 'status'=>1])
                ->count();
        return $obj;
    }


    /*对说说的阅读量加1*/
    public static function addReadNum($mid)
    {
        $flight = MomentModel::get($mid);
        $flight->read_num = $flight->read_num + 1;
        $flight->save();
    }


    public static function delOneMoment($mid)
    {
        //删除这个说说
        $uid = Session::get('uid');
        $flight = MomentModel::get($mid);
        if ($flight->user_id != $uid) {
            return false;
        }
        $flight->status = 2;
        $flight->save();
        return true;
    }



    //获取某个用户最新的说说的第一张图片,没有说说则显示头像
    public static function getNewImg($uid)
    {
        $find = MomentModel::where(['user_id' => $uid, 'status' => 1])
            ->order('add_ts desc')
            ->find();

        if (!$find) {
            $user = UserModel::get($uid);
            return $user['header_img'];
        } else {
            $data =substr(stripslashes($find['img']), 1, -1);
            $data = substr(explode(',', $data)[0], 1, -1);
            return $data;
        }
    }



    //设置说说可见性
    public static function setSee($mid, $see) {
        $flight = MomentModel::get($mid);
        if ($see == 1 || $see == 0) {
            $flight->see = $see;
            $flight->save();
            return true;
        }

        return false;
    }


    //获取某条说说的所有详细评论
    public static function getComments()
    {
        
    }

    public static function getPhotos($page, $pageSize=6){
        // $get = array_merge($_GET, array( 'page'=> $page));
        // $_GET = $get;
        // $variable = MomentModel::where('status', 1)
            // ->where('user_id', Session::get('uid'))
            // ->order('add_ts desc')
            // ->group('add_ts')
            // ->select('add_ts, moment_id, img')
            // ->paginate(100);
        $limit = ($page-1)*$pageSize;
        $user_id = Session::get('uid');
        $variable = Db::query("select DATE_FORMAT( FROM_UNIXTIME(add_ts), '%Y年%m月' ) as month, moment_id, img from moment where status=1 and user_id='{$user_id}' order by moment_id desc limit {$limit}, {$pageSize}" );

        // var_dump($variable);
        if (!count($variable)) {
            return array();//没有数据
        }
        $result = array();
        foreach ($variable as $key => $value) {
            if ($key == 0) {
                $month = ''.$value['month'];
                $k = 0;
            } else {
                if ($value['month'] != $month) {
                    $month = ''.$value['month'];
                    $k = 0;
                }
            }
            $result[$month][$k]['id'] = $value['moment_id'];
            $data = substr(stripslashes($value['img']), 1, -1);
            // $result[$key]['img'] = substr(explode(',', $data)[0], 1, -1);

            $data = explode(',', $data);
            // foreach ($data as $v) {
            //     $result[$key]['images'][] = substr($v, 1, -1);
            // }
            $result[$month][$k++]['img'] = substr($data[0], 1, -1);

            // $value['add_ts'] = date('Y-m-d H:i:s', $value['add_ts']);
        }
        return $result;
    }
}
