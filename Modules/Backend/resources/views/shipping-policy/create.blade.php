@extends('adminlte::page')

@section('title', 'Create Shipping Policy')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Create Shipping Policy Paragraph</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.shipping-policy.store') }}" method="post">
            @csrf

            @include('backend::shipping-policy.partials.form', [
                'shippingPolicyParagraph' => $shippingPolicyParagraph,
            ])
        </form>
    </div>
@stop
