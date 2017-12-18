<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:95:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/admin\view\Default\study\edit_course.html";i:1504595560;s:91:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/admin\view\Default\common\header.html";i:1504533884;s:88:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/admin\view\Default\common\nav.html";i:1504533884;s:94:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/admin\view\Default\common\path_link.html";i:1504533884;s:91:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/admin\view\Default\common\footer.html";i:1504533884;}*/ ?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <title><?php echo $website_title; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <link href="/static/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/style.css?v=0.0.4" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link rel="stylesheet" type="text/css" href="/static/admin/css/chosen.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/css/select2_metro.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/css/datetimepicker.css" />
    <script src="/static/admin/js/jquery-1.10.1.min.js" type="text/javascript"></script>

</head>
<body class="page-header-fixed">
<div class="header navbar navbar-inverse navbar-fixed-top">
<div class="navbar-inner">
<div class="container-fluid">

<a class="brand" href="#">
    <div class="website_title"><?php echo $website_title; ?></div>
</a>

<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
    <img src="/static/admin/image/menu-toggler.png" alt="" />
</a>
<ul class="nav pull-right">
    <!--新订单数量-->

<li class="dropdown" id="header_task_bar">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="icon-tasks"></i>
        <span class="badge">0</span>
    </a>
    <ul class="dropdown-menu extended tasks">
        <li>
            <p>你有(0)订单待处理</p>
        </li>
        <li class="external">
            <a href="<?php echo url('order_manage/index'); ?>">去查看 <i class="m-icon-swapright"></i></a>
        </li>
    </ul>
</li>
<li class="dropdown user">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <!--<img alt="" src="/static/admin/image/avatar1_small.jpg" />-->
        <span class="username"><?php echo session('cmsuser')['name']; ?></span>
        <i class="icon-angle-down"></i>
    </a>
    <ul class="dropdown-menu">
        <li><a href="<?php echo url('admin/admin_manage/save_info',['admin_id'=>session('cmsuser')['admin_id']]); ?>"><i class="icon-user"></i>个人中心</a></li>
        <li><a href="<?php echo url('admin/Index/loginout'); ?>"><i class="icon-key"></i>安全退出</a></li>
    </ul>
</li>
</ul>
</div>
</div>
</div>
<div class="page-container">
    <div class="page-sidebar nav-collapse collapse">
        <ul class="page-sidebar-menu">
            <li>
                <div class="sidebar-toggler hidden-phone"></div>
            </li>
            <li class="start active ">
                <a href="<?php echo url('human/index'); ?>">
                    <i class="icon-dashboard"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            <?php foreach($_SideMenu as $menu): ?>
            <li>
                <a href="javascript:void(0);">
                    <i class="icon-<?php echo $menu['icon']; ?>"></i>
                    <span class="title"><?php echo $menu['menu_name']; ?></span>
                    <span class="arrow "></span>
                </a>
                <?php if(isset($menu['child'])): ?>
                <ul class="sub-menu">
                    <?php foreach($menu['child'] as $child): ?>
                    <li>
                        <a href="<?php echo $child['url_path']; ?>">
                            <!--<i class="icon-gift"></i>-->
                            <?php echo $child['menu_name']; ?>
                        </a>
                    </li>
                    <?php if(($child['controller_name'] == $controller_name)): ?>
                    <input type="hidden" class="menu_show">
                    <script>
                        $(".menu_show").parents('.sub-menu').show();
                        $(".menu_show").parents('li').siblings().removeClass('active');
                        $(".menu_show").parents('li').addClass('active').addClass('open');
                    </script>
                    <?php endif; endforeach; ?>
                </ul>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<script type="text/javascript">
    $('body').addClass('page-sidebar-closed'); 
</script>


<div class="page-content">
    <div class="container-fluid">
        <div class="row-fluid">
    <div class="span12">
    </div>
</div>
        <div id="dashboard">
            <div class="row-fluid">
                <div class="span12">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-reorder"></i>编辑阶段</div>
                            <div class="tools">
                                <a href="javascript:void(0);" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form action="<?php echo url('/admin/study/saveCourse'); ?>" method="post" id="form_sample_2" class="form-horizontal" enctype="multipart/form-data">

                                <input type="hidden" name="course_id" value="<?php echo $courseInfo['course_id']; ?>">
                                <div class="control-group">
                                    <label class="control-label">课程名称：<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" placeholder="请输入阶段名称" value="<?php echo $courseInfo['course_name']; ?>" name="course_name" data-required="1" class="span6 m-wrap"/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">所属科目：<span class="required">*</span></label>
                                    <div class="controls">
                                        <select class="select_info chosen" data-with-diselect="1" name="subject" data-placeholder="-请选择所属科目-" tabindex="1">
                                            <option value=""></option>
                                            <?php foreach($allSubject as $key=>$value): if($courseInfo['subject_id'] == $value['subject_id']): ?>
                                            <option value="<?php echo $value['subject_id']; ?>" selected="selected"><?php echo $value['subject_name']; ?></option>
                                            <?php else: ?>
                                            <option value="<?php echo $value['subject_id']; ?>"><?php echo $value['subject_name']; ?></option>

                                            <?php endif; endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">所属阶段：<span class="required">*</span></label>
                                    <div class="controls">
                                        <select class="select_info chosen" data-with-diselect="1" name="stage" data-placeholder="-请选择所属阶段-" tabindex="1">
                                            <option value=""></option>

                                            <?php foreach($allStage as $key=>$value): if($courseInfo['stage_id'] == $value['stage_id']): ?>
                                            <option value="<?php echo $value['stage_id']; ?>" selected="selected"><?php echo $value['stage_name']; ?></option>
                                            <?php else: ?>
                                            <option value="<?php echo $value['stage_id']; ?>"><?php echo $value['stage_name']; ?></option>

                                            <?php endif; endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">课程编号：<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" placeholder="请输入课程编号" value="<?php echo $courseInfo['list_no']; ?>" name="list_no" data-required="1" class="span6 m-wrap"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">消耗练习册：<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" placeholder="请输入阶段名称" value="<?php echo $courseInfo['basic_expend']; ?>" name="basic_expend" data-required="1" class="span6 m-wrap"/>
                                    </div>
                                </div>
                                  <div class="control-group">
                                    <label class="control-label">名额<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" placeholder="请输入课程名额" value="<?php echo $courseInfo['course_count']; ?>" name="course_count" data-required="1" class="span6 m-wrap"/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">状　　态：<span class="required">*</span></label>
                                    <div class="controls">
                                        <select class="select_info chosen" data-with-diselect="1" name="status" data-placeholder="-请选择状态-" tabindex="1">
                                            <option value=""></option>
                                            <option value="1" <?php if(1 == $courseInfo['status']): ?>selected<?php endif; ?>>在授</option>
                                            <option value="2" <?php if(2 == $courseInfo['status']): ?>selected<?php endif; ?>>下架</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn green">save</button>
                                    <a href="javascript:window.history.go(-1)" class="btn">return</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.new-btn-group').delegate('input[type="file"]','change',function(){
        $('.new-btn-group span').show();
    });
</script>
    </div>


	<div class="footer">
		<div class="footer-inner copyright">
            2017 © Power by <?php echo $website_title; ?> <a href="http://www.vowkin.com/" title="<?php echo $website_title; ?>" target="_blank">Vowkin Solution</a>
		</div>
		<div class="footer-tools">

			<span class="go-top">
			<span style="font-size: 10px;color: #999">版本号:<?php echo $copy_right; ?></span>
			<i class="icon-angle-up"></i>
			</span>
		</div>
	</div>

	<script src="/static/admin/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/static/admin/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<script src="/static/admin/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="/static/admin/js/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="/static/admin/js/jquery.blockui.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="/static/admin/js/chosen.jquery.min.js"></script>
	<script type="text/javascript" src="/static/admin/js/select2.min.js"></script>
	<script src="/static/admin/js/app.js"></script>
	<script src="/static/admin/js/form-components.js"></script>


</body>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
    });
</script>
<style>
    .portlet-body .controls input{
        font-size: 13px;
    }
</style>
</html>
