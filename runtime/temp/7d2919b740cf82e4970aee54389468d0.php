<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"G:\phpstudy\phpstudy\WWW\anmo\public/../application/admin\view\Default\index\login.html";i:1505725394;}*/ ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="/static/common/css/style.css?v=0.1.3"/>
    <title></title>
</head>
<body style="overflow: hidden;">
   <div class="ky_login">
       <div class="login_box login_common"></div>
       <div class="login_content login_common">
           <div class="title">英语早教</div>
           <form action="<?php echo url('/admin/index/loginIn'); ?>" method="post">
           <div class="content">
               <ul class="clear-fix">
                   <div class="left">用户名：</div>
                   <div class="input"><input type="text" name="username"/></div>
               </ul>
               <ul class="clear-fix margin_top20">
                   <div class="left">密　码：</div>
                   <div class="input"><input type="password" name="password"/></div>
               </ul>
               <ul class="clear-fix margin_top20">
                   <div class="left">验证码：</div>
                   <div class="input" style="width:140px"><input type="text" name="check_code"/></div>
                   <img id="verify_img" src="<?php echo captcha_src(); ?>" alt="验证码">
               </ul>
               <div class="login_btn">
                   <input type="submit" class="sub" value="登录"/>
               </div>

           </div>
           </form>
       </div>


   </div>
</body>
<style type="text/css">
    #verify_img{
        width: 151px;
        position: relative;
        left: 214px;
        height: 32px;
        top:-32px;
    }
    .sub{
        width: 200px;
        height: 40px;
        text-align: center;
        line-height: 40px;
        background: green;
        border: 1px solid green;
        margin: 0 auto;
        display: block;
        color: #fff;
        letter-spacing: 5px;
        font-size: 24px;
        border-radius: 5px;
    }
    </style>
<script type="text/javascript" src="/static/common/js/jquery.min.js"></script>
<script>
    $('body').delegate('#verify_img','click',function(){
        $(this).attr('src',"<?php echo url('/captcha'); ?>?v="+Math.random()*1000);
    });

</script>
</html>

