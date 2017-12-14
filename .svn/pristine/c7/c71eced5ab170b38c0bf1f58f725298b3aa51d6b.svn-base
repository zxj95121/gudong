<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:51:"C:\wamp64\www\gudong\thinkphp\tpl\dispatch_jump.tpl";i:1509962213;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=0.4, minimum-scale=0.4, maximum-scale=0.4, user-scalable=no" >
    <title>友情提示</title>
</head>
<style>
    .btn {
        filter: none;
        text-shadow: none;
        font-size: 18px;
        color: rgb(51, 51, 51);
        cursor: pointer;
        font-family: 微软雅黑;
        box-shadow: none;
        border-width: 0;
        border-image: initial;
        padding: 7px 20px;
        outline: none;
        border-radius: 0!important;
        color: white;
        text-shadow: none;
        background-color: #35aa47;
        border-radius: 5px!important;
    }
</style>
<body>
    <div style="text-align: center;padding-top: 150px;">
        <img src="/static/common/images/data_error.png" style="width:60%;"/>
        <div style="margin: 0 0;font-size:2.5rem;color:#888;">友情提示：<?php echo(strip_tags($msg));?></div>
        <div>
            <?php if($msg=='余额不足'): ?>
            <button class="btn" style="width:60%;font-size: 2.5rem;margin-top:4rem;background: #df3361;height:90px;line-height:46px;box-shadow: 2px 2px 6px #666;" onclick="window.location.href='<?php echo url('index/index/user_wallet'); ?>'">去充值</button>
            <?php endif; ?>
            <br/>
            <button class="btn" style="width:60%;font-size: 2.5rem;margin-top:4rem;background: #888;height:90px;line-height:46px;box-shadow: 2px 2px 6px #666;" onclick="window.location.href='<?php echo($url);?>'">返回上一页</button>
        </div>
    </div>
</body>
</html>
