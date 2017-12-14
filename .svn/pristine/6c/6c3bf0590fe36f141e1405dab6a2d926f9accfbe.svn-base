<?php
namespace app\common\model;
/**
 * 活动配置表
 * Class ActivityModel
 * @package app\common\model
 */


use app\common\model\CollectionModel;
use app\common\model\ThumbModel;
use app\common\model\RedConfigModel;

class ActivityModel extends BaseModel
{
    protected $table = 'activity';

    public function getActivityPage($page,$pageSize,$condition = [],$is_count = false, $order = '')
    {
        $this->alias('activity')
            ->field('activity.*,user.user_name');
        $join = [
            ['user user', 'user.user_no=activity.user_no', 'LEFT'],
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

    //获取一个用户对某个活动的点赞和收藏情况
    public static function getOneOperateStatus($uid, $aid)
    {
        $data['is_collect'] = CollectionModel::where(['user_id'=>$uid, 'activity_id'=>$aid, 'status'=>1])
            ->count();

        $data['is_thumb'] = ThumbModel::where(['user_id'=>$uid, 'activity_id'=>$aid, 'status'=>1])
            ->count();

        return $data;
    }


    //获取某个研值红包活动的详情，用户红包页面
    public static function getOneRedPack($aid)
    {
        $obj = ActivityModel::get($aid)->toArray();
        $obj['img'] = json_decode(stripslashes($obj['img']), true);

        $obj['config'] = RedConfigModel::get($obj['red_id'])->toArray();

        return $obj;

    }

//    public function getComment($condition=[]){
//        if($condition){
//            $this->where($condition);
//        }
//        return $this->alias('comment')
//            ->field('comment.*,store.store_name,store.discount,project.project_name,user.header_img')
//            ->join('store store','store.store_id = comment.store_id','LEFT')
//            ->join('project project','project.project_id = comment.project_id','LEFT')
//            ->join('user user','user.user_no = comment.user_no','LEFT')
//            ->order('comment.add_ts desc')
//            ->select();
//    }
//
//    public function getCommentCount($condition=[]){
//        if($condition){
//            $this->where($condition);
//        }
//        return $this->alias('comment')
//            ->field('comment.*,store.store_name,store.discount,project.project_name,user.header_img')
//            ->join('store store','store.store_id = comment.store_id','LEFT')
//            ->join('project project','project.project_id = comment.project_id','LEFT')
//            ->join('user user','user.user_no = comment.user_no','LEFT')
//            ->order('comment.add_ts desc')
//            ->count();
//    }
}
