<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:99:"D:\new_exe\xampp\htdocs\gudong\public/../application/index\view\Default\index_new\zhanshi_load.html";i:1513414502;}*/ ?>
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