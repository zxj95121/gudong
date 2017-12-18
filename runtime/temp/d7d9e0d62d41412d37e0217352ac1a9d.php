<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:90:"D:\new_exe\xampp\htdocs\gudong\public/../application/index\view\Default\index_new\dao.html";i:1512038358;s:91:"D:\new_exe\xampp\htdocs\gudong\public/../application/index\view\Default\index_new\foot.html";i:1512288307;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>艺道家</title>
	<!-- <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css"> -->
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="/static/index/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/static/index/js/mui/dist/css/mui.min.css">
	<style type="text/css">
		body{
			padding-top: 15rem;
		}
		div{
			display: flex;
			width: 100%;
			flex-direction: column;
			justify-content: center;
			align-items: center;
		}
	</style>
</head>
<body>
	<div><div style="text-align: center;">
				<img src="/static/index/images/send949393.png" style="width: 15%;">
				<p>
					功能正在开发<br>
					2018.01.01 上线
					敬请期待
				</p>
			</div></div>
	<script type="text/javascript" src="/static/index/js/mui/dist/js/mui.min.js"></script>
	<nav class="mui-bar mui-bar-tab" style="z-index: 9999;background: white;height: 4.2rem;">
    <a class="mui-tab-item nav-a-bottom" id="yi" href="/index/index/zhanshi.html?c=0#user" style="border-right: 1px solid #eee;cursor: pointer;">
        <img src="/static/index/images/bars-o.png" />
        <span class="mui-tab-label" style="color: #666;
    font-size: 1.4rem;
    font-weight: 400;">艺</span>
    </a>
    <a class="mui-tab-item nav-a-bottom" id="dao" href="/index/index/dao.html" style="border-right: 1px solid #eee;cursor: pointer;">
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
</html>