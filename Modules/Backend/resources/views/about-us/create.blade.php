@extends('adminlte::page')

@section('title', 'Create About Us')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Create About Us Item</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.about-us.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            @include('backend::about-us.partials.form', ['aboutUs' => $aboutUs])
        </form>
    </div>
@stop
