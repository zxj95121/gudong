<?php
namespace app\common\model;

use app\common\model\CityModel;
use app\common\model\AreaModel;

class ProvinceModel extends BaseModel
{
    protected $table = 'province';


    //前台ajax请求省市区信息
    public static function getObj()
    {
        $cityObj = ProvinceModel::all();
            // ->toArray();
            // ->join('city c', 'c.pid = p.id', 'right')
            // ->join('area a', 'a.cid = c.id', 'right')
            // ->field('a.name as aname, c.name as cname, p.name as pname')
            // ->group('p.id')
            // ->select();
        return $cityObj;
    }
}
