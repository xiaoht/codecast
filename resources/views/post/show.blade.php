@extends('layouts.app')

@section('content')
    <div class="fly-panel detail-box">
        <h1>{{ $post->title }}</h1>
        <div class="fly-detail-info">
            <span class="layui-badge layui-bg-blue">{{ $columns[$post->column] }}</span>
            @foreach($post->topics as $topic)
                <span class="layui-badge layui-bg-red">{{ $topic->name }}</span>
            @endforeach
            <span class="fly-list-nums">
                <i class="iconfont" title="回答">&#xe60c;</i> {{ count($post->comments) }}
                <i class="iconfont" title="人气">&#xe60b;</i> {{ $post->views }}
                <span class="jieda-zan" type="zan">
                    <i class="iconfont icon-zan"></i>{{ count($post->zans) }}
                </span>
            </span>
        </div>
        <div class="detail-about">
            <a class="fly-avatar" href="../user/home.html">
                <img src="{{ $post->user->avatar }}" alt="{{ $post->user->name }}">
            </a>
            <div class="fly-detail-user">
                <a href="{{ route('user.home', [$post->user]) }}" class="fly-link">
                    <cite>{{ $post->user->name }}</cite>
                </a>
                <span>{{ $post->created_at->toDateTimeString() }}</span>
            </div>
            <div class="detail-hits">
                @if($post->zan(\Auth::id())->exists())
                    <span class="jieda-zan zanok">
                        <a href="{{ route('post.unzan' , ['post_id' => $post->id])}}" class="iconfont icon-zan">
                            <em>取消关注！</em>
                        </a>
                    </span>
                @else
                    <span class="jieda-zan">
                        <a href="{{ route('post.zan' , ['post_id' => $post->id])}}" class="iconfont icon-zan">
                            <em>关注收藏！</em>
                        </a>
                    </span>
                @endif
                @can('update', $post)
                    <span class="layui-btn layui-btn-xs jie-admin"><a href="{{ route('post.edit', ['id' => $post->id]) }}">编辑此贴</a></span>
                @endcan
                @can('delete', $post)
                    <span class="layui-btn layui-btn-xs jie-admin" type="edit" onclick="event.preventDefault();document.getElementById('delete-post').submit();">删除此帖</span>
                    {!! Form::open(['url' => route('post.destroy' , ['id' => $post->id]) , 'method' => 'DELETE ' , 'style' => 'display:none' , 'id' => 'delete-post']) !!}
                        {!! Form::hidden('_method' , 'DELETE') !!}
                    {!! Form::close() !!}
                @endcan
            </div>
        </div>
        <div class="detail-body photos">
            {!! $post->content !!}
        </div>
    </div>
    <div class="fly-panel detail-box" id="flyReply">
        <fieldset class="layui-elem-field layui-field-title" style="text-align: center;">
            <legend>回帖</legend>
        </fieldset>

        @guest
            <a href="{{ route('login') }}" class="layui-btn layui-btn-fluid" style="width: 100%">快去登陆评论吧！！！</a>
        @else
            <div class="layui-form layui-form-pane">
            {!! Form::open(['url' => route('post.comment', ['post_id' => $post->id]), 'method' => 'post']) !!}
                <div class="layui-form-item layui-form-text">
                    <div class="layui-input-block">
                        {!! Form::text('content' , old('content') , ['lay-verify' => 'required', 'placeholder' => "详细描述", 'class' => 'layui-textarea fly-editor', 'style' => 'height:260px', 'id' => 'L_content']) !!}
                    </div>
                </div>
                <div class="layui-form-item">
                    {!! Form::submit('提交回复', ['class' => 'layui-btn']) !!}
                </div>
            {!! Form::close() !!}
        </div>
        @endguest

        <ul class="jieda" id="jieda">
            @foreach($post->comments as $comment)
                <li>
                    <div class="detail-about detail-about-reply">
                        <a class="fly-avatar" href="">
                            <img src="{{ $comment->user->avatar }}" alt=" ">
                        </a>
                        <div class="fly-detail-user">
                            <a href="" class="fly-link">
                                <cite>{{ $comment->user->name }}</cite>
                            </a>
                        </div>

                        <div class="detail-hits">
                            <span>{{ $comment->created_at->toDateTimeString() }}</span>
                        </div>
                    </div>
                    <div class="detail-body jieda-body photos">
                        <p>{!! $comment->content !!}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection