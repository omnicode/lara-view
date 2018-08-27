@php
   if (empty($pattern)) {
       if (!empty($columns['table'])) {
           $pattern = $columns['table'];
       } else {
           throw new Exception('lara-view::index must be pass pattern variable for showing title, empty result');
       }
   }

   $preRoute = str_replace_last('index', '', Route::currentRouteName());
   $name = str_replace('_', ' ', title_case($pattern));
   $_add = isset($_add) ? $_add : true;
   $_title = isset($_title) ? $_title : true;
@endphp

@if($_title)
   @include('lara-view::sections.title', ['_title' => $name])
@endif
@if($_add)
   @include('lara-view::sections.add', ['_route' => $preRoute . 'create', '_name' => 'Add ' . str_singular($name)])
@endif

@if(count($items) > 0)
   @include('lara-view::sections.crud.index._index', ['_items' => $items])
   @include('lara-view::sections.crud.index.pagination', ['_items' => $items])
@else
   @include('lara-view::sections.empty-result', ['_info' => 'No ' . $name])
@endif
