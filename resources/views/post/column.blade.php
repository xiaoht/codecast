@extends('layouts.app')
@section('content')
    <div class="fly-panel" style="margin-bottom: 0;">

        <div class="fly-panel-title fly-filter">
            <a href="javascript:void(0)" class="layui-this">综合</a>
            <span class="fly-filter-right layui-hide-xs">
            <a href="javascript:void(0)" class="layui-this">按最新</a>
          </span>
        </div>

        <ul class="fly-list">
            @foreach($posts as $post)
                <li>
                    <a href="" class="fly-avatar">
                        <img src="{{ $post->user->avatar }}" alt="{{ $post->user->name}}">
                    </a>
                    <h2>
                        <a class="layui-badge">{{ $columns[$post->column] }}</a>
                        <a href="{{ route('post.show' , [$post]) }}">{!! str_limit($post->title, 70 , '...') !!}</a>
                    </h2>
                    <div class="fly-list-info">
                        <a href="" link>
                            <cite>{{ $post->user->name}}</cite>
                        </a>
                        <span>{{ $post->created_at->diffForHumans() }}</span>
                        <span class="fly-list-nums">
                            <i class="iconfont icon-pinglun1" title="回答"></i> {{ count($post->comments) }}
                            <i class="iconfont" title="人气">&#xe60b;</i> {{ $post->views }}
                            <i class="iconfont icon-zan"></i> {{ count($post->zans) }}
                        </span>
                    </div>
                </li>
            @endforeach
        </ul>
        <div style="text-align: center">
            {{ $posts->links() }}
        </div>

    </div>
@endsection