<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:89:"G:\phpstudy\phpstudy\WWW\zaojiao\public/../application/admin\view\Default\power\role.html";i:1504533884;s:92:"G:\phpstudy\phpstudy\WWW\zaojiao\public/../application/admin\view\Default\common\header.html";i:1504533884;s:89:"G:\phpstudy\phpstudy\WWW\zaojiao\public/../application/admin\view\Default\common\nav.html";i:1504533884;s:95:"G:\phpstudy\phpstudy\WWW\zaojiao\public/../application/admin\view\Default\common\path_link.html";i:1504533884;s:90:"G:\phpstudy\phpstudy\WWW\zaojiao\public/../application/admin\view\Default\common\page.html";i:1504533884;s:92:"G:\phpstudy\phpstudy\WWW\zaojiao\public/../application/admin\view\Default\common\footer.html";i:1504533884;}*/ ?>
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
                    <div class="portlet box light-grey">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-globe"></i>角色列表</div>
                            <div class="tools">
                                <a href="javascript:void(0);" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="clearfix">
                                <div class="btn-group">
                                </div>
                                <div style="float:right;margin-bottom:20px;">
                                   <input type="button" onclick="editRole(0)" class="btn green" value="添　加"/>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>角色名称</th>
                                    <th>角色状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($roleList as $key=>$role): ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $key+1; ?></td>
                                    <td><?php echo $role['role_name']; ?></td>
                                    <td>
                                        <span class="btn <?php if($role['status']==1): ?>green<?php else: ?>red<?php endif; ?>">
                                            <?php echo showStatus($role['status'],'正常,关闭:1,2'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="btn blue"  onclick="editRole(<?php echo $role['role_id']; ?>)" title="编辑" style="cursor: pointer;">
                                            <i class="fa icon-edit"></i>
                                        </span>
                                        <span class="btn green"  onclick="relUserMenu(<?php echo $role['role_id']; ?>)" title="编辑" style="cursor: pointer;">
                                            <i class="fa icon-user"></i>
                                        </span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="" style="width:30%;margin: 0 auto">
                                <div >
        <div class="dataTables_paginate paging_bootstrap pagination " style='margin: 0px auto;'>
            <?php echo $page; ?>
        </div>
</div>

<style>
    .pagination{
        padding-top: 20px;
    }
    .pagination a,.pagination a:hover,.pagination a:active,.pagination a:visited{
        text-decoration: none;
        color:#999;
        display: inline-block;
        width:30px;
        height: 30px;
        line-height: 30px;
        box-sizing: border-box;
        text-align: center;
        border: 1px solid #ddd;
        border-left:0;
        background: #f5f5f5;
    }
    .pagination a:first-child{
        border-left:1px solid #ddd;
        border-top-left-radius:5px!important;
        border-bottom-left-radius:5px!important;
    }
    .pagination a:last-child{
        border-top-right-radius:5px!important;
        border-bottom-right-radius:5px!important;
    }
    .pagination .active,.pagination .active:hover{
        background: #35aa47!important;
        color: #fff !important;
    }
</style>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function editRole(role_id){
        window.location.href = "<?php echo url('power/editRole'); ?>?role_id="+role_id;
    }
    function relUserMenu(role_id){
        window.location.href = "<?php echo url('power/relUserMenu'); ?>?role_id="+role_id;
    }
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
