
<div class="row">
    <div class="col-md-12">
        @php
            $indexConf = config('lara_view.index');
            if (!isset($_actions)) {
                $_actions['list']  = !empty($columns['actions']) ? $columns['actions'] : config('lara_view.index.actions.list', []);
            }
        @endphp

        <table class="table table-striped table-bordered table-responsive">
            <thead>
            <tr>
                @foreach($columns[$indexConf['column_list']] as $column)
                    <th>
                        @if (!empty($column['sortable']))
                            {!! LaraLink::sortLink('', $column) !!}
                        @else
                            {{ $column['label'] }}
                        @endif
                        </th>
                @endforeach

                @if ($_actions)
                    <th>
                        {{ __('Actions') }}
                    </th>
                @endif
            </tr>
            </thead>

            <tbody>
            @foreach($_items as $item)
                <tr>
                    @foreach($columns[$indexConf['column_list']] as $column)
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

                    @if ($_actions)
                        <td>
                            @php
                                $itemActions = $_actions;
                                if (!empty($item->{$columns['primary_key']})) {
                                    $itemActions['params'][] = $item->{$columns['primary_key']};
                                }
                            @endphp
                            @include('lara-view::sections.page.index.actions', ['_item' => $item, '_actions' => $itemActions])
                        </td>
                    @endif
                </tr>

            @endforeach
            </tbody>

        </table>
    </div>
</div>
