@extends('adminlte::page')

@section('title', 'Edit About Us')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Edit About Us Item</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.about-us.update', $aboutUs) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('backend::about-us.partials.form', ['aboutUs' => $aboutUs])
        </form>
    </div>
@stop
