<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"C:\wamp64\www\gudong\public/../application/index\view\Default\index\moment.html";i:1510300547;}*/ ?>
﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
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
	<link href="/static/index/css/xiaoyou.css" type="text/css" rel="stylesheet">
	<link href="/static/index/css/style.css" type="text/css" rel="stylesheet">
</head>

<body>
	<!--<img src="images/xiaoyou.jpg" style="" class="backg">-->


	<div id="head">
		<div class="top">
            <a class="return"><img src="/static/index/images/timg4.png"  alt="" / class="act"></a>
			<span>会员发布</span>
			<a ><img src="<?php echo $moment['header_img']; ?>" alt="" /></a>
			<!--<a ><img src="/static/index/images/timg12.png" alt="" / class="asd"></a>-->
		</div>

		<div class="bottom">
			<p><?php echo $moment['user_name']; ?></p>
			<span><?php echo $moment['title']; ?></span>
		</div>
		<ul class="mot">
			<li style="" class="comments">
                <a href="<?php echo url('index/moment_comment'); ?>?moment_id=<?php echo $moment['moment_id']; ?>">
				<p><?php echo $comment; ?></p>
				<span>评论</span>
                 </a>
			</li>
			<li>
				<p><?php echo $collection; ?></p>
				<span>收藏</span>
			</li>
			<li>
				<p><?php echo $moment['thumbs']; ?></p>
				<span>点赞</span>
		</ul>
	</div>
	<div class="browse">
		<ul>
			<li>

                <?php foreach($moment['img'] as $img): ?>
                <div class="box"><img src="<?php echo substr($img,1)?>" alt="" /></div>
                <?php endforeach; ?>
			</li>

		</ul>
	</div>

    <div class="navBar">
        <ul class="clear-fix">
            <li><a href="/index/index/zhanshi.html"><img src="/static/index/images/home.png"><span>首页</span></a></li>
            <li><a href="/index/index/momentShow.html"><img src="/static/index/images/dengpao.png"><span>会员发布</span></a></li>
            <li class="navBar-active"><a href="/index/index/center.html"><img src="/static/index/images/emo.png"><span>个人中心</span></a></li>
        </ul>
    </div>

</body>

<script>
    $(function(){
       $(".comments").click(function(){
		window.location.href="moment_comment.html"
	})
    });
    $(function(){
        $(".return").click(function(){
            window.location.href="momentShow.html"
        })
    });
</script>
</html>

