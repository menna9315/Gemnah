@extends('adminlte::page')

@section('title', 'Edit Product Item')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Edit Product Item</h1>
@stop

@section('content')
    <div class="card">
        <form
            action="{{ route('backend.collections.categories.products.items.update', [$collection, $category, $product, $item]) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('backend::product-items.partials.form')
        </form>
    </div>
@stop
