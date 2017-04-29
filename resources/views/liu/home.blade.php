
@extends('liu.layouts.master')

@section('content')

    <section class="container">
        <div class="content-wrap">
            <div class="content">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <pre><p class="text-danger"> 形而上者谓之道，形而下者谓之器。</p></pre>
                    </div>
                </div>
                @if(!empty($list))
                @foreach($list as $v)
                <article class="excerpt">
                    <a class="focus" href="{{url('getinfo',['id'=>$v->id])}}" title="{{$v->title}}" target="_blank" >
                        <img class="thumb" data-original="images/201610181739277776.jpg" src="images/201610181739277776.jpg" alt="{{$v->title}}"  style="display: inline;"></a>
                    <header><a class="cat" href="{{url('column',['id'=>$v->column_id])}}" title="{{$v->column_name}}" >{{$v->column_name}}<i></i></a>
                        <h2><a href="{{url('getinfo',['id'=>$v->id])}}" title="{{$v->title}}" target="_blank" >{{$v->title}}</a>
                        </h2>
                    </header>
                    <p class="meta">
                        <time class="time"><i class="glyphicon glyphicon-time"></i>@if(empty($v->uptime)){{date('Y-m-d',$v->addtime)}}@else{{date('Y-m-d',$v->uptime)}}@endif</time>
                        <span class="views"><i class="glyphicon glyphicon-eye-open"></i> 216</span> <a class="comment" href="##comment" title="评论" target="_blank" ><i class="glyphicon glyphicon-comment"></i> 4</a>
                    </p>
                    <p class="note">{{$v->abstract}}</p>
                </article>
            @endforeach
                @if($page['page']>$page['next'])
                <nav class="pagination" style="display: none;">
                    <ul>
                        <li class="prev-page"></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="?page=2">2</a></li>
                        <li class="next-page"><a href="{{url('/',['page'=>$page['next']])}}">下一页</a></li>
                        <li><span>共 {{$page['page']}} 页</span></li>
                    </ul>
                </nav>
                    @endif
                    @endif
            </div>
        </div>

        <aside class="sidebar">
            <div class="fixed">

                <div class="widget widget_search">
                    <h3>搜一下文章</h3>
                    <form class="navbar-form" action="/Search" method="post">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control" size="35" placeholder="请输入关键字" maxlength="15" autocomplete="off">
                            <span class="input-group-btn">
		                    <button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
		                </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="widget widget_hot">
                <h3>近期文章</h3>
                @if(!empty($list))
                <ul>
                    @foreach($list as $v)
                    <li>
                        <a href="{{url('getinfo',['id'=>$v->id])}}" style="padding-left: 50px;" ><span>{{$v->title}}</span></a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
            {{--<div class="widget widget_hot">--}}
                {{--<h3>文章归档</h3>--}}
                {{--<ul>--}}
                    {{--<li>--}}
                        {{--<a href="#"  style="padding-left: 50px;" >Inbox <span class="badge">42</span></a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            <div class="widget widget_hot">
                <h3>分类目录</h3>
                @if(!empty($list))
                    <ul>
                        @foreach($data as $v)
                            <li>
                                <a href="{{url('column',['id'=>$v->id])}}"  style="padding-left: 50px;" >{{$v->name}} <span class="badge">{{$v->column_nu}}</span></a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            {{--<div class="widget widget_sentence">--}}
                {{--<h3>友情链接</h3>--}}
                {{--<div class="widget-sentence-link">--}}
                    {{--<a href="#" title="网站建设" target="_blank" >网站建设</a>&nbsp;&nbsp;&nbsp;--}}
                {{--</div>--}}
            {{--</div>--}}
        </aside>
    </section>
@stop