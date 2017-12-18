<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:96:"D:\new_exe\xampp\htdocs\gudong\public/../application/index\view\Default\index_new\proMoment.html";i:1512533590;}*/ ?>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="/static/index/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/static/index/js/mui/dist/css/mui.min.css">
    <link rel="stylesheet" type="text/css" href="/static/index/js/mui/css/previewimage.css">
    <link rel="stylesheet" type="text/css" href="/static/index/css/new/proMoment.css?v=2">
    <style type="text/css">
    	#content .mui-switch:before{
    		top: 24%;
    	}
    </style>
</head>
<body>
	<header class="gd-header">
		<div id="gd-head">
			<i class="glyphicon glyphicon-chevron-left i_prev_url"></i>
			<div class="gd-head-center">
				<div class="gd-header-nav">
					<span class="gd-head-title">我的进化</span>
				</div>
			</div>
			<div class="gd-head-right">发布</div>
		</div>
	</header>

	<div id="content">
		<textarea placeholder="我的进化论"></textarea>
		<div class="div-photo" style="position: relative;">
			<div class="pdiv addphoto">
				<img src="/static/index/images/carema_200.png">
				<span>照片</span>
			</div>
		</div>

		<ul class="mui-table-view" style="display: none;">
		    <li class="mui-table-view-cell">孤芳自赏
		        <span class="mui-badge mui-switch" style="transform:scale(0.8,0.8);top: 20%;">
		  			<div class="mui-switch-handle"></div>
				</span>
		    </li>
		</ul>
		
	</div>

	<script type="text/javascript" src="/static/index/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/static/index/layer/layer.js"></script>
    <script type="text/javascript" src="/static/index/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/static/index/js/mui/dist/js/mui.min.js"></script>
    <!-- 图片预览start -->
    <script type="text/javascript" src="/static/index/js/mui/js/mui.zoom.js"></script>
    <!-- 图片预览over -->
    <script type="text/javascript" src="/static/index/js/mui/js/mui.previewimage.js"></script>
    <script type="text/javascript" src="/static/index/js/new/proMoment.js?v=2"></script>

    <script type="text/javascript">

//         function longPress() {
// //      	alert('长按');

// 			clearInterval(timeoutEvent);
// 			timeoutEvent = 0;
//         	if (currentIndex >= 0) {
// 				layer.confirm('确认删除第 '+(currentIndex+1)+' 张图片吗？', {
// 				  	btn: ['确认','取消'] //按钮
// 				}, function(index){
// 				  	$('.photo:eq('+currentIndex+')').remove();
// 				  	layer.close(index);
// 				  	setMargin();
// 				  	currentIndex = -1;
// 				}, function(index){
// 					layer.close(index);
// 					currentIndex = -1;
// 				});
//         	}
//         }
// 		var currentIndex = -1;
// 		timeoutEvent = 0;
// 		$(document).on('touchstart', '.photo', function(e){
// 			currentIndex = parseInt($(this).index('.photo'));
// 			if (!timeoutEvent)
// 				timeoutEvent = setInterval("longPress()", 600);
// 			e.preventDefault();
// 		})
// 		$(document).on('touchmove', '.photo', function(e){
// 		})
// 		$(document).on('touchend', '.photo', function(e){
// 			clearInterval(timeoutEvent);
// 			timeoutEvent = 0;
// 			// e.preventDefault();
// 		})
    </script>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
    <script type="text/javascript">
    	wx.config({

		    debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。

		    appId: '<?php echo $appId; ?>', // 必填，公众号的唯一标识

		    timestamp: '<?php echo $timestamp; ?>', // 必填，生成签名的时间戳

		    nonceStr: '<?php echo $nonceStr; ?>', // 必填，生成签名的随机串

		    signature: '<?php echo $signature; ?>',// 必填，签名，见附录1

		    jsApiList: [
		    	'closeWindow',
		    	'chooseImage',
		    	'uploadImage',
		    	'getLocalImgData'
		    ] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2

		});

		var u = navigator.userAgent;
  		isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
  		// var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端

		window.localIdArr = new Array();
		window.isSubmit = false;
		currentI = 0;
				
		wx.ready(function(){
			$('.gd-head-right').click(function(){
				//说说内容不能为空
				if ($('textarea').val().trim() == '') {
					layer.msg('请输入进化内容', {time: 1200});
					return false;
				}

				var mediaId = new Array();
				
				var imgCount = 0;
				$('.photo').each(function(){
					imgCount++;
					window.localIdArr[window.localIdArr.length] = $(this).attr('src');
				});

				if (imgCount == 0) {
					layer.msg('至少一张进化照片', {time: 1200});
					return false;
				}

				if (window.isSubmit) {
					layer.msg('图片正在发布，请稍等');
					return false;
				}
					
				var klafjsdf = function uploadImg() {
					window.isSubmit = true;
					var i = currentI;
					wx.uploadImage({
		
					    localId: window.localIdArr[i], // 需要上传的图片的本地ID，由chooseImage接口获得
		
					    isShowProgressTips: 1, // 默认为1，显示进度提示
		
					    success: function (res) {
		
					        var serverId = res.serverId; // 返回图片的服务器端ID
					        mediaId[mediaId.length] = serverId;
		
					        if (mediaId.length >= parseInt($('.photo').size())) {
					        	//全部上传完成
					        	if ($('.mui-switch').hasClass('mui-active')) {
					        		var see = 0;
					        	} else {
					        		var see = 1;
					        	}
					        	$.ajax({
					        		url: '/index/moment/newProMoment',
					        		dataType: 'json',
					        		data: {
					        			media: mediaId.toString(),
					        			content: $('textarea').val().trim(),
					        			see: see
					        		},
					        		type: 'post',
					        		success: function(data) {
					        			window.isSubmit = false;
					        			if (data.errcode == 0) {
					        				window.location.href = '/index/index/center';
					        			} else {
					        				layer.msg('发表说说失败,请重试');
					        				$('.photo').remove();
					        			}
					        		},
					        		error: function(data){
					        			layer.msg('说说发表失败，请联系管理员');
					        		}
					        	})
					        } else {
					        	currentI++;
					        	uploadImg();
					        }
					    }
		
					});
				}();
					
			})
			
			
			

			$('.addphoto').click(function(){
				wx.chooseImage({

				    count: 9, // 默认9

				    sizeType: ['compressed'], // 可以指定是原图还是压缩图，默认二者都有

				    sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有

				    success: function (res) {

				        var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片

				        var num = parseInt($('.pdiv').size()) - 1;
				        
				        var len = 0;
//				        var i = ;
						var ci = 0;
						var carr = new Array();
						$.each(localIds, function(index, item) {
//							alert(item+'----');
							len++;
			        		if (num+len >= 10) {
								$('.addphoto').css('display', 'none');
								return;
							}
			        		carr[carr.length] = item;
			        		
			        		if (isAndroid) {
				        		$('.addphoto').before('<div class="pdiv photo" src="'+item+'" style="background-image:url('+item+');"><div><i class="mui-icon mui-icon-closeempty i-del"></i></div><img style="width: 100%;height: 100%;opacity: 0;" class="mui-media-object" src="'+item+'" data-preview-src="" data-preview-group="1"></div>');
				        	} else {
				        		wx.getLocalImgData({

								    localId: item, // 图片的localID

								    success: function (data) {
//										alert(carr[ci]);
								        var localData = data.localData; // localData是图片的base64数据，可以用img标签显示
								        $('.addphoto').before('<div class="pdiv photo" src="'+carr[ci]+'" style="background-image:url('+localData+');"><div><i class="mui-icon mui-icon-closeempty i-del"></i></div><img style="width: 100%;height: 100%;opacity: 0;" class="mui-media-object" src="'+localData+'" data-preview-src="" data-preview-group="1"></div>');
								        ci = ci+1;
								        setMargin();
								    }

								});
				        	}
						});
						
				        setMargin();
				    }

				});
			})

		})
	
    </script>
</body>
</html>