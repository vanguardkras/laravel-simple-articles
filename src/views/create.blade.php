@extends('articles::admin_layout')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
    <h1>
        @lang('articles::text.create.title')
    </h1>
    <form action="/articles" method="post" enctype=multipart/form-data>
        @csrf
        <div class="form-group">
            <label for="title">
                @lang('articles::text.create.inputs.title')
            </label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="meta">
                @lang('articles::text.create.inputs.meta')
            </label>
            <input type="text" class="form-control" id="meta" name="meta"  value="{{ old('meta') }}">
            <small class="form-text text-muted">
                @lang('articles::text.create.hints.description')
            </small>
        </div>

        <div class="form-group">
            <label for="image">
                @lang('articles::text.create.inputs.image')
            </label>
            <input type="file" class="form-control-file" id="image" name="image" value="{{ old('image') }}" required>
        </div>

        <div class="form-group">
            <label for="text_content">
                @lang('articles::text.create.inputs.text')
            </label>
            <textarea class="form-control" id="text_content" name="text_content" required
            >{{ old('text_content') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">
            @lang('articles::text.create.buttons.save')
        </button>
    </form>
@endsection

@section('js')
    @include('articles::summernote')
@endsection
