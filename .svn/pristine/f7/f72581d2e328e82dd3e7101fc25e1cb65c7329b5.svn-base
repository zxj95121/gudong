<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"G:\phpstudy\phpstudy\WWW\anmo\public/../application/index\view\Default\index\user-info.html";i:1505820759;}*/ ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>个人</title>
<link href="<?php echo $base_path; ?>/css/style.css" type="text/css" rel="stylesheet">
<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
    <script src="<?php echo $base_path; ?>/js/picker.min.js" type="text/javascript"></script>
<script src="<?php echo $base_path; ?>/js/common.js"></script>
</head>

<body style="background:#f2f2f2;">

<!--头部-->
<div class="top">
  <div class="top-left"><a href="user.html"><img src="<?php echo $base_path; ?>/images/icon-arrow-left.png"/></a></div>
  个人
</div>

<!-- 内容-->
<form action="<?php echo url('/index/index/saveUser'); ?>" method="post" enctype="multipart/form-data">

<div class="user-info-head clear-fix">
    <div class="touxiang" style="">
        宝贝头像
        <div class="tou" id="up-pic" style="float: right">

            <img src="<?php echo $userInfo['header_img']; ?>" id="touxiang" class="boxshadow" style="height: 49.44px;border-radius: 50%;">

            <input name="headerImg" value="<?php echo $userInfo['header_img']; ?>" hidden>
        </div>
        <input type="file" name="photo" id="upimg" hidden="true">
    </div>


   <!--<h1>头像</h1><img src="<?php echo $userInfo['header_img']; ?>" style="border-radius: 50%; height: 49.44px;"/>-->
</div>
<div class="user-info">
   <ul>
       <!--<input type="hidden" name="userId" value="<?php echo $userInfo['user_id']; ?>">-->
      <li class="clear-fix"><h1>昵称</h1><input type="text" name="userName" value="<?php echo $userInfo['user_name']; ?>"/></li>
      <li class="clear-fix" id="gender">
          <h1>性别</h1>
          <a href="#">
              <img src="<?php echo $base_path; ?>/images/icon-arrow-right.png"/>
          </a>
          <span id="gender_text"><?php if($userInfo['gender'] == 1): ?>男<?php else: ?>女<?php endif; ?></span>
          <input type="hidden" name="gender_value" value="<?php echo $userInfo['gender']; ?>">
      </li>
      <li class="clear-fix" id="birthday">
          <h1>生日</h1>
          <a href="#">
              <img src="<?php echo $base_path; ?>/images/icon-arrow-right.png"/>
          </a>
          <input type="text" value="<?php echo date('Y-m-d',$userInfo['birthday']); ?>" name="birthday">
          <!--<span class="birthday"><?php echo date("Y-m-d",$userInfo['birthday']); ?></span>-->
      </li>
      <li class="clear-fix">
          <h1>手机</h1>

          <input type="number" name="mobile" value="<?php echo $userInfo['mobile']; ?>">
      </li>
   </ul>
    <button class="sub">提交</button>
</div>   
</form>
</body>
</html>
<style>
    input[name="mobile"],input[name="userName"],input[name="birthday"]{
        color: #999;
    }
    input{
        outline: none;
    }
    .sub{
        width: 100%;
        height: 30px;
        background: #df3361;
        border: 1px solid #df3361;
        color: #fff;
    }
</style>
<script>
    
    $('.sub').click(function () {
          var user_name = $('input[name="userName"]').val();
          var birthday = $('.birthday').html();
          var mobile = $('input[name="mobile"]').val();

    })
    
//科目
var rightDS = document.getElementById('gender');

var gender=[];
$.each(<?php echo $gender; ?>,function(i,n){
    gender[i]={"text":n.text,"value":n.value};
})
console.log(gender);
var gen = [
    gender
];
var rightDS_picker = new Picker({
    title: '请选择性别',
    data: gen
});
rightDS_picker.on('picker.select', function (selectedVal, selectedIndex) {
$("#gender_text").html(gen[0][selectedIndex[0]].text);
$('input[name="gender_value"]').val(gen[0][selectedIndex[0]].value);
});
rightDS.addEventListener('click', function () {
rightDS_picker.show();
});

var rightDSS = document.getElementById('birthday');
var day=[];
var year=[];
var month=[];
for(var i=1;i<=35;i++){
    year[i-1]={"text":i+1980,"value":i+1980};
}
for(var i=1;i<=12;i++){
    if(i<10){
        month[i-1]={"text":"0"+i,"value":"0"+i};
    }
    else{
        month[i-1]={"text":i,"value":i};
    }
}
for(var i=1;i<=31;i++){
    if(i<10){
        day[i-1]={"text":"0"+i,"value":"0"+i};
    }
    else{
        day[i-1]={"text":i,"value":i};
    }
}
var _data = [
    year,month,day
];
var rightDSS_picker = new Picker({
    title: '请选择',
    data: _data
});
rightDSS_picker.on('picker.select', function (selectedVal, selectedIndex) {
    //console.log(selectedIndex);
    $('input[name="birthday"]').val(_data[0][selectedIndex[0]].value + '-' + _data[1][selectedIndex[1]].value + '-' + _data[2][selectedIndex[2]].value);
});
rightDSS_picker.on('picker.change', function (index, selectedIndex) {
    //console.log(index);
});
rightDSS_picker.on('picker.valuechange', function (selectedVal, selectedIndex) {
    //console.log(selectedVal);
});
rightDSS.addEventListener('click', function () {
    rightDSS_picker.show();
});

    $("#up-pic").bind("click",function(){
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
        var fileList = document.getElementById('upimg').files;
        loadImage(fileList[0],"touxiang");
        uploadImages();
    };
    // 显示文件
    function loadImage(file, id) {
        var image = document.getElementById(id);
        image.onload = function() {
            var canvas = document.getElementById("myCanvas");
            var ctx = canvas.getContext("2d");
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            canvas.width = image.width;
            canvas.height = image.height;
            ctx.drawImage(image, 0, 0, image.width, image.height);
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
    function uploadImages() {
        var data = new FormData();
        //为FormData对象添加数据
        //
        $.each($('#upimg')[0].files, function(i, file) {
            data.append('upload_file'+i, file);
        });
        $.ajax({
            url:'../WorkBenchController/uploadImage',
            type:'POST',
            data:data,
            cache: false,
            contentType: false,    //不可缺
            processData: false,    //不可缺
            success:function(data){
                var code=JSON.parse(data);
                if(code.resultCode==1){
                    var msg=JSON.parse(code.resultMsg);
                    $.each(msg,function (i,n) {
                        var html="<div class='pic-con-p'><img src='"+n.name+"' id='"+n.id+"'></div>" ;
                        $("#my_pic").prepend(html);
                    });
                    layer.msg('上传成功', {
                        offset:['180px','90px'],
                        area: ['300px', '50px'],
                        time: 2000
                    });
                }
                else{
                    layer.msg(code.resultMsg, {
                        offset:['180px','90px'],
                        area: ['300px', '50px'],
                        time: 2000
                    });
                }
            }
        });
    }

</script>