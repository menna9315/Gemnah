@extends('adminlte::page')

@section('title', 'Edit Product Item Cost')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Edit Product Item Cost</h1>
@stop

@section('content')
    <div class="card">
        <form
            action="{{ route('backend.collections.categories.products.items.costs.update', [$collection, $category, $product, $item, $productItemCost]) }}"
            method="post">
            @csrf
            @method('PUT')
            @include('backend::product-item-costs.partials.form')
        </form>
    </div>
@stop
