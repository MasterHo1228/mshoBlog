<!DOCTYPE html>
<html>
<head>
    <meta name="author" content="MasterHo1228">
    <link rel="stylesheet" href="/css/app.css">
    <title>@yield('title','木有标题') -- 低调君的黑科技研究室</title>
</head>
<body>
@include('layouts._header')
<div class="container">
    <div class="col-md-offset-1 col-md-10">
        @yield('content')
        @include('layouts._footer')
    </div>
</div>
</body>
<script src="/js/app.js"></script>
</html>