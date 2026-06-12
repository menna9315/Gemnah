@extends('adminlte::page')

@section('title', 'Add Product Item Cost')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Add Product Item Cost</h1>
@stop

@section('content')
    <div class="card">
        <form
            action="{{ route('backend.collections.categories.products.items.costs.store', [$collection, $category, $product, $item]) }}"
            method="post">
            @csrf
            @include('backend::product-item-costs.partials.form')
        </form>
    </div>
@stop
