@extends('layout.app')
@section('body_class', 'signle')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
@stop
@section('scripts')
    <script type="text/javascript"  src="{{ asset('js/module.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/hotkeys.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/uploader.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/simditor.js') }}"></script>

    <script>
        $(document).ready(function(){
            var editor = new Simditor({
                textarea: $('#editor'),
                upload: {
                    url: '{{ route('articles.upload_image') }}',
                    params: { _token: '{{ csrf_token() }}' },
                    fileKey: 'upload_file',
                    connectionCount: 3,
                    leaveConfirm: '文件上传中，关闭此页面将取消上传。'
                },
                pasteImage: true,
            });
        });
    </script>

@stop
@section('content')
    <!-- Main -->
    <div id="main">

        <!-- Post -->
        <article class="post">
            <section>
                <h3>Form</h3>
                <form method="POST" action="{{ route('articles.store') }}" accept-charset="UTF-8">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row uniform">
                        <div class="12u$">
                            <input type="text" name="title" id="demo-name" value="{{ old('title') }}" placeholder="标题" />
                        </div>
                        <div class="12u$">
                            <ul class="actions fit">
                                <li>
                                    <select name="type1" id="demo-category">
                                        @foreach(config('app.type') as $k => $v)
                                            <option value="{{ $k }}">{{ $v['name'] }}</option>
                                        @endforeach
                                    </select>
                                </li>
                                <li>
                                    <select name="type2" id="demo-category">
                                        @foreach(config('app.type') as $k => $v)
                                            @foreach($v['children'] as $kk => $vv)
                                                <option value="{{ $kk }}">{{ $vv }}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </li>
                                <li>
                                    <select name="is_good" id="demo-category">
                                        <option value="0">normal</option>
                                        <option value="1">good</option>
                                    </select>
                                </li>

                            </ul>
                        </div>

                        <div class="12u$">
                            <textarea name="description" placeholder="文章简介" rows="6">{{ old('description') }}</textarea>
                        </div>
                        <div class="12u$">
                            <textarea name="body" class="form-control" id="editor" rows="3" placeholder="内容" required>{{ old('body') }}</textarea>
                        </div>
                        <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" value="create" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </section>
        </article>

    </div>
@stop