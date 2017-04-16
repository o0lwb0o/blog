<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>登录</title>
    <link rel="stylesheet" href="{{ URL::asset('static/admin/plugins/layui/css/layui.css')}}" media="all" />
    <link rel="stylesheet" href="{{ URL::asset('static/admin/css/login.css')}}" />
</head>

<body class="beg-login-bg">
<div class="beg-login-box">
    <header>
        <h1 style="color: #0C0C0C">后台登录</h1>
    </header>
    <div class="beg-login-main"  style="color: #2F4056">
        <form action="{{ url('admin/loginPost') }}" class="layui-form" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="layui-form-item">
                <label class="beg-login-icon">
                    <i class="layui-icon">&#xe612;</i>
                </label>
                <input type="text" name="name" required lay-verify="userName" autocomplete="off" placeholder="这里输入登录名" class="layui-input">
            </div>
            <div class="layui-form-item">
                <label class="beg-login-icon">
                    <i class="layui-icon">&#xe642;</i>
                </label>
                <input type="password" name="password" required lay-verify="password" autocomplete="off" placeholder="这里输入密码" class="layui-input">
            </div>
            <div  class="layui-form-item">

            </div>
            <div class="layui-form-item">
                <div class="beg-pull-left beg-login-remember">
                    <label>记住帐号？</label>
                    <input type="checkbox" name="rememberMe" value="1" lay-skin="switch" title="记住帐号">
                </div>
                <div class="beg-pull-right">
                    <button class="layui-btn layui-btn-primary" lay-submit lay-filter="login">
                        登录
                    </button>
                </div>
                <div class="beg-clear"></div>
            </div>
        </form>
    </div>
    <footer>
        <p style="color: #0C0C0C">admin © www.liuwb.com</p>
    </footer>
</div>
<script type="text/javascript" src="{{ URL::asset('static/admin/plugins/layui/layui.js')}}"></script>
<script>
    layui.use(['layer', 'form'], function() {
        var layer = layui.layer,
            $ = layui.jquery,
            form = layui.form();

        form.on('submit(login)',function(data){
            return true;
        });
    });
</script>
</body>

</html>