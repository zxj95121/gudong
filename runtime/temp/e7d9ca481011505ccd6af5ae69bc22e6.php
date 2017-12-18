<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:96:"G:\phpstudy\phpstudy\WWW\anmo\public/../application/index\view\Default\index\mall-order-pay.html";i:1505750792;}*/ ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>确认购买</title>
<link href="<?php echo $base_path; ?>/css/style.css" type="text/css" rel="stylesheet">
<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
<script src="<?php echo $base_path; ?>/js/common.js"></script>
</head>

<body style="background:#f2f2f2;">

<!--头部-->
<div class="top">
  <div class="top-left"><a href="<?php echo url('/index/index/mall'); ?>"><img src="<?php echo $base_path; ?>/images/icon-arrow-left.png"/></a></div>
  确认购买
</div>

<!-- 内容-->
<p class="mall-order-pay-f">订单信息</p>
<div class="mall-order-pay-list">
   <div class="mall-order-pay-list-info clear-fix">
      <div class="mall-list-left"><img src="<?php echo $base_path; ?>/images/img08.png"/></div>
      <div  class="mall-order-pay-list-info-right">
         <h1>葛优躺（北京躺）电影足疗</h1>
         <div class="clear-fix"><span>￥298</span><em>3200积分</em></div>
         <h2>8-28 6:00-7:00</h2>
      </div>
   </div>
   <div class="mall-order-pay-list-sum">
      总计：￥<em>298</em>
   </div>
</div>

<div class="mall-order-pay-pai clear-fix">
   <h1>选择派送方式</h1><img src="<?php echo $base_path; ?>/images/icon-arrow-down.png"/>
</div>

<div class="mall-order-pay-weixin">
   <div class="mall-order-pay-weixin-img1"><img src="<?php echo $base_path; ?>/images/icon-weixin.png"/><span>微信支付</span></div>
   <div class="mall-order-pay-weixin-img2"><img src="<?php echo $base_path; ?>/images/icon-sele01.png"/></div>
</div>
<div class="mall-order-pay-weixin">
   <div class="mall-order-pay-weixin-img1"><img src="<?php echo $base_path; ?>/images/icon-jifen.png"/><span>积分支付</span></div>
   <div class="mall-order-pay-weixin-img2"><img src="<?php echo $base_path; ?>/images/icon-sele-none01.png"/></div>
</div>

<div class="btn-book btn-book1"><a><button>确认</button></a></div>

</body>
</html>
