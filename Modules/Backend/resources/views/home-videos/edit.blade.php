@extends('adminlte::page')

@section('title', 'Edit Home Video')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Edit Home Video</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.home-videos.update', $homeVideo) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('backend::home-videos.partials.form', ['homeVideo' => $homeVideo])
        </form>
    </div>
@stop
