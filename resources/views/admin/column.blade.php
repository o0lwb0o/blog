@extends('admin.layouts.master')

@section('content')

    <a href="{{url('admin/column/add')}}" class = " layui-btn site-clumn">
        <i class="layui-icon">&#xe608;</i><span id="title">添加栏目</span>
    </a>
    <table class="layui-table" lay-skin="line">
        <thead>
        <tr>
            <th class='text-center'>ID</th>
            <th class='text-center' width="15%">名称</th>
            <th class='text-center' width="35%">描述</th>
            <th class='text-center' width="25%">操作</th>
        </tr>
        </thead>
        <tbody>

        @if (!empty($list))
            @foreach ($list as $key=>$vo)
                <tr>
                    <td class='text-center'>
                        {{$vo->id}}
                    </td>
                    <td>{{$vo->name}}</td>
                    <td class='text-center'>
                        {{$vo->info}}
                    </td>
                    <td class='text-center nowrap'>
                        <a href="" class = "layui-btn layui-btn-small layui-btn-normal site-clumn" data-index="cz">
                            <i class="layui-icon">&#xe641;</i>
                        </a>
                        <a href="{{url('admin/column/eidt',['id'=>$vo->id])}}" class = "layui-btn layui-btn-small layui-btn-normal site-clumn">
                            <i class="layui-icon">&#xe642;</i><span></span>
                        </a>
                        <a href="{{url('admin/column/del',['id'=>$vo->id])}}" class = "layui-btn layui-btn-small layui-btn-normal">
                            <i class="layui-icon">&#xe640;</i>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@stop
