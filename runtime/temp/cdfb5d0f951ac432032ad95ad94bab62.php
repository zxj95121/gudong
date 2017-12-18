<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:90:"D:\new_exe\xampp\htdocs\gudong\public/../application/index\view\Default\index\zhanshi.html";i:1512287097;s:91:"D:\new_exe\xampp\htdocs\gudong\public/../application/index\view\Default\index_new\foot.html";i:1512287023;}*/ ?>
﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <title></title>
    <!-- <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script> -->
    <script src="/static/index/js/common.js"></script>
	<link href="/static/index/css/zhanshi.css?v=4" type="text/css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/static/index/js/mui/dist/css/mui.min.css">
    <!-- <link href="/static/index/css/style.css" type="text/css" rel="stylesheet"> -->
    <link href="/static/index/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="/static/index/bootstrap/css/basic.css" type="text/css" rel="stylesheet">
    <style>
       .backg{
       	position: absolute;
       top:0;
       	width: 100%;
       	height: 40.63rem;
       	opacity: 0.4;
       }
      	#gtn_user li{
      		height: 9rem;
      	}
      	.wraper>ul>li{
      		width: 33.33%;
      	}
      	#gtn_user img, #gtn_act img{
            transform: scale(1);
      	}
      	.operate-icon:not(.glyphicon-heart-empty){
      		margin-right: 1em;
      	}
      	.operate-notActive{
      		/*color: #5A99CF;*/
      		color: #7F7F7F;
      	}
      	.commentsP{
      		padding: 4px 4px 0px;
      		font-size: 14px;
      		margin-bottom: 0px;
      	}
      	.commentsP:nth-of-type(1){
      		margin-top: 10px;
      	}
      	.commentsP span:nth-of-type(1){
      		font-weight: bold;
      	}
      	.commentsP:nth-last-child(1){
      		margin-bottom: 10px;
      	}
      	.num_num{
      		margin-left: 3px;
      	}
      	.activity_li p{
      		color: #343530;
      	}
    </style>
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
		<img src="/static/index/images/china.png" alt="" / class="tp">
		<ul id="peopleUl" style="width: 100%;">
			<li style="border-left:none"><a href="#" class="active">热度</a></li>
			<li><a href="#">同城</a></li>
			<li><a href="#">同性</a></li>
		</ul>
		<ul id="activityUl" style="display: none;width: 100%;">
			<li style="border-left:none"><a href="#" class="active">排行</a></li>
			<li><a href="#">最新</a></li>
			<li><a href="#">历史</a></li>
		</ul>
	</div>


	<div class="fet">
		<ul class="gtn" id="gtn_user" style="display: none;">
			
<!-- 			{foreach $userObj as $key=>$val}
			<a href="{:url('index/userShow')}?uid={$val.user_id}" style="display: none;">
				<li>
	                <div class="box" style=""><img style="" src="{$val['newImg']}" alt="" style="max-width: 100%;max-height:100%" /></div>
					<div>
						<p>{$val['user_name']}</p>

					</div>
				</li>
			</a>
			{/foreach} -->
			

			<?php foreach($momentsObj as $key=>$val): ?>
			<div class="mui-card oneMoment" mid="<?php echo $val['moment_id']; ?>" uid="<?php echo $val['user_id']; ?>">
				<div class="mui-card-header mui-card-media">
					<img src="<?php echo $val['headimg']; ?>">
					<div class="mui-media-body">
						<?php echo $val['name']; ?>
						<p>发表于 <?php echo $val['add_ts']; ?></p>
					</div>
				</div>
				<div class="mui-card-content" style="cursor: pointer;">
					<img src="<?php echo $val['img']; ?>" alt="" width="100%">
					<?php foreach($val['comments'] as $v): ?>
					<p class="commentsP" cid="<?php echo $v['id']; ?>">
						<span><?php echo $v['user_name']; ?></span>：
						<?php echo $v['content']; ?>
					</p>
					<?php endforeach; if(!count($val['comments'])): ?>
					<p class="commentsP noCommentP" style="font-size: 12px;color:#7F7F7F;">
						暂无评论
					</p>
					<?php endif; ?>
				</div>
				<div class="mui-card-footer">
					<!-- <a class="mui-card-link">Like</a> -->
					<!-- <a class="mui-card-link">Comment</a> -->
					<a class="mui-card-link" style="font-size: 12px;"><span class="thumb_num num_num"><?php echo $val['thumb_num']; ?></span> 点赞<span class="collect_num num_num"><?php echo $val['collect_num']; ?></span> 收藏<span class="comment_num num_num"><?php echo $val['comment_num']; ?></span> 评论</a>
					<a class="mui-card-link" style="font-size: 13px;height: 100%;">
						<i style="cursor: pointer;" class="thumb glyphicon glyphicon-thumbs-up operate-icon<?php if(!$val['is_thumb']): ?> operate-notActive<?php endif; ?>"></i>
						<i style="cursor: pointer;" class="comment glyphicon glyphicon-comment operate-icon operate-notActive"></i>
						<i style="cursor: pointer;" class="collect glyphicon glyphicon-heart-empty operate-icon<?php if(!$val['is_collect']): ?> operate-notActive<?php endif; ?>"></i>
					</a>
				</div>
			</div>
			<?php endforeach; ?>
				
			<div style="text-align: center;">
			<?php echo $mPages; ?>
			</div>
		</ul>
        
		<ul class="gtn" style="" id="gtn_act">
			<?php foreach($activityList as $key=>$val): ?>
			<a href="<?php echo url('index/xiaoyou'); ?>?activity_id=<?php echo $val['activity_id']; ?>">
				<li class="activity_li">
	                
	                <?php foreach($val['img'] as $key=>$img): if($key<1): ?>
	                      <div class="box"><img src="<?php echo substr($img,1); ?>" alt="" /></div>
	                  <?php endif; endforeach; ?>
					<div>
						<p><?php echo $val['activity_name']; ?></p>
						<p><?php echo date("Y-m-d",$val['start_time']); ?></p>

					</div>
				</li>
			</a>
			 <?php endforeach; ?>
		</ul>

		<div style="height: 6rem;opacity: 0px;width: 100%;"></div>
       
	</div>

	<!-- <div status="1" class="foot" id="change" style="height: 2.5rem;line-height: 2.5rem;width: 100%;margin-left: 0px;position: fixed;bottom: 50px;z-index: 10;">
		<a href="#"><span style="font-size: 2.5em;">+</span></a>
	</div> -->

    <nav class="mui-bar mui-bar-tab" style="z-index: 9999;background: white;height: 4.2rem;">
    <a class="mui-tab-item nav-a-bottom" id="yi" href="/index/index/zhanshi.html?c=0#user" style="border-right: 1px solid #eee;cursor: pointer;">
        <img src="/static/index/images/bars-o.png" />
        <span class="mui-tab-label" style="color: #666;
    font-size: 1.4rem;
    font-weight: 400;">艺</span>
    </a>
    <a class="mui-tab-item nav-a-bottom" id="dao" href="/index/index/zhanshi_act.html" style="border-right: 1px solid #eee;cursor: pointer;">
       <img src="/static/index/images/bars-o.png" />
       <span class="mui-tab-label" style="color: #666;
    font-size: 1.4rem;
    font-weight: 400;">道</span>
    </a>
    <a class="mui-tab-item nav-a-bottom" id="jia" href="/index/index/center.html" style="cursor: pointer;">
        <img src="/static/index/images/bars-o.png" />
        <span class="mui-tab-label" style="color: #666;
    font-size: 1.4rem;
    font-weight: 400;">家</span>
    </a>
</nav>
<style>
	.mui-tab-item{
		height: 4.2rem !important;
	}
	.mui-bar-tab a img{
		    width: 0.9rem;
    margin-top: 0;
    margin-right: -0.2rem;
	}
</style>
<script type="text/javascript">
    mui('body').on('tap','.nav-a-bottom',function(){
        document.location.href=this.href;
    });
</script>
</body>
<script type="text/javascript" src="/static/index/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="/static/index/layer/layer.js"></script>
<script type="text/javascript" src="/static/index/js/mui/dist/js/mui.min.js"></script>
<script type="text/javascript">
	$(function(){

		mui('body').on('tap','.nav-a-bottom',function(){
				document.location.href=this.href;
		});
		mui('body').on('tap','.activity_li',function(){
				document.location.href=$(this).parent().attr('href');
		});

		$('.pagination li').click(function(){
			if ($(this).find('a').attr('href')) {
				var href = $(this).find('a').attr('href');
				window.location.href = href;
			}
		})

		$('.pagination .active').find('span').css('height', $('.pagination').height()+'px');


		identity = <?php echo $identity; ?>;
		uid = '<?php echo $uid; ?>';

		var hash = window.location.hash;
        if (hash == '#user') {
           	$('#activityUl').hide();
			$('#peopleUl').show();
			$('#gtn_act').hide();
			$('#gtn_user').show();
			$('#change').attr('status', 1);
			// $('#change').find('span').html('点击切换到活动');
			$('#change').find('span').html('+');
        } else if (hash == '#activity') {
            //转为活动
			$('#activityUl').show();
			$('#peopleUl').hide();
			$('#gtn_act').show();
			$('#gtn_user').hide();
			$('#change').attr('status', 0);
			// $('#change').find('span').html('点击切换到校友');
			$('#change').find('span').html('+');
        }

		$('#change').click(function(){
			window.scrollTop = 0;
			//1表示校友，0表示活动
			if ($(this).attr('status') == 1) {
				//转为活动
				$('#activityUl').show();
				$('#peopleUl').hide();
				$('#gtn_act').show();
				$('#gtn_user').hide();
				$(this).attr('status', 0);
				// $(this).find('span').html('点击切换到校友');
				$('#change').find('span').html('+');
			} else {
				$('#activityUl').hide();
				$('#peopleUl').show();
				$('#gtn_act').hide();
				$('#gtn_user').show();
				$(this).attr('status', 1);
				// $(this).find('span').html('点击切换到活动');
				$('#change').find('span').html('+');
			}
		})
	})
</script>
<script>
    $(function(){
      	$('.wraper li>a').click(function(){
			var index=$(this).index();
			$(this).addClass('active').siblings().removeClass('active');
		})
		// $(".gtn li").click(function(){
		// 	window.location.href="<?php echo url('index/index/xiaoyou'); ?>";
		// })

		$('.oneMoment .mui-card-content').click(function(){
			var mid = $(this).parents('.oneMoment').attr('mid');
			window.location.href = '/index/see/seeMoment?mid='+mid;
		})
    })
</script>
<script type="text/javascript" src="/static/index/js/thumb.js?v=2"></script>
</html>

