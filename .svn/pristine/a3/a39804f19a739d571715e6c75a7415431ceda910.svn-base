<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:99:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/index\view\Default\parents\person_center.html";i:1504533881;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<link rel="stylesheet" href="<?php echo $base_path; ?>/Font-Awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo $base_path; ?>/css/common.css">
		<title>个人中心</title>
		<style>
			html,body{
				padding: 0;
				margin: 0;
				font-family: "微软雅黑";
				background: #f6f6f6;
				color: #6f6f6f;
			}
			p,img{padding: 0;margin: 0;}
			.center-bg{
				width:100%;
				height:9rem;
				background-image: url(<?php echo $base_path; ?>/img/center-bg.jpg);
				background-size: 100% 100%;
			}
			.bgLeft{
				width: 5rem;
			    height: 5rem;
			    border: 1px solid #ccc;
			    border-radius: 2.5rem;
			    position: absolute;
			    top: 5.6rem;
			    left: 2rem;
			}
			.touImg{
			    width: 100%;
			    height: 100%;
			    border-radius: 2.5rem;	
			}
			.ri{
				border: none;
				background: rgb(0,0,0,0) !important;
			}
			.name{
				width: 15rem;
			    font-size: 1.5rem;
			    position: absolute;
			    top: 6rem;
			    left: 8rem;
			}
			.jifen{
				width: 15rem;
			    font-size: 0.8rem;
			    position: absolute;
			    top: 8.3rem;
			    left: 8rem;
			    color: #ccc;
			}
			.cardNo{
				width: 15rem;
			    font-size:0.8rem;
			    position: absolute;
			    top: 9.6rem;
			    left: 8rem;
			   color: #f38266;
			}
			.center-top{
				background: white;
				margin:1rem 0 1rem 0;
				width:100%;
			}
			.item{
				width:100%;
				height:2.8rem;
				line-height: 2.8rem;
				border-bottom: 1px solid #ccc;
			}
			.center-top .item:last-child{
				border-bottom: none;
			}
			.item i{
				margin-left: 1rem;
			}
			.item span{
				margin-left: 0.5rem;
			}
			.item-right{
				float:right;
				margin-right: 1rem;
			}
			.center-con{
				background: white;
				width:100%;
			}
			.center-con .item:last-child{
				border-bottom: none;
			}
			.vipIcon{
			    float: left;
			    width: 1.3rem;
			    margin-left: 0.5rem;
			    margin-top: 0.5rem;	
			}
		</style>
		<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
	</head>
	<body>
		<div class="top-img">
			<!--<div class="back"><i class="fa  icon-angle-left icon-2x"></i></div>-->
			<div class="title"><p>个人中心</p></div>
			<!--<div class="add"><img src="<?php echo $base_path; ?>/img/saoma.png" width="100%"></div>-->
		</div>
		<div class="center-bg">
			<div class="bgLeft"><img src="<?php echo $base_path; ?>/img/HBuilder.png" class="touImg"></div>
			<div class="bgRight">
				<div class="name ri" >
					<p style="float: left;"><?php echo $userInfo['name']; ?></p>
					<img src="<?php echo $base_path; ?>/img/vip.png" class="vipIcon">
				</div>
				<div class="clear"></div>
				<div class="jifen ri" >积分：<span class="ji"><?php echo $userInfo['points']; ?></span></div>
				<div class="cardNo ri" >会员卡号：<span class="memCard"><?php echo $userInfo['user_number']; ?></span></div>
			</div> 
		</div>
		
		<div class="center-top">
			<div class="item">
				<i class="fa   icon-user-md" style="color:purple"></i><span>个人信息</span>
				<div class="item-right person-info"><i class="fa  icon-angle-right"></i></div>
			</div>
			<div class="item">
				<i class="fa   icon-user-md" style="color:greenyellow"></i><span>宝贝信息</span>
				<div class="item-right baby-info"><i class="fa  icon-angle-right"></i></div>
			</div>
		</div>
		
		<div class="center-con">
			<div class="item">
				<i class="fa  icon-credit-card" style="color:#4191aa"></i><span>充值中心</span>
				<div class="item-right chonzhi"><i class="fa  icon-angle-right"></i></div>
			</div>
			<div class="item">
				<i class="fa  icon-comments" style="color:#d2545f"></i><span>我要约课</span>
				<div class="item-right orderClass"><i class="fa  icon-angle-right"></i></div>
			</div>
			<div class="item">
				<i class="fa  icon-bell-alt" style="color:#c2ac47"></i><span>消息中心</span>
				<div class="item-right msgCenter"><i class="fa  icon-angle-right"></i></div>
			</div>
			<!--<div class="item">-->
				<!--<i class="fa   icon-bar-chart" style="color:#4277ce"></i><span>人机大战</span>-->
				<!--<div class="item-right machWar"></div>-->
			<!--</div>-->
		</div>
	</body>
	<script>
		$(function(){
            var memberNo=$(".memCard").html();
            $(".person-info").click(function(){
                window.location.href="person_info.html?userNo="+memberNo;
            })
            $(".baby-info").click(function(){
                window.location.href="child_info.html?userNo="+memberNo;
            })
            $(".chonzhi").click(function(){
                window.location.href="recharge_center.html?userNo="+memberNo;
            })
            $(".orderClass").click(function(){
                window.location.href="arrange.html?userNo="+memberNo;
            })
            $(".msgCenter").click(function(){
                window.location.href="msg_center.html?userNo="+memberNo;
            })
		})
	</script>
	<script src="<?php echo $base_path; ?>/js/common.js"></script>
</html>

