<?php
/**
 * Created by PhpStorm.
 * User: tseXD
 * Date: 2017/9/28
 * Time: 15:11
 */

namespace app\admin\controller;
use app\common\model\ActivityModel;
use app\common\model\GiftOrderModel;
use app\common\service\helperService;
use think\Validate;
use think\Db;


class Activity extends Base {

    /**
     * 活动配置信息
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
            'status'=>isset($params['status'])?$params['status']:0,
        ];
        $where = array_filter($where);

        $page = isset($params['page'])?intval($params['page']):1;
        $pageSize = 10;

        $activityModel = new ActivityModel();
        $res = $activityModel->getPage($page,$pageSize,$where,false);
        $totalCount = $activityModel->getPage(0,0,$where,true);
        $pageString = helperService::createPage($totalCount,
            $page ,'Activity/index',$params,$pageSize
        );

        $this->assign('page',$pageString);
        $this->assign('list',$res);

        $arr_title = ['序号','活动名称','活动时间','内容','研值照片','添加时间','状态'];
        $this->assign('my_rule',$arr_title);

        $this->assign('page_no',($page-1)*$pageSize);

        $this->assign('status',isset($params['status'])?$params['status']:0);
        return $this->fetch($this->_layout.'/'.$this->controller_name.'/'.$this->action_name);

    }

    /**
     * 编辑信息
     */
    public function operation_info()
    {
        $params = $this->request->param();
        if(empty($params)){
            $info = [
                'start_time'=>0,
                'end_time'=>0,
                'status'=>1,
            ];
        }else{
            $info = $this->getInfo($params);
        }
        $this->showFileUpload('file','admin',['yanzhi_img'=>'研值照片:']);
        $this->assign('info',$info);
        return $this->fetch($this->_layout . '/' . $this->controller_name . '/' . $this->action_name);
    }

    /**
     * 保存信息
     */
    public function save_info(){
        $params = $this->request->param();
        $rule = [
            'activity_name|活动名称'=>'require|max:100',
            'status|状态'=>'require|between:1,2'
        ];
        $validate = new Validate($rule);
        if(!$validate->check($params)){
            $this->error($validate->getError(),null,'',3);
        }


        //处理多图
        $activityModel = new ActivityModel();
        $one=$activityModel->getOne(['activity_id'=>$params['activity_id']]);
        $imgContent=[];
        if(isset($params['headerImage'])){
            $imgContent = $params['headerImage'];
        }
        $img=$this->set_img($imgContent,$one['img']);

        $activityModel = new ActivityModel();
        $data = [
            'activity_name' => $params['activity_name'],
            'start_time' => strtotime($params['start_time']),
            'end_time' => strtotime($params['end_time']),
            'content'=>$params['content'],
            'status'=>$params['status'],
            'yanzhi_img'=>$params['yanzhi_img'],
            // 'type'=>1,
            'img' => $img,
        ];
        if (!empty($params['activity_id'])) {
            $res = $activityModel->saveData($data, ['activity_id' => $params['activity_id']]);
        } else {
            $data['add_ts']=time();
            $res = $activityModel->saveData($data);
        }
        if ($res!==false) {
            $this->redirect($params['backUrl']);
        } else {
            die("<script>alert('操作有误，请稍后重试。');window.location.href='" . url('admin/Activity/index') . "'</script>");
        }
    }

    /**
     * 多图拼接
     * @param $images 前台上传图片
     * @param $img_have  后台查询图片
     * @return string
     */
       private function set_img($images,$img_have){
        $img_data = [];

        if(!empty($img_have)){
            $image_arr = json_decode($img_have);
            foreach($image_arr as &$item){
                $img_data[]=$item;
            }
        }

        foreach($images as $imgBase64){
            $res = helperService::uploadBase64Img($imgBase64);
            if($res === false){
                continue;
            }
            $img = base64_decode($res['imgBase64']);
            $img_path = "./uploads/img/".time().rand(1000,9999).".{$res['ext']}";
            file_put_contents($img_path, $img);
            $img_data[] = $img_path;
        }

        return json_encode($img_data);

    }


    private function setIMG($images,$img_have){
        $img_data = [];

        if(!empty($img_have)){
            $image_arr = json_decode($img_have);
            foreach($image_arr as &$item){
                $img_data[] = $item;
            }
        }
        foreach($images as $imgBase64){
            $res = helperService::uploadBase64Img($imgBase64);
            if($res === false){
                continue;
            }
            $img = base64_decode($res['imgBase64']);
            $img_path = "./uploads/img/".time().rand(1000,9999).".{$res['ext']}";
            file_put_contents($img_path,$img);
            $img_data[] = $img_path;
        }
        return json_encode($img_data);
    }


    /**
     * 删除图片
     */
    public function removePic()
    {
        $params = $this->request->param();
        $activityModel = new ActivityModel();
        $image = $activityModel->getOne(['activity_id' => $params['activity_id']]);
        $aImgJson = [];
        if (!empty($image['img'])) {
            $image = json_decode($image['img']);
            foreach ($image as $item) {
                if ($item == '.' . $params['src']) {
                    continue;
                }
                $aImgJson[] = $item;
            }
        }
        $image = json_encode($aImgJson);
        $res = $activityModel->saveData(['img' => $image], ['activity_id' => $params['activity_id']]);

        if ($res !== false) {
            return 1;
        } else {
            return 0;
        }
    }

        /**
     *修改状态
     */
    public function update_status(){
        $params = $this->request->param();
        $activityModel = new ActivityModel();
        $info = $this->getInfo($params);
        if($info['status']==1){
            $status = 2;
        }else{
            $status = 1;
        }
        $res = $activityModel->saveData(['status'=>$status],['activity_id'=>$params['activity_id']]);
        if($res!==false){
            $this->redirect('admin/Activity/index');
        }else{
            die("<script>alert('操作有误，请稍后重试。');window.location.href='".url('admin/Activity/index')."'</script>");
        }
    }

    /**
     * 获取信息
     * @param $params
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function getInfo($params){
        $activityModel = new ActivityModel();
        if(!empty($params['activity_id'])){
            $res = $activityModel->getOne(['activity_id'=>$params['activity_id']]);
            $this->assign('info',$res);
            return $res;
        }
    }



    //研制送礼相关配置
    public function sendGift()
    {
        return $this->fetch($this->_layout . '/' . $this->controller_name . '/' . $this->action_name);
    }

    //研值送礼订单
    public function giftOrder()
    {
        $params = $this->request->param();
        $page = isset($params['page']) ? $params['page'] : 1;
        $pageSize = 10;

        $totalCount = Db::table('gift_order')
            ->order('status, add_ts desc')
            ->count();

        $orders = Db::table('gift_order')
            ->order('status, add_ts desc')
            ->paginate($pageSize);

        // $page = $orders->render();
        $pageString = helperService::createPage($totalCount,
            $page ,'Activity/giftOrder',$params,$pageSize
        );

        $this->assign('page', $pageString);
        $this->assign('orders', $orders);
        return $this->fetch($this->_layout . '/' . $this->controller_name . '/' . $this->action_name);
    }

    //研值送礼订单确认
    public function ajaxConfirmGiftOrder()
    {
        $request = $this->request->param();
        $oid = $request['oid'];

        $flight = GiftOrderModel::get($oid);
        $flight->status = 2;
        $flight->save();

        return json(['errcode' => 0]);
    }
}