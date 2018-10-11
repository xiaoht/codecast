@extends('layouts.app')

@section('content')
    <div class="fly-panel fly-panel-user" pad20>
        <div class="layui-tab layui-tab-brief" lay-filter="user">
            <ul class="layui-tab-title">
                <li class="layui-this">登入</li>
                <li><a href="{{ route('register') }}">注册</a></li>
            </ul>
            <div class="layui-form layui-tab-content" style="padding: 20px 0;">
                <div class="layui-tab-item layui-show">
                    <div class="layui-form layui-form-pane">
                        {!! Form::open(['url' => route('login'), 'method' => 'post']) !!}
                            <div class="layui-form-item">
                                {!! Form::label('email' , '邮箱' , ['class' => 'layui-form-label']) !!}
                                <div class="layui-input-inline">
                                    {!! Form::text('email' , old('email') , ['lay-verify' => 'required' , 'autocomplete' => 'off' , 'class' => 'layui-input']) !!}
                                </div>
                            </div>

                            <div class="layui-form-item">
                                {!! Form::label('password' , '密码' , ['class' => 'layui-form-label']) !!}
                                <div class="layui-input-inline">
                                    {!! Form::password('password' , ['lay-verify' => 'required' , 'autocomplete' => 'off' , 'class' => 'layui-input']) !!}
                                </div>
                            </div>

                            <div class="layui-form-item">
                                {!! Form::label('remember' , '记住我' , ['class' => 'layui-form-label']) !!}
                                <div class="layui-input-inline">
                                    <input type="checkbox" name="remember" lay-skin="switch" lay-text="ON|OFF" {{ old('remember') ? 'checked' : '' }}>
                                </div>
                            </div>

                            <div class="layui-form-item">
                                {!! Form::submit('立即登录', ['class' => 'layui-btn']) !!}
                                <span style="padding-left:20px;">
                                    <a href="{{ route('password.request') }}">忘记密码？</a>
                                </span>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
