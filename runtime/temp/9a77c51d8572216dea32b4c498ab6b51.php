<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:87:"C:\wamp64\www\anmo\public/../application/admin\view\Default\Arrange\operation_info.html";i:1508312484;s:78:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\header.html";i:1509103829;s:75:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\nav.html";i:1508293702;s:81:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\path_link.html";i:1505728701;s:78:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\footer.html";i:1507542266;s:82:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\showBigImg.html";i:1509018234;}*/ ?>
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
                            <div class="caption"><i class="icon-reorder"></i>编辑分配技师信息</div>
                            <div class="tools">
                                <a href="javascript:void(0);" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form action="<?php echo url('/admin/Arrange/save_info'); ?>" method="post" id="form_sample_2" class="form-horizontal" enctype="multipart/form-data">
                                <input type="hidden" name="arrange_id"  value="<?php echo (isset($info['arrange_id']) && ($info['arrange_id'] !== '')?$info['arrange_id']:''); ?>">
                                <input type="hidden" name="backUrl" value="<?php echo $backUrl; ?>">

                                <div class="control-group">
                                    <label class="control-label">选择下单类型<span class="required">*</span></label>
                                    <div class="controls">
                                        <select class="select_info chosen" data-with-diselect="1" name="order_type" data-placeholder="-请选门店-" tabindex="1">
                                            <option value="1">会员下单</option>
                                            <option value="2">占位置下单</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">门店：<span class="required">*</span></label>
                                    <div class="controls">
                                        <select class="select_info chosen" data-with-diselect="1" name="store_id" data-placeholder="-请选门店-" tabindex="1">
                                            <option value=""></option>
                                            <?php foreach($storeList as $store): ?>
                                            <option value="<?php echo $store['store_id']; ?>"  <?php if(!empty($info)): if($info['store_id'] == $store['store_id']): ?>selected<?php endif; endif; ?> ><?php echo $store['store_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">项目类型：<span class="required">*</span></label>
                                    <div class="controls">
                                        <select class="select_info chosen" data-with-diselect="1" name="project_id" data-placeholder="-请选项目类型-" tabindex="1">
                                            <option value=""></option>
                                            <?php foreach($projectList as $project): ?>
                                            <option value="<?php echo $project['project_id']; ?>"  <?php if(!empty($info)): if($info['project_id'] == $project['project_id']): ?>selected<?php endif; endif; ?> ><?php echo $project['project_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group zwz">
                                    <label class="control-label">用户：<span class="required">*</span></label>
                                    <div class="controls">
                                        <select class="select_info chosen" data-with-diselect="1" name="user_no" data-placeholder="-请选用户-" tabindex="1">
                                            <option value=""></option>
                                            <?php foreach($userList as $user): ?>
                                            <option value="<?php echo $user['user_no']; ?>"  <?php if(!empty($info)): if($info['user_no'] == $user['user_no']): ?>selected<?php endif; endif; ?> ><?php echo $user['user_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group zwz">
                                    <label class="control-label">人数：<span class="required">*</span></label>
                                    <div class="controls">
                                        <div class="btn jian">-</div>
                                        <input type="number" readonly value="0" name="number" class="span2 m-wrap"
                                               placeholder="请输入人数">
                                        <div class="btn jia">+</div>
                                    </div>
                                </div>
                                <div class="fjjs"></div>

                                <div class="control-group ">
                                    <label class="control-label">开始时间<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="datetime-local" value="<?php if(isset($info)): ?><?php echo date('Y-m-d',$info['start_time']); ?>T<?php echo date('H:i',$info['start_time']); endif; ?>" name="start_time" class="span6 m-wrap"
                                               placeholder="请输入开课时间" >
                                    </div>
                                </div>

                                <div class="control-group zwz">
                                    <label class="control-label">支付方式：<span class="required">*</span></label>
                                    <div class="controls">
                                        <select class="select_info chosen" data-with-diselect="1" name="pay_style" data-placeholder="-请选用户-" tabindex="1">
                                            <option value="1">余额支付</option>
                                            <option value="2">现金支付</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group hide xianjin zwz">
                                    <label class="control-label">实际付款金额<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="actual_price" class="span6 m-wrap"
                                               placeholder="请输入实际付款金额" >
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn green">保存</button>
                                    <a href="javascript:window.history.go(-1)" class="btn">返回</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <div class="html_zy hide">
            <div class="control-group">
                <label class="control-label">房间技师选择：<span class="required">*</span></label>
                <div class="controls">
                    <select class="select_info  span3" data-with-diselect="1" name="room_id[]" data-placeholder="-请选房间-" tabindex="1">
                        <option value=""></option>
                        <?php foreach($roomLis as $roomInfo): ?>
                        <option value="<?php echo $roomInfo['room_id']; ?>"  ><?php echo $roomInfo['room_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select class="select_info  span3" data-with-diselect="1" name="technician_id[]" data-placeholder="-请选技师-" tabindex="1">
                        <option value=""></option>
                        <?php foreach($technicianList as $technicianInfo): ?>
                        <option value="<?php echo $technicianInfo['technician_id']; ?>" ><?php echo $technicianInfo['technician_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
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
    $(function(){
        $('.jian').click(function(){
            var input=$('input[name="number"]');
            var num=input.val();
            if(num>=1){
                num=Number(num)-1;
                input.val(num);
            }
            add_html(-1);
        })
        $('.jia').click(function(){
            var input=$('input[name="number"]');
            var num=input.val();
            if(num>=0){
                num=Number(num)+1;
                input.val(num);
            }
            add_html(1);
        })

        function add_html(obj){
            var html=$('.html_zy').html();
            html=$(html);
            var a=$('.fjjs');
            if(obj==1){
                a.append(html);
            }else{
                a.find('.control-group:last').remove();
            }
            html.find('select').trigger("liszt:updated");
            html.find('select').trigger("chosen:updated");
            html.find('select').chosen('destroy');
        }

        $('select[name="pay_style"]').change(function(){
            var val=$('select[name="pay_style"] option:checked').val();
            if(val==1){
                $('.xianjin').hide();
            }else{
                $('.xianjin').show();
            }
        })
        $('select[name="order_type"]').change(function(){
            var val=$('select[name="order_type"] option:checked').val();
            if(val==2){
                $('.zwz').hide();
            }
        })
    })
</script>