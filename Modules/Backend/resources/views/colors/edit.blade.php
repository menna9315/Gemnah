@extends('adminlte::page')

@section('title', 'Edit Color')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Edit Color</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.colors.update', $color) }}" method="post">
            @csrf
            @method('PUT')

            @include('backend::colors.partials.form', ['color' => $color])
        </form>
    </div>
@stop
