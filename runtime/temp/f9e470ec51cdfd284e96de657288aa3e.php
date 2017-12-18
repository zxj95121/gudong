<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"G:\phpstudy\phpstudy\WWW\anmo\public/../application/index\view\Default\index\coin.html";i:1505747915;}*/ ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>我的卡币</title>
<link href="<?php echo $base_path; ?>/css/style.css" type="text/css" rel="stylesheet">
<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
<script src="<?php echo $base_path; ?>/js/common.js"></script>
</head>

<body style="background:#f2f2f2;">

<!--头部-->
<div class="top">
  <div class="top-left"><a href="mall.html"><img src="<?php echo $base_path; ?>/images/icon-arrow-left.png"/></a></div>
  我的积分
</div>

<!-- 内容-->
<div class="user-wallet">
   积分：<span>1200</span>
</div>
<div class="coin">
    <button>兑换</button>
    <a href="<?php echo url('/index/index/coin_detail'); ?>"><button>明细</button></a>
</div>

</body>
</html>
