@extends('adminlte::page')

@section('title', 'Create Shipping Fee')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Create Shipping Fee</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.shipping-fees.store') }}" method="post">
            @csrf

            @include('backend::shipping-fees.partials.form', ['shippingFee' => $shippingFee])
        </form>
    </div>
@stop
