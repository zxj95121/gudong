<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/index\view\Default\iPad\menu.html";i:1504533882;}*/ ?>

<html>
<head>
	<meta charset = "utf-8">
  <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport">
  <meta name="screen-orientation" content="portrait">
  <meta name="x5-orientation" content="portrait">
    <link rel="stylesheet" type="text/css" href="/static/iPad/css/style.css">
    <!--  <link rel="stylesheet" media="screen and (orientation:portrait)" href="portrait.css" />  竖屏-->
    <!--  <link rel="stylesheet" media="screen and (orientation:landscape)" href="landscape.css" />  横屏-->
	<title>菜单页面</title>

  <script type="text/javascript">
  </script>
</head>
    <body class="menu_body">
      <div class="menu_top clear-fix"><!--头部 start-->
          <p><?php echo $user; ?>,您好</p>
          <div class="header-right clear-fix">
            <a href="<?php echo url('/index/IPadLogin/loginOut'); ?>"><span>退出</span><img src="/static/iPad/img/exit.png" width="20" height="20" style="margin-top:10px;margin-right: 10px;"></a>
          </div>
      </div><!--头部end-->

     
      <a href="<?php echo url('/index/iPad/ceshi'); ?>" class="menu_img01">入学测试</a><!--入学测试-->
    	<a href="<?php echo url('/index/iPad/shangke'); ?>" class="menu_img02">日常上课</a><!--日常上课-->
    </body>
</html>