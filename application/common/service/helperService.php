<?php
/**
 * Created by PhpStorm.
 * User: vowkin
 * Date: 2017/5/20
 * Time: 11:27
 */
namespace app\common\service;

class helperService
{
    public static $errorInfo = null;

    /**
     * @param $url
     * @param string $param
     * @param bool $is_ssl 是否启用ssl请求
     * @return mixed
     */
    public static function http_post($url, $param='',$is_ssl=false) {
        $url = str_replace(' ', '', $url);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        if($is_ssl){
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER,['Content-Type: application/json; charset=utf-8','Content-Length:' . strlen($param)]);
        $tmpInfo = curl_exec($ch);
        if (curl_errno($ch)) {
             self::$errorInfo = [
                 'msg' =>'Curl Errno : ' . curl_error($ch),
                 'line'=>__LINE__,
                 'file'=>__FILE__
             ];
         }
        curl_close($ch);
        return $tmpInfo;
    }

    public static function http_post_Api($url, $param=''){
            //坑爹的微信文档，复制过来的地址居然带空格。MLGB
            $url = str_replace(' ', '', $url);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_HTTPHEADER,['Content-Type: application/json; charset=utf-8','Content-Length:' . strlen($param)]);
            $tmpInfo = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Curl Errno : ' . curl_error($ch); // 不输出这个错误，耽误事，
            }
            curl_close($ch);
            $tmpInfo = json_decode($tmpInfo,true);
            return $tmpInfo;
    }

    public static function voice_download($mediaId){
        $serviceWechat = new serviceWechat();
        $res = $serviceWechat->getToken();
        $res = json_decode($res,true);
        if(!isset($res['code']) || $res['code'] != 200){
            die('获取token数据失败，请重新尝试！');
        }

        $token = $res['data'];

        $path = './uploads/wxVoice';
        $filename = time().rand(1111,9999).".amr";

        $filePath =  "$path/$filename";

        self::downAndSaveFile("https://qyapi.weixin.qq.com/cgi-bin/media/get?access_token=$token&media_id=$mediaId","$filePath");

        return substr($filePath,1);
    }

    //根据URL地址，下载文件
    private static function downAndSaveFile($url,$savePath){
        ob_start();
        readfile($url);
        $img  = ob_get_contents();
        ob_end_clean();
        $fp = fopen("$savePath", 'a');
        fwrite($fp, $img);
        fclose($fp);
    }


    //组件分页样式
    public static function createPage($count,$page,$url,$params,$pageSize=10,$offset=5){
        $countPage = ceil($count/$pageSize);
        $pageString = "";
        //固化边界
        if($page<1){
            $page = 1;
        }
        if($offset < 1){
            $offset = 1;
        }
        if($page> $countPage){
            $page = $countPage;
        }
        //左右偏移页面
        $startPage = $page-$offset;
        $endPage   = $page+$offset;
        //判断最小值(因为$page和$offset都不小于1所以最大值不会小于1不做判断，仅判断最小值即可)
        if($startPage < 1){
            $startPage = 1;
        }
        //判断最大值(同理最小值没有超过$countPage的可能)
        if($endPage > $countPage){
            $endPage = $countPage;
        }

        for($i=$startPage;$i<=$endPage;$i++){
            if(intval($page) == $i){
                $pageString .= "<a class='active' href='".url($url,array_merge($params,['page'=>$i]))."'>{$i}</a>";
                continue;
            }
            $pageString .= "<a href='".url($url,array_merge($params,['page'=>$i]))."'>{$i}</a>";
        }

        $pageString .= "  共有{$count}条数据，共{$countPage}页";

        return $pageString;
    }


    /**
     * 统一输出源
     * @param $data
     */
    public static  function returnJson($data){
        die(json_encode($data));
    }

    /**
     * 生成订单号
     * @return string
     */
    public static function createOrderNum(){
        return date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
    }


    public static function uploadBase64Img($imgBase64){

        switch ($imgBase64){
            case strpos($imgBase64,'data:image/jpeg;base64,') ===0:
                return ['ext'=>'jpeg','imgBase64'=>str_replace('data:image/jpeg;base64,','',$imgBase64)];
            case strpos($imgBase64,'data:image/png;base64,') ===0:
                return ['ext'=>'png','imgBase64'=>str_replace('data:image/png;base64,','',$imgBase64)];
            case strpos($imgBase64,'data:image/gif;base64,') ===0:
                return ['ext'=>'gif','imgBase64'=>str_replace('data:image/gif;base64,','',$imgBase64)];
            default:
                return false;
        }
    }

    /**
     * 模型数据转数组
     * @param $data
     * @return mixed
     */
    public static function modelDataToArr($data){
        return json_decode(json_encode($data),true);
    }
}