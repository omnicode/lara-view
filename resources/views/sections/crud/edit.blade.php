
    @include('lara-view::sections.title', ['_title' => 'Edit ' . ucfirst(str_singular($item->getTable()))])

    @include('lara-view::sections.crud.partials.form')


