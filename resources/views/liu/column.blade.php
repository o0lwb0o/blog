@extends('liu.layouts.master')

@section('content')
    <h2 class="about_h">您现在的位置是：<a href="/">首页</a>><a href="1/">慢生活</a></h2>
    <div class="bloglist">
        <div class="newblog">
            <ul>
                <h3><a href="/">程序员应该如何高效的工作学习</a></h3>
                <div class="autor"><span>作者：杨青</span><span>分类：[<a href="/">日记</a>]</span><span>浏览（<a href="/">459</a>）</span><span>评论（<a href="/">30</a>）</span></div>
                <p>对于一个程序员来说，如果正在写代码，写得正high的时候，突然被叫去开会，或者是有客户来了，有了新的想法，要沟通，这时候不得不把写到一半的代码搁在那儿，等客户一走，会一开完，又得花很长的时候来缕清..
                    <a href="/" target="_blank" class="readmore">全文</a>
                </p>
            </ul>
            <figure><img src="__PUBLIC__/static/images/007.jpg" ></figure>
            <div class="dateview">2014-04-08</div>
        </div>
    </div>
    <div class="page">
        <a title="Total record">
            <b><</b>
        </a><b>1</b>
        <a href="/">2</a>
        <a href="/">3</a>
        <a href="/">&gt;</a>
        <a href="/">&gt;&gt;</a>
    </div>
    @stop

    @section('right')


    <div class="tj_news">
        <h2>
            <p class="tj_t1">文章类别</p>
        </h2>
        <ul>
            <li><a href="/">PHP(10)</a></li>
        </ul>
        <h2>
            <p class="tj_t2">最新文章</p>
        </h2>
        <ul>
            <li><a href="/">犯错了怎么办？</a></li>
            <li><a href="/">两只蜗牛艰难又浪漫的一吻</a></li>
            <li><a href="/">春暖花开-走走停停-发现美</a></li>
            <li><a href="/">琰智国际-Nativ for Life官方网站</a></li>
            <li><a href="/">个人博客模板（2014草根寻梦）</a></li>
            <li><a href="/">简单手工纸玫瑰</a></li>
            <li><a href="/">响应式个人博客模板（蓝色清新）</a></li>
            <li><a href="/">蓝色政府（卫生计划生育局）网站</a></li>
        </ul>
    </div>
    <div class="links">
        <!--
        <h2>
            <p>友情链接</p>
        </h2>
        <ul>
            <li><a href="/"></a></li>
            <li><a href="/"></a></li>
        </ul>
        -->
    </div>
@stop