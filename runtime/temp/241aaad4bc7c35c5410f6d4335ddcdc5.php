<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"G:\phpstudy\phpstudy\WWW\anmo\public/../application/index\view\Default\index\mall-order.html";i:1505745388;}*/ ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>订单</title>
<link href="<?php echo $base_path; ?>/css/style.css" type="text/css" rel="stylesheet">
<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
<script src="<?php echo $base_path; ?>/js/common.js"></script>
</head>

<body style="background:#f2f2f2;">

<!--头部-->
<div class="top">
  <div class="top-left"><a href="<?php echo url('/index/index/user'); ?>"><img src="<?php echo $base_path; ?>/images/icon-arrow-left.png"/></a></div>
  订单
</div>

<!-- 内容-->
<div class="mall-order">
   <ul class="clear-fix">
     <li class="mall-order-active">基础服务</li>
     <li>增值服务</li>
     <li>礼物商品</li>
   </ul>
</div>

<div class="order-list">
   <div class="order-list-info clear-fix">
      <a href="">
       <div class="order-list-info-left"><img src="<?php echo $base_path; ?>/images/img09.png"/></div>
       <div class="order-list-info-right">
          <div class="clear-fix"><h1>中式古法推拿</h1><h2>20170625118</h2></div>
          <h3>￥1200</h3>
          <div class="order-list-info-right-f2 clear-fix"><img src="<?php echo $base_path; ?>/images/icon08.png"/><h4>8-26 16:26</h4></div>
          <div class="order-list-info-right-f3 clear-fix">
             <img src="<?php echo $base_path; ?>/images/icon09.png"/><span>上海市普陀区中江路3660号</span><em>>6km</em>
          </div>
       </div>
      </a>
   </div>
   <div class="order-list-btn">
      <ul class="clear-fix">
         <li class="order-list-btn-comm"><button>付款</button></li>
      </ul>
   </div>
</div>

<div class="order-list">
   <div class="order-list-info clear-fix">
      <a href="mall-order-detail.html">
       <div class="order-list-info-left"><img src="<?php echo $base_path; ?>/images/img09.png"/></div>
       <div class="order-list-info-right">
          <div class="clear-fix"><h1>中式古法推拿</h1><h2>20170625118</h2></div>
          <h3>￥1200</h3>
          <div class="order-list-info-right-f2 clear-fix"><img src="<?php echo $base_path; ?>/images/icon08.png"/><h4>8-26 16:26</h4></div>
          <div class="order-list-info-right-f3 clear-fix">
             <img src="<?php echo $base_path; ?>/images/icon09.png"/><span>上海市普陀区中江路3660号</span><em>>6km</em>
          </div>
       </div>
      </a>
   </div>
   <div class="order-list-btn">
      <ul class="clear-fix">
         <li class="order-list-btn-comm"><button>评价</button></li>
      </ul>
   </div>
</div>

</body>
</html>
