<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:95:"D:\new_exe\xampp\htdocs\gudong\public/../application/admin\view\Default\Activity\giftOrder.html";i:1511838420;s:90:"D:\new_exe\xampp\htdocs\gudong\public/../application/admin\view\Default\common\header.html";i:1511838420;s:87:"D:\new_exe\xampp\htdocs\gudong\public/../application/admin\view\Default\common\nav.html";i:1511838420;s:93:"D:\new_exe\xampp\htdocs\gudong\public/../application/admin\view\Default\common\path_link.html";i:1511838420;s:88:"D:\new_exe\xampp\htdocs\gudong\public/../application/admin\view\Default\common\page.html";i:1511838420;s:90:"D:\new_exe\xampp\htdocs\gudong\public/../application/admin\view\Default\common\footer.html";i:1511838420;s:94:"D:\new_exe\xampp\htdocs\gudong\public/../application/admin\view\Default\common\showBigImg.html";i:1511838420;}*/ ?>
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


        <style>
            .modal-body span{
                width: 25%;
                display: block;
                float: left;
            }
            .modal-body font{
                width: 75%;
                display: block;
                float: left;
            }
        </style>
<div class="page-content">
    <div class="container-fluid">
        <div class="row-fluid">
    <div class="span12">
    </div>
</div>
        <div id="dashboard">
<!--             <a href="<?php echo url('admin/Activity/operation_info'); ?>" class="btn green"><i class="icon-plus"></i>添加活动</a> -->
            <div class="row-fluid" style="margin-top: 10px;">
                <div class="span12">
                    <div class="portlet box light-grey">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-globe"></i>研值送礼订单</div>
                            <div class="tools">
                                <a href="javascript:void(0);" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="navbar">
                            </div>

                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>姓名</th>
                                    <th>手机号</th>
                                    <th>地址</th>
                                    <th>详细地址</th>
                                    <th>支付时间</th>
                                    <th>状态</th>
                                </tr>
                                </thead>
                                <?php foreach($orders as $value): ?>
                                <tr class="odd gradeX" oid="<?php echo $value['id']; ?>">
                                    <td><?php echo $value['id']; ?></td>
                                    <td><?php echo $value['name']; ?></td>
                                    <td><?php echo $value['phone']; ?></td>
                                    <td><?php echo $value['address']; ?></td>
                                    <td><?php echo $value['detail']; ?></td>
                                    <td>
                                        <?php echo date('Y-m-d H:i:s', $value['add_ts']); ?>
                                    </td>
                                    <td><?php if($value['status'] == 1): ?><button class="btn blue confirmOrder">确认订单</button><?php elseif($value['status'] == 2): ?><button class="btn red">已确认</button><?php endif; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </table>

                            <div class="" style="min-width:30%;max-width: 80%;margin: 0 auto">
                                <div >
        <div class="dataTables_paginate paging_bootstrap pagination " style='margin: 0px auto;text-align: center;'>
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

<script type="text/javascript" src="/static/index/layer/layer.js"></script>
<script>
    $('.confirmOrder').click(function(){
        var dom = $(this);
        var oid = $(this).parents('tr').attr('oid');//确认该订单吗？
        layer.confirm('确认接收该订单吗?', {btn: ['确认', '取消']}, function(index) {
            $.ajax({
                url: '/admin/activity/ajaxConfirmGiftOrder',
                type: 'post',
                dataType: 'json',
                data: {
                    oid: oid
                },
                success: function(data) {
                    if (data.errcode == 0) {
                        layer.msg('确认成功!');
                        dom.after('<button class="btn red">已确认</button>');
                        dom.remove();
                    }
                }
            })
            layer.close(index);
        }, function(index){
            layer.close(index);
        })
    })
</script>