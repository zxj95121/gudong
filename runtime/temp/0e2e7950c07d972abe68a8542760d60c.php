<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"G:\phpstudy\phpstudy\WWW\anmo\public/../application/index\view\Default\index\order.html";i:1505840882;}*/ ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>订单</title>
<link href="<?php echo $base_path; ?>/css/style.css" type="text/css" rel="stylesheet">
<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
<script src="<?php echo $base_path; ?>/js/common.js"></script>
</head>

<body style="background:#f2f2f2;">

<!--头部-->
<div class="top">
  <div class="top-left"><a href="user.html"><img src="<?php echo $base_path; ?>/images/icon-arrow-left.png"/></a></div>
   订单
</div>

<!-- 内容-->
<div class="order">
   <ul class="clear-fix">
      <li class="order-active" id="all">全部</li>
      <li id="fee">待消费</li>
      <li id="evaluate">待评价</li>
      <li id="complete">已完成</li>
   </ul>
</div>
<div class="showHide">
   <div class="all">
      <?php foreach($arrange as $item): ?>
         <div class="order-list">
            <div class="order-list-info clear-fix">
               <a href="<?php echo url('/index/index/order_detail'); ?>">
                <div class="order-list-info-left"><img src="<?php echo $item['project_ms']; ?>" width="200" height="200"/></div>
                <div class="order-list-info-right">
                   <div class="clear-fix"><h1><?php echo $item['project_name']; ?></h1><h2><?php echo $item['arrange_no']; ?></h2></div>
                   <h3>￥<?php echo $item['price']; ?></h3>
                   <div class="order-list-info-right-f2 clear-fix">
                      <img src="<?php echo $base_path; ?>/images/icon08.png"/>
                      <h4><?php echo date('m-d',$item['start_time']); ?> <?php echo date('H:i',$item['start_time']); ?></h4>
                   </div>
                   <div class="order-list-info-right-f3 clear-fix">
                      <img src="<?php echo $base_path; ?>/images/icon09.png"/><span><?php echo $item['store_address']; ?></span><em>>6km</em>
                   </div>
                </div>
               </a>
            </div>
            <div class="order-list-btn">
               <ul class="clear-fix">
                  <?php if($item['status'] == 1): ?>
                  <!--<li class="order-list-btn-comm"><a href="<?php echo url('/index/index/order_comm'); ?>?project_id=<?php echo $item['project_id']; ?>&store_id=<?php echo $item['store_id']; ?>"><button>评价</button></a></li>-->
                  <!--<li class="order-list-btn-re"><button>再来一单</button></li>-->
                  <?php elseif($item['status'] == 2): ?>
                  <li class="order-list-btn-comm"><a href="<?php echo url('/index/index/order_comm'); ?>?project_id=<?php echo $item['project_id']; ?>&store_id=<?php echo $item['store_id']; ?>&arrange_id=<?php echo $item['arrange_id']; ?>"><button>评价</button></a></li>
                  <li class="order-list-btn-re"><button>再来一单</button></li>
                  <?php else: ?>
                  <li class="order-list-btn-re"><button>再来一单</button></li>
                  <?php endif; ?>
               </ul>
            </div>
         </div>
     <?php endforeach; ?>
      <div style="height:4rem;width:100%;"></div>
   </div>
   <div class="fee"><!--代销费-->
      <?php foreach($arrange as $item): if($item['status'] == 1): ?>
      <div class="order-list">
         <div class="order-list-info clear-fix">
            <a href="<?php echo url('/index/index/order_detail'); ?>">
               <div class="order-list-info-left"><img src="<?php echo $item['project_ms']; ?>" width="200" height="200"/></div>
               <div class="order-list-info-right">
                  <div class="clear-fix"><h1><?php echo $item['project_name']; ?></h1><h2><?php echo $item['arrange_no']; ?></h2></div>
                  <h3>￥<?php echo $item['price']; ?></h3>
                  <div class="order-list-info-right-f2 clear-fix">
                     <img src="<?php echo $base_path; ?>/images/icon08.png"/>
                     <h4><?php echo date('m-d',$item['start_time']); ?> <?php echo date('H:i',$item['start_time']); ?></h4>
                  </div>
                  <div class="order-list-info-right-f3 clear-fix">
                     <img src="<?php echo $base_path; ?>/images/icon09.png"/><span><?php echo $item['store_address']; ?></span><em>>6km</em>
                  </div>
               </div>
            </a>
         </div>
         <div class="order-list-btn">
            <ul class="clear-fix">
               <!--<li class="order-list-btn-comm"><a href="<?php echo url('/index/index/order_comm'); ?>?project_id=<?php echo $item['project_id']; ?>&store_id={$item['store_id']&arrange_id=<?php echo $item['arrange_id']; ?>"><button>评价</button></a></li>-->
               <!--<li class="order-list-btn-re"><button>再来一单</button></li>-->
            </ul>
         </div>
      </div>
      <?php endif; endforeach; ?>
   </div>
   <div class="evaluate"><!--待评价-->
      <?php foreach($arrange as $item): if($item['status'] == 2): ?>
      <div class="order-list">
         <div class="order-list-info clear-fix">
            <a href="javascript:void(0)">
               <div class="order-list-info-left"><img src="<?php echo $item['project_ms']; ?>" width="200" height="200"/></div>
               <div class="order-list-info-right">
                  <div class="clear-fix"><h1><?php echo $item['project_name']; ?></h1><h2><?php echo $item['arrange_no']; ?></h2></div>
                  <h3>￥<?php echo $item['price']; ?></h3>
                  <div class="order-list-info-right-f2 clear-fix">
                     <img src="<?php echo $base_path; ?>/images/icon08.png"/>
                     <h4><?php echo date('m-d',$item['start_time']); ?> <?php echo date('H:i',$item['start_time']); ?></h4>
                  </div>
                  <div class="order-list-info-right-f3 clear-fix">
                     <img src="<?php echo $base_path; ?>/images/icon09.png"/><span><?php echo $item['store_address']; ?></span><em>>6km</em>
                  </div>
               </div>
            </a>
         </div>
         <div class="order-list-btn">
            <ul class="clear-fix">
               <li class="order-list-btn-comm"><a href="<?php echo url('/index/index/order_comm'); ?>?project_id=<?php echo $item['project_id']; ?>&store_id={$item['store_id']&arrange_id=<?php echo $item['arrange_id']; ?>"><button>评价</button></a></li>
               <li class="order-list-btn-re"><button>再来一单</button></li>
            </ul>
         </div>
      </div>
      <?php endif; endforeach; ?>
   </div>
   <div class="complete"><!--以完成-->
      <?php foreach($arrange as $item): if($item['status'] == 3): ?>
      <div class="order-list">
         <div class="order-list-info clear-fix">
            <a href="javascript:void(0)">
               <div class="order-list-info-left"><img src="<?php echo $item['project_ms']; ?>" width="200" height="200"/></div>
               <div class="order-list-info-right">
                  <div class="clear-fix"><h1><?php echo $item['project_name']; ?></h1><h2><?php echo $item['arrange_no']; ?></h2></div>
                  <h3>￥<?php echo $item['price']; ?></h3>
                  <div class="order-list-info-right-f2 clear-fix">
                     <img src="<?php echo $base_path; ?>/images/icon08.png"/>
                     <h4><?php echo date('m-d',$item['start_time']); ?> <?php echo date('H:i',$item['start_time']); ?></h4>
                  </div>
                  <div class="order-list-info-right-f3 clear-fix">
                     <img src="<?php echo $base_path; ?>/images/icon09.png"/><span><?php echo $item['store_address']; ?></span><em>>6km</em>
                  </div>
               </div>
            </a>
         </div>
         <div class="order-list-btn">
            <ul class="clear-fix">
               <!--<li class="order-list-btn-comm"><a href="<?php echo url('/index/index/order_comm'); ?>?project_id=<?php echo $item['project_id']; ?>&store_id={$item['store_id']&arrange_id=<?php echo $item['arrange_id']; ?>"><button>评价</button></a></li>-->
               <li class="order-list-btn-re"><button>再来一单</button></li>
            </ul>
         </div>
      </div>
      <?php endif; endforeach; ?>
   </div>
</div>

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
   $('.showHide>div').css({'display':'none'});
   $('.all').css({'display':'block'});

   $('.clear-fix>li').click(function () {
       $('.clear-fix>li').removeClass('order-active');
       $(this).addClass('order-active');

       var showId = $(this).attr('id');
       $('.showHide>div').hide();
       $(".showHide>."+showId).show();
   })
</script>