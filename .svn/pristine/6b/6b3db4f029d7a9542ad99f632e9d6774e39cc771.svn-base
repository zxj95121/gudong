<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/index\view\Default\iPad\ceshi.html";i:1504533882;}*/ ?>
<html>
<head>
	<meta charset = "utf-8">
  <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport">
  <meta name="screen-orientation" content="portrait">
  <meta name="x5-orientation" content="portrait">
    <link rel="stylesheet" type="text/css" href="/static/iPad/css/style.css">
  <!--  <link rel="stylesheet" media="screen and (orientation:portrait)" href="portrait.css" />  竖屏-->
    <!--<link rel="stylesheet" media="screen and (orientation:landscape)" href="landscape.css" /> 横屏-->
  <script type="text/javascript" src="/static/iPad/js/jquery.min.js"></script>
	<title>入学测试</title>

</head>
    <body>
      <ul class="ceishi_top"><!--头部start-->
  	    <li>
          <a href="<?php echo url('/index/iPad/menu'); ?>"><img src="/static/iPad/img/shangke_top.png" width="27" height="25" style="margin-top: 5px;margin-right: 10px;"/></a>
         <span><?php echo $user; ?>,您好</span>
        </li>
        <li>入学测试</li>
  	    <li><img src="/static/iPad/img/exit.png" width="20" height="20" style="margin-top:10px;margin-right: 10px;"><a href="">退出</a></li>
  	  </ul><!--头部end-->
      <div class="clear"></div>
      <div class="ceishi_kumu"><!--考试科目（人）内容start-->
        <p>科&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 13px;">目</span>：<span style="color: #999" class="ceishi_spanK"><?php echo $subjectName; ?></span></p>
        <img src="/static/iPad/img/left.png" class="ceishi_imgleft01" id="ceishi_imgleft01" style="cursor: pointer;">
      </div>
      <div class="ceishi_kumu">
        <p>学生编号：<span style="color: #999; text-decoration: none;" class="ceishi_spanB"><?php echo $firstStudentNo; ?></span></p>
        <!--<img src="/static/iPad/img/left.png" class="ceishi_imgleft02" style="cursor: pointer;">-->
      </div>
      <div class="ceishi_kumu">
        <p>学生姓名：<span style="color: #999" class="ceishi_spanN"><?php echo $firstStudentName; ?></span></p>
        <img src="/static/iPad/img/left.png" class="ceishi_imgleft03" id="ceishi_imgleft03" style="cursor: pointer;">
      </div>                   <!--考试科目（人）内容end-->



      <div class="ceishi_dati"><!--考试start-->
        <a class="" href="<?php echo url('index/iPad/ceshi_online'); ?>">线上考试</a>
        <a href="<?php echo url('index/iPad/ceshi_offline'); ?>">线下考试</a>
      </div>                   <!--考试end-->

    </body>
</html>

<script src="/static/iPad/js/jq.js"></script>
<script src="/static/iPad/js/jquery.selector-px.js"></script>
<script src="/static/iPad/js/picker.min.js" type="text/javascript"></script>
<script type="text/javascript">
  $(function(){

      //科目
      var rightDS = document.getElementById('ceishi_imgleft01');

      var subject=[];
      $.each(<?php echo $subjectInfo; ?>,function(i,n){
          subject[i]={"text":n.subject_name,"value":n.subject_id};
      })
      var kemu = [
          subject
        /*
         [{"text":"00","value":"00"},{"text":"05","value":"05"},{"text":"10","value":"10"}],*/
      ];
      var rightDS_picker = new Picker({
          title: '请选择科目',
          data: kemu
      });
      rightDS_picker.on('picker.select', function (selectedVal, selectedIndex) {
          //console.log(selectedIndex);
          $(".ceishi_spanK").html(kemu[0][selectedIndex[0]].text);
          var subject_id = kemu[0][selectedIndex[0]].value;
          window.location.href = "/index/iPad/ceshi?subject_id="+subject_id;
      });
      rightDS.addEventListener('click', function () {
          rightDS_picker.show();

      });

      //学生姓名
      var rightDSS = document.getElementById('ceishi_imgleft03');
      var name=[];
      $.each(<?php echo $allStudent; ?>,function(i,n){

//          var name = n.student_name;

          name[i]={"text":n.student_name+'('+n.student_no+')',"value":n.student_no,"name":n.student_name};

      })
      var student = [
          name
          /*
           [{"text":"00","value":"00"},{"text":"05","value":"05"},{"text":"10","value":"10"}],*/
      ];
      var rightDSS_picker = new Picker({
          title: '请选择姓名',
          data: student
      });
      rightDSS_picker.on('picker.select', function (selectedVal, selectedIndex) {
          //console.log(selectedIndex);
          $(".ceishi_spanN").html(student[0][selectedIndex[0]].name);
          $(".ceishi_spanB").html(student[0][selectedIndex[0]].value);
//          var subject_id = kemu[0][selectedIndex[0]].value;
//          window.location.href = "/index/iPad/ceshi?subject_id="+subject_id;
      });
      rightDSS.addEventListener('click', function () {
          rightDSS_picker.show();

      });



  })
</script>