@extends('articles::admin_layout')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
    <h1>
        @lang('articles::text.edit.title')
    </h1>
    <form action="/articles/{{ $article->id }}" method="post" enctype=multipart/form-data>
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">
                @lang('articles::text.create.inputs.title')
            </label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}" required>
        </div>

        <div class="form-group">
            <label for="meta">
                @lang('articles::text.create.inputs.meta')
            </label>
            <input type="text" class="form-control" id="meta" name="meta"  value="{{ $article->meta }}">
        </div>

        <div class="form-group">
            <img style="display: block" class=" w-100 img-thumbnail" src="/storage/{{ $article->image }}" alt="image">
            <input type="file" class="form-control-file" id="image" name="image"  value="{{ $article->title }}">
        </div>

        <div class="form-group">
            <label for="text_content">
                @lang('articles::text.create.inputs.image')
            </label>
            <textarea class="form-control" id="text_content" name="text_content" required
            >{{ $article->text_content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">
            @lang('articles::text.create.buttons.save')
        </button>
    </form>
@endsection

@section('js')
    @include('articles::summernote')
@endsection
