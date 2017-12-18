<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:90:"D:\new_exe\xampp\htdocs\gudong\public/../application/index\view\Default\index\xiaoyou.html";i:1511838420;s:80:"D:\new_exe\xampp\htdocs\gudong\public/../application/index\view\common\foot.html";i:1512286988;}*/ ?>
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
        .mot li{
            cursor: pointer;
        }
       .comment_span{
            display: inline-block;
            height: 100%;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            font-size: 0.8em;
        }
        .comment_left{
            width: 30%;
            text-align: left;
            color: #807979;
        }
        .comment_right{
            width: 70%;
            color: #756a6a;
            text-align: center;
        }
        .sp{
            font-size: 0.9em;
        }
        .sp1{
            color: #58AAED;
        }
    </style>
    <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
    <script src="/static/index/js/common.js"></script>
	<link href="/static/index/css/xiaoyou.css" type="text/css" rel="stylesheet">
    <!-- <link href="/static/index/css/style.css" type="text/css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="/static/index/js/mui/dist/css/mui.min.css">
    <link rel="stylesheet" type="text/css" href="/static/index/bootstrap/css/basic.css">
</head>

<body>
	<!--<img src="images/xiaoyou.jpg" style="" class="backg">-->

<div class="mui-content" style="background-color:#fff" id="muiContent">
	<div id="head" aid="<?php echo $activity['activity_id']; ?>">
		<div class="top">
			<a class="return" href="<?php echo url('index/index/zhanshi'); ?>#activity" style="cursor: pointer;"><img src="/static/index/images/timg4.png"  alt="" / class="act"></a>
			<span>活动页</span>
            <?php foreach($activity['img'] as $key=>$img): if($key<1): ?>
            <a href=""><img src="<?php echo substr($img,1)?>" alt="" / class="img"></a>
            <?php endif; endforeach; ?>

			<a href=""><img hidden="hidden" src="/static/index/images/timg12.png" alt="" / class="asd"></a>
		</div>

		<ul class="mot" style="margin-top: 14px;">
			<li style="">
				<p id="pingNum"><?php echo $comment; ?></p>
				<span>评论</span>
                </a>
			</li>
			<li>
				<p id="collectNum"><?php echo $collection; ?></p>
				<span>收藏</span>
			</li>
			<li>
				<p id="thumbNum"><?php echo $activity['thumbs']; ?></p>
				<span>点赞</span>
            </li>
		</ul>

        <div class="bottom" style="border-bottom: 0px solid transparent;height: auto;padding: 0px 5px;">
            <p style="font-size: 1.3em;color: #000;"><?php echo $activity['activity_name']; ?></p>
            <span><?php echo $activity['content']; ?></span>
        </div>
	</div>
	<div class="browse">
		<ul>
			<li style="width: 100%;height: auto;margin-left: 0px;">

                <?php foreach($activity['img'] as $img): ?>
                <div class="box" style="width: 50%;float: left;padding: 10px 8px;"><img src="<?php echo substr($img,1)?>" alt="" /></div>
                <?php endforeach; ?>
			</li>

		</ul>
	</div>

    <?php 
        if ($activity['type'] == 1) 
            $take_part_in_url = '/index/activity/redPack?aid='.$activity['activity_id']; 
        else if ($activity['type'] == 2)
            $take_part_in_url = '/index/activity/sendGift?aid='.$activity['activity_id'];
        else
            $take_part_in_url = '#';
         ?>

    <!-- 只有活动为类型1才显示 -->
    <?php if($activity['type'] != 0): ?>
    <div style="width: 100%;display: flex;justify-content: center;padding-bottom: 5px;">
        <div class="mui-btn mui-btn-primary" style="width: 40%;cursor: pointer;" onclick="window.location.href='<?php echo $take_part_in_url; ?>';">
            立即参与
        </div>
    </div>
    <?php endif; ?>

        

    <div style="display: flex;flex-direction: row;justify-content: flex-end;margin-top: 10px;padding-bottom: 10px;">
        <?php 
            if ($operates['is_thumb']){ $zanStr[0] = 'primary'; $zanStr[1] = 'white'; }
            else { $zanStr[0] = 'default'; $zanStr[1] = 'black';}
         
            if ($operates['is_collect']){ $shouStr[0] = 'primary'; $shouStr[1] = 'white'; }
            else { $shouStr[0] = 'default'; $shouStr[1] = 'black';}
         ?>
        <span class="mui-badge mui-badge-<?php echo $zanStr[0]; ?> thumb" style="cursor: pointer;margin-right: 5px;"><img src="/static/index/images/zan16<?php echo $zanStr[1]; ?>.png" style="width: 12px;height: 12px;"> <span class="num"><?php echo $activity['thumbs']; ?></span></span> 
        <span class="mui-badge mui-badge-default ping" style="cursor: pointer;margin-right: 5px;"><img src="/static/index/images/ping16black.png" style="width: 12px;height: 12px;"> <span class="num"><?php echo $comment; ?></span></span> 
        <span class="mui-badge mui-badge-<?php echo $shouStr[0]; ?> collect" style="cursor: pointer;margin-right: 5px;"><img src="/static/index/images/star16<?php echo $shouStr[1]; ?>.png" style="width: 12px;height: 12px;"> <span class="num"><?php echo $collection; ?></span></span>
    </div>
</div>
    <ul class="mui-table-view" id="comment_ul">
        <?php if(count($commentObj)>0): ?>
        <li class="mui-table-view-divider" style="font-size: 0.8em;">评论详情</li>
        <?php else: ?>
        <li class="mui-table-view-divider" style="font-size: 0.8em;">暂无评论</li>
        <?php endif; foreach($commentObj as $value): ?>
        <li class="mui-table-view-cell mui-collapse" cid="<?php echo $value['id']; ?>">
            <a class="mui-navigate-right" href="#">
                <span class="comment_left comment_span"><?php echo $value['user_name']; ?></span>
                <span class="mui-badge mui-badge-success">1</span>
            </a>
            <div class="mui-collapse-content">
                <p>
                    <span class="sp1 sp"><?php echo $value['user_name']; ?></span>：
                    <span class="sp2 sp"><?php echo $value['content']; ?></span>
                </p>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>

    <li style="display: block;height: 3.5rem;width: 100%;opacity: 0;">
                
    </li>
    <!-- <div class="navBar" id=footer>
    <ul class="clear-fix">
        <li style="width: 50%;">
        	<a href="/index/index/zhanshi.html">
        		<img src="/static/index/images/home.png" style="vertical-align: inherit;">
        		<span>校友/活动</span>
        	</a>
        </li>
        <li class="navBar-active" style="width: 50%;">
        	<a href="/index/index/center.html">
        		<img src="/static/index/images/emo.png" style="vertical-align: inherit;">
        		<span>个人中心</span>
        	</a>
        </li>
    </ul>
</div> -->
<nav class="mui-bar mui-bar-tab" style="z-index: 9999;background: white;height: 4.2rem;">
    <a class="mui-tab-item nav-a-bottom" id="yi" href="/index/index/zhanshi.html?c=0#user" style="border-right: 1px solid #eee;cursor: pointer;">
        <span class="mui-tab-label" style="color: #666;
    font-size: 1.4rem;
    font-weight: 400;">艺</span>
    </a>
    <a class="mui-tab-item nav-a-bottom" id="dao" href="/index/index/zhanshi.html?c=2#activity" style="border-right: 1px solid #eee;cursor: pointer;">
        <span class="mui-tab-label" style="color: #666;
    font-size: 1.4rem;
    font-weight: 400;">道</span>
    </a>
    <a class="mui-tab-item nav-a-bottom" id="jia" href="/index/index/center.html" style="cursor: pointer;">
        <span class="mui-tab-label" style="color: #666;
    font-size: 1.4rem;
    font-weight: 400;">家</span>
    </a>
</nav>
<style>
	.mui-tab-item{
		height: 4.2rem !important;
	}
</style>
<script type="text/javascript">
    mui('body').on('tap','.nav-a-bottom',function(){
        document.location.href=this.href;
    });
</script>
</body>
    <script type="text/javascript" src="/static/index/layer/layer.js"></script>
    <script type="text/javascript" src="/static/index/js/mui/dist/js/mui.min.js"></script>
    <script type="text/javascript">
        $(function(){
            aid = <?php echo $aid; ?>;
            thumbUrl = '<?php echo url("index/activity/thumb"); ?>';
            collectUrl = '<?php echo url("index/activity/collect"); ?>';
            commentUrl = '<?php echo url("index/activity/comment"); ?>';
            identity = <?php echo $identity; ?>;//当前访问者的身份
            uid = '<?php echo $uid; ?>';//当前访问者的身份
            operates = new Array();
            operates['is_thumb'] = '<?php echo $operates['is_thumb']; ?>';
            operates['is_collect'] = '<?php echo $operates['is_collect']; ?>';
        })
    </script>
    <script>

    $(function(){
     //       $(".return").click(function(){
    	// 	window.location.href="zhanshi.html"
    	// })
        $('#yi').click(function(){
            window.location.href="/index/index/zhanshi.html#user";
        })
        $('#dao').click(function(){
            window.location.href="/index/index/zhanshi.html#activity";
        })
        $('#jia').click(function(){
            window.location.href="/index/index/center";
        })
        $(document).on('touchstart', '#yi', function(){
            window.location.href="/index/index/zhanshi.html#user";
        })
        $(document).on('touchstart', '#dao', function(){
            window.location.href="/index/index/zhanshi.html#activity";
        })
        $(document).on('touchstart', '#jia', function(){
            window.location.href="/index/index/center";
        })

        var hash = window.location.hash;
        if (hash == '#center') {
            $('.return').attr('href', '<?php echo url('index/index/center'); ?>');
        } else if (hash == '#comment') {
            $('.return').attr('href', '<?php echo url('index/moment/myComment'); ?>');
        }

        //点赞
        $('.thumb').click(function(){
            var count = parseInt($(this).find('.num').html().trim());
            if (!identity) {
                layer.msg('尚未注册，无法点赞。', {time: 1000});
                layer.confirm('尚未注册，无法点赞。是否现在去注册？', {
                    btn: ['确认','取消'] //按钮
                }, function(index){
                    layer.close(index);
                    window.location.href = '<?php echo url("index/index/login"); ?>';
                }, function(index){
                    layer.close(index);
                });
                return false;
            }
            var dom = $(this).find('.num');
            var prevNumber = count;

            var type = 1;//给活动点赞
            //发ajax
            $.ajax({
                url: thumbUrl,
                type: 'post',
                dataType: 'json',
                data: {
                    type: type,
                    aid: $('#head').attr('aid')
                },
                success: function(data) {
                    if (data.errcode == 0) {
                        dom.html(prevNumber+data.jia);
                        $('#thumbNum').html(prevNumber+data.jia);
                        dom.parent().removeClass('mui-badge-default').addClass('mui-badge-primary');
                        dom.prev().attr('src', '/static/index/images/zan16white.png');
                    }
                },
                error: function() {
                }
            })
        })

        $('.collect').click(function(){
            var count = parseInt($(this).find('.num').html().trim());
            if (!identity) {
                layer.msg('尚未注册，无法收藏。', {time: 1000});
                layer.confirm('尚未注册，无法收藏。是否现在去注册？', {
                    btn: ['确认','取消'] //按钮
                }, function(index){
                    layer.close(index);
                    window.location.href = '<?php echo url("index/index/login"); ?>';
                }, function(index){
                    layer.close(index);
                });
                return false;
            }
            if (identity == 2) {
                // layer.msg('非会员不能收藏');
                layer.confirm('您不是付费会员，无法收藏。是否查看付费详情？', {
                    btn: ['确认','取消'] //按钮
                }, function(index){
                    layer.close(index);
                    window.location.href = '<?php echo url("index/user/payVip"); ?>';
                }, function(index){
                    layer.close(index);
                });
                return false;
            }
            var dom = $(this).find('.num');
            var prevNumber = count;

            //发ajax
            $.ajax({
                url: collectUrl,
                type: 'post',
                dataType: 'json',
                data: {
                    aid: $('#head').attr('aid')
                },
                success: function(data) {
                    if (data.errcode == 0) {
                        dom.html(prevNumber+1);
                        $('#collectNum').html(prevNumber+1);
                        dom.parent().removeClass('mui-badge-default').addClass('mui-badge-primary');
                        dom.prev().attr('src', '/static/index/images/star16white.png');
                    } else if (data.errcode == 3) {
                        layer.msg('您已经收藏过了');
                    }
                },
                error: function() {
                }
            })
        })


        $('.ping').click(function(){
            if (!identity) {
                layer.msg('尚未注册，无法评论。', {time: 1000});
                layer.confirm('尚未注册，无法评论。是否现在去注册？', {
                    btn: ['确认','取消'] //按钮
                }, function(index){
                    layer.close(index);
                    window.location.href = '<?php echo url("index/index/login"); ?>';
                }, function(index){
                    layer.close(index);
                });
                return false;
            }
            if (identity == 2) {
                // layer.msg('非会员不能评论!');
                layer.confirm('您不是付费会员，无法评论。是否查看付费详情？', {
                    btn: ['确认','取消'] //按钮
                }, function(index){
                    layer.close(index);
                    window.location.href = '<?php echo url("index/user/payVip"); ?>';
                }, function(index){
                    layer.close(index);
                });
                return false;
            }
            var dom = $(this).find('.num');
            var prevNumber = parseInt(dom.html().trim());

            //弹框输入评论
            var btnArray = ['取消', '评论'];
            mui.prompt('请输入你的评论：', '你的评论', '', btnArray, function(e) {
                if (e.index == 0) {
                    // console.log('谢谢你的评语：' + e.value);
                } else {
                    if (e.value == '') {
                        layer.msg('评论不能为空');
                    }
                    $.ajax({
                        url: commentUrl,
                        type: 'post',
                        dataType: 'json',
                        data: {
                            msg: e.value.trim(),
                            aid: aid
                        },
                        success: function(data) {
                            if (data.errcode == 0) {
                                layer.msg('评论成功', {time: 1000});
                                $('#comment_ul').append('<li class="mui-table-view-cell mui-collapse mui-active" cid="'+data.cid+'"> <a class="mui-navigate-right" href="#"> <span class="comment_left comment_span">'+data.name+'</span> <span class="mui-badge mui-badge-success">1</span> </a> <div class="mui-collapse-content"> <p> <span class="sp1 sp">'+data.name+'</span>： <span class="sp2 sp">'+e.value+'</span> </p> </div> </li>');
                                dom.html(prevNumber+1);
                                $('#pingNum').html(prevNumber+1);
                            }
                        }
                    })
                }
            })
        })
    });
</script>
</html>

