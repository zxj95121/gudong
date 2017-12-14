<?php
namespace app\common\model;

class StaffModel extends BaseModel
{
    protected $table = 'staff';

    /**
     * 查询员工列表
     * @param array $condition 查询条件
     * @param bool $is_count
     * @param $page
     * @param $pageSize
     * @return array
     */
    public function getStaffPage($condition = [], $is_count = false, $page = 0, $pageSize = 0)
    {

        $staffList = $this->alias('staff')
            ->field("staff.*,role.role_name")

            ->join('role role', 'role.role_id = staff.role_id', 'LEFT');

        if ($condition) {
            $staffList = $staffList->where($condition);
        }

        if ($is_count == true) {
            return $staffList->count();
        }


        return $staffList->page($page, $pageSize)->select();
    }

    /*
  获取所有管理员
  */
    public function getStaff()
    {
        return $this->select();
    }

    /*
根据name 获取pass
*/

    public function getStaffPass($condition=[])
    {
        return $this->field('password')->where($condition)->select();
    }

    /*
  根据name 获取pass
*/
    public function getPass($name=''){
        return $this->field('password')->where('staff_name',$name)->select();
    }

/**
  根据staff_name获得staff_id
 */
    public function getStaffIdByStaffName($staffName = ''){
        return $this->field('staff_id')->where('staff_name',$staffName)->find();
    }

    /**
    根据staff_name获得staff_id
     */
    public function getStaffNameByStaffId($staffId = ''){
        return $this->field('staff_name')->where('staff_id',$staffId)->find();
    }

/*
     *
     * 根据staffID获得科目name
     * */
  public function getSubjectNameByStaffId($condition){
      return $this->alias('sf')
          ->join('subject sb','sf.subject_id = sb.subject_id')
          ->where($condition)
          ->find();
  }
}
