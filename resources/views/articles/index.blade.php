@extends('layout.app')

@section('content')
    <!-- Main -->
    <div id="main">
        <!-- Intro -->
        <section id="intro" style="text-align: center;">
            <a href="#" class="logo"><img src="/images/logo.jpg" alt="" /></a>
            <header>
                <h2 style="text-indent: 10px">YTY</h2>
                <p style="text-indent: 10px">每天都过得像样子</p>
            </header>
        </section>
        <!-- Post -->
        @foreach($list as $k => $value)
            <article class="post">
                <header>
                    <div class="title">
                        <h2><a href="{{ route('articles.show', $value->id) }}">{{ $value->title }}</a></h2>
                        <p>{{ $value->description }}</p>
                    </div>
                    <div class="meta">
                        <time class="published" datetime="2015-11-01">{{ $value->created_at }}</time>
                        <a href="{{ route('index', $k) }}" class="author"><span class="name">{{ $value->type_1 }}</span><img src="images/avatar.jpg" style="" alt="" /></a>
                    </div>
                </header>
                {{--<a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>--}}
                <div style="height: 200px;overflow:hidden;margin-bottom: 30px">
                    <p>{!! $value->body !!}</p>
                </div>
                <footer>
                    <ul class="actions">
                        <li><a href="{{ route('articles.show', $value->id) }}" class="button big">原 文</a></li>
                    </ul>
                    <ul class="stats">
                        <li><a href="{{ route('index', $value->type2) }}">{{ $value->type_2 }}</a></li>
                        <li><a href="#" class="icon fa-heart">{{ $value->thumbs_up }}</a></li>
                        {{--<li><a href="#" class="icon fa-comment">128</a></li>--}}
                    </ul>
                </footer>
            </article>
        @endforeach
    <!-- Pagination -->
        {{--{!! $list->render() !!}--}}
        <ul class="actions pagination">
            <li><a href="{{ Request::url() }}?page={{ $prePage }}" class="{{ $prePage?'':'disabled' }} button big previous">Previous Page</a></li>
            <li><a href="{{ Request::url() }}?page={{ $nextPage }}" class="{{ $nextPage?'':'disabled' }} button big next">Next Page</a></li>
        </ul>

    </div>

    {{--@include('layout.sidebar')--}}
@stop