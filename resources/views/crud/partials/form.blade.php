
@if(view()->exists('lara-view::layouts.app11')))

@else
    <form action="/action_page.php">
        @foreach (\Illuminate\Support\Facades\Schema::getColumnListing('currencies') as $column)
            @if (!in_array($column, ['id', 'created_at', 'updated_at']))
                @php
                    $type = \Illuminate\Support\Facades\Schema::getColumnType('currencies', $column);
                    $arr = [
                        'boolean' => 'checkbox'
                    ];
                    $type = !empty($arr[$type]) ? $arr[$type] : $type;
                @endphp
                <div class="form-group">
                    <label for="email"> {{ ucfirst($column) }}</label>
                    <input type="{{ $type }}" class="form-control" id="email">
                </div>

            @endif
        @endforeach
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endif




