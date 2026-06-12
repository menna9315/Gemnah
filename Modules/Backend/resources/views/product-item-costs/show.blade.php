@extends('adminlte::page')

@section('title', 'Product Item Cost Details')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Product Item Cost Details</h1>
        <a href="{{ route('backend.collections.categories.products.items.costs.edit', [$collection, $category, $product, $item, $productItemCost]) }}"
            class="btn btn-primary">
            <i class="fas fa-edit"></i>
            Edit
        </a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <dl class="row mb-0 collection-details">
                <dt class="col-sm-4">Collection</dt>
                <dd class="col-sm-8">{{ $collection->title }}</dd>

                <dt class="col-sm-4">Category</dt>
                <dd class="col-sm-8">{{ $category->title }}</dd>

                <dt class="col-sm-4">Product</dt>
                <dd class="col-sm-8">{{ $product->title }}</dd>

                <dt class="col-sm-4">Item</dt>
                <dd class="col-sm-8">{{ $item->title }}</dd>

                <dt class="col-sm-4">Name</dt>
                <dd class="col-sm-8">{{ $productItemCost->name }}</dd>

                <dt class="col-sm-4">Value</dt>
                <dd class="col-sm-8">{{ number_format((float) $productItemCost->value, 2) }}</dd>
            </dl>
        </div>

        <div class="card-footer">
            <a href="{{ route('backend.collections.categories.products.items.show', [$collection, $category, $product, $item]) }}"
                class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i>
                Back
            </a>
        </div>
    </div>
@stop
