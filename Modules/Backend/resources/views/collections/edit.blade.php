@extends('adminlte::page')

@section('title', 'Edit Collection')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Edit Collection</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.collections.update', $collection) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('backend::collections.partials.form', ['collection' => $collection])
        </form>
    </div>
@stop
