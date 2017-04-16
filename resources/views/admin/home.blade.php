@extends('admin.layouts.master')

@section('content')
    <div class="layui-header beg-layout-header">
        <div class="beg-layout-main beg-layout-logo">
            <a href="/" target="_blank">LOGO</a>
        </div>
        <div class="beg-layout-main beg-layout-side-toggle">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <!--一级菜单-->
        <div class="beg-layout-main beg-layout-menu" id="menu">
            <ul class="layui-nav beg-layout-nav" lay-filter="">
                {{--@foreach ($list as $v)--}}
                <li class="layui-nav-item layui-this">
                    <a href="javascript:;" data-module-id="1">
                    </a>
                </li>
                {{--@endforeach--}}
            </ul>
        </div>
        <div class="beg-layout-main beg-layout-panel">
            <ul class="layui-nav beg-layout-nav" lay-filter="user">
                <li class="layui-nav-item">
                    <a href="javascript:;" class="beg-layou-head">
                        <img src="{{ URL('static/images/admin/tx.jpg') }}"  />
                        <span>个人中心</span>
                    </a>
                    <dl class="layui-nav-child">
                        <dd>
                            <a href="javascript:;" data-tab="true" data-url='user.html'>
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                                <cite>个人信息</cite>
                            </a>
                        </dd>
                        <dd>
                            <a href="javascript:;" data-tab="true" data-url="setting.html">
                                <i class="fa fa-gear" aria-hidden="true"></i>
                                <cite>设置</cite>
                            </a>
                        </dd>
                        <dd>
                            <a href="{:url('index/out')}">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                <cite>注销</cite>
                            </a>
                        </dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>
    <div class="layui-side beg-layout-side" id="side" lay-filter="side">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree" lay-filter="test">
                <li class="layui-nav-item">

                </li>
            </ul>
        </div>
    </div>
    <div class="layui-body beg-layout-body">
        <div class="layui-tab layui-tab-brief layout-nav-card" lay-filter="layout-tab" style="border: 0; margin: 0;box-shadow: none; height: 100%;">
            <ul class="layui-tab-title">info
                <li class="layui-this">
                    <a href="javascript:;">
                        <i class="fa fa-dashboard" aria-hidden="true"></i>
                        <cite>控制面板</cite>
                    </a>
                </li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    {{--<iframe src="/admin/blogger"></iframe>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="layui-footer beg-layout-footer">
        <p>2017 &copy;
            <a href="http://admin.liuwb.com/">admin.liuwb.com</a>
        </p>
    </div>
@stop