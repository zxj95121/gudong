<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:93:"G:\phpstudy\phpstudy\WWW\anmo\public/../application/index\view\Default\index\binding-tel.html";i:1505748412;}*/ ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>绑定手机号</title>
<link href="<?php echo $base_path; ?>/css/style.css" type="text/css" rel="stylesheet">
<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
<script src="<?php echo $base_path; ?>/js/common.js"></script>
</head>

<body style="background:#f2f2f2;">

<!--头部-->
<div class="top">
  <div class="top-left"><a href="<?php echo url('/index/index/order'); ?>"><img src="<?php echo $base_path; ?>/images/icon-arrow-left.png"/></a></div>
  绑定手机号
</div>

<!-- 内容-->
<div class="b-tel">
   <div class="b-tel-t1"><input type="text" placeholder="请输入手机号"/></div>
   <div class="b-tel-t2 clear-fix"><input type="text" placeholder="请输入验证码"/><button>获取验证码</button></div>
</div>

<div class="btn-book b-tel-btn"><button>验证</button></div>

</body>
</html>
