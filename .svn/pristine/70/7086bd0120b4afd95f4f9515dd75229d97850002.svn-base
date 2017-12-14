/**
 * Created by FanXiyuan on 2017/8/10 0010.
 */
    $(function(){
        var rightDS = document.getElementById('arriveTime');
        var month=[];
        var day=[];
        var hour=[];
        for(var i=1;i<=12;i++){
            if(i<10){
                month[i-1]={"text":"0"+i,"value":"0"+i};
            }
            else{
                month[i-1]={"text":i,"value":i};
            }
        }
        for(var i=1;i<=31;i++){
            if(i<10){
                day[i-1]={"text":"0"+i,"value":"0"+i};
            }
            else{
                day[i-1]={"text":i,"value":i};
            }
        }
        for(var i=1;i<=24;i++){
            if(i<10){
                hour[i-1]={"text":"0"+i,"value":"0"+i};
            }
            else{
                hour[i-1]={"text":i,"value":i};
            }
        }
        var _data = [
            month,day,hour
            /*
             [{"text":"00","value":"00"},{"text":"05","value":"05"},{"text":"10","value":"10"}],*/
        ];
        var rightDS_picker = new Picker({
            title: '请选择',
            data: _data
        });
        rightDS_picker.on('picker.select', function (selectedVal, selectedIndex) {
            //console.log(selectedIndex);
            $("#arriveTime").val(_data[0][selectedIndex[0]].value + '-'+ _data[1][selectedIndex[1]].value + '-' + _data[2][selectedIndex[2]].value);
        });
        rightDS_picker.on('picker.change', function (index, selectedIndex) {
            //console.log(index);
        });
        rightDS_picker.on('picker.valuechange', function (selectedVal, selectedIndex) {
            //console.log(selectedVal);
        });
        rightDS.addEventListener('click', function () {
            rightDS_picker.show();
        });
        })

