<?php
/**
 * Created by PhpStorm.
 * User: tseXD
 * Date: 2017/9/28
 * Time: 15:11
 */

namespace app\admin\controller;
use app\common\model\UserModel;
use app\common\model\YanzhiPayModel;
use app\common\service\helperService;
use think\Validate;


class YanzhiPay extends Base {

    /**
     * 研值收支明细信息
     * @return mixed
     */
    public function index(){
        $params = $this->request->param();
        $rule = [
            'user_id|姓名'=>'max:100',
            'status|状态'=>'between:1,2',
            'type|类型'=>'between:1,2',
            'page'=>'number',
        ];
        $validate = new Validate($rule);
        if(!$validate->check($params)){
            $this->error($validate->getError(),null,'',3);
        }
        $where = [
            'yanzhiPay.user_id'=>isset($params['user_id'])?$params['user_id']:0,
            'yanzhiPay.status'=>isset($params['status'])?$params['status']:0,
            'yanzhiPay.type'=>isset($params['type'])?$params['type']:0,
        ];
        $where = array_filter($where);

        $page = isset($params['page'])?intval($params['page']):1;
        $pageSize = 10;

        $yanzhiPayModel = new YanzhiPayModel();
        $res = $yanzhiPayModel->getYanzhiPayPage($page,$pageSize,$where,false);
        $totalCount = $yanzhiPayModel->getYanzhiPayPage(0,0,$where,true);
        $pageString = helperService::createPage($totalCount,
            $page ,'YanzhiPay/index',$params,$pageSize
        );

        $this->assign('page',$pageString);
        $this->assign('list',$res);

        $arr_title = ['序号','用户姓名','添加研值的属性表id','变动类型','数量','变动备注信息','添加时间','状态'];
        $this->assign('my_rule',$arr_title);

        $this->assign('page_no',($page-1)*$pageSize);

        $userModel = new UserModel();
        $userList  = $userModel->getMulti(['status'=>1]);
        $this->assign('userList',$userList);

        $this->assign('user_id',isset($params['user_id'])?$params['user_id']:'');
        $this->assign('status',isset($params['status'])?$params['status']:0);
        $this->assign('type',isset($params['type'])?$params['type']:0);
        return $this->fetch($this->_layout.'/'.$this->controller_name.'/'.$this->action_name);
    }
}