@extends('adminlte::page')

@section('title', 'Create Home Video')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Create Home Video</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.home-videos.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            @include('backend::home-videos.partials.form', ['homeVideo' => $homeVideo])
        </form>
    </div>
@stop
