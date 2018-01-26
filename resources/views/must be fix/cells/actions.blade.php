
@foreach($_actions_data as $action => $options)
    @if($action !== 'params')
        @php

            if(is_numeric($action)) {
                $action = $options;
                $options = [];
            }

            if ($options !== false) {
                if (!is_array($options)) {
                    $options = ['route' => $options];
                }
                $options['check'] = \MyDevData\Components\Facade\ACL::class;
                $options['params'] = $_actions_data['params'];
            }

            $actionName = 'action_' . $action;
            if (!empty($_isFirst) ) {
                $options = addIntroDataInOptions($options, $action, ConstIntroPopUpComponentType::IndexLink,  $introPopUps);
            }
        @endphp

        {!! LaraLink::itemActionLink(true, $_item, $action, $options) !!}

    @endif
@endforeach

