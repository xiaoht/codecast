layui.config({
    base: '/fly/layui-formSelects-master/dist/' //此处路径请自行处理, 可以使用绝对路径
}).extend({
    formSelects: 'formSelects-v4'
});
layui.use(['element', 'form', 'layedit', 'util', 'carousel', 'formSelects', 'layer'], function(){
    var element = layui.element
        , form = layui.form
        , layedit = layui.layedit
        , util = layui.util
        , $ = layui.jquery
        , carousel = layui.carousel
        , formSelects = layui.formSelects;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    layedit.set({
        uploadImage: {
            url: '/post/imageUpload',
            type: 'post'
        }
    });
    layedit.build('L_content',{
        height: 300
    });

    util.fixbar({
        bar1: '&#xe642;'
        ,bgcolor: '#009688'
        ,click: function(type){
            if(type === 'bar1'){
                location.href = '/post/create';
            }
        }
    });

    carousel.render({
        elem: '#home_banner'
        , width: '100%'
        ,arrow: 'always'
        ,height:'360px'
    });

    $('.fly-search').on('click', function(){
        var toke_name = $('meta[name="csrf-token"]').attr('content');
        layer.open({
            type: 1
            ,title: false
            ,closeBtn: false
            //,shade: [0.1, '#fff']
            ,shadeClose: true
            ,maxWidth: 10000
            ,skin: 'fly-layer-search'
            ,content: ['<form action="http://www.haitaostyle.top/post/search" method="post">'
                ,'<input autocomplete="off" placeholder="搜索内容，回车跳转" type="text" name="search">'
                ,'<input type="hidden" name="_token" value="'+toke_name+'">'
                ,'</form>'].join('')
            ,success: function(layero){
                var input = layero.find('input[name="search"]');
                input.focus();

                layero.find('form').submit(function(){
                    var val = input.val();
                    if(val.replace(/\s/g, '') === ''){
                        return false;
                    }
                    input.val(input.val());
                });
            }
        })
    });

    formSelects.btns('layui_select', ['remove']);
    formSelects.maxTips('layui_select', function(id, vals, val, max){
        layer.alert("选超了!!!");
    });

    formSelects.render('layui_select');

    $(".like-button").click(function(event){
        target = $(event.target)
        var current_like = target.attr("like-value");
        var user_id = target.attr("like-user");
        // 已经关注了
        if (current_like == 1) {
            // 取消关注
            $.ajax({
                    url: "/user/" + user_id + "/unfan",
                    method: "POST",
                    //data: {"_token": _token},
                    dataType: "json",
                    success: function(data) {
                        if (data.error != 0) {
                            layer.alert(data.msg);
                            return;
                        }
                        target.attr("like-value", 0);
                        target.text("关注")
                    }
                }
            );
        } else {
            // 取消关注
            $.ajax({
                    url: "/user/" + user_id + "/fan",
                    method: "POST",
                    //data: {"_token": _token},
                    dataType: "json",
                    success: function(data) {
                        if (data.error != 0) {
                            layer.alert(data.msg);
                            return;
                        }
                        target.attr("like-value", 1);
                        target.text("取消关注")
                    }
                }
            );
        }
    });
});