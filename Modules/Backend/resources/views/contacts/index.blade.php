@extends('adminlte::page')

@section('title', 'Contacts')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Contacts</h1>

        @if ($contact)
            <a href="{{ route('backend.contacts.edit', $contact) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i>
                Edit Contact
            </a>
        @else
            <a href="{{ route('backend.contacts.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Add Contact
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
                <tbody>
                    @if ($contact)
                        <tr>
                            <th style="width: 220px;">Name</th>
                            <td>{{ $contact->name }}</td>
                        </tr>
                        <tr>
                            <th>Phone 1</th>
                            <td>{{ $contact->phone1 }}</td>
                        </tr>
                        <tr>
                            <th>Phone 2</th>
                            <td>{{ $contact->phone2 }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <th>Instagram Link</th>
                            <td>{{ $contact->instgram_link }}</td>
                        </tr>
                        <tr>
                            <th>Facebook Link</th>
                            <td>{{ $contact->facebook_link }}</td>
                        </tr>
                        <tr>
                            <th>Tiktok Link</th>
                            <td>{{ $contact->tiktok_link }}</td>
                        </tr>
                    @else
                        <tr>
                            <td class="text-center py-4">No contact record yet.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop
