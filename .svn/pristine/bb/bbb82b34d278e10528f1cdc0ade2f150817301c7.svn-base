<?php
/**
 * Created by PhpStorm.
 * User: tseXD
 * Date: 2017/9/28
 * Time: 15:11
 */

namespace app\admin\controller;
use app\common\model\CommentModel;
use app\common\model\UserModel;
use app\common\service\helperService;
use think\Validate;


class Comment extends Base {

    /**
     * 评论首页信息
     * @return mixed
     */
    public function index(){
        $params = $this->request->param();
        $rule = [
            'status|状态'=>'between:1,2',
            'page'=>'number',
        ];
        $validate = new Validate($rule);
        if(!$validate->check($params)){
            $this->error($validate->getError(),null,'',3);
        }

        $where = [
            // 'comment.user_no'=>isset($params['user_no'])?$params['user_no']:0,
            'comment.status'=>isset($params['status'])?$params['status']:0,
        ];

        $where = array_filter($where);

        $page = isset($params['page'])?intval($params['page']):1;
        $pageSize = 10;

        $commentModel = new CommentModel();
        $res = $commentModel->getCommentPage($page,$pageSize,$where,false);
        $totalCount = $commentModel->getCommentPage(0,0,$where,true);
        $pageString = helperService::createPage($totalCount,
            $page ,'Comment/index',$params,$pageSize
        );

        $this->assign('page',$pageString);
        $this->assign('list',$res);

        $userModel = new UserModel();
        foreach($res as $k=>&$item){
            // $info = $userModel->getMulti(['usered_id'=>$item['usered_id']]);
            // $info = helperService::modelDataToArr($info);
            // $item['commented_user_name'] = implode(',',array_column($info,'user_name'));
            $info = UserModel::get($item['usered_id']);
            $item['commented_user_name'] = $info->user_name;
        }
//        var_dump($res);exit;

        $arr_title = ['序号','评论人','被评论人','内容','添加时间','状态'];
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
        $commentModel = new CommentModel();
        $info = $this->getInfo($params);
        if($info['status']==1){
            $status = 2;
        }else{
            $status = 1;
        }
        $res = $commentModel->saveData(['status'=>$status],['comment_id'=>$params['comment_id']]);
        if($res!==false){
            $this->redirect('admin/Comment/index');
        }else{
            die("<script>alert('操作有误，请稍后重试。');window.location.href='".url('admin/Comment/index')."'</script>");
        }
    }

    /**
     * 获取信息
     * @param $params
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function getInfo($params){
        $storeModel = new CommentModel();
        if(!empty($params['comment_id'])){
            $res = $storeModel->getOne(['comment_id'=>$params['comment_id']]);
            $this->assign('info',$res);
            return $res;
        }
    }
}