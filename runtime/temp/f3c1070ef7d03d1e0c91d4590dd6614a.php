<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:93:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/admin\view\Default\message\message.html";i:1504533883;s:91:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/admin\view\Default\common\header.html";i:1504533884;s:88:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/admin\view\Default\common\nav.html";i:1504533884;s:94:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/admin\view\Default\common\path_link.html";i:1504533884;s:89:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/admin\view\Default\common\page.html";i:1504533884;s:91:"G:\phpstudy\phpstudy\WWW\tianma\public/../application/admin\view\Default\common\footer.html";i:1504533884;}*/ ?>
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
                            <div class="caption"><i class="icon-globe"></i>消息列表</div>
                            <div class="tools">
                                <a href="javascript:void(0);" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="clearfix">
                                <div class="btn-group">
                                </div>
                                <form action="<?php echo url('admin/message/message'); ?>" method="post" id="form_sample_2" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="chzn-container" style="float: left;margin-right: 15px;">
                                        <input type="text" maxlength="100" name="message_title" value="<?php echo $message_title; ?>" style="height:24px;font-size:12px;" placeholder="-消息标题-"/>
                                    </div>
                                    <select class="select_info chosen" data-with-diselect="1" name="store" data-placeholder="-请选择门店-" tabindex="1">
                                        <option value=""></option>
                                        <?php foreach($allStore as $store): ?>
                                        <option value="<?php echo $store['store_id']; ?>" <?php if($storeId == $store['store_id']): ?>selected<?php endif; ?> ><?php echo $store['store_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <select class="select_info chosen" data-with-diselect="1" name="action" data-placeholder="-请选择消息时间-" tabindex="1">
                                        <option value=""></option>
                                        <option value="1"<?php if($action == 1): ?>selected<?php endif; ?>>本月消息</option>
                                        <option value="2"<?php if($action == 2): ?>selected<?php endif; ?>>所有消息</option>
                                    </select>
                                    <div style="float:right;">

                                        <input type="button" onclick="editMessage(0)" class="btn green" value="添　加"/>
                                        <input type="submit" class="btn green" value="搜　索"/>
                                    </div>
                                </form>
                            </div>
                            <div style="height: 30px;"></div>
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>消息标题</th>
                                    <th>消息简介</th>
                                    <th>消息内容</th>
                                    <th>发布时间</th>
                                    <th>发布人</th>
                                    <th>接收身份</th>
                                    <th>接收者</th>
                                    <th>修改时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($messageList as $key=>$message): ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $key+1; ?></td>
                                    <td><?php echo $message['message_title']; ?></td>
                                    <td>
                                        <?php if($message['profile_type'] == 1): if(!empty($message['profile'])): ?>
                                        <img src = "<?php echo $message['profile']; ?>" onclick="showImg(this)"/>

                                        <?php else: ?>
                                        <img src = "/static/admin/image/notKnow.jpg" onclick="showImg(this)"/>

                                        <?php endif; else: ?>
                                        <?php echo $message['profile']; endif; ?>
                                    </td>
                                    <td><a onclick="editMessage(<?php echo $message['message_id']; ?>)" style="cursor: pointer;">点击查看</a></td>
                                    <td><?php echo $message['add_ts']; ?></td>
                                    <td><?php echo $message['staff_id']; ?></td>
                                    <td>
                                        <?php if($message['is_to_who'] == 1): ?>
                                        发送给所有家长
                                        <?php elseif($message['is_to_who'] == 2): ?>
                                        发送给所有老师
                                        <?php elseif($message['is_to_who'] == 3): ?>
                                        发送给所有人
                                        <?php elseif($message['is_to_who'] == 4): ?>
                                        发送给单个家长
                                        <?php else: ?>
                                        发送给单个老师
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($message['is_to_who'] == 1): ?>
                                        所有家长
                                        <?php elseif($message['is_to_who'] == 2): ?>
                                        所有老师
                                        <?php elseif($message['is_to_who'] == 3): ?>
                                        所有人
                                        <?php else: ?>
                                        <?php echo $message['who_no']; endif; ?>

                                    </td>
                                    <td><?php echo $message['update_ts']; ?></td>
                                    <td>
                                        <span class="btn blue"  onclick="editMessage(<?php echo $message['message_id']; ?>)" style="cursor: pointer;">
                                            <i class="fa icon-edit"></i>
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
    function editMessage(message_id){
        window.location.href = "<?php echo url('message/editMessage'); ?>?message_id="+message_id;
    }
    function showImg(obj){
        var img_src = $(obj).attr('src');
        $('#myModal').find('img').attr('src',img_src);
        $('#myModal').modal('show');
    }
</script>

<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;margin-left: -350px;top:10%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-top:16px;">
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    简介预览
                </h4>
            </div>
            <div class="modal-body">
                <img src="" style="width:100%;max-height: 300px;"/>
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

