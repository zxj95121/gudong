<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:101:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/index\view\Default\parents\recharge_center.html";i:1504533869;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<link rel="stylesheet" href="<?php echo $base_path; ?>/Font-Awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo $base_path; ?>/css/common.css">
		<title>充值中心</title>
		<style>
			html,body{
				padding: 0;
				margin: 0;
				font-family: "微软雅黑";
				background: white;
				color: #6f6f6f;
			}
			p,img{padding: 0;margin: 0;}
			.home-top{
				width: 100%;
				background: white;
				margin:1rem 0 1rem 0;
			}
			.item{
				width:84%;
				height:2rem;
				margin-left: 8%;
				line-height: 2rem;
			}
			.item-right{
				float: right;
			}
			.item-right i{color: #ccc;}
			.scan{
				    width: 1.8rem;
			    height: 1.8rem;
			    margin-top: 0.5rem;
			    border-radius: 0.9rem;
			}
			.home-mid{
				background: white;
				width: 100%;
				margin-bottom: 1rem;
			}
			.home-mid .item{
				width:100%;
				margin-left: 0;
			}
			.home-mid .item span{
				margin-left: 5%;
			}
			.item-audio{
				height:3.3rem;
				line-height: 3.3rem;
				position: relative;
			}
			.audio-left{
				width: 4.9rem;
				height: 100%;
				border-right: 1px solid #ccc;
				float: left;
			}
			.audio-right{
				float: left;
				width: 19rem;
			}
			.audio-right p{
				font-size: 0.9rem;
				margin-left: 0.5rem;
			}
			.clear{
				clear: both;
			}
			.save{
				position: absolute;
			    top: 0.5rem;
			    left: 21rem;
			    color: #666;
			}
			.delete{
				position: absolute;
			    top: 0.5rem;
			    left: 23rem;
			    color: #666;
			}
			.recording{
			    position: fixed;
			    bottom: -8rem;
			    left: 0;
			    width: 100%;
			    height: 8rem;
			    background: rgba(255,255,255,0.7);		
			}
			.luyin{
				 width: 6rem;
   				 margin: 1rem 9.5rem;
			}
			.readOver{
				width: 100%;
				height:2.8rem;
			}
			.leavel{
				width:25%;
				height: 100%;
				float: left;
			}
			.leavel p{
				float: left;
				line-height: 2.8rem;
				margin-left: 0.5rem;
			}
			.check{
				    width: 1rem;
				    margin-top: 0.9rem;
				    margin-left: 1.2rem;
				    float: left;
			}
			.checked{
				color:#18bd8a
			}
			.yearFund{
				float: left;
				width: 9rem;
			    height: 4rem;
			    border: 1px solid #1df377;
			    margin-top: 2rem;
			    margin-left: 2rem;
			    border-radius: 0.8rem;
			    background: #dffdda;
			    text-align: center;
			}
			.monthFund{
				float: left;
				width: 9rem;
			    height: 4rem;
			    border: 1px solid #1df377;
			    margin-top: 2rem;
			    text-align: center;
			    margin-left: 3rem;
			    border-radius: 0.8rem;
			    background: #dffdda;
			}
			.picked{
				border: 1px solid #f5b831;
				 background: #fefed0;
			}
			.payChoose{
			    width: 84%;
			    margin-left: 8%;
			    margin-top: 2rem;	
			    height: 2rem;
			}
			.payType{
				width: 4rem;
			}
			.choose{
				float: right;
				margin-top: 0;
				font-size: 1.4rem;
			}
			.choosed{
				color: #1DF377;
			}
			.rechargeImd{
				margin-top: 2rem;
			    height: 2.8rem;
			    border: none;
			    outline: none;
			    background: #17f377;
			    color: white;
			    font-size: 1.4rem;
			    border-radius: 0.3rem;
			}
		</style>
		<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
	</head>
	<body>
		<div class="top-img">
			<div class="back"><i class="fa  icon-angle-left icon-2x"></i></div>
			<div class="title"><p>充值中心</p></div>
			<div class="top-right" onclick="window.location.href='<?php echo url('index/parents/recharge_history'); ?>'">历史记录</div>
		</div>
		<div class="home-top">
			<div class="item" style="width: 90%;margin-left: 5%;font-size: 1.4rem;height: 2.4rem;">
				<span>我要充值</span>
			</div>
			<div class="item">
				<span>会员卡号：</span><span style="color: #ccc;" class="memberCard">2917971000000001</span>
			</div>
			<div class="item">
				<span>宝贝姓名：</span><span class="childName">小明</span>
				<div class="item-right"><i class="fa  icon-angle-right icon-2x"></i></div>
			</div>
			<div class="clear"></div>
			<div class="item">
				<span>课程阶段：</span><span class="studyStep">数学，第二阶段</span>
				<div class="item-right"><i class="fa  icon-angle-right icon-2x"></i></div>
			</div>
		</div>
		<div class="yearFund picked ">
			<p class="" style="margin-top: 0.6rem;">年费</p>
			<p style="color: #ccc;">售价：1200</p>
		</div>
		<div class="monthFund ">
			<p class="" style="margin-top: 0.6rem;">月费</p>
			<p style="color: #ccc;">售价：100</p>
		</div>
		<div class="clear"></div>
		<div class="payChoose">
			<img class="payType" src="<?php echo $base_path; ?>/img/wepay.png" >
			<i class="fa  icon-ok-sign choose choosed"></i>
		</div>
		<div class="clear"></div>
		<input type="button" class="rechargeImd item boxshadow" value="立即充值" />	
	</body>
	<script>
		$(".choose").click(function(){
			if($(this).hasClass("choosed")==true){
				$(this).removeClass("choosed")
			}
			else{
				$(this).addClass("choosed")
			}
		})
	</script>
	<script src="<?php echo $base_path; ?>/js/common.js"></script>
</html>

