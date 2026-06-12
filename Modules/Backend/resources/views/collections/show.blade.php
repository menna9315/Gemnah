@extends('adminlte::page')

@section('title', 'Collection Details')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Collection Details</h1>
        <div>
            <a href="{{ route('backend.collections.edit', $collection) }}" class="btn btn-primary">
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
            <div class="row">
                <div class="col-lg-4">
                    @if ($collection->image)
                        <img src="{{ asset($collection->image) }}" alt="{{ $collection->title }}"
                            class="collection-detail-image">
                    @else
                        <div class="collection-detail-empty">No image</div>
                    @endif
                </div>

                <div class="col-lg-8">
                    <dl class="row mb-0 collection-details">
                        <dt class="col-sm-4">Title</dt>
                        <dd class="col-sm-8">{{ $collection->title }}</dd>

                        <dt class="col-sm-4">Slug</dt>
                        <dd class="col-sm-8"><code>{{ $collection->slug }}</code></dd>

                        <dt class="col-sm-4">Show in store</dt>
                        <dd class="col-sm-8">
                            <span class="badge {{ $collection->show_in_store ? 'badge-success' : 'badge-secondary' }}">
                                {{ $collection->show_in_store ? 'Shown' : 'Hidden' }}
                            </span>
                        </dd>

                        <dt class="col-sm-4">Show in menu</dt>
                        <dd class="col-sm-8">
                            <span class="badge {{ $collection->show_in_menu ? 'badge-success' : 'badge-secondary' }}">
                                {{ $collection->show_in_menu ? 'Shown' : 'Hidden' }}
                            </span>
                        </dd>

                        <dt class="col-sm-4">Description</dt>
                        <dd class="col-sm-8">{{ $collection->description ?: '-' }}</dd>

                        <dt class="col-sm-4">SEO Title</dt>
                        <dd class="col-sm-8">{{ $collection->seo_title ?: '-' }}</dd>

                        <dt class="col-sm-4">SEO Keywords</dt>
                        <dd class="col-sm-8">{{ $collection->seo_keywords ?: '-' }}</dd>

                        <dt class="col-sm-4">SEO Description</dt>
                        <dd class="col-sm-8">{{ $collection->seo_description ?: '-' }}</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a href="{{ route('backend.collections.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i>
                Back
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="card-title mb-0">Categories</h3>
            <a href="{{ route('backend.collections.categories.create', $collection) }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i>
                Add Category
            </a>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Slug</th>
                        <th style="width: 90px;">Order</th>
                        <th style="width: 120px;">Store</th>
                        <th style="width: 120px;">Menu</th>
                        <th class="text-right" style="width: 190px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                        
                            <td>{{ $category->title }}</td>
                            <td><code>{{ $category->slug }}</code></td>
                            <td>{{ $category->category_order }}</td>
                            <td>
                                <span class="badge {{ $category->show_in_store ? 'badge-success' : 'badge-secondary' }}">
                                    {{ $category->show_in_store ? 'Shown' : 'Hidden' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $category->show_in_menu ? 'badge-success' : 'badge-secondary' }}">
                                    {{ $category->show_in_menu ? 'Shown' : 'Hidden' }}
                                </span>
                            </td>
                            <td class="text-right">
                                <a href="{{ route('backend.collections.categories.show', [$collection, $category]) }}"
                                    class="btn btn-sm btn-outline-secondary" title="Show">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('backend.collections.categories.edit', [$collection, $category]) }}"
                                    class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('backend.collections.categories.destroy', [$collection, $category]) }}"
                                    method="post" class="d-inline" onsubmit="return confirm('Delete this category?')">
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
                            <td colspan="6" class="text-center py-4">No categories yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($categories->hasPages())
            <div class="card-footer">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
@stop
