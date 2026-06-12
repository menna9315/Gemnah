@extends('adminlte::page')

@section('title', 'Sizes')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Sizes</h1>
        <a href="{{ route('backend.sizes.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Add Size
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
                        <th>Value</th>
                        <th style="width: 150px;">Size Chart</th>
                        <th class="text-right" style="width: 190px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <td>{{ $item->value }}</td>
                            <td>
                                @if ($item->size_chart_image)
                                    <img src="{{ asset($item->size_chart_image) }}" alt="{{ $item->value }}"
                                        class="size-chart-thumb">
                                @else
                                    <span class="badge badge-secondary">No image</span>
                                @endif
                            </td>
                            <td class="text-right">
                                <a href="{{ route('backend.sizes.show', $item) }}"
                                    class="btn btn-sm btn-outline-secondary" title="Show">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('backend.sizes.edit', $item) }}"
                                    class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('backend.sizes.destroy', $item) }}" method="post"
                                    class="d-inline" onsubmit="return confirm('Delete this size?')">
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
                            <td colspan="3" class="text-center py-4">No sizes yet.</td>
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
