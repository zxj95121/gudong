 var enter = getPlat();
if(enter==true){

 	var ch_jsonObj=[];
 	var sh_jsonObj=[];
	var ch_imgObj=[];
	var sh_imgObj=[];
	var ch_pageMsgJson={};
	var _changeAble="";
	var m_length="";
	var c_length="";
	var shareChangeAble="";
	var iShareImgLength=0;
	var iShareDivLength=0;
	var returnFlag=1;
	var actNO="";
	var templateId=2;
	var ward={};
	var everydayMaxHitNum=null;
	var gzText='';//规则可编辑文本
	var dieText='';//规则       不可编辑文本
	var platIframe="";
	var isChange="";
	var label=null;
	var transImgSrc="11";
	var transImgErSrc="11";
	var backField02="";
	var activityNo="";
	var weixin = $(".weixinsel");
	var share = $(".askShareSelectItem");
	var shareVal = '';
	var weixinVal = ''; //判断是否微信打开
	var appId; //公众号选择框
	var weichatType;//公众号类型
	var guanzhu = $(".guanzhusel"); //是否需要关注单项选择按钮
	var guanzhuVal = ''; // 是否需要关注单项选择按钮 的值
	var autoReply = ''; //被关注自动回复
	var keyWords = ''; //关键字回复
	var sharePriceType = '';
	var sharePriceTimes = '';
	var shareTopLimit = '';
window.onload =function(){
	//iframe加载，左侧step个数
	var windowHeight=$(window).height();
	$(".mainBodyDiv").css("height",windowHeight-50+"px");
	$(".pic-store").css("height",windowHeight-180+"px");
	$(".pic-store-p").css("height",windowHeight-180+"px");
	$(".ele-body").css("height",windowHeight-180+"px");
	$(".change-body").css("height",windowHeight-180+"px");
	$(".rightContentDiv").css("height",windowHeight-50+"px");
	/*var Len=$("#iframePhone").contents().find(".pubChange").find("img").eq(0).css("width");
	console.log(Len);*/
	alive();
	 	function GetRequest() {
		var url = location.search; //获取url中"?"符后的字串
	 	var theRequest = new Object();
		if (url.indexOf("?") != -1) {
			 var str = url.substr(1);
			 strs = str.split("&");
			  for (var i = 0; i < strs.length; i++) {
			   theRequest[strs[i].split("=")[0]] = decodeURIComponent(strs[i].split("=")[1]);
			        }
			    }
		return theRequest;
	}
        //判断入口由模板进入还是活动进入
       		var a=GetRequest();
       		var operate=a['operator'];
       		backField02=a['backField02'];
			//判断是都为派送类型，中奖概率等不可更改
			if(parseInt(backField02)==2){
				$(".shareRules").hide();
				$(".gameRules .participateP").html("游戏规则设置    &nbsp; &nbsp; (当前活动该设置不可编辑)");
				$(".maxjoinnumperday").val("1");
				$("#totalRate").val("100");
				$(".gameRules").find("input").attr("disabled","disabled");
				getAllAppId(0);
			}
			//助力类活动，只支持服务号
			else if(parseInt(backField02)==1){
				$(".shareRules").hide();
				$(".gameRules .participateP").html("游戏规则设置     &nbsp;&nbsp;	 (当前活动该设置不可编辑)");
				$(".maxjoinnumperday").val("1");
				$("#totalRate").val("100");
				$(".gameRules").find("input").attr("disabled","disabled");
				$(".guanzhuNeed").css("display","block")
				$(".autoReplyBox").css("display","block")
				$(".keyWordsBox").css("display","block")
				getAllAppId(1);
			}
			else{
				getAllAppId(0);
			}
       		templateId=a['templateId'];
       			//我的活动进入
				if(operate=="edit"){
					//渲染活动
					actNO=a['actNO'];
					MyXuanRan();
				}
				else if(operate == 'editIng'){
					actNO=a['actNO'];
					ingXuanRan()
				}
				//模板进入
				else{
					//渲染模板
					xuanRan();
				}
	
        //加载模板
     	  

/*	document.onkeydown = function(e){
    if(e.keyCode == 116){
        e.preventDefault(); //组织默认刷新
        
    }
}*/
/*window.onbeforeunload = function(){
	return "sss";
}*/		var clearInt;
		function getIframe(){
			clearInt=window.setInterval(getFram,100);
		} 
		function getFram(){
			_changeAble=$("#iframePhone").contents().find('.changeAble:not(.shareChangeAble)');
			m_length=$("#iframePhone").contents().find('.changeAble:not(.shareChangeAble)').find("img").length;
			c_length=$("#iframePhone").contents().find('.changeAble:not(.shareChangeAble)').length;
			shareChangeAble=$("#iframePhone").contents().find('.shareChangeAble');
			iShareImgLength=$("#iframePhone").contents().find('.shareChangeAble').find("img").length;
			iShareDivLength=$("#iframePhone").contents().find('.shareChangeAble').length;
			bg = $("#iframePhone").contents().find('.background').find("img");
			if (m_length!=0){
				console.log(m_length+"..."+c_length+"..."+iShareImgLength+"..."+iShareDivLength);
				getGzPageNum();
				clear();
			}
	        else{
	        }
		}
		function clear(){
			window.clearInterval(clearInt);
		}
/*var getIframe=setInterval(function() {
			_changeAble=$("#iframePhone").contents().find('.changeAble:not(.shareChangeAble)');
			m_length=$("#iframePhone").contents().find('.changeAble:not(.shareChangeAble)').find("img").length;
			c_length=$("#iframePhone").contents().find('.changeAble:not(.shareChangeAble)').length;
			shareChangeAble=$("#iframePhone").contents().find('.shareChangeAble');
			iShareImgLength=$("#iframePhone").contents().find('.shareChangeAble').find("img").length;
			iShareDivLength=$("#iframePhone").contents().find('.shareChangeAble').length;
			bg = $("#iframePhone").contents().find('.background').find("img");
			if (m_length!=0){
				console.log(m_length+"..."+c_length+"..."+iShareImgLength+"..."+iShareDivLength);
				getGzPageNum();
				clearInterval(i);
			}
	        else{
	        	
	        }
        }, 100);*/
function getGzPageNum(){
						var gameLenth=$("#iframePhone").contents().find('.gameDiv').children(".item").length;
						var ling=gameLenth+3;
						var stepHtml="<div class='step active'><p>1</p><span class='at'>首页</span></div><div class='step' id='gzHref'><p>2</p><span class='at'>规则页面</span></div>";
						for(var i=0;i<gameLenth;i++){
							var j=3+i;
							var n=i+1;
							if(n==1){
								stepHtml+="<div class='step gameStep' id='"+i+"step'><p>"+j+"</p><span class='at'>游戏页面</span></div>";
							}
							else{
								stepHtml+="<div class='step gameStep' id='"+i+"step'><p>"+j+"</p><span class='at'>游戏页面"+n+"</span></div>";
							}
						}
						stepHtml+="<div class='step'><p>"+ling+"</p><span class='at'>领取页面</span></div>";
						$(".steps").html(stepHtml);
	/*alert(document.readyState);*/
		
}
/*$("#gzHref").click(function(){
	window.location.href="#rules";
})*/
 function getDiv(){
 				acTitle = $(".basisName").val(); // 活动名称
				acBTime = $(".startTime").html(); // 活动开始时间
				acETime = $(".endTime").html(); // 活动结束时间
				shareTitle = $(".weiTitle").val(); // 活动微信分享标题
				totalBudet = $.formatData.rmoney($("#allMoney").text()); // 总预算金额
				shareContext = $(".weiContent").val(); // 活动微信分享内容
				totalHitRate = $("#totalRate").val();
				if(totalHitRate==""){
					totalHitRate=null;
				}
				else{
					
				}
				everyOrMore=$(".More").val();//  1-每天   2-最多
				if(everyOrMore==1){
					maxJoinNumPerDay = $(".maxjoinnumperday").val();// 每天参与次数  次/人
					maxJoinNum=null;
				}
				else{
					maxJoinNumPerDay=null;
					maxJoinNum = $(".maxjoinnumperday").val();//  最多参与次数  次/人
				}
				everydayMaxHitNum=$("#everydayMaxHitNum").val(); //每天最多中奖次数
				maxHitNum = $(".maxHitNum").val();// 最多中奖次/人
	 // alert(bg.length)
	 // for(var i=0;i<bg.length;i++){
		//  console.log(bg.css('width'));
	 // }
 		for(var i=0;i<c_length;i++){
        	 _top=_changeAble.eq(i).css('top');
            _left=_changeAble.eq(i).css('left');
            _width=_changeAble.eq(i).css('width');
            _height=_changeAble.eq(i).css('height');
			if(_changeAble.eq(i).hasClass('background')){
				ch_jsonObj[i]={'width':'25rem',"top":pxToRem(_top),"height":'100%',"left":pxToRem(_left)};
			}
			else if(_changeAble.eq(i).hasClass('pubChange')){
				ch_jsonObj[i]={'width':pxToRem(_width),"top":pxToRem(_top),"height":pxToRem(_height),"left":pxToRem(_left)};
			}
			else{
				ch_jsonObj[i]={'width':pxToRem(_width),"top":pxToRem(_top),"height":pxToRem(_height),"left":pxToRem(_left)};
			}
         }
 		for(var i=0;i<iShareDivLength;i++){
        	 _sTop=shareChangeAble.eq(i).css('top');
            _sLeft=shareChangeAble.eq(i).css('left');
            _sWidth=shareChangeAble.eq(i).css('width');
            _sHeight=shareChangeAble.eq(i).css('height');
			if(shareChangeAble.eq(i).hasClass('background')){
				sh_jsonObj[i]={'width':'25rem',"top":pxToRem(_sTop),"height":'100%',"left":pxToRem(_sLeft)};
			}
			else{
				sh_jsonObj[i]={'width':pxToRem(_sWidth),"top":pxToRem(_sTop),"height":pxToRem(_sHeight),"left":pxToRem(_sLeft)};
			}
         }
         for(var i=0;i<m_length;i++){
        	var imgUrl=_changeAble.find('img').eq(i).attr('src');
            ch_imgObj[i]=imgUrl;
         }
         for(var i=0;i<iShareImgLength;i++){
        	var imgUrl=shareChangeAble.find('img').eq(i).attr('src');
            sh_imgObj[i]=imgUrl;
         }
    	var gzContent={
    		activityName:acTitle,
		    startTime:acBTime,
		    endTime :acETime,
		    isNational:isNational,
		    transTitle : shareTitle,
		    transDesc : shareContext,
		    transImgPath :transImgSrc,
		    //everyOrMore:everyOrMore,
		    //totalBudet:totalBudet,
		    maxJoinNumPerDay :maxJoinNumPerDay, // 最多参与每天/人
		    maxJoinNum: maxJoinNum,// 用户参与人数最多人次
		    everydayMaxHitNum:everydayMaxHitNum,
		    totalRate :totalHitRate,
		    maxHitNum:maxHitNum ,
		   
    	}
	 console.log('+++')
    	var iframe=platIframe;
        ch_pageMsgJson = {
            pageElement:ch_jsonObj,
            sharePageElement:sh_jsonObj,
            imgMsg:ch_imgObj,
            shareImgMsg:sh_imgObj,
            gzText:$("#iframePhone").contents().find('.gzCon').find('.gzText').html(),
            dieText:$("#iframePhone").contents().find('.gzCon').find('.dieText').html(),
            gzContent:gzContent,
            lotteryList:ward,
            platIframe:iframe
        }
 }
 		//退出按钮
		$(".out_btn").click(function(){
			$(".point_conserve").css("display","block");
			$(".black").css("display","block");
			$(".out_btn").css("z-index","99999");	
		});
		$("#startTime").bind('DOMNodeInserted', function(e) {
			var timer=$(e.target).html();
				timer=timer.substring(0,10);
			$("#iframePhone").contents().find('.dieStar').html(timer)
		}); 
		$("#endTime").bind('DOMNodeInserted', function(e) {
			var timer=$(e.target).html();
				timer=timer.substring(0,10);
			$("#iframePhone").contents().find('.dieEnd').html(timer)
		});  
		$("input[name='lotteryNum']").blur(function(){
			for(var i=0;i<$("input[name='lotteryNum']").length;i++){
				var lotteryName=$("input[name='lotteryName']").eq(i).val();
				var ordinaryLi=$(".ordinaryLi.checkActive").eq(i).parent().next().text();
				$("#iframePhone").contents().find('.activeJiang p span').eq(i).html(lotteryName+':'+ordinaryLi)
			}
		});
		$(".yes_btn").click(function(){
			$(".point_conserve").css("display","none");
			$(".black").css("display","none");	
			window.location.href="../pages/qyIndex-bak.html";
		})
		$(".no_btn").click(function(){
			$(".point_conserve").css("display","none");
			$(".black").css("display","none");	
		})	
 	//模板渲染
 	function xuanRan(){
 		transImgSrc="http://om7yr8rwd.bkt.clouddn.com/moren.png";
 		transImgErSrc="http://120.26.41.88:8888/wxtrans/657444e771b24b7992fe69e1ad45058c/trans.jpg",
 		$("#xianshiImg").attr("src",transImgSrc);
 		$("#erweimaImg").attr('src',transImgErSrc);
 		getIframe();
 		setTimeout(function() {
 			$.ajax({
			type:"get",
			url:"../WorkBenchController/getDivContent",
			data:{templateId:templateId},
			async:false,
			success:function(data){
				var data=JSON.parse(data);
				var imgMsg=JSON.parse(data.resultMsg).imgMsg;
				var pageMsg=JSON.parse(data.resultMsg).pageElement;
				gzText=JSON.parse(data.resultMsg).gzText;
				 dieText=JSON.parse(data.resultMsg).dieText;
				 console.log(dieText+",/,,,,,/////");
				for(var n=0;n<m_length;n++){
					_changeAble.find("img").eq(n).attr('src',imgMsg[n]);
	       		 }
				for(var i=0;i<c_length;i++){
					_changeAble.eq(i).css('top',pageMsg[i].top);
					_changeAble.eq(i).css('left',pageMsg[i].left);
					_changeAble.eq(i).css('width',pageMsg[i].width);
					_changeAble.eq(i).css('height',pageMsg[i].height);
		        }
				$("#iframePhone").contents().find(".dieText").html(dieText);
				$("#iframePhone").contents().find(".gzText").html(gzText);
				  um.setContent(gzText);
			}
		});
 		},100)
 		
 	}
 	
 	 //我的活动渲染
 	function MyXuanRan(){
 		getIframe();
 		setTimeout(function() {
 		$.ajax({
			type:"get",
			url:"../login/ActivityConfigs/getActivityConfigsInfoByNo",
			data:{actNO:actNO,templateId:templateId},
			async:false,
			success:function(data){
				var data=JSON.parse(data);
				var msg=data.resultMsg.ACTIVITYCONFIGS;
				var imgMsg=JSON.parse(data.resultMsg.ACTIVITYCONFIGS.htmlContent).imgMsg;
				var pageMsg=JSON.parse(data.resultMsg.ACTIVITYCONFIGS.htmlContent).pageElement;
				var lotterMsg=JSON.parse(data.resultMsg.ACTIVITYCONFIGS.htmlContent).lotteryList;
				transImgSrc=msg.transImgPath;
				transImgErSrc=msg.attentionImagePath;
				gzText=JSON.parse(data.resultMsg.ACTIVITYCONFIGS.htmlContent).gzText;
				dieText=JSON.parse(data.resultMsg.ACTIVITYCONFIGS.htmlContent).dieText;
				platIframe=JSON.parse(data.resultMsg.ACTIVITYCONFIGS.htmlContent).platIframe;
				var isweichat = msg.isweichat;
				var weiChatAppId = msg.weiChatAppId;
				var isAttention = msg.isAttention;
				var autoReply = msg.autoReply;
				var keyWords = msg.keyWords;
				var weichatType = msg.weichatType;
				var attentionImagePath=msg.attentionImagePath;
				var sharePriceType = msg.sharePriceType;
				var sharePriceTimes = msg.sharePriceTimes;
				var shareTopLimit = msg.shareTopLimit;
				if(attentionImagePath == ''||attentionImagePath==undefined){
					attentionImagePath = "http://120.26.41.88:8888/wxtrans/657444e771b24b7992fe69e1ad45058c/trans.jpg";
				}
				if(isweichat == 0){
					$(".weixinsel").eq(1).attr("checked",true); 
					$(".weixinBox").css("display","none");
				}else{
					$(".weixinsel").eq(0).attr("checked",true);
				}
				if(weichatType == -1){
					$(".gongzhonghao select").val("0");
					$(".guanzhuNeed").css("display","none");
				  	$(".autoReplyBox").css("display","none");
				  	$(".keyWordsBox").css("display","none");
				}else{
					$(".gongzhonghao select").val(weiChatAppId);//设置公众号被选择项
					$(".guanzhuNeed").css("display","block");
				  	$(".autoReplyBox").css("display","block");
				  	$(".keyWordsBox").css("display","block");
				  	$(".wneed").css("display","block");
				}
				if(isAttention == 0 ){ //微信公众号是否需要关注
					$(".guanzhusel").eq(1).attr("checked",true);
					//$(".autoReplyBox").css("display","none");
					//$(".keyWordsBox").css("display","none");
				}
				else if(isAttention == 1 ){
					$(".guanzhusel").eq(0).attr("checked",true);
					$(".autoReplyBox").css("display","block");
					$(".keyWordsBox").css("display","block");
				}
				$("#autoReply").val(autoReply); //被关注自动回复
				$("#keyWords").val(keyWords);   //关键字自动回复
				$("#erweimaImg").attr('src',attentionImagePath);
				//分享邀请奖励
				$(".askShareSelectItem").eq(sharePriceType).attr("checked",true);
				if(sharePriceType != 0){
					$(".rewardNumbox>div").eq(sharePriceType).show().siblings().hide();
					$(".rewardNumbox>div").eq(sharePriceType).children("div").children(".sharePriceTimes").val(sharePriceTimes);
					$(".rewardNumbox>div").eq(sharePriceType).children("div").children(".shareTopLimit").val(shareTopLimit);
				}
				layerUi();
				lotterMsg=JSON.parse(lotterMsg).lotteryList;
				drawing(msg,lotterMsg);
				for(var n=0;n<m_length;n++){
					_changeAble.find("img").eq(n).attr('src',imgMsg[n]);
	       		 }
				for(var i=0;i<c_length;i++){
					_changeAble.eq(i).css('top',pageMsg[i].top);
					_changeAble.eq(i).css('left',pageMsg[i].left);
					_changeAble.eq(i).css('width',pageMsg[i].width);
					_changeAble.eq(i).css('height',pageMsg[i].height);
		        }
				$("#iframePhone").contents().find(".dieText").html(dieText);
				$("#iframePhone").contents().find(".gzText").html(gzText);
				um.setContent(gzText);
			}
		});
 		},100)
 	}
 	
	function getUrlParam(name) {
		var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
		var r = window.location.search.substr(1).match(reg);  //匹配目标参数
		if (r != null) return decodeURI(r[2]);
		return null; //返回参数值
	};
	// 已发布修改
	function sendIngMsg() {
		var actNo1 = getUrlParam('actNO');
		var _autoReplys = $("#autoReply").val();
		var _keyWords = $("#keyWords").val();
		var lotteryNumOne = $('.addYesBtn').eq(0).attr('addnum');
		var lotteryNumTwo = $('.addYesBtn').eq(1).attr('addnum');
		var lotteryNumThree = $('.addYesBtn').eq(2).attr('addnum');
		var lotteryNumFour = $('.addYesBtn').eq(3).attr('addnum');
		if(uploadFlag == true){
			uploadImage();
		}
		if(uploadFlagEr == true){
			uploadImageEr();
		}
		$.ajax({
			url:'../login/ActivityConfigsNowController/updateHomePage',
			type:'post',
			data:{
				activityNO:actNo1, //活动编号
				activityName:acTitle,//活动名称
				startTime:acBTime,//活动开始时间
				endTime:acETime ,//活动结束时间
				autoReply:_autoReplys ,
				keyWords:_keyWords,//关键字
				transTitle:shareTitle,//微信分享标题
				transDesc: shareContext,//微信分享内容描述
				maxJoinNumPerDay:maxJoinNumPerDay, //最多参与每天/人
				maxJoinNum:maxJoinNum,//用户参与人数最多人次
				everydayMaxHitNum:everydayMaxHitNum,//用户每天最多中奖
				maxHitNum:maxHitNum,//用户总共可中奖
				totalRate:totalHitRate,//总中奖概率
				divContent:JSON.stringify(ch_pageMsgJson),//活动说明
				lotteryNumOne:lotteryNumOne,// 奖项一增加数量
				lotteryNumTwo:lotteryNumTwo,//奖项二增加数量
				lotteryNumThree:lotteryNumThree, //奖项三增加数量
				lotteryNumFour:lotteryNumFour, //奖项四增加数量
			},
			success:function (data) {
				var data =JSON.parse(data);
				if(data.resultCode == 0){
					window.location.href ="../pages/activeDetails.html?actNo="+actNo1;
				}else{
					layer.alert(data.resultMsg)
				}
			}
		})
	}
	function ingXuanRan() {
		$('.bianjiBtn').css('display','block')
		getIframe();
		setTimeout(function() {
			$.ajax({
				type:"get",
				url:"../login/ActivityConfigs/getActivityConfigsInfoByNo",
				data:{actNO:actNO,templateId:templateId,type:'publishEdit'},
				async:false,
				success:function(data){
					var data=JSON.parse(data);
					var msg=data.resultMsg.ACTIVITYCONFIGS;
					var imgMsg=JSON.parse(data.resultMsg.ACTIVITYCONFIGS.htmlContent).imgMsg;
					var pageMsg=JSON.parse(data.resultMsg.ACTIVITYCONFIGS.htmlContent).pageElement;
					var lotterMsg=JSON.parse(data.resultMsg.ACTIVITYCONFIGS.htmlContent).lotteryList;
					var lotteryListNum = data.resultMsg.LOTTERYLIST;
					var lotteryNumInput = $('.lotteryNum');
					var sharePriceType = msg.sharePriceType;
					var sharePriceTimes = msg.sharePriceTimes;
					var shareTopLimit = msg.shareTopLimit;
					for(var i=0;i<4;i++){
						lotteryNumInput.eq(i).val(lotteryListNum[i])
					}
					transImgSrc=msg.transImgPath;
					transImgErSrc=msg.attentionImagePath;
					gzText=JSON.parse(data.resultMsg.ACTIVITYCONFIGS.htmlContent).gzText;
					dieText=JSON.parse(data.resultMsg.ACTIVITYCONFIGS.htmlContent).dieText;
					platIframe=JSON.parse(data.resultMsg.ACTIVITYCONFIGS.htmlContent).platIframe;
					var isweichat = msg.isweichat;
					var weichatType = msg.weichatType;
					var weiChatAppId = msg.weiChatAppId;
					if(weichatType==-1){
						weiChatAppId="";
					}
					var isAttention = msg.isAttention;
					var autoReply = msg.autoReply;
					var keyWords = msg.keyWords;
					var attentionImagePath=msg.attentionImagePath;
					$('.jiangx').css('height','450px');
					$('.leftNumText').text('剩余数量');
					$('.mainHeadSave,.mainHeadView').css({"cursor":"not-allowed","color":"#bdb9b9"}).off().click(function () {
						return false;
					}).find('span').css({"cursor":"not-allowed","color":"#bdb9b9"});
					$('.checkboxFirst,.ordinaryLi').off().click(function () {
						return false;
					});
					$('.weixinsel,.gongzhonghao select,.awardsName[name="lotteryName"],.guanzhusel').attr('disabled','true');
					$('.lotteryNum').attr('disabled','true').css({"color":'black',"background":'white'});
					$('.bianjiBtn').show().click(function () {
						$(this).parent('.clearfix').find('.addDiv').show();
					});
					$('.addYesBtn').click(function () {
						var  val = $(this).parent('.addDiv').find('.addInput').val();
						if(val==""||val==undefined){
							val=0;
						}
						var  leftInput = $(this).parent('.addDiv').prevAll('.lotteryNum');
						var leftNum = leftInput.val();
						leftInput.val( parseInt(val) + parseInt(leftNum));
						var addNum = $(this).attr('addNum');
						$(this).attr('addnum',parseInt(val) +parseInt(addNum) );
						$(this).parent('.addDiv').hide();
						calculateTotalPrice();
					})
					if(sharePriceType != 0){
						$('.shareRules').find("input").attr('disabled','true');
						$('.askShareWard select').attr('disabled','true');
						$(".rewardNumbox>div").eq(sharePriceType).show().siblings().hide();
						$(".rewardNumbox>div").eq(sharePriceType).children("div").children(".sharePriceTimes").val(sharePriceTimes);
						$(".rewardNumbox>div").eq(sharePriceType).children("div").children(".shareTopLimit").val(shareTopLimit);
					}
					else{
						$('.sharepriceType .askShareSelectItem').attr('disabled','true');
					}
					layerUi();
					$('.addNoBtn').click(function () {
						$('.addDiv').hide();
					})
					$('.mainHeadSend').off().click(function () {
						var jc = publish();
						getDiv();
						if(jc == false){

						}else{
							$.ajax({
								type : "POST",
								url : "../ActivityAccount/getBalance",
								dataType : "json",
								async:false,
								success : function(data) {
									if(data.resultCode!==""){
										balance=parseFloat(parseFloat(data.resultMsg)/100);
									}
									if(totalBudet>parseInt(balance)){
										layer.open({
											// skin: 'layui-layer-rim',//加上边框
											area: ['420px', '200px'], //宽高
											title : '提示',
											content : "<div style='font-size:16px;'>当前账户余额小于预算总金额，是否继续发布？</div><div style='font-size:13px;color:#999'>账户余额不足时，会导致充值失败</div>",
											btn: ['确定', '取消'],
											yes : function(index, layero){
												layer.close(index);
												//var activityNo=saveMo(operaType);
												sendIngMsg();
											}
										})
									}else{
										sendIngMsg();
									}
								}
							})
						};
					})
					// $('.lotteryNum').click(function () {
					// 	layer.prompt({title:'输入增加的奖品数量',formType: 0,},function(val, index){
					// 		layer.msg('得到了'+val);
					// 		layer.close(index);
					// 	});
					// })
					if(attentionImagePath == ''||attentionImagePath==undefined){
						attentionImagePath = "http://120.26.41.88:8888/wxtrans/657444e771b24b7992fe69e1ad45058c/trans.jpg";
					}
					if(isweichat == 0){
						$(".weixinsel").eq(1).attr("checked",true);
						$(".weixinBox").css("display","none");
					}else{
						$(".weixinsel").eq(0).attr("checked",true);
					}
					$(".gongzhonghao select").val(weiChatAppId);//设置公众号被选择项
					if(weiChatAppId == ''||weiChatAppId==undefined ||weiChatAppId=="0"){
						$(".guanzhuNeed").css("display","none")
						$(".autoReplyBox").css("display","none")
						$(".keyWordsBox").css("display","none")
						//$(".wneed").css("display","none");
						isAttention=0;
					}else{
						$(".guanzhuNeed").css("display","block")
						$(".autoReplyBox").css("display","block")
						$(".keyWordsBox").css("display","block")
						$(".wneed").css("display","block");
					}
					if(isAttention == 0 ){ //微信公众号是否需要关注
						$(".guanzhusel").eq(1).attr("checked",true);
						//$(".autoReplyBox").css("display","none");
						//$(".keyWordsBox").css("display","none");
					}
					else if(isAttention == 1 ){
						$(".guanzhusel").eq(0).attr("checked",true);
						$(".autoReplyBox").css("display","block");
						$(".keyWordsBox").css("display","block");
					}
					$("#autoReply").val(autoReply); //被关注自动回复
					$("#keyWords").val(keyWords);   //关键字自动回复
					layerUi();
					$("#erweimaImg").attr('src',attentionImagePath);
					drawings(msg,lotteryListNum);
					for(var n=0;n<m_length;n++){
						_changeAble.find("img").eq(n).attr('src',imgMsg[n]);
					}
					for(var i=0;i<c_length;i++){
						_changeAble.eq(i).css('top',pageMsg[i].top);
						_changeAble.eq(i).css('left',pageMsg[i].left);
						_changeAble.eq(i).css('width',pageMsg[i].width);
						_changeAble.eq(i).css('height',pageMsg[i].height);
					}
					$("#iframePhone").contents().find(".dieText").html(dieText);
					$("#iframePhone").contents().find(".gzText").html(gzText);
					um.setContent(gzText);

				}
			});
		},100)
	}
 	
	//选中状态判断
	var itemSelected=false;
	//是否多图替换
	var isDuo=false;
	//多图片替换按钮选中项
	var changePick="";
	var changeType="";
	var selected="";
	var $this="";
/*	$(".outerBodyDiv").find("div").filter(".mainHeaderDiv").click(function(){
	})*/
	
	//服务号，订阅号等查询
	function getAllAppId(enterType){
		$.ajax({
	    	type:"get",
	    	url:"../login/ActivityConfigsNowController/getActivityUserAppid",
	    	async:false,
	    	data:{},
	    	success:function(res){
	    		var res = JSON.parse(res);
	    		var optionHtml = '';
	    		if(res.resultCode == 0){
	    			var optiondefHtml = "<option value='0'>--请选择(默认不选)--</option>";
	    			var optionHtml="";
	    			var gzhType = ['订阅号','订阅号','服务号'];
		    		$.each(res.resultMsg, function(index, msg){
		    			var appId = msg.sysKey;
			    			appId = appId.substr(appId.indexOf('-') + 1);
			    			var sd=msg.backField02;
			    			sd = parseInt(sd.split("=")[1].split("}")[0]);
		    			if(enterType==0){
							optiondefHtml += "<option value ='"+appId+"' data-type='"+sd+"' >"+msg.backField01+"("+gzhType[sd]+")</option>";
		    			}
		    			else if(enterType==1){
			    			if(sd==2){
			    				optionHtml += "<option value ='"+appId+"' data-type='"+sd+"' >"+msg.backField01+"("+gzhType[sd]+")</option>";
			    			}
			    			else{
			    				
			    			}
		    			}
		    		})
		    		if(enterType==0){
		    			$(".gongzhonghao select").html(optiondefHtml);
		    		}
		    		else if(enterType==1){
			    		$(".gongzhonghao select").html(optionHtml);	
		    		}
		    		
		    		layerUi();
	    		}
	    	},error:function(){
	    		console.log("调用公众号列表接口失败");
	    	}
        })
	}
	
	function layerUi(){
			layui.use('form', function(){
		  var form = layui.form();
		  form.render();//重新渲染form
			form.on('radio(weixin)', function(data){
				  if(data.elem.value == 1){
				  	$(".weixinBox").css("display","block");
				  }else{
				  	$(".weixinBox").css("display","none");
				  }
				});
			form.on('radio(sharepriceType)', function(data){
				$(".rewardNumbox>div").eq(data.elem.value).show().siblings().hide();
				});
			form.on('select(gzhguanzhu)', function(data){
			  if(data.elem.value == 0){
			  	$(".guanzhuNeed").css("display","none");
			  	$(".autoReplyBox").css("display","none");
			  	$(".keyWordsBox").css("display","none");
			  	//$(".wneed").css("display","none");
			  }else{
			  	$(".guanzhuNeed").css("display","block");
			  	$(".autoReplyBox").css("display","block");
			  	$(".keyWordsBox").css("display","block");
			  	//$(".wneed").css("display","block");
			  }
			});
			form.on('radio(guanzhu)', function(data){
			  
			});
		});
		};
		layerUi();
		//获取剩余金额
	$.ajax({
        type : "POST",
        url : "../ActivityAccount/getUsedBalance",
        data : {},
        dataType : "json",
        success : function(data) {
            if(data && data!=""){
                if(data.resultCode != 0){
                    $('#leftMoney').html(data.resultMsg)
                    return;
                }else{
                    $('#leftMoney').html("￥"+parseFloat(parseFloat(data.resultMsg)/100))
                }
            }
        }
    });
    //判断输入是否是正整数
    function keyUp($this){
		if(!/^[0-9]*[1-9][0-9]*$/.test($this.value))
		{
			layer.tips('只能输入正整数',$this);
			$this.value='';
		}
	}
	
	$(".gameRules").find("input").click(function(){
	})
	
	
	function alive(){
		$.ajax({
			type:"get",
			async:true,
			url:"../ActivityUser/keepAlive",
			success:function(data){
				var data=JSON.parse(data);
				if(data.resultCode==0){
					
				}
				else{
					window.location.href="../login.html";
				}
			}
			
		});
		isChange="true";
	}
	var module=(function (){
		var stepChange =function(i){
				$("#iframePhone").contents().find("body").children("div").css("display","none");
			if(i==0){
				$("#iframePhone").contents().find("body").children("div").eq(0).css("display","block");
				$("#iframePhone").contents().find(".gzPage").hide();
			}
			else if(i==1){
				$("#iframePhone").contents().find("body").children("div").eq(0).css("display","block");
				$("#iframePhone").contents().find(".gzPage").show();
			}
			/*else if(i==2){
				$("#iframePhone").contents().find("body").children("div").eq(2).css("display","block");
			}*/
			else{
				$("#iframePhone").contents().find("body").children("div").eq(1).css("display","block");
			}
			
			$(".steps .step").removeClass("active");
			$(".steps .step").eq(i).addClass("active");
		};
		var gameStepChange = function(i){
			$("#iframePhone").contents().find("body").children("div").css("display","none");
			$("#iframePhone").contents().find("body").children("div").eq(2).css("display","block");
			$("#iframePhone").contents().find(".item").css("display","none");
			$("#iframePhone").contents().find(".item").eq(i).css("display","block");
			$(".steps .step").removeClass("active");
			$(".steps .gameStep").eq(i).addClass("active");
		}
		var ls=function($this){
			$("#iframePhone" ).contents().find(".selected").removeClass("selected");
			if($(".t-ac").attr("id")=="l-s"){
			}
			else{
				$(".steps").animate({left:"-200px"});
				$(".left").animate({left:"60px"});
				$(".l-top .t").removeClass("active");
				$(".l-top .t").eq(0).addClass("active");
				$(".l-top .tog").hide();
				$(".pic-change").animate({left:"-336px"});
				$(".tab-t").removeClass('t-ac');
				$this.addClass('t-ac');
				$("#l-b-s").val(0);
				$("#l-b-s").change();
				$("#l-t-1").show();
				$("#l-t-2").hide();
			}
		};
		var lp=function($this){
			$("#iframePhone" ).contents().find(".selected").removeClass("selected");
			if($(".t-ac").attr("id")=="l-p"){
			}
			else{
				$(".left").animate({left:"-336px"});
				$(".pic-change").animate({left:"-336px"});
				$(".steps").animate({left:"60px"});
				$(".tab-t").removeClass('t-ac');
				$("#l-p").addClass('t-ac');
			}
		};
		var ltop=function($this){
			var t= $(".l-top .t");
			t.removeClass('active');
			$this.addClass('active');
			if($this.index()==0){
				$("#l-t-1").show();
				$("#l-t-2").hide();
			}
			else{
				$("#l-t-2").show();
				$("#l-t-1").hide();
			}
		};
		var selChan=function($this){
			var i=$this.val();
			var $par=$(".b-con").children("div");
			if($par.eq(i).css("display")=="none"){
				$(".left").show();
				var imgs=$par.find("img");
				for(var j=0;j<$par.children("div").length;j++){
					var dsrc=imgs.eq(j).attr("data-src");
					imgs.eq(j).attr("src",dsrc);
				}
			}
			else{
			}
			$par.hide();
			$par.eq(i).show();
			
		};

		var lTopTog=function(){
			if(itemSelected==false){
		 		$(".left").animate({left:"-336px"});
			 	$(".pic-change").animate({left:"-336px"});
			 	$("#l-p").click();
			 	$("#iframePhone" ).contents().find(".selected").removeClass("selected");
		 	}
		 	else{
				$(".left").animate({left:"-336px"});	 
		 	}
		};
		 var changeTog=function(){
		 	$(".pic-change").animate({left:"-336px"});
		 	$("#l-p").addClass("t-ac");
		 	$(".steps").animate({left:"60px"});
		 	$("#iframePhone" ).contents().find(".selected").removeClass("selected");
		 };
		 var iframePcik = function($this){
		 		selected=$this;
			 	var imgLen=$this.find("img").length;
			 	$("#iframePhone" ).contents().find(".selected").removeClass("selected");
			 	$this.addClass("selected");
			 	//单图片
			 	if(imgLen==1){
			 		var val=$this.find("img").attr("type");
			 		$(".l-top .tog").show();
				 	isDuo=false;
				 	itemSelected=false;
				 	$(".pic-change").animate({left:"-336px"});
				 	picCh(val);
			 	}
			 	else{
			 			$(".l-top .tog").show();
					 	picShow($this);
			 	}
		 };
		var picsSave=function($this){
		  	var target=$("#iframePhone" ).contents().find(".selected").find("img");
		  	for(var i=0;i<$this.length;i++){
		  		var src=$(".change-body").find("img").eq(i).attr("src");
		  		var src1=target.eq(i).attr("src");
		  		target.eq(i).attr("src",src);
		  	}
		  	if($("#iframePhone" ).contents().find(".selected").hasClass("pubChange")){
		  		var nLen=$("#iframePhone" ).contents().find(".noChange").length;
		  		var iLen=$("#iframePhone" ).contents().find(".noChange").find("img").length;
		  		for(var j=0;j<nLen;j++){
		  			for(var n=0;n<iLen;n++){
		  				var src=$(".change-body").find("img").eq(n).attr("src");
				  		$("#iframePhone" ).contents().find(".noChange").eq(j).find("img").eq(n).attr("src",src);
		  			}
		  		}
		  	}
		  	else{
		  		
		  	}
		  	$(".pic-change").animate({left:"-336px"});
		  	$("#l-p").click();
		};
		var itemChange=function($this){
			isDuo=true;
		 	itemSelected=true;
		 	changeType=".pic-change";
		 	var value="";
		 	changePick=$this.siblings(".item-pic").children("img");
		 	value=$this.siblings(".item-pic").children("img").attr("type");
			$(".left").animate({left:"60px"});
			picCh(value);
		};
		var bgChange=function($this){
			if($("#iframePhone" ).contents().find(".selected").length==1){
				selectChange($this);
			}
			else{
				var index=$(".steps .active").index();
				var src=$this.children("img").attr("src");
				$("#iframePhone" ).contents().find("body").children("div").eq(index).find(".background").children("img").attr("src",src);
			}
		};
		var hoverDel=function($this){
				if($this.parent().attr("id")=="my_pic"){
					if($("#iframePhone" ).contents().find(".selected").length==1){
						
					}
					else{
						var close="<div class='zhezhao'></div>"+
								"<div class='delPic' id='delPic'></div>";
						$this.prepend(close);
					}
				}
				else{
					var close="<div class='zhezhao'><div>";
					$this.prepend(close);
				}
		};
		var anxu=function($par,$img){
			if($par.css("display")=="none"){
				var imgs=$img.find("img");
				for(var i=0;i<$img.children("div").length;i++){
					var dsrc=imgs.eq(i).attr("data-src");
					imgs.eq(i).attr("src",dsrc);
				}
				$par.show();
			}
			else{
			}
		}
		return{
			step:stepChange,
			ls:ls,
			lp:lp,
			ltop:ltop,
			selChan:selChan,
			lTopTog:lTopTog,
			changeTog:changeTog,
			iframePcik:iframePcik,
			picsSave:picsSave,
			itemChange:itemChange,
			bgChange:bgChange,
			hoverDel:hoverDel,
			anxu:anxu,
			gameStepChange:gameStepChange
		};
	})();
	//步骤点击事件
	$(".steps").on("click",".step:not(.gameStep)",function(){
		alive();
		var i=$(this).index();
		module.step(i);	
	})
		$(".steps").on("click",".gameStep",function(){
		alive();
		var i=parseInt($(this).attr("id"));
		module.gameStepChange(i);	
	})
	//素材按钮点击事件
	$("#l-s").click(function(){	
		alive();
		var $par=$(".left");
		var $img=$("#pic-bg");
		$this=$(this);
		module.ls($this);
		module.anxu($par,$img);
	});
	//页面按钮点击事件
	$("#l-p").click(function(){	
		alive();
		$this=$(this);
		module.lp($this);
	});
	//图片库、我的图片tab切换
	$(".l-top .t").click(function(){
		alive();
		$this=$(this);
		if($this.index()==1){
			var $par=$("#l-t-2");
			var $img=$("#my_pic");
			module.anxu($par,$img);
		}
		else{
		}
		module.ltop($this);
	});
	//图片库下拉框切换
	 $("#l-b-s").change(function(){
	 	alive();
		$this=$(this);
		module.selChan($this);
	 })
	 //素材窗口弹回
	 $(".l-top .tog").click(function(){
	 	alive();
	 	module.lTopTog();
	 })
	 //多图片窗口弹回
	 $(".change-top .tog").click(function(){
	 	alive();
	 	module.changeTog();
	 })
	//iframe框图片选中
	var dsq = setInterval(function () {
		var iframeIsLoded = $('#iframePhone').attr('isLoaded')
		if(iframeIsLoded){
			clearInterval(dsq);
			$("#iframePhone").contents().on("click",".changeAble:not(.noChange)",function(e){
				alive();
				$this=$(this);
				document.getElementById("iframePhone").contentWindow.tips($this,e);
				module.iframePcik($this);
			})
		}else{

		}

	},500)

	$(".change-body").on("click",".change-bot input",function(){
		alive();
	  	$this=$(".change-body").find("img");
	  	module.picsSave($this);
	  })
	  //多图片替换按钮
	 $(".change-body").on("click",".change-item .item-ch",function(){
	 	alive();
	 	$this=$(this);
	  	module.itemChange($this);
	 })
	/*
	  * 
	  选中替换
	 */
	//点击背景
	$("#pic-bg").on("click",".pic-con",function(){
		alive();
		$this=$(this);
	  	module.bgChange($this);
	})
		//点击非背景
	$(".pic-store-p").on("click",".pic-con-p",function(){
		alive();
		$this=$(this);
		selectChange($this);
	})
	//我的图片 悬浮显示删除按钮
	$("#my_pic").on("mouseenter",".pic-con-p",function(){
		$this=$(this);
	  	module.hoverDel($this);
	})
	$("#my_pic").on("mouseleave",".pic-con-p",function(){
		$(this).children(".delPic").remove();
		$(this).children(".zhezhao").remove();
	})
	
	//点击删除图片按钮
	$("#my_pic").on("click",".pic-con-p #delPic",function(){
					alive();		
			   		var imgId= $(this).siblings("img").attr("id");
					var node=$(this).parent("div");
					$.ajax({
						url:"../WorkBenchController/deleteImage?imageId="+imgId,
						success:function (data) {
							var data=JSON.parse(data);
							if(data.resultCode==0){
								node.remove();
								layer.msg('删除成功', {
								            offset:['180px','90px'],
								             area: ['300px', '50px'],
								            time: 2000
						       			 });
							}
							else{
								layer.msg('删除失败', {
								            offset:['180px','90px'],
								             area: ['300px', '50px'],
								            time: 2000
						       			 });
							}
						}
					})
	})
	//规则编辑点击跳到对应界面
	$(".rules").on("click","#myEditor",function(){
		alive();
 		module.step(1);
 		module.lp();
 })
 	
 	//left-layer弹窗方法
	function notice(title){
		var width=document.body.clientWidth/2-150;
		layer.msg(title, {
			offset:['80px',width+'px'],
			area: ['300px', '50px'],
			time: 2000
		});
	}
	
	function notice1(title){
		var width=document.body.clientWidth/2-150;
		layer.msg(title, {
			offset:['160px',width+'px'],
			area: ['300px', '80px'],
			time: 10000
		});
	}
	 function picShow(val){
	 	//参数, class类find(img);
	 	$(".pic-change").animate({left:"60px"});
	 	$(".steps").animate({left:"-200px"});
	 	$(".left").animate({left:"-336px"});
	 	$(".tab-t").removeClass('t-ac');
	 	duotupian(val);
	 }
	 	 //区域多图片
	 function duotupian(val){ 	
	 	$this=val;
	 	var html="";
		var imgLen=$this.find("img").length;
		for(var i=0;i<imgLen;i++){
		var src=$this.find("img").eq(i).attr("src");
		var type=$this.find("img").eq(i).attr("type");
			html+= "<div class='change-item'>"+
						"<div class='item-pic'>"+
							"<img src="+src+" type="+type+">"+
						"</div>"+
						"<div class='item-ch'><span>更换图片</span></div></div>"
			}
			html+="<div class='change-bot'><input type='button' value='保&nbsp;&nbsp;存'  class='save' id='pic-save'></div>"
			$(".change-body").html(html);
		}

	 //类别判断并且弹出素材匡
	 function picCh(value){
	 	$("#l-b-s").val(value);
	  	$("#l-b-s").change();
	  	var t= $(".l-top .t");
		t.removeClass('active');
		t.eq(0).addClass('active');
		$("#l-t-1").show();
		$("#l-t-2").hide();
	 	$(".left").animate({left:"60px"});
		$(".tab-t").removeClass('t-ac');
	 }

	//替换图片
	function selectChange($this){
		var imgSrc=$this.children("img").attr("src");
		//var len=$(".midContentDiv").find(".selected").length;
		var len=$("#iframePhone" ).contents().find(".selected").length;
		//有选中项目
		if(len==1){
			//多图片替换
			if(isDuo==true){
				//有多图片替换进入
				if(itemSelected == true){
					changePick.attr("src",imgSrc);
					isDuo=false;
					itemSelected=false;
					$(""+changeType+"").animate({left:"60px"});
					$(".left").animate({left:"-336px"});
				}
				else{
				}
			}
			//单图片直接替换
			else{
				$("#iframePhone" ).contents().find(".selected").find("img").attr("src",imgSrc);
			}
		}
		//没有选中项
		else{
		};
	}
	//px转换rem
	function pxToRem(str) {
			var length=str.length;
            var numPx=str.substring(0,length-2);
            var numRem=parseFloat(numPx/12.8).toFixed(2) + 'rem';
            return numRem
        }
	//获取
	//保存接口
	function saveMo(operaType){
				//appId = $(".gongzhonghao select").val();
				for(var i=0;i<weixin.length;i++){
					if(weixin[i].checked ==true){
						weixinVal=weixin[i].value;
					}
				}
				if(weixinVal == 1){
					appId = $(".gongzhonghao select").val();
					if(appId == 0){
						appId='';
					}
					weichatType =$(".gongzhonghao select").children('option:selected').data("type");
					for(var j=0;j<guanzhu.length;j++){
						if(guanzhu[j].checked == true){
							guanzhuVal = guanzhu[j].value;
							}
					}
					autoReply = $("#autoReply").val();
					keyWords = $("#keyWords").val();
					if(appId == ''){
						guanzhuVal='';
						autoReply='';
						keyWords='';
					}
					
				}else if(weixinVal == 0){
					appId='';
					guanzhuVal='';
					autoReply = '';
					keyWords = '';
				}
				//获取分享的选择的值
				for(var k=0;k<share.length;k++){
					if(share[k].checked ==true){
						sharePriceType=share[k].value;
					}
				}
				if(sharePriceType != 0){
					sharePriceTimes = $(".rewardNumbox>div").eq(sharePriceType).children("div").children(".sharePriceTimes").val();
					shareTopLimit = $(".rewardNumbox>div").eq(sharePriceType).children("div").children(".shareTopLimit").val();
				}
		        getIframe();
		        ward = jiangP();
		        getDiv();
		        $.ajax({
		        	type:"post",
		        	url:"../login/ActivityConfigsNowController/savaHomePage",
		        	async:false,
		        	data:{
		        		divContent:JSON.stringify(ch_pageMsgJson),
		        		templateId:templateId,
		        		actNO:actNO,
		        		activityName:acTitle,
		        		startTime:acBTime,
		        		endTime :acETime,
		        		isNational:isNational,
		        		transTitle : shareTitle,
		        		transDesc : shareContext,
		        		transImgPath: transImgSrc ,//"http://om7yr8rwd.bkt.clouddn.com/moren.png",
		        		erweimaPath : transImgErSrc,//"http://om7yr8rwd.bkt.clouddn.com/moren.png",
		        		//everyOrMore:everyOrMore,
		        		//totalBudet:totalBudet,
		        		maxJoinNumPerDay :maxJoinNumPerDay, // 最多参与每天/人
		        		maxJoinNum: maxJoinNum,// 用户参与人数最多人次
		        		everydayMaxHitNum :everydayMaxHitNum,
		        		totalRate :totalHitRate,
		        		maxHitNum:maxHitNum,
		        		lotteryList:ward,
		        		type:operaType,
		        		isWeichat:weixinVal,
		        		appId:appId,
		        		isAttention:guanzhuVal,
		        		weichatType:weichatType,
		        		autoReply:autoReply,
		        		keyWords:keyWords,
		        		sharePriceType:sharePriceType,
		        		sharePriceTimes:sharePriceTimes,
		        		shareTopLimit:shareTopLimit
		        	},
		        	success:function(data){
		        		var data = JSON.parse(data);
		        		//成功
		        		if(data.resultCode==0){
		        			returnFlag=0;
		        			activityNo=data.resultMsg;
		        			actNO=data.resultMsg;
		        			uploadImage(operaType);
		        			uploadImageEr(operaType)
		        			var state = {};
							var title = '';
							var url = 'index.html?operator=edit&actNO='+actNO+'&templateId='+templateId+'&backField02='+backField02+'';
				    		history.pushState(state, title, url);
		        		}
		        		else{
		        			returnFlag=1;
		        			layer.msg(data.resultMsg);
		        		}
		        	}
		        });
		        return activityNo;
	}
	
		//复位按钮
	$(".mainHeadBack").click(function(){
		layer.confirm('确认不保存所有修改，返回至初始页面状态？', {
			btn: ['确认','取消'] //按钮
		}, function(){
			notice('复位成功！');
			xuanRan();
		}, function(){
			notice('取消操作！')
		});
	})
	//保存按钮
		$(".mainHeadSave").click(function(){
			var operaType=0;
			if(isChange=="true"){
				saveMo(operaType);
				if(returnFlag==0){
					notice("保存成功");
					isChange="false";
				}
				else{
					notice("保存失败");
				}
			}else{
			}
		})
	//预览按钮
		$(".mainHeadView").click(function(){
			var viewType=1;
			var flag= publish();
			var operaType=1;
			if(flag==false){
				
			}else{
				var activityNo=saveMo(operaType);
				if(activityNo==""){
					
				}
				else{
					generateUrl(activityNo,viewType);
				}
				
				//viewType="send";
				if(returnFlag==0){
					$(".black").show();
					$("#erwei").show();
				}
				else{
					//notice("预览失败");
				}
			}
		})
			//发布按钮
		$(".mainHeadSend").click(function(){
			var viewType=2;
			var flag=publish();
			var operaType=2;
			var balance =0;
			if(flag==false){
			}
			else{
				$.ajax({
					type : "POST",
					url : "../ActivityAccount/getUsedBalance",
					dataType : "json",
					async:false, 
					success : function(data) {
							if(data.resultCode!==""){
								balance=parseFloat(parseFloat(data.resultMsg)/100);
							}
							if(totalBudet>parseInt(balance)){
								layer.open({
								 // skin: 'layui-layer-rim',//加上边框
								  area: ['420px', '200px'], //宽高
								  title : '提示',
								  content : "<div style='font-size:16px;'>当前账户余额小于预算总金额，是否继续发布？</div><div style='font-size:13px;color:#999'>账户余额不足时，会导致充值失败</div>",
								  btn: ['确定', '取消'],
								  yes : function(index, layero){
								  		layer.close(index);
					  					var activityNo=saveMo(operaType);
								 }
								})
							}else{
								var activityNo=saveMo(operaType);
							}
					}
				})
			}
			
			//var str="http://test.4gliuliang.cc/dhwx-fcom-activity/qiyekaifa/moban/chuntian/chuntian.html?type="+type+"&&actNO="+actNO+"";
			
			//window.location.href="moban/chuntian/chuntian.html?type="+type+"&&templateId="+tempId;
		})	
		function view(params){
			$.ajax({
					type : "POST",
					url : "../login/ActivityConfigs/publish",
					data : params,
					dataType : "json",
					success : function(data) {
						//dig.close();
						var title = 'alert';
						 if (data.resultCode == 0) {
						 	
							/*title = 'ok';
							window.open("http://test.4gliuliang.cc/dhwx-fcom-activity/pages/auth/authrizor.html","_blank")
							layer.confirm('您是否完成授权？', {
								  btn: ['是','否'] //按钮
								}, function(){
									
									layer.closeAll();
									
								}, function(){
								  layer.msg( {
								    time: 1000, //2s后自动关闭 
								  });
								});*/
						}else{
							//	alertDia(data.resultMsg, title);
						} 
					}
			});
		}
		function fabu(operaType){
					if(activityNo==""){
					}
					else{
						var viewType ='';
						viewType = operaType;
						generateUrl(activityNo,viewType);
						
					}
				}
		//获取二维码
		function generateUrl(activityNo,viewType){
				$.ajax({
					async:false,
					type : "POST",
					url : "../login/ActivityConfigs/generateUrl",
					data : {
						acId:activityNo,
						statusType:viewType//预览、发布
					},
					dataType : "json",
					success : function(data) {
						if(data.resultCode==1){
							$('#qrcode').find("canvas").remove();
							$('#qrcode').qrcode(data.resultMsg.accessUrl);
							$('#href').val(data.resultMsg.accessUrl);
							returnFlag=0;
							if(viewType == 2){
								window.location.href="../pages/activeDetails.html?actNo="+activityNo+"";
							}
						}else{
							returnFlag=1;
							layer.msg(data.resultMsg);
						}
					}
				});
		};
	
			//二维码链接复制按钮
	$(".fuzhi").on("click","#fuzhi",function(){
		var Url=$("#href");
		Url.select(); // 选择对象
		document.execCommand("Copy"); // 执行浏览器复制命令
		//alert("已复制好，可贴粘。");
 	})
 	$("#erwei").on("click",".close_erwei",function(){
		$(".black").hide();
		$("#erwei").hide();
 	})
		//图片上传
			$("#up-pic").bind("click",function(){
								alive();
								$("#upimg").click();
							});
			$("#upimg").change(function(){
								checkUpImg();
							});
									//文件检测
						function checkUpImg() {
							//获取文件
							var file="";
							var src="";
							var srcc="";
							var fileList = document.getElementById('upimg').files;
							/*var filepath=$("#upimg")[0].files[0].name;*/
							for(var i=0; i<fileList.length; i++) { 
								/*file=fileList[i];
								//文件为空判断
								if (!file) {
									layer.msg("请先选择图片！")
								}
								//检测文件类型
								if (file.type.indexOf('image') === -1) {
									layer.msg("请选择图片文件！")
								}
								//计算文件大小
								var size = Math.floor(file.size / 1024);
								if (size > 500) {
									layer.msg("上传图片不得超过500K!");break;
								}
								src=window.URL.createObjectURL(file);
						      	loadImg(file,"hideImg");
								var html="<div class='pic-con-p'><img src='"+src+"'></div>" ;
								 $("#my_pic").prepend(html);*/
							}
							uploadImages();
						};
						function uploadImages() {
							  var data = new FormData();
					        //为FormData对象添加数据
					        //
					        $.each($('#upimg')[0].files, function(i, file) {
					            data.append('upload_file'+i, file);
					        });
					        $.ajax({
					            url:'../WorkBenchController/uploadImage',
					            type:'POST',
					            data:data,
					            cache: false,
					            contentType: false,    //不可缺
					            processData: false,    //不可缺
					            success:function(data){
					            	var code=JSON.parse(data);
					            	 if(code.resultCode==1){
					            	 	var msg=JSON.parse(code.resultMsg);
					            	 	$.each(msg,function (i,n) {
					            	 		var html="<div class='pic-con-p'><img src='"+n.name+"' id='"+n.id+"'></div>" ;
										 	$("#my_pic").prepend(html);
					            	 	});
					            	 	layer.msg('上传成功', {
								            offset:['180px','90px'],
								             area: ['300px', '50px'],
								            time: 2000
						       			 });
					            	 }
					            	 else{
					            	 	layer.msg(code.resultMsg, {
								           	offset:['180px','90px'],
								             area: ['300px', '50px'],
								            time: 2000
						       			 });
					            	 }
					            }
					        });
						}
	 var sysPic=$.ajax({
	 	type:"get",
	 	url:"../WorkBenchController/getAllImageByCondition",
	 	data:{type:1,templateId:templateId},
	 	dataType:"json",
	 	async:true,
	 	success : function(data){
	 		if(data.resultCode==0){
	 			var msg=JSON.parse(data.resultMsg);
		 		var bhtml="";//背景图片
		 		var ahtml="";//按钮
		 		var phtml="";//图片
	 		$.each(msg,function (i,n) {
	 			if(n.type==1){
	 				if(n.label==0){
	 				bhtml+="<div class='pic-con'><img src='' data-src='"+n.name+"' id='"+n.id+"'></div>";
	 				}
		 			else if(n.label==2){
		 				ahtml+="<div class='pic-con-p'><img src='' data-src='"+n.name+"' id='"+n.id+"'></div>";
		 			}
		 			else{
		 				phtml+="<div class='pic-con-p'><img src='' data-src='"+n.name+"' id='"+n.id+"'></div>";
		 			}
	 			}
	 			else{
	 				
	 			}
	 		})
	 		$("#pic-bg").html(bhtml);
	 		$("#pic-but").html(ahtml);
	 		$("#pic-p").html(phtml);
	 		}
	 		else{
	 			alert("登录过期");
	 		}
	 	}
	 });
	//加载我的图片
	var mypic=$.ajax({
	 	type:"get",
	 	url:"../WorkBenchController/getAllImageByCondition",
	 	data:{type:0,templateId:templateId},
	 	dataType:"json",
	 	async:true,
	 	success : function(data) {
	 		var msg=JSON.parse(data.resultMsg);
	 		var mhtml="";//背景图片
	 		$.each(msg,function (i,n) {
	 			if(n.type==0){
	 				mhtml+="<div class='pic-con-p'><img src='' data-src='"+n.name+"' id='"+n.id+"'></div>";
	 			}
	 		})
	 		$("#my_pic").html(mhtml);
	 	}
	 })
	
	
	//是否上传了微信分享图片
	var uploadFlag=false;
	var uploadFlagEr =false;
	$(".headerLogeDiv").click(function(){
	})
			/****
				 * 
				 * 
				 * 上传微信图标 开始
				 * ****/
				//文件检测
				function checkFile(operaType) {
					uploadFlag=true;
					//获取文件
					var file = document.getElementById('upload-file').files[0];
					//检测文件类型
					if(file.type.indexOf('image') === -1) {
						notice("请选择图片文件！");
						return false;
					}
					//文件为空判断
					if(!file) {
						notice("请选择图片！");
						return false;
					}
					//计算文件大小
					var size = Math.floor(file.size / 1024);
					if(size > 200) {
						notice("上传图片不得超过200K!");
						return false;
					}
					// 加载并显示文件 
					loadImage(file, 'xianshiImg');
					// 上传文件
					if(actNO==0){
						/*operaType=0;
						saveMo();
						uploadImage();*/
					}
					else{
						
					}
					return true;
				};
				function checkFileEr(){
					uploadFlagEr=true;
					//获取文件
					var file = document.getElementById('upload-erweima-file').files[0];
					//检测文件类型
					if(file.type.indexOf('image') === -1) {
						notice("请选择图片文件！");
						return false;
					}
					//文件为空判断
					if(!file) {
						notice("请选择图片！");
						return false;
					}
					//计算文件大小
					var size = Math.floor(file.size / 1024);
					if(size > 200) {
						notice("上传图片不得超过200K!");
						return false;
					}
					// 加载并显示文件 
					loadImage(file, 'erweimaImg');
					// 上传文件
					if(actNO==0){
						/*operaType=0;
						saveMo();
						uploadImage();*/
					}
					else{
						
					}
					return true;
				};
				
				var uploadImageState = 0;
				var uploadImageErState = 0;
				function uploadImage(operaType){
					uploadImageState = 1;
					if(uploadFlag == true){
						$.ajaxFileUpload({
						url: '../login/ActivityConfigs/uploadImage?acId=' + actNO,
						secureuri: false,
						fileElementId: 'upload-file', //文件上传域的ID
						dataType: 'json', //返回值类型 一般设置为json3
						type:"post",
						data:{imageType:0},
						success: function(data) {
							//dig.close();
							var title = 'alert';
							if(data.resultCode == 1) {
								transImgSrc=data.resultMsg;
								if(uploadImageState ==1 && uploadImageErState==1&& operaType==2){
									fabu(operaType);
								}
							} else {
								//notice1(data.resultMsg)
							}
						}
					})
					}else{
						if(uploadImageState ==1 && uploadImageErState==1&& operaType==2){
							fabu(operaType);
						}
					}
					uploadFlag = false;
				}
				function uploadImageEr(operaType){
					uploadImageErState =1;
					if(uploadFlagEr == true){
						$.ajaxFileUpload({
							url: '../login/ActivityConfigs/uploadImage?acId=' + actNO,
							secureuri: false,
							fileElementId: 'upload-erweima-file', //文件上传域的ID
							dataType: 'json', //返回值类型 一般设置为json
							data:{imageType:1},
							success: function(data) {
								//dig.close();
								var title = 'alert';
								if(data.resultCode == 1) {
								transImgErSrc=data.resultMsg;
									if(uploadImageState ==1 && uploadImageErState==1&& operaType==2){
										fabu(operaType);
										//generateUrl(activityNo,viewType);
									}
								} else {
									//notice1(data.resultMsg)
								}
							}
						})						
					}else{
						if(uploadImageState ==1 && uploadImageErState==1&& operaType==2){
										fabu(operaType);
										//generateUrl(activityNo,viewType);
									}
					}
					uploadFlagEr=false;
				}
				// 显示文件
				function loadImage(file, id) {
					var image = document.getElementById(id);
					image.onload = function() {
						var canvas = document.getElementById("myCanvas");
						var ctx = canvas.getContext("2d");
						ctx.clearRect(0, 0, canvas.width, canvas.height);
						canvas.width = image.width;
						canvas.height = image.height;
						ctx.drawImage(image, 0, 0, image.width, image.height);
					};
					// 在装载图像的过程中发生错误时调用的事件句柄。
					image.onerror = function() {
					};
					// 当用户放弃图像的装载时调用的事件句柄。
					image.onabort = function() {
					};
					// 
					var reader = new FileReader();
					reader.onload = function(evt) { image.src = evt.target.result; }
					reader.readAsDataURL(file);
				};
				$("#uploadBut").bind("click", function(){
					$("#upload-file").click();
				});
				$("#upload-file").change(function() {
					checkFile();
				});
				
				$("#uploaderweimaBtn").bind("click", function() {
					$("#upload-erweima-file").click();
				});
//				$(document).on('change', '#upload-erweima-file', function() {
//				   checkFileEr();
//				});
				$("#upload-erweima-file").change(function() {
					checkFileEr();
				});
	// 活动发布：校验活动参数是否完整 校验余额与预算
				$.formatData = this;
				$.formatData.fmoney = function(s, n) {
						n = n > 0 && n <= 20 ? n : 2;
						s = parseFloat((s + "").replace(/[^\d\.-]/g, "")).toFixed(n) + "";
						var l = s.split(".")[0].split("").reverse(),
							r = s.split(".")[1];
						t = "";
						for(i = 0; i < l.length; i++) {
							t += l[i] + ((i + 1) % 3 == 0 && (i + 1) != l.length ? "," : "");
						}
						return t.split("").reverse().join("") + "." + r;
				}
				$.formatData.rmoney = function(s) {
						return parseFloat(s.replace(/[^\d\.-]/g, ""));
				}
				var acTitle = ""; // 活动名称
				var acBTime = new  Date(); // 活动开始时间
				var acETime = new  Date(); // 活动结束时间
				var shareTitle = ""; // 活动微信分享标题
				var totalBudet =null; // 总预算金额
				var shareContext = ""; // 活动微信分享内容
				var totalHitRate = ""; // 总中奖率
				var everyOrMore=null;//  1-每天   2-最多
				var maxJoinNumPerDay = null; // 每天     最多参与次数  次/人
				var maxJoinNum = null; // 每天最多中奖
				var lotteryData = {}; // 定义一个json对象
				var lotteryListJSONObj = {};
				var isNational=0;//活动范围
				var maxHitNum=null;
				 var balance=0; //余额
				function jiangP(){
					var lotterTotalNum=0;
					var lotteryNum=null;
					var totalNum=0;
					var lotteryIdP="";
					var lotteryInfo = [];
					
					if($("body").find(".checkActive").attr("id")=="check1"){
						isNational=0;
					}
					else{
						isNational=$("#userGroupId").val();
					}
					//保存奖项设置
					// 字符串格式：{lotteryList[],hitRate,totalBudet}
					var tags = $(".awardsClassify");
					for(var i = 0; i < tags.length; i++) {
						var lotteryName = $(tags[i]).find("input[name='lotteryName']").val();
						var lotteryType = $(tags[i]).find("select[name='lotteryType']").val();
						if(lotteryType==0){
							//代表全网流量
							lotteryIdP = $(tags[i]).find(".ordinaryLi.checkActive").attr("productId");
							 lotteryNum = $(tags[i]).find("input[name='lotteryNum']").val();
							 if(lotteryNum==null || lotteryNum==""){
								 lotteryNum=0;
							 }
							 lotterTotalNum = parseInt(lotterTotalNum)+parseInt(lotteryNum);
						}else if(lotteryType==1){
							//普通全网流量
							var yysTp=$(tags[i]).find(".bagSize");
							var mobileNum=$(tags[i]).find("input[name='mobileNum']").val();
							var unicomNum=$(tags[i]).find("input[name='unicomNum']").val();
							var telecomNum=$(tags[i]).find("input[name='telecomNum']").val();
							if(mobileNum == "undefined" || mobileNum == "" || mobileNum <0) {
								mobileNum=0;
							};
							if(unicomNum == "undefined" || unicomNum == "" || unicomNum <0) {
								unicomNum=0;
							};
							if(telecomNum == "undefined" || telecomNum == "" || telecomNum <0) {
								telecomNum=0;
							};
							 lotteryNum=mobileNum+","+unicomNum+","+telecomNum;
							 totalNum=parseInt(mobileNum)+parseInt(unicomNum)+parseInt(telecomNum);
							 lotterTotalNum =parseInt(lotterTotalNum)+parseInt(totalNum);
							 var lotteryIdB="";
							for(var a=0;a<yysTp.length;a++){
								var lotteryId=yysTp.eq(a).val();
								lotteryId=lotteryId.substring(lotteryId.indexOf(",")+1);
								if(a==yysTp.length-1){
									lotteryIdB+=lotteryId.substring(lotteryId.indexOf(",")+1);
								}else{
									lotteryIdB+=lotteryId.substring(lotteryId.indexOf(",")+1)+",";
								}
							}
							lotteryIdP=lotteryIdB;
						}
						var exchangeMethod = $(tags[i]).find(".ordinaryLi.checkActive").attr("data_v");
							// 创建奖品信息JSON对象
							lotteryInfo[i]={'lotteryLevel':i+1,"lotteryName":lotteryName,"lotteryType":lotteryType,"lotteryId":lotteryIdP,"lotteryNum":lotteryNum};
							lotteryInfo.exchangeMethod = exchangeMethod;
						lotteryListJSONObj=lotteryInfo;
						
					}
					lotteryData.lotteryList = lotteryListJSONObj;
					lotteryData.hitRate = $("#totalRate").val();
					lotteryData.totalBudet = totalBudet;
					lotteryData.lotterTotalNum = lotterTotalNum;
					var lotteryDataStr = JSON.stringify(lotteryData);
					return lotteryDataStr;
				}
				//验证
				function publish() {
					acTitle = $(".basisName").html(); // 活动名称
					acBTime = $(".startTime").html(); // 活动开始时间
					acETime = $(".endTime").html(); // 活动结束时间
					shareTitle = $(".weiTitle").text(); // 活动微信分享标题
					totalBudet = $.formatData.rmoney($("#allMoney").text()); // 总预算金额
					shareContext = $(".weiContent").html(); // 活动微信分享内容
					totalHitRate = $("#totalRate").val(); // 总中奖率
					everyOrMore=$(".More").val();//  1-每天   2-最多
					maxJoinNumPerDay = $(".maxjoinnumperday").val(); // 每天、最多参与次数  次/人
					everydayMaxHitNum = $(".everydayMaxHitNum").val(); // 每天最多中奖
					maxHitNum= $(".maxHitNum").val();//最多中奖次数
					var guize=$("#myEditor").html;
					balance=0;
					
					/**
					 * 格式化金额，
					 * s:金额 n:小数点后位数
					 */
					
					$.formatData = this;

					$.formatData.fmoney = function(s, n) {
						n = n > 0 && n <= 20 ? n : 2;
						s = parseFloat((s + "").replace(/[^\d\.-]/g, "")).toFixed(n) + "";
						var l = s.split(".")[0].split("").reverse(),
							r = s.split(".")[1];
						t = "";
						for(i = 0; i < l.length; i++) {
							t += l[i] + ((i + 1) % 3 == 0 && (i + 1) != l.length ? "," : "");
						}
						return t.split("").reverse().join("") + "." + r;
					}

					/**
					 * 还原金额，
					 * s:金额字符串
					 */
					$.formatData.rmoney = function(s) {
						return parseFloat(s.replace(/[^\d\.-]/g, ""));
					}
					$('.basisName,#startTime,#endTime,.basisName,.everyDay,.allPeople,.allProbability,#myEditor,.mostTake').css('border',"1px solid #C6C6C6");
					//var acId = $("#acId").val(); // 活动编号id
					if($(".basisName").val().length<4) {
						// alert(acTitle);
						$(".basisName").css('border',"1px solid red");
						alertDia("活动标题长度最少为4！", "输入参数错误");
						$(".basisName").focus();
						return false;
					}
					if(acBTime == "undefined" || acBTime == "") {
						alertDia("活动开始时间必须设置！", "输入参数错误");
						$(".startTime").css('border',"1px solid red");
						$(".startTime").focus();
						return false;
					}
					
					if(acETime == "undefined" || acETime == "") {
						alertDia("活动结束时间必须设置！", "输入参数错误");
						$(".endTime").css('border',"1px solid red");
						$(".endTime").focus();
						return false;
					}
						var d1 = new Date(acBTime.replace(/\-/g, "\/"));  
 						var d2 = new Date(acETime.replace(/\-/g, "\/"));  
 						if(Date.parse(d1)>Date.parse(d2)||Date.parse(d1)==Date.parse(d2)){
 							alertDia("结束时间必须大于开始时间！", "输入参数错误");
							$(".endTime").css('border',"1px solid red");
							$(".endTime").focus();
							return false;
 						}
					/*var appID = $("#weichatAppid").val(); // 微信appID
					if(appID == "undefined" || appID == "") {
						alertDia("微信appID必须填写！", "输入参数错误");
						return;
					}*/
					for(var i=0;i<weixin.length;i++){
						if(weixin[i].checked ==true){
							weixinVal=weixin[i].value;
							}
					}
					if(weixinVal == 1){
						appId = $(".gongzhonghao select").val();
						for(var j=0;j<guanzhu.length;j++){
							if(guanzhu[j].checked == true){
								guanzhuVal = guanzhu[j].value;
								}
						}
						if(appId != 0){
							$("#autoReply").css('border',"1px solid #999");
							$("#keyWords").css('border',"1px solid #999");
							autoReply = $("#autoReply").val();
							keyWords = $("#keyWords").val();
							if(autoReply == ''){
								$("#autoReply").css('border',"1px solid red");
								alertDia("被添加自动回复为必填项", "输入参数错误");
								$("#autoReply").focus();
								return false;
							}else{
								$("#autoReply").css('border',"1px solid #e6e6e6");
							}
							if(keyWords ==''){
								$("#keyWords").css('border',"1px solid red");
								alertDia("关键词回复为必填项", "输入参数错误");
								$("#keyWords").focus();
								return false;
							}else{
								$("#keyWords").css('border',"1px solid #e6e6e6");
							}
						}
					}else if(weixinVal == 0){
						appId='';
						guanzhuVal='';
						autoReply = '';
						keyWords = '';
					}
					for(var k=0;k<share.length;k++){
					if(share[k].checked ==true){
						sharePriceType=share[k].value;
						}
					}
				if(sharePriceType != 0){
					sharePriceTimes = $(".rewardNumbox>div").eq(sharePriceType).children("div").children(".sharePriceTimes").val();
					shareTopLimit = $(".rewardNumbox>div").eq(sharePriceType).children("div").children(".shareTopLimit").val();
					if(sharePriceTimes ==''){
						alertDia("获得抽奖次数为必填项", "输入参数错误");
						return false;
					}
					if(shareTopLimit ==''){
						alertDia("每天最多邀请人数为必填项", "输入参数错误");
						return false;
					}
				}
					if(shareTitle == undefined || shareTitle == "") {
						shareTitle = "我的私人定制活动"; // 默认 活动微信分享标题
					}
					if(shareContext == undefined || shareContext == "") {
						shareContext = "我的私人定制活动"; // 默认 活动微信分享内容
					}
					if(maxJoinNumPerDay == "undefined" || maxJoinNumPerDay == "" || maxJoinNumPerDay <=0) {
						alertDia("参与次数必须设置！", "输入参数错误");
						$(".mostTake").css('border',"1px solid red");
						$(".maxjoinnumperday").focus();
						return false;
					}
					if(everydayMaxHitNum == "undefined" || everydayMaxHitNum == "" || everydayMaxHitNum <=0) {
						alertDia("每天最多中奖次数必须设置！", "输入参数错误");
						$(".everyDay").css('border',"1px solid red");
						$(".everydayMaxHitNum").focus(); 
						return false;
					}
					/*if(parseInt(maxJoinNumPerDay)<parseInt(everydayMaxHitNum)){
						alertDia("每人每天中奖次数不得大于每人可参与次数", "输入参数错误");
						$(".everyDay").css('border',"1px solid red");
						$(".everydayMaxHitNum").focus(); 
						return false;
					}*/
					if(maxHitNum == "undefined" || maxHitNum == "" || maxHitNum <=0) {
						alertDia("每人总共可中奖次数必须设置！", "输入参数错误");
						$(".allPeople").css('border',"1px solid red");
						$(".maxHitNum").focus(); 
						return false;
					}
					if(parseInt(everydayMaxHitNum)>parseInt(maxHitNum)){
						alertDia("每人每天中奖次数不得大于每人总中奖次数", "输入参数错误");
						$(".everyDay").css('border',"1px solid red");
						$(".everydayMaxHitNum").focus();
						return false;
					}
					if(totalHitRate == "undefined" || totalHitRate == "" || totalHitRate <= 0 || totalHitRate > 100) {
						$(".allProbability").css('border',"1px solid red");
						alertDia("总中奖率必须设置！", "输入参数错误");
						return false;
					}
					if(guize == "undefined" || guize == "" || guize <0) {
						alertDia("规则设置不得为空", "输入参数错误");
						$("#myEditor").css('border',"1px solid red");
						$("#myEditor").focus(); 
						return false;
					}
					var award=$("body").find(".lotteryNum");
					if(award.eq(0).val()==0||award.eq(1).val()==0||award.eq(2).val()==0||award.eq(3).val()==0){
						if(operate == 'editIng'){}
						else{
							alertDia("奖项数量设置不得为空", "输入参数错误");
							return false;
						}
					}
					totalBudet = parseInt(totalBudet);
					if(totalBudet == "undefined" || totalBudet == "" || totalBudet <0) {
						alertDia("预算金额有误！", "输入参数错误");
						return false;
					}
					
				}
}
/*
				 * 
				 * 渲染参数信息
				 * 
				 */
				function drawing(msg,list){
					//基础设置
					$(".basisName").val(formatValue(msg.activityName));
					if(msg.startTime!==""){
						$(".startTime").html(fdate(msg.startTime,1));
					}
					if(msg.endTime!==""){
						$(".endTime").html(fdate(msg.endTime,1));
					}
					var scop=msg.isNational;
					if(scop==0){
						$("#userGroupId").val(0);
					}else {
						$("#userGroupId").val(scop);
					}
					$(".weiTitle").val(msg.transTitle);
					$(".weiContent").html(msg.transDesc);
					$("#xianshiImg").attr("src",msg.transImgPath);
					var maxJoinNumPerDay=msg.maxJoinNumPerDay;
					if(maxJoinNumPerDay==""){
						$(".maxjoinnumperday").val(msg.maxJoinNum);
						$(".More").val(2);
					}else{
						$(".maxjoinnumperday").val(msg.maxJoinNumPerDay);
						$(".More").val(1);
					}
					$(".maxHitNum").val(msg.maxHitNum);
					$("#totalRate").val(msg.totalRate);
					$(".everydayMaxHitNum").val(msg.everydayMaxHitNum);
					//奖项设置
					if ( list != null && list != 'undefined' ){
						$(".ordinaryLi").removeClass("checkActive")
						for(var i=0;i<list.length;i++){
							var lotteryName=list[i].lotteryName;
							$("input[name='lotteryName']").eq(i).val(formatValue(lotteryName));
							if(list[i].lotteryType==0){
								//全网流量
								$("input[name='lotteryNum']").eq(i).val( formatValue(list[i].lotteryNum));
								$(".wholeNetwork").eq(i).hide();
								$(".ordinary").eq(i).show();
								$(".awardsClassify").eq(i).find(".ordinaryLi").each(function(){
									if( $(this).attr("productid") == list[i].lotteryId ){
										$(this).addClass("checkActive");
									}
								});
							}else if(list[i].lotteryType==1){
								//普通流量
								$(".wholeNetwork").eq(i).show();
								$(".ordinary").eq(i).hide();
								var arr=[],may=[];
								var lotteryNum=list[i].lotteryNum;
								arr=lotteryNum.split(",");
								var mobileNum=arr[0];
								var unicomNum=arr[1];
								var telecomNum=arr[2];
								$(".wholeNetwork").eq(i).find("input[name='mobileNum']").val(mobileNum);
								$(".wholeNetwork").eq(i).find("input[name='unicomNum']").val(unicomNum);
								$(".wholeNetwork").eq(i).find("input[name='telecomNum']").val(telecomNum);
								var lotteryId=list[i].lotteryId;
									may=lotteryId.split(",");
								var mobileVal=$(".wholeNetwork").eq(i).find(".mobileSize").find("option").length;
								for(var a=0;a<mobileVal;a++){
									var mobile=$(".wholeNetwork").eq(i).find(".mobileSize").find("option").eq(a).val();
										mobile=mobile.substring(mobile.indexOf(",")+1)
									if(mobileNum==mobile){
										$(".wholeNetwork").eq(i).find(".mobileSize").val(mobile);
									}
								}
								var unicomVal=$(".wholeNetwork").eq(i).find(".unicomSize").find("option").length;
								for(var a=0;a<unicomVal;a++){
									var unicom=$(".wholeNetwork").eq(i).find(".unicomSize").find("option").eq(a).val();
										unicom=unicom.substring(unicom.indexOf(",")+1)
									if(unicomNum==unicom){
										$(".wholeNetwork").eq(i).find(".unicomSize").val(unicom);
									}
								}
								var telecomVal=$(".wholeNetwork").eq(i).find(".telecomSize").find("option").length;
								for(var a=0;a<telecomVal;a++){
									var telecom=$(".wholeNetwork").eq(i).find(".telecomSize").find("option").eq(a).val();
										telecom=telecom.substring(telecom.indexOf(",")+1)
									if(telecomNum==telecom){
										$(".wholeNetwork").eq(i).find(".unicomSize").val(telecom);
									}
								}
							}
						}
						calculateTotalPrice();
					}
				}
				
				
				//进行中活动渲染
					function drawings(msg,list) {
		//基础设置
		$(".basisName").val(formatValue(msg.activityName));
		if(msg.startTime!==""){
			$(".startTime").html(fdate(msg.startTime,1));
		}
		if(msg.endTime!==""){
			$(".endTime").html(fdate(msg.endTime,1));
		}
		var scop=msg.isNational;
		if(scop==0){
			$("#userGroupId").val(0);
		}else {
			$("#userGroupId").val(scop);
		}
		$(".weiTitle").val(msg.transTitle);
		$(".weiContent").html(msg.transDesc);
		$("#xianshiImg").attr("src",msg.transImgPath);
		var maxJoinNumPerDay=msg.maxJoinNumPerDay;
		if(maxJoinNumPerDay==""){
			$(".maxjoinnumperday").val(msg.maxJoinNum);
			$(".More").val(2);
		}else{
			$(".maxjoinnumperday").val(msg.maxJoinNumPerDay);
			$(".More").val(1);
		}
		$(".maxHitNum").val(msg.maxHitNum);
		$("#totalRate").val(msg.totalRate);
		$(".everydayMaxHitNum").val(msg.everydayMaxHitNum);
		//奖项设置
		if ( list != null && list != 'undefined' ){
			$(".ordinaryLi").removeClass("checkActive")
			for(var i=0;i<list.length;i++){
				var lotteryName=list[i].lotteryName;
				$("input[name='lotteryName']").eq(i).val(formatValue(lotteryName));
				if(list[i].lotteryType==0){
					//全网流量
					$("input[name='lotteryNum']").eq(i).val( formatValue(list[i].lotteryLimit));
					$(".wholeNetwork").eq(i).hide();
					$(".ordinary").eq(i).show();
					$(".awardsClassify").eq(i).find(".ordinaryLi").each(function(){
						if( $(this).attr("productid") == list[i].productId){
							$(this).addClass("checkActive");
						}
					});
				}else if(list[i].lotteryType==1){
					//普通流量
					$(".wholeNetwork").eq(i).show();
					$(".ordinary").eq(i).hide();
					var arr=[],may=[];
					var lotteryNum=list[i].lotteryLimit;
					arr=lotteryNum.split(",");
					var mobileNum=arr[0];
					var unicomNum=arr[1];
					var telecomNum=arr[2];
					$(".wholeNetwork").eq(i).find("input[name='mobileNum']").val(mobileNum);
					$(".wholeNetwork").eq(i).find("input[name='unicomNum']").val(unicomNum);
					$(".wholeNetwork").eq(i).find("input[name='telecomNum']").val(telecomNum);
					var lotteryId=list[i].productId;
					may=lotteryId.split(",");
					var mobileVal=$(".wholeNetwork").eq(i).find(".mobileSize").find("option").length;
					for(var a=0;a<mobileVal;a++){
						var mobile=$(".wholeNetwork").eq(i).find(".mobileSize").find("option").eq(a).val();
						mobile=mobile.substring(mobile.indexOf(",")+1)
						if(mobileNum==mobile){
							$(".wholeNetwork").eq(i).find(".mobileSize").val(mobile);
						}
					}
					var unicomVal=$(".wholeNetwork").eq(i).find(".unicomSize").find("option").length;
					for(var a=0;a<unicomVal;a++){
						var unicom=$(".wholeNetwork").eq(i).find(".unicomSize").find("option").eq(a).val();
						unicom=unicom.substring(unicom.indexOf(",")+1)
						if(unicomNum==unicom){
							$(".wholeNetwork").eq(i).find(".unicomSize").val(unicom);
						}
					}
					var telecomVal=$(".wholeNetwork").eq(i).find(".telecomSize").find("option").length;
					for(var a=0;a<telecomVal;a++){
						var telecom=$(".wholeNetwork").eq(i).find(".telecomSize").find("option").eq(a).val();
						telecom=telecom.substring(telecom.indexOf(",")+1)
						if(telecomNum==telecom){
							$(".wholeNetwork").eq(i).find(".unicomSize").val(telecom);
						}
					}
				}
			}
			calculateTotalPrice();
		}
	}
					
function fdate(date_str,type){
	var d = new Date( date_str );
	var date_mon = (d.getMonth() + 1);
	var date_dat = d.getDate();
	var date_hou = d.getHours();
	var date_min = d.getMinutes();
	var date_sec = d.getMinutes();
	//type = 1;
	var date_new = '';
	switch(type){
		case 1:
			date_new =  d.getFullYear() + '-' +
						(date_mon < 10 ? ('0' + date_mon):date_mon ) + '-' +
						(date_dat < 10 ? ('0' + date_dat):date_dat ) + ' ' +
						(date_hou < 10 ? ('0' + date_hou):date_hou ) + ':' +
						(date_min < 10 ? ('0' + date_min):date_min ) + ':' +
						(date_sec < 10 ? ('0' + date_sec):date_sec ) ;
			break;
		case 2:
			date_new =  d.getFullYear() + '-' +
						(date_mon < 10 ? ('0' + date_mon):date_mon ) + '-' +
						(date_dat < 10 ? ('0' + date_dat):date_dat ) + ' ' +
						(date_hou < 10 ? ('0' + date_hou):date_hou ) + ':' +
						(date_min < 10 ? ('0' + date_min):date_min );
			break;
		case 3:
			date_new =  (date_mon < 10 ? ('0' + date_mon):date_mon ) + '-' +
						(date_dat < 10 ? ('0' + date_dat):date_dat ) + ' ' +
						(date_hou < 10 ? ('0' + date_hou):date_hou ) + ':' +
						(date_min < 10 ? ('0' + date_min):date_min );
			break;
		case 4:
			date_new =  d.getFullYear() + '-' +
						(date_mon < 10 ? ('0' + date_mon):date_mon ) + '-' +
						(date_dat < 10 ? ('0' + date_dat):date_dat );
			break;
		default:
			date_new =  d.getFullYear() + '-' +
						(date_mon < 10 ? ('0' + date_mon):date_mon ) + '-' +
						(date_dat < 10 ? ('0' + date_dat):date_dat ) + ' ' +
						(date_hou < 10 ? ('0' + date_hou):date_hou ) + ':' +
						(date_min < 10 ? ('0' + date_min):date_min ) + ':' +
						(date_sec < 10 ? ('0' + date_sec):date_sec ) ;
	}
	return date_new;
};	
/*				function extracting(time){
					if(time!==undefined){
						var month=time.substring(time.indexOf()+1,time.indexOf(" "));
						month=box(month);
						if(month<10){
							month="0"+month
						}
						var day=time.substring(time.indexOf(" ")+1,time.indexOf(","));
						if(day<10){
							day="0"+day
						}
						var right=time.substring(time.indexOf(", ")+1);
						var arr=[];
						arr=right.split(" ");
						var year =arr[1];
						var when=arr[2];
						var nowTime=year+"-"+month+"-"+day+" "+when
						return nowTime
					}
				}
				function box(v){
						switch (v)
							{
							  case "Jan":
							  v=1; 
							  break;
							  case "Feb":
							  v=2;
							  break;
							  case "Mar":
							  v=3;
							  break;
							case "Apr":
							  v=4;
							  break;
							case "May":
							  v=5;
							  break;
							case "Jun":
							  v=6;
							  break;
							case "Jul":
							 v=7;
							  break;
							case "Aug":
							  v=8;
							  break;
							case "Sep":
							  v=9;
							  break;
							case "Oct":
							  v=10;
							  break;
							  case "Nov":
							  v=11;
							  break;
							  case "Dec":
							   v=12;
							  break;
							}
							return v
					}*/
function alertDia(content, title) {
					layer.open({
						content: content,
						title: title,
						zIndex: 99999999,
						ok: function() {
							return true;
						},
						lock: true
					});
				}
function formatValue( str ){
						if( str == null || str == 'undefined' ){
							return '';
						}else{
							return str;
						}
					}

$(".rules").bind("keyup","p",function(){
 	$("#iframePhone").contents().find(".gzText").html("");
 	$("#iframePhone").contents().find(".gzText").html(getContent());
});
$(".rules").bind("click",".rules",function(){
 	$("#iframePhone").contents().find(".gzText").html("");
 	$("#iframePhone").contents().find(".gzText").html(getContent());
});
	/*
				 * 
				 * 计算总金额金额
				 * 
				 */
				function calculateTotalPrice(){
					var totalPrice = 0,provinceNet=0;
					$(".ordinary").each(function(index, element) {
						var num = $(element).find("[name='lotteryNum']").val();
						if( num == null && num == '' &&num<0){
							num = 0;
						}
						
					    var  ordinaryLi= $(element).find(".ordinaryLi");
					    ordinaryLi.each(function(i, e){
					    	if( $(e).hasClass("checkActive") ){
					    		var p = $(e).attr("price");
					    		totalPrice += num * p;
					    	}
					    });
					});
					var prize = $(".prize");
					for(var i=0;i<prize.length;i++){
						var mobileNum = $(prize[i]).find("input[name='mobileNum']").val();
						var unicomNum = $(prize[i]).find("input[name='unicomNum']").val();
						var telecomNum = $(prize[i]).find("input[name='telecomNum']").val();
						if(mobileNum == "undefined" || mobileNum == "" || mobileNum < 0) {
							mobileNum = 0;
						};
						if(unicomNum == "undefined" || unicomNum == "" || unicomNum < 0) {
							unicomNum = 0;
						};
						if(telecomNum == "undefined" || telecomNum == "" || telecomNum < 0) {
							telecomNum = 0;
						};
						provinceNet+=parseFloat(mobileNum*$(prize[i]).find("input[name='mobileNum']").parent().next().children().val());
						provinceNet+=parseFloat(unicomNum*$(prize[i]).find("input[name='unicomNum']").parent().next().children().val());
						provinceNet+=parseFloat(telecomNum*$(prize[i]).find("input[name='telecomNum']").parent().next().children().val());
					}
					$("#allMoney").html("￥"+ $.formatData.fmoney(totalPrice+provinceNet,2) );
				}
				

$(".mainBodyDiv").mouseenter(function(){
	isChange="true";
})
//以下是富文本编辑
 //实例化编辑器
    var um = UM.getEditor('myEditor');
    um.addListener('focus',function(){
        $('#focush2').html('')
    });
    //按钮的操作
    function insertHtml() {
        var value = prompt('插入html代码', '');
        um.execCommand('insertHtml', value)
    }
    function isFocus(){
        alert(um.isFocus())
    }
    function doBlur(){
        um.blur()
    }
    function createEditor() {
        enableBtn();
        um = UM.getEditor('myEditor');
    }
    function getAllHtml() {
        alert(UM.getEditor('myEditor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push(UM.getEditor('myEditor').getContent());
        return arr;
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UM.getEditor('myEditor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用umeditor')方法可以设置编辑器的内容");
        UM.getEditor('myEditor').setContent('欢迎使用umeditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UM.getEditor('myEditor').selection.getRange();
        range.select();
        var txt = UM.getEditor('myEditor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UM.getEditor('myEditor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UM.getEditor('myEditor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UM.getEditor('myEditor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UM.getEditor('myEditor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            domUtils.removeAttributes(btn, ["disabled"]);
        }
    }
    
    //设置按钮
    $(".icon-shezhi").click(function(){
    	var right=$(".rightContentDiv").css("right");
    	if(right=="0px"){
    		$(".rightContentDiv").animate({right:"-350px"});
    	}
    	else{
    		$(".rightContentDiv").animate({right:"0px"});
    	}
    })
}
else{
	alert("系统异常");
}
