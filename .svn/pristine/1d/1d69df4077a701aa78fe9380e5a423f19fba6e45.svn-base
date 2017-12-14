<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:98:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/index\view\Default\teacher\distribution.html";i:1504594048;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>老师-入学测试分配</title>
<link href="<?php echo $base_tPath; ?>/css/style.css" type="text/css" rel="stylesheet">
<link href="<?php echo $base_tPath; ?>/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $base_tPath; ?>/css/common.css" type="text/css" rel="stylesheet">
    <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
    <script src="<?php echo $base_tPath; ?>/js/picker.min.js"></script>
    <style>
        .hide{
            display: none !important;
        }
    </style>
</head>

<body style="background:#f6f6f6;width:100%;height:100%">

<div class="tea-top clear-fix">
  <div class="top-left"><a href="<?php echo url('index/Teacher/entrance'); ?>"><img src="<?php echo $base_tPath; ?>/img/icon-arrow-left.png"/></a></div>
  入学测试分配
  <div class="top-right1"><a href="<?php echo url('index/Teacher/center'); ?>"><img src="<?php echo $base_tPath; ?>/img/icon-home.png"/></a></div>
</div>


<div class="tea-stu-sele">
    <ul>
        <li class="clear-fix">
            <span>学生编号：</span><em><?php echo $studentInfo['student_no']; ?></em>
        </li>
        <li class="clear-fix">
            <span>学生姓名：</span><span><?php echo $studentInfo['student_name']; ?></span>
        </li>
        <li class="clear-fix" style="border:none;">
            <span>家长姓名：</span><span><?php echo $studentInfo['name']; ?></span>
        </li>

    </ul>
</div>

<?php foreach($arrange as $key=>$item): ?>

<div class="tea-stu-sele <?php if($item['arrange_status']==2): ?>hasDis<?php else: ?>noDis<?php endif; ?>">
    <ul>
        <li><h1>预约科目：<?php echo $item['subject_name']; ?></h1></li>
        <li><h2>分配课程</h2></li>
        <?php if($item['arrange_status']!=1): ?>
        <form action="<?php echo url('index/teacher/saveArrange'); ?>" method="post">
            <input type="hidden" name="studentNo" value="<?php echo $item['student_no']; ?>"/>
            <input type="hidden" name="subjectName" value="<?php echo $item['subject_name']; ?>"/>


            <li class="clear-fix" style="border:none;">
            <input value="<?php echo $item['subject_id']; ?>" class="subjectId" hidden/>
            <span>阶段：</span><span>请选择</span><input type="hidden" name="stage_id"/>
            <i class="fa fa-angle-right fa-1x" id="chooseStage"></i>
        </li>
        <li class="clear-fix">
            <input value="<?php echo $item['subject_id']; ?>" class="subjectId" hidden>
            <span>课程：</span><span>请选择</span><input type="hidden" name="course"/>
            <i class="fa fa-angle-right fa-1x" id="chooseCourse"></i>
        </li>
        <li class="clear-fix" style="border:none;">
            <input value="<?php echo $item['subject_id']; ?>" class="subjectId" hidden>
            <span>授课老师：</span><span class="chooseTeacher">请选择</span><input type="hidden" name="staff_id"/>
            <i class="fa fa-angle-right fa-1x" id="chooseTeacher"></i>
        </li>
        <li class="clear-fix" style="border:none;">
            <span>开始上课：</span><span>请选择</span><input type="hidden" name="start_date"/>
            <i class="fa fa-angle-right fa-1x" id="chooseDate"></i>
        </li>
        <li class="clear-fix" style="border:none; height: auto">
            <span style="">上课时间：</span>
            <ul class="clear-fix check-group" style="float: right;position: relative;right: 33%;top: 3px;">
                <?php foreach($store_time as $key=>$rItem): ?>
                <li><input type="checkbox" name="weekday[]" value="<?php echo $key+1; ?>">周<?php echo $rItem['weekday']; ?>
                <select name="hours<?php echo $key+1; ?>">
                    <?php $__FOR_START_10327__=$rItem['start_time'];$__FOR_END_10327__=$rItem['end_time']+1;for($i=$__FOR_START_10327__;$i < $__FOR_END_10327__;$i+=1){ ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>时
                <select name="minutes<?php echo $key+1; ?>">
                    <?php $__FOR_START_28118__=0;$__FOR_END_28118__=46;for($i=$__FOR_START_28118__;$i < $__FOR_END_28118__;$i+=15){ ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>分
                </li>
                <?php endforeach; ?>

            </ul>
        </li>
        <input type="hidden" name="arrange_id" value="<?php echo $item['arrange_id']; ?>">
        <button class="button1">保存</button>
</form>


        <?php else: ?>
        <li class="clear-fix" style="border:none;">
            <span>阶段：</span><span class="chooseStage1">第<?php echo $item['stage_name']; ?>阶段</span>
            <!--<i class="fa fa-angle-right fa-1x" id="chooseStage1"></i>-->
        </li>
        <li class="clear-fix">
            <span>课程：</span><span class="chooseCourse1"><?php echo $item['course_name']; ?></span>
            <!--<i class="fa fa-angle-right fa-1x" id="chooseCourse1"></i>-->
        </li>
        <li class="clear-fix" style="border:none;">
            <span>授课老师：</span><?php echo $item['staff_name']; ?>
            <!--<i class="fa fa-angle-right fa-1x" id="chooseTeacher1"></i>-->
        </li>
        <li class="clear-fix" style="border:none;">
            <span>开始上课：</span><span class="chooseDate1"><?php echo $item['start_date']; ?></span>
            <!--<i class="fa fa-angle-right fa-1x" id="chooseDate1"></i>-->
        </li>
        <li class="clear-fix" style="border:none;">
            <span>上课时间：</span>
            <li style="position: relative;left: 3.5rem">
                <?php if($item['week_day1'] != 0): ?>周一&nbsp;&nbsp;上课时间:<?php echo $item['week_day1']; ?><br/><?php endif; if($item['week_day2'] != 0): ?>周二&nbsp;&nbsp;上课时间:<?php echo $item['week_day2']; ?><br/><?php endif; if($item['week_day3'] != 0): ?>周三&nbsp;&nbsp;上课时间:<?php echo $item['week_day3']; ?><br/><?php endif; if($item['week_day4'] != 0): ?>周四&nbsp;&nbsp;上课时间:<?php echo $item['week_day4']; ?><br/><?php endif; if($item['week_day5'] != 0): ?>周五&nbsp;&nbsp;上课时间:<?php echo $item['week_day5']; ?><br/><?php endif; if($item['week_day6'] != 0): ?>周六&nbsp;&nbsp;上课时间:<?php echo $item['week_day6']; ?><br/><?php endif; if($item['week_day7'] != 0): ?>周日&nbsp;&nbsp;上课时间:<?php echo $item['week_day7']; ?><br/><?php endif; ?>
            </li>
            <!--<i class="fa fa-angle-right fa-1x" id="chooseDate1"></i>-->
        </li>

        <?php endif; ?>
    </ul>
</div>

<?php endforeach; ?>

<script src="<?php echo $base_tPath; ?>/js/common.js"></script>
</body>
<script>
    $(function(){
        var day=[];
        var year=[];
        var month=[];
        var $this;
        var isDate=0;
        $("#chooseCourse").click(function(){
            isDate=0;
            $this = $(this);
            var id = $("#chooseCourse").attr('id');
            var subjectId= $this.parent().find('.subjectId').val();
            var rightDS = document.getElementById(id);
            var stageId=$("#chooseStage").parent().find('input[type="hidden"]').val();
            $.ajax({
                type: "post",
                url: "<?php echo url('/index/teacher/selectAllCourseBySubjectId'); ?>",
                data: {

                    stageId:stageId
                },
                dataType: "json",
                async: false,
                success: function (res) {
                    month = [];
                    year=[];
                    day=[];
                    $.each(res,function(v,n){
                        month[v]={"text": n.course_name,"value": n.course_id};
                    })
                }
            });
            choosePick([month]);
        })

        $("#chooseStage").click(function(){
            isDate=0;
            $this = $(this);
            var id = $("#chooseStage").attr('id');
            var subjectId= $this.siblings('input').val();
            var rightDS = document.getElementById(id);
            $("#chooseCourse").siblings('span').eq(1).html("请选择");
            $.ajax({
                type: "post",
                url: "<?php echo url('/index/teacher/selectAllStageBySubjectId'); ?>",
                data: {
                    subjectId:1
                },
                dataType: "json",
                async: false,
                success: function (res) {
                    month = [];
                    year=[];
                    day=[];
                    $.each(res,function(v,n){
                        month[v]={"text": '第'+ n.stage_name+'阶段',"value": n.stage_id};
                    })
                }
            });
            choosePick([month]);
        });

//        $('.check-group').delegate('li','click',function(){
//             if($(this).hasClass('active')){
//                 $(this).removeClass('active');
//                 $(this).find('input').attr("checked",false);
//                 return true;
//             }
//            $(this).addClass('active');
//            $(this).find('input').attr("checked","checked");
//        });

        $("#chooseTeacher").click(function(){
            isDate=0;
            $this = $(this);
            var id = $("#chooseTeacher").attr('id');
            var subjectId= $this.siblings('input').val();
//            alert(subjectId);
            var rightDS = document.getElementById(id);
            $.ajax({
                type: "post",
                url: "<?php echo url('/index/teacher/selectAllTeacherBySubjectId'); ?>",
                data: {
                   subjectId:subjectId
                },
                dataType: "json",
                async: false,
                success: function (res) {
                    month = [];
                    year=[];
                    day=[];
                    $.each(res,function(v,n){
                        month[v]={"text": n.staff_name,"value": n.staff_id};
                    })
                }
            })
            choosePick([month]);
        })



        $("#chooseDate").click(function(){
            isDate=1;
            $this = $(this);
            var id = $("#chooseDate").attr('id');
            var rightDS = document.getElementById(id);
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
            choosePick([year,month,day]);
        })

        function choosePick(_data){

            var rightDS_picker = new Picker({
                title: '请选择',
                data: _data
            });
            rightDS_picker.on('picker.select', function (selectedVal, selectedIndex) {
                //console.log(selectedIndex);
                var time;
                var va;
                if(isDate==1){
                    time = _data[0][selectedIndex[0]].text +'-'+ _data[1][selectedIndex[1]].text +'-'+ _data[2][selectedIndex[2]].text;
                    va   = _data[0][selectedIndex[0]].value +'-'+ _data[1][selectedIndex[1]].value +'-'+ _data[2][selectedIndex[2]].value;
                }
                else{
                    time = _data[0][selectedIndex[0]].text;
                    va   = _data[0][selectedIndex[0]].value;
                }
                $this.siblings('span').eq(1).html(time);
                $this.parent().find('input[type=hidden]').val(va);

                month = [];
                year=[];
                day=[];
            });
            rightDS_picker.on('picker.change', function (index, selectedIndex) {
                //console.log(index);
            });
            rightDS_picker.on('picker.valuechange', function (selectedVal, selectedIndex) {
                //console.log(selectedVal);
            });rightDS_picker.show();
        }

        //保存按钮
        /*$(".button1").click(function(){

            var courseWeek = [];
            $('.check-group li').each(function(){
                if($(this).hasClass('active')){
                    courseWeek.push($(this).data('value'));
                }
            });

        	var bean = {
        		subjectId:$('.subjectId').val(),
        		studentNo:$('.studentNo').val(),
        		stage:$('.stage').val(),
        		courseId:$('.courseId').val(),
        		startDate:$('.startDate').val(),
        		courseDate:courseWeek
        	}
        	$.ajax({
        		type:"post",
        		url:"",
        		data:JSON.stringify(bean),
        		async:true,
        		success:function(){
        			alert('成功');
        		}
        	});
        })*/
    })
</script>
</html>
