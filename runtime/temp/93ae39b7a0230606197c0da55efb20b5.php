<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"C:\wamp64\www\gudong\public/../application/index\view\Default\index\info.html";i:1510281575;}*/ ?>
﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link href="/static/index/css/style.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="/static/index/css/info.css" />
    <title></title>
    <style>
       .backg{
       	position: absolute;
       top:0;
       	width: 100%;
       	height: 40.63rem;
       	opacity: 0.4;
       }
    </style>
    <style type="text/css">
.picker{display:none;position:fixed;top:0;z-index:100;width:100%;height:100%;overflow:hidden;text-align:center;font-family:PingFang SC,STHeitiSC-Light,Helvetica-Light,arial,sans-serif;font-

size:14px;-moz-user-select:none;-webkit-user-select:none;-ms-user-select:none;user-select:none}.picker .picker-mask{position:absolute;z-index:500;width:100%;height:100%;transition:all .5s;-webkit-

transition:all .5s;background:transparent;opacity:0}.picker .picker-mask.show{background:rgba(0,0,0,.6);opacity:1}.picker .picker-panel{position:absolute;z-

index:600;bottom:0;width:100%;height:243px;background:#fff;transform:translateY(243px);-webkit-transform:translateY(243px);transition:all .5s;-webkit-transition:all .5s}.picker .picker-panel.show

{transform:translateY(0);-webkit-transform:translateY(0)}.picker .picker-panel .picker-choose{position:relative;height:50px;color:#878787;font-size:14px}.picker .picker-panel .picker-choose 

.picker-title{line-height:50px;font-size:19px;text-align:center;color:#333}.picker .picker-panel .picker-choose .cancel,.picker .picker-panel .picker-choose .confirm

{position:absolute;padding:10px;top:6px}.picker .picker-panel .picker-choose .confirm{right:0;color:#fa8919}.picker .picker-panel .picker-choose .cancel{left:0}.picker .picker-panel .picker-

content{position:relative}.picker .picker-panel .picker-content .mask-bottom,.picker .picker-panel .picker-content .mask-top{position:absolute;z-index:10;width:100%;height:68px;pointer-

events:none;transform:translateZ(0);-webkit-transform:translateZ(0)}.picker .picker-panel .picker-content .mask-top{top:0;background:-webkit-gradient(linear,left bottom,left top,from(hsla

(0,0%,100%,.4)),to(hsla(0,0%,100%,.8)));background:-o-linear-gradient(bottom,hsla(0,0%,100%,.4),hsla(0,0%,100%,.8))}.picker .picker-panel .picker-content .mask-top:after,.picker .picker-panel 

.picker-content .mask-top:before{display:block;position:absolute;border-top:1px solid #ccc;left:0;width:100%;content:" "}.picker .picker-panel .picker-content .mask-top:before

{display:none;top:0}.picker .picker-panel .picker-content .mask-top:after{display:block;bottom:0}.picker .picker-panel .picker-content .mask-bottom{bottom:0;background:-webkit-gradient(linear,left 

top,left bottom,from(hsla(0,0%,100%,.4)),to(hsla(0,0%,100%,.8)));background:-o-linear-gradient(top,hsla(0,0%,100%,.4),hsla(0,0%,100%,.8))}.picker .picker-panel .picker-content .mask-

bottom:after,.picker .picker-panel .picker-content .mask-bottom:before{display:block;position:absolute;border-top:1px solid #ccc;left:0;width:100%;content:" "}.picker .picker-panel .picker-content 

.mask-bottom:before{display:block;top:0}.picker .picker-panel .picker-content .mask-bottom:after{display:none;bottom:0}.picker .picker-panel .wheel-wrapper{display:-ms-flexbox;display:-webkit-

box;display:flex;padding:0 10px}.picker .picker-panel .wheel-wrapper .wheel{-ms-flex:1 1 1e-9px;-webkit-box-flex:1;flex:1;flex-basis:1e-9px;width:1%;height:173px;overflow:hidden;font-

size:21px}.picker .picker-panel .wheel-wrapper .wheel .wheel-scroll{margin-top:68px;line-height:36px}.picker .picker-panel .wheel-wrapper .wheel .wheel-scroll .wheel-item

{height:36px;overflow:hidden;white-space:nowrap;color:#333}.picker .picker-footer{height:20px}@media (-webkit-min-device-pixel-ratio:1.5),(min-device-pixel-ratio:1.5){.border-1px:after,.border-

1px:before{-webkit-transform:scaleY(.7);-webkit-transform-origin:0 0;transform:scaleY(.7)}.border-1px:after{-webkit-transform-origin:left bottom}}@media (-webkit-min-device-pixel-ratio:2),(min-

device-pixel-ratio:2){.border-1px:after,.border-1px:before{-webkit-transform:scaleY(.5);transform:scaleY(.5)}}</style>
    <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
    <script src="/static/index/js/common.js"></script>
    <link href="/static/index/css/style.css" type="text/css" rel="stylesheet">
	<!--<link rel="stylesheet" href="http://www.travel.com/static/layer/theme/default/layer.css?v=3.1.0" id="layuicss-layer">-->
</head>
<body style="background: #f7f7f7;">
	<!--<img src="images/index.jpg" style="" class="backg">-->
	<body style="background: #f7f7f7;">
		<div class="container" style="padding: 0.5rem;">
			<div class="container-con">
				<form action="<?php echo url('/index/index/save_info'); ?>" enctype="multipart/form-data">
					<input type="text" name="leader_id" class="user_no" value="3" hidden="">
				<div class="cItem">
					<span>头像</span>
					<div class="item-right">
						<img src="/static/index/images/wechat.png" id="touxiang" class="headImg">
						<input name="headerImg" class="headerImg" value="" hidden="">
				   		<input type="file" name="photo" id="upimg" onchange="checkFile()" hidden="true">
					</div>
				</div>
				<div class="clear"></div>
				<div class="cItem">
					<span>姓名</span>
					<div class="item-right">
						<input type="text" name="user_name" readonly  class="user_name" value="<?php echo $info['user_name']; ?>">
					</div>
				</div>
				<div class="cItem">
					<span>性别</span>
					<div class="item-right">
						<input type="text" name="gender" class="genderH" id="genderH" value="<?php echo showstatus($info['gender'],'男,女:1,2'); ?>" hidden="">
						<span name="gender" style="margin-right: 0.5rem;" class="gender" gender="$userInfo['gender']"></span>

                    </div>
				</div>
				<div class="cItem">
					<span>出生日期</span>
					<div class="item-right">
						<input name="birthday" class="birthdayH" hidden="">
						<span type="text" id="birthday" name="birthday" class="birthday"><?php if(!empty($info['birthday'])): ?><?php echo date("Y-m-d",$info['birthday']); endif; ?></span>
					</div>
				</div>

				<div class="cItem">
					<span>用户编号</span>
					<div class="item-right">
						<input type="number" readonly name="user_no"  value="<?php echo $info['user_no']; ?>">
					</div>
				</div>
                    <div class="clear"></div>
                    <button type="submit"  name="submit" class="save">保存</button>
			</form></div>
			

<div class="picker">
  <div class="picker-mask mask-hook"></div>
  <div class="picker-panel panel-hook">
    <div class="picker-choose choose-hook">
      <span class="cancel cancel-hook">取消</span>
      <span class="confirm confirm-hook">确定</span>
      <h1 class="picker-title">请选择</h1>
    </div>
    <div class="picker-content">
      <div class="mask-top border-1px"></div>
      <div class="mask-bottom border-1px"></div>
      <div class="wheel-wrapper wheel-wrapper-hook">
        
          <div class="wheel wheel-hook">
            <ul class="wheel-scroll wheel-scroll-hook">
              
                <li class="wheel-item" data-val="1981">1981</li>
              
                <li class="wheel-item" data-val="1982">1982</li>
              
                <li class="wheel-item" data-val="1983">1983</li>
              
                <li class="wheel-item" data-val="1984">1984</li>
              
                <li class="wheel-item" data-val="1985">1985</li>
              
                <li class="wheel-item" data-val="1986">1986</li>
              
                <li class="wheel-item" data-val="1987">1987</li>
              
                <li class="wheel-item" data-val="1988">1988</li>
              
                <li class="wheel-item" data-val="1989">1989</li>
              
                <li class="wheel-item" data-val="1990">1990</li>
              
                <li class="wheel-item" data-val="1991">1991</li>
              
                <li class="wheel-item" data-val="1992">1992</li>
              
                <li class="wheel-item" data-val="1993">1993</li>
              
                <li class="wheel-item" data-val="1994">1994</li>
              
                <li class="wheel-item" data-val="1995">1995</li>
              
                <li class="wheel-item" data-val="1996">1996</li>
              
                <li class="wheel-item" data-val="1997">1997</li>
              
                <li class="wheel-item" data-val="1998">1998</li>
              
                <li class="wheel-item" data-val="1999">1999</li>
              
                <li class="wheel-item" data-val="2000">2000</li>
              
                <li class="wheel-item" data-val="2001">2001</li>
              
                <li class="wheel-item" data-val="2002">2002</li>
              
                <li class="wheel-item" data-val="2003">2003</li>
              
                <li class="wheel-item" data-val="2004">2004</li>
              
                <li class="wheel-item" data-val="2005">2005</li>
              
                <li class="wheel-item" data-val="2006">2006</li>
              
                <li class="wheel-item" data-val="2007">2007</li>
              
                <li class="wheel-item" data-val="2008">2008</li>
              
                <li class="wheel-item" data-val="2009">2009</li>
              
                <li class="wheel-item" data-val="2010">2010</li>
              
            </ul>
          </div>
        
          <div class="wheel wheel-hook">
            <ul class="wheel-scroll wheel-scroll-hook">
              
                <li class="wheel-item" data-val="01">01</li>
              
                <li class="wheel-item" data-val="02">02</li>
              
                <li class="wheel-item" data-val="03">03</li>
              
                <li class="wheel-item" data-val="04">04</li>
              
                <li class="wheel-item" data-val="05">05</li>
              
                <li class="wheel-item" data-val="06">06</li>
              
                <li class="wheel-item" data-val="07">07</li>
              
                <li class="wheel-item" data-val="08">08</li>
              
                <li class="wheel-item" data-val="09">09</li>
              
                <li class="wheel-item" data-val="10">10</li>
              
                <li class="wheel-item" data-val="11">11</li>
              
                <li class="wheel-item" data-val="12">12</li>
              
            </ul>
          </div>
        
          <div class="wheel wheel-hook">
            <ul class="wheel-scroll wheel-scroll-hook">
              
                <li class="wheel-item" data-val="01">01</li>
              
                <li class="wheel-item" data-val="02">02</li>
              
                <li class="wheel-item" data-val="03">03</li>
              
                <li class="wheel-item" data-val="04">04</li>
              
                <li class="wheel-item" data-val="05">05</li>
              
                <li class="wheel-item" data-val="06">06</li>
              
                <li class="wheel-item" data-val="07">07</li>
              
                <li class="wheel-item" data-val="08">08</li>
              
                <li class="wheel-item" data-val="09">09</li>
              
                <li class="wheel-item" data-val="10">10</li>
              
                <li class="wheel-item" data-val="11">11</li>
              
                <li class="wheel-item" data-val="12">12</li>
              
                <li class="wheel-item" data-val="13">13</li>
              
                <li class="wheel-item" data-val="14">14</li>
              
                <li class="wheel-item" data-val="15">15</li>
              
                <li class="wheel-item" data-val="16">16</li>
              
                <li class="wheel-item" data-val="17">17</li>
              
                <li class="wheel-item" data-val="18">18</li>
              
                <li class="wheel-item" data-val="19">19</li>
              
                <li class="wheel-item" data-val="20">20</li>
              
                <li class="wheel-item" data-val="21">21</li>
              
                <li class="wheel-item" data-val="22">22</li>
              
                <li class="wheel-item" data-val="23">23</li>
              
                <li class="wheel-item" data-val="24">24</li>
              
                <li class="wheel-item" data-val="25">25</li>
              
                <li class="wheel-item" data-val="26">26</li>
              
                <li class="wheel-item" data-val="27">27</li>
              
                <li class="wheel-item" data-val="28">28</li>
              
                <li class="wheel-item" data-val="29">29</li>
              
                <li class="wheel-item" data-val="30">30</li>
              
                <li class="wheel-item" data-val="31">31</li>
            </ul>
          </div>
      </div>
    </div>
    <div class="picker-footer footer-hook"></div>
  </div>
</div>
</div>
</body>


    <div class="navBar">
        <ul class="clear-fix">
            <li><a href="/index/index/zhanshi.html"><img src="/static/index/images/home.png"><span>首页</span></a></li>
            <li><a href="/index/index/task.html"><img src="/static/index/images/dengpao.png"><span>任务</span></a></li>
            <li class="navBar-active"><a href="/index/index/center.html"><img src="/static/index/images/emo.png"><span>个人中心</span></a></li>
        </ul>
    </div>
</body>
<script>
		$(".gender").click(function(){
				if($(this).attr("gender")==1){
					$(this).attr("gender","2");
					$(this).html("女");
					$(this).siblings("#genderH").val("2");
				}
				else{
					$(this).attr("gender","1");
					$(this).html("男");
					$(this).siblings("#genderH").val("1");
				}
			})
		$(function(){
			if(0==1){
				layer.msg("保存成功！");
			}
/*			$(".save").click(function(){
				$.ajax({
		            url: '/index/User/updateUserInfo',
		            type: 'GET',
		            data:$("form").serialize(),
		            async:false,
		            dataType:'json',
		            success: function (val) {
		            	layer.msg("保存成功",{
		            		time:2000
		            	})
		            }
		    })
			})*/
			            //图片上传
            $(".headImg").bind("click",function(){
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
                loadImage(fileList[0],"touxiang");

                var file = document.getElementById('upimg');
                var val = $('#touxiang').attr('src');
                var size = file .files[0].size;
                if(size>1024*1024){
                    $('#touxiang').attr('src',val);
                    alert('请上传1M以内的图片');
                    return false;
                }
            };

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
            $('.intro').keypress(function () {
				var val=$(this).val();
				if(val.length>=15){
                    layer.msg('最多可编辑15个字符');
                    return false;
                }
            })
		})
        //生日
        $(function(){
            var rightDS = document.getElementById('birthday');
            var year=[];
            var months=[];
            var day=[];
            for(var i=1;i<=30;i++){
                year[i-1]={"text":i+1980,"value":i+1980};
            }
            for(var i=1;i<=12;i++){
                if(i<10){
                    months[i-1]={"text":"0"+i,"value":"0"+i};
                }
                else{
                    months[i-1]={"text":i,"value":i};
                }
            }
            for(var i=1;i<=31;i++){
                if(i<10){
                    day[i-1]={"text":"0"+i,"value":"0"+i};
                }
                else{
                    day[i-1]={"text":i,"value":i};
                }
            }
            var _data = [
                year,months,day
            ];
            var rightDS_picker = new Picker({
                title: '请选择',
                data: _data
            });
            rightDS_picker.on('picker.select', function (selectedVal, selectedIndex) {
            	$(".birthday").html(_data[0][selectedIndex[0]].value +'-'+ _data[1][selectedIndex[1]].value +'-'+ _data[2][selectedIndex[2]].value);
                $(".birthdayH").val(_data[0][selectedIndex[0]].value +'-'+ _data[1][selectedIndex[1]].value +'-'+ _data[2][selectedIndex[2]].value);
            });
            rightDS_picker.on('picker.change', function (index, selectedIndex) {
                //console.log(index);
            });
            rightDS_picker.on('picker.valuechange', function (selectedVal, selectedIndex) {
                //console.log(selectedVal);
            });
            rightDS.addEventListener('click', function () {
                rightDS_picker.show();
            });
        })

	</script>
	<script src="/static/index/js/common.js"></script>
</html>

