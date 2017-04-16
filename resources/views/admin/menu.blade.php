@extends('admin.layouts.master')

@section('content')
    <ul id="menu"></ul>
    <script>
        layui.use(['tree', 'layer'], function(){
            var layer = layui.layer
                ,$ = layui.jquery;
            layui.tree({
                elem: '#menu' //传入元素选择器
                ,nodes: [
                        @foreach ($list as $key=>$vo)
                    { //节点
                        name:hetHtml("{{$vo['title']}}","{{$vo['id']}}")
                        ,spread:true,
                        @if (!empty($vo['sub']))
                        children: [
                                @foreach ($vo['sub'] as $k=>$v)
                            {
                                name:hetHtml("{{$v['title']}}","{{$v['id']}}")
                                @if (!empty($v['sub']))
                                ,children: [
                                    @foreach ($v['sub'] as $ka=>$va)
                                    {
                                    name: hetHtml("{{$va['title']}}","{{$va['id']}}")
                                    @if (!empty($va['sub']))
                                    ,children: [
                                        @foreach ($va['sub'] as $kd=>$vd)
                                    {
                                        name: '{{$vd['title']}}'
                                    },
                                    @endforeach
                                ]
                                    @endif
                                    },
                                    @endforeach
                                ]
                                @endif
                            },
                                @endforeach
                        ]
                        @endif
                    },
                        @endforeach
                ]
            });

            function hetHtml(name,id) {
                var str = name+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="layui-btn-group">'
                str += '<a class="layui-btn layui-btn-primary layui-btn-small" href="{{ URL::asset('admin/menu/add') }}/'+id+'">'
                str +='<i class="layui-icon">&#xe654;</i>'
                str +='</a>'
                str +='<a class="layui-btn layui-btn-primary layui-btn-small" href="{{ URL::asset('admin/menu/eidt') }}/'+id+'">'
                str +='<i class="layui-icon">&#xe642;</i>'
                str +='</a>'
                str +='<a class="layui-btn layui-btn-primary layui-btn-small" href="{{ URL::asset('admin/menu/del') }}/'+id+'">'
                str += '<i class="layui-icon">&#xe640;</i>'
                str += '</a></div>'
                return str;
            }
        });
    </script>
@stop