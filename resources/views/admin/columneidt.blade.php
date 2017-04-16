@extends('admin.layouts.master')

@section('content')

    <fieldset class="layui-elem-field">
        <legend>欄目添加</legend>
        <div class="layui-field-box">
            <form class="layui-form layui-form-pane1" id="theForm" method="post" action="{{ URL('admin/column/columnPost') }}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
                <input type="hidden" name="act" value="eidt">
                <input type="hidden" name="id" value="{{$list->id}}">
                <div class="layui-form-item">
                    <label class="layui-form-label">名称</label>
                    <div class="layui-input-inline">
                        <input type="text" name="name" value="{{$list->name}}" required  lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">描述</label>
                    <div class="layui-input-inline">
                        <input type="text" name="info" value="{{$list->info}}" placeholder="请输入名称" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
        </div>
    </fieldset>
    <script>
        //Demo
        layui.use('form', function(){
            var form = layui.form();

            //监听提交
            form.on('submit(formDemo)', function(data){
                return true;
            });
        });
    </script>

@stop