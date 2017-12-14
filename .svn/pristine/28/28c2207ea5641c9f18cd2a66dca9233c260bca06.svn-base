$(function(){
	 wx.config({
           debug: false,
           appId: '{$appId}', // 必填，公众号的唯一标识
           timestamp:'{$timestamp}', // 必填，生成签名的时间戳
           nonceStr: '{$nonceStr}', // 必填，生成签名的随机串
           signature: '{$signature}',// 必填，签名，见附录1
           jsApiList: ['startRecord','uploadVoice','stopRecord','playVoice'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
       });

       function start(){
           wx.startRecord();
       }
       var localId = null;
       function stop(){
           wx.stopRecord({
               success: function (res) {
                   localId = res.localId;
               }
           });
       }

       function play(){
           wx.playVoice({
               localId: localId // 需要播放的音频的本地ID，由stopRecord接口获得
           });
       }

       function upload(){
           wx.uploadVoice({
               localId: localId, // 需要上传的音频的本地ID，由stopRecord接口获得
               isShowProgressTips: 1,// 默认为1，显示进度提示
               success: function (res) {
                   var serverId = res.serverId; // 返回音频的服务器端ID
               }
           });
       }


       function writeObj(obj){
           var description = "";
           for(var i in obj){
               var property=obj[i];
               description+=i+" = "+property+"\n";
           }
           document.write(description);
       }
	
})
