<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"C:\wamp64\www\gudong\public/../application/index\view\Default\index\index.html";i:1510122528;}*/ ?>
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
       	opacity: 0.2;
       }
      
    </style>
    <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
    <script src="/static/index/js/common.js"></script>
    <script src="/static/index/js/index.js"></script>
	<link href="/static/index/css/index.css" type="text/css" rel="stylesheet">
</head>
<body>
<!--<img src="images/index.jpg" style="" class="backg"></div>
-->	<div id="head">
		<img src="/static/index/images/timg3.png" alt="" />
		<p>YD</p>
		<span>PERFECT</span>
		<div class="box">
			<input type="button" value="参观" types="1" class="active">
			<input type="button" value="加入"types="2"/>
		</div>
	</div>
</body>
<script>
    $(function(){
    	$('.box>input').click(function(){
			var index=$(this).index();
			$(this).addClass('active').siblings().removeClass('active');
			if($(this).attr("types")==1){
				window.location.href="zhanshi.html"
			}
			else{
				window.location.href="login.html"
			}
		})
    })
</script>
</html>

