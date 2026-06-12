@extends('adminlte::page')

@section('title', 'Edit Product Item Image')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Edit Product Item Image</h1>
@stop

@section('content')
    <div class="card">
        <form
            action="{{ route('backend.collections.categories.products.items.images.update', [$collection, $category, $product, $item, $productItemImage]) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('backend::product-item-images.partials.form')
        </form>
    </div>
@stop
