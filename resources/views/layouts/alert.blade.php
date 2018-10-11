<script>
    layui.use(['layer'], function(){
        var layer = layui.layer;
        @if (count($errors) > 0)
        layer.alert('{{ $errors->all()[0] }}');
        @endif
        @if (session('status'))
        layer.alert('{{ session('status') }}');
        @endif
    });
</script>