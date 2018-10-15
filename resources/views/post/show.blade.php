@extends('layouts.app')

@section('content')
    <div class="fly-panel detail-box">
        <h1>{{ $post->title }}</h1>
        <div class="fly-detail-info">
            <span class="layui-badge layui-bg-green fly-detail-column">动态</span>
            <span class="fly-list-nums">
                <a href="#comment"><i class="iconfont" title="回答">&#xe60c;</i> 66</a>
                <i class="iconfont" title="人气">&#xe60b;</i> 99999
            </span>
        </div>
        <div class="detail-about">
            <a class="fly-avatar" href="../user/home.html">
                <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
            </a>
            <div class="fly-detail-user">
                <a href="../user/home.html" class="fly-link">
                    <cite>贤心</cite>
                </a>
                <span>{{ $post->created_at->toDateTimeString() }}</span>
            </div>
            <div class="detail-hits">
                <span class="layui-btn layui-btn-xs jie-admin" type="edit"><a href="{{ route('post.edit', ['id' => $post->id]) }}">编辑此贴</a></span>
            </div>
        </div>
        <div class="detail-body photos">
            {!! $post->content !!}
        </div>
    </div>
@endsection