<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:89:"C:\wamp64\www\anmo\public/../application/admin\view\Default\UserRecharge\update_info.html";i:1509200593;s:78:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\header.html";i:1509103829;s:75:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\nav.html";i:1508293702;s:81:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\path_link.html";i:1505728701;s:96:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\file_upload\image_upload.html";i:1505106650;s:78:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\footer.html";i:1507542266;s:82:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\showBigImg.html";i:1509018234;}*/ ?>
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
                            <div class="caption"><i class="icon-reorder"></i>编辑充值信息</div>
                            <div class="tools">
                                <a href="javascript:void(0);" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form action="<?php echo url('/admin/UserRecharge/save_update_info'); ?>" method="post" id="form_sample_2" class="form-horizontal" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo (isset($info['id']) && ($info['id'] !== '')?$info['id']:''); ?>">
                                <input type="hidden" name="backUrl" value="<?php echo $backUrl; ?>">



                                <div class="control-group">
                                    <label class="control-label">用　　户：<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" readonly value="<?php if(isset($info)): ?><?php echo $info['user_name']; endif; ?>" name="user_no" class="span6 m-wrap"
                                               >
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">充值套餐：<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" readonly value="<?php if(isset($info)): ?><?php echo $info['package_name']; endif; ?>" name="chargePackage_id" class="span6 m-wrap"
                                                >
                                    </div>
                                </div>




                                <div class="control-group">
                                    <label class="control-label">充值金额(元)：<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text"readonly value="<?php if(isset($info)): ?><?php echo $info['moneyC']/100; endif; ?>" name="moneyC" class="span6 m-wrap"
                                               placeholder="请输入总金额" >
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">赠送金额(元)：<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" readonly value="<?php if(isset($info)): ?><?php echo $info['moneyS']/100; endif; ?>" name="moneyS" class="span6 m-wrap"
                                               placeholder="请输入总金额" >
                                    </div>
                                </div>



                                <?php if(!empty($image_upload)): foreach($image_upload as $column=>$name): ?>
<div class="control-group">
    <label class="control-label"><?php echo $name; ?></label>
    <div class="controls">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail default_<?php echo $column; ?>" style="width: 200px; height: 150px;">
                <img <?php if((isset($info[$column]))): ?> src='<?php echo \think\Config::get('cms_upload'); ?>/<?php echo (isset($info[$column]) && ($info[$column] !== '')?$info[$column]:''); ?>'<?php else: ?> src='<?php echo \think\Config::get('cms_resource'); ?>/image/zhanwu.jpg'<?php endif; ?> alt="" />
            </div>
            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
            </div>
            <div>
                <span class="btn btn-file">
                    <span class="fileupload-new">选择图片</span>
                    <span class="fileupload-exists">重选</span>
                    <input type="file" class="default" name='upload_<?php echo $column; ?>'/><!-- 这个name是ajax文件上传时要用的  -->
                </span>
                <a href="javascript:;" class="btn fileupload-exists" data-dismiss="fileupload">取消</a>
                <a href="javascript:;" class="btn red fileupload-exists upload_img" data-column='<?php echo $column; ?>' id='click_<?php echo $column; ?>'>上传</a>
                <input type="hidden" class='save_input' name="<?php echo $column; ?>" id="column_<?php echo $column; ?>" value='<?php echo (isset($info[$column]) && ($info[$column] !== '')?$info[$column]:''); ?>'><!-- 这个是保存的时候用的 -->
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<script type="text/javascript">
    $(function () {
        $('.upload_img').click(function(){
            var formData = new FormData($( "#form_sample_2" )[0]);
            column = $(this).data('column');
            formData.append('column',column);
            formData.append('file_dir','<?php echo $file_dir; ?>');
            $.ajax({
                <?php if(!empty($size)): ?>
                url: '<?php echo url("upload/uploadImg",['x'=>$size['x'],'y'=>$size['y']]); ?>' ,
                <?php else: ?>
                url: '<?php echo url("upload/uploadImg"); ?>' ,
                <?php endif; ?>
                type: 'post',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if(data!=false){
                        $('#column_'+column).val(data);
                        $('.default_img').html('');
                        $('#click_'+column).html('已上传').removeClass('red').addClass('blue');
                    }else{
                        alert('未上传成功')
                    }
                },
                error: function (returndata) {
                }
            });
        })
    })
</script>
                                <?php endif; ?>

                                <div class="control-group">
                                    <label class="control-label">备注信息：<span class="required">*</span></label>
                                    <div class="controls">
                                        <textarea name="note" id="container"><?php echo (isset($info['note']) && ($info['note'] !== '')?$info['note']:''); ?></textarea>
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">状&nbsp;&nbsp;&nbsp;态：<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" readonly value="<?php if(isset($info)): ?><?php echo showstatus($info['status'],'正常,异常:1,2'); endif; ?>" name="status" class="span6 m-wrap"
                                                >
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

<!-- 配置文件 -->
<script type="text/javascript" src="/static/admin/ueditor-php/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/static/admin/ueditor-php/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script>
    var ue = UE.getEditor('container');
    $('.new-btn-group').delegate('input[type="file"]','change',function(){
        $(this).parents('.new-btn-group').find('span').show();
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
