<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"C:\wamp64\www\gudong\public/../application/index\view\Default\index\zhanshi.html";i:1510300985;}*/ ?>
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
	<link href="/static/index/css/zhanshi.css" type="text/css" rel="stylesheet">
    <link href="/static/index/css/style.css" type="text/css" rel="stylesheet">
</head>
<body>
	<!--<img src="images/zhanshi.jpg" style="" class="backg">-->
	<div id="head">
		<!--<img src="/static/index/images/timg10.png" alt="" />-->
		<span>YD</span>
		<img src="/static/index/images/timg3.png" alt="" / class="img">
		<img src="/static/index/images/timg11.png" alt="" / class="asd">
	</div>
	<div class="wraper">
		<img src="/static/index/images/tu1.jpg" alt="" / class="tp">
		<ul>
			<li style="border-left:none"><a href="#" class="active">热度</a></li>
			<li><a href="#">同城</a></li>
			<li><a href="#">同乡</a></li>
		</ul>
	</div>


	<div class="fet">
        <?php foreach($activityList as $key=>$val): ?>
		<ul class="gtn">
			<li>
                <a href="<?php echo url('index/xiaoyou'); ?>?activity_id=<?php echo $val['activity_id']; ?>">
                    <?php foreach($val['img'] as $key=>$img): if($key<1): ?>
                          <div class="box"><img src="<?php echo substr($img,1)?>" alt="" /></div>
                      <?php endif; endforeach; ?>
				<div>
					<p><?php echo $val['activity_name']; ?></p>
					<p><?php echo date("Y-m-d",$val['start_time']); ?></p>

				</div>
			</li>
		</ul>
        <?php endforeach; ?>
	</div>

	<div class="foot">
		<a href="#">校友/活动切换按钮</a>
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
      $('.wraper li>a').click(function(){
			var index=$(this).index();
			$(this).addClass('active').siblings().removeClass('active');
		})
	$(".gtn li").click(function(){
		window.location.href="xiaoyou.html"
	})
    })
</script>
</html>
