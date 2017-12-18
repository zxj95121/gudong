<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:95:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/index\view\Default\parents\classList.html";i:1504533869;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<link rel="stylesheet" href="<?php echo $base_path; ?>/Font-Awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo $base_path; ?>/css/common.css">
		<link rel="stylesheet" href="<?php echo $base_path; ?>/css/calen.css">
		<title>课程表</title>
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
			.home-top .item{
				width:90%;
				height:2.8rem;
				margin-left: 5%;
				line-height: 2.8rem;
				border-bottom: 1px solid #ccc;
			}
			.home-top .item:last-child{
				border-bottom: none;
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
			.home-top .item span{
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
			.classDetail{
				position: relative;
				border-bottom: none;
			}
			.classDetail p{
				position: absolute;
				font-size: 0.9rem;
			}
			.classTime{
				width: 100%;
				line-height: 2.8rem;
				text-align: left;
			}
			.classTeacher{
				width: 100%;
				line-height: 2.8rem;
				text-align: right;
			}
			.className{
				width: 100%;
				line-height: 2.8rem;
				text-align: center;
			}
			.hasStudy{
				background: #17F377;
				border: green;
                color: white !important;
			}
		</style>
		
		<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
		<script src="<?php echo $base_path; ?>/js/calen.js"></script>
	</head>
	<body>
		<div class="top-img">
			<div class="back"><i class="fa  icon-angle-left icon-2x"></i></div>
			<div class="title"><p>课程表</p></div>
			<div class="add"><a href="<?php echo url('index/parents/person_center'); ?>"><img src="<?php echo $base_path; ?>/img/home.png" width="100%"></a></div>
		</div>
		<div class="home-top">
			<div class="item itemTitle">
				<span class="">学生编号：</span><span class="studentNo"><?php echo $studentInfo['student_no']; ?></span>
			</div>
			<div class="item">
				<span class="">学生姓名：</span><span class="studentName"><?php echo $studentInfo['student_name']; ?></span>
			</div>
		</div>

		<div id="calendar" class="calendar"></div>
		<p class="note" style="color:red;font-size: 0.8rem;width: 100%;text-align: center;margin-top: 0.5rem;">注：绿色为有课，橙色为显示当天课程的详细信息，如下</p>
		<div class="home-top classInfo">
		</div>
	</body>
	<script>
        $(function(){
            loadClass();
            function loadClass(){
                $.each(<?php echo $courseInfo; ?>,function (i,n) {
                    if(n.week_day1 != '0'){
                        addStudy(1);
                    }
                    if(n.week_day2 != '0'){
                        addStudy(2);
                    }
                    if(n.week_day3 != '0'){
                        addStudy(3);
                    }
                    if(n.week_day4 != '0'){
                        addStudy(4);
                    }
                    if(n.week_day5 != '0'){
                        addStudy(5);
                    }
                    if(n.week_day6 != '0'){
                        addStudy(6);
                    }
                    if(n.week_day7 != '0'){
                        addStudy(7);
                    }
                });
            }
            function addStudy(index){
                var length = $(".calendar-date").find(".item").length/7;
                for(var i=0;i<length;i++){
                    var eq = index + i*7;
                      var $this= $(".calendar-date").find(".item").eq(eq);
                        if($(".calendar-date").find(".item").eq(eq).hasClass("item-curMonth")||$(".calendar-date").find(".item").eq(eq).hasClass("item-curDay")){
                            $this.addClass("hasStudy");
                        }
                }
            }
            $(".arrow-next").click(function(){
                loadClass();
            })
            $(".arrow-prev").click(function(){
                loadClass();
            })
            $(".hasStudy").click(function(){
                $(".calendar-date").find(".item-curDay").removeClass("item-curDay");
                $(this).addClass("item-curDay");
                var date = $(this).attr("data");
                getTodayClass(date);
            })
            function  getTodayClass(thisDate){
                var studentNo= $(".studentNo").html();
                $.ajax({
                    url:"<?php echo url('/index/parents/getTodayClass'); ?>",
                    type:'POST',
                    data:{
                        thisDate:thisDate,
                        studentNo:studentNo
                    },
                    cache: false,
                    success:function(data){
                        var html="";
                        $.each(data,function(i,n){
                            var subject="";
                            if(n.sub_id==1){
                                subject="数学";
                            }
                           else if(n.sub_id==2){
                                subject="语文";
                            }
                           else if(n.sub_id==3){
                                subject="英语";
                            }
                            else{}
                             html+=  "<div class='item classDetail'>"+
                                     " <p class='classTime'>"+ n.start_time+"-"+ n.end_time+"</p>"+
                                     "<p class='className'>"+subject+"</p>"+
                                     " <p class='classTeacher'>"+ n.staff_name+"</p>"+
                                "  </div>";
                        })
                        $(".classInfo").html(html);
                    }
                })
            }
        })

	</script>
	<script src="<?php echo $base_path; ?>/js/common.js"></script>
</html>
