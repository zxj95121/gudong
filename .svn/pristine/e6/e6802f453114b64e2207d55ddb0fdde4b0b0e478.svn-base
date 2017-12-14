<?php
namespace app\common\model;
/**
 * 收藏表
 * Class CollectionModel
 * @package app\common\model
 */

class CollectionModel extends BaseModel
{
    protected $table = 'collection';

    public function getCollectionPage($page,$pageSize,$condition = [],$is_count = false, $order = '')
    {
        $this->alias('collection')
            ->field('collection.*,user.user_name');
        $join = [
            ['user user', 'user.user_id=collection.user_id', 'LEFT'],
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
    public function getCollectionInfo($condition=[],$order=''){

        $this->alias('collection')
            ->field('collection.*,user.user_name');
        $join = [
            ['user user', 'user.user_id=collection.user_id', 'LEFT'],
            ['activity activity', 'activity.activity_id=collection.activity_id', 'LEFT'],
            ['moment moment', 'moment.moment_id=collection.moment_id', 'LEFT'],
        ];
        if($condition){
            $this->where($condition);
        }

        if($order){
            $this->order($order);
        }

        return $this->join($join)->column('*');

    }


    //获取用户的收藏情况
    public static function getUserCollects($uid, $type=0)
    {
        if (!$type)
            $cobj = CollectionModel::where(['c.user_id'=>$uid, 'c.status'=>1])
                ->alias('c')
                ->order('c.add_ts desc')
                ->join('moment m', 'm.moment_id = c.moment_id', 'right')
                ->field('c.moment_id, img, content, c.add_ts')
                ->select();
        else
            $cobj = CollectionModel::where(['c.user_id'=>$uid, 'c.status'=>1])
                ->alias('c')
                ->order('c.add_ts desc')
                ->join('activity a', 'a.activity_id = c.activity_id', 'right')
                ->field('c.activity_id, img, activity_name, c.add_ts')
                ->select();
        return $cobj;
    }


//    public function getComment($condition=[]){
//        if($condition){
//            $this->where($condition);
//        }
//        return $this->alias('comment')
//            ->field('comment.*,store.store_name,store.discount,project.project_name,user.header_img')
//            ->join('store store','store.store_id = comment.store_id','LEFT')
//            ->join('project project','project.project_id = comment.project_id','LEFT')
//            ->join('user user','user.user_id = comment.user_id','LEFT')
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
//            ->join('user user','user.user_id = comment.user_id','LEFT')
//            ->order('comment.add_ts desc')
//            ->count();
//    }
}
