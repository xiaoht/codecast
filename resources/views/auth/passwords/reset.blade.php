@extends('layouts.app')

@section('content')
    <div class="fly-panel fly-panel-user" pad20>
        <div class="layui-form layui-tab-content" style="padding: 20px 0;">
            <div class="layui-tab-item layui-show">
                <div class="layui-form layui-form-pane">
                    {!! Form::open(['url' => route('password.email'), 'method' => 'post']) !!}
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
                        <div class="layui-form-mid layui-word-aux">6到16个字符</div>
                    </div>

                    <div class="layui-form-item">
                        {!! Form::label('password_confirmation' , '确认密码' , ['class' => 'layui-form-label']) !!}
                        <div class="layui-input-inline">
                            {!! Form::password('password_confirmation' , ['lay-verify' => 'required' , 'autocomplete' => 'off' , 'class' => 'layui-input']) !!}
                        </div>
                    </div>

                    <div class="layui-form-item">
                        {!! Form::submit('重置密码', ['class' => 'layui-btn']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
