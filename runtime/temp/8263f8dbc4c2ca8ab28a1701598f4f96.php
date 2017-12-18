<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"D:\new_exe\xampp\htdocs\gudong\public/../application/index\view\Default\index\sendGift.html";i:1511838420;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="stylesheet" type="text/css" href="/static/index/bootstrap/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="/static/index/js/mui/dist/css/mui.min.css">
    <link rel="stylesheet" type="text/css" href="/static/index/bootstrap/css/basic.css">
    <link href="/static/index/js/mui/plugin/picker/css/mui.picker.css" rel="stylesheet" />
    <link href="/static/index/js/mui/plugin/picker/css/mui.poppicker.css" rel="stylesheet" />
    <style type="text/css">
    	a:hover{
    		text-decoration: none;
    	}
        .mui-card ul>li{
            list-style-type: decimal;
        }
    </style>
</head>
<body>
	<header id="header" class="mui-bar mui-bar-nav">
		<h1 class="mui-title"><?php echo $act_obj['activity_name']; ?></h1>
		<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left">
		</a>
	</header>

	<div class="mui-content" id="con1" yanzhi="<?php echo $userObj['yanzhi']; ?>" need="<?php echo $need; ?>">
        <div class="mui-table-view" style="margin-top: 0px;padding-top: 10px;">
            <!-- <li class="mui-table-view-cell">我的研值
                <span class="mui-badge mui-badge-primary">156</span>
            </li> -->

            <div class="mui-card" style="margin-top: 0px;">
                <div class="mui-card-content">
                    <div class="mui-card-content-inner">
                        <h5>活动说明</h5>
                        <ul>
                            <li>参与活动需支付研值<?php echo $need; ?></li>
                            <li>官方送出列表中的一个礼品</li>
                            <li>参与后不可以取消，不限参与次数</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mui-content-padded" style="margin: 5px 5px 0px;">
                <h5>请填写收货地址：</h5>
                <form class="mui-input-group">
                    <div class="mui-input-row">
                        <label style="font-size: 15px;color: #7d7d7d;">地址</label>
                        <input type="text" id="cityInput" style="font-size: 13px;" placeholder="" readonly="readonly">
                    </div>
                    <div class="mui-input-row">
                        <label style="font-size: 15px;color: #7d7d7d;">详细地址</label>
                        <input type="text" id="detailInput" class="mui-input-clear" placeholder="" style="font-size: 13px;" data-input-clear="5"><span class="mui-icon mui-icon-clear mui-hidden"></span>
                    </div>
                    <div class="mui-input-row">
                        <label style="font-size: 15px;color: #7d7d7d;">收件人姓名</label>
                        <input type="text" class="mui-input-clear" value="<?php echo $userObj['user_name']; ?>" placeholder="" id="nameInput" style="font-size: 13px;" data-input-clear="5"><span class="mui-icon mui-icon-clear mui-hidden"></span>
                    </div>
                    <div class="mui-input-row">
                        <label style="font-size: 15px;color: #7d7d7d;">手机号</label>
                        <input type="text" id="phoneInput" class="mui-input-clear" value="<?php echo $userObj['mobile']; ?>" placeholder="" style="font-size: 13px;" data-input-clear="5"><span class="mui-icon mui-icon-clear mui-hidden"></span>
                    </div>
                    <div class="mui-button-row">
                        <button type="button" id="take_part_in" style="width: 35%; cursor: pointer;" class="mui-btn mui-btn-primary">立即参与</button>
                    </div>
                </form>
            </div>

            <li class="mui-table-view-divider">礼品列表</li>

            <li class="mui-table-view-cell mui-media">
                <a href="javascript:;">
                    <img class="mui-media-object mui-pull-left" src="https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=1704699033,12521334&fm=27&gp=0.jpg">
                    <div class="mui-media-body">
                        办公桌
                        <p class="mui-ellipsis">绝对实在好用</p>
                    </div>
                </a>
            </li>
            <li class="mui-table-view-cell mui-media">
                <a href="javascript:;">
                    <img class="mui-media-object mui-pull-left" src="https://ss0.bdstatic.com/70cFvHSh_Q1YnxGkpoWK1HF6hhy/it/u=2799822764,2566773122&fm=27&gp=0.jpg">
                    <div class="mui-media-body">
                        文竹
                        <p class="mui-ellipsis">绿化你的办公环境</p>
                    </div>
                </a>
            </li>
            <li class="mui-table-view-cell mui-media">
                <a href="javascript:;">
                    <img class="mui-media-object mui-pull-left" src="https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=3026307392,246240997&fm=27&gp=0.jpg">
                    <div class="mui-media-body">
                        办公黑板
                        <p class="mui-ellipsis">没有黑板怎么行呢</p>
                    </div>
                </a>
            </li>
            <li class="mui-table-view-cell mui-media">
                <a href="javascript:;">
                    <img class="mui-media-object mui-pull-left" src="https://ss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=3929094867,610214862&fm=27&gp=0.jpg">
                    <div class="mui-media-body">
                        电脑椅
                        <p class="mui-ellipsis">程序员标配</p>
                    </div>
                </a>
            </li>
        </div>
<!--    </div>

    <div class="mui-content" id="con2" style="display: none;"> -->

        

    </div>

	<script type="text/javascript" src="/static/index/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/static/index/layer/layer.js"></script>
    <script type="text/javascript" src="/static/index/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/static/index/js/mui/dist/js/mui.min.js"></script>
    <script src="/static/index/js/mui/plugin/picker/js/mui.picker.js"></script>
    <script src="/static/index/js/mui/plugin/picker/js/mui.poppicker.js"></script>
    <script type="text/javascript" src="/static/index/bootstrap/js/city_picker_str.js"></script>
    <script type="text/javascript">
        mui.init();
        (function($, doc) {
            $.init();

            //地址
            var cityPicker = new $.PopPicker({
                layer: 3
            });
            cityPicker.setData(cityData);
            var showCityPickerButton = doc.getElementById('cityInput');
            // var cityResult3 = doc.getElementById('cityResult3');
            showCityPickerButton.addEventListener('tap', function(event) {
                cityPicker.show(function(items) {
                    // cityResult3.innerText = "你选择的城市是:" + (items[0] || {}).text + " " + (items[1] || {}).text + " " + (items[2] || {}).text;
                    //返回 false 可以阻止选择框的关闭
                    //return false;
                    document.getElementById('cityInput').value = items[0].text+items[1].text+items[2].text;
                    // document.getElementById('addressInput').value = items[0].text+'-'+items[1].text;
                });
            }, false);
        })(mui, document);



        $('#take_part_in').click(function(){
            var yanzhi = parseInt($('#con1').attr('yanzhi'));
            var need = parseInt($('#con1').attr('need'));
            var ajaxPost = false;

            if (need <= yanzhi) {
                var detailAddress = document.getElementById('detailInput').value;
                var cityAddress = document.getElementById('cityInput').value;
                var name = document.getElementById('nameInput').value;
                var phone = document.getElementById('phoneInput').value;

                if (detailAddress != '' && cityAddress != '' && name != '' && phone != '') {
                    localStorage.detailAddress = detailAddress;
                    localStorage.cityAddress = cityAddress;
                    localStorage.nameValue = name;
                    localStorage.phoneValue = phone;
                }
                if (!ajaxPost) {

                    ajaxPost = true;
                    $.ajax({
                        url: '/index/activity/joinGift',
                        dataType: 'json',
                        data: {
                            detailAddress: detailAddress,
                            cityAddress: cityAddress,
                            name: name,
                            phone: phone
                        },
                        type: 'post',
                        success: function(data) {
                            if (data.errcode == 0) {
                                layer.msg('参加成功,我们会尽快发送您的礼品。');
                                setTimeout(function(){
                                    window.location.href = '/index/index/xiaoyou.html?activity_id=<?php echo $act_obj['activity_id']; ?>';
                                }, 1200)
                            } else {
                                ajaxPost = false;
                            }
                        }
                    })
                }
            } else {
                layer.msg('你的研值不足，无法参加活动。');
            }
        })


        $(function(){
            if (localStorage.cityAddress) {
                document.getElementById('cityInput').value = localStorage.cityAddress;
            }

            if (localStorage.detailAddress) {
                document.getElementById('detailInput').value = localStorage.detailAddress;
            }

            if (localStorage.nameValue) {
                document.getElementById('nameInput').value = localStorage.nameValue;
            }

            if (localStorage.phoneValue) {
                document.getElementById('phoneInput').value = localStorage.phoneValue;
            }
        })
    </script>
</body>
</html>