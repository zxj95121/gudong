<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function showStatus($status,$str){
    $arr = explode(':', $str);
    $key = explode(',', $arr[1]);
    $name = explode(',', $arr[0]);
    foreach($name as $k=>$v){
        $res[$key[$k]] = $v;
    }
    if($status!=='' && isset($res[$status])){
        echo $res[$status];
    }
}