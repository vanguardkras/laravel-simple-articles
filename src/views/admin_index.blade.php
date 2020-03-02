@extends('articles::admin_layout')

@section('content')
    <h1>@lang('articles::text.admin_index.title')</h1>
    <a class="mb-3 btn-primary btn" href="/articles/create">@lang('articles::text.admin_index.buttons.new')</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">@lang('articles::text.admin_index.table.title')</th>
            <th scope="col">@lang('articles::text.admin_index.table.time')</th>
            <th scope="col">@lang('articles::text.admin_index.table.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->created_at }}</td>
                <td class="row">
                    <a class="btn btn-info btn-sm" href="/articles/{{ $article->id }}/edit">
                        @lang('articles::text.admin_index.buttons.edit')
                    </a>
                    <form action="/articles/{{ $article->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm ml-1">
                            @lang('articles::text.admin_index.buttons.delete')
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $articles->links() }}
@endsection

