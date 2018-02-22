
{{--TODO fix--}}
@if(view()->exists('lara-view::layouts.app.TMP'))

@else
    @php
        $route = app('request')->url();
        $route = isset($item) ? str_replace_last('/edit', '', $route) : str_replace_last('/create', '', $route);
        $table = isset($item) ? $item->getTable() : str_slug($itemName, '_');
    @endphp

    {!! LaraForm::create((isset($item) ? $item : null), ['url' => $route]) !!}
    @foreach (LaraDB::getColumnsFullInfo($table) as $column => $info)
        @if (!in_array($column, ['id', 'created_at', 'updated_at']))
            @php
                $data = [];
                $type = $info['type'];
                $arr = [
                    'boolean' => 'checkbox',
                    'int' => 'number',
                    'smallint' => 'number',
                    'tinyint' => 'number',
                    'varchar' => 'text',
                    'char' => 'text'
                ];

                if ($column == 'email') {
                    $type = 'email';
                } elseif ($column == 'password') {
                    $type = 'password';
                } elseif (starts_with($column, 'is')) {
                    $type = 'checkbox';
                } elseif (ends_with($column, '_id')) {
                    $_table = \LaraSupport\Str::before($column, '_id');
                    $_table = str_plural($_table);
                    if(!empty(LaraDB::getDBStructure()[$_table])) {
                        $all = DB::table($_table)->get();
                        $data = [];
                        foreach ($all as $instance)
                        {
                            $vars = get_object_vars($instance);
                            $options[$vars['id']] = implode(',', $vars);
                        }
                        $data['options'] = $options;
                    }
                    $type = 'select';
                } elseif ($type === false) {
                    if ($info['full_info'] === 'datetime') {
                        $type = 'date';
                    } elseif($info['full_info'] === 'text') {
                        $type = 'textarea';
                    }
                }elseif (!empty($arr[$type]) ) {
                    $type = $arr[$type];
                } else {
                //TODO
                    $type = 'text';
                }
                $data['type'] = $type;



            @endphp

            <div class="row">
                <div class="col-sm-12">
                    {!! LaraForm::input($column, $data) !!}
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




