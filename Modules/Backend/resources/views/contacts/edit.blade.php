@extends('adminlte::page')

@section('title', 'Edit Contact')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Edit Contact</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.contacts.update', $contact) }}" method="post">
            @csrf
            @method('PUT')

            @include('backend::contacts.partials.form', ['contact' => $contact])
        </form>
    </div>
@stop
