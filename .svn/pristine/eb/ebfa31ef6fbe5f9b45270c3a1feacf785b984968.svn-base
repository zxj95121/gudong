<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:93:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/index\view\Default\parents\arrange.html";i:1504533869;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<link rel="stylesheet" href="/static/parents/Font-Awesome/css/font-awesome.min.css">
        <link href="/static/parents/css/common.css" rel="stylesheet" type="text/css" />
		<title>我的约课</title>
		<style>
			html,body{
				padding: 0;
				margin: 0;
				font-family: "微软雅黑";
				background: #f9f9f9;
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
				height:2.8rem;
				margin-left: 8%;
				line-height: 2.8rem;
				border-bottom: 1px solid #ccc;
			}
			.item:last-child{
				/*padding-bottom: 2rem;*/
			}
			.item-right{
				float: right;
			}
			.item-right i{color: #ccc;font-size: 1.4rem;}
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
			.check{
				    width: 1rem;
				    margin-top: 0.9rem;
				    margin-left: 1.2rem;
				    float: left;
			}
			.checked{
				color:#18bd8a
			}
			.item-right input{
				margin-right: 0.5rem;
				height: 100%;
				text-align: right;
				line-height: 2.8rem;
				border: none;
				font-size: 1rem;
                color: #6f6f6f;
			}
			input{
				outline: none;
			}
			input:disabled {
    			background-color: rgba(0, 0, 0,0);
			}
			.arrangeImd{
				margin-top: 2rem;
			    height: 2.8rem;
			    border: none;
			    outline: none;
			    background: #17f377;
			    color: white;
			    font-size: 1.4rem;
			    border-radius: 0.3rem;
			}
			.course_time select{
				border: 1px solid #ccc;
				font-size: 1rem;
				color: #6f6f6f;
				-moz-appearance:normal;
				-webkit-appearance:normal;
				outline: none;
			}
			ul li,li{list-style: none}
		</style>
		<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
        <script src="/static/parents/js/picker.min.js"></script>
	</head>
	<body>
		<div class="top-img">
			<div class="back"><i class="fa  icon-angle-left icon-2x"></i></div>
			<div class="title"><p>我的约课</p></div>
			<div class="top-right">历史记录</div>
		</div>
        <form action="<?php echo url('/index/parents/saveArrangeInfo'); ?>" method="post"  enctype="multipart/form-data">
		<div class="home-top">
            <input value="" id="pickId" hidden>
            <input value="<?php echo $parentNo; ?>" class="parentNo" name="parentNo" hidden>

			<div class="item">
				<span>学生姓名</span>
				<div class="item-right">
					<input type="hidden" name="studentNo" id="select_no" value="<?php echo $student_no; ?>" placeholder="请选择&nbsp;&nbsp;>">
					<input type="text" name="studentName" id="select_student" value="<?php echo $student_name; ?>" placeholder="请选择&nbsp;&nbsp;>">
                     <?php foreach($student as $key=>$item): ?>
                       <input class="studentVal" value="<?php echo $item['student_name']; ?>" data-studentno="<?php echo $item['student_no']; ?>" hidden="hidden">
                     <?php endforeach; ?>
				</div>

			</div>
			<div class="item">
				<span>科目</span>
				<div class="item-right">
					<input type="hidden" name="subjectId" id="subject_id" value="<?php echo $subject_id; ?>" placeholder="请选择&nbsp;&nbsp;>">
                    <input type="text" name="subject" id="select_subject" value="<?php echo $subject_name; ?>" placeholder="请选择&nbsp;&nbsp;>">
					<?php foreach($subject as $key=>$item): ?>
					<input class="subjectVal" value="<?php echo $item['subject_name']; ?>" data-subjectid="<?php echo $item['subject_id']; ?>" hidden="hidden">
					<?php endforeach; ?>
				</div>
			</div>
			<div class="clear"></div>

			<div class="item">
				<span>到校时间</span>
				<div class="item-right">
                    <input type="text" name="arriveTime" id="arriveTime" value="<?php echo $arriveTime; ?>" placeholder="请选择&nbsp;&nbsp;>">
				</div>
			</div>
			<div class="clear"></div>

			<div class="item">
				<span>教学地点</span>
				<div class="item-right">
					<input type="text" name="studyLocation"  id="studyLocation" value="<?php echo $store_name; ?>" placeholder="请选择&nbsp;&nbsp;>">
					<?php foreach($store as $key=>$item): ?>
					<input class="locationVal" value="<?php echo $item['store_name']; ?>" hidden>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="item" style="border-bottom: none;">
                <?php foreach($store as $key=>$item): ?>
                     <input class="storeAddress" value="<?php echo $item['address']; ?>" hidden="hidden">
                <?php endforeach; ?>
                <input type="text" name="location"  id="location" class="location" style="background:rgba(0,0,0,0);border:none;float: right;font-size:1.1rem;color:#6f6f6f;text-align:right;margin: 0.5rem 0 0.5rem 0;" value="<?php echo $store_addres; ?>">
				<!--<p class="location" style="float: right;margin: 0.5rem 0 0.5rem 0;">真华路962弄105室501</p>-->
			</div>
		</div>
		    <input type="submit" class="arrangeImd item boxshadow" value="确认约课" />
        </form>
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

        $(".top-right").click(function(){
            var parentNo=$(".parentNo").val();
            window.location.href='arrange_history.html?parentNo='+parentNo;
        })


        $(function(){
            var rightDS = document.getElementById('studyLocation');
            var student=[];
            var arr1=[];
            var arr2=[];
            var location=$(".locationVal");
            for(var i=1;i<location.length+1;i++){
                student[i-1]={"text":location.eq(i-1).val(),"value":location.eq(i-1).val()};
            }
            var _data = [
                arr1,student,arr2
            ];
            var rightDS_picker2 = new Picker({
                title: '请选择',
                data: _data
            });
            rightDS_picker2.on('picker.select', function (selectedVal, selectedIndex) {
                $ ('#studyLocation').val(_data[1][selectedIndex[1]].value) ;
                $("#location").val($(".storeAddress").eq(selectedIndex[1]).val());
                var student_name = $('#select_student').val();
                var student_no = $('#select_no').val();
                var subject_name = $('#select_subject').val();
                var arrange = $('#arriveTime').val();
                var arriveTime = $('#arriveTime').val();
                var store_name = $('#studyLocation').val()
                var store_addres = $('#location').val();
                var parentNo = $('.parentNo').val();
            });
            rightDS_picker2.on('picker.change', function (index, selectedIndex) {
                //console.log(index);
            });
            rightDS_picker2.on('picker.valuechange', function (selectedVal, selectedIndex) {
                //console.log(selectedVal);
            });
            rightDS.addEventListener('click', function () {
                rightDS_picker2.show();
            });
        })


	</script>
	<script src="/static/parents/js/common.js"></script>
    <script src="/static/parents/js/arrange/namePick.js"></script>

    <script src="/static/parents/js/arrange/arriveTimePick.js"></script>
	<script src="/static/parents/js/arrange/subjectPick.js"></script>
</html>

