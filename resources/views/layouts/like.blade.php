@if($user->id != \Auth::id())
    <div class="fly-sns">
        @if(\Auth::user()->hasStar($user->id))
            <a class="layui-btn layui-btn-primary fly-imActive like-button" like-value="1" current-user="{{ \Auth::id() }}" like-user="{{ $user->id }}">加为好友</a>
        @else
            <a class="layui-btn layui-btn-primary fly-imActive like-button" like-value="0" current-user="{{ \Auth::id() }}" like-user="{{ $user->id }}">取消关注</a>
        @endif
    </div>
@endif