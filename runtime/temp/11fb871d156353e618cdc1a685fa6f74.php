<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"D:\new_exe\xampp\htdocs\gudong\public/../application/index\view\Default\index\info.html";i:1512007304;}*/ ?>
﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
     
    <script src="/static/index/js/common.js"></script>
     <script src="/static/index/js/picker.min.js"></script>
    <link href="/static/index/css/style.css" type="text/css" rel="stylesheet">
    <title></title>
    <style>
       .backg{
        position: absolute;
       top:0;
        width: 100%;
        height: 40.63rem;
        opacity: 0.4;
       }
    </style>
   
    <link rel="stylesheet" href="/static/index/js/mui/dist/css/mui.min.css" />
    <link rel="stylesheet" href="/static/index/css/info.css" />
    <link href="/static/index/js/mui/plugin/picker/css/mui.picker.css" rel="stylesheet" />
    <link href="/static/index/js/mui/plugin/picker/css/mui.poppicker.css" rel="stylesheet" />
</head>
<body style="background: #f7f7f7;">
    <!--<img src="images/index.jpg" style="" class="backg">-->
    <body style="background: #f7f7f7;">
        <div class="container" style="padding: 0.5rem;">
            <div class="container-con">
                <form action="<?php echo url('/index/index/save_info'); ?>" enctype="multipart/form-data" method="post">
                    <input type="text" name="user_id" class="user_no" value="<?php echo $uid; ?>" hidden="">
                <div class="cItem">
                    <span>新in像</span>
                    <div class="item-right">
                        <img src="<?php echo (isset($info['header_img']) && ($info['header_img'] !== '')?$info['header_img']:'/static/index/images/default_headimg.jpg'); ?>" id="touxiang" class="headImg">
                        <input name="headerImg" class="headerImg" value="" hidden="">
                        <input type="file" name="photo" id="upimg" hidden="true">
                    </div>
                </div>
                <div class="clear"></div>
                <div class="cItem">
                    <span>新昵称</span>
                    <div class="item-right">
                        <input type="text" name="user_name" class="user_name" value="<?php echo $info['user_name']; ?>">
                    </div>
                </div>
                <div class="cItem">
                    <span>我的性别</span>
                    <div class="item-right">
                        <input type="text" name="gender" class="genderH" id="genderH" value="<?php echo $info['gender']; ?>" hidden="">
                        <span name="gender" style="margin-right: 0.5rem;" class="gender" gender=<?php if($info['gender']=='1'): ?>男<?php elseif($info['gender'] == 2): ?>女<?php else: endif; ?>><?php if($info['gender']=='1'): ?>男<?php elseif($info['gender'] == 2): ?>女<?php else: endif; ?></span>

                    </div>
                </div>
                 <div class="cItem" >
                    <span>我的城市</span>
                    <div class="item-right">
                        <input type="text" id="addressInput" name="address" class="birthdayH" value="" hidden="">
                        <span type="text" id='showCityPicker' style="width: auto;min-width: 10rem;    max-width: 19rem;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;" class="birthday"><?php echo $info['city']; ?></span>

                        <input type="hidden" name="address-city" id="address-city" value="<?php echo $info['city_id']; ?>">
                    </div>
                </div> 
                <div class="cItem">
                    <span>我的生日</span>
                    <div class="item-right">
                        <input name="birthday" id="birthdayInput" class="birthdayH" hidden="" value="<?php echo $info['birthday']; ?>">
                        <span type="text" id='showDatePicker' class="birthday"><?php if(!empty($info['birthday'])): ?><?php echo date("Y-m-d",$info['birthday']); endif; ?></span>
                    </div>
                </div>
                <div id='cityResult3' class="ui-alert"></div>
                <div class="cItem">
                    <span>我的学号</span>
                    <div class="item-right">
                        <input type="number" readonly name="user_no"  value="<?php echo $info['user_no']; ?>">
                    </div>
                </div>
                    <div class="clear"></div>
                    <button type="submit"  name="submit" class="save">保存</button>
            </form></div>
            


</div>
</body>

<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
<script>
        $(".gender").click(function(){
                if($(this).attr("gender")==1){
                    $(this).attr("gender","2");
                    $(this).html("女");
                    $(this).siblings("#genderH").val("2");
                }
                else{
                    $(this).attr("gender","1");
                    $(this).html("男");
                    $(this).siblings("#genderH").val("1");
                }
            })
        $(function(){
            if(0==1){
                layer.msg("保存成功！");
            }
/*          $(".save").click(function(){
                $.ajax({
                    url: '/index/User/updateUserInfo',
                    type: 'GET',
                    data:$("form").serialize(),
                    async:false,
                    dataType:'json',
                    success: function (val) {
                        layer.msg("保存成功",{
                            time:2000
                        })
                    }
            })
            })*/
                        //图片上传
            $(".headImg").bind("click",function(){
                $("#upimg").click();
            });
            $("#upimg").change(function(){
                checkUpImg();
            });

            //文件检测
            function checkUpImg() {
                //获取文件
                var file="";
                var src="";
                var srcc="";

                var file = document.getElementById('upimg');
                var val = $('#touxiang').attr('src');
                var size = file .files[0].size;
                if(size>1024*1024*4){
                    $('#touxiang').attr('src',val);
                    alert('请上传4M以内的图片');
                    return false;
                }

                var fileList = document.getElementById('upimg').files;
                loadImage(fileList[0],"touxiang");
                return true;
            }

            // 显示文件
            function loadImage(file, id) {
                var image = document.getElementById(id);
                image.onload = function() {
                    // var canvas = document.getElementById("myCanvas");
                    // var ctx = canvas.getContext("2d");
                    // ctx.clearRect(0, 0, canvas.width, canvas.height);
                    // canvas.width = image.width;
                    // canvas.height = image.height;
                    // ctx.drawImage(image, 0, 0, image.width, image.height);
                };
                // 在装载图像的过程中发生错误时调用的事件句柄。
                image.onerror = function() {
                };
                // 当用户放弃图像的装载时调用的事件句柄。
                image.onabort = function() {
                };
                //
                var reader = new FileReader();
                reader.onload = function(evt) { image.src = evt.target.result; }
                reader.readAsDataURL(file);
            };
            $('.intro').keypress(function () {
                var val=$(this).val();
                if(val.length>=15){
                    layer.msg('最多可编辑15个字符');
                    return false;
                }
            })
        })

    </script>
    <script src="/static/index/js/common.js"></script>
    <script src="/static/index/js/mui/dist/js/mui.min.js"></script>
    <script src="/static/index/js/mui/plugin/picker/js/mui.picker.js"></script>
    <script src="/static/index/js/mui/plugin/picker/js/mui.poppicker.js"></script>
    <!-- <script type="text/javascript" src="/static/index/bootstrap/js/area_picker.js"></script> -->
    <script type="text/javascript" src="/static/index/bootstrap/js/city_picker_str.js"></script>
    <script type="text/javascript" src="/static/index/bootstrap/js/mui-picker-center.js"></script>
</html>

