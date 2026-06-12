@extends('adminlte::page')

@section('title', 'Shipping Policy')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Shipping Policy</h1>
        <a href="{{ route('backend.shipping-policy.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Add Paragraph
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
                        <th class="text-right" style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <td>{{ $item->paragraph_order }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ Illuminate\Support\Str::limit($item->description, 100) }}</td>
                            <td class="text-right">
                                <a href="{{ route('backend.shipping-policy.edit', $item) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('backend.shipping-policy.destroy', $item) }}" method="post"
                                    class="d-inline" onsubmit="return confirm('Delete this paragraph?')">
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
                            <td colspan="4" class="text-center py-4">No shipping policy paragraphs yet.</td>
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
