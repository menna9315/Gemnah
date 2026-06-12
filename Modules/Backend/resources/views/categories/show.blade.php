@extends('adminlte::page')

@section('title', 'Category Details')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Category Details</h1>
        <a href="{{ route('backend.collections.categories.edit', [$collection, $category]) }}" class="btn btn-primary">
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
                    @if ($category->image)
                        <img src="{{ asset($category->image) }}" alt="{{ $category->title }}"
                            class="category-detail-image">
                    @else
                        <div class="category-detail-empty">No image</div>
                    @endif
                </div>

                <div class="col-lg-8">
                    <dl class="row mb-0 collection-details">
                        <dt class="col-sm-4">Collection</dt>
                        <dd class="col-sm-8">{{ $collection->title }}</dd>

                        <dt class="col-sm-4">Title</dt>
                        <dd class="col-sm-8">{{ $category->title }}</dd>

                        <dt class="col-sm-4">Slug</dt>
                        <dd class="col-sm-8"><code>{{ $category->slug }}</code></dd>

                        <dt class="col-sm-4">Order</dt>
                        <dd class="col-sm-8">{{ $category->category_order }}</dd>

                        <dt class="col-sm-4">Show in store</dt>
                        <dd class="col-sm-8">
                            <span class="badge {{ $category->show_in_store ? 'badge-success' : 'badge-secondary' }}">
                                {{ $category->show_in_store ? 'Shown' : 'Hidden' }}
                            </span>
                        </dd>

                        <dt class="col-sm-4">Show in menu</dt>
                        <dd class="col-sm-8">
                            <span class="badge {{ $category->show_in_menu ? 'badge-success' : 'badge-secondary' }}">
                                {{ $category->show_in_menu ? 'Shown' : 'Hidden' }}
                            </span>
                        </dd>

                        <dt class="col-sm-4">Description</dt>
                        <dd class="col-sm-8">{{ $category->description ?: '-' }}</dd>

                        <dt class="col-sm-4">SEO Title</dt>
                        <dd class="col-sm-8">{{ $category->seo_title ?: '-' }}</dd>

                        <dt class="col-sm-4">SEO Keywords</dt>
                        <dd class="col-sm-8">{{ $category->seo_keywords ?: '-' }}</dd>

                        <dt class="col-sm-4">SEO Description</dt>
                        <dd class="col-sm-8">{{ $category->seo_description ?: '-' }}</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a href="{{ route('backend.collections.show', $collection) }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i>
                Back
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="card-title mb-0">Products</h3>
            <a href="{{ route('backend.collections.categories.products.create', [$collection, $category]) }}"
                class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i>
                Add Product
            </a>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Code</th>
                        <th>Slug</th>
                        <th style="width: 90px;">Order</th>
                        <th style="width: 90px;">Taxes</th>
                        <th style="width: 120px;">Store</th>
                        <th style="width: 120px;">Menu</th>
                        <th class="text-right" style="width: 190px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->product_code ?: '-' }}</td>
                            <td><code>{{ $product->slug }}</code></td>
                            <td>{{ $product->manual_order }}</td>
                            <td>{{ number_format((float) $product->taxes, 2) }}</td>
                            <td>
                                <span class="badge {{ $product->show_in_store ? 'badge-success' : 'badge-secondary' }}">
                                    {{ $product->show_in_store ? 'Shown' : 'Hidden' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $product->show_in_menu ? 'badge-success' : 'badge-secondary' }}">
                                    {{ $product->show_in_menu ? 'Shown' : 'Hidden' }}
                                </span>
                            </td>
                            <td class="text-right">
                                <a href="{{ route('backend.collections.categories.products.show', [$collection, $category, $product]) }}"
                                    class="btn btn-sm btn-outline-secondary" title="Show">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('backend.collections.categories.products.edit', [$collection, $category, $product]) }}"
                                    class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form
                                    action="{{ route('backend.collections.categories.products.destroy', [$collection, $category, $product]) }}"
                                    method="post" class="d-inline" onsubmit="return confirm('Delete this product?')">
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
                            <td colspan="8" class="text-center py-4">No products yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($products->hasPages())
            <div class="card-footer">
                {{ $products->links() }}
            </div>
        @endif
    </div>
@stop
