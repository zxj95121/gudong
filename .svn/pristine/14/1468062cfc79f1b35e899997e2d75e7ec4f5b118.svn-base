<?php
namespace app\common\model;

class RoleModel extends BaseModel
{
    protected $table = 'role';

    /**
     * 获取角色列表
     * @param array $condition
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getRoleList($condition=[]){
        //缓存1分钟
        if($condition){
            return $this->where($condition)->cache(60)->select();
        }
        return $this->cache(60)->select();
    }

    /*
  * 根据角色名查找角色ID
     * return 角色ID
     *
  */
    public function getRoleId($role_name='财务人员'){
        $sub = $this->field('role_id')->where('role_name',$role_name)->find();
        return $sub['role_id'];
    }

    /*
     * 根据课程ID查找课程名
     * */
    public function getRoletName($role_id='1'){
        return $this->field('role_name')->where('role_id',$role_id)->select();
    }
}
