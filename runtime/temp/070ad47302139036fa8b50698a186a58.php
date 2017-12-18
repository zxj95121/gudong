<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:91:"D:\new_exe\xampp\htdocs\gudong\public/../application/index\view\Default\index_new\gift.html";i:1513163955;s:91:"D:\new_exe\xampp\htdocs\gudong\public/../application/index\view\Default\index_new\foot.html";i:1513162447;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>研值送礼</title>
	<!-- <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css"> -->
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="/static/index/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/static/index/js/mui/dist/css/mui.min.css">
	<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="/static/index/css/new/rem.css">
<!--	<script src="/static/index/js/common.js"></script>-->
	<style type="text/css">
		.giftItem{
			width: 80%;
			margin-left: 10%;
			height: 7rem;
			background: #f5f5f5;
			position: relative;
			margin-bottom: 1rem;
			border-radius: 0.3rem;
		}
		.giftItem span{
			color: inherit;
		}
		.giftItem img{
			max-width: 5rem;
			max-height:5rem;
   			position: absolute;
    
		}
		.choose{
			background: #332d46 !important;
			color: white;
		}
		.img-left{
			left: 1rem;
    		top: 1rem;
		}
		.img-right{
			left: 14rem;
    		top: 1rem;
		}
		.yanzhi-left{
			color: #c09f67 !important;
			/*margin-left: 12rem;*/
    		font-size: 1.5rem;
		}
		.yanzhi-right{
			color: #c09f67 !important;
			margin-left: 1rem;
    		font-size: 2rem;
		}
		.submit{
			    width: 80%;
    height: 3.4rem;
    border: none;
    color: white;
    border-radius: 0.3rem;
    background: #332d46;
    margin-left: 10%;
    margin-top: 2rem;
    margin-bottom: 6rem;
    text-align: center;
    line-height: 3.4rem;
    font-size: 1.2rem;
		}
		.shadow{
			display: none;
			position: fixed;
		    width: 100%;
		    height: 100%;
		    top: 0;
		    background: rgba(0,0,0,0.7);
		}
		.addressCon{
			    position: absolute;
    width: 80%;
    background: white;
    height: 17rem;
    top: -10rem;
    left: 10%;
    border-radius: 0.5rem;
		}
		.addressCon input{
			    width: 90% !important;
			    margin: 1rem 5% 0 5%;
		}
		.btn{
			width: 25%;
    height: 2.7rem;
    font-size: 1.3rem;
    margin-left: 13%;
    margin-right: 2.4rem;
    margin-top: 1rem;
		}
		.confirm{
			background: #332d46;
			color: white;
		}
		.name-left{
			    margin: 1rem;
    padding-top: 1.5rem;
   /* margin-left: 13rem;*/
  text-align: center;
    font-size: 1.8rem;
		}
		.name-right{
			    margin: 1rem;
    padding-top: 1.5rem;
    /*margin-left: 2rem;*/
    font-size: 1.3rem;
		}
		./*mui-tab-item{
		height: 3.39rem !important;
	}.mui-bar{
		height: 3.39rem !important;
	}
		.mui-tab-label{
    font-size: 1.13rem !important;
	}
	.mui-bar-tab a img{
		    width: 0.727rem !important;
    margin-right: -0.16rem;
	}*/
	</style>
</head>
<body style="background: white;">
	<div>
		<img src="/static/index/images/gift_banner.jpg" style="    width: 30%;
    margin-left: 35%;
    margin-top: 1rem;" />
		<p style="    text-align: center;
		    font-size: 2rem;
		    font-weight: 400;
		    margin-top: 2.5rem;">
					用研值送礼物
				</p>
				<!--<p style="    text-align: center;
		    font-size: 1.2rem;
		    margin-top: 1rem;
		    color: #666;">
					便捷不唐突的送礼方式
		</p>-->
		<?php foreach($gift as $key=>$item): ?>
			<div class="giftItem">
				<!--<img src="<?php echo $item['img']; ?>" class="img-left"  width="100%"/>-->
				<p class="name-left name"><?php echo $item['name']; ?></p>
				<p style="text-align: center;">
				<span class="yanzhi yanzhi-left"><span class="cost"><?php echo $item['cost']; ?></span></span ><span style="margin-left: 0.3rem;">研值</span>
				</p>
			</div>
		<!--<div class="giftItem">
			<img src="<?php echo $item['img']; ?>" class="img-right"  width="100%"/>
			<p class="name-right"><?php echo $item['name']; ?></p>
			<span class="yanzhi yanzhi-right">￥<span class="cost"><?php echo $item['cost']; ?></span></span ><span>研值</span>
		</div>-->
		<?php endforeach; ?>
		<div class="submit">
			选好了
		</div>
		<div class="shadow">
			<div class="addressCon">
				<input type="text" placeholder="地址" class="address" />
				<input type="text" placeholder="姓名" class="nickname" />
				<input type="tel" placeholder="手机" class="mobile" />
				<button class="btn confirm">
					确认
				</button>
				<button class="btn btn-default cancel">
					取消
				</button>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="/static/index/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/index/js/mui/dist/js/mui.min.js"></script>
	<script type="text/javascript" src="/static/index/layer/layer.js"></script>
	<nav class="mui-bar mui-bar-tab" style="z-index: 9999;background: white;">
    <a class="mui-tab-item nav-a-bottom" id="yi" href="/index/index/zhanshi.html?c=0#user" style="border-right: 1px solid #eee;cursor: pointer;">
        <img src="/static/index/images/bars-o.png" />
        <span class="mui-tab-label" style="">艺</span>
    </a>
    <a class="mui-tab-item nav-a-bottom" id="dao" href="/index/index/gift.html" style="border-right: 1px solid #eee;cursor: pointer;">
       <img src="/static/index/images/bars-o.png" />
       <span class="mui-tab-label" style="">道</span>
    </a>
    <a class="mui-tab-item nav-a-bottom" id="jia" href="/index/index/center.html" style="cursor: pointer;">
        <img src="/static/index/images/bars-o.png" />
        <span class="mui-tab-label" style="">家</span>
    </a>
</nav>
<style>
	.mui-tab-label{
		color: #666;
    font-size: 1.4rem;
    font-weight: 400;
	}
	.mui-bar{
		height: 4.2rem;
	}
	.mui-tab-item{
		height: 4.2rem;
	}
	.mui-tab-label{
		color: #666;
    font-size: 1.4rem;
    font-weight: 400;
	}
	.mui-bar-tab a img{
		    width: 0.9rem;
    margin-top: 0;
    margin-right: -0.2rem;
	}
</style>
<script type="text/javascript">
    mui('body').on('tap','.nav-a-bottom',function(){
        document.location.href=this.href;
    });
</script>
	<script>
		$(function(){
			$("#dao span").css("color","black");
    		$("#dao img").attr("src","/static/index/images/bars-b.png");
			$(".giftItem").click(function(){
				$(".giftItem").removeClass("choose");
				$(this).addClass("choose");
			});
			$(".submit").click(function(){
				var length=$("body").find(".choose").length;
				if(length==0){
					layer.msg("请先选择礼物品类",{time:2000})
				}
				else{
					$(".shadow").show();
					$(".addressCon").animate({"top":"11rem"})
				}
			})
			$(".confirm").click(function(){
				var address = $('.address').val();
				var mobile = $('.mobile').val();
				var name = $('.nickname').val();
				if( address && mobile && name){
					
					$.ajax({
                            url: '<?php echo url("index/activity/joinGift"); ?>',
                            type: 'post',
                            dataType: 'json',
                            data: {
                                uid: $(".userId").val(),
                                address: $(".address").val(),
                                name:name,
                                mobile:$(".mobile").val(),
                                cost:$(".choose").find(".cost").html(),
                                proName:$(".choose").find(".name").html()
                            },
                            success: function(data) {
                            	$(".shadow").hide();
								$(".addressCon").animate({"top":"-10rem"});
								if(data.errcode==0){
									layer.msg("提交成功!")
								}
								else{
									layer.msg("余额不足，请阅研值攻略。", {time:3000})
								}
                            }
                        })
				}
				else{
					layer.msg("请完整填写收货信息", {time:2000})
				}
			})
			$(".cancel").click(function(){
				$(".shadow").hide();
				$(".addressCon").animate({"top":"-10rem"})
			})
		})
	</script>
</body>
</html>