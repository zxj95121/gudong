<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"G:\phpstudy\phpstudy\WWW\anmo\public/../application/index\view\Default\index\mall.html";i:1505822928;}*/ ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>商城</title>
<link href="<?php echo $base_path; ?>/css/style.css" type="text/css" rel="stylesheet">
<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
<script src="<?php echo $base_path; ?>/js/common.js"></script>
</head>

<body style="background:#f2f2f2;">

<!--头部-->
<div class="top">
  商城
</div>	

<!-- 内容-->
<div class="mall">
   <ul class="clear-fix">
      <!--<li><img src="images/icon01.png"/>常规服务</li>-->
      <li><img src="<?php echo $base_path; ?>/images/icon02.png"/>常规服务</li>
      <li><img src="<?php echo $base_path; ?>/images/icon04.png"/>增值服务</li>
      <li style="display:none;"><img src="<?php echo $base_path; ?>/images/icon03.png"/>增值服务</li>
      <li><img src="<?php echo $base_path; ?>/images/icon05.png"/>礼物商品</li>
      <li style="display:none;"><img src="<?php echo $base_path; ?>/images/icon005.png"/>礼物商品</li>
      <li style="border:none;"><a href="coin.html"><span>1320分</span>我的积分</a></li>
   </ul>
</div>

<div class="mall-list clear-fix">
   <div class="mall-list-left"><img src="<?php echo $base_path; ?>/images/img08.png"/></div>
   <div class="mall-list-right">
      <h1>葛优躺（北京躺）电影足疗</h1>
      <div class="clear-fix"><h2>积分：3600分</h2><a href="<?php echo url('/index/index/mall_order_pay'); ?>"><button>兑换</button></a></div>
   </div>
</div>
<div class="mall-list clear-fix">
   <div class="mall-list-left"><img src="<?php echo $base_path; ?>/images/img08.png"/></div>
   <div class="mall-list-right">
      <h1>葛优躺（北京躺）电影足疗</h1>
      <div class="clear-fix"><h2>积分：3600分</h2><button>兑换</button></div>
   </div>
</div> 
<div class="mall-list clear-fix">
   <div class="mall-list-left"><img src="<?php echo $base_path; ?>/images/img08.png"/></div>
   <div class="mall-list-right">
      <h1>葛优躺（北京躺）电影足疗</h1>
      <div class="clear-fix"><h2>积分：3600分</h2><button>兑换</button></div>
   </div>
</div> 
<div class="mall-list clear-fix">
   <div class="mall-list-left"><img src="<?php echo $base_path; ?>/images/img08.png"/></div>
   <div class="mall-list-right">
      <h1>葛优躺（北京躺）电影足疗</h1>
      <div class="clear-fix"><h2>积分：3600分</h2><a href="<?php echo url('/index/index/mall_order_pay'); ?>"><button>兑换</button></a></div>
   </div>
</div>   
   
<div style="height:4rem;width:100%;"></div>
<!--底部导航-->
<div class="navBar">
  <ul class="clear-fix">
     <li><a href="index.html"><img src="<?php echo $base_path; ?>/images/nav-home.png"/><span>首页</span></a></li>
     <li><a href="mall.html"><img src="<?php echo $base_path; ?>/images/nav-mall.png"/><span>商城</span></a></li>
     <li><a href="order.html"><img src="<?php echo $base_path; ?>/images/nav-order.png"/><span>订单</span></a></li>
     <li><a href="user.html"><img src="<?php echo $base_path; ?>/images/nav-user.png"/></a><span>我的</span></li>
  </ul>
</div>


</body>
</html>
