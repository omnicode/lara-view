
{{--TODO fix--}}
@if(view()->exists('lara-view::layouts.app.TMP'))

@else
    @php
        $route = app('request')->url();
        $route = isset($item) ? str_replace_last('/edit', '', $route) : str_replace_last('/create', '', $route);
        $table = isset($item) ? $item->getTable() : str_slug($itemName, '_');
    @endphp


    {!! LaraForm::create((isset($item) ? $item : null), ['action' => $route]) !!}

    @foreach (\Illuminate\Support\Facades\Schema::getColumnListing($table) as $column)
        @if (!in_array($column, ['id', 'created_at', 'updated_at']))
            @php
                $type = \Illuminate\Support\Facades\Schema::getColumnType($table, $column);
                $arr = [
                    'boolean' => 'checkbox'
                ];
                $type = !empty($arr[$type]) ? $arr[$type] : $type;
                //echo $type;
            @endphp

            <div class="row">
                <div class="col-sm-12">
                @if ($type == 'checkbox')
                    {!! LaraForm::checkbox($column) !!}
                @else
                    {!! LaraForm::input($column) !!}
                @endif

                </div>
            </div>
        @endif
    @endforeach

    <div class="row">
        <div class="col-md-6">
            {!! LaraForm::submit(__('Save')) !!}
        </div>
    </div>

    {!! LaraForm::end() !!}

@endif




