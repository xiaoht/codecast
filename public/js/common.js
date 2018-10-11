layui.use(['element' , 'form' , 'layedit' , 'util' , 'carousel'], function(){
    var element = layui.element
        , form = layui.form
        , layedit = layui.layedit
        , util = layui.util
        , $ = layui.jquery
        , carousel = layui.carousel;
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
});