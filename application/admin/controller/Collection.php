<?php
/**
 * Created by PhpStorm.
 * User: tseXD
 * Date: 2017/9/28
 * Time: 15:11
 */

namespace app\admin\controller;
use app\common\model\CollectionModel;
use app\common\model\UserModel;
use app\common\model\MomentModel;
use app\common\service\helperService;
use think\Validate;


class Collection extends Base {

    /**
     * 收藏记录信息
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
            'collection.status'=>isset($params['status'])?$params['status']:0,
        ];

        $where = array_filter($where);

        $page = isset($params['page'])?intval($params['page']):1;
        $pageSize = 10;

        $collectionModel = new CollectionModel();
        $res = $collectionModel->getCollectionPage($page,$pageSize,$where,false);
        $totalCount = $collectionModel->getCollectionPage(0,0,$where,true);
        $pageString = helperService::createPage($totalCount,
            $page ,'Collection/index',$params,$pageSize
        );
        $this->assign('page',$pageString);
        $this->assign('list',$res);


        $userModel = new UserModel();
        foreach($res as $k=>&$item){
            $mobj = MomentModel::get($item['moment_id']);
            $user_obj = UserModel::get($mobj['user_id']);
            // $info = $userModel->getMulti(['user_id'=>$item['user_id']]);
            // $info = helperService::modelDataToArr($info);
//            var_dump($info);exit;
            // $item['collected_user_name'] = implode(',',array_column($info,'user_name'));
            $item['collected_user_name'] = $user_obj['user_name'];
        }

        $arr_title = ['序号','收藏人','被收藏人','添加时间','状态'];
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
        $collectionModel = new CollectionModel();
        $info = $this->getInfo($params);
        if($info['status']==1){
            $status = 2;
        }else{
            $status = 1;
        }
        $res = $collectionModel->saveData(['status'=>$status],['collection_id'=>$params['collection_id']]);
        if($res!==false){
            $this->redirect('admin/Collection/index');
        }else{
            die("<script>alert('操作有误，请稍后重试。');window.location.href='".url('admin/Collection/index')."'</script>");
        }
    }

    /**
     * 获取信息
     * @param $params
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function getInfo($params){
        $collectionModel = new CollectionModel();
        if(!empty($params['collection_id'])){
            $res = $collectionModel->getOne(['collection_id'=>$params['collection_id']]);
            $this->assign('info',$res);
            return $res;
        }
    }
}