@extends('adminlte::page')

@section('title', 'Add Product Item Image')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Add Product Item Image</h1>
@stop

@section('content')
    <div class="card">
        <form
            action="{{ route('backend.collections.categories.products.items.images.store', [$collection, $category, $product, $item]) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @include('backend::product-item-images.partials.form')
        </form>
    </div>
@stop
