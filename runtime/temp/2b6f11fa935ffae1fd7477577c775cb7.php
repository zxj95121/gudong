<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:94:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/index\view\Default\teacher\stu_info.html";i:1504533868;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>老师-课程安排</title>
<link href="<?php echo $base_tPath; ?>/css/style.css" type="text/css" rel="stylesheet">

    <link href="<?php echo $base_tPath; ?>/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $base_tPath; ?>/css/common.css">
      <script src="<?php echo $base_tPath; ?>/js/picker.min.js"></script>
<style>
	.liActive{
		border-bottom:2.667px solid #1cf377;
	}
</style>
</head>
<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
<body style="background:#f6f6f6;width:100%;height:100%">

<div class="tea-top clear-fix">
    <div class="top-left"><a href="<?php echo url('index/Teacher/center'); ?>"><img src="<?php echo $base_tPath; ?>/img/icon-arrow-left.png"/></a></div>
    课程安排
    <div class="top-right1"><a href="<?php echo url('index/Teacher/center'); ?>"><img src="<?php echo $base_tPath; ?>/img/icon-home.png"/></a></div>
</div>

<div class="tea-stu-sele">
   <ul>
      <li class="clear-fix" style="border:none;">
         <span>科目：</span><?php echo $staff['subject_name']; ?>
      </li>
   </ul>
</div>
<input type="text" value="<?php echo $today; ?>" class="today" hidden/>
<input type="text" value="<?php echo $staffId; ?>" class="staffId" hidden/>
<div class="tea-stu-list">
   <div class="tea-stu-list-data">
   	<!--<i class="fa fa-angle-left"></i>-->
       <span class="classTime"><span><?php echo $today; ?></span>&nbsp;&nbsp;第<span><?php echo $week; ?></span>周&nbsp;</span>
      <i class="fa fa-angle-right" id="chooseTime"></i>
   </div>
   <div class="tea-stu-list-week">
      <ul class="clear-fix">
         <li <?php if($week_dayX == 1): ?>class="liActive"<?php endif; ?> data-week = '1'>周一</li>
         <li <?php if($week_dayX == 2): ?>class="liActive"<?php endif; ?> data-week = '2'>周二</li>
         <li <?php if($week_dayX == 3): ?>class="liActive"<?php endif; ?> data-week = '3'>周三</li>
         <li <?php if($week_dayX == 4): ?>class="liActive"<?php endif; ?> data-week = '4'>周四</li>
         <li <?php if($week_dayX == 5): ?>class="liActive"<?php endif; ?> data-week = '5'>周五</li>
         <li <?php if($week_dayX == 6): ?>class="liActive"<?php endif; ?> data-week = '6'>周六</li>
         <li <?php if($week_dayX == 7): ?>class="liActive"<?php endif; ?> data-week = '7'>周日</li>
      </ul>
   </div>
   <div class="tea-stu-list-name">
      <ul class="clear-fix">
      	<?php foreach($arrange as $key=>$item): ?>
	      	<li><span><?php echo $item['student_name']; ?></span><em><?php echo $item['arStudentNo']; ?></em>
	         </li>
      	<?php endforeach; ?>
      </ul>
   </div>
</div>
<script src="<?php echo $base_tPath; ?>/js/common.js"></script>
<script>
	$(function(){

//	    选择周几
        $('.tea-stu-list-week>ul>li').click(function () {
           $('.tea-stu-list-week>ul>li').removeClass('liActive');
           $(this).addClass('liActive');
           var today = $('.classTime>span:first-child').html();
            var week = $('.classTime>span:nth-child(2)').html();

            var week_day = $(this).data('week');
            window.location.href="/index/teacher/stu_info?today="+today+"&week="+week+"&week_day="+week_day;
        });
        //选择日期
        var today;
        var rightDS = document.getElementById('chooseTime');
        var day=[];
        var year=[];
        var month=[];
        for(var i=1;i<=5;i++){
            year[i-1]={"text":i+2016,"value":i+2016};
        }
        for(var i=1;i<=12;i++){
            if(i<10){
                month[i-1]={"text":"0"+i,"value":"0"+i};
            }
            else{
                month[i-1]={"text":i,"value":i};
            }
        }
        for(var i=1;i<=5;i++){
            if(i<10){
                day[i-1]={"text":i,"value":i};
            }
            else{
                day[i-1]={"text":i,"value":i};
            }
        }
        var _data = [
            year,month,day
        ];
        var rightDS_picker = new Picker({
            title: '请选择',
            data: _data
        });
        rightDS_picker.on('picker.select', function (selectedVal, selectedIndex) {
            $(".classTime").html(_data[0][selectedIndex[0]].value +'年'+ _data[1][selectedIndex[1]].value +'月&nbsp;第'+ _data[2][selectedIndex[2]].text+'周');
            var today = _data[0][selectedIndex[0]].value +'-'+ _data[1][selectedIndex[1]].value;
            var week = _data[2][selectedIndex[2]].value;

            window.location.href="/index/teacher/stu_info?today="+today+"&week="+week;
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
</body>
</html>
