@extends('admin.layouts.master')

@section('content')
    <fieldset class="layui-elem-field">
        <legend>博主信息</legend>
        <div class="layui-field-box">
            <form class="layui-form layui-form-pane" action="">
                <div class="site-demo-upload">
                    <img id="LAY_demo_upload" src="{{URL('static/images/admin/tx.jpg')}}">
                    <div class="site-demo-upbar">
                        <input name="file" class="layui-upload-file" id="test" type="file">
                    </div>
                </div>
                <br />
                <div class="layui-form-item">
                    <label class="layui-form-label">名称</label>
                    <div class="layui-input-inline">
                        <input name="username" class="layui-input" value="{{$list->name}}" type="text"  autocomplete="off" lay-verify="required">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">QQ</label>
                    <div class="layui-input-inline">
                        <input name="username" class="layui-input" value="{{$list->qq}}" type="text" autocomplete="off">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">Email</label>
                    <div class="layui-input-inline">
                        <input name="username" class="layui-input" value="{{$list->email}}" type="text" autocomplete="off" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"></label>
                    <div class="layui-input-inline">
                        <input name="username" class="layui-input" value="{{$list->phone}}" type="text"  autocomplete="off" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"></label>
                    <div class="layui-input-inline">
                        <input name="username" class="layui-input" value="{{$list->education}}" type="text"  autocomplete="off" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">地址</label>
                    <div class="layui-input-inline">
                        <input name="username" class="layui-input" value="{{$list->address}}" type="text" placeholder="请输入" autocomplete="off" lay-verify="required">
                    </div>
                </div>
                <div class="layui-form-item">
                    <button class="layui-btn" lay-filter="sub" lay-submit="">跳转式提交</button>
                </div>
            </form>
        </div>
    </fieldset>
    <script>
        //Demo
        layui.use(['form','upload'], function(){
            var form = layui.form();

            layui.upload({
                url: ''
                ,elem: '#test' //指定原始元素，默认直接查找class="layui-upload-file"
                ,method: 'get' //上传接口的http类型
                ,success: function(res){
                    LAY_demo_upload.src = res.url;
                }
            });

            //监听提交
            form.on('submit(formDemo)', function(data){
                layer.msg(JSON.stringify(data.field));
                return true;
            });
        });
    </script>
@stop