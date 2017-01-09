<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>博客管理 -- 低调君的黑科技实验室</title>
    <link rel="stylesheet" href="/backend/css/all.min.css">
    @yield('external_css')

</head>
<body class="sidebar-collapse @yield('body_style')">
    @yield('content')
</body>
<script src="/backend/js/all.min.js"></script>
@yield('external_scripts')
</html>