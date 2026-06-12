@extends('adminlte::page')

@section('title', 'Add Product Image')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Add Product Image</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.collections.categories.products.images.store', [$collection, $category, $product]) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @include('backend::product-images.partials.form')
        </form>
    </div>
@stop
