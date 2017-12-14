<?php
namespace app\admin\controller;
use think\Controller;
use think\Image;

class Upload extends Controller
{
    protected function checkPath($path)
    {
        if (is_dir($path)) {
            return true;
        }
        if (mkdir($path, 0755, true)) {
            return true;
        } else {
            $this->error = "目录 {$path} 创建失败！";
            return false;
        }
    }

    public function uploadImage($name,$path_name='',$size=[]){
        if(request()->isHead()){
            return '';
        }
        $file = request()->file($name);
        if($file) {
            $info = $file->rule('uniqid')->move(ROOT_PATH . 'public' . DS . 'uploads');
            $save_name = DS."uploads".DS.$info->getSaveName();
//            $path=ROOT_PATH . 'public' . DS . $save_name;

//            $min_save_name =$save_name."_mini";
//            //图片压缩
//
//
//            $min_path = ROOT_PATH . 'public' . DS . 'static' . DS . 'cms_upload' . DS . $min_save_name;
//            $min_dir = ROOT_PATH . 'public' . DS . 'static' . DS . 'cms_upload' . DS . 'min_' . $path_name;
//            $this->checkPath($min_dir);
//            $image = \think\Image::open($path);
//            $image->thumb($size['x'], $size['y'])->save($min_path);
            return $save_name;
        }else{
            return false;
        }
    }

    public function uploadImg(){
        $file_dir = $_POST['file_dir'];
        $file = $this->request->file('upload_'.$_POST['column']);
        $get = request()->param();
        $filePath=ROOT_PATH . 'public' . DS . 'static/cms_upload/';
        $rootPath = $filePath.$get['file_dir'];
        $info = $file->rule('uniqid')->move($rootPath);
        if($info){
            $saveName = $info->getSaveName();
            if(!empty($get['x']) && !empty($get('y'))){
                $this->checkPath($filePath.'mini_'.$get['file_dir']);
                $image = Image::open($rootPath.DS.$saveName);
                $image->thumb($get['x'],$get['y'],1)->save($filePath.'mini_'.$get['file_dir'].DS.$saveName);
            }
            echo  $file_dir.'/'.$saveName;
        }else{
            return 0;
        }
    }
}
