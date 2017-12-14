<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"C:\wamp64\www\gudong\public/../application/admin\view\Default\index\login.html";i:1509674785;}*/ ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title><?php echo (isset($web_title) && ($web_title !== '')?$web_title:''); ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- 全局样式 -->
    <link href="/static/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="/static/admin/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- 全局样式结束 -->
    <!-- 登陆页样式 -->
    <link href="/static/admin/css/login-soft.css" rel="stylesheet" type="text/css"/>
    <!-- 登陆页结束样式 -->
    <link rel="shortcut icon" href="/static/admin/image/favicon.ico" />
</head>
<body class="login">
<div class="logo">
    <!-- <img src="/static/admin/image/logo-big.png" alt="" />  -->
</div>
<div class="content">
    <form class="form-vertical login-form"  method='post' action='<?php echo url('admin/Index/loginIn'); ?>'>
    <h3 class="form-title">登录到您的帐户</h3>
    <div class="alert alert-error hide">
        <button class="close" data-dismiss="alert"></button>
        <span>输入任何用户名和密码。</span>
    </div>
    <div class="control-group">
        <div class="controls">
            <div class="input-icon left">
                <i class="icon-user"></i>
                <input class="m-wrap " type="text" placeholder="用户名" name="username" style="-webkit-user-select: auto !important;" />
            </div>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <div class="input-icon left">
                <i class="icon-lock"></i>
                <input class="m-wrap " type="password" placeholder="密码" name="password" style="-webkit-user-select: auto !important;" />
            </div>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <div class="input-icon left">
                <i class="icon-lock"></i>
                <input class="m-wrap" style='width:30%;float:left;-webkit-user-select: auto !important;' type="text" placeholder="验证码" name="check_code"/>
                <img src="<?php echo captcha_src(); ?>" alt="" style="margin-left:10%;width:40%;height:34px;" onclick="this.src='<?php echo captcha_src(); ?>?d='+Math.random();" >
            </div>
        </div>
    </div>
    <div class="control-group" style='color:#fdd'>
        <?php switch(\think\Request::instance()->param('error')): case "1": ?>
        验证码错误！！！
        <?php break; case "2": ?>
        用户密码错误！！！
        <?php break; case "4": ?>
        登陆超时
        <?php break; case "5": ?>
        被顶出
        <?php break; endswitch; ?>
    </div>
    <button type="submit" class="btn red btn-block">
        <div style='float:left;width:60%;padding-left:19%'>
            登录
        </div>
        <div class="m-icon-swapright m-icon-white" style="float:right"></div>
    </button>
    </form>
</div>
<div class="copyright">
    2017 © Power by 库云网络 <a href='http://www.kuyunnet.com/' target='_blank' style='color:#0a3b54'> Kuyun</a>
</div>
<!-- 核心插件 -->
<script src="/static/admin/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="/static/admin/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="/static/admin/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="/static/admin/js/bootstrap.min.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="/static/admin/js/excanvas.min.js"></script>
<script src="/static/admin/js/respond.min.js"></script>
<![endif]-->
<script src="/static/admin/js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/static/admin/js/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/static/admin/js/jquery.cookie.min.js" type="text/javascript"></script>
<script src="/static/admin/js/jquery.uniform.min.js" type="text/javascript" ></script>
<script src="/static/admin/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/static/admin/js/jquery.backstretch.min.js" type="text/javascript"></script>
<!-- 页面级别的插件结束 -->
<!-- 页面级别的脚本-->
<script src="/static/admin/js/app.js" type="text/javascript"></script>
<script src="/static/admin/js/login-soft.js" type="text/javascript"></script>
<!-- 页面级别脚本 -->
<script>
    jQuery(document).ready(function() {
        App.init();
        //Login.init();
    });
</script>
</body>
</html>