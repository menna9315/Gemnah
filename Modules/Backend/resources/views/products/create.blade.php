@extends('adminlte::page')

@section('title', 'Add Product')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Add Product</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.collections.categories.products.store', [$collection, $category]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @include('backend::products.partials.form')
        </form>
    </div>
@stop
