@foreach(config('lara_view.js') as $js)
    {!! LaraView::script($js) !!}
@endforeach
