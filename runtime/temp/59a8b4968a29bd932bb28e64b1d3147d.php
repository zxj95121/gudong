<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/index\view\Default\teacher\info.html";i:1504533868;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="stylesheet" href="<?php echo $base_tPath; ?>/Font-Awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $base_tPath; ?>/css/common.css">
    <title>教师信息</title>
    <style>
        html,body{
            padding: 0;
            margin: 0;
            font-family: "微软雅黑";
            background: #f6f6f6;
            color: #6f6f6f;
            font-size: 0.9rem;
        }
        p{padding: 0;margin: 0;}
        .huiyuan-top{
            background: white;
            margin:1rem 0 1rem 0;
            width:100%;
        }
        .touxiang{
            width:90%;
            margin-left: 5%;
            border-bottom: 1px solid #ccc;
            height:3.2rem;
            line-height: 3.2rem;
        }
        .touxiang .tou{
            float: right;
            border: 1px solid #ccc;
            border-radius: 1.1rem;
            height:2.2rem;
            width: 2.2rem;
            margin-top:0.5rem;
        }
        .bianhao{
            width:90%;
            margin-left: 5%;
            height:2.8rem;
            line-height: 2.8rem;
        }
        .member{
            float: right;
            color:#ccc
        }
        .memberCon{
            background: white;
            width:100%;
        }
        .item{
            width:90%;
            margin-left: 5%;
            border-bottom: 1px solid #ccc;
            height:2.8rem;
            line-height:2.8rem;
        }
        .item-right{
            float: right;
        }
        .member-mobile{
            color: #ccc;
        }
        .save{
            width:88%;
            height: 2.8rem;
            margin:2rem 6% 0 6%;
            background: #1df377;
            border: none;
            font-size:1.4rem ;
            color: white;
            text-align: center;
            border-radius: 0.5rem;
        }
        .member-birth{
            width:5rem;
            border: none;
        }
        .dwbg{
            width: 100%;
            left: 0;
            height: 19rem;
            top: 22.63rem;
        }
        .dwwr{
            width: 100% !important;
        }
        .dwv{
            visibility: none !important;
        }
        .dwsc{
            width: 100% !important;
        }
        .dwsc table{
            width: 100% !important;
        }
        input{
            border: none;
            outline: none;
            text-align: right;
        }
        img{
            border: none;
        }
    </style>
    <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
    <script src="<?php echo $base_tPath; ?>/js/picker.min.js"></script>
</head>
<body>
<div class="top-img">
    <div class="back"><i class="fa  icon-angle-left icon-2x"></i></div>
    <div class="title"><p>教师信息</p></div>
    <div class="add"><a href="<?php echo url('index/Teacher/center'); ?>"><img src="<?php echo $base_tPath; ?>/img/home.png" width="100%"></a></div>
</div>
<form action="<?php echo url('/index/teacher/updateStaffInfo'); ?>" method="post"  enctype="multipart/form-data">
    <div class="huiyuan-top">
        <input name="staffId" value="<?php echo $staffInfo['staff_id']; ?>" hidden>
        <div class="touxiang" style="">
            教师头像
            <div class="tou" id="up-pic">

                <?php if(!empty($staffInfo['header_img'])): ?>
                <img src="<?php echo $staffInfo['header_img']; ?>" id="touxiang" class="boxshadow" style="width: 100%;height: 100%;border-radius: 50%;">
                <?php else: ?>
                <img src="/static/parents/img/center-bg.jpg" id="touxiang" class="boxshadow" style="width: 100%;height: 100%;border-radius: 50%;">
                <?php endif; ?>
                <input name="headerImg" value="<?php echo $staffInfo['header_img']; ?>" hidden>
            </div>
            <input type="file" name="photo" id="upimg" hidden="true">
        </div>
        <div class="bianhao">
            教师编号
            <div class="member">
                <?php echo $staffInfo['staff_no']; ?>
            </div>
        </div>
    </div>
    <div class="memberCon">
        <div class="item">
            基本信息
        </div>
        <div class="item">
            <span>姓名：</span><div class="item-right"><input class="name" name="staffName" type="text" value="<?php echo $staffInfo['staff_name']; ?>" /></div>
        </div>
        <div class="item">
            <span>性别：</span><div class="item-right">
            <img src="<?php if($staffInfo['gender']==1): ?><?php echo $base_tPath; ?>/img/sex-man.png<?php else: ?><?php echo $base_tPath; ?>/img/sex-women.png<?php endif; ?>" class="sexType" sexType="1" style="width: 1.3rem;padding-top: 0.75rem;">
            </div>
            <input type="text" value="<?php echo $staffInfo['gender']; ?>" class="gender" name="gender" hidden>
        </div>
        <div class="clear"></div>
        <div class="item">
            <span>出生日期：</span>
            <div class="item-right">
                <input type="text"id="select_demo" value="<?php echo date('Y-m-d',$staffInfo['staff_birthday']); ?>"  name="birthday" readonly class="birthday"/>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <input type="submit" value="保&nbsp;&nbsp;&nbsp;存" class="save boxshadow"  />
</form>
</body>
<script>
    $(function(){
        var rightDS = document.getElementById('select_demo');
        var day=[];
        var year=[];
        var month=[];
        for(var i=1;i<=60;i++){
            year[i-1]={"text":i+1950,"value":i+1950};
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
            /*
             [{"text":"00","value":"00"},{"text":"05","value":"05"},{"text":"10","value":"10"}],*/
        ];
        var rightDS_picker = new Picker({
            title: '请选择',
            data: _data
        });
        rightDS_picker.on('picker.select', function (selectedVal, selectedIndex) {
            //console.log(selectedIndex);
            $("#select_demo").val(_data[0][selectedIndex[0]].value +'-'+ _data[1][selectedIndex[1]].value +'-'+ _data[2][selectedIndex[2]].value);
        });
        rightDS_picker.on('picker.change', function (index, selectedIndex) {
            //console.log(index);
        });
        rightDS_picker.on('picker.valuechange', function (selectedVal, selectedIndex) {
            //console.log(selectedVal);
        });
        rightDS.addEventListener('click', function () {
            rightDS_picker.show();
        });
    })


    //确认时间按钮
    $(".sexType").click(function(){
        if($(this).attr("sexType")==1){
            $(this).attr("src","<?php echo $base_tPath; ?>/img/sex-women.png");
            $(this).attr("sexType","2");
            $(".gender").val("2");
        }
        else{
            $(this).attr("src","<?php echo $base_tPath; ?>/img/sex-man.png");
            $(this).attr("sexType","1");
            $(".gender").val("1");
        }
    });
    //图片上传
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
<script src="<?php echo $base_tPath; ?>/js/common.js"></script>
</html>

