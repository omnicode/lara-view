
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ isset($_title) ? $_title : config('app.name', 'Laravel') }}</title>

    @include('lara-view::partials.includes.css')
    @foreach(config('lara_view.css') as $css)
        {!! LaraView::css($css) !!}
    @endforeach


</head>
<body>
    {{--<div id="wrapper">--}}

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

            @include('lara-view::partials.components.navbar')

            @include('lara-view::partials.components.sidebar')

        </nav>


        <!-- Page Content -->
    {{--TODO delete--}}
        <div class="container" id="page-wrapper" style="width: 81.5%">

            <div class="content">
                @include('flash::message')

                @yield('content')
            </div>

        </div>

        @include('lara-view::partials.components.footer')
    {{--</div>--}}

    @foreach(config('lara_view.js') as $js)
        {!! LaraView::script($js) !!}
    @endforeach
    @include('lara-view::partials.includes.js')
    @include('lara-view::popups.modals')

</body>
</html>
