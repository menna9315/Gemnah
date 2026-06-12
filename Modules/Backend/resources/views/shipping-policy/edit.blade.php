@extends('adminlte::page')

@section('title', 'Edit Shipping Policy')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Edit Shipping Policy Paragraph</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.shipping-policy.update', $shippingPolicyParagraph) }}" method="post">
            @csrf
            @method('PUT')

            @include('backend::shipping-policy.partials.form', [
                'shippingPolicyParagraph' => $shippingPolicyParagraph,
            ])
        </form>
    </div>
@stop
