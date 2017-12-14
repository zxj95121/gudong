<?php
namespace app\common\model;

use think\Db;
use think\Session;

use app\common\service\Wechat;

use app\common\model\UserModel;

class YanzhiPayModel extends BaseModel
{
    protected $table = 'yanzhiPay';

    public function getYanzhiPayPage($page,$pageSize,$condition = [],$is_count = false, $order = '')
    {
        $this->alias('yanzhiPay')
            ->field('yanzhiPay.*,user.user_name');
        $join = [
            ['user user', 'user.user_id=yanzhiPay.user_id', 'LEFT'],
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


}
