<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:76:"C:\wamp64\www\anmo\public/../application/admin\view\Default\Goods\index.html";i:1506055759;s:78:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\header.html";i:1506352460;s:75:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\nav.html";i:1505728701;s:81:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\path_link.html";i:1505728701;s:89:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\table\table_thead.html";i:1504065964;s:76:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\page.html";i:1505728701;s:78:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\footer.html";i:1505728701;}*/ ?>
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

<li class="dropdown" id="header_task_bar">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="icon-tasks"></i>
        <span name='count' class="badge"><?php echo $count; ?></span>
    </a>
    <ul class="dropdown-menu extended tasks">
        <li>
            <p>你有(<?php echo $count; ?>)订单待处理</p>
        </li>
        <li class="external">
            <a href="<?php echo url('Order/arrange'); ?>" name=" count1">查看(<?php echo $count1; ?>)笔预约订单 <i class="m-icon-swapright"></i></a>

            <a href="<?php echo url('GoodsOrder/index'); ?>" name=" count2">查看(<?php echo $count2; ?>)笔商品兑换订单 <i class="m-icon-swapright"></i></a>
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
            <a href="<?php echo url('admin/'.$controller_name.'/operation_info'); ?>" class="btn green"><i class="icon-plus"></i>添加信息</a>
            <div class="row-fluid" style="margin-top: 10px;">
                <div class="span12">
                    <div class="portlet box light-grey">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-globe"></i>商品信息列表</div>
                            <div class="tools">
                                <a href="javascript:void(0);" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="clearfix">
                                <div class="btn-group">
                                </div>
                                <form action="<?php echo url('admin/'.$controller_name.'/'.$action_name); ?>" id='searchForm' method='get'>

                                    <select class="select_info chosen" data-with-diselect="1" name="goods_id" data-placeholder="-请选择商品-" tabindex="1">
                                        <option value=""></option>
                                        <?php foreach($goodsList as $goods): ?>
                                        <option value="<?php echo $goods['goods_id']; ?>" <?php if(isset($goods_id)): if($goods_id == $goods['goods_id']): ?>selected<?php endif; endif; ?>><?php echo $goods['goods_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                    <select class="select_info chosen" data-with-diselect="1" name="status" data-placeholder="-请选择状态-" tabindex="1">
                                        <option value=""></option>
                                        <option value="1" <?php if($status == 1): ?>selected<?php endif; ?>>上架</option>
                                        <option value="2" <?php if($status == 2): ?>selected<?php endif; ?>>下架</option>
                                    </select>
                                    <!--<button type="submit" style="margin-bottom: 26px" class="btn green"><i class="icon-search"></i>搜索</button>-->
                                </form>
                            </div>
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
<tr>
    <?php foreach($my_rule as $k=>$v): if($k==0): ?>
        <th style="width: 4%"><?php echo $v; ?></th>
        <?php else: ?>
        <th><?php echo $v; ?></th>
        <?php endif; endforeach; ?>
    <th>操作</th>
</tr>
</thead>
                                <tbody>
                                <?php foreach($list as $key=>$info): ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $key; ?></td>
                                    <td><?php echo $info['goods_name']; ?></td>
                                    <td><?php echo $info['price']/100; ?>元</td>
                                    <td><?php echo $info['points']; ?></td>
                                    <td><?php echo $info['stock']; ?></td>
                                    <td><span class="show_content">
                                        <p title="<?php echo strip_tags($info['intro'])?>"><?php echo mb_substr(strip_tags($info['intro']),0,20,'UTF-8')?></p>
                                    </span></td>
                                    <td>
                                        <?php if(!empty($info['img'])): ?>
                                        <img src="<?php echo \think\Config::get('cms_upload'); ?><?php echo $info['img']; ?>"  class="showImg">
                                        <?php else: ?>
                                        <img src="/static/admin/image/notKnow.jpg" class="showImg">
                                        <?php endif; ?>
                                    </td>

                                    <td><?php echo date('Y-m-d H:i:s',$info['add_ts']); ?></td>
                                    <td><span><?php echo showstatus($info['status'],'上架,下架:1,2'); ?></span></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn green" href="#" data-toggle="dropdown">
                                                操作<i class="icon-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu" style="text-align: left">
                                                <li><a href="<?php echo url('admin/Goods/operation_info',['goods_id'=>$info['goods_id']]); ?>">修改</a></li>
                                                <li><a href="<?php echo url('admin/Goods/update_status',['goods_id'=>$info['goods_id'],'status'=>$info['status']]); ?>">
                                                    <?php if($info['status']==1): ?>下架<?php else: ?>上架<?php endif; ?></a>
                                                </li>
                                            </ul>
                                        </div>
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


<script>
    $('.chosen[name="goods_id"]').change(function () {
        return $('#searchForm').submit();
    })

    $('.chosen[name="status"]').change(function () {
        return $('#searchForm').submit();
    })

</script>