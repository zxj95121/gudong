<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"G:\phpstudy\phpstudy\WWW\anmo\public/../application/index\view\Default\index\order-comm.html";i:1505841085;}*/ ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>点评提交</title>
<link href="<?php echo $base_path; ?>/css/style.css" type="text/css" rel="stylesheet">
<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
<script src="<?php echo $base_path; ?>/js/common.js"></script>
</head>

<body style="background:#f2f2f2;">

<!--头部-->
<div class="top">
  <div class="top-left"><a href="<?php echo url('/index/index/order'); ?>"><img src="<?php echo $base_path; ?>/images/icon-arrow-left.png"/></a></div>
  点评提交
</div>

<!-- 内容-->
<div class="order-comm clear-fix">
    <input type="hidden" name="project_id" value="<?php echo $projectInfo['project_id']; ?>"><!--项目ID-->
    <input type="hidden" name="store_id" value="<?php echo $storeInfo['store_id']; ?>"><!--门店ID-->
    <input type="hidden" name="arrange_id" value="<?php echo $arrange_id; ?>"><!--预约ID-->
   <img src="<?php echo $projectInfo['project_ms']; ?>" height="77.45" /><h1><?php echo $projectInfo['project_name']; ?></h1>
</div>
<div class="order-comm-f">
   <textarea placeholder="分享您的消费心得" style="resize: none;outline: none" id="content"></textarea>
   <div class="order-comm-f-img"><img src="<?php echo $base_path; ?>/images/img07.png"/></div>
</div>
<div  class="order-comm-add clear-fix"><img src="<?php echo $base_path; ?>/images/icon06.png"/><h1><?php echo $storeInfo['store_name']; ?></h1></div>
<div  class="order-comm-add1 clear-fix">
   <h2>服务评价</h2>
   <div class="user-comment-right-ct2 order-comm-add1-star clear-fix">
        <img src="<?php echo $base_path; ?>/images/icon-star01.png"/>
        <img src="<?php echo $base_path; ?>/images/icon-star01.png"/>
        <img src="<?php echo $base_path; ?>/images/icon-star01.png"/>
        <img src="<?php echo $base_path; ?>/images/icon-star01.png"/>
        <img src="<?php echo $base_path; ?>/images/icon-star01.png"/>
    </div>
</div>

<div class="btn-book btn-book1"><a><button class="but">提交</button></a></div>

</body>
</html>
<script>
     var len;

    $('.user-comment-right-ct2').delegate('img','click', function(){

           len = ($(this).index())*1+1*1;

            $('.user-comment-right-ct2').empty();

            for(var i = 1;i<=len;i++){
                $('.user-comment-right-ct2').append("<img src='<?php echo $base_path; ?>/images/icon-star.png'/>");
            }
            for(var j = 1;j<=5-len;j++){
                $('.user-comment-right-ct2').append("<img src='<?php echo $base_path; ?>/images/icon-star01.png'/>");
            }
        })

        $('.but').click(function () {
            var content = $('#content').val();

            if(len == undefined || content == ''){
                alert('评价和评分不能为空');
            }else{

                var store_id = $('input[name="store_id"]').val();
                var project_id = $('input[name="project_id"]').val();
                var arrange_id = $('input[name="arrange_id"]').val();

            window.location.href="<?php echo url('/index/index/saveComment'); ?>?content="+content+"&star="+len+"&store_id="+store_id+"&project_id="+project_id+"&arrange_id="+arrange_id;
            }
        })

    </script>