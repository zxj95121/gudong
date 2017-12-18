<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:96:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/index\view\Default\parents\child_info.html";i:1504533869;}*/ ?>
﻿<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<title>宝贝信息</title>
		<link rel="stylesheet" href="<?php echo $base_path; ?>/Font-Awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo $base_path; ?>/css/common.css">
		<style>
			html,body{
				padding: 0;
				margin: 0;
				font-family: "微软雅黑";
				color: #6f6f6f;
			}

			.baby-img{
				width:5rem;
				height:5rem;
				border-radius: 2.5rem;
				margin:2rem 10rem 2rem 10rem;
				
			}
			.edit{
                /* position: absolute; */
                width: 1.5rem;
                height: 1.5rem;
                /* top: 4.7rem; */
                /* left: 21.5rem; */
                color: #ccc;
                float: left;
                margin-left: 10rem;
                margin-top: -6rem;
                /* line-height: 4rem; */
			}
			.baby-info .basic{
			    height: 2.8rem;
			    width: 90%;
			    border-bottom: 1px solid #ccc;
			    line-height: 2.8rem;
			    margin-left: 5%;
			    font-size: 0.9rem;		
			}
			.basic-info{
				 color: #ccc;
			}
			.his-school{
				 color: #ccc;
			}
			.basic-right{
				float: right;
			}
			.baby-no{
				color:#ddd
			}
			.enter-info{
				margin-top:1rem;
				margin-bottom: 1rem;
			}
			.enter-info .basic{
			    height: 2.8rem;
			    width: 90%;
			    border-bottom: 1px solid #ccc;
			    line-height: 2.8rem;
			    margin-left: 5%;
			    font-size: 0.9rem;		
			}
			.enter{
				color:#ccc
			}
			
			.study-info .basic{
			    height: 2.8rem;
			    width: 90%;
			    border-bottom: 1px solid #ccc;
			    line-height: 2.8rem;
			    margin-left: 5%;
			    font-size: 0.9rem;		
			}
			.study{
				color:#ccc
			}
			.math{
				float: right;
			    width: 18rem;
			    height: 1.4rem;
			    margin-top: 0.7rem;
			    position: relative;
			    background: #efefef;
			}
			.math-percent{
			    background: #17F377;
			    position: absolute;
			    height: 100%;	
			}
			.english{
				float: right;
			    width: 18rem;
			    /* border: 1px solid black; */
			    height: 1.4rem;
			    margin-top: 0.7rem;
			    position: relative;
			    background: #efefef;
			}
			.english-percent{
			    background: #17F377;
			    position: absolute;
			    height: 100%;	
			}
			.chinese{
				float: right;
			    width: 18rem;
			    height: 1.4rem;
			    margin-top: 0.7rem;
			    position: relative;
			    background: #efefef;
			}
			.chinese-percent{
			    background: #17F377;
			    position: absolute;
			    height: 100%;	
			}
            .nav_bar{
                height: 2.5rem;
                width: 100%;
                background: #f8f8f8;
            }
            .nav-item{
                float: left;
                height: 100%;
                width: 6rem;
                overflow-y:hidden!important;
                text-align: center;
                line-height: 2.5rem;
            }
            .nav-active{
                background: #83dab6;
                color: #eee;
            }
            .hideIn{
                display: none;
            }
		</style>
		<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="http://html2canvas.hertzen.com/build/html2canvas.js"></script> 
	</head>
	<body>
		<div class="top-img">
			<div class="back"><i class="fa  icon-angle-left icon-2x"></i></div>
			<div class="title"><p style="line-height: 1rem;">学员信息</p></div>
			<div class="add"><img src="<?php echo $base_path; ?>/img/add.png" width="100%"></div>
		</div>

        <div class="nav_bar <?php if($count<2): ?>hideIn<?php else: endif; ?>">
            <?php foreach($ret as $eKey=>$eItem): ?>
                <div class="nav-item <?php if($eKey==0): ?>nav-active<?php else: endif; ?>" style="overflow: auto">
                    <?php echo $eItem['student_name']; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if(!empty($ret)): foreach($ret as $rKey=>$rItem): ?>
            <input type="text" class="parentHideNo" value="<?php echo $rItem['parent_no']; ?>" hidden>
            <div class="container <?php if($rKey==0): else: ?>hideIn<?php endif; ?>" >
            <div class="baby-img boxshadow">
                <?php if(!empty($rItem['student_headerImg'])): ?>
                    <img src="<?php echo $rItem['student_headerImg']; ?>" style="width: 100%;height: 100%;border-radius:50%">
                <?php else: ?>
                    <img src="/static/parents/img/center-bg.jpg" style="width: 100%;height: 100%;border-radius:50%">
                <?php endif; ?>
                <i class="fa  icon-edit icon-2x edit"></i>
            </div>
            <div class="baby-info">
                <div class="basic-info basic">
                    基本信息
                </div>
                <div class="basic">
                    学生编号
                    <div class="basic-right baby-no"><?php echo $rItem['student_no']; ?></div>
                </div>
                <div class="basic">
                    学员姓名
                    <div class="basic-right baby-name"><?php echo $rItem['student_name']; ?></div>
                </div>
                <div class="basic">
                    学员性别
                    <div class="basic-right baby-sex"><?php if($rItem['student_sex']==1): ?>男<?php else: ?>女<?php endif; ?></div>
                </div>
                <div class="basic">
                    出生日期
                    <div class="basic-right baby-birth"><?php echo date('Y-m-d',$rItem['student_birthday']); ?></div>
                </div>
                <div class="basic">
                    历史学校
                    <div class="basic-right his-school"><?php echo $rItem['student_oldSchool']; ?></div>
                </div>
                <div class="basic">
                    历史等级
                    <div class="basic-right his-school"><?php echo $rItem['student_oldStage']; ?></div>
                </div>
            </div>

            <div class="enter-info">
                <div class="enter basic">
                    入学信息
                </div>
                <div class="basic">
                    所在中心
                    <div class="basic-right location"><?php echo $rItem['student_storeLocation']; ?></div>
                </div>
                <div class="basic">
                    入学时间
                    <div class="basic-right enter-time"><?php echo $rItem['student_date']; ?></div>
                </div>
                <div class="basic">
                    入学评级
                    <div class="basic-right enter_grade"><i class="fa  icon-angle-right"></i></div>
                </div>
                <div class="basic">
                    课程表
                    <div class="basic-right syllabus"><i class="fa  icon-angle-right"></i></div>
                </div>
            </div>

            <div class="study-info">
                <div class="study basic">
                    学习进度
                </div>
                <div class="basic <?php if($rItem['student_mathStage']==0): ?>hideIn<?php endif; ?>">
                    数学
                    <div class="math">
                        <div class="math-percent subjectPercent" width="<?php echo $rItem['student_mathStage']; ?>" subjectId="1"></div>
                    </div>
                </div>
                <div class="basic <?php if($rItem['student_chineseStage']==0): ?>hideIn<?php endif; ?>">
                    语文
                    <div class="chinese">
                        <div class="chinese-percent subjectPercent" width="<?php echo $rItem['student_chineseStage']; ?>" subjectId="2"></div>
                    </div>
                </div>
                <div class="basic <?php if($rItem['student_englishStage']==0): ?>hideIn<?php endif; ?>">
                    英语
                    <div class="english">
                        <div class="english-percent subjectPercent" width="<?php echo $rItem['student_englishStage']; ?>" subjectId="3"></div>
                    </div>
                </div>

                <!--div class="basic">
                    课堂作业
                    <div class="class-work basic-right"><i class="fa  icon-angle-right"></i></div>
                </div>
                <div class="basic">
                    家庭作业
                    <div class="home-work basic-right"><i class="fa  icon-angle-right"></i></div>
                </div-->
                <div class="basic">
                    考勤
                    <div class="attendance basic-right"><i class="fa  icon-angle-right"></i></div>
                </div>
                <div class="basic">
                    总成绩排名
                    <div class="reorder basic-right"><i class="fa  icon-angle-right"></i></div>
                </div>
            </div>
                </div>
            <?php endforeach; else: ?>
        <input type="text" class="parentHideNo" value="<?php echo $parentNo; ?>" hidden>

        <div style="color:#ccc;margin-top:150px;text-align: center;width:100%;position: inherit;" class="add">请添加孩子信息哦￣へ￣<br/><br/>&gt;点击添加&lt;</div>
        <?php endif; ?>

	</body>
	<script>
		$(function(){


//		    计算所有学生
            var len = $('.nav_bar').find('div').length;
            var width = (100/len)+'%';
            $('.nav-item').css({'width':width});


            gradeAnimate(0);
            var studentNo=0;
			//截图工具
            var parentNo=$("body").find(".parentHideNo").eq(0).val();
			$(".add").click(function(){
                window.location.href="child_info_edit.html?studentNo="+studentNo+"&parentNo="+parentNo;
            })
            $(".edit").click(function(){
                studentNo=$(".container:not('.hideIn')").find(".baby-no").html();
                window.location.href="child_info_edit.html?studentNo="+studentNo+"&parentNo="+parentNo;
            })

            $(".enter_grade").click(function(){
                studentNo=$(".container:not('.hideIn')").find(".baby-no").html();
                window.location.href="enter_grade.html?studentNo="+studentNo+"&parentNo="+parentNo;
            })

            $(".subjectPercent").click(function(){
                studentNo=$(".container:not('.hideIn')").find(".baby-no").html();
                var subjectId=$(this).attr("subjectId");
                window.location.href="study_step.html?studentNo="+studentNo+"&subjectId="+subjectId+"&parentNo="+parentNo;
            })

            $(".syllabus").click(function(){
                studentNo=$(".container:not('.hideIn')").find(".baby-no").html();
                window.location.href="classList.html?studentNo="+studentNo+"&parentNo="+parentNo;
            })
            $(".class-work").click(function(){
                studentNo=$(".container:not('.hideIn')").find(".baby-no").html();
                window.location.href="class_work.html?studentNo="+studentNo+"&parentNo="+parentNo;
            })
            $(".home-work").click(function(){
                studentNo=$(".container:not('.hideIn')").find(".baby-no").html();
                window.location.href="home_work.html?studentNo="+studentNo+"&parentNo="+parentNo;
            })
            $(".attendance").click(function(){
                studentNo=$(".container:not('.hideIn')").find(".baby-no").html();
                window.location.href="kaoqin.html?studentNo="+studentNo+"&parentNo="+parentNo;
            })
            $(".reorder").click(function(){
                studentNo=$(".container:not('.hideIn')").find(".baby-no").html();
                window.location.href="grade_order.html?studentNo="+studentNo+"&parentNo="+parentNo;
            })

            $(".nav-item").click(function(){
                if($(this).hasClass("nav-active")){
                }
                else{
                    $(".nav-item").removeClass("nav-active");
                    $(this).addClass("nav-active");
                    var index=$(this).index();
                    infoChange(index);
                }
            })
            function infoChange(i){
                $(".container").addClass("hideIn");
                $(".container").eq(i).removeClass("hideIn");
                gradeAnimate(i);
            }
            function gradeAnimate(i){
                var container=$(".container").eq(i);
                var math=container.find(".math-percent").attr("width");
                var english=container.find(".english-percent").attr("width");
                var chinese=container.find(".chinese-percent").attr("width");
                if(math==1){math='33%';}else if(math==2){math='66%';} else{math='100%';}
                if(english==1){english='33%';}else if(english==2){english='66%';} else{english='100%';}
                if(chinese==1){chinese='33%';}else if(chinese==2){chinese='66%';} else{chinese='100%';}
                container.find(".math-percent").animate({width:math},1000);
                container.find(".english-percent").animate({width:english},1000);
                container.find(".chinese-percent").animate({width:chinese},1000);;
            }

		})
	</script>
	<script src="<?php echo $base_path; ?>/js/common.js"></script>
</html>

