<?php
namespace app\common\model;
use think\Model;
use think\Db;

class BaseModel extends Model
{

    public function BaseModel($data){
        return json_decode(json_encode($data));
    }
    /**
     * 共用的分页模块
     * @param int $page 页码
     * @param int $pageSize 每页多少数目
     * @param array $condition 条件
     * @param bool $is_count 是不是求count
     * @param string $order 排序条件字符串
     * @return false|int|\PDOStatement|string|\think\Collection
     */
    public function getPage($page,$pageSize,$condition=[],$is_count = false,$order=''){

        if($is_count){
            if(empty($condition)){
                return $this->page($page,$pageSize)->count();
            }
            return $this->where($condition)->page($page,$pageSize)->count();
        }else{
            if($order){
                if(empty($condition)){
                    return $this->page($page,$pageSize)->order($order)->column('*');
                }
                return $this->where($condition)->page($page,$pageSize)->order($order)->column('*');
            }
            if(empty($condition)){
                return $this->page($page,$pageSize)->column('*');
            }

            return $this->where($condition)->page($page,$pageSize)->column('*');
        }
    }

    /**
     * 保存数据
     * @param $data
     * @param array $condition
     * @return $this
     */
    public function saveData($data,$condition=[]){
        if($condition){
            return $this->where($condition)->update($data);
        }
        return $this->insertGetId($data);
    }

    /**
     * 保存数据
     * @param $data
     * @param array $condition
     * @return $this
     */
    public function saveDataAll($data,$condition=[]){
        if($condition){
            return $this->where($condition)->update($data);
        }
        return $this->insertAll($data);
    }

    /**
     * 获取一条数据信息
     * @param array $condition
     * @param bool  $is_cache
     * @return array|false|\PDOStatement|string|Model
     */
    public function getOne($condition=[],$is_cache=false){
        if($condition){
            return $this->where($condition)->cache($is_cache,60)->find();
//           echo $this->getLastSql();exit;
        }
        return $this->cache($is_cache)->find();

    }



    /**
    * 获取总条数据信息
    * @param array $condition
    * @return array|false|\PDOStatement|string|Model
    */
    public function getCount($condition=[]){
        if($condition){
            return $this->where($condition)->count();
        }
        return $this->count();
    }

    /**
     * 获取多条数据信息
     * @param array $condition
     * @param string $order
     * @return array
     */
    public function getMulti($condition=[],$order=''){
        if($condition){
            $this->where($condition);
        }

        if($order){
            $this->order($order);
        }

        return $this->column('*');
    }
    /**
     * 根据条件删除数据
     * @param array $condition
     * @return bool|int
     */
    public function removeData($condition=[]){
        //删除功能要严格控制
        if(empty($condition)){
            return false;
        }
        return $this->where($condition)->delete();
    }


}
