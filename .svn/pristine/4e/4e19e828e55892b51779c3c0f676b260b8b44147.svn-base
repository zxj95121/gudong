<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/index\view\Default\teacher\center.html";i:1504533868;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="stylesheet" href="<?php echo $base_tPath; ?>/Font-Awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $base_tPath; ?>/css/common.css">
    <!--<link rel="stylesheet" href="<?php echo $base_tPath; ?>/css/style.css">-->
    <title>个人中心</title>
    <style>

        html,body{
            padding: 0;
            margin: 0;
            font-family: "微软雅黑";
            background: #f6f6f6;
            color: #6f6f6f;
        }
        p,img{padding: 0;margin: 0;}
        .center-bg{
            width:100%;
            height:9rem;
            background-image: url(<?php echo $base_tPath; ?>/img/center-bg.jpg);
            background-size: 100% 100%;
        }
        .bgLeft{
            width: 5rem;
            height: 5rem;
            border: 1px solid #ccc;
            border-radius: 2.5rem;
            position: absolute;
            top: 5.6rem;
            left: 2rem;
        }
        .touImg{
            width: 100%;
            height: 100%;
            border-radius: 2.5rem;
        }
        .ri{
            border: none;
            background: rgb(0,0,0,0) !important;
        }
        .name{
            width: 15rem;
            font-size: 1.5rem;
            position: absolute;
            top: 6rem;
            left: 8rem;
        }
        .jifen{
            width: 15rem;
            font-size: 0.8rem;
            position: absolute;
            top: 8.3rem;
            left: 8rem;
            color: #ccc;
        }
        .cardNo{
            width: 15rem;
            font-size:0.8rem;
            position: absolute;
            top: 9.6rem;
            left: 8rem;
            color: #f38266;
        }
        .center-top{
            background: white;
            margin:1rem 0 1rem 0;
            width:100%;
        }
        .item{
            width:100%;
            height:2.8rem;
            line-height: 2.8rem;
            border-bottom: 1px solid #ccc;
        }
        .center-top .item:last-child{
            border-bottom: none;
        }
        .item i{
            margin-left: 1rem;
        }
        .item span{
            margin-left: 0.5rem;
        }
        .item-right{
            float:right;
            margin-right: 1rem;
        }
        .center-con{
            background: white;
            width:100%;
        }
        .center-con .item:last-child{
            border-bottom: none;
        }
        .vipIcon{
            float: left;
            width: 1.3rem;
            margin-left: 0.5rem;
            margin-top: 0.5rem;
        }

    </style>
    <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
</head>
<body>
<div class="top-img">
  <!--<div class="back" ><i class="fa  icon-angle-left icon-2x"></i></div>-->
    <div class="title"><p >个人中心</p></div>
    <!--<div class="add" ><img src="<?php echo $base_tPath; ?>/img/saoma.png" width="100%"></div>-->
</div>
<!--<div class="top-img">-->
    <!--<div class="back"><i class="fa  icon-angle-left icon-2x"></i></div>-->
    <!--<div class="title"><p>个人中心</p></div>-->
    <!--<div class="add"><a href="<?php echo url('index/Teacher/center'); ?>"><img src="<?php echo $base_tPath; ?>/img/home.png" width="100%"></a></div>-->
<!--</div>-->
<div class="center-bg">
    <div class="bgLeft"><img src="<?php echo $base_tPath; ?>/img/HBuilder.png" class="touImg"></div>
    <div class="bgRight">
        <div class="name ri" >
            <p style="float: left;"><?php echo $staffInfo['staff_name']; ?></p>
        </div>
        <div class="clear"></div>
        <div class="jifen ri" >积分：<span class="ji">11</span></div>
        <div class="cardNo ri" >会员卡号：<span class="memCard"><?php echo $staffInfo['staff_id']; ?></span></div>
        <input value="<?php echo $today; ?>" hidden id="today"/>
    </div>
</div>

<div class="center-top">
    <div class="item">
        <i class="fa   icon-user-md" style="color:purple"></i><span>个人信息</span>
        <div class="item-right person-info"><i class="fa  icon-angle-right"></i></div>
    </div>
    <div class="item">
        <i class="fa   icon-user-md" style="color:greenyellow"></i><span>课程安排</span>
        <div class="item-right baby-info"><i class="fa  icon-angle-right"></i></div>
    </div>
</div>

<div class="center-con">
    <div class="item">
        <i class="fa  icon-credit-card" style="color:#4191aa"></i><span>考勤记录</span>
        <div class="item-right attendance"><i class="fa  icon-angle-right"></i></div>
    </div>
    <div class="item">
        <i class="fa  icon-credit-card" style="color:#4191aa"></i><span>课堂作业</span>
        <div class="item-right classWork"><i class="fa  icon-angle-right"></i></div>
    </div>
    <!--div class="item">
        <i class="fa  icon-comments" style="color:#d2545f"></i><span>家庭作业</span>
        <div class="item-right homeWork"><i class="fa  icon-angle-right"></i></div>
    </div-->
    <div class="item">
        <i class="fa  icon-comments" style="color:#d2545f"></i><span>入学学生</span>
        <div class="item-right enterStudent"><i class="fa  icon-angle-right"></i></div>
    </div>
    <div class="item">
        <i class="fa  icon-bell-alt" style="color:#c2ac47"></i><span>消息中心</span>
        <div class="item-right msgCenter"><i class="fa  icon-angle-right"></i></div>
    </div>
</div>
</body>
<script>
    $(function(){
        var memberNo=$(".memCard").html();
        var today =$("#today").val();
        $(".person-info").click(function(){
            window.location.href="<?php echo url('index/teacher/info'); ?>?staffId="+memberNo;
        })
        $(".baby-info").click(function(){
            window.location.href="<?php echo url('index/teacher/stu_info'); ?>?staffId="+memberNo;
        })
        $(".attendance").click(function(){
            window.location.href="<?php echo url('index/teacher/attendance'); ?>?staffId="+memberNo;
        })
        $(".classWork").click(function(){
            window.location.href="<?php echo url('index/teacher/classwork'); ?>?staffId="+memberNo;
        })
        $(".homeWork").click(function(){
            window.location.href="<?php echo url('index/teacher/homework'); ?>?staffId="+memberNo+"&today="+today;
        })
        $(".enterStudent").click(function(){
            window.location.href="<?php echo url('index/teacher/entrance'); ?>?staffId="+memberNo+"&today="+today;
        })
        $(".msgCenter").click(function(){
            window.location.href="<?php echo url('index/teacher/message_center'); ?>?staffId="+memberNo;
        })
    })
</script>
<script src="<?php echo $base_tPath; ?>/js/common.js"></script>
</html>

