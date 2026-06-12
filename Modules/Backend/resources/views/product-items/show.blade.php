@extends('adminlte::page')

@section('title', 'Product Item Details')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Product Item Details</h1>
        <div>
            <a href="{{ route('backend.collections.categories.products.show', [$collection, $category, $product]) }}"
                class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i>
                Back
            </a>
            <a href="{{ route('backend.collections.categories.products.items.edit', [$collection, $category, $product, $item]) }}"
                class="btn btn-primary">
                <i class="fas fa-edit"></i>
                Edit
            </a>
        </div>
    </div>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-4">
                    @if ($item->image)
                        <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="product-item-detail-image">
                    @else
                        <div class="product-item-detail-empty">No item image</div>
                    @endif
                </div>
                <div class="col-md-4">
                    @if ($item->home_image)
                        <img src="{{ asset($item->home_image) }}" alt="{{ $item->title }}"
                            class="product-item-detail-image">
                    @else
                        <div class="product-item-detail-empty">No home image</div>
                    @endif
                </div>
                <div class="col-md-4">
                    @if ($item->size_chart_image)
                        <img src="{{ asset($item->size_chart_image) }}" alt="{{ $item->title }}"
                            class="product-item-detail-image">
                    @else
                        <div class="product-item-detail-empty">No size chart</div>
                    @endif
                </div>
            </div>

            <dl class="row mb-0 collection-details">
                <dt class="col-sm-4">Collection</dt>
                <dd class="col-sm-8">{{ $collection->title }}</dd>

                <dt class="col-sm-4">Category</dt>
                <dd class="col-sm-8">{{ $category->title }}</dd>

                <dt class="col-sm-4">Product</dt>
                <dd class="col-sm-8">{{ $product->title }}</dd>

                <dt class="col-sm-4">Title</dt>
                <dd class="col-sm-8">{{ $item->title }}</dd>

                <dt class="col-sm-4">Slug</dt>
                <dd class="col-sm-8"><code>{{ $item->slug }}</code></dd>

                <dt class="col-sm-4">Item code</dt>
                <dd class="col-sm-8">{{ $item->item_code ?: '-' }}</dd>

                <dt class="col-sm-4">Manual order</dt>
                <dd class="col-sm-8">{{ $item->manual_order }}</dd>

                <dt class="col-sm-4">Stock quantity</dt>
                <dd class="col-sm-8">{{ number_format((int) $item->stock_quantity) }}</dd>

                <dt class="col-sm-4">Selling price</dt>
                <dd class="col-sm-8">{{ number_format((float) $item->selling_price, 2) }}</dd>

                <dt class="col-sm-4">Original price</dt>
                <dd class="col-sm-8">{{ number_format((float) $item->original_price, 2) }}</dd>

                <dt class="col-sm-4">Discount value</dt>
                <dd class="col-sm-8">{{ number_format((float) $item->discount_value, 2) }}</dd>

                <dt class="col-sm-4">Price after discount</dt>
                <dd class="col-sm-8">{{ number_format((float) $item->price_after_discount, 2) }}</dd>

                <dt class="col-sm-4">Taxes</dt>
                <dd class="col-sm-8">{{ number_format((float) $item->taxes, 2) }}</dd>

                <dt class="col-sm-4">Color</dt>
                <dd class="col-sm-8">
                    @if ($item->color)
                        <span class="color-swatch mr-2" style="background-color: {{ $item->color->code }}"></span>
                        {{ $item->color->name }}
                    @else
                        -
                    @endif
                </dd>

                <dt class="col-sm-4">Size</dt>
                <dd class="col-sm-8">{{ $item->size?->value ?: '-' }}</dd>

                <dt class="col-sm-4">Fabric</dt>
                <dd class="col-sm-8">{{ $item->fabric ?: '-' }}</dd>

                <dt class="col-sm-4">Best seller</dt>
                <dd class="col-sm-8">
                    <span class="badge {{ $item->is_best_seller ? 'badge-success' : 'badge-secondary' }}">
                        {{ $item->is_best_seller ? 'Yes' : 'No' }}
                    </span>
                </dd>

                <dt class="col-sm-4">Featured</dt>
                <dd class="col-sm-8">
                    <span class="badge {{ $item->is_featured ? 'badge-success' : 'badge-secondary' }}">
                        {{ $item->is_featured ? 'Yes' : 'No' }}
                    </span>
                </dd>

                <dt class="col-sm-4">Out of stock</dt>
                <dd class="col-sm-8">
                    <span class="badge {{ $item->is_out_of_stock ? 'badge-warning' : 'badge-success' }}">
                        {{ $item->is_out_of_stock ? 'Yes' : 'No' }}
                    </span>
                </dd>

                <dt class="col-sm-4">Show in store</dt>
                <dd class="col-sm-8">
                    <span class="badge {{ $item->show_in_store ? 'badge-success' : 'badge-secondary' }}">
                        {{ $item->show_in_store ? 'Shown' : 'Hidden' }}
                    </span>
                </dd>

                <dt class="col-sm-4">Show in menu</dt>
                <dd class="col-sm-8">
                    <span class="badge {{ $item->show_in_menu ? 'badge-success' : 'badge-secondary' }}">
                        {{ $item->show_in_menu ? 'Shown' : 'Hidden' }}
                    </span>
                </dd>

                <dt class="col-sm-4">Description</dt>
                <dd class="col-sm-8">{!! $item->description ? nl2br(e($item->description)) : '-' !!}</dd>

                <dt class="col-sm-4">Description 2</dt>
                <dd class="col-sm-8">{!! $item->description2 ? nl2br(e($item->description2)) : '-' !!}</dd>

                <dt class="col-sm-4">SEO Title</dt>
                <dd class="col-sm-8">{{ $item->seo_title ?: '-' }}</dd>

                <dt class="col-sm-4">SEO Keywords</dt>
                <dd class="col-sm-8">{{ $item->seo_keywords ?: '-' }}</dd>

                <dt class="col-sm-4">SEO Description</dt>
                <dd class="col-sm-8">{!! $item->seo_description ? nl2br(e($item->seo_description)) : '-' !!}</dd>
            </dl>
        </div>

    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="card-title mb-0">Item Images</h3>
            <a href="{{ route('backend.collections.categories.products.items.images.create', [$collection, $category, $product, $item]) }}"
                class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i>
                Add Image
            </a>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th style="width: 90px;">Image</th>
                        <th style="width: 100px;">Order</th>
                        <th class="text-right" style="width: 190px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($itemImages as $itemImage)
                        <tr>
                            <td>
                                <img src="{{ asset($itemImage->image) }}" alt="{{ $item->title }}"
                                    class="product-item-thumb">
                            </td>
                            <td>{{ $itemImage->item_order }}</td>
                            <td class="text-right">
                                <a href="{{ route('backend.collections.categories.products.items.images.show', [$collection, $category, $product, $item, $itemImage]) }}"
                                    class="btn btn-sm btn-outline-secondary" title="Show">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('backend.collections.categories.products.items.images.edit', [$collection, $category, $product, $item, $itemImage]) }}"
                                    class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form
                                    action="{{ route('backend.collections.categories.products.items.images.destroy', [$collection, $category, $product, $item, $itemImage]) }}"
                                    method="post" class="d-inline" onsubmit="return confirm('Delete this item image?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4">No item images yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($itemImages->hasPages())
            <div class="card-footer">
                {{ $itemImages->links() }}
            </div>
        @endif
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="card-title mb-0">Item Costs</h3>
            <a href="{{ route('backend.collections.categories.products.items.costs.create', [$collection, $category, $product, $item]) }}"
                class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i>
                Add Cost
            </a>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th style="width: 160px;">Value</th>
                        <th class="text-right" style="width: 190px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($itemCosts as $itemCost)
                        <tr>
                            <td>{{ $itemCost->name }}</td>
                            <td>{{ number_format((float) $itemCost->value, 2) }}</td>
                            <td class="text-right">
                                <a href="{{ route('backend.collections.categories.products.items.costs.show', [$collection, $category, $product, $item, $itemCost]) }}"
                                    class="btn btn-sm btn-outline-secondary" title="Show">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('backend.collections.categories.products.items.costs.edit', [$collection, $category, $product, $item, $itemCost]) }}"
                                    class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form
                                    action="{{ route('backend.collections.categories.products.items.costs.destroy', [$collection, $category, $product, $item, $itemCost]) }}"
                                    method="post" class="d-inline" onsubmit="return confirm('Delete this item cost?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4">No item costs yet.</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-right">Total</th>
                        <th>{{ number_format((float) $itemCostsTotal, 2) }}</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>

        @if ($itemCosts->hasPages())
            <div class="card-footer">
                {{ $itemCosts->links() }}
            </div>
        @endif
    </div>
@stop
