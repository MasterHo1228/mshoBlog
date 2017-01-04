<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="MasterHo1228">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/material-kit.css">
    <title>@yield('title','木有标题') -- 低调君的黑科技研究室</title>
</head>
<body class="@yield('pageType','')">
@include('layouts._header')
<div class="wrapper">
    <div class="header header-filter" style="background-image: url(@yield('bg_image','/images/city.jpg'));">
        @include('shared.message')
        @if(Request::is('/'))
            @include('static_pages._index_header')
        @endif
    </div>
    @if(!Request::is('/'))
    <div class="main main-raised">
        @yield('content')
    </div>
    @endif
    @include('layouts._footer')
</div>
</body>
<script src="/js/app.js"></script>
<script src="/js/material-kit.js"></script>
</html>