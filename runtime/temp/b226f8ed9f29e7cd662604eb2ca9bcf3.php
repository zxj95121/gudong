<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:88:"D:\new_exe\xampp\htdocs\gudong\public/../application/admin\view\Default\index\index.html";i:1511838420;s:90:"D:\new_exe\xampp\htdocs\gudong\public/../application/admin\view\Default\common\header.html";i:1511838420;s:87:"D:\new_exe\xampp\htdocs\gudong\public/../application/admin\view\Default\common\nav.html";i:1511838420;s:93:"D:\new_exe\xampp\htdocs\gudong\public/../application/admin\view\Default\common\path_link.html";i:1511838420;s:90:"D:\new_exe\xampp\htdocs\gudong\public/../application/admin\view\Default\common\footer.html";i:1511838420;s:94:"D:\new_exe\xampp\htdocs\gudong\public/../application/admin\view\Default\common\showBigImg.html";i:1511838420;}*/ ?>
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
            <!--4个数据框-->
            <div class="row-fluid">
                <div class="span3 responsive" data-tablet="span3" data-desktop="span3">
                    <div class="dashboard-stat blue">
                        <div class="visual">
                            <i class="icon-wrench"></i>
                        </div>
                        <div class="details">
                            <div class="number" data-value="<?php echo $data['arrange']; ?>">1</div>
                            <div class="desc">预约课程订单</div>
                        </div>
                        <a class="more" href="###">查看更多<i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="span3 responsive" data-tablet="span3" data-desktop="span3">
                    <div class="dashboard-stat green">
                        <div class="visual">
                            <i class="icon-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number" data-value="<?php echo (isset($data['goods']) && ($data['goods'] !== '')?$data['goods']:'0'); ?>">2</div>
                            <div class="desc">商品兑换订单</div>
                        </div>
                        <a class="more" href="###">
                            查看更多 <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>

                <div class="span3 responsive" data-tablet="span3  " data-desktop="span3">
                    <div class="dashboard-stat purple">
                        <div class="visual">
                            <i class="icon-tags"></i>
                        </div>
                        <div class="details">
                            <div class="number" data-value="<?php echo (isset($data['pay']) && ($data['pay'] !== '')?$data['pay']:'0'); ?>">2</div>
                            <div class="desc">总营业额</div>
                        </div>
                        <a class="more" href="#">
                            查看更多<i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="span3 responsive" data-tablet="span3" data-desktop="span3">
                    <div class="dashboard-stat yellow">
                        <div class="visual">
                            <i class="icon-user"></i>
                        </div>
                        <div class="details">
                            <div class="number" data-value="<?php echo (isset($data['user']) && ($data['user'] !== '')?$data['user']:'0'); ?>">3</div>
                            <div class="desc">会员关注总数</div>
                        </div>
                        <a class="more" href="###">
                            查看更多<i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $('.details .number').each(function(index){
                    var value = $(this).data('value');
                    loopNum(index,0,value);
                });
                function loopNum(index,currentValue,toValue){
                    if(currentValue > toValue){
                        return false;
                    }
                    setTimeout(function(){
                        $('#dashboard .number:eq('+index+')').html(currentValue);
                        var diff = Math.floor(toValue/50);
                        if(toValue <= 50){
                            diff = 1;
                        }
                        currentValue = currentValue+diff;
                        if(currentValue >= toValue){
                            currentValue = toValue;
                        }
                        loopNum(index,currentValue,toValue);
                    },0+10*index);
                }
            </script>

            <!-- 左边饼图-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-calendar"></i>课程数据统计</div>
                    <div class="tools">
                        <a href="" class="collapse"></a>
                        <a href="" class="remove"></a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row-fluid">
                        <div class="span6" id="main" style="height: 500px;width: 90%"></div>
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

<script src="/static/echart/echarts.js"></script>
<script src="/static/echart/vintage.js"></script>
<script src="/static/echart/macarons.js"></script>

<script type="text/javascript">

    $(document).ready(function(){
        var myChart = echarts.init(document.getElementById('main'));
        option = {

            tooltip: {
                trigger: 'axis',
                formatter: function(params, ticket, callback) {

                    var res = params[0].name;

                    for (var i = 0, l = params.length; i < l; i++) {
                        if (params[i].seriesType === 'line') {
                            res += '<br/>' + params[i].seriesName + ' : ' + (params[i].value ? params[i].value : '-') + 'h';
                        } else {
                            res += '<br/>' + params[i].seriesName + ' : ' + (params[i].value ? params[i].value : '-') + '个';
                        }
                    }
                    return res;
                }
            },

            grid: {
                containLabel: true
            },
            legend: {
                data: ['约课率', '空缺位置', '已预约位置']
            },
            xAxis: [{
                type: 'category',
                axisTick: {
                    alignWithLabel: true
                },
                data: [1,2,3,4]
            }],
            dataZoom: [{
                type: 'slider',
                xAxisIndex: 0,
                filterMode: 'empty',
                start: 0,
                end: 100
            }, {
                type: 'slider',
                yAxisIndex: 0,
                filterMode: 'empty',
                start: 0,
                end: 100
            }, {
                type: 'inside',
                xAxisIndex: 0,
                filterMode: 'empty',
                start: 0,
                end: 100
            }, {
                type: 'inside',
                yAxisIndex: 0,
                filterMode: 'empty',
                start: 0,
                end: 100
            }],
            yAxis: [{
                type: 'value',
                name: '预约率',
                min: 0,
                position: 'right',
                axisLabel: {
                    formatter: '{value} %'
                }
            },
                {
                    type: 'value',
                    name: '约课数量',
                    min: 0,
                    position: 'left',
                    axisLabel: {
                        formatter: '{value} 个'
                    }
                } ],
            series: [{
                name: '约课率',
                type: 'line',
                label: {
                    normal: {
                        show: true,
                        position: 'top',
                    }
                },
                lineStyle: {
                    normal: {
                        width: 3,
                        shadowColor: 'rgba(0,0,0,0.4)',
                        shadowBlur: 10,
                        shadowOffsetY: 10
                    }
                },
                data:  <?php echo $course['math']; ?>
            }, {
                name: '空缺位置',
                type: 'bar',
                yAxisIndex: 1,
                label: {
                    normal: {
                        show: true,
                        position: 'top'
                    }
                },
                data: <?php echo $course['no']; ?>
            }, {
                name: '已预约位置',
                type: 'bar',
                yAxisIndex: 1,
                label: {
                    normal: {
                        show: true,
                        position: 'top'
                    }
                },
                data:  <?php echo $course['yes']; ?>
            }]
        };
        myChart.setOption(option);

    });
</script>


