@extends('layouts.app')

@section('content')
    <div class="fly-panel" pad20 style="padding-top: 5px;">
        <div class="layui-form layui-form-pane">
            <div class="layui-tab layui-tab-brief">
                <ul class="layui-tab-title">
                    <li class="layui-this">发表新帖</li>
                </ul>
                <div class="layui-form layui-tab-content" style="padding: 20px 0;">
                    <div class="layui-tab-item layui-show">
                        {!! Form::open(['url' => route('post.store'), 'method' => 'post']) !!}
                            <div class="layui-form-item">
                                {!! Form::label('title', '标题', ['class' => 'layui-form-label']) !!}
                                <div class="layui-input-block">
                                    {!! Form::text('title' , old('title') , ['lay-verify' => 'required' , 'autocomplete' => 'off' , 'class' => 'layui-input']) !!}
                                </div>
                            </div>

                            <div class="layui-form-item">
                                {!! Form::label('topic', '所在专栏', ['class' => 'layui-form-label']) !!}
                                <div class="layui-input-block">
                                    <select name="topic" xm-select="layui_select" lay-verify="required" xm-select-search="{{ route('api.topics') }}" xm-select-create="">
                                        {{--@foreach($topics as $topic)
                                            <option value="{{ $topic->id }}" {{ in_array($topic->id, explode(',', old('topic'))) ? 'selected=selected' : ''}}>{{ $topic->name }}</option>
                                        @endforeach--}}
                                    </select>
                                </div>
                            </div>

                            <div class="layui-form-item layui-form-text">
                                <div class="layui-input-block">
                                    {!! Form::text('content' , old('content') , ['lay-verify' => 'required', 'placeholder' => "详细描述", 'class' => 'layui-textarea fly-editor', 'style' => 'height:260px', 'id' => 'L_content']) !!}
                                </div>
                            </div>

                            <div class="layui-form-item">
                                {!! Form::submit('立即发布', ['class' => 'layui-btn']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection