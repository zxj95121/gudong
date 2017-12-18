<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:94:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/index\view\Default\teacher\entrance.html";i:1504533868;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>老师-入学学生</title>
<link href="<?php echo $base_tPath; ?>/css/style.css" type="text/css" rel="stylesheet">
<link href="<?php echo $base_tPath; ?>/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style>
        .active{
            background: #67fa88 !important;
        }
    </style>
</head>
<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
<script src="<?php echo $base_tPath; ?>/js/picker.min.js"></script>
<body style="background:#f6f6f6;width:100%;height:100%">

<div class="tea-top clear-fix">
  <div class="top-left"><a href="<?php echo url('index/Teacher/center'); ?>"><img src="<?php echo $base_tPath; ?>/img/icon-arrow-left.png"/></a></div>
  入学学生
  <div class="top-right1"><a href="<?php echo url('index/Teacher/center'); ?>"><img src="<?php echo $base_tPath; ?>/img/icon-home.png"/></a></div>
</div>

<div class="tea-stu-sele">
   <ul>
      <li class="clear-fix" style="border:none;">
         <span>测试日期：</span><span class="today"><?php echo $today; ?></span>
         <i class="fa fa-angle-right fa-1x" id="chooseDate"></i>
      </li>
   </ul>
</div>
<input value="<?php echo $staffId; ?>" id="staffId" hidden>
<div class="tea-stu-list" style="padding-top:5px;">
   <div class="tea-stu-list-name">
      <ul class="clear-fix">
      </ul>
   </div>
   <p>注：绿色为已分配课程，灰色为未分配</p>
</div>
<style type="text/css">
    .tea-stu-list-name .active span,.tea-stu-list-name .active em{
        color:#FFF!important;
    }
</style>
</body>
<script>
    $(function(){
        var today=$(".today").html();
        var staffId=$("#staffId").val();
        var rightDS = document.getElementById('chooseDate');
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
//            alert(123);
            var time=_data[0][selectedIndex[0]].value +'-'+ _data[1][selectedIndex[1]].value +'-'+ _data[2][selectedIndex[2]].value;
            $(".today").html(_data[0][selectedIndex[0]].value +'-'+ _data[1][selectedIndex[1]].value +'-'+ _data[2][selectedIndex[2]].value);
            today = time;
            queryStudentByTime();
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
        queryStudentByTime();
        function queryStudentByTime() {
//            alert(123);
            $.ajax({
                type: "post",
                url: "<?php echo url('/index/teacher/queryStudentByTime'); ?>",
                data: {
                    today: today
                },
                dataType: "json",
                async: false,
                success: function (res) {
//                    console.log(res);
                    var html ="";
                    $.each(res,function(v,n){
                        if(n.status==1){
                            html+= "<li class='active'><span class='studentName'>"+ n.student_name+"</span><input type='hidden' class='arrangeId' value='"+n.id+"'><em class='studentNo'>"+ n.student_no+"</em></li>"
                        }
                        else{
                            html+= "<li><span class='studentName'>"+ n.student_name+"</span><input type='hidden' class='arrangeId' value='"+n.id+"'><em class='studentNo'>"+ n.student_no+"</em></li>"
                        }
                    })
                    $(".tea-stu-list-name .clear-fix").html(html);
                }
            });
        }

        $(".clear-fix").on('click','li',function(){
            var studentNo =$(this).find(".studentNo").html();
            var arrange_id =$(this).find(".arrangeId").val();
            window.location.href="distribution.html?studentNo="+studentNo+"&arrangeId="+arrange_id;
        })

    })
</script>
<script src="<?php echo $base_tPath; ?>/js/common.js"></script>
</html>
