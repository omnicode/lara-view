@if (!empty($_count) && !empty($isSearch))

    @php
        $options = ['action' => $action, 'method' => 'get'];
        if (!empty($introPopUps)) {
            $options['_intro_pop_ups'] = $introPopUps;
        }
    @endphp

    {!! LaraForm::create([], $options) !!}

        <div class="row">
            @if(app('request')->search)
                <div class="col-md-10">
            @else
                <div class="col-md-12">
            @endif
                {!! LaraForm::input('search', ['label' => false, 'value' => app('request')->search, 'placeholder' => $placeholder]) !!}
                <span class="glyphicon glyphicon-search form-control-feedback"></span>
            </div>

            @if(app('request')->search)
                @php
                    $options = [
                        'btn'=> 'default',
                        'class' => 'mr10'
                    ];
                    if (!empty($introPopUps)) {
                        $options = addIntroDataInOptions($options, 'reset', ConstIntroPopUpComponentType::Button, $introPopUps);
                    }
                @endphp
                <div class="col-md-2">
                    {!! Assistant::link('Reset', $route, $routeParams, $options) !!}
                </div>
            @endif

        </div>

    {!! LaraForm::end() !!}

@endif

<style>
    span.form-control-feedback {
        position: absolute;
        top: -1px;
        right: -2px;
        z-index: 2;
        display: inline;
        width: 34px;
        height: 34px;
        line-height: 34px;
        text-align: center;
        color: #3596e0;
        left: initial;
        font-size: 14px;
        margin-right: 20px;
    }
</style>