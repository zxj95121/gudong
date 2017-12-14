<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:85:"C:\wamp64\www\anmo\public/../application/admin\view\Default\Store\operation_info.html";i:1508221525;s:78:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\header.html";i:1507896678;s:75:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\nav.html";i:1508293702;s:81:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\path_link.html";i:1505728701;s:78:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\footer.html";i:1507542266;s:82:"C:\wamp64\www\anmo\public/../application/admin\view\Default\common\showBigImg.html";i:1505194866;}*/ ?>
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
        <span name='count' class="badge">0</span>
    </a>
    <ul class="dropdown-menu extended tasks">
        <li>
            <p>你有(0)订单待处理</p>
        </li>
        <!--<li class="external">-->
            <!--<a href="<?php echo url('Order/arrange'); ?>" name=" count1">查看笔预约订单 <i class="m-icon-swapright"></i></a>-->

            <!--<a href="<?php echo url('GoodsOrder/index'); ?>" name=" count2">查看笔商品兑换订单 <i class="m-icon-swapright"></i></a>-->
        <!--</li>-->
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


<!--<link href="<?php echo $base_path; ?>/css/style.css" type="text/css" rel="stylesheet">-->
<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
<script src="<?php echo $base_path; ?>/js/common.js"></script>
<!--<style>-->
    <!--.headImg{-->
        <!--width: 4rem;-->
        <!--height:4rem;-->
        <!--margin-right:0.8rem;-->
    <!--}-->
<!--</style>-->
<style>
    .uImg{position: relative}
    .deletePic{
        position: absolute;
        width: 0.5rem;
        height: 0.5rem;
        display: none;
        display: none;
    }
</style>
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
                            <div class="caption"><i class="icon-reorder"></i>编辑门店信息</div>
                            <div class="tools">
                                <a href="javascript:void(0);" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form action="<?php echo url('/admin/Store/save_info'); ?>" method="post" id="form_sample_2" class="form-horizontal" enctype="multipart/form-data">
                                <input type="hidden" name="store_id" class="storeId" value="<?php echo (isset($info['store_id']) && ($info['store_id'] !== '')?$info['store_id']:''); ?>">
                                <input type="hidden" name="backUrl" value="<?php echo $backUrl; ?>">
                                <div class="control-group">
                                    <label class="control-label">门店名称：<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" value="<?php echo (isset($info['store_name']) && ($info['store_name'] !== '')?$info['store_name']:''); ?>" name="store_name" class="span6 m-wrap"
                                               placeholder="请输入门店名称" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">门店电话：<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" value="<?php echo (isset($info['store_tel']) && ($info['store_tel'] !== '')?$info['store_tel']:''); ?>" name="store_tel" class="span6 m-wrap"
                                               placeholder="请输入门店电话" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">门店联系人：<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" value="<?php echo (isset($info['contact']) && ($info['contact'] !== '')?$info['contact']:''); ?>" name="contact" class="span6 m-wrap"
                                               placeholder="请输入门店联系人" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">门店地址：<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" value="<?php echo (isset($info['store_address']) && ($info['store_address'] !== '')?$info['store_address']:''); ?>" name="store_address" class="span6 m-wrap"
                                               placeholder="请输入门店地址" >
                                    </div>
                                </div>


                                <div class="control-group">

                                    <label class="control-label">门店项目选择</label>

                                    <div class="controls">

                                        <select data-placeholder="-请选择门店所属项目-" class="chosen span6" name="project_id[]" multiple="multiple" tabindex="6">

                                            <option value=""></option>

                                            <optgroup label="项目">

                                                <?php foreach($allProject as $project): ?>
                                                <option value="<?php echo $project['project_id']; ?>" <?php if(in_array($project['project_id'],$projectList)){?>selected<?php }?>><?php echo $project['project_name']; ?>,<?php echo showstatus($project['exchange_type'],'常规,兑换:1,2'); ?></option>
                                                <?php endforeach; ?>

                                            </optgroup>

                                        </select>

                                    </div>

                                </div>


                                <div class="control-group">
                                    <label class="control-label">经　　度：<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="number" step="0.000001" value="<?php echo (isset($info['lng']) && ($info['lng'] !== '')?$info['lng']:''); ?>" name="lng" class="span6 m-wrap"
                                               placeholder="请输入经度" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">纬　　度：<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="number" step="0.000001" value="<?php echo (isset($info['lat']) && ($info['lat'] !== '')?$info['lat']:''); ?>" name="lat" class="span6 m-wrap"
                                               placeholder="请输入纬度" >
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">折扣类型：<span class="required">*</span></label>
                                    <div class="controls">
                                        <select class="select_info chosen" data-with-diselect="1" name="discount_type" data-placeholder="-选择折扣类型-" tabindex="1">
                                            <option value=""></option>
                                            <option value="1" <?php if(isset($info)): if(1 == $info['discount_type']): ?>selected<?php endif; endif; ?>>新店促销</option>
                                            <option value="2" <?php if(isset($info)): if(2 == $info['discount_type']): ?>selected<?php endif; endif; ?>>打折优惠</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">折扣率：<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="number" step="0.01" value="<?php echo (isset($info['discount']) && ($info['discount'] !== '')?$info['discount']:''); ?>" name="discount" class="span6 m-wrap"
                                               placeholder="请输入折扣率" >
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">折扣开始时间：<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="date" value="<?php echo date('Y-m-d',$info['start_time']); ?>" name="start_time" class="span6 m-wrap"
                                               placeholder="请输入折扣开始时间" >
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">折扣结束时间：<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="date" value="<?php echo date('Y-m-d',$info['end_time']); ?>" name="end_time" class="span6 m-wrap"
                                               placeholder="请输入折扣结束时间" >
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">状　　态：<span class="required">*</span></label>
                                    <div class="controls">
                                        <select class="select_info chosen" data-with-diselect="1" name="status" data-placeholder="-选择状态-" tabindex="1">
                                            <option value=""></option>
                                            <option value="1" <?php if(isset($info)): if(1 == $info['status']): ?>selected<?php endif; endif; ?>>正常</option>
                                            <option value="2" <?php if(isset($info)): if(2 == $info['status']): ?>selected<?php endif; endif; ?>>异常</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">门店介绍：<span class="required">*</span></label>
                                    <div class="controls">
                                        <textarea name="intro" id="container"><?php echo (isset($info['intro']) && ($info['intro'] !== '')?$info['intro']:''); ?></textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">门店图片：<span class="required">*</span></label>
                                    <div class="order-comm-f-img controls">
                                        <?php if(!empty($info['img'])): $img = json_decode($info['img']);foreach($img as $item): ?>
                                                <div class="uImg">
                                                  <img src="<?php echo $base_path; ?>/images/cha.png" hidden="hidden" class="deletePic">
                                                 <img class="showPic" src="<?php echo substr($item,1); ?>"/>
                                                </div>
                                            <?php endforeach; else: endif; ?>
                                       <img src="<?php echo $base_path; ?>/images/img07.png" class="uploadImg"  id="uploadImg" hidden="true"/>
                                       <input type="file" multiple="5" name="img" id="upimg" >
                                     </div>
                                </div>


                                <div style="display: none;" id="HeaderImgArr">
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
        $('.new-btn-group span').show();
    });

    var len;
    $(function(){
        //鼠标覆盖图片事件
        $(".order-comm-f-img").on("mouseenter",".showPic",function(){
            $(this).siblings(".deletePic").show();
        })
        $(".order-comm-f-img").on("mouseenter",".deletePic",function(){
            $(this).show();
        })
        $(".order-comm-f-img").on("mouseleave",".showPic",function(){
            $(this).siblings(".deletePic").hide();
        })
        //删除图片事件
        $(".order-comm-f-img").on("click",".deletePic",function(){
            var src = $(this).siblings(".showPic").attr("src");
            var this_img=$(this);
            $.ajax({
                url: '/admin/Store/removePic',
                type: 'POST',
                async:false,
                data:{src:src,store_id:$(".storeId").val()},
                dataType:'json',
                success: function (val) {
                    if(val==1){
                        this_img.parent().remove();
                    }
                }
            })
        })
        $(".uploadImg").bind("click",function(){
            $("#upimg").click();
        });
        $("#upimg").change(function(){
            $("#HeaderImgArr").html('');
            checkUpImg();
        });
        var ini=0;
        //文件检测
        function checkUpImg() {
            //获取文件
            var file="";
            var src="";
            var srcc="";
            var fileList = document.getElementById('upimg').files;
            var file = document.getElementById('upimg');

            for(var i=0; i<fileList.length; i++) {
                if(ini==4){
                    alert("最多上传4张图片！");
                    return false;
                }
                var id="img"+ini;
                ini++;
                var html="<img src='' id="+id+" class='headImg' style='height:250px;width:200px'>";
                $(".uploadImg").before(html);
                var size = file .files[i].size;
                console.log(i+"...");
                loadImage(fileList[i],id);
                if(size>400*1024){
                    alert('请上传400K以内的图片');
                    return false;
                }
            }

        };

        // 显示文件
        function loadImage(file, id) {
            var image = document.getElementById(id);
            image.onload = function() {
                var canvas = document.getElementById("myCanvas");
                var ctx = canvas.getContext("2d");
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                canvas.width = image.width;
                canvas.height = image.height;
                ctx.drawImage(image, 0, 0, image.width, image.height);
            };
            // 在装载图像的过程中发生错误时调用的事件句柄。
            image.onerror = function() {
            };
            // 当用户放弃图像的装载时调用的事件句柄。
            image.onabort = function() {
            };
            //
            var reader = new FileReader();
            reader.onload = function(evt) {
                image.src = evt.target.result;
                $("#HeaderImgArr").append("<input type='text' name='headerImage[]' value='"+evt.target.result+"'>");
            }
            reader.readAsDataURL(file);
        };


    })



//删除图片
    $(function(){
        $(".uploadImg").last().bind("click", del);
    });
    var del = function () {
        var src = $(this).siblings('img').attr('src');
        //alert(src);
        //return false;
        $.ajax({
            type: "GET", //访问WebService使用Post方式请求
            url: "ajax.php?act=del", //调用WebService的地址和方法名称组合---WsURL/方法名
            data: "src=" + src,
            success: function (data) {

            }
        });
        $(this).parent().remove();
        return false;
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
                <img src="" style="width:100%;max-height: 300px;"/>
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
