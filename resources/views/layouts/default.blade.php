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
    @include('layouts._page_header')
    @include('layouts._page_content')
</div>
</body>
<script src="/js/app.js"></script>
<script src="/js/material-kit.js"></script>
</html>