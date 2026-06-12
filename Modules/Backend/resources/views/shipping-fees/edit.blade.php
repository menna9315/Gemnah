@extends('adminlte::page')

@section('title', 'Edit Shipping Fee')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Edit Shipping Fee</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.shipping-fees.update', $shippingFee) }}" method="post">
            @csrf
            @method('PUT')

            @include('backend::shipping-fees.partials.form', ['shippingFee' => $shippingFee])
        </form>
    </div>
@stop
