@extends('adminlte::page')

@section('title', 'Create Size')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Create Size</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.sizes.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            @include('backend::sizes.partials.form', ['size' => $size])
        </form>
    </div>
@stop
