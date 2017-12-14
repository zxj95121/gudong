<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"C:\wamp64\www\gudong\public/../application/index\view\Default\index\center.html";i:1510300924;}*/ ?>
﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link href="/static/index/css/style.css" type="text/css" rel="stylesheet">
	<link href="/static/index/css/common.css" type="text/css" rel="stylesheet">
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
    <script src="/static/index/js/common.js"></script>
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
    <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
    <script src="/static/index/js/common.js"></script>
	<link href="/static/index/css/style.css" type="text/css" rel="stylesheet">
    <link href="/static/index/css/pinglun.css" type="text/css" rel="stylesheet">
</head>
<body style="background:#f2f2f2;">
<div id="head">
    <!--<img src="images/pinglun.jpg" style="" class="backg">-->
    <!--<img src="/static/index/images/timg10.png" alt="" />-->
    <span>个人中心</span>
</div>
	<!--<img src="images/timg15.png" style="" class="backg">-->
    <?php if(isset($user)): ?>
	<div class="con-top">
		<img src="<?php echo $user['header_img']; ?>" class="header">
		<div class="info">
                <a href="<?php echo url('index/info'); ?>?user_id=<?php echo $user['user_id']; ?>">
				<p class="name" style="margin: 1.8rem 0 0.5rem 0;"><?php echo $user['user_name']; ?></p>
				<p class="detail"><span class="worktype"><?php echo showstatus($user['isMember'],'会员,非会员:1,2'); ?></span></p></a>
		</div>
		<i class="fa fa-angle-right" onclick="window.location.href='info.html'" style="float: right;"></i>
	</div>
<div class="con-body">
		<div class="item">
			<img src="/static/index/images/user-icon03.png">
            <a href="<?php echo url('index/MyMoment'); ?>?user_id=<?php echo $user['user_id']; ?>">
			<span style="margin-left: 1rem;font-size: 1rem;">我的说说</span>
			<a href="recording.html"><i class=" fa-angle-right" style="float: right; "></i></a>
		</div>
		<div class="item">
            <a href="<?php echo url('index/MyComment'); ?>?user_id=<?php echo $user['user_id']; ?>">
			<img src="/static/index/images/user-icon05.png">
			<span style="margin-left: 1rem;font-size: 1rem;">我的评论</span>
			<a href="recording.html"><i class=" fa-angle-right" style="float: right; "></i></a>
		</div>
		<div class="item">
            <a href="<?php echo url('index/MyCollection'); ?>?user_id=<?php echo $user['user_id']; ?>">
			<img src="/static/index/images/user-icon01.png">
			<span style="margin-left: 1rem;font-size: 1rem;">我的收藏</span>
		<a href="recording.html"><i class=" fa-angle-right" style="float: right; "></i></a>
		</div>


</div>
    <?php endif; ?>

<div class="navBar">
  <ul class="clear-fix">
     <li><a href="/index/index/zhanshi.html"><img src="/static/index/images/home.png"><span>首页</span></a></li>
     <li><a href="/index/index/momentShow.html"><img src="/static/index/images/dengpao.png"><span>会员发布</span></a></li>
     <li class="navBar-active"><a href="/index/index/center.html"><img src="/static/index/images/emo.png"><span>个人中心</span></a></li>
  </ul>
</div>



</body>
<script>
    $(".info").click(function(){
        window.location.href="info.html"
    })


</script>
</html>

