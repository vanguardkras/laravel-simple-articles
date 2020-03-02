<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
@if(config('app.locale') === 'ru')
    <script src="{{ asset('vendor/articles/lang/summernote-ru-RU.js') }}"></script>
@endif
<script>
    $(document).ready(function () {
        $('#text_content').summernote({
            height: 400,
            @if(config('app.locale') === 'ru')
            lang: 'ru-RU'
            @endif
        });
    });
</script>
