<div class="row">
    <div class="col-md-6">
        @if (ACL::check($route))
            <div class="add">
                @php
                    $addText = isset($name) ? __('Add :name', ['name' => $name]) : __('Add');
                    $routeParams = isset($route_params) ? $route_params : [];
                    $options = [
                        'btn' => true,
                        'icon' => 'plus'
                    ];
                    $introPopUps = isset($introPopUps) ? $introPopUps : [];
                    $options = addIntroDataInOptions($options, $addText, ConstIntroPopUpComponentType::Button, $introPopUps);
                @endphp
                {!! Assistant::link($addText, $route, $routeParams, $options ) !!}
            </div>
        @endif
    </div>
    <div class="col-md-6">
        {{--temrorary--}}
        @include('partials.sections.search')
    </div>
</div>
