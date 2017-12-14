<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:93:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/index\view\Default\IPadLogin\login.html";i:1504533868;}*/ ?>
<html>
<head>
	<meta charset = "utf-8">
  <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport">
  <meta name="screen-orientation" content="portrait">
  <meta name="x5-orientation" content="portrait">
    <link rel="stylesheet" type="text/css" href="/static/iPad/css/style.css">
    <title>登录页面</title>
    <style type="text/css">
        .captcha{float: right;width:230px;height: 7%;margin-top: 4%;width:45%;}
        .captcha img{width:100%;height:100%}
        .checkCode{width: 50%;height: 7%;border:1px solid #1cf377;margin-top: 4%;font-size: 18px;padding-left: 10px;}
        .clear{clear: both}
    </style>

  <script type="text/javascript">
  </script>
</head>
    <body class="login_body">
    	<div class="login_div01">

          <img src="/static/iPad/img/login_logo.png" width="25%" height="22.1%"><!--顶部logo-->
          <form action="<?php echo url('/index/IPadLogin/loginIn'); ?>" method="post"><!-- 登陆表单 start -->
          	<input type="text" name="username" class="username" value="<?php if(isset($username)): ?><?php echo $username; endif; ?>" placeholder="用户名"/>
          	<input type="password" name="password" class="pass" value="<?php if(isset($password)): ?><?php echo $password; endif; ?>"  placeholder="密码">
              <div style="width:100%;">
                  <input class="checkCode" type="text" name="check_code" placeholder="验证码"/>
                  <div class="captcha"><?php echo captcha_img(); ?></div>
              </div>
                <div class="clear"></div>

          	<input type="checkbox" name="remember" checked value="1" class="rember"><span class="span01">记住密码</span>

          	<input type="submit" name="sub" value="登录" class="sub">
          </form>
          <!-- 登陆表单 end -->

          <!--其他登陆方式 start-->
          <ul class="ul01">
          	<li><hr style=" background:#1cf377;height:1px;border:none;width: 100%;margin-top:5%;" /></li>
          	<li><a href="" style="width: 100px;text-decoration: none;color: #aaa;font-size: 16px;">其他登录方式</a></li>
          	<li><hr style="background:#1cf377;height:1px;border:none;width:100%;margin-top:5%;" /></li>
          </ul>
          <!--其他登陆方式 end-->

          <img src="/static/iPad/img/wenxin.png" width="38px" height="51px"><!--底部图片-->

    	</div>
    	
    </body>
<script type="text/javascript" src="/static/common/js/jquery.min.js"></script>
<script>
    $('.captcha').delegate('img','click',function(){
        $(this).attr('src',"<?php echo url('/captcha'); ?>?v="+Math.random()*1000);
    });
</script>

</html>