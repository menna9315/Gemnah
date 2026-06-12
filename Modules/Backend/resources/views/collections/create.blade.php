@extends('adminlte::page')

@section('title', 'Create Collection')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Create Collection</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.collections.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            @include('backend::collections.partials.form', ['collection' => $collection])
        </form>
    </div>
@stop
