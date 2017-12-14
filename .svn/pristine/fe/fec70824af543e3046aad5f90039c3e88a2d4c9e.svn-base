<?php
namespace app\common\model;
/**
 * 举报表
 * Class ThumbModel
 * @package app\common\model
 */

class ReportModel extends BaseModel
{
    protected $table = 'report';

    public function getReportPage($page,$pageSize,$condition = [],$is_count = false, $order = '')
    {
        $this->alias('report')
            ->field('report.*,user.user_name,moment.title');
        $join = [
            ['user user', 'user.user_no=report.user_no', 'LEFT'],
            ['moment moment', 'moment.moment_id=report.moment_id', 'LEFT'],
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
