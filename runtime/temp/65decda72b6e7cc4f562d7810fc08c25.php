<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:100:"D:\study_exe\xampp\htdocs\kuyuns\three\public/../application/index\view\Default\index\myComment.html";i:1510740248;s:88:"D:\study_exe\xampp\htdocs\kuyuns\three\public/../application/index\view\common\foot.html";i:1510724463;}*/ ?>
﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="stylesheet" type="text/css" href="/static/index/bootstrap/css/bootstrap.min.css">
     
    <link rel="stylesheet" type="text/css" href="/static/index/js/mui/dist/css/mui.min.css">
    <link rel="stylesheet" type="text/css" href="/static/index/bootstrap/css/basic.css">
    <title></title>
    <style type="text/css">
    </style>
</head>
<body>


    <header id="header" class="mui-bar mui-bar-nav">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" href="<?php echo url('index/index/center'); ?>" style="text-decoration: none;cursor: pointer;"></a>
        <h1 class="mui-title">我的评论</h1>
    </header>

    <div class="mui-content" style="background-color:#fff">
        <h5 style="margin: 0px;padding: 0.8rem 8px;" style="background-color:#efeff4">共 <span class="mui-badge mui-badge-primary mui-badge-inverted"><?php echo count($sayObj) + count($actObj); ?></span>个评论</h5>
        <ul class="mui-table-view mui-table-view-chevron">
            <h5 class="mui-content-padded">说说评论</h5>
            <?php if(is_array($sayObj) || $sayObj instanceof \think\Collection || $sayObj instanceof \think\Paginator): if( count($sayObj)==0 ) : echo "" ;else: foreach($sayObj as $key=>$value): ?>
            <li class="mui-table-view-cell mui-media">
                <a class="mui-navigate-right" href="<?php echo url('index/see/seeMoment'); ?>?mid=<?php echo $value['moment_id']; ?>">
                    <img class="mui-media-object mui-pull-left" src="<?php echo $value['img']; ?>">
                    <div class="mui-media-body">
                        <p style="text-overflow: ellipsis;overflow: hidden;white-space: nowrap;"><?php echo $value['mcontent']; ?></p>
                        <p class="mui-ellipsis"><?php echo $value['content']; ?></p>
                    </div>
                </a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; if(count($sayObj) > 0): ?>
            <h6 class="daodi" align="center" style="margin-top: 0.8em;">- 到底啦 -</h6>
            <!-- <li style="display: block;height: 50px;width: 100%;opacity: 0;">
                
            </li> -->
            <?php else: ?>
            <p style="text-align: center;margin-top: 40px;width: 100%;color: #8f8f94;">暂无说说评论</p>
            <?php endif; ?>

            <h5 class="mui-content-padded">活动评论</h5>

            <?php if(is_array($actObj) || $actObj instanceof \think\Collection || $actObj instanceof \think\Paginator): if( count($actObj)==0 ) : echo "" ;else: foreach($actObj as $key=>$value): ?>
            <li class="mui-table-view-cell mui-media">
                <a class="mui-navigate-right" href="<?php echo url('index/index/xiaoyou'); ?>?activity_id=<?php echo $value['activity_id']; ?>#comment">
                    <img class="mui-media-object mui-pull-left" src="<?php echo $value['img']; ?>">
                    <div class="mui-media-body">
                        <p style="text-overflow: ellipsis;overflow: hidden;white-space: nowrap;"><?php echo $value['activity_name']; ?></p>
                        <p class="mui-ellipsis"><?php echo $value['content']; ?></p>
                    </div>
                </a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; if(count($actObj) > 0): ?>
            <h6 class="daodi" align="center" style="margin-top: 0.8em;">- 到底啦 -</h6>
            <li style="display: block;height: 50px;width: 100%;opacity: 0;">
                
            </li>
            <?php else: ?>
            <p style="text-align: center;margin-top: 40px;width: 100%;color: #8f8f94;">暂无活动评论</p>
            <?php endif; ?>
        </ul>    
    </div>

    <div class="navBar" id=footer>
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
</div>

    <script type="text/javascript" src="/static/index/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/static/index/layer/layer.js"></script>
    <script type="text/javascript" src="/static/index/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        // var murl = '<?php echo url("index/moment/myMomentShow"); ?>'+'?mid=';
    </script>
    
    <script type="text/javascript">
        $(function(){
            var width = $('.mui-content').width();
            var height = document.documentElement.clientHeight;
            
            $('.daodi').hide();
        })

        window.onscroll = function(){
            if ($(window).scrollTop()) {
                $('.daodi').show();
            }
        }
    </script>
    
</body>
</html>

