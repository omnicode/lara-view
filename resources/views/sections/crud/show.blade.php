
    @php($columns = $item->getShowable(true, false))

    @include('lara-view::sections.title', ['_title' => 'Show ' . ucfirst(str_singular($item->getTable()))])

    <table class="table table-striped table-bordered">
        <tbody>
        @foreach($columns[config('lara_view.show.column_list')] as $action)
            <tr>
                <th>
                    {{ $action['label'] }}
                </th>
                <td>
                    {{ $item->{$action['name']} }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

