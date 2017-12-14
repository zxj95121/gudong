<?php
namespace app\admin\controller;
use app\common\model\ArrangeModel;
use app\common\model\GoodsOrderModel;
use app\common\model\MenuModel;
use app\common\model\PointsOrderModel;
use app\common\service\ServiceSmsApi;
use think\Config;
use think\Controller;
use think\Session;



class Base extends Controller
{
    protected $_layout = null;
    protected $controller_name;
    protected $action_name;
    public $staff_id=0;
    public $backUrl;

    public function _initialize()
    {
        header('content-type:text/html;charset=utf-8');
        $this->backUrl = isset($this->request->header()['referer']) ? $this->request->header()['referer'] : $this->request->url();
        $this->assign('backUrl', $this->backUrl);;//返回
        //获取类和方法

        $this->getControllerAndAction();

        $staff_id = Session::get('staff_id');
        $this->staff_id=Session::get('staff_id');
        if (empty($staff_id)) {
            $this->redirect('admin/index/login');
        }
        //基础信息
        $this->baseSetting();
        //左侧菜单
        $this->getSideMenu();
        parent::_initialize();

//        //获取未读订单数量
//        $this->getUnreadNum();
//        parent::_initialize();

        $this->assign('base_path','/static/index');
        parent::_initialize();
    }


    /**
     * 基础信息设置
     */
    private function baseSetting()
    {
        $this->_layout = Config::get('default_layout');
        $controller_name = $this->request->controller();
        $action_name = $this->request->action();
//        echo Config::get('language');exit;
        $this->assign('language', Config::get('language'));
        $this->assign('website_title', '古董后台管理系统');
        $this->assign('copy_right', '3.0');
        $this->assign('controller_name', strtolower($controller_name));
        $this->assign('action_name', strtolower($action_name));
    }

    /**
     * 获取左侧菜单
     */
    private function getSideMenu()
    {
        $menuModel = new MenuModel();
        $menuList = $menuModel->getSideMenu();
        $this->assign('_SideMenu', $menuList);
    }

    /**
     * 获取类和方法
     */
    private function getControllerAndAction()
    {
        $this->_layout = 'Default';
        $this->controller_name = $this->request->controller();
        $this->action_name = $this->request->action();
        $this->assign('controller_name', $this->controller_name);
        $this->assign('action_name', $this->action_name);
    }
    /**
     * 筛选方法
     * @param $arr
     * @param $post
     * @return array
     */
//    public function select_param($arr,$post){
//        if(!empty($arr)){
//            $where=[];
//            foreach ($arr as $key=>$value){
//                $a=explode('.',$value);
//                if (isset($post[$a[1]]) && $post[$a[1]]!=="") {
//                    if($key=='like'){
//                        $where[$value] = array('like', '%'.$post[$a[1]].'%');
//                    }else{
//                        $where[$value] = $post[$a[1]];
//                    }
//                    $this->assign($a[1],$post[$a[1]]);
//                }
//            }
//            return $where;
//        }
//    }


    /**
     * 筛选方法
     * @param $arr
     * @param $post
     * @return array
     */
    public function select_param($arr,$post){
        if(!empty($arr)){
            $where=[];
            foreach ($arr as $key=>$value){
                if(is_array($value)){
                    $v=array_values($value);
                    $k=array_keys($value);
                    $a=explode('.',$v[0]);
                }else{
                    $a=explode('.',$value);
                }
                if (isset($post[$a[1]]) && $post[$a[1]]!=="") {
                    if($key=='like'){
                        $where[$value] = array('like', '%'.$post[$a[1]].'%');
                    }elseif($key=='array'){
                        $where[$v[0]]=[$k[0],$post[$a[1]]];
                    }else{
                        $where[$value] = $post[$a[1]];
                    }
                    $this->assign($a[1],$post[$a[1]]);
                }
            }
            return $where;
        }
    }

    /**
     * 上传文件配置方法
     * @param string $type
     * @param $fileName
     * @param $fileFormat
     * @param $size
     */
    public function showFileUpload($type='',$fileName,$fileFormat,$size=[]){
        $this->assign('file_dir',$fileName); //文件上传的文件夹
        $this->assign('size',$size);
        if($type=='files'){
            $this->assign('images_upload',$fileFormat);
        }else{
            $this->assign('image_upload',$fileFormat);
        }
    }

//    /**
//     * 获取未处理订单数量
//     * @return array|false|\PDOStatement|string|\think\Model
//     */
//    public function getUnreadNum(){
//        $arrangeModel = new ArrangeModel();
//        $count1 =  $arrangeModel->getCount(['status'=>'1']);
//
//        $pointsOrderModel = new PointsOrderModel();
//        $count2 = $pointsOrderModel->getCount(['status'=>'1']);
//
//        $count = $count1+$count2;
//
//        $this->assign('count',$count);
//        $this->assign('count1',$count1);
//        $this->assign('count2',$count2);
//
//    }
}