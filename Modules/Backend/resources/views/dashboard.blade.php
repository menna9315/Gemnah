@extends('adminlte::page')

@section('title', 'Backend Dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')


    <div class="card">
        <div class="card-body">
            <p class="mb-0">Welcome, {{ auth()->user()->name }}.</p>
        </div>
    </div>
@stop
