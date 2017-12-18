<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"G:\phpstudy\phpstudy\WWW\anmo\public/../application/index\view\Default\index\index.html";i:1505926281;}*/ ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>首页</title>
<link href="<?php echo $base_path; ?>/css/style.css" type="text/css" rel="stylesheet">
<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
<script src="<?php echo $base_path; ?>/js/common.js"></script>
</head>

<body style="background:#f2f2f2;">

<!--头部-->
<div class="top">
  首页
</div>

<!-- 内容-->
<div class="index-store">
   <div class="index-store-tl clear-fix">
      <h1>附近门店</h1><h2><a href="store.html">查看全部&nbsp;>></a></h2>
   </div>

   <div class="index-store-ct clear-fix">
      <a href="<?php echo url('/index/index/store_detail'); ?>?store_id=<?php echo $storeInfo['store_id']; ?>">
          <div class="index-store-ct-left">
             <img src="<?php echo $storeInfo['img']; ?>" style="height: 77.45px;"/>
          </div>
          <div class="index-store-ct-right">
             <div class="index-store-ct-right-tl clear-fix">
                <h1><?php echo $storeInfo['store_name']; ?></h1>
                <h2>新店促销</h2>
             </div>
             <div class="user-comment-right-ct2 clear-fix" id="<?php echo $storeInfo['star']; ?>">

             </div>
             <div class="index-store-ct-right-add clear-fix">
                <img src="<?php echo $base_path; ?>/images/icon09.png"/><span><?php echo $storeInfo['store_address']; ?></span><em>6.5km</em>
             </div>
          </div>
      </a>
   </div>

</div>
  
<div class="index-ct">
   <div class="index-ct-nav">
      <ul class="clear-fix">
         <li class="index-active" id="0">全部项目</li>
         <?php foreach($typeInfo as $type): ?>
         <li id="<?php echo $type['type_id']; ?>"><?php echo $type['name']; ?></li>
         <?php endforeach; ?>
      </ul>
   </div>
   <div class="showHide">
      <div class="index-ct-list all">
         <ul>
            <?php foreach($projectInfo as $project): ?>
               <li class="index-ct-list-item1 clear-fix" style="background: url(<?php echo str_replace('\\','\/',$project['project_ms'])?>) no-repeat;">
                  <div class="index-ct-list-item1-left">
                     <h1><?php echo $project['project_name']; ?></h1><h2>￥<?php echo $project['price']; ?>/人</h2><h3>全店通用</h3>
                  </div>
                  <div class="<?php if($project['is_have']==1): ?>index-ct-list-item1-right<?php else: ?>index-ct-list-item1-right1<?php endif; ?>">
                     <a href="<?php if($project['is_have']==1): ?><?php echo url('/index/index/product_detail'); else: ?>javascript:void(0)<?php endif; ?>">
                        <button style="outline:none">立即<br/>预约</button>
                     </a>
                  </div>
               </li>
            <?php endforeach; ?>

         </ul>
      </div>
   </div>
</div>
   
<div style="height:4rem;width:100%;"></div>
<!--底部导航-->
<div class="navBar">
  <ul class="clear-fix">
     <li><a href="index.html"><img src="<?php echo $base_path; ?>/images/nav-home.png"/><span>首页</span></a></li>
     <li><a href="mall.html"><img src="<?php echo $base_path; ?>/images/nav-mall.png"/><span>商城</span></a></li>
     <li><a href="order.html"><img src="<?php echo $base_path; ?>/images/nav-order.png"/><span>订单</span></a></li>
     <li><a href="user.html"><img src="<?php echo $base_path; ?>/images/nav-user.png"/></a><span>我的</span></li>
  </ul>
</div>
</body>
</html>
<script>
   $('.clear-fix>li').removeClass('index-active');
   $('.clear-fix>li').eq(<?php echo $action; ?>).addClass('index-active');

$('.all').show();
$('.pro').hide();
$('.clear-fix>li').click(function () {
    var action = $(this).index();
    var id = $(this).attr('id');
    var store_id = <?php echo $storeInfo['store_id']; ?>;
    window.location.href="<?php echo url('/index/index/index'); ?>?id="+id+"&store_id="+store_id+"&action="+action;
})


    var star = $('.user-comment-right-ct2').attr('id');
    for (var j=1;j<=star;j++){
        $('.user-comment-right-ct2').append("<img src='<?php echo $base_path; ?>/images/icon-star.png'/>");
    }
    for(var z=1;z<=5-star;z++){
        $('.user-comment-right-ct2').append("<img src='<?php echo $base_path; ?>/images/icon-star01.png'/>");
    }

</script>
