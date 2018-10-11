@extends('layouts.app')

@section('content')
    <div class="fly-panel fly-panel-user" pad20>
        <div class="layui-tab layui-tab-brief" lay-filter="user">
            <ul class="layui-tab-title">
                <li><a href="{{ route('login') }}">登入</a></li>
                <li class="layui-this">注册</li>
            </ul>
            <div class="layui-form layui-tab-content" style="padding: 20px 0;">
                <div class="layui-tab-item layui-show">
                    <div class="layui-form layui-form-pane">
                        {!! Form::open(['url' => route('register'), 'method' => 'post']) !!}
                            <div class="layui-form-item">
                                {!! Form::label('email' , '邮箱' , ['class' => 'layui-form-label']) !!}
                                <div class="layui-input-inline">
                                    {!! Form::text('email' , old('email') , ['lay-verify' => 'required' , 'autocomplete' => 'off' , 'class' => 'layui-input']) !!}
                                </div>
                                <div class="layui-form-mid layui-word-aux">将会成为您唯一的登入名</div>
                            </div>

                            <div class="layui-form-item">
                                {!! Form::label('name' , '昵称' , ['class' => 'layui-form-label']) !!}
                                <div class="layui-input-inline">
                                    {!! Form::text('name' , old('name') , ['lay-verify' => 'required' , 'autocomplete' => 'off' , 'class' => 'layui-input']) !!}
                                </div>
                            </div>

                            <div class="layui-form-item">
                                {!! Form::label('password' , '密码' , ['class' => 'layui-form-label']) !!}
                                <div class="layui-input-inline">
                                    {!! Form::password('password' , ['lay-verify' => 'required' , 'autocomplete' => 'off' , 'class' => 'layui-input']) !!}
                                </div>
                                <div class="layui-form-mid layui-word-aux">6到16个字符</div>
                            </div>

                            <div class="layui-form-item">
                                {!! Form::label('password_confirmation' , '确认密码' , ['class' => 'layui-form-label']) !!}
                                <div class="layui-input-inline">
                                    {!! Form::password('password_confirmation' , ['lay-verify' => 'required' , 'autocomplete' => 'off' , 'class' => 'layui-input']) !!}
                                </div>
                            </div>

                            <div class="layui-form-item">
                                {!! Form::submit('立即注册', ['class' => 'layui-btn']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
