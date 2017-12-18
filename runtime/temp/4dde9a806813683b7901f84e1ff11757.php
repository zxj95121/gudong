<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:86:"C:\wamp64\www\gudong\public/../application/admin\view\Default\power\rel_user_menu.html";i:1505728702;s:80:"C:\wamp64\www\gudong\public/../application/admin\view\Default\common\header.html";i:1509778584;s:77:"C:\wamp64\www\gudong\public/../application/admin\view\Default\common\nav.html";i:1509606029;s:83:"C:\wamp64\www\gudong\public/../application/admin\view\Default\common\path_link.html";i:1505728701;s:80:"C:\wamp64\www\gudong\public/../application/admin\view\Default\common\footer.html";i:1509674660;s:84:"C:\wamp64\www\gudong\public/../application/admin\view\Default\common\showBigImg.html";i:1509018234;}*/ ?>
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
    <link rel="stylesheet" type="text/css" href="/static/admin/css/bootstrap-fileupload.css" />
    <script src="/static/admin/js/jquery-1.10.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/static/admin/js/bootstrap-fileupload.js"></script>
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
<!--<li class="dropdown" id="header_task_bar">-->
    <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
        <!--<i class="icon-tasks"></i>-->
        <!--<span name='count' class="badge">1</span>-->
    <!--</a>-->
    <!--<ul class="dropdown-menu extended tasks">-->
        <!--<li>-->
            <!--<p>你有(1)笔订单待处理</p>-->
        <!--</li>-->
        <!--<li class="external">-->
            <!--<a href="###" name=" count1">查看(1)笔预约订单 <i class="m-icon-swapright"></i></a>-->
            <!--<a href="###" name=" count2">查看(1})笔积分服务订单 <i class="m-icon-swapright"></i></a>-->
        <!--</li>-->
    <!--</ul>-->
<!--</li>-->
<li class="dropdown user">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <!--<img alt="" src="/static/admin/image/avatar1_small.jpg"/>-->
        <span class="username"><?php echo session('cmsuser')['name']; ?></span>
        <i class="icon-angle-down"></i>
    </a>
    <ul class="dropdown-menu">
        <!--<li><a href="<?php echo url('admin/admin_manage/save_info',['admin_id'=>session('cmsuser')['admin_id']]); ?>"><i class="icon-user"></i>个人中心</a></li>-->
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
                    <div class="portlet box green" style="border: 1px solid #ccc;">
                        <div class="portlet-title" style="background: #aaa;">
                            <div class="caption"><i class="icon-reorder"></i>角色菜单管理</div>
                            <div class="tools">
                                <a href="javascript:void(0);" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form action="<?php echo url('power/saveUserMenu'); ?>" method="post" id="form_sample_2" class="form-horizontal" enctype="multipart/form-data">
                                <input type="hidden" name="role_id" value="<?php echo $role_id; ?>"/>
                                <div class="clear-fix">
                                <?php foreach($menuList as $menu): if($menu['parent_menu_id'] == 0): ?>
                                    <div class="_menu">
                                        <div class="one_level">
                                            <input type="checkbox" name="select_menu[]" <?php if($menu['role_id'] == $role_id): ?>checked<?php endif; ?> value="<?php echo $menu['menu_id']; ?>" />
                                            <span ><?php echo $menu['menu_name']; ?></span>
                                        </div>
                                        <ul>
                                            <?php foreach($menuList as $child_menu): if($child_menu['parent_menu_id'] == $menu['menu_id']): ?>
                                                    <li>
                                                        <input class="two_level_check"  <?php if($child_menu['role_id'] == $role_id): ?>checked<?php endif; ?> name="select_menu[]" type="checkbox" value="<?php echo $child_menu['menu_id']; ?>" />
                                                        <span class="two_level"><?php echo $child_menu['menu_name']; ?></span>
                                                    </li>
                                                <?php endif; endforeach; ?>
                                        </ul>
                                    </div>
                                    <?php endif; endforeach; ?>
                                </div>
                                <div class="form-actions" style="background: #FFF;border-top:0;">
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
<style>
    ._menu{
        border: 1px solid #efefef;
        border-radius: 3px!important;
        width:160px;
        text-align: center;
        float:left;
        margin: 10px 0 0 10px;
    }
    ._menu .one_level{
        background: #35aa47;
        display: block;
        color:#FFF;
        height: 40px;
        width:162px;
        margin: -1px;
        line-height: 40px;
    }
    ._menu ul{
        -webkit-margin-before: 0;
        -webkit-margin-after: 0;
        -webkit-padding-start:0;
        margin: 0;
    }
    ._menu li{
        list-style: none;
        line-height: 40px;
        border-bottom: 1px solid #efefef;
    }
    ._menu input[type="checkbox"]{
        margin: 0;
    }
    ._menu li:last-child{
        border-bottom: 0;
    }
    .clear-fix:after{
        content:' ';
        width:0;
        height:0;
        display: block;
        clear: both;
    }
</style>
<script type="text/javascript">
    //子菜单选中，父菜单必然选中
    $('.two_level').parent().delegate('input[type="checkbox"]','click',function(){
        //判断当前是选中状态
        if($(this).is(':checked') == true){
            //那么选中父元素
            if($(this).parents('._menu').find('.one_level input[type="checkbox"]').is(':checked') == false){
                $(this).parents('._menu').find('.one_level input[type="checkbox"]').click();
            }
        }
    });

    //当父菜单取消,所有全部取消
    $('.one_level').delegate('input[type="checkbox"]','click',function(){
        if($(this).is(':checked') == true){
            return true;
        }
        $(this).parents('._menu').find('.two_level_check').each(function(){
            if($(this).is(':checked') == true){
                $(this).click();
            }
        });
    });

</script>
    </div>


	<div class="footer">
		<div class="footer-inner copyright">
            2017 © Power by <?php echo $website_title; ?> <a href="http://www.kuyunnet.com/" title="<?php echo $website_title; ?>" target="_blank">库云网络</a>
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
    <script>
    $(function () {
        $('.showImg').click(function () {
            var img_src = $(this).attr('src');
            $('#myModal').find('img').attr('src',img_src);
            $('#myModal').modal('show');
        })
        $('.show_content').click(function () {
            var content = $(this).data('val');
            $('#show_content').find('img').attr('src',img_src);
            $('#show_content').modal('show');
        })
        $('.showContent').click(function () {
            $('.modal-title').text('内容浏览')
            var content = $(this).data('content');
            $('#show_content').find('.modal-body').html("<p>"+content+"</p>");
            $('#show_content').modal('show');
        })
        $('.submit').click(function () {
            return $('#searchForm').submit();
        })
    })
</script>
<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;margin-left: -350px;top:10%;display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-top:16px;">
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    图片预览
                </h4>
            </div>
            <div class="modal-body">
                <img src="" style="width:100%;max-height: 300px;"/>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<div class="modal fade" id="show_content" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;margin-left: -350px;top:10%;display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-top:16px;">
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    内容预览
                </h4>
            </div>
            <div class="modal-body">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

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
