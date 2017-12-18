<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:95:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/index\view\Default\teacher\classwork.html";i:1504593815;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="stylesheet" href="<?php echo $base_tPath; ?>/Font-Awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $base_tPath; ?>/css/common.css">
    <link href="<?php echo $base_tPath; ?>/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <title>课堂作业</title>
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
        .recording{
            position: fixed;
            bottom: -8rem;
            left: 0;
            width: 100%;
            height: 8rem;
            background: rgba(255,255,255,0.7);
        }
        .luyin{
            width: 6rem;
            margin: 1rem 9.5rem;
        }
        .readOver{
            width: 100%;
            height:2.8rem;
        }
        .leavel{
            width:25%;
            height: 100%;
            float: left;
        }
        .leavel p{
            float: left;
            line-height: 2.8rem;
            margin-left: 0.5rem;
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
    </style>
    <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
</head>
<body>
<div class="top-img">
    <div class="back"><i class="fa  icon-angle-left icon-2x" style="font-size: 2rem;"></i></div>
    <div class="title"><p>课堂作业</p></div>
    <div class="add"><a href="<?php echo url('index/Teacher/center'); ?>"><img src="<?php echo $base_tPath; ?>/img/home.png" width="100%"></a></div>
</div>
<div class="home-top">
   <input value="<?php echo $staffId; ?>" class="hideStaffId" hidden>
    <div class="item">
        <span>日&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;期：</span><span style="color: #666" class="classTime"><?php echo $today; ?></span>
        <div class="item-right date"><i class="fa  icon-angle-right" id="chooseTime"></i></div>
    </div>
    <div class="studentNo-search home-top">
        <span>学生学号：</span>
        <span><input type="number" name = "studentNo" value="<?php echo $studentNo; ?>" placeholder="请输入学号"></span>
        <span>搜索</span>
    </div>
    <style>
        .studentNo-search{
            width: 90%;
            height: 2.8rem;
            margin-left: 5%;
            line-height: 2.8rem;
            border-bottom: 1px solid #ccc;
        }
        .studentNo-search input{
            width: 50%;
            outline:medium;
            height: 1rem;
            border: none;
            /*border-left: 1px solid #000000;*/
            padding-left: 0.2rem;
        }
        .studentNo-search>span:nth-child(3){
           float: right;
            cursor: pointer;
        }
        </style>
    <!--			<div class="item">
                    <span>扫码答题：</span>
                    <div class="item-right scan"><img src="img/scanning.png" width="100%"></div>
                </div>-->
</div>
<?php foreach($homeWork as $key=>$item): ?>
<div class="home-mid">
    <div class="item">
        <span style="color: #fd775f;">录音试题</span>
    </div>
    <div class="item-audio item">
        <div class="audio-left"><img class="play" src="<?php echo $base_tPath; ?>/img/play.png" isOn="0" style="width: 1.8rem;margin-top: 0.75rem;margin-left: 1.55rem;">
            <audio controls="controls" id="music<?php echo $key; ?>" hidden >
                <source src="<?php echo $item['content']; ?>" />
            </audio>
        </div>
        <div class="audio-right">
            <p style="line-height: 2rem;">看图识画试题</p>
            <p style="line-height: 0.6rem;color: #ccc;" class="time">00:00:00</p>
            <hr style="width:1px;height: 1px; border: 1px solid #17F377;background: #17F377;float: left;">
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <div class="item">
        <span style="color: #c59a6d;">老师批阅&nbsp;&nbsp;&nbsp;答题学生：<?php echo $item['student_name']; ?> &nbsp;&nbsp; 学生学号：<?php echo $item['student_no']; ?></span>
    </div>
    <div class="readOver" id = "<?php echo $item['homework_id']; ?>" data-score="<?php echo $item['score']; ?>" data-studentno="<?php echo $item['student_no']; ?>">
        <?php if(time()-$item['add_ts']<7*86400): ?>
        <div class="leavel updateScore" >
            <i class="fa  icon-ok-sign check <?php if($item['score']==5): ?>checked<?php endif; ?>" id="5"></i><p>优秀</p>
        </div>
        <div class="leavel updateScore">
            <i class="fa  icon-ok-sign check <?php if($item['score']==4): ?>checked<?php endif; ?>" id="4"></i><p>良</p>
        </div>
        <div class="leavel updateScore">
            <i class="fa  icon-ok-sign check <?php if($item['score']==3): ?>checked<?php endif; ?>" id="3"></i><p>合格</p>
        </div>
        <div class="leavel updateScore">
            <i class="fa  icon-ok-sign check <?php if($item['status']==3 && $item['score']==0): ?>checked<?php endif; ?>" id="0"></i><p>不合格</p>
        </div>
        <?php else: ?>
        <div class="leavel" >
            <i class="fa  icon-ok-sign check <?php if($item['score']==5): ?>checked<?php endif; ?>" id="5"></i><p>优秀</p>
        </div>
        <div class="leavel">
            <i class="fa  icon-ok-sign check <?php if($item['score']==4): ?>checked<?php endif; ?>" id="4"></i><p>良</p>
        </div>
        <div class="leavel">
            <i class="fa  icon-ok-sign check <?php if($item['score']==3): ?>checked<?php endif; ?>" id="3"></i><p>合格</p>
        </div>
        <div class="leavel">
            <i class="fa  icon-ok-sign check <?php if($item['status']==3 && $item['score']==0): ?>checked<?php endif; ?>" id="0"></i><p>不合格</p>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php endforeach; ?>
<div class="recording">
    <img src="<?php echo $base_tPath; ?>/img/luyin.png" width="100%" class="luyin">
</div>
</body>
<script src="<?php echo $base_tPath; ?>/js/picker.min.js" type="text/javascript"></script>
<script src="<?php echo $base_tPath; ?>/js/common.js"></script>
<script>
    $(function(){

//        批改
        //        批改
        $('.updateScore').click(function () {
            $(this).parent('.readOver').find('i').removeClass('checked');
            $(this).find('i').addClass('checked');
            var score = $(this).find('i').attr('id');
            var homework_id = $(this).parent('.readOver').attr('id');
            var oldScore = $(this).parent('.readOver').data('score');
            var studentno = $(this).parent('.readOver').data('studentno');
            var today = $('.classTime').html();
//            alert(studentno);
            window.location.href = "<?php echo url('index/teacher/updateHomeWork'); ?>?score="+score+"&homework_id="+homework_id+"&oldScore="+oldScore+"&studentNo="+studentno+"&today="+today+"&action=1111";

        });

//        播放
        var audio;
        var isOn=0;
        var play;
        $(".play").click(function(){
            isOn=$(this).attr("isOn");
            audio = document.querySelector('#'+$(this).siblings("audio").attr("id")+'');
            playMusic(audio,$(this));
            play=$(this);
        })
        function changeBtn($this){
            if($this.attr("isOn")==0){
                $this.attr("src","<?php echo $base_tPath; ?>/img/play.png");
            }
            else{
                $this.attr("src","<?php echo $base_tPath; ?>/img/pause.png");
            }
        }
        function playMusic(audio,$this){
            //未播放
            if(isOn==0){
                $this.attr("isOn","1");
                audio.play();
                loop();
            }
            if(isOn==1){
                $this.attr("isOn","0");
                audio.pause();
                window.clearInterval(t);
            }
            changeBtn($this);
        }
        var i=0;
        var t;
        function loop(){
            t=window.setInterval(thisTime,1000)
        };
        function thisTime(){
            var curTime=audio.currentTime;
            var durTime=audio.duration;
            var percent=(curTime/durTime)*100+"%";
            console.log(curTime+".."+durTime+"..."+percent);
            play.parent().siblings("div").find("hr").animate({width:percent},1000);
            curSec=parseInt(curTime)+1;
            if(curSec<10){
                curSec="0"+curSec;
            }
            play.parent().siblings("div").find(".time").html("00:00:"+curSec+"");
            if(audio.ended){
                window.clearInterval(t);
            }
            console.log(audio.currentTime+"..."+audio.duration+"..."+percent);
        }
         var status;
        var score;
        var homeId;



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
//             alert(datee);
            window.location.href="<?php echo url('/index/teacher/classwork'); ?>?today="+today;
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


//        选择学生查找
        $('.studentNo-search>span:nth-child(3)').click(function () {
           var studentNo = $('.studentNo-search input[type="number"]').val();
           var today = $('.classTime').html();
            window.location.href="/index/teacher/classwork?today="+today+"&studentNo="+studentNo;
        })
    })
</script>

</html>

