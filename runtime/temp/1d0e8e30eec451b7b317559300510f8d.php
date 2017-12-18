<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:94:"D:\new_exe\xampp\htdocs\gudong\public/../application/index\view\Default\index_new\zhanshi.html";i:1513415457;s:91:"D:\new_exe\xampp\htdocs\gudong\public/../application/index\view\Default\index_new\foot.html";i:1513162447;}*/ ?>
<html>
<head>
	<meta charset="utf-8">
	<title>读懂我</title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="stylesheet" type="text/css" href="/static/index/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/static/index/css/Font-Awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/static/index/bootstrap/css/basic.css">
    <link rel="stylesheet" type="text/css" href="/static/index/js/mui/dist/css/mui.min.css">
    <link rel="stylesheet" type="text/css" href="/static/index/js/swiper/dist/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="/static/index/css/new/rem.css">
    <link rel="stylesheet" type="text/css" href="/static/index/css/new/show_common.css">
    <link rel="stylesheet" type="text/css" href="/static/index/css/new/moment.css?v=2">
    <style>
    	.mui-popup-title{
    		display: none;
    	}
    	.mui-popup-input input {
    font-size: 1rem;
    width: 100%;
    height: 3rem;
    margin: 15px 0 0;
    padding: 0 5px;
    border: 1px solid rgba(0,0,0,.3);
    border-radius: 0;
    background: #fff;
    border-radius: 0.5rem;
}

	.mui-popup-title,.mui-popup-text {
    font-size: 1.2rem;
}
.mui-popup-button {
	font-size: 1.3rem;
}
    </style>
</head>
<body>
	<header class="gd-header">
		<div class="gd-head-center">
			<div class="gd-header-nav gd-header-nav-active">
				<span class="gd-head-title" href="#content1">热度</span>
			</div>
			<div class="gd-header-nav">
				<span class="gd-head-title" href="#content2">同城</span>
			</div>
			<div class="gd-header-nav">
				<span class="gd-head-title" href="#content3">同性</span>
			</div>
		</div>
	</header>

	<div class="gd-content">
		<div class="swiper-container swiper-container-father" style="height: 100%;">
	    	<div class="swiper-wrapper">
	      		<div class="swiper-slide">
	      			<div id="PullDown" class="scroller-pullDown" style="display: none;">
		                <img style="width: 20px; height: 20px;" src="/static/index/images/rolling.svg">
		                <span id="pullDown-msg" class="pull-down-msg">下拉刷新</span>
		            </div>
				    <div class="gd-con" id="content1">

				    	<?php foreach($momentsObj as $key => $value): ?>
				    	<div class="moment" uid="<?php echo $value['user_id']; ?>" mid="<?php echo $value['moment_id']; ?>" iscollect="<?php echo $value['is_collect']; ?>"><!-- 说说 -->
	      					<div class="moment-header"><!-- 头部 -->
	      						<!-- <img class="moment-header-img" src="http://wx.qlogo.cn/mmopen/y5RpFDuUObyHey58AgYvp2vva3vicQEON4Rzab7hj4x8JuDM1ZLRBz1Bn7QwvicEsd08CYAlsF4m0DEXxeoKicyh3BwWY2tzUSz/0"> -->
	      						<img class="moment-header-img" src="<?php echo $value['headimg']; ?>">
	      						<div class="moment-header-right">
	      							<div class="moment-header-right-top">
	      								<div class="moment-header-right-top-left">
		      								<div class="moment-nickname"><?php echo $value['name']; ?></div>
		      								<?php if(!$value['is_sub']): ?>
		      								<div class="moment-subscribe"><button type="button" class="mui-btn mui-btn-success mui-btn-outlined">关注</button></div>
		      								<?php endif; ?>
	      								</div>
	      								<!-- <div class="moment-header-right-top-right">
	      									<div class="moment-position">合肥市</div>
	      									<div class="moment-position-icon glyphicon glyphicon-map-marker">
	      									</div>
	      								</div> -->
	      							</div>
	      							<div class="moment-header-right-bottom">
	      								<div class="moment-time"><?php echo $value['add_ts']; ?></div>
	      								<div class="moment-see-icon glyphicon glyphicon-eye-open"></div>
	      								<div class="moment-see"><?php echo $value['read_num']; ?></div>
	      							</div>
	      						</div>
	      					</div>

	      					<div class="moment-content"><!-- 文字内容 -->
	      						<?php echo $value['content']; ?>
	      					</div>

	      					<div class="moment-image"><!-- 图片部分 -->
	      						<!-- <img src="/uploads/img/20171120/c5ddec21b97578c45fd31d91e7bcb4b0.JPG"> -->
	      						<img src="<?php echo $value['img']; ?>">
	      					</div>

	      					<div class="moment-operate"><!-- 底部操作部分 -->
	      						<div class="moment-operate-left">
		      						<!-- <div class="moment-thumb">
		      							<img src="/static/index/images/thumb_48.png">
		      							<span class="moment-operate-num">2</span>
		      						</div> -->
		      						<!-- <div class="moment-thumb-num"></div> -->
		      						<div class="moment-thumb">
		      							<img src="/static/index/images/love_32<?php if($value['is_thumb']): ?>_green<?php endif; ?>.png">
		      							<span class="moment-operate-num"><?php echo $value['thumb_num']; ?></span>
		      						</div>
		      						<div class="moment-comment">
		      							<img src="/static/index/images/comment_48.png">
		      							<span class="moment-operate-num"><?php echo $value['comment_num']; ?></span>
		      						</div>
		      						<!-- <div class="moment-comment-num"></div> -->
		      						<div class="moment-share">
		      							<img src="/static/index/images/share_48.png">
		      						</div>
	      						</div>
	      						<div class="moment-cicles">
	      							<img src="/static/index/images/circle_48.png">
	      						</div>
	      					</div>

	      					<div class="moment-comments"><!-- 评论部分 -->
	      						<?php if($value['comment_num'] > 10): ?>
	      						<div class="moment-comments-seeAll" status="1" num="<?php echo $value['comment_num']; ?>">
	      							查看全部<?php echo $value['comment_num']; ?>条评论
	      						</div>
	      						<?php else: ?>
	      						<div class="moment-comments-seeAll" status="0" style="display: none;" num="<?php echo $value['comment_num']; ?>">
	      						</div>
	      						<?php endif; foreach($value['comments'] as $kc =>$vc): if($kc <= 9): if(!$vc['comment_id']): ?>
									<div class="moment-comments-first gd-mc" uid="<?php echo $vc['user_id']; ?>" cid="<?php echo $vc['id']; ?>">
										<span class="moment-comments-nickname"><?php echo $vc['user_name']; ?></span>
										<span>:</span>
										<span class="moment-comments-content"><?php echo $vc['content']; ?></span>
									</div>
									<?php else: ?>
									<div class="moment-comments-second gd-mc" uid="<?php echo $vc['user_id']; ?>" cid="<?php echo $vc['id']; ?>">
										<span class="moment-comments-nickname"><?php echo $vc['user_name']; ?></span><span class="moment-comments-word-reply">回复</span><span class="moment-comments-nickname"><?php echo $vc['usered_name']; ?></span><span>:</span><span class="moment-comments-content"><?php echo $vc['content']; ?></span>
									</div>
									<?php endif; ?>
	      						<!-- <div class="moment-comments-second gd-mc">
	      							<span class="moment-comments-nickname">观音菩萨</span><span class="moment-comments-word-reply">回复</span><span class="moment-comments-nickname">孙悟空</span><span>:</span><span class="moment-comments-content">给你脸了是吧</span>
	      						</div> -->
	      						<?php else: if(!$vc['comment_id']): ?>
		      						<div class="moment-comments-first gd-mc moment-comments-hide" uid="<?php echo $vc['user_id']; ?>" cid="<?php echo $vc['id']; ?>">
		      							<span class="moment-comments-nickname"><?php echo $vc['user_name']; ?></span>
		      							<span>:</span>
		      							<span class="moment-comments-content"><?php echo $vc['content']; ?></span>
		      						</div>
		      						<?php else: ?>
		      						<div class="moment-comments-second gd-mc moment-comments-hide" uid="<?php echo $vc['user_id']; ?>" cid="<?php echo $vc['id']; ?>">
		      							<span class="moment-comments-nickname"><?php echo $vc['user_name']; ?></span><span class="moment-comments-word-reply">回复</span><span class="moment-comments-nickname"><?php echo $vc['usered_name']; ?></span><span>:</span><span class="moment-comments-content"><?php echo $vc['content']; ?></span>
		      						</div>
		      						<?php endif; endif; endforeach; ?>
	      					</div>
	      				</div>
				     
				    	<?php endforeach; ?>
	      				<div id="PullUp" class="scroller-pullUp" style="display: none;">
			                <img style="width: 20px; height: 20px;" src="/static/index/images/rolling.svg" />
			                <span id="pullUp-msg" class="pull-up-msg">正在获取</span>
			            </div>
				    </div>
				</div>
	      		<div class="swiper-slide">
	      			<div class="gd-con" id="content2" style="">
	      				<!-- <div style="text-align: center;">
	      					<img src="/static/index/images/send949393.png" style="width: 25%;">
	      					<p style="font-size: 1.6rem;line-height: 1.8rem;">
	      						功能正在开发<br />
	      						敬请期待
	      					</p>
	      				</div> -->
	      				<div id="PullUp_city" class="scroller-pullUp" style="display: none;width: 100%;text-align: center;">
			                <img style="width: 20px; height: 20px;" src="/static/index/images/rolling.svg" />
			                <span id="pullUp-msg" class="pull-up-msg">正在获取</span>
			            </div>
					</div>
	      		</div>
	      		<div class="swiper-slide">
	      			<div class="gd-con" id="content3">
	      				<div id="PullUp_sex" class="scroller-pullUp" style="display: none;width: 100%;text-align: center;">
			                <img style="width: 20px; height: 20px;" src="/static/index/images/rolling.svg" />
			                <span id="pullUp-msg" class="pull-up-msg">正在获取</span>
			            </div>
					</div>
				</div>
	    	</div>
	  	</div>
	</div>


	<div class="gdp" style="display: none;">
		<div class="gdp-wrapper">
			<div class="gdp-wp">
				<div class="gd-popover-operate" see="nosee">
		        	不看此人
		        </div>
		        <div class="gd-popover-operate" see="tip-off">
		        	举报
		        </div>
		       <!-- <div class="gd-popover-operate" see="collect">
		        	收藏
		        </div>-->
		        <div class="gd-popover-cancle">
		        	取消
			    </div>
			</div>
	    </div>
	</div>
	
	<script type="text/javascript" src="/static/index/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/static/index/layer/layer.js"></script>
    <script type="text/javascript" src="/static/index/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/static/index/js/mui/dist/js/mui.min.js"></script>
    <script type="text/javascript" src="/static/index/js/swiper/dist/js/swiper.min.js"></script>
    <script type="text/javascript">
    	identity = <?php echo $identity; ?>;
    </script>
    <script type="text/javascript" src="/static/index/js/new/show_common.js?v=3"></script>
    <script type="text/javascript" src="/static/index/js/new/moment.js?v=2"></script>
	<nav class="mui-bar mui-bar-tab" style="z-index: 9999;background: white;">
    <a class="mui-tab-item nav-a-bottom" id="yi" href="/index/index/zhanshi.html?c=0#user" style="border-right: 1px solid #eee;cursor: pointer;">
        <img src="/static/index/images/bars-o.png" />
        <span class="mui-tab-label" style="">艺</span>
    </a>
    <a class="mui-tab-item nav-a-bottom" id="dao" href="/index/index/gift.html" style="border-right: 1px solid #eee;cursor: pointer;">
       <img src="/static/index/images/bars-o.png" />
       <span class="mui-tab-label" style="">道</span>
    </a>
    <a class="mui-tab-item nav-a-bottom" id="jia" href="/index/index/center.html" style="cursor: pointer;">
        <img src="/static/index/images/bars-o.png" />
        <span class="mui-tab-label" style="">家</span>
    </a>
</nav>
<style>
	.mui-tab-label{
		color: #666;
    font-size: 1.4rem;
    font-weight: 400;
	}
	.mui-bar{
		height: 4.2rem;
	}
	.mui-tab-item{
		height: 4.2rem;
	}
	.mui-tab-label{
		color: #666;
    font-size: 1.4rem;
    font-weight: 400;
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
    <script type="text/javascript">
    	$("#yi span").css("color","black");
    	$("#yi img").attr("src","/static/index/images/bars-b.png");
    	$(document).on('click', '.moment-image', function(){
    		window.location.href = '/index/see/seeMoment?mid='+$(this).parents('.moment').attr('mid');
    	});
    </script>

    
</body>
</html>



<!--<div class="moment">
	<div class="moment-header">
		<img class="moment-header-img" src="http://wx.qlogo.cn/mmopen/y5RpFDuUObyHey58AgYvp2vva3vicQEON4Rzab7hj4x8JuDM1ZLRBz1Bn7QwvicEsd08CYAlsF4m0DEXxeoKicyh3BwWY2tzUSz/0">
		<div class="moment-header-right">
			<div class="moment-header-right-top">
				<div class="moment-header-right-top-left">
					<div class="moment-nickname">StellaCiCi</div>
					<div class="moment-subscribe"><button type="button" class="mui-btn mui-btn-success mui-btn-outlined">关注</button></div>
				</div>
				<div class="moment-header-right-top-right">
					<div class="moment-position">合肥市</div>
					<div class="moment-position-icon glyphicon glyphicon-map-marker">
					</div>
				</div>
			</div>
			<div class="moment-header-right-bottom">
				<div class="moment-time">12分钟</div>
				<div class="moment-see-icon glyphicon glyphicon-eye-open"></div>
				<div class="moment-see">43</div>
			</div>
		</div>
	</div>

	<div class="moment-content">
		今天天气好好啊，哇咔咔！
	</div>

	<div class="moment-image">
		<img src="/uploads/img/20171120/c5ddec21b97578c45fd31d91e7bcb4b0.JPG">
	</div>

	<div class="moment-operate">
		<div class="moment-operate-left">
			<div class="moment-thumb">
				<img src="/static/index/images/thumb_48.png">
				<span class="moment-operate-num">2</span>
			</div>
			<div class="moment-thumb">
				<img src="/static/index/images/love_32.png">
				<span class="moment-operate-num">3</span>
			</div>
			<div class="moment-comment">
				<img src="/static/index/images/comment_48.png">
				<span class="moment-operate-num">3</span>
			</div>
			<div class="moment-share">
				<img src="/static/index/images/share_48.png">
			</div>
		</div>
		<div class="moment-cicles">
			<img src="/static/index/images/circle_48.png">
		</div>
	</div>

	<div class="moment-comments">
		<div class="moment-comments-seeAll">
			查看全部5条评论
		</div>
		<div class="moment-comments-first">
			<span class="moment-comments-nickname">孙悟空</span><span>:</span><span class="moment-comments-content">没错，逗比就是我派去的。</span>
		</div>
		<div class="moment-comments-second">
			<span class="moment-comments-nickname">观音菩萨</span><span class="moment-comments-word-reply">回复</span><span class="moment-comments-nickname">孙悟空</span><span>:</span><span class="moment-comments-content">给你脸了是吧</span>
		</div>
	</div>
</div> -->