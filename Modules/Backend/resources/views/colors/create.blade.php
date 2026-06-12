@extends('adminlte::page')

@section('title', 'Create Color')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Create Color</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.colors.store') }}" method="post">
            @csrf

            @include('backend::colors.partials.form', ['color' => $color])
        </form>
    </div>
@stop
