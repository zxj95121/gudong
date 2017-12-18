<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:96:"D:\new_exe\xampp\htdocs\gudong\public/../application/index\view\Default\index_new\seeMoment.html";i:1513414882;s:91:"D:\new_exe\xampp\htdocs\gudong\public/../application/index\view\Default\index_new\foot.html";i:1513162447;}*/ ?>
<html>
<head>
	<meta charset="utf-8">
	<title>读懂我</title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="stylesheet" type="text/css" href="/static/index/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/static/index/bootstrap/css/basic.css">
    <link rel="stylesheet" type="text/css" href="/static/index/js/mui/dist/css/mui.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="/static/index/js/swiper/dist/css/swiper.min.css"> -->
    <link rel="stylesheet" type="text/css" href="/static/index/css/new/rem.css">
    <!-- image预览 -->
    <link rel="stylesheet" type="text/css" href="/static/index/js/mui/css/previewimage.css">

    <link rel="stylesheet" type="text/css" href="/static/index/css/new/show_common.css">
    <link rel="stylesheet" type="text/css" href="/static/index/css/new/moment.css">
    <link rel="stylesheet" type="text/css" href="/static/index/css/new/seeMoment.css">
</head>
<body>
	<header class="gd-header">
		<i class="glyphicon i_prev_url" style="top: 1.1rem;"><img src="/static/index/images/icon-prev.png" style="width: 2rem;"></i>
		<div class="gd-head-center">
			<div class="gd-header-nav">
				<span class="gd-head-title" href="#content1">进化详情</span>
			</div>
<!-- 			<div class="gd-header-nav">
				<span class="gd-head-title" href="#content2">同城</span>
			</div>
			<div class="gd-header-nav">
				<span class="gd-head-title" href="#content3">同性</span>
			</div> -->
		</div>
	</header>

	<div class="gd-content">
<!-- 		<div id="PullDown" class="scroller-pullDown" style="display: none;">
            <img style="width: 20px; height: 20px;" src="/static/index/images/rolling.svg">
            <span id="pullDown-msg" class="pull-down-msg">下拉刷新</span>
        </div> -->
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
						<?php foreach($value['images'] as $k=> $v): ?>
						<div class="moment-image-div" style="background-image: url('<?php echo $v; ?>');">
							<img class="mui-media-object" src="<?php echo $v; ?>" style="opacity: 0;width: 100%;" data-preview-src="" data-preview-group="1">
						</div>
						<?php endforeach; ?>
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
						<?php if($value['comment_num'] > 3): ?>
						<div class="moment-comments-seeAll" status="1" num="<?php echo $value['comment_num']; ?>">
							查看全部<?php echo $value['comment_num']; ?>条评论
						</div>
						<?php else: ?>
						<div class="moment-comments-seeAll" status="0" style="display: none;" num="<?php echo $value['comment_num']; ?>">
						</div>
						<?php endif; foreach($value['comments'] as $kc =>$vc): if($kc <= 2): ?>
						<div class="moment-comments-first gd-mc" uid="<?php echo $vc['user_id']; ?>" cid="<?php echo $vc['id']; ?>">
							<span class="moment-comments-nickname"><?php echo $vc['user_name']; ?></span><span>:</span><span class="moment-comments-content"><?php echo $vc['content']; ?></span>
						</div>
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


	<div class="gdp" style="display: none;">
		<div class="gdp-wrapper">
			<div class="gdp-wp">
				<div class="gd-popover-operate" see="nosee">
		        	不看此人
		        </div>
		        <div class="gd-popover-operate" see="tip-off">
		        	举报
		        </div>
		        <div class="gd-popover-operate" see="collect">
		        	收藏
		        </div>
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
    <!-- <script type="text/javascript" src="/static/index/js/swiper/dist/js/swiper.min.js"></script> -->
    <!-- <script type="text/javascript" src="/static/index/js/new/show_common.js"></script> -->
    <!-- 图片预览start -->
    <script type="text/javascript" src="/static/index/js/mui/js/mui.zoom.js"></script>
    <!-- 图片预览over -->
    <script type="text/javascript" src="/static/index/js/mui/js/mui.previewimage.js"></script>

    <script type="text/javascript">
    	identity = <?php echo $identity; ?>;
    </script>

    <script type="text/javascript" src="/static/index/js/new/moment.js"></script>
    <script type="text/javascript" src="/static/index/js/new/seeMoment.js"></script>

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
</body>
</html>