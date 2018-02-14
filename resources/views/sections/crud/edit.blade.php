
@extends('lara-view::layouts.app')

@section('content')

    @include('lara-view::sections.title', ['_title' => 'Edit ' . ucfirst(str_singular($item->getTable()))])

    @include('lara-view::crud.partials.form')

@endsection

