@extends('adminlte::page')

@section('title', 'Home Banners')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Home Banners</h1>
        <a href="{{ route('backend.home-banners.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Add Banner
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
        <div class="card-body table-responsive p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th style="width: 80px;">Order</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th style="width: 120px;">Image</th>
                        <th style="width: 180px;">Button</th>
                        <th class="text-right" style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <td>{{ $item->image_order }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ Illuminate\Support\Str::limit($item->description, 90) }}</td>
                            <td>
                                @if ($item->image)
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="home-banner-thumb">
                                @endif
                            </td>
                            <td>
                                @if ($item->button)
                                    <span class="d-block">{{ $item->button }}</span>
                                @endif

                                @if ($item->button_url)
                                    <small class="text-muted">{{ Illuminate\Support\Str::limit($item->button_url, 28) }}</small>
                                @endif
                            </td>
                            <td class="text-right">
                                <a href="{{ route('backend.home-banners.edit', $item) }}"
                                    class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('backend.home-banners.destroy', $item) }}" method="post"
                                    class="d-inline" onsubmit="return confirm('Delete this home banner?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">No home banners yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($items->hasPages())
            <div class="card-footer">
                {{ $items->links() }}
            </div>
        @endif
    </div>
@stop
