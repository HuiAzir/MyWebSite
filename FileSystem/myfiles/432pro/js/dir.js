//创建目录
$('#createDir').on('click',function () {
    var url = $(this).attr('data-url');
    layer.prompt({
        formType: 0,
        value:'',
        title: '新建目录',
        area: ['200px', '50px'] //自定义文本域宽高
    }, function(value, index){
        //得到用户填写的值后，通过ajax发送请求
        $.ajax({
            url:url+'&dirName='+value,
            type:'GET',
            success:function (data) {
                var obj = JSON.parse(data);
                layer.alert(obj.msg,{icon:obj.icon}, function(index){
                    location.reload();
                    layer.close(index);
                });
            }
        })
        layer.close(index);
    });
})
//创建文件
$('#createFile').on('click',function () {
    var url = $(this).attr('data-url');
    layer.prompt({
        formType: 0,
        value:'',
        title: '新建文件',
        area: ['200px', '50px'] //自定义文本域宽高
    }, function(value, index){
        //得到用户填写的值后，通过ajax发送请求
        $.ajax({
            url:url+'&filename='+value,
            type:'GET',
            success:function (data) {
                var obj = JSON.parse(data);
                layer.alert(obj.msg,{icon:obj.icon}, function(index){
                    location.reload();
                    layer.close(index);
                });
            }
        })
        layer.close(index);
    });
})
//重命名目录
$('.renameDir').on('click',function () {
    var url = $(this).attr('data-url');
    var showName = $(this).attr('data-showName');
    layer.prompt({
        formType: 0,
        value:showName,
        title: '重命名目录',
        area: ['200px', '50px'] //自定义文本域宽高
    }, function(value, index){
        //得到用户填写的值后，通过ajax发送请求
        $.ajax({
            url:url+'&dirName='+value,
            type:'GET',
            success:function (data) {
                var obj = JSON.parse(data);
                layer.alert(obj.msg,{icon:obj.icon}, function(index){
                    location.reload();
                    layer.close(index);
                });
            }
        })
        layer.close(index);
    });
})
//返回上一级
$('#back').on('click',function () {
     window.history.back();
})
//删除
$('.deleteDir').on('click',function () {
    var url = $(this).attr('data-url');
    var showName = $(this).attr('data-showName');
    layer.confirm('确定要删除'+showName+'吗?', {icon: 3, title:'提示',btn:['确认删除','取消']},function(index){
        $.ajax({
            url:url,
            type:'GET',
            success:function (data) {
                var obj = JSON.parse(data);
                layer.alert(obj.msg,{icon:obj.icon}, function(index){
                    location.reload();
                    layer.close(index);
                });
            }
        })
        layer.close(index);
    },function () {
        layer.msg('删除文件要三思...',{time:2000});
    });
})