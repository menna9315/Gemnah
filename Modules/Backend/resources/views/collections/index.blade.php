@extends('adminlte::page')

@section('title', 'Collections')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Collections</h1>
        <a href="{{ route('backend.collections.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Add Collection
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
                        <th>Title</th>
                        <th>Slug</th>
                        <th style="width: 120px;">Store</th>
                        <th style="width: 120px;">Menu</th>
                        <th class="text-right" style="width: 190px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr>
                        
                            <td>{{ $item->title }}</td>
                            <td><code>{{ $item->slug }}</code></td>
                            <td>
                                <span class="badge {{ $item->show_in_store ? 'badge-success' : 'badge-secondary' }}">
                                    {{ $item->show_in_store ? 'Shown' : 'Hidden' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $item->show_in_menu ? 'badge-success' : 'badge-secondary' }}">
                                    {{ $item->show_in_menu ? 'Shown' : 'Hidden' }}
                                </span>
                            </td>
                            <td class="text-right">
                                <a href="{{ route('backend.collections.show', $item) }}"
                                    class="btn btn-sm btn-outline-secondary" title="Show">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('backend.collections.edit', $item) }}"
                                    class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('backend.collections.destroy', $item) }}" method="post"
                                    class="d-inline" onsubmit="return confirm('Delete this collection?')">
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
                            <td colspan="7" class="text-center py-4">No collections yet.</td>
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
