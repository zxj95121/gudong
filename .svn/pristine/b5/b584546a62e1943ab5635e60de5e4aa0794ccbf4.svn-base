/**
 * Created by FanXiyuan on 2017/8/10 0010.
 */
    $(function(){
        var rightDS = document.getElementById('select_student');
        var studentArr=[];
        var student=[];
        var arr1=[];
        var arr2=[];
        var studentName=$(".studentVal");
        for(var i=1;i<studentName.length+1;i++){
            student[i-1]={"text":studentName.eq(i-1).val(),"value":studentName.eq(i-1).val()};
        }
        var _data = [
            arr1,student,arr2
            /*
             [{"text":"00","value":"00"},{"text":"05","value":"05"},{"text":"10","value":"10"}],*/
        ];
        var rightDS_picker = new Picker({
            title: '请选择',
            data: _data
        });
        rightDS_picker.on('picker.select', function (selectedVal, selectedIndex) {
            //console.log(selectedIndex);
           $ ('#select_student').val(_data[1][selectedIndex[1]].value) ;
        });
        rightDS_picker.on('picker.change', function (index, selectedIndex) {
            //console.log(index);
        });
        rightDS_picker.on('picker.valuechange', function (selectedVal, selectedIndex) {
            //console.log(selectedVal);
        });
        rightDS.addEventListener('click', function () {
            $("#pickId").val("select_student");
            rightDS_picker.show();
        });
        })

