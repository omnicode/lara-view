@php
    $defaultCols = 4;
    $items = isset($_data['items']) ? $_data['items'] : [];
    $cols = isset($_data['cols']) ? $_data['cols'] : $defaultCols;
    $size = isset($_data['size']) ? $_data['size'] : 'md';
    $shorten = isset($_data['shorten']) ? $_data['shorten'] : false;
    $field = isset($_data['field']) ? $_data['field'] : 'checkbox_ids';
    $checked = isset($_data['checked']) ? $_data['checked'] : [];
    // only these columns can be set - 1, 2, 3, 4, 6
    if (!in_array($cols, [1, 2, 3, 4, 6])) {
        $cols = $defaultCols;
    }

    $columns = ($cols == 1 ? 12 : 12 / $cols);
    $items = !empty($items) ? array_chunk($items, ceil(count($items) / $cols), true) : [];
@endphp

<div class="row">
    @foreach($items as $chunk)
        <div class="col-{{ $size }}-{{ $columns }}">
            @foreach($chunk as $id => $label)
                <div class="checkbox-list">

                    @php
                        $isChecked = in_array($id, $checked) ? 'checked' : null;
                        $label = $shorten ? shorten($label, (is_bool($shorten) ? null : $shorten), true) : $label;
                    @endphp

                    {!! LaraForm::checkbox($field.'[]', ['value'=> $id, 'label' => $label, 'id' => $field.'_checkbox_list_' . $id, 'checked' =>  $isChecked]) !!}

                </div>
            @endforeach
        </div>
    @endforeach
</div>

