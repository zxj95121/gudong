<?php
/**
 * Created by PhpStorm.
 * User: tseXD
 * Date: 2017/9/28
 * Time: 15:11
 */

namespace app\admin\controller;
use app\common\model\ReportModel;
use app\common\model\UserModel;
use app\common\service\helperService;
use think\Validate;


class Report extends Base {

    /**
     * 举报信息
     * @return mixed
     */
    public function index(){
        $params = $this->request->param();
        $rule = [
            'user_no|姓名'=>'max:100',
            'page'=>'number',
        ];
        $validate = new Validate($rule);
        if(!$validate->check($params)){
            $this->error($validate->getError(),null,'',3);
        }
        $where = [
             'report.user_no'=>isset($params['user_no'])?$params['user_no']:0,
        ];
        $where = array_filter($where);

        $page = isset($params['page'])?intval($params['page']):1;
        $pageSize = 10;

        $reportModel = new ReportModel();
        $res = $reportModel->getReportPage($page,$pageSize,$where,false);
        $totalCount = $reportModel->getReportPage(0,0,$where,true);
        $pageString = helperService::createPage($totalCount,
            $page ,'Report/index',$params,$pageSize
        );

        $this->assign('page',$pageString);
        $this->assign('list',$res);

        $arr_title = ['序号','举报人','说说id','添加时间'];
        $this->assign('my_rule',$arr_title);

        $this->assign('page_no',($page-1)*$pageSize);

        $userModel = new UserModel();
        $userList  = $userModel->getMulti(['status'=>1]);
        $this->assign('userList',$userList);

        $this->assign('user_no',isset($params['user_no'])?$params['user_no']:'');
        return $this->fetch($this->_layout.'/'.$this->controller_name.'/'.$this->action_name);
    }
}