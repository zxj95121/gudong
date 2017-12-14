<?php
namespace app\admin\controller;
use app\common\model\ArrangeModel;
use app\common\model\StudentModel;
use app\common\model\UserModel;
use think\Config;
use think\Controller;
use app\common\model\StaffModel;
use think\Session;
use think\Cookie;
use think\Validate;


class Index extends Controller
{
    protected $_layout = null;
    public function _initialize(){
        $this->_layout = Config::get('default_layout');
        parent::_initialize();
    }

    public function index(){
        $this->assign('website_title','保健后台管理系统');
        return $this->fetch($this->_layout.'/index/index');
    }

    /**
     * 登录
     */
    public function login()
    {
        $staffId = Session::get('staff_id');
        if(empty($staffId)){
            return $this->fetch($this->_layout.'/index/login');
        }else{
            $this->redirect('admin/main/index');
        }
    }

    /**
     * 登录页
     */
    public function loginIn(){
        $params = $this->request->param();
        $rule = [
            ['username|用户名','require|max:50','用户名必须输入|名称不可超过100位'],
            ['password|密码','require|max:32','密码必须输入|密码不可超过32位'],
//            ['check_code|验证码','require|max:8','验证码必须输入|验证码不可超过8位'],

        ];

        $validate = new Validate($rule);
        if(!$validate->check($params)){
            $this->error($validate->getError(),null,'',3);
        }


        $staffModel = new StaffModel();
        $password = strlen($params['password'])>18?trim($params['password']):md5($params['password']);

        $staff = $staffModel->getOne(['staff_name'=>$params['username'],'password'=>$password]);
//        echo 123;exit;
        if(empty($staff)){
            $this->error('用户名或密码错误',null,'',3);
        }

        Session::set('staff_id',$staff['staff_id']);
        $this->redirect('admin/user/index');
    }

    public function loginOut(){
        Cookie::clear();
        Session::clear();
        $this->redirect('admin/index/login');
    }


}
