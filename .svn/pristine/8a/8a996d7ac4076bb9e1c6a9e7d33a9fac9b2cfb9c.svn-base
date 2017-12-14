/**
 * Created by FanXiyuan on 2017/8/10 0010.
 */
    $(function(){
        var rightDS = document.getElementById('select_subject');
        var subjectArr=[];
        var subject=[];
        subjectArr = $("#subjectVal").val().split(',');
        var arr1=[];
        var arr2=[];
        for(var i=1;i<subjectArr.length+1;i++){
            subject[i-1]={"text":subjectArr[i-1],"value":subjectArr[i-1]};
        }
        var _data = [
            arr1,subject,arr2
            /*
             [{"text":"00","value":"00"},{"text":"05","value":"05"},{"text":"10","value":"10"}],*/
        ];
        var rightDS_picker = new Picker({
            title: '请选择',
            data: _data
        });
        rightDS_picker.on('picker.select', function (selectedVal, selectedIndex) {
            //console.log(selectedIndex);
            $("#select_subject").val(_data[1][selectedIndex[1]].value)
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

