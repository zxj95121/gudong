<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:93:"D:\new_exe\xampp\htdocs\gudong\public/../application/index\view\Default\index_new\center.html";i:1513421302;s:91:"D:\new_exe\xampp\htdocs\gudong\public/../application/index\view\Default\index_new\foot.html";i:1513162447;}*/ ?>
<html>
<head>
	<meta charset="utf-8">
	<title>我的进化in记</title>
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="/static/index/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/static/index/js/mui/dist/css/mui.min.css">
    <link rel="stylesheet" type="text/css" href="/static/index/css/new/rem.css">
    <!-- <link rel="stylesheet" type="text/css" href="/static/index/css/new/show_common.css"> -->
    <link rel="stylesheet" type="text/css" href="/static/index/css/new/center.css?v=2">
    <link rel="stylesheet" type="text/css" href="/static/index/css/new/moment.css?v=3">
        <style>
    	.addShuo{
    		    font-size: 2.8rem;
    position: fixed;
    width: 33%;
    height: 2.5rem;
    /* line-height: 2.5rem; */
    text-align: center;
    bottom: 6rem;
    left: 67%;
    display: flex;
    text-align: center;
    justify-content: center;
    align-items: center;
    	}
    	.addShuo span{
		    /* line-height: 2.5rem; */
		    text-align: center;
		    top: 15rem;
		    left: 26rem;
		    font-size: 4rem;
    display: flex;
    color: red;
    	}
    	#center-image{
    		margin-top: 1rem !important;
    		display: flex;
    		flex-direction: row;
    		flex-wrap: wrap;
    		justify-content: space-between;
    	}
    	#center-image a{
    		width: 49%;
		    height: 13rem;
		    border: 1px solid #ccc;
		    display: flex;
		    justify-content: center;
		    align-items: center;
		    overflow: hidden;
		    margin-bottom: 0.6rem;
		    background-size: cover;
    	}
    	#center-image a img{
    		width: 100%;
    		opacity: 0;
    	}
    </style>
</head>
<body>
	<div class="gd-bg">
		<!-- <i class="glyphicon glyphicon-cog"></i> -->
	</div>
	<div class="addShuo" style="width: 2.6rem;height:2.6rem;background: #332d46;border-radius: 50%;align-items: flex-start;color: #FFF;left: 80%;">
		<!-- <span style="font-size: 4rem;display: flex;" >+</span> -->
		<img src="/static/index/images/add_new.png" style="width: 70%;height: 70%;position: relative;top: 15%;">
	</div>
	<div class="gd-message-wrapper">
		<div class="gd-header">
			<div class="gd-header-left">
				<img src="<?php echo $userObj['header_img']; ?>" class="header">
				<span class="gd-header-nickname"><?php echo $userObj['user_name']; ?></span>
				<?php if($userObj['gender'] == 1): ?>
				<div class="gd-header-sex">
					<img src="/static/index/images/man_32.png">
				</div>
				<?php elseif($userObj['gender'] == 2): ?>
				<div class="gd-header-sex" style="background: #ff6565;">
					<img src="/static/index/images/woman_32.png">
				</div>
				<?php else: endif; ?>
			</div>
		</div>
		<input type="text" hidden="" value="<?php echo $userObj['user_id']; ?>" class="userId">
		
		<div class="gd-message">
			<div class="gd-message-child m-thumb">
				<span><?php echo $userObj['thumb_num']; ?></span>
				<span>点赞</span>
			</div>
			<div class="gd-message-child m-collect">
				<span><?php echo $giftCount; ?></span>
				<span>礼物</span>
			</div>
			<div class="gd-message-child m-subscribe">
				<span><?php echo $userObj['subed_num']; ?></span>
				<span>关注者</span>
			</div>
			<div class="gd-message-child m-subscribed">
					<span><?php echo $userObj['yanzhi']; ?></span>
				<span>我的研值</span>
			</div>
		</div>

		<div class="gd-type">
			<div class="gd-type-child" href="#center-moment" name="moments">
				<img src="/static/index/images/moments_80.png">
			</div>
			<div class="gd-type-child" href="#center-image" name="lattice">
				<img src="/static/index/images/lattice_80_blue.png">
			</div>
			<div class="gd-type-child" href="#center-friend" name="friend">
				<img src="/static/index/images/friend_80_blue.png">
			</div>
			<div class="gd-type-child" href="#center-subscribe" name="subscribe">
				<img src="/static/index/images/subscribe_80_blue.png">
			</div>
		</div>

		<div id="center-moment" class="center-content">
			<?php if(is_array($momentsObj) || $momentsObj instanceof \think\Collection || $momentsObj instanceof \think\Paginator): if( count($momentsObj)==0 ) : echo "" ;else: foreach($momentsObj as $key=>$value): ?>
			<div class="moment" uid="<?php echo $value['user_id']; ?>" mid="<?php echo $value['moment_id']; ?>" iscollect="<?php echo $value['is_collect']; ?>" see="<?php echo $value['see']; ?>">
				<div class="cc-header">
					<div class="cc-header-ctime">
						<?php echo $value['add_ts']; ?>
					</div>
					<div class="cc-header-xtime">
						<?php echo date('H:i', $value['add_ts_pre']); ?>
					</div>
					<div class="cc-header-see-icon glyphicon glyphicon-eye-open"></div>
					<div class="cc-header-see"><?php echo $value['read_num']; ?></div>
					<!-- <div class="cc-header-position-icon glyphicon glyphicon-map-marker"></div> -->
					<!-- <div class="cc-header-position">合肥</div> -->
				</div>
				<div class="moment-content"><!-- 文字内容 -->
					<?php echo $value['content']; ?>
				</div>

				<div class="moment-image"><!-- 图片部分 -->
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

				<!-- <div class="moment-comments">
					<div class="moment-comments-seeAll">
						查看全部5条评论
					</div>
					<div class="moment-comments-first">
						<span class="moment-comments-nickname">孙悟空</span><span>:</span><span class="moment-comments-content">没错，逗比就是我派去的。</span>
					</div>
					<div class="moment-comments-second">
						<span class="moment-comments-nickname">观音菩萨</span><span class="moment-comments-word-reply">回复</span><span class="moment-comments-nickname">孙悟空</span><span>:</span><span class="moment-comments-content">给你脸了是吧</span>
					</div>
				</div> -->

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
	        <?php endforeach; endif; else: echo "" ;endif; ?>
	        <div id="PullUp" class="scroller-pullUp" style="display: none;">
                <img style="width: 20px; height: 20px;" src="/static/index/images/rolling.svg" />
                <span id="pullUp-msg" class="pull-up-msg">正在刷新</span>
            </div>
			<div class="fill-bottom" style="height: 4.2rem;"></div>
		</div>
		<div id="center-image" month="" curPage="1" class="center-content" style="display: none;">
			<!-- <div class="imgCon clearfix" style="width: 100%;"> -->
			<!-- </div> -->
			<div class="fill-bottom" style="height: 4.7rem;width: 100%;"></div>
			<div id="PullUp_image" class="scroller-pullUp" style="display: none;">
                <img style="width: 20px; height: 20px;" src="/static/index/images/rolling.svg" />
                <span id="pullUp-msg-image" class="pull-up-msg">正在刷新</span>
            </div>
		</div>
		<div id="center-friend" class="center-content" style="display: none;">
			<div style="text-align: center;">
				<img src="/static/index/images/send949393.png" style="width: 15%;">
				<p>
					功能我的好友正在开发<br />
					预计：2018.01.01
					敬请期待
				</p>
			</div>
		</div>

		<div id="center-subscribe" class="center-content" style="display: none;">
			<div style="text-align: center;">
				<img src="/static/index/images/send949393.png" style="width: 15%;">
				<p>
					功能我的关注正在开发<br />
					预计：2018.01.01
					敬请期待
				</p>
			</div>
		</div>
	</div>


	<div class="gdp" style="display: none;">
		<div class="gdp-wrapper">
			<div class="gdp-wp">
				<!--<div class="gd-popover-operate" see="delete">
		        	删除此说说
		        </div>-->
		        <div class="gd-popover-operate" see="moment_see">
		        	仅自己可见
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
    <script type="text/javascript">
    	identity = <?php echo $identity; ?>;
    </script>
    <!-- <script type="text/javascript" src="/static/index/js/new/show_common.js"></script> -->
    <script type="text/javascript" src="/static/index/js/new/center.js?v=5"></script>
    <script type="text/javascript" src="/static/index/js/new/moment.js?v=1"></script>

    <script type="text/javascript">
    	$(function(){
    		$("#jia span").css("color","black");
    		$("#jia img").attr("src","/static/index/images/bars-b.png");
    		var identity = '<?php echo $identity; ?>';
    		$(".addShuo").click(function(){
    			 if (identity != 1) {
                    layer.msg('非会员不能发表说说');
                    window.location.href = '/index/user/payVip';
                    return false;
                }
    			window.location.href="<?php echo url('index/Moment/proMoment'); ?>";
    		})
    		$(".header").click(function(){
    			var userId=$(".userId").val();
    			window.location.href="<?php echo url('index/index/info'); ?>?user_id="+userId;
    		})

    	})
    	$(document).on('click', '.moment-image', function(){
    		window.location.href = '/index/see/seeMoment?mid='+$(this).parents('.moment').attr('mid');
    	});
    	function seeDetail(id){
    		window.location.href = '/index/see/seeMoment?mid='+id;
    	}
    </script>

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