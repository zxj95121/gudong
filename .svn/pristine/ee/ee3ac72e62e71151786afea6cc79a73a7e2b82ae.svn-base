<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:96:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/index\view\Default\teacher\attendance.html";i:1504533868;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>老师-考勤记录</title>
<link href="<?php echo $base_tPath; ?>/css/style.css" type="text/css" rel="stylesheet">
<link href="<?php echo $base_tPath; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">

   <link rel="stylesheet" href="<?php echo $base_tPath; ?>/css/common.css">
<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
   <link href="<?php echo $base_tPath; ?>/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<script src="<?php echo $base_tPath; ?>/js/picker.min.js"></script>

   <style>
      html,body{
         padding: 0;
         margin: 0;
         font-family: "微软雅黑";
         background: #f6f6f6;
         color: #6f6f6f;
      }
      p,img{padding: 0;margin: 0;}
      span,p{font-size: 0.9rem;}
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
         border-bottom: 1px solid #ccc;
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
      .recording {
         position: fixed;
         bottom: -8rem;
         left: 0;
         width: 100%;
         height: 8rem;
         background: rgba(255, 255, 255, 0.7);
      }
      .active_blue{
         background: blue;
         color: #fff;!important;
      }
      .active_red{
         background: red;
         color: #fff;!important;
      }
      .active_red span,.active_red em,active_blue span,.active_blue em{
         color: #fff;
      }
   </style>
</head>


<body style="background:#f6f6f6;width:100%;height:100%">

<!--<div class="tea-top clear-fix">-->
  <!--<div class="top-left"><a href="teacher.html"><img src="<?php echo $base_tPath; ?>/img/icon-arrow-left.png"/></a></div>-->
  <!--考勤记录-->
  <!--<div class="top-right1"><a href="teacher.html"><img src="<?php echo $base_tPath; ?>/img/icon-home.png"/></a></div>-->
<!--</div>-->
<div class="top-img">
   <div class="back"><a href="<?php echo url('index/Teacher/center'); ?>"><img src="<?php echo $base_tPath; ?>/img/icon-arrow-left.png" width="15" height="25" style="position: relative;top:5px;
"/></a></div>
   <div class="title"><p>考勤记录</p></div>
   <div class="add"><a href="<?php echo url('index/Teacher/center'); ?>"><img src="<?php echo $base_tPath; ?>/img/home.png" width="100%"></a></div>
</div>

<div class="tea-stu-sele">
   <ul>
      <li class="clear-fix">
         <span>考勤日期：</span><span class="today classTime"><?php echo $today; ?></span>
         <i class="fa fa-angle-right fa-1x" id="chooseTime"></i>
      </li>
      <li class="clear-fix">
         <span>科目：</span><span class="tea-info-fA"><?php echo $staff['subject_name']; ?></span>
      </li>
   </ul>
</div>
<input value="<?php echo $staffId; ?>" class="staffId" hidden>
<div class="tea-stu-list" style="padding-top:5px;">   
   <div class="tea-stu-list-name">
      <ul class="clear-fix">
         <?php foreach($coursePlan as $course): if($course['at_status'] == 1): ?>
                     <li class="active1 workbook"><span><?php echo $course['student_name']; ?></span><em><?php echo $course['student_no']; ?></em></li>
                  <?php elseif($course['at_status'] == 4): ?>
                      <li class="active_blue workbook"><span style="color: #fff;"><?php echo $course['student_name']; ?></span><em style="color: #fff;"><?php echo $course['student_no']; ?></em></li>
                  <?php elseif($course['at_status'] == 5): ?>
                      <li class="active_red workbook"><span style="color: #fff;"><?php echo $course['student_name']; ?></span><em style="color: #fff;"><?php echo $course['student_no']; ?></em></li>
                  <?php else: ?>
                     <li class="workbook"><span><?php echo $course['student_name']; ?></span><em><?php echo $course['student_no']; ?></em></li>
                  <?php endif; endforeach; ?>
      </ul>
   </div>
   <p>注：绿色为已签到，蓝色早到，红色迟到，灰色为未签到</p>
</div>
<script>
    //课程练习册扫码
    $('.workbook').click(function () {
        var studentName = $(this).find('span').html();
        var studentNo = $(this).find('em').html();
        var subjectName = $('.tea-info-fA').html();
        window.location.href = "<?php echo url('index/teacher/workbook'); ?>?studentName="+studentName+"&studentNo="+studentNo+"&subjectName="+subjectName;
    })
   //时间选择
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
    for(var i=1;i<=31;i++){
        if(i<10){
            day[i-1]={"text":"0"+i,"value":"0"+i};
        }
        else{
            day[i-1]={"text":i,"value":i};
        }
    }
    var _data = [
        year,month,day
        /*
         [{"text":"00","value":"00"},{"text":"05","value":"05"},{"text":"10","value":"10"}],*/
    ];
    var rightDS_picker = new Picker({
        title: '请选择',
        data: _data
    });
    rightDS_picker.on('picker.select', function (selectedVal, selectedIndex) {
        //console.log(selectedIndex);
        var time=_data[0][selectedIndex[0]].value +'-'+ _data[1][selectedIndex[1]].value +'-'+ _data[2][selectedIndex[2]].value;
        $(".classTime").html(_data[0][selectedIndex[0]].value +'-'+ _data[1][selectedIndex[1]].value +'-'+ _data[2][selectedIndex[2]].value);
        var today = $('.classTime').html();
//             alert(today);
        window.location.href="/index/teacher/attendance?today="+today;
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



	
</script>
</body>
<script src="<?php echo $base_tPath; ?>/js/common.js"></script>
</html>

<script src="<?php echo $base_tPath; ?>/js/jquery.selector-px.js"></script>
