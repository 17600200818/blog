@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-edit"></i> Article /
                    @if($article->id)
                        Edit #{{$article->id}}
                    @else
                        Create
                    @endif
                </h1>
            </div>

            @include('common.error')

            <div class="panel-body">
                @if($article->id)
                    <form action="{{ route('articles.update', $article->id) }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{ route('articles.store') }}" method="POST" accept-charset="UTF-8">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    
                <div class="form-group">
                	<label for="title-field">Title</label>
                	<input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $article->title ) }}" />
                </div> 
                <div class="form-group">
                    <label for="type_id-field">Type_id</label>
                    <input class="form-control" type="text" name="type_id" id="type_id-field" value="{{ old('type_id', $article->type_id ) }}" />
                </div> 
                <div class="form-group">
                	<label for="description-field">Description</label>
                	<input class="form-control" type="text" name="description" id="description-field" value="{{ old('description', $article->description ) }}" />
                </div> 
                <div class="form-group">
                	<label for="images-field">Images</label>
                	<input class="form-control" type="text" name="images" id="images-field" value="{{ old('images', $article->images ) }}" />
                </div> 
                <div class="form-group">
                    <label for="thumbs_up-field">Thumbs_up</label>
                    <input class="form-control" type="text" name="thumbs_up" id="thumbs_up-field" value="{{ old('thumbs_up', $article->thumbs_up ) }}" />
                </div>

                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-link pull-right" href="{{ route('articles.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection