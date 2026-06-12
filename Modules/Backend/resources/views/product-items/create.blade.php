@extends('adminlte::page')

@section('title', 'Add Product Item')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Add Product Item</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.collections.categories.products.items.store', [$collection, $category, $product]) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @include('backend::product-items.partials.form')
        </form>
    </div>
@stop
