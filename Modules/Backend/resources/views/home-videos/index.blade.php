@extends('adminlte::page')

@section('title', 'Home Video')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Home Video</h1>

        @if ($homeVideo)
            <a href="{{ route('backend.home-videos.edit', $homeVideo) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i>
                Edit Video
            </a>
        @else
            <a href="{{ route('backend.home-videos.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Add Video
            </a>
        @endif
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
                        <th>Description</th>
                        <th style="width: 150px;">Video</th>
                        <th style="width: 150px;">Display at Home</th>
                        <th class="text-right" style="width: 120px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($homeVideo)
                        <tr>
                            <td>{{ $homeVideo->title }}</td>
                            <td>{{ Illuminate\Support\Str::limit($homeVideo->description, 90) }}</td>
                            <td>
                                @if ($homeVideo->video)
                                    <video class="home-video-thumb" src="{{ asset($homeVideo->video) }}" controls
                                        preload="metadata"></video>
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ $homeVideo->display_at_home ? 'badge-success' : 'badge-secondary' }}">
                                    {{ $homeVideo->display_at_home ? 'Shown' : 'Hidden' }}
                                </span>
                            </td>
                            <td class="text-right">
                                <a href="{{ route('backend.home-videos.edit', $homeVideo) }}"
                                    class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="5" class="text-center py-4">No home video has been added yet.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop
