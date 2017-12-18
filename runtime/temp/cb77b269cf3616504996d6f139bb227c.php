<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"D:\new_exe\xampp\htdocs\gudong\public/../application/index\view\Default\index\myMoment.html";i:1512007304;}*/ ?>
﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="stylesheet" type="text/css" href="/static/index/bootstrap/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="/static/index/js/mui/dist/css/mui.min.css">
    <link rel="stylesheet" type="text/css" href="/static/index/bootstrap/css/basic.css">
    <title></title> 
    <style type="text/css">
        #open{
            background: #FFF;
            position: fixed;
            display: none;
            overflow-y: scroll;
        }
        .mui-media-object{
            background-size: cover;
        }
        .mui-ellipsis{
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }
        .fabu{
        	 width: 22rem;
    height: 2.97rem;
    border: none;
    color: white;
    font-size: 1rem;
    border-radius: 0.3rem;
    background: #332d46;
    margin-left: 1.3rem;
    line-height: 100%;
        }
    </style>
</head>
<body>
	<!--<img src="images/zhanshi.jpg" style="" class="backg">-->


    <header id="header" class="mui-bar mui-bar-nav">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" href="<?php echo url('index/index/center'); ?>" style="text-decoration: none;cursor: pointer;"></a>
        <h1 class="mui-title">我的进化</h1>
    </header>

    <div class="mui-content" style="background-color:#fff;visibility: hidden;">
        <ul class="mui-table-view mui-table-view-chevron" id="momentList">
            <?php if(is_array($momentList) || $momentList instanceof \think\Collection || $momentList instanceof \think\Paginator): if( count($momentList)==0 ) : echo "" ;else: foreach($momentList as $key=>$value): ?>
            <li class="mui-table-view-cell mui-media moments" mid="<?php echo $value['moment_id']; ?>">
                <a class="mui-navigate-right" style="text-decoration: none;cursor: pointer;" href="<?php echo url('index/moment/myMomentShow'); ?>?mid=<?php echo $value['moment_id']; ?>">
                    <img class="mui-media-object mui-pull-left" src="<?php echo $value['img']; ?>">
                    <div class="mui-media-body">
                        <span style="font-size: 0.8em;"><?php echo $value['add_ts']; ?></span>
                        <p class="mui-ellipsis"><?php echo $value['content']; ?></p>
                    </div>
                </a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; if(count($momentList) > 0): ?>
            <h6 align="center">- 到底啦 -</h6>
            <li style="display: block;height: 50px;width: 100%;opacity: 0;">
                
            </li>
            <?php else: ?>
            <p style="text-align: center;position: fixed;top: 30%;width: 100%;fixed">开启我的进化之旅</p>
            <?php endif; ?>
        </ul>
    </div>
<form id="newMomentForm" method="post" enctype="multipart/form-data" action="/index/moment/newMoment">
    <div id="open">
        <header id="open-header" class="mui-bar mui-bar-nav">
            <h1 class="mui-title" style="text-decoration: none;">我的进化</h1>
        </header>

        <div id="noShow"></div>
        
        <div class="mui-input-row" style="" style="margin: 50px 5px;">
            <textarea id="textarea" name="content" rows="5" placeholder="我的进化论" style="margin-bottom: 0px;"></textarea>

            <label style="    width: 100%;
    font-size: 1rem;
    color: #9D9D9D;
    font-weight: normal;">
                <input type="checkbox" name="see"> 孤芳自赏
            </label>
        </div>
        <ul class="mui-table-view mui-grid-view">
            <li class="mui-table-view-cell mui-media mui-col-xs-4" id="imageBtn">
                <a href="#">
                    <img id="noneImg" class="mui-media-object" src="/static/index/images/add.png" style="display: none;width: 4rem;">
                </a>
            </li>
            
        </ul>   
        
        <input type="file" class="fileBtn" name="image[]" id="image" style="opacity: 0;" multiple="multiple">
        <button type="button" onclick="btnClick();" class="fabu" style="
    cursor: pointer;
    font-size: 1.5rem;">+in记</button>
    </div>
</form>

	<nav class="mui-bar mui-bar-tab">
        <a class="mui-tab-item mui-active" id="newMoment" href="javascript:void(0);" style="cursor: pointer;">
            <p style="    color: #288efe;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    margin: 0;"><span style="font-size: 3rem;">+</span><span>in记</span></p>
        </a>
    </nav>

    <script type="text/javascript" src="/static/index/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="/static/index/js/common.js"></script>
    <script type="text/javascript" src="/static/index/layer/layer.js"></script>
    <script type="text/javascript" src="/static/index/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $.fn.longPress = function(fn) {
            var timeout = undefined;
            var $this = this;
            for(var i = 0;i<$this.length;i++){
                $this[i].addEventListener('touchstart', function(event) {
                    timeout = setTimeout(fn, 800);
                    }, false);
                $this[i].addEventListener('touchend', function(event) {
                    clearTimeout(timeout);
                    }, false);
            }
        }
    </script>
    <script type="text/javascript">
        var murl = '<?php echo url("index/moment/myMomentShow"); ?>'+'?mid=';
        var identity = '<?php echo $identity; ?>';

    </script>
    
    <script type="text/javascript">
    	$('#open').css({'zIndex': 99}).animate({'top': 0}, 400);
        $(function(){
            var width = $('.mui-content').width();
            var height = document.documentElement.clientHeight;

            window.height= height;

            init('#open', width, height);

            $('#newMoment').click(function(){
                if (identity != 1) {
                    layer.msg('非会员不能发表说说');
                    return false;
                }
                $('#open').css({'zIndex': 99}).animate({'top': 0}, 400);
            })

            //添加图片按钮
            $('#imageBtn').click(function(){
                $('#image')[0].click();
            })
        })

        function init(id, width, height) {
            $(id).css({'width': width, 'height': height, 'top': height, display: 'block'});
            $('#noShow').css({width: '100%', height: $('#open-header').height()});
            $('#noneImg').show();
        }

        function closeOpen() {
            $('#open').css({'zIndex': 0}).animate({'top': window.height}, 400);
        }

        //图片改变时候将文件显示
    $(function(){
        $('#image').change(function(){
            $('#imageBtn').siblings().remove();
            readFile();
        })
    })

    function readFile(){
        // 检查是否为图像类型
        var files = document.getElementById("image").files;
        console.log(files.length);
        if (files.length == 0)
            return;

        var count = 1;
        for (var i in files) {
            if (count == 10) {
                layer.msg('最多上传九张图片');
                return;
            }
            count++;
            var simpleFile = files[i];
            if (typeof(simpleFile) != 'object')
                return ;
            console.log(simpleFile);
            // if (simpleFile.size > 1024*1024*2) {
            //     layer.msg('图片大小不能超过2M');
            //     return false;
            // }
            if(!/image\/\w+/.test(simpleFile.type)) {
                layer.msg('请选择图片类型的文件');
                // var obj = document.getElementById('image');
                // obj.value = '';
                // return false;
            }
            var reader = new FileReader();
            // 将文件以Data URL形式进行读入页面
            reader.readAsDataURL(simpleFile);
            reader.onload = function(e){
                $('#imageBtn').before('<li class="mui-table-view-cell mui-media mui-col-xs-4"><a href="#"><img class="mui-media-object" src="'+this.result+'"></a></li>');
                // $('#open').append($("#image").clone());
                // $('#open input[type="file"]:last').removeAttr('id');

                // var obj = document.getElementById('image');
                // obj.value = '';
                // return false;
            }
        }
    }

    function btnClick() {
        window.imageurl = '';
        window.correct = 0;

        var content = $('#textarea').val().trim();
        content = content.split('\n').join('<br />');
        if (!content) {
            layer.msg('请留下进化论', {time: 1000});
            return false;
        }
        
        var length = $('#open #image')[0].files;

        if (length == 0) {
            layer.msg('至少上传一张图片', {time: 1000});
            return false;
        }


        $('#newMomentForm')[0].submit();
        // $('#open input[type="file"]:gt(0)').each(function(){
        //     console.log(2);
        //     var file = $(this).files[0];
        //     upload(file, length);
        // })

        // var docFiles = document.getElementsByClassName('fileBtn');

        // for (var i = 1 ;i < docFiles.length; i++) {
        //     console.log(docFiles[i].files[0]);
        //     upload(docFiles[i].files[0], docFiles.length-1);
        // }
    }

    // function upload(file, length){
    //     var formData = new FormData();
    //     formData.append("image", file);
    //     // console.log(i);
    //     $.ajax({
    //         url: "/index/moment/upload",
    //         type: 'post',
    //         cache: false,
    //         data: formData,
    //         processData: false,
    //         contentType: false,
    //         success: function(data) {
    //             if (data == 1) {
    //                 //文件大小
    //                 layer.msg('有文件大小超过1兆，上传失败。');
    //             } else if (data == 2) {
    //                 layer.msg('有文件不是图片，上传失败');
    //             } else if (data == 3) {
    //                 layer.msg('有文件上传失败，请重新上传');
    //             } else {
    //                 window.imageurl = '' + window.imageurl + data + ',';
    //                 window.correct++;
    //             }

    //             if (window.correct == length) {
    //                 //将文件信息存到input中
    //                 // $('#images').val();
    //                 // $('#NewsForm')[0].submit();
    //                 // return true;
    //                 console.log('全部上传完成');
    //                 window.imageurl = window.imageurl.substr(0, window.imageurl.length-1);
    //                 $.ajax({
    //                     //将说说内容和图片全部上传，则说说发布
    //                     url: "/index/moment/newMoment",
    //                     data: {
    //                         content: $('#textarea').val().trim(),
    //                         images: window.imageurl
    //                     },
    //                     type: 'post',
    //                     dataType: 'json',
    //                     success: function(data) {
    //                         if (data.errcode == 0) {
    //                             $('#open').css({'zIndex': 0}).animate({'top': window.height}, 400);
    //                             layer.msg('说说发布成功', {time: 1200});

    //                             var img = eval('('+data.img+')');

    //                             //列表添加一条新数据
    //                             $('#momentList').prepend('<li class="mui-table-view-cell mui-media"> <a class="mui-navigate-right" style="text-decoration: none;cursor:pointer;" href="'+murl+data.moment_id+'"> <img class="mui-media-object mui-pull-left" src="'+img[0]+'"> <div class="mui-media-body"> <span style="font-size: 0.8em;">'+data.add_ts+'</span> <p class="mui-ellipsis">'+data.content+'</p> </div> </a> </li>');

    //                             //清空表单信息
    //                             $('#textarea').val('');
    //                             $('input[type="file"]:gt(0)').remove();
    //                             var obj = document.getElementById('image');
    //                             obj.value = '';
    //                             $('#imageBtn').siblings().remove();
    //                         }
    //                     }
    //                 })
    //             }
    //         },
    //         error: function(res) {
    //             layer.msg('有文件上传失败，请重新发布');
    //             window.imageurl = '';
    //         }
    //     });
    // }

        $(function(){
            $('.moments').each(function(){
                var that = $(this);
                $(this).longPress(function(){
                //删除
                    var mid = that.attr('mid');
                    var content = that.find('.mui-ellipsis').html();
                    layer.confirm('将要删除说说<p>'+content+'</p>', {
                        btn: ['确认','取消'] //按钮
                    }, function(index){
                        layer.close(index);
                        $.ajax({
                            url: '/index/moment/deleteSelfMoment',
                            data: {
                                mid: mid
                            },
                            dataType: 'json',
                            type: 'post',
                            success: function(data) {
                                if (data.errcode == 0) {
                                    layer.msg('删除成功!', {time: 1000});
                                    that.remove();
                                    layer.close(index);
                                }
                            }
                        });
                    }, function(index){
                        layer.close(index);
                    });
                });
            })
        })
    </script>
    
</body>
</html>

