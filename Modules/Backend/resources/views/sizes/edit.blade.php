@extends('adminlte::page')

@section('title', 'Edit Size')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Edit Size</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.sizes.update', $size) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('backend::sizes.partials.form', ['size' => $size])
        </form>
    </div>
@stop
