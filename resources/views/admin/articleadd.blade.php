@extends('admin.layouts.master')

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('static/editor/themes/default/default.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('static/editor/plugins/code/prettify.css') }}" />
    <script charset="utf-8" src="{{ URL::asset('static/editor/kindeditor.js') }}"></script>
    <script charset="utf-8" src="{{ URL::asset('static/editor/lang/zh_CN.js') }}"></script>
    <script charset="utf-8" src="{{ URL::asset('static/editor/plugins/code/prettify.js') }}"></script>
    <script>
        KindEditor.ready(function(K) {
            var editor1 = K.create('textarea[name="content"]', {
                    items:[
                        'source', '|', 'undo', 'redo', '|', 'preview','template', 'code', 'cut', 'copy', 'paste',
                        'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                        'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
                        'superscript', 'clearhtml', 'quickformat', 'selectall', '|', '/',
                        'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
                        'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage',
                        'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'pagebreak',
                        'anchor', 'link', 'unlink'
                    ],
                    cssPath : '/static/editor/plugins/code/prettify.css',
                    uploadJson : '',
//            fileManagerJson : '',
                filePostName:"file",
                allowFileManager : true,
                afterCreate : function() {
                var self = this;
                K.ctrl(document, 13, function() {
                    self.sync();
                });
                K.ctrl(self.edit.doc, 13, function() {
                    self.sync();
                });
            }
        });
            prettyPrint();
        });
    </script>
    <form class="layui-form layui-form-pane1" name="example" action="{:url('articlePost')}" method="post">
        <input type="hidden" name="act" value="add">
        <div class="layui-form-item">
            <label class="layui-form-label">所属栏目</label>
            <div class="layui-input-inline">
                <select name="pid" lay-verify="required" lay-search="">
                    <option value="0">请选择</option>
                    @foreach ($list as $key=>$vo)
                    <option value="{{$vo->id}}">{{$vo->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">标题</label>
            <div class="layui-input-inline">
                <input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">关键字</label>
            <div class="layui-input-inline">
                <input type="text" name="keyword" placeholder="请输入关键字" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">列表图</label>
            <div class="site-demo-upbar">
                <input name="file" class="layui-upload-file" id="test" type="file">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"></label>
            <div class="layui-input-inline" id="pics">

            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">摘要</label>
            <div class="layui-input-block">
                <textarea placeholder="请输入摘要" style="width:90%;" name="abstract" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">文章</label>
            <div class="layui-input-block">
            <textarea  name="content"  style="width:90%;height:400px;visibility:hidden;">

            </textarea>
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

            layui.upload({
                    url: '{{url('admin/uplode')}}'
                , elem:'#test' //指定原始元素，默认直接查找class="layui-upload-file"
                , method:'get' //上传接口的http类型
                , ext:'jpg|png|gif'
                , success: function (res) {
                    $('#pic_upload').val(res.urls);
                    var str = '<br /><img style="height: 100px"  src="/uploads/article/' + res.urls + '">';
                    $('#pics').html(str);
                }
            })

        })

     </script>


@stop