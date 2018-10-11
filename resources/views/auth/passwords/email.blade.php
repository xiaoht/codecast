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
                        {!! Form::submit('发送重置密码邮件', ['class' => 'layui-btn']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
