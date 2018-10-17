@extends('layouts.app')

@section('content')
    <div class="fly-panel detail-box">
        <h1>{{ $post->title }}</h1>
        <div class="fly-detail-info">
            <span class="layui-badge layui-bg-green">{{ $columns[$post->column] }}</span>
            @foreach($post->topics as $topic)
                <span class="layui-badge layui-bg-red">{{ $topic->name }}</span>
            @endforeach
            <span class="fly-list-nums">
                <i class="iconfont" title="人气">&#xe60b;</i> {{ $post->views }}
            </span>
        </div>
        <div class="detail-about">
            <a class="fly-avatar" href="../user/home.html">
                <img src="{{ $post->user->avatar }}" alt="{{ $post->user->name }}">
            </a>
            <div class="fly-detail-user">
                <a href="../user/home.html" class="fly-link">
                    <cite>{{ $post->user->name }}</cite>
                </a>
                <span>{{ $post->created_at->toDateTimeString() }}</span>
            </div>
            <div class="detail-hits">
                @if(Auth::check() && Auth::user()->owns($post))
                    <span class="layui-btn layui-btn-xs jie-admin"><a href="{{ route('post.edit', ['id' => $post->id]) }}">编辑此贴</a></span>
                    <span class="layui-btn layui-btn-xs jie-admin" type="edit" onclick="event.preventDefault();document.getElementById('delete-post').submit();">删除此帖</span>
                    {!! Form::open(['url' => route('post.destroy' , ['id' => $post->id]) , 'method' => 'DELETE ' , 'style' => 'display:none' , 'id' => 'delete-post']) !!}
                        {!! Form::hidden('_method' , 'DELETE') !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
        <div class="detail-body photos">
            {!! $post->content !!}
        </div>
    </div>
@endsection