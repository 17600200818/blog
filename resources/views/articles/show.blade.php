@extends('layout.app')
@section('body_class', 'signle')
@section('content')
    <!-- Main -->
    <div id="main">

        <!-- Post -->
        <article class="post">
            <header>
                <div class="title">
                    <h2><a href="#">{{ $article->title }}</a></h2>
                    <p>{{ $article->description }}</p>
                </div>
                <div class="meta">
                    <time class="published" datetime="2015-11-01">{{ $article->created_at }}</time>
                    <a href="#" class="author"><span class="name">{{ $article->type_1 }}</span><img src="images/avatar.jpg" alt="" /></a>
                </div>
            </header>
            <span class="image featured"><img src="images/pic01.jpg" alt="" /></span>
            {!! $article->body !!}
            <footer>
                <ul class="stats">
                    <li><a href="#">{{ $article->type_2 }}</a></li>
                    <li><a href="#" class="icon fa-heart">28</a></li>
                    {{--<li><a href="#" class="icon fa-comment">128</a></li>--}}
                </ul>
            </footer>
        </article>

    </div>
@stop