@foreach($_actions['list'] as $action => $options)
    @php
        if (is_numeric($action)) {
            $action = $options;
            $options = [];
        }

        if ($action == 'view') {
            $action = 'show';
        }

        if ($action == 'delete') {
            $action = 'destroy';
        }

        if ($options !== false) {
            if (!is_array($options)) {
                $options = ['route' => $options];
            }
            $options['params'] = $_actions['params'];
            $routePrefix = '';
            if (empty($routePrefix)) {
                $routePrefix = str_replace(str_replace('_', '-', $_item->getTable()) . '.index', '', Route::currentRouteName());
                if (ends_with($routePrefix, '.')) {
                    $routePrefix = str_replace_last('.', '', $routePrefix);
                }
            }
            $options['route_prefix'] = $routePrefix;
        }
    @endphp
    {!! LaraLink::itemActionLink(true, $_item, $action, $options) !!}

@endforeach
