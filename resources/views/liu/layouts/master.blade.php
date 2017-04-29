<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('static/liu/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('static/liu/css/nprogress.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('static/liu/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('static/liu/css/font-awesome.min.css')}}">
    <script src="{{ URL::asset('static/liu/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{ URL::asset('static/liu/js/nprogress.js')}}"></script>
    <script src="{{ URL::asset('static/liu/js/jquery.lazyload.min.js')}}"></script>

</head>
<body class="user-select">
<header class="header">
    <nav class="navbar navbar-default" id="navbar">
        <div class="container">
            <div class="header-topbar hidden-xs link-border">
                勤记录 懂分享</div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar" aria-expanded="false"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <h1 class="logo hvr-bounce-in"><a href="/" title="劉文彬的博客">劉文彬的博客</a></h1>
            </div>
            <div class="collapse navbar-collapse" id="header-navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a data-cont="劉文彬博客" title="劉文彬博客" href="/">首页</a></li>
                    <li><a data-cont="相册" title="相册" href="/">相册</a></li>
                    <li><a data-cont="小店" title="小店" href="/">小店</a></li>
                    <li><a data-cont="关于博主" title="关于博主" href="/">关于博主</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
@yield('content')

<footer class="footer">
    <div class="container">
        <p>Copyright &copy; 2017<a target="_blank" href="http://www.liuwb.com">劉文彬</a></p>
    </div>
    <div id="gotop"><a class="gotop"></a></div>
</footer>
<script src="{{ URL::asset('static/liu/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('static/liu/js/jquery.ias.js')}}"></script>
<script src="{{ URL::asset('static/liu/js/scripts.js')}}"></script>
</body>
</html>
