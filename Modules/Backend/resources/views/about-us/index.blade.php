@extends('adminlte::page')

@section('title', 'About Us')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>About Us</h1>
        <a href="{{ route('backend.about-us.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Add Item
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
                        <th style="width: 160px;">Images</th>
                        <th style="width: 170px;">Button</th>
                        <th class="text-right" style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <td>{{ $item->paragraph_order }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ Illuminate\Support\Str::limit($item->description, 90) }}</td>
                            <td>
                                @foreach (['image', 'image2'] as $field)
                                    @if ($item->{$field})
                                        <img src="{{ asset($item->{$field}) }}" alt="{{ $field }}" class="about-us-thumb">
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @if ($item->button_title)
                                    <span class="d-block">{{ $item->button_title }}</span>
                                @endif

                                @if ($item->button_url)
                                    <small class="text-muted">{{ Illuminate\Support\Str::limit($item->button_url, 28) }}</small>
                                @endif
                            </td>
                            <td class="text-right">
                                <a href="{{ route('backend.about-us.edit', $item) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('backend.about-us.destroy', $item) }}" method="post" class="d-inline"
                                    onsubmit="return confirm('Delete this about us item?')">
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
                            <td colspan="6" class="text-center py-4">No about us items yet.</td>
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
