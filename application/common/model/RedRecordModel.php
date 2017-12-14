<?php
namespace app\common\model;
/**
 * 活动配置表
 * Class ActivityModel
 * @package app\common\model
 */

class RedRecordModel extends BaseModel
{
    protected $table = 'red_record';

    public static function newRecord($uid, $aid, $num)
    {
    	$flight = new RedRecordModel();
    	$flight->uid = $uid;
    	$flight->aid = $aid;
    	$flight->num = $num;
    	$flight->add_ts = time();
    	$flight->save();

    	return $flight->id;
    }
}