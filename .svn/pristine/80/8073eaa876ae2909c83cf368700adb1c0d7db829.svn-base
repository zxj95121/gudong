<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:97:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/index\view\Default\parents\enter_grade.html";i:1504533869;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<link rel="stylesheet" href="<?php echo $base_path; ?>/Font-Awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo $base_path; ?>/css/common.css">
		<title>入学评级</title>
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
				border-bottom: 1px solid #f6f6f6;
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
			
			.grade-level{
			    width: 100%;
			    height: 10rem;
			    background: white;
			}
			.grade-item{
				width: 33%;
				float: left;
				height: 100%;
				position: relative;
                background: #fff;
			}
			.math-grade img{
				width: 5.5rem;
			    position: absolute;
			    top: 1.5rem;
			    left: 2.3rem;
			}
			.english-grade img{
				width: 5.5rem;
			    position: absolute;
			   top: 1.5rem;
			    left:1.7rem;
			}
			.chinese-grade img{
				width: 5.5rem;
			    position: absolute;
			    top: 1.5rem;
			    left: 0.8rem;
			}
		</style>
		<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
		<script>
			$(function(){
			    $('.return').click(function(){
			        var userNo = $('.parentNo').val();
//			        alert(studentNo);
			        window.location.href="<?php echo url('index/parents/child_info'); ?>?userNo="+userNo;
				})
			})
		</script>
	</head>
	<body>
	<input type="hidden" class="parentNo" value="<?php echo $parentNo; ?>">
		<div class="top-img">
			<div class="back"><i class="fa  icon-angle-left icon-2x return"></i></div>
			<div class="title"><p>入学评级</p></div>
			<div class="add"><a href="<?php echo url('index/parents/person_center'); ?>"><img src="<?php echo $base_path; ?>/img/home.png" width="100%"></a></div>
		</div>
		<div class="home-top">
			<div class="item">
				<span>学生编号：</span><span style="color: #ccc;"><?php echo $ret['student_no']; ?></span>
			</div>
			<div class="item">
				<span>学生姓名：</span><span ><?php echo $ret['student_name']; ?></span>
			</div>
			<div class="item">
				<span>测评时间：</span><span style="color: #666">
				<?php if(empty($ret['enterTestTime'])): ?>
				<span style="color:#ccc;">还没有评测记录哦</span>
				<?php else: ?>
				    <?php echo date('Y-m-d',$ret['enterTestTime']); endif; ?>
			    </span>
				<div class="item-right date"></div>
			</div>
		</div>
		
		<div class="grade-level">
            <?php foreach($arrange as $key => $item): ?>
                <div class="math-grade grade-item">
                    <img src="<?php echo $base_path; ?>/img/<?php switch($item['enter_grade']): case "1": ?>you.png<?php break; case "2": ?>liang.png<?php break; default: ?>hege.png<?php endswitch; ?>">
                    <p style="position: absolute;top: 7.4rem;left: 3.6rem;font-size: 1rem;"><?php switch($item['subject_id']): case "1": ?>数学<?php break; case "2": ?>语文<?php break; default: ?>英语<?php endswitch; ?></p>
                </div>
            <?php endforeach; ?>
		</div>
		
	</body>
	<script>
		$(function(){
			$(".check").click(function(){
				$(".check").removeClass("checked");
				$(this).addClass("checked");
			})
		})
	</script>
	<script src="../../../public/static/parents/js/common.js"></script>
</html>

