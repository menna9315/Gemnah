@extends('adminlte::page')

@section('title', 'Create Home Banner')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Create Home Banner</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.home-banners.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            @include('backend::home-banners.partials.form', ['homeBanner' => $homeBanner])
        </form>
    </div>
@stop
