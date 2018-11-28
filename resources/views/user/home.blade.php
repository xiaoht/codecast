@extends('layouts.app')

@section('content')
    <div class="fly-panel" pad20 style="padding-top: 5px;">
        <div class="fly-home fly-panel" style="background-image: url();">
            <img src="{{ $user->avatar}}" alt="贤心">
            <h1>
                {{ $user->name}}
            </h1>

            <p class="fly-home-info">
                <i class="iconfont icon-shijian"></i><span>{{ $user->created_at->toDateTimeString() }} 加入</span>
            </p>

            @include('layouts.like', ['user' => $user])

        </div>
        <div class="layui-tab">
            <ul class="layui-tab-title">
                <li class="layui-this">最近文章</li>
                <li>最近评论</li>
                <li>关注列表</li>
                <li>粉丝列表</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <ul class="jie-row">
                        @if($posts)
                            @foreach($posts as $post)
                                <li>
                                    <a href="{{ route('post.show' , [$post]) }}" class="jie-title">{{ $post->title }}</a>
                                    <i>{{ $post->created_at->toDateTimeString() }}</i>
                                    <em class="layui-hide-xs">{{ count($post->comments) }}评/{{ $post->views }}阅/{{ count($post->zans) }}赞</em>
                                </li>
                            @endforeach
                        @else
                            <div class="fly-none" style="min-height: 50px; padding:30px 0; height:auto;"><i style="font-size:14px;">没有发表任何文章</i></div>
                        @endif
                    </ul>
                </div>
                <div class="layui-tab-item">
                    <ul class="home-jieda">
                        @if($comments)
                            @foreach($comments as $comment)
                                <li>
                                    <p>
                                        <span>{{ $comment->created_at->toDateTimeString() }}</span>
                                        在<a href="{{ route('post.show' , [$comment->post]) }}" target="_blank">{{ isset($comment->post->title) ? $comment->post->title : '' }}</a>中评论：
                                    </p>
                                    <div class="home-dacontent">
                                        {!! $comment->content !!}
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <div class="fly-none" style="min-height: 50px; padding:30px 0; height:auto;"><span>没有回答任何评论</span></div>
                        @endif
                    </ul>
                </div>
                <div class="layui-tab-item">
                    <ul class="jie-row">
                        @if($susers)
                            @foreach($susers as $suser)
                                <li>
                                    <a href="{{ route('user.home', [$suser]) }}" class="jie-title">{{ $suser->name }}</a>
                                    <em class="layui-hide-xs">关注: {{ $suser->stars_count }} | 粉丝: {{ $suser->fans_count }} | 文章: {{ $suser->posts_count }} | 评论: {{ $suser->comments_count }}</em>
                                </li>
                            @endforeach
                        @else
                            <div class="fly-none" style="min-height: 50px; padding:30px 0; height:auto;"><span>没有回答任何关注</span></div>
                        @endif
                    </ul>
                </div>
                <div class="layui-tab-item">
                    <ul class="jie-row">
                        @if($fusers)
                            @foreach($fusers as $fuser)
                                <li>
                                    <a href="{{ route('user.home', [$fuser]) }}" class="jie-title">{{ $fuser->name }}</a>
                                    <em class="layui-hide-xs">关注: {{ $fuser->stars_count }} | 粉丝: {{ $fuser->fans_count }} | 文章: {{ $fuser->posts_count }} | 评论: {{ $fuser->comments_count }}</em>
                                </li>
                            @endforeach
                        @else
                            <div class="fly-none" style="min-height: 50px; padding:30px 0; height:auto;"><span>没有回答任何粉丝</span></div>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
