<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>后台管理</title>
    <link rel="stylesheet" href="{{ URL::asset('static/admin/plugins/layui/css/layui.css') }}" media="all" />
    <link rel="stylesheet" href="{{ URL::asset('static/admin/plugins/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('static/admin/css/layout.css') }}" media="all" />
    <link rel="stylesheet" href="{{ URL::asset('static/admin/css/global.css') }}" media="all" />
    <script src="{{ URL::asset('static/admin/plugins/layui/layui.js') }} "></script>
    <script src="{{ URL::asset('static/admin/js/layout.js') }} "></script>
    <script type="text/javascript" src="{{ URL::asset('static/admin/js/jquery-3.2.0.min.js') }}"></script>
    @yield('style')
</head>

<body>
<div class="layui-layout layui-layout-admin beg-layout-container">
    @yield('content')
</div>
</body>
</html>