<div class="row">
    <div class="col-md-12">
        @if (!empty($_route) && !empty($_name))
            {!! LaraLink::link(__($_name), ['route' => $_route, 'btn' => true])  !!}
        @endif
    </div>
</div>
