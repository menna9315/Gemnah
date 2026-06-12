@extends('adminlte::page')

@section('title', 'Edit Category')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Edit Category</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.collections.categories.update', [$collection, $category]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('backend::categories.partials.form')
        </form>
    </div>
@stop
