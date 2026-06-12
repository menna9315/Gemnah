@extends('adminlte::page')

@section('title', 'Add Category')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Add Category</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.collections.categories.store', $collection) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @include('backend::categories.partials.form')
        </form>
    </div>
@stop
