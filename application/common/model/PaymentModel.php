<?php
namespace app\common\model;
/**
 * 支付记录表
 * Class PaymentModel
 * @package app\common\model
 */

class PaymentModel extends BaseModel
{
    protected $table = 'payment';

    public function getPaymentPage($page,$pageSize,$condition = [],$is_count = false, $order = '')
    {
        $this->alias('payment')
            ->field('payment.*,user.user_name');
        $join = [
            ['user user', 'user.user_no=payment.user_no', 'LEFT'],
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
