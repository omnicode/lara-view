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

<table class="table table-striped" {!! getIntroAttributesBy('index', ConstIntroPopUpComponentType::Custom, $introPopUps) !!}>
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
            @include('partials.sections.child-list', ['_item' => $item])
        @endforeach
    </tbody>

</table>

<style type="text/css">
    .child td:first-child {
        padding-left: 35px;
    }
</style>
