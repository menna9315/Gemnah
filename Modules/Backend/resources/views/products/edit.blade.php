@extends('adminlte::page')

@section('title', 'Edit Product')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Edit Product</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.collections.categories.products.update', [$collection, $category, $product]) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('backend::products.partials.form')
        </form>
    </div>
@stop
