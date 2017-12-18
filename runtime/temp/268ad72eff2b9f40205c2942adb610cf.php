<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:94:"G:\phpstudy\phpstudy\WWW\anmo\public/../application/index\view\Default\index\user-comment.html";i:1505827605;}*/ ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>我的点评</title>
<link href="<?php echo $base_path; ?>/css/style.css" type="text/css" rel="stylesheet">
<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
<script src="<?php echo $base_path; ?>/js/common.js"></script>
</head>

<body style="background:#f2f2f2;">

<!--头部-->
<div class="top">
  <div class="top-left"><a href="<?php echo url('/index/index/user'); ?>"><img src="<?php echo $base_path; ?>/images/icon-arrow-left.png"/></a></div>
  我的点评
</div>

<!-- 内容-->


<?php foreach($userComment as $key=>$comment): ?>
    <div class="user-comment clear-fix">
      <div class="user-comment-img"><img src="<?php echo $comment['header_img']; ?>"/></div>
      <div class="user-comment-right">
         <div class="user-comment-right-ct1 clear-fix">
            <h1><?php echo $comment['project_name']; ?></h1><h2><?php echo date('Y-m-d',$comment['add_ts']); ?></h2>
         </div>
         <div class="user-comment-right-ct2 clear-fix star<?php echo $key+1; ?>" id="<?php echo $comment['star']; ?>">

         </div>
         <div class="user-comment-right-ct3"><?php echo $comment['content']; ?></div>
      </div>
    </div>
<?php endforeach; ?>



</body>
</html>
<script>
    var len = $('.user-comment').length;
    for (var i=1;i<=len;i++){
        var star = $('.star'+i+'').attr('id');
        for (var j=1;j<=star;j++){
            $('.star'+i+'').append("<img src='<?php echo $base_path; ?>/images/icon-star.png'/>");
        }
        for(var z=1;z<=5-star;z++){
            $('.star'+i+'').append("<img src='<?php echo $base_path; ?>/images/icon-star01.png'/>");
        }
    }

    </script>