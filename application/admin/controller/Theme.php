<?php
/**
 * Created by PhpStorm.
 * User: tseXD
 * Date: 2017/9/28
 * Time: 15:11
 */

namespace app\admin\controller;
use app\common\model\ThemeModel;
use app\common\model\UserModel;
use app\common\service\helperService;
use think\Validate;


class Theme extends Base {

    /**
     * 主题信息
     * @return mixed
     */
    public function index(){
        $params = $this->request->param();
        $rule = [
            'page'=>'number',
        ];
        $validate = new Validate($rule);
        if(!$validate->check($params)){
            $this->error($validate->getError(),null,'',3);
        }

        $where = [
//            'thumb.status'=>isset($params['status'])?$params['status']:0,
        ];

        $where = array_filter($where);

        $page = isset($params['page'])?intval($params['page']):1;
        $pageSize = 10;

        $themeModel = new ThemeModel();
        $res = $themeModel->getPage($page,$pageSize,$where,false);
        $totalCount = $themeModel->getPage(0,0,$where,true);
        $pageString = helperService::createPage($totalCount,
            $page ,'Theme/index',$params,$pageSize
        );

        $this->assign('page',$pageString);
        $this->assign('list',$res);

        $arr_title = ['序号','主题','添加时间','状态'];
        $this->assign('my_rule',$arr_title);

        $this->assign('page_no',($page-1)*$pageSize);

        $userModel = new UserModel();
        $userList  = $userModel->getMulti(['status'=>1]);
        $this->assign('userList',$userList);

//        $this->assign('status',isset($params['status'])?$params['status']:0);
        return $this->fetch($this->_layout.'/'.$this->controller_name.'/'.$this->action_name);

    }

    /**
     *修改状态
     */
    public function update_status(){
        $params = $this->request->param();
        $themeModel = new ThemeModel();
        $info = $this->getInfo($params);
        if($info['status']==1){
            $status = 2;
        }else{
            $status = 1;
        }
        $res = $themeModel->saveData(['status'=>$status],['theme_id'=>$params['theme_id']]);
        if($res!==false){
            $this->redirect('admin/Theme/index');
        }else{
            die("<script>alert('操作有误，请稍后重试。');window.location.href='".url('admin/Theme/index')."'</script>");
        }
    }

    /**
     * 编辑信息
     */
    public function operation_info()
    {
        $params = $this->request->param();
        if(!empty($params)){
            $info = $this->getInfo($params);
            $this->assign('info',$info);
        }
        return $this->fetch($this->_layout . '/' . $this->controller_name . '/' . $this->action_name);
    }

    /**
     * 保存信息
     */
    public function save_info(){
        $params = $this->request->param();
        $rule = [
            'theme_id'=>'number',
            'theme|主题'=>'require|max:100',
            'status|状态'=>'require|between:1,2'
        ];
        $validate = new Validate($rule);
        if(!$validate->check($params)){
            $this->error($validate->getError(),null,'',3);
        }

        $themeModel = new ThemeModel();
        $data = [
            'theme_id' => $params['theme_id'],
            'theme' => $params['theme'],
            'status' => $params['status']
            ];
        if (!empty($params['theme_id'])) {
            $res = $themeModel->saveData($data, ['theme_id' => $params['theme_id']]);
        } else {
            $data['add_ts']=time();
            $res = $themeModel->saveData($data);
        }
        if ($res!==false) {
            $this->redirect($params['backUrl']);
        } else {
            die("<script>alert('操作有误，请稍后重试。');window.location.href='" . url('admin/Theme/index') . "'</script>");
        }
    }

    /**
     * 获取信息
     * @param $params
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function getInfo($params){
        $themeModel = new ThemeModel();
        if(!empty($params['theme_id'])){
            $res = $themeModel->getOne(['theme_id'=>$params['theme_id']]);
            $this->assign('info',$res);
            return $res;
        }
    }
}