<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('fly/res/layui/css/layui.css') }}" rel="stylesheet">
    <link href="{{ asset('fly/res/css/global.css') }}" rel="stylesheet">
</head>
<body>

@include('layouts.header')

@include('layouts.nav')


<div class="layui-container">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md8">
            @yield('content')
        </div>

        <div class="layui-col-md4">
            @include('layouts.sidebar')
        </div>
    </div>
</div>

@include('layouts.footer')

<script src="{{ asset('fly/res/layui/layui.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>
@include('layouts.alert')

</body>
</html>
