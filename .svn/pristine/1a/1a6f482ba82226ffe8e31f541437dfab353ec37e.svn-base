<?php
namespace app\admin\controller;
// namespace app\admin\controller\Config;

use app\common\model\StaffModel;
use app\common\service\helperService;
use app\common\model\RoleModel;

use think\Controller;
use think\Image;
use think\Validate;

class Human extends Base
{
    public function _initialize(){
        parent::_initialize();
    }

    /**首页
     * @return mixed
     */
    public function index(){

        $start_time=strtotime(date('Y-m-d'))-21*86400;

        $studentModel = new ArrangeModel();
        $student = $studentModel->getT(['arrange_time'=>['between',[$start_time,time()]]]);
        $student = json_decode(json_encode($student),true);
        $student = array_column($student,'count','time');

        $start_time=strtotime(date('Y-m-d'))-86400*20;
        $ent_time=strtotime(date('Y-m-d'));
        $timeArr = [];
        for ($i=$start_time;$i<=$ent_time;$i+=86400){
            $time=date('Ymd',$i);
            $timeArr[] = $time;
            isset($student[$time])?'':$student[$time] = 0;
        }
        ksort($student);

        $sumArr = array_values($student);
        $this->assign('sum_json',json_encode($sumArr));
        $this->assign('time_json',json_encode($timeArr));
        return $this->fetch($this->_layout.'/index/index');
    }

    /**
     * 员工列表
     */
    public function staff(){
        // echo Config::get('jjz');
        $params = $this->request->param();
        $rule = [
            'store_id'  => 'number',
            'subject_id'=> 'number',
            'gender'    => 'number',
            'page'      => 'number',
        ];

        $page = isset($params['page'])?intval($params['page']):1;
        $pageSize = 10;

        $validate = new Validate($rule);
        if(!$validate->check($params)){
            $this->error($validate->getError(),3);
        }

        $where = [
            'staff.store_id'=>isset($params['store_id'])?$params['store_id']:0,
            'staff.subject_id'=>isset($params['subject_id'])?$params['subject_id']:0,
            'staff.gender'=>isset($params['gender'])?$params['gender']:0
        ];

        $where = array_filter($where);
        
        $staffModel = new StaffModel();
        $staffPage = $staffModel->getStaffPage($where,false,$page,$pageSize);//当前页数据
        $totalCount = $staffModel->getStaffPage($where,true);//总页数
        //共用的分页方法
        $pageString = helperService::createPage($totalCount,//页脚
            $page ,'human/staff',$params,$pageSize
        );
        $this->assign('page',$pageString);
        $this->assign('staffList',$staffPage);
        
        //表单数据
        $this->assign('store_id',isset($params['store_id'])?$params['store_id']:0);
        $this->assign('subject_id',isset($params['subject_id'])?$params['subject_id']:0);
        $this->assign('gender',isset($params['gender'])?$params['gender']:0);

        return $this->fetch($this->_layout."/human/staff");
    }

    /**
     * 保存员工信息
     */
    public function saveStaff(){

        $params = $this->request->param();
        $rule = [
            'staff_id' => 'number',
            'staff_name|员工姓名'  => 'require|max:28',
            'password|密码'=> 'require|max:32',
            'gender|性别' => 'require|number|between:0,3',
            'mobile|手机号码' => 'require|mobile',
            'header_img'=>'file',
            'status|状态' => 'require|between:0,3',
            'role_id|角色' => 'require|number'
        ];

//        print_r($params);exit;

        $validate = new Validate($rule);
        if(!$validate->check($params)){
            $this->error($validate->getError(),null,'',3);
        }

        $file_header_img = $this->request->file('header_img');
        $header_img = null;
        if($file_header_img){
            $upload = $file_header_img->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($upload){
                $header_img = DS."uploads".DS.$upload->getSaveName();
            }else{
                $this->error($upload->getError(),null,'',3);
            }
        }

        $staff_id = intval($params['staff_id']);
        $data = [
            'staff_name' => "{$params['staff_name']}",
            'password'   =>(strlen($params['password']) < 32)?md5($params['password']):'',
            'gender'     =>intval($params['gender']),
            'header_img' =>$header_img,
            'mobile'     =>$params['mobile'],
            'status'     =>intval($params['status']),
            'role_id'   =>intval($params['role_id']),
        ];
//         print_r($data);exit;
        $filter_data = array_filter($data);
        $where = array_filter(['staff_id'=>$staff_id]);
        $filter_data['last_ts'] = time();
        if(!$where){//为空
            $filter_data['add_ts'] = time();
            $filter_data['staff_no'] = helperService::createOrderNum();
        }
//        print_r($filter_data);exit;
        $staffModel = new StaffModel();

        $return = $staffModel->saveData($filter_data,$where);
        if($return === false){
            $this->error('保存数据失败!',null,'',3);
        }
        $this->redirect("human/staff");
    }

    /**
     * 编辑员工信息
     */
    public function editStaff(){
        $params = $this->request->param();
        $staff_id = isset($params['staff_id'])?intval($params['staff_id']):0;
        $staffModel = new StaffModel();
        if($staff_id){
            $staffInfo = $staffModel->getOne(['staff_id'=>$staff_id]);
        }else{
            $staffInfo = [
                'staff_id'=>'',
                'staff_name'=>'',
                'password'=>'',

                'gender'=>'',
                'header_img'=>'',
                'mobile'=>'',

                'status'=>'',
                'role_id'=>''
            ];
        }
        $this->assign('staffInfo',$staffInfo);

//        //获取角色列表
        $roleModel = new RoleModel();
        $roleList  = $roleModel->getRoleList(['status'=>1]);
        $this->assign('roleList',$roleList);

        return $this->fetch($this->_layout."/human/edit_staff");
    }

}
