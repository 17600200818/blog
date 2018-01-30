@extends('layout.app')

@section('content')
    <!-- Main -->
    <div id="main">

        <!-- Post -->
        @foreach($list as $value)
            <article class="post">
                <header>
                    <div class="title">
                        <h2><a href="#">{{ $value->title }}</a></h2>
                        <p>{{ $value->description }}</p>
                    </div>
                    <div class="meta">
                        <time class="published" datetime="2015-11-01">{{ $value->created_at }}</time>
                        <a href="#" class="author"><span class="name">{{ $value->type1 }}</span><img src="images/avatar.jpg" alt="" /></a>
                    </div>
                </header>
                <a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>
                <p>{{ $value->body }}</p>
                <footer>
                    <ul class="actions">
                        <li><a href="{{ route('articles.show', $value->id) }}" class="button big">Continue Reading</a></li>
                    </ul>
                    <ul class="stats">
                        <li><a href="#">{{ $value->type2 }}</a></li>
                        <li><a href="#" class="icon fa-heart">28</a></li>
                        <li><a href="#" class="icon fa-comment">128</a></li>
                    </ul>
                </footer>
            </article>
        @endforeach
    <!-- Pagination -->
        {{--{!! $list->render() !!}--}}
        <ul class="actions pagination">
            <li><a href="http://blog.heixiuheixiu.cn/?page={{ $prePage }}" class="{{ $prePage?'':'disabled' }} button big previous">Previous Page</a></li>
            <li><a href="http://blog.heixiuheixiu.cn/?page={{ $nextPage }}" class="{{ $nextPage?'':'disabled' }} button big next">Next Page</a></li>
        </ul>

    </div>

    @include('layout.sidebar')
@stop