<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"C:\wamp64\www\gudong\public/../application/index\view\Default\index\MyCollection.html";i:1510300547;}*/ ?>
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
		<img src="/static/index/images/timg10.png" alt="" />
		<span>我的收藏</span>
		<!--<img src="/static/index/images/timg3.png" alt="" / class="img">-->
		<!--<img src="/static/index/images/timg11.png" alt="" / class="asd">-->
	</div>


	<div class="fet">
        <?php foreach($collectionList as $key=>$val): ?>
		<ul class="gtn">
			<li>
                <a href="<?php echo url('index/moment'); ?>?moment_id=<?php echo $val['moment_id']; ?>">
                    <?php if(!empty($val['img'])): foreach($val['img'] as $key=>$img): if($key<1): ?>
                          <div class="box"><img src="<?php echo substr($img,1)?>" alt="" /></div>
                      <?php endif; endforeach; endif; ?>
				<div>
					<p><?php echo $val['user_name']; ?></p>
					<p><?php echo date("Y-m-d",$val['add_ts']); ?></p>

				</div>
			</li>
		</ul>
        <?php endforeach; ?>
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
		window.location.href="moment.html"
	})
    })
</script>
</html>

