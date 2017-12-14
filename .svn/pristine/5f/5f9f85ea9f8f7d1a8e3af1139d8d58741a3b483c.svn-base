<?php
namespace app\admin\controller;
use think\Controller;
use think\Session;

class Main extends Base
{
    public function _initialize()
    {
        parent::_initialize();
    }

    public function login(){
        return $this->fetch($this->_layout."/index/login");
    }
    public function index()
    {
//        echo Session::get('staff_id');exit;
        return $this->fetch($this->_layout."/main/index");

    }

}
