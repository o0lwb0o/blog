@extends('admin.layouts.master')

@section('content')

    <fieldset class="layui-elem-field">
        <legend>菜单編輯</legend>
        <div class="layui-field-box">
            <form class="layui-form layui-form-pane1" id="theForm" method="post" action="{{ URL::asset('admin/menu/menuPost') }}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="layui-form-item">
                    <label class="layui-form-label">所属目录</label>
                    <div class="layui-input-inline">
                        <input type="text" name="" value="{{$list->pid_title}}"  placeholder="{{$list->pid_title}}" autocomplete="off" disabled class="layui-input">
                    </div>
                </div>
                <input type="hidden" name="id" value="{{$list->id}}">
                <input type="hidden" name="act" value="eidt">
                <div class="layui-form-item">
                    <label class="layui-form-label">名称</label>
                    <div class="layui-input-inline">
                        <input type="text" name="title" value="{{$list->title}}" required  lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">图标</label>
                    <div class="layui-input-inline">
                        <input type="text" name="icon" value="{{$list->icon}}" placeholder="图标代码" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">http://fontawesome.dashgame.com/</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">url</label>
                    <div class="layui-input-block">
                        <input type="text" name="url" value="{{$list->url}}" required  lay-verify="required" placeholder="请输入连接" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">状态</label>
                    <div class="layui-input-block">
                        <input type="checkbox" name="status" lay-skin="switch"  @if ( $list->status==1)checked="checked"@endif lay-text="显示|关闭" value="1">
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