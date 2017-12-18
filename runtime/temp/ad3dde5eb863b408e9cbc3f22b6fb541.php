<?php if (!defined('THINK_PATH')) exit(); /*a:8:{s:78:"C:\wamp64\www\anmo\public/../application/admin\view\Default\Arrange\index.html";i:1509358776;s:78:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\header.html";i:1509103829;s:75:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\nav.html";i:1508293702;s:81:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\path_link.html";i:1505728701;s:89:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\table\table_thead.html";i:1504065964;s:76:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\page.html";i:1505728701;s:78:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\footer.html";i:1507542266;s:82:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\showBigImg.html";i:1509018234;}*/ ?>
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
            <p>你有(<?php echo $count; ?>)笔订单待处理</p>
        </li>
        <li class="external">
            <a href="<?php echo url('Arrange/index'); ?>" name=" count1">查看(<?php echo $count1; ?>)笔预约订单 <i class="m-icon-swapright"></i></a>
            <a href="<?php echo url('PointsOrder/index'); ?>" name=" count2">查看(<?php echo $count2; ?>)笔积分服务订单 <i class="m-icon-swapright"></i></a>
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
            <li class="start active ">
                <a href="<?php echo url('admin/DashBord/index'); ?>">
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
            <a href="<?php echo url('admin/Arrange/operation_info'); ?>" class="btn green"><i class="icon-plus"></i>添加信息</a>
            <div class="row-fluid" style="margin-top: 10px;">
                <div class="span12">
                    <div class="portlet box light-grey">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-globe"></i>项目预约订单列表</div>
                            <div class="tools">
                                <a href="javascript:void(0);" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="clearfix">
                                <div class="btn-group">
                                </div>
                                <form action="<?php echo url('admin/Arrange/index'); ?>" id='searchForm' method='get'>
                                    <input type="text" name="arrange_no"  class='m-wrap' placeholder="请输入订单编号"
                                           value="<?php echo (isset($arrange_no) && ($arrange_no !== '')?$arrange_no:''); ?>">
                                    <div class="btn-group"style=" margin-bottom: 26px!important">
                                        <a class="btn green" href="#" data-toggle="dropdown">
                                            操作<i class="icon-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu" style="text-align: left">
                                            <li class="search"><a href="javascript:;">搜索</a></li>
                                            <li class="validation"><a href="javascript:;">核销</a></li>
                                        </ul>
                                    </div>
                                    <select class="select_info chosen" data-with-diselect="1" name="user_no" data-placeholder="-请选择用户-" tabindex="1">
                                        <option value=""></option>
                                        <?php foreach($userList as $user): ?>
                                        <option value="<?php echo $user['user_no']; ?>" <?php if(!empty($user_no)): if($user_no == $user['user_no']): ?>selected<?php endif; endif; ?>><?php echo $user['mobile']; ?>,<?php echo $user['user_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <select class="select_info chosen" data-with-diselect="1" name="store_id" data-placeholder="-请选择门店-" tabindex="1">
                                        <option value=""></option>
                                        <?php foreach($storeList as $store): ?>
                                        <option value="<?php echo $store['store_id']; ?>" <?php if(!empty($store_id)): if($store_id == $store['store_id']): ?>selected<?php endif; endif; ?>><?php echo $store['store_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <select class="select_info chosen" data-with-diselect="1" name="type_id" data-placeholder="-请选择项目类型-" tabindex="1">
                                        <option value=""></option>
                                        <?php foreach($typeList as $type): ?>
                                        <option value="<?php echo $type['type_id']; ?>" <?php if(!empty($type_id)): if($type_id == $type['type_id']): ?>selected<?php endif; endif; ?>><?php echo $type['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <select class="select_info chosen" data-with-diselect="1" name="project_id" data-placeholder="-请选择项目-" tabindex="1">
                                        <option value=""></option>
                                        <?php foreach($projectList as $project): ?>
                                        <option value="<?php echo $project['project_id']; ?>" <?php if(!empty($project_id)): if($project_id == $project['project_id']): ?>selected<?php endif; endif; ?>><?php echo $project['project_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <select class="select_info chosen" data-with-diselect="1" name="status" data-placeholder="-请选择状态-" tabindex="1">
                                        <option value=""></option>
                                        <option value="1" <?php if(isset($status)): if($status == 1): ?>selected<?php endif; endif; ?>>待消费</option>
                                        <option value="2" <?php if(isset($status)): if($status == 2): ?>selected<?php endif; endif; ?>>待评价</option>
                                        <option value="3" <?php if(isset($status)): if($status == 3): ?>selected<?php endif; endif; ?>>已完成</option>
                                        <option value="4" <?php if(isset($status)): if($status == 4): ?>selected<?php endif; endif; ?>>待付款</option>
                                        <option value="5" <?php if(isset($status)): if($status == 5): ?>selected<?php endif; endif; ?>>进行中</option>
                                        <option value="6" <?php if(isset($status)): if($status == 6): ?>selected<?php endif; endif; ?>>未进行</option>
                                        <option value="7" <?php if(isset($status)): if($status == 7): ?>selected<?php endif; endif; ?>>已过期</option>
                                    </select>
                                    <!--<button type="submit" style=" margin-bottom: 26px" class="btn green"><i class="icon-search"></i>搜索</button>-->
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
                                    <td><?php echo $info['arrange_no']; ?></td>
                                    <td><?php echo $info['store_name']; ?></td>
                                    <td><?php echo $info['name']; ?></td>
                                    <td data-content="<?php echo $info['project_name']; ?>" class="showContent"><?php echo mb_substr($info['project_name'],0,10,'utf-8'); ?></td>
                                    <td><?php echo $info['user_name']; ?></td>
                                    <td><?php echo $info['mobile']; ?></td>
                                    <td><?php echo $info['time']; ?></td>
                                    <td><?php echo date('Y-m-d H:i',$info['start_time']); ?>--<?php echo date('H:i',$info['end_time']); ?></td>
                                    <td><span><?php echo showstatus($info['type'],'常规,兑换:1,2'); ?></span></td>
                                    <!--<td><?php echo $info['technician_name']; ?></td>-->
                                    <td><?php echo $info['number']; ?></td>
                                    <td><?php echo $info['total_price']/100; ?>元</td>
                                    <td><?php echo $info['actual_price']/100; ?>元</td>
                                    <td><span><?php echo showstatus($info['position_type_p'],'床,沙发:1,2'); ?></span></td>
                                    <!--<td><?php echo $info['total_points']; ?></td>-->
                                    <!--<td><?php echo date('Y-m-d H:i:s',$info['add_ts']); ?></td>-->
                                    <td><span><?php echo showstatus($info['status'],'待消费,待评价,已完成,待付款,进行中,未进行,已过期:1,2,3,4,5,6,7'); ?></span></td>

                                    <td>
                                        <div class="btn-group">
                                            <a class="btn green" href="#" data-toggle="dropdown">
                                                操作<i class="icon-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu" style="text-align: left">
                                                <!--<li><a href="<?php echo url('admin/Arrange/update_operation_info',['arrange_id'=>$info['arrange_id']]); ?>">编辑</a></li>-->
                                                <li onclick="seeArrange(<?php echo $info['arrange_no']; ?>)" style="padding-left: 10px;cursor: pointer;">查看预约安排</li>
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

<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" style="top:10%!important;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    模态框（Modal）标题
                </h4>
            <div class="modal-body">
                在这里添加一些文本
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
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


<script>
    $('.chosen').change(function () {
        return $('#searchForm').submit();
    })
    $('.search').click(function () {
         return $('#searchForm').submit();
    })

    $('.chosen[name="status"]').change(function () {
        return $('#searchForm').submit();
    })

    $('.chosen[name="store_id"]').change(function () {
        return $('#searchForm').submit();
    })

    $('.chosen[name="pay_type"]').change(function () {
        return $('#searchForm').submit();
    })

    $('.chosen[name="project_id"]').change(function () {
        return $('#searchForm').submit();
    })
    $('.validation').click(function () {
         var val=$(this).parents('#searchForm').find('input[name="arrange_no"]').val();
         if(val.length==16){
             window.location.href="<?php echo url('admin/Arrange/arrange_validation'); ?>?arrange_no="+val;
         }else {
             alert('您输入编码有误');
         }
    })

    function seeArrange(arrange_no){
        $.ajax({
            url: '/admin/Arrange/getArrangeData',
            type: 'POST',
            data:{arrange_no:arrange_no},
            dataType:'json',
            success: function (val) {
                if(val.code==400){
                    alert(val.msg);
                    return false;
                }
                $('#myModalLabel').html('查看预约安排');
                var data = val.data;
                var str = '<span>预约编号:</span><font>'+data.arrange_no+'</font><br/>';
                str += '<span>门店:</span><font>'+data.store_name+'</font><br/>';
                str += '<span>项目类型:</span><font>'+data.name+'</font><br/>';
                str += '<span>项目:</span><font>'+data.project_name+'</font><br/>';
                str += '<span>用户:</span><font>'+data.user_name+'</font><br/>';
                str += '<span>用户电话:</span><font>'+data.mobile+'</font><br/>';
                str += '<span>时长:</span><font>'+data.time+'分钟</font><br/>';
                str += '<span>开始时间:</span><font>'+data.start_time+'</font><br/>';
                str += '<span>人数:</span><font>'+data.number+'人</font><br/>';
                str += '<span>技师:</span><font>'+data.technician_name+'</font><br/>';
                str += '<span>应付款:</span><font>'+(data.total_price)/100+'元</font><br/>';
                str += '<span>实付款:</span><font>'+(data.actual_price)/100+'元</font><br/>';
                str += '<span>总积分:</span><font>'+data.total_points+'分</font><br/>';
                $('#myModal .modal-body').html(str);
                $('#myModal').modal('show');
            }
        })
    }

</script>