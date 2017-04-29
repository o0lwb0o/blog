@extends('admin.layouts.master')

@section('content')
    <a href="{{url('admin/article/add')}}" class = " layui-btn site-article">
        <i class="layui-icon">&#xe608;</i><span id="title">添加文章</span>
    </a>
    <table class="layui-table" lay-even="" lay-skin="nob">
        <thead>
        <tr>
            <th class='text-center'>内容</th>
            <th class='text-center' width="15%">操作</th>
        </tr>
        </thead>
        <tbody>
        @if (!empty($list))
            @foreach ($list as $key=>$vo)
            <tr>
                <td class='text-center'>
                    <fieldset class="layui-elem-field">
                        <legend>{{$vo->title}}</legend>
                        <div class="layui-field-box">
                            <div class="pull-left layui-inline">
                                @if (!empty( $vo->title_pic))
                                <img style="height: 60px" src="/uploads/article/{{$vo->title_pic}}" class="layui-circle">
                                @else
                                <img style="height: 60px" src="/static/images/admin/timg.jpg" class="layui-circle">
                                @endif
                            </div>
                            <div class="pull-left">
                                {{$vo->abstract}}
                            </div>
                        </div>
                        </div>
                    </fieldset>

                </td>
                <td class='text-center nowrap'>
                    <a class="layui-btn layui-btn-small layui-btn-normal" target="_blank" href="{{url('article/index',array('tid'=>$vo->id))}}"><i class="layui-icon">&#xe641;</i></a>
                    <a class="layui-btn layui-btn-small layui-btn-normal" href="{{url('admin/article/eidt',['id'=>$vo->id])}}"><i class="layui-icon">&#xe642;</i></a>
                    <a class="layui-btn layui-btn-small layui-btn-normal" href="javascript:delcfm({{$vo->id}});"><i class="layui-icon">&#xe640;</i></a>
                </td>
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div id="page" class="pull-right"></div>
    <script>
        function delcfm(id) {
            if (confirm("确认要删除？")) {
                window.location.href="{{url('admin/article/del',['id'=>"+id+"])}}";
            }
        }
        layui.use(['laypage', 'layer'], function(){
            var laypage = layui.laypage
                ,layer = layui.layer;
            laypage({
                cont: 'page'
                ,pages: '2'
                ,curr:'1'
                ,skin: '#1E9FFF'
                ,jump: function(obj, first){
                    if (first) {}else {
                        //得到了当前页，用于向服务端请求对应数据
//                        var url = '{:url('index','',false)}/last/' + obj.curr
                        window.location.href=url;
                    }
                }
            });

        });
    </script>



@stop