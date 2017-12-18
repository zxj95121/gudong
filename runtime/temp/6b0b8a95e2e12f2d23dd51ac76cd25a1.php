<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:102:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/index\view\Default\parents\recharge_history.html";i:1504533881;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<link rel="stylesheet" href="/static/parents/Font-Awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="/static/parents/css/common.css">
		<title>充值历史记录</title>
		<style>
			html,body{
				padding: 0;
				margin: 0;
				font-family: "微软雅黑";
				background: #f6f6f6;
				color: #6f6f6f;
			}
			p,img{padding: 0;margin: 0;}
			.home-top{
				width: 100%;
				background: white;
				margin:1rem 0 1rem 0;
			}
			.item{
				width:90%;
				height:2.8rem;
				margin-left: 5%;
				line-height: 2.8rem;
				border-bottom: 1px solid #f6f6f6;
			}
			.item-right{
				float: right;
			}
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
			
			.grade-level{
			    width: 100%;
			    height: 10rem;
			    background: white;
			}
			.grade-item{
				width: 33%;
				float: left;
				height: 100%;
				position: relative;
			}
			.hisContainer{
				width: 100%;
				height: auto;
			}
			.hisMsg{
				width: 100%;
			}
			.msgDate{
			    width: 8rem;
			    height: 1.7rem;
			    background-color: #ccc;
			    text-align: center;
			    line-height: 1.7rem;
			    margin: 1rem auto;
			    border-radius: 0.3rem;
			    color: white;	
			}
			.msgCon{
				width: 21rem;
			    background: white;
			    margin-left: 1.5rem;
			    padding-left: 1rem;
			    border-radius: 0.5rem;
			}
			.msgTitle{
				font-size: 1.3rem;
   				padding-top: 0.7rem;
   				margin-bottom: 0.3rem;
			}
			.msgTime{
			    color: #ccc;
   				 margin-bottom: 1rem;	
			}
			.msgItem{
				margin-bottom: 0.3rem;
			}
			.msgItem:last-child{
				padding-bottom:1.5rem;
			}
		</style>
		<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
	</head>
	<body>
        <div class="top-img">
            <div class="back"><i class="fa  icon-angle-left icon-2x"></i></div>
            <div class="title"><p>充值中心</p></div>
			<div class="add"><a href="<?php echo url('index/parents/person_center'); ?>"><img src="<?php echo $base_path; ?>/img/home.png" width="100%"></a></div>
        </div>
		<div class="hisContainer">
			<div class="hisMsg">
				<div class="msgDate mohushadow">
					<p>7月11日 20:16</p>
				</div>
				<div class="msgCon">
					<p class="msgTitle">年费充值成功</p>
					<p class="msgTime">7月11日</p>
					<div class="msgItem"><span>会员卡号：</span><span class="memberNo">20174132132465431111</span></div>
					<div class="msgItem"><span>宝贝姓名：</span><span class="childName"> 小明</span></div>
					<div class="msgItem"><span>课程阶段：</span><span class="studyStep">数学，第二阶段</span></div>
					<div class="msgItem"><span>充值年费：</span><span class="rechargeFund">1200元</span></div>
				</div>
			</div>
		</div>
	</body>
	<script>
		$(function(){
			$(".check").click(function(){
				$(".check").removeClass("checked");
				$(this).addClass("checked");
			})
		})
	</script>
	<script src="<?php echo $base_path; ?>/js/common.js"></script>
</html>

