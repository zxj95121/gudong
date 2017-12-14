<?php
/**
 * Created by PhpStorm.
 * User: tseXD
 * Date: 2017/9/28
 * Time: 15:11
 */

namespace app\admin\controller;
use app\common\model\ThumbModel;
use app\common\model\UserModel;
use app\common\service\helperService;
use think\Validate;


class Thumb extends Base {

    /**
     * 点赞信息
     * @return mixed
     */
    public function index(){
        $params = $this->request->param();
        $rule = [
            'user_no|姓名'=>'max:100',
            'status|状态'=>'between:1,2',
            'page'=>'number',
        ];
        $validate = new Validate($rule);
        if(!$validate->check($params)){
            $this->error($validate->getError(),null,'',3);
        }

        $where = [
            // 'thumb.user_no'=>isset($params['user_no'])?$params['user_no']:0,
            'thumb.status'=>isset($params['status'])?$params['status']:0,
        ];

        $where = array_filter($where);

        $page = isset($params['page'])?intval($params['page']):1;
        $pageSize = 10;

        $thumbModel = new ThumbModel();
        $res = $thumbModel->getThumbPage($page,$pageSize,$where,false);
        $totalCount = $thumbModel->getThumbPage(0,0,$where,true);
        $pageString = helperService::createPage($totalCount,
            $page ,'Thumb/index',$params,$pageSize
        );

        $this->assign('page',$pageString);
        $this->assign('list',$res);


        $arr_title = ['序号','点赞人','活动名称','说说标题','添加时间','状态'];
        $this->assign('my_rule',$arr_title);

        $this->assign('page_no',($page-1)*$pageSize);

        $userModel = new UserModel();
        $userList  = $userModel->getMulti(['status'=>1]);
        $this->assign('userList',$userList);

        $this->assign('user_no',isset($params['user_no'])?$params['user_no']:'');
        $this->assign('status',isset($params['status'])?$params['status']:0);
        return $this->fetch($this->_layout.'/'.$this->controller_name.'/'.$this->action_name);

    }

    /**
     *修改状态
     */
    public function update_status(){
        $params = $this->request->param();
        $thumbModel = new ThumbModel();
        $info = $this->getInfo($params);
        if($info['status']==1){
            $status = 2;
        }else{
            $status = 1;
        }
        $res = $thumbModel->saveData(['status'=>$status],['thumb_id'=>$params['thumb_id']]);
        if($res!==false){
            $this->redirect('admin/Thumb/index');
        }else{
            die("<script>alert('操作有误，请稍后重试。');window.location.href='".url('admin/Thumb/index')."'</script>");
        }
    }

    /**
     * 获取信息
     * @param $params
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function getInfo($params){
        $thumbModel = new ThumbModel();
        if(!empty($params['thumb_id'])){
            $res = $thumbModel->getOne(['thumb_id'=>$params['thumb_id']]);
            $this->assign('info',$res);
            return $res;
        }
    }
}