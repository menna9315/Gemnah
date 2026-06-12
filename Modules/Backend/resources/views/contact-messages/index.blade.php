@extends('adminlte::page')

@section('title', 'Contact Messages')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Contact Messages</h1>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th style="width: 170px;">Date</th>
                        <th class="text-right" style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messages as $message)
                        <tr>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->phone }}</td>
                            <td>{{ Illuminate\Support\Str::limit($message->message, 80) }}</td>
                            <td>{{ optional($message->created_at)->format('Y-m-d H:i') }}</td>
                            <td class="text-right">
                                <a href="{{ route('backend.contact-messages.show', $message) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('backend.contact-messages.destroy', $message) }}" method="post"
                                    class="d-inline" onsubmit="return confirm('Delete this contact message?')">
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
                            <td colspan="6" class="text-center py-4">No contact messages yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($messages->hasPages())
            <div class="card-footer">
                {{ $messages->links() }}
            </div>
        @endif
    </div>
@stop
