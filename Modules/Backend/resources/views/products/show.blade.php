@extends('adminlte::page')

@section('title', 'Product Details')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Product Details</h1>
        <a href="{{ route('backend.collections.categories.products.edit', [$collection, $category, $product]) }}"
            class="btn btn-primary">
            <i class="fas fa-edit"></i>
            Edit
        </a>
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
            <div class="row">
                <div class="col-lg-4">
                    @if ($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" class="product-detail-image">
                    @else
                        <div class="product-detail-empty">No image</div>
                    @endif
                </div>

                <div class="col-lg-8">
                    <dl class="row mb-0 collection-details">
                        <dt class="col-sm-4">Collection</dt>
                        <dd class="col-sm-8">{{ $collection->title }}</dd>

                        <dt class="col-sm-4">Category</dt>
                        <dd class="col-sm-8">{{ $category->title }}</dd>

                        <dt class="col-sm-4">Title</dt>
                        <dd class="col-sm-8">{{ $product->title }}</dd>

                        <dt class="col-sm-4">Slug</dt>
                        <dd class="col-sm-8"><code>{{ $product->slug }}</code></dd>

                        <dt class="col-sm-4">Product code</dt>
                        <dd class="col-sm-8">{{ $product->product_code ?: '-' }}</dd>

                        <dt class="col-sm-4">Manual order</dt>
                        <dd class="col-sm-8">{{ $product->manual_order }}</dd>

                        <dt class="col-sm-4">Taxes</dt>
                        <dd class="col-sm-8">{{ number_format((float) $product->taxes, 2) }}</dd>

                        <dt class="col-sm-4">Show in store</dt>
                        <dd class="col-sm-8">
                            <span class="badge {{ $product->show_in_store ? 'badge-success' : 'badge-secondary' }}">
                                {{ $product->show_in_store ? 'Shown' : 'Hidden' }}
                            </span>
                        </dd>

                        <dt class="col-sm-4">Show in menu</dt>
                        <dd class="col-sm-8">
                            <span class="badge {{ $product->show_in_menu ? 'badge-success' : 'badge-secondary' }}">
                                {{ $product->show_in_menu ? 'Shown' : 'Hidden' }}
                            </span>
                        </dd>

                        <dt class="col-sm-4">Description</dt>
                        <dd class="col-sm-8">{{ $product->description ?: '-' }}</dd>

                        <dt class="col-sm-4">SEO Title</dt>
                        <dd class="col-sm-8">{{ $product->seo_title ?: '-' }}</dd>

                        <dt class="col-sm-4">SEO Keywords</dt>
                        <dd class="col-sm-8">{{ $product->seo_keywords ?: '-' }}</dd>

                        <dt class="col-sm-4">SEO Description</dt>
                        <dd class="col-sm-8">{{ $product->seo_description ?: '-' }}</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a href="{{ route('backend.collections.categories.show', [$collection, $category]) }}"
                class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i>
                Back
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="card-title mb-0">Product Items</h3>
            <a href="{{ route('backend.collections.categories.products.items.create', [$collection, $category, $product]) }}"
                class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i>
                Add Item
            </a>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th style="width: 90px;">Image</th>
                        <th>Title</th>
                        {{-- <th>Item Code</th> --}}
                        <th>Color</th>
                        <th>Size</th>
                        <th style="width: 130px;">Price</th>
                        <th style="width: 110px;">Stock</th>
                        <th style="width: 90px;">Order</th>
                        <th style="width: 160px;">Status</th>
                        <th class="text-right" style="width: 190px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productItems as $productItem)
                        <tr>
                            <td>
                                @if ($productItem->image)
                                    <img src="{{ asset($productItem->image) }}" alt="{{ $productItem->title }}"
                                        class="product-item-thumb">
                                @else
                                    <span class="badge badge-secondary">No image</span>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $productItem->title }}</strong>
                                <div><code>{{ $productItem->slug }}</code></div>
                            </td>
                            {{-- <td>{{ $productItem->item_code ?: '-' }}</td> --}}
                            <td>
                                @if ($productItem->color)
                                    <span class="color-swatch mr-1"
                                        style="background-color: {{ $productItem->color->code }}"></span>
                                    {{ $productItem->color->name }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $productItem->size?->value ?: '-' }}</td>
                            <td>{{ number_format((float) $productItem->selling_price, 2) }}</td>
                            <td>{{ number_format((int) $productItem->stock_quantity) }}</td>
                            <td>{{ $productItem->manual_order }}</td>
                            <td>
                                @if ($productItem->is_best_seller)
                                    <span class="badge badge-success">Best seller</span>
                                @endif
                                @if ($productItem->is_featured)
                                    <span class="badge badge-info">Featured</span>
                                @endif
                                @if ($productItem->is_out_of_stock)
                                    <span class="badge badge-warning">Out</span>
                                @endif
                                @unless ($productItem->show_in_store)
                                    <span class="badge badge-secondary">Hidden</span>
                                @endunless
                            </td>
                            <td class="text-right">
                                <a href="{{ route('backend.collections.categories.products.items.show', [$collection, $category, $product, $productItem]) }}"
                                    class="btn btn-sm btn-outline-secondary" title="Show">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('backend.collections.categories.products.items.edit', [$collection, $category, $product, $productItem]) }}"
                                    class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form
                                    action="{{ route('backend.collections.categories.products.items.destroy', [$collection, $category, $product, $productItem]) }}"
                                    method="post" class="d-inline" onsubmit="return confirm('Delete this product item?')">
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
                            <td colspan="9" class="text-center py-4">No product items yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($productItems->hasPages())
            <div class="card-footer">
                {{ $productItems->links() }}
            </div>
        @endif
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="card-title mb-0">Product Images</h3>
            <a href="{{ route('backend.collections.categories.products.images.create', [$collection, $category, $product]) }}"
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
                        {{-- <th>Path</th> --}}
                        <th class="text-right" style="width: 190px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productImages as $productImage)
                        <tr>
                            <td>
                                <img src="{{ asset($productImage->image) }}" alt="{{ $product->title }}"
                                    class="product-image-thumb">
                            </td>
                            <td>{{ $productImage->product_order }}</td>
                            {{-- <td><code>{{ $productImage->image }}</code></td> --}}
                            <td class="text-right">
                                <a href="{{ route('backend.collections.categories.products.images.show', [$collection, $category, $product, $productImage]) }}"
                                    class="btn btn-sm btn-outline-secondary" title="Show">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('backend.collections.categories.products.images.edit', [$collection, $category, $product, $productImage]) }}"
                                    class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form
                                    action="{{ route('backend.collections.categories.products.images.destroy', [$collection, $category, $product, $productImage]) }}"
                                    method="post" class="d-inline" onsubmit="return confirm('Delete this product image?')">
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
                            <td colspan="4" class="text-center py-4">No product images yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($productImages->hasPages())
            <div class="card-footer">
                {{ $productImages->links() }}
            </div>
        @endif
    </div>
@stop
