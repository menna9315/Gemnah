@extends('adminlte::page')

@section('title', 'Contact Message')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Contact Message</h1>
        <a href="{{ route('backend.contact-messages.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i>
            Back
        </a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-md-3">Name</dt>
                <dd class="col-md-9">{{ $contactMessage->name }}</dd>

                <dt class="col-md-3">Email</dt>
                <dd class="col-md-9">{{ $contactMessage->email }}</dd>

                <dt class="col-md-3">Phone</dt>
                <dd class="col-md-9">{{ $contactMessage->phone }}</dd>

                <dt class="col-md-3">Date</dt>
                <dd class="col-md-9">{{ optional($contactMessage->created_at)->format('Y-m-d H:i') }}</dd>

                <dt class="col-md-3">Message</dt>
                <dd class="col-md-9">{!! nl2br(e($contactMessage->message)) !!}</dd>
            </dl>
        </div>

        <div class="card-footer text-right">
            <form action="{{ route('backend.contact-messages.destroy', $contactMessage) }}" method="post"
                class="d-inline" onsubmit="return confirm('Delete this contact message?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">
                    <i class="fas fa-trash"></i>
                    Delete
                </button>
            </form>
        </div>
    </div>
@stop
