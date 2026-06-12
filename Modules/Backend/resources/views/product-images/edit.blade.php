@extends('adminlte::page')

@section('title', 'Edit Product Image')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Edit Product Image</h1>
@stop

@section('content')
    <div class="card">
        <form
            action="{{ route('backend.collections.categories.products.images.update', [$collection, $category, $product, $productImage]) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('backend::product-images.partials.form')
        </form>
    </div>
@stop
