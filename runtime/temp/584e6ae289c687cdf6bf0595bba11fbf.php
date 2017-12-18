<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"C:\wamp64\www\gudong\public/../application/index\view\Default\index\MomentPinglun.html";i:1510220036;}*/ ?>
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
	<link href="/static/index/css/pinglun.css" type="text/css" rel="stylesheet">
</head>
<body>
	<!--<img src="images/pinglun.jpg" style="" class="backg">-->
	<div id="head">
		<img src="/static/index/images/timg10.png" alt="" />
		<span>评论</span>
	</div>
    <?php foreach($McommentList as $key=>$info): ?>
	<div class="discuss">
		<ul>
			<li>
				<div class="td"><img style="height: 3rem;width: 3rem;" src="<?php echo $info['header_img']; ?>" alt="" /></div>
				<div class="act">
					<p><?php echo $info['user_name']; ?></p>
					<span><?php echo $info['content']; ?></span>
				</div>	
				<div class="bod">
					<span  class="fot"><?php echo date('Y-m-d,H:i',$info['add_ts']); ?></span>
                        <input type="checkbox" hidden="hidden">
					<div hidden="hidden" class="box">3</div>
				</div>
			</li>
		</ul>
	</div>
<?php endforeach; ?>
</body>
<script>
    $(function(){
       
    })
</script>
</html>

