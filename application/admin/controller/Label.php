<?php
/**
 * Created by PhpStorm.
 * User: tseXD
 * Date: 2017/9/28
 * Time: 15:11
 */

namespace app\admin\controller;
use app\common\model\LabelModel;
use app\common\model\UserModel;
use app\common\service\helperService;
use think\Validate;


class Label extends Base {

    /**
     * 标签信息
     * @return mixed
     */
    public function index(){
        $params = $this->request->param();
        $rule = [
//            'user_no|姓名'=>'max:100',
//            'status|状态'=>'between:1,2',
            'page'=>'number',
        ];
        $validate = new Validate($rule);
        if(!$validate->check($params)){
            $this->error($validate->getError(),null,'',3);
        }

        $where = [
            // 'thumb.user_no'=>isset($params['user_no'])?$params['user_no']:0,
//            'thumb.status'=>isset($params['status'])?$params['status']:0,
        ];

        $where = array_filter($where);

        $page = isset($params['page'])?intval($params['page']):1;
        $pageSize = 10;

        $labelModel = new LabelModel();
        $res = $labelModel->getPage($page,$pageSize,$where,false);
        $totalCount = $labelModel->getPage(0,0,$where,true);
        $pageString = helperService::createPage($totalCount,
            $page ,'Label/index',$params,$pageSize
        );

        $this->assign('page',$pageString);
        $this->assign('list',$res);

        $arr_title = ['序号','标签','添加时间','状态'];
        $this->assign('my_rule',$arr_title);

        $this->assign('page_no',($page-1)*$pageSize);

        $userModel = new UserModel();
        $userList  = $userModel->getMulti(['status'=>1]);
        $this->assign('userList',$userList);

//        $this->assign('user_no',isset($params['user_no'])?$params['user_no']:'');
//        $this->assign('status',isset($params['status'])?$params['status']:0);
        return $this->fetch($this->_layout.'/'.$this->controller_name.'/'.$this->action_name);

    }


    /**
     *修改状态
     */
    public function update_status(){
        $params = $this->request->param();
        $labelModel = new LabelModel();
        $info = $this->getInfo($params);
        if($info['status']==1){
            $status = 2;
        }else{
            $status = 1;
        }
        $res = $labelModel->saveData(['status'=>$status],['label_id'=>$params['label_id']]);
        if($res!==false){
            $this->redirect('admin/Label/index');
        }else{
            die("<script>alert('操作有误，请稍后重试。');window.location.href='".url('admin/Label/index')."'</script>");
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
            'label_id'=>'number',
            'label|标签'=>'require|max:100',
            'status|状态'=>'require|between:1,2'
        ];
        $validate = new Validate($rule);
        if(!$validate->check($params)){
            $this->error($validate->getError(),null,'',3);
        }

        $labelModel = new LabelModel();
        $data = [
            'label_id' => $params['label_id'],
            'label' => $params['label'],
            'status' => $params['status']
            ];
        if (!empty($params['label_id'])) {
            $res = $labelModel->saveData($data, ['label_id' => $params['label_id']]);
        } else {
            $data['add_ts']=time();
            $res = $labelModel->saveData($data);
        }
        if ($res!==false) {
            $this->redirect($params['backUrl']);
        } else {
            die("<script>alert('操作有误，请稍后重试。');window.location.href='" . url('admin/Label/index') . "'</script>");
        }
    }


    /**
     * 获取信息
     * @param $params
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function getInfo($params){
        $labelModel = new LabelModel();
        if(!empty($params['label_id'])){
            $res = $labelModel->getOne(['label_id'=>$params['label_id']]);
            $this->assign('info',$res);
            return $res;
        }
    }
}