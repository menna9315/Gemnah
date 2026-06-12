@extends('adminlte::page')

@section('title', 'Create Contact')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Create Contact</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.contacts.store') }}" method="post">
            @csrf

            @include('backend::contacts.partials.form', ['contact' => $contact])
        </form>
    </div>
@stop
