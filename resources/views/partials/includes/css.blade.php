@foreach(config('lara_view.css') as $css)
    {!! LaraView::css($css) !!}
@endforeach