<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"C:\wamp64\www\anmo\public/../application/index\view\Default\index\user.html";i:1505964578;}*/ ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>我的</title>
<link href="<?php echo $base_path; ?>/css/style.css" type="text/css" rel="stylesheet">
<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
<script src="<?php echo $base_path; ?>/js/common.js"></script>
</head>

<body style="background:#f2f2f2;">

<!--头部-->
   <div class="top">
      个人
   </div>

<!-- 内容-->
   <div class="user-head clear-fix">
      <div class="user-head-left clear-fix">
         <h1><?php echo $userInfo['user_name']; ?></h1><a href="<?php echo url('/index/index/user_info'); ?>"><img src="<?php echo $base_path; ?>/images/icon-arrow-right-big.png"/></a>
         <span><?php echo $userInfo['mobile']; ?></span>
      </div>
      <div class="user-head-right"><img src="<?php echo $userInfo['header_img']; ?>" style="border-radius: 50%;"/></div>
   </div>
   
   <div class="user-nav">
      <ul>
        <li class="clear-fix"><a href="user_wallet.html"><img src="<?php echo $base_path; ?>/images/user-icon01.png"/><span>我的钱包</span></a></li>
        <li class="clear-fix"><a href="user_coupon.html"><img src="<?php echo $base_path; ?>/images/user-icon02.png"/><span>我的优惠券</span></a></li>
        <li class="clear-fix"><a href="<?php echo url('/index/index/order'); ?>"><img src="<?php echo $base_path; ?>/images/user-icon03.png"/><span>我的订单</span></a></li>
        <li class="clear-fix"><a href="mall_order.html"><img src="<?php echo $base_path; ?>/images/user-icon04.png"/><span>积分商城订单</span></a></li>
        <li class="clear-fix"><a href="<?php echo url('/index/index/user_comment'); ?>"><img src="<?php echo $base_path; ?>/images/user-icon05.png"/><span>我的点评</span></a></li>
      </ul>
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
