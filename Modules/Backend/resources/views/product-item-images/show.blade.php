@extends('adminlte::page')

@section('title', 'Product Item Image Details')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Product Item Image Details</h1>
        <a href="{{ route('backend.collections.categories.products.items.images.edit', [$collection, $category, $product, $item, $productItemImage]) }}"
            class="btn btn-primary">
            <i class="fas fa-edit"></i>
            Edit
        </a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <img src="{{ asset($productItemImage->image) }}" alt="{{ $item->title }}"
                        class="product-item-detail-image">
                </div>

                <div class="col-lg-8">
                    <dl class="row mb-0 collection-details">
                        <dt class="col-sm-4">Collection</dt>
                        <dd class="col-sm-8">{{ $collection->title }}</dd>

                        <dt class="col-sm-4">Category</dt>
                        <dd class="col-sm-8">{{ $category->title }}</dd>

                        <dt class="col-sm-4">Product</dt>
                        <dd class="col-sm-8">{{ $product->title }}</dd>

                        <dt class="col-sm-4">Item</dt>
                        <dd class="col-sm-8">{{ $item->title }}</dd>

                        <dt class="col-sm-4">Order</dt>
                        <dd class="col-sm-8">{{ $productItemImage->item_order }}</dd>

                        <dt class="col-sm-4">Image path</dt>
                        <dd class="col-sm-8"><code>{{ $productItemImage->image }}</code></dd>
                    </dl>
                </div>
            </div>
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
