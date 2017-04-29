@extends('admin.layouts.master')

@section('content')
    @include('editor::head')
    <form class="layui-form layui-form-pane1" name="example" action="{{url('admin/article/articlePost')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="act" value="eidt">
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="layui-form-item">
            <label class="layui-form-label">所属栏目</label>
            <div class="layui-input-block">
                <select name="pid" lay-verify="required" lay-search="">
                    <option value="0">请选择</option>
                    @foreach ($list as $key=>$vo)
                        <option @if($data->column_id == $vo->id) selected @endif value="{{$vo->id}}">{{$vo->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">标题</label>
            <div class="layui-input-block">
                <input type="text" name="title" value="{{$data->title}}" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">关键字</label>
            <div class="layui-input-block">
                <input type="text" name="keyword" value="{{$data->keyword}}" placeholder="请输入关键字" autocomplete="off" class="layui-input">
            </div>
        </div>
        {{--<div class="layui-form-item">--}}
        {{--<label class="layui-form-label">列表图</label>--}}
        {{--<div class="layui-input-block">--}}
        {{--<input name="file" class="layui-upload-file" id="test" type="file">--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="layui-form-item">--}}
        {{--<label class="layui-form-label"></label>--}}
        {{--<div class="layui-input-inline" id="pics">--}}

        {{--</div>--}}
        {{--</div>--}}
        <div class="layui-form-item">
            <label class="layui-form-label">摘要</label>
            <div class="layui-input-block">
                <textarea placeholder="请输入摘要" style="width:55%;" name="abstract" class="layui-textarea">{{$data->abstract}}</textarea>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">文章</label>
            <div class="layui-input-block editor">
                <textarea  name="content"  id='myEditor' >{{$data->content}}</textarea>
            </div>
        </div>
        <input type="hidden" name="pic" value="" id="pic_upload">
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
    <script>

        layui.use(['form','tab','layer','upload'], function() {
            var form = layui.form(),
                $ = layui.jquery,
                layer = layui.layer
                , laydate = layui.laydate;

            {{--layui.upload({--}}
                {{--url: '{{url('admin/uploads')}}'--}}
                {{--, elem:'#test' //指定原始元素，默认直接查找class="layui-upload-file"--}}
                {{--, method:'post' //上传接口的http类型--}}
                {{--, ext:'jpg|png|gif'--}}
                {{--, success: function (res) {--}}
                    {{--$('#pic_upload').val(res.urls);--}}
                    {{--var str = '<br /><img style="height: 100px"  src="/uploads/article/' + res.urls + '">';--}}
                    {{--$('#pics').html(str);--}}
                {{--}--}}
            {{--})--}}

        })

    </script>


@stop