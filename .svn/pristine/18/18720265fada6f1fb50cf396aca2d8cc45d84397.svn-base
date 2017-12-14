<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:101:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/index\view\Default\parents\arrange_history.html";i:1504592198;}*/ ?>
          <!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<link rel="stylesheet" href="<?php echo $base_path; ?>/Font-Awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo $base_path; ?>/css/common.css">
		<title>约课历史记录</title>
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
				width:90%;
				height:2.8rem;
				margin-left: 5%;
				line-height: 2.8rem;
			}
			.item:last-child{
				padding-bottom: 2rem;
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
			}
			.item span{
				margin-right: 0.8rem;
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
			.impt{
				color: #17F377;
			}
			.itemTitle{
				border-bottom: 1px solid #ccc;
				color: #ccc;
			}
			@media screen and (-webkit-min-device-pixel-ratio: 3) {
	    		.itemTitle{
					border-bottom: 1px solid #666 !important;
				}
			}
		</style>
		<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
	</head>
	<body>
		<div class="top-img">
			<div class="back"><i class="fa  icon-angle-left icon-2x"></i></div>
			<div class="title"><p>约课历史记录</p></div>
            <div class="add"><a href="<?php echo url('index/parents/person_center'); ?>"><img src="<?php echo $base_path; ?>/img/home.png" width="100%"></a></div>
		</div>
        <?php foreach($arrange as $key=>$item): ?>
        <div class="home-top">
            <div class="item itemTitle">
                <span class="">约课时间</span><span class="arrangeTime"><?php echo $item['arrange_time']; ?></span>
            </div>
            <div class="item">
                <span class="studentName"><?php echo $item['student_name']; ?>：</span><span class="studentName"><?php echo $item['student_no']; ?></span>
            </div>
            <div class="item">
                <span>预约科目：</span><span class="arrangeClass"><?php echo $item['subject_name']; ?></span>
            </div>
            <div class="item">
                <span>到校时间：</span><span class="arriveTime"><?php echo $item['arrive_time']; ?></span>
            </div>
            <div class="item">
                <span>教学地点：</span><span class="storeName"><?php echo $item['store_name']; ?></span>
            </div>
            <div class="item">
                <span style="visibility: hidden;">教学地点：</span>	<span class="location"><?php echo $item['store_location']; ?></span>
            </div>
            <div class="item impt">
                <span style="">入学测试评分：</span>
                <span class="enterGrade">
                    <?php switch($item['enter_grade']): case "1": ?>优<?php break; case "2": ?>良<?php break; case "3": ?>合格<?php break; case "4": ?>不合格<?php break; default: endswitch; ?>
                    <!--<?php echo $item['enter_grade']; ?>-->
                </span>
            </div>
            <div class="item impt">
                <span style="">推荐阶段：</span>	<span class="recStep">
                    <?php echo $item['stage_name']; ?>
                </span>
            </div>
            <div class="item impt">
                <span style="">推荐课程：</span>	<span class="recClass"><?php echo $item['course_name']; ?></span>
            </div>
        </div>
        <?php endforeach; ?>

<!--		<div class="home-top">
			<div class="item itemTitle">
				<span class="">约课时间</span><span class="arrangeTime">2017-07-02 20：16</span>
			</div>
			<div class="item">
				<span class="studentName">小明</span><span class="studentName">20170100001</span>
			</div>
			<div class="item">
				<span>预约科目：</span><span class="arrangeClass">数学</span>
			</div>
			<div class="item">
				<span>到校时间：</span><span class="arriveTime">2017-09-02</span>
			</div>
			<div class="item">
				<span>教学地点：</span><span class="storeName">普陀区中心门店</span>
			</div>
			<div class="item">
				<span style="visibility: hidden;">教学地点：</span>	<span class="location">上海市普陀区大花一路52弄12号</span>
			</div>
			<div class="item impt">
				<span style="">入学测试评分：</span>	<span class="enterGrade">优</span>
			</div>
			<div class="item impt">
				<span style="">推荐阶段：</span>	<span class="recStep">第三课程</span>
			</div>	
			<div class="item impt">
				<span style="">推荐课程：</span>	<span class="recClass">减法运算</span>
			</div>	
		</div>-->
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

