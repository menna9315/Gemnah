@extends('adminlte::page')

@section('title', 'Edit Home Banner')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Edit Home Banner</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.home-banners.update', $homeBanner) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('backend::home-banners.partials.form', ['homeBanner' => $homeBanner])
        </form>
    </div>
@stop
