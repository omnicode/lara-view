@php
    $actions = false;
    if (!empty($_list_data['actions'])) {
        $actions = Assistant::checkListActions($_list_data['actions']);
    }
    //for intro pop ups
    $index = 'index';
    $actionsIntroName = 'actions';
    $introPopUps = isset($introPopUps) ? $introPopUps : [];
@endphp

<table class="table table-bordered table-striped" {!! getIntroAttributesBy('index', ConstIntroPopUpComponentType::Custom, $introPopUps) !!}>
    <thead>
    <tr>
        @foreach($columns['list'] as $column)
            <th {!! getIntroAttributesBy($column['label'], ConstIntroPopUpComponentType::IndexTab, $introPopUps) !!}>
                @if (!empty($column['sortable']))
                    {!! Assistant::sortLink($column) !!}
                @else
                    {{ $column['label'] }}
                @endif
            </th>
        @endforeach

        @if ($actions)
            <th {!! getIntroAttributesBy('actions', ConstIntroPopUpComponentType::IndexTab, $introPopUps) !!}>
                {{ __('Actions') }}
            </th>
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach($_list_data['items'] as $item)
        <tr>
            @foreach($columns['list'] as $column)
                @php
                    $thisItem = !empty($column['path']) ? $item->{$column['path']} : $item;
                    $result = !empty($thisItem->{$column['name']}) ? $thisItem->{$column['name']} : '';

                    // check method call
                    if (isset($column['function'])) {
                        $result = $column['function']($result);
                    }

                    if(isset($column['shorten'])) {
                        $column['escape'] = false;
                        $result = shorten($result, is_bool($column['shorten']) ? null : $column['shorten']);
                    }
                @endphp
                <td>
                    @if($column['escape'])
                        {{ $result }}
                    @else
                        {!! $result !!}
                    @endif
                </td>
            @endforeach

            @if ($actions)
                <td>
                    @php
                        $thisActions = $actions;
                        if (!empty($item->{$columns['primary_key']})) {
                            $thisActions['params'][] = $item->{$columns['primary_key']};
                        }
                    @endphp
                    @include('partials.cells.actions', ['_item' => $item, '_actions_data' => $thisActions, '_isFirst' => $loop->first])
                </td>
            @endif
        </tr>

    @endforeach
    </tbody>

</table>
    