@extends('adminlte::page')

@section('title', 'Create Exchange & Refund Policy')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Create Exchange & Refund Policy Paragraph</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.exchange-refund-policy.store') }}" method="post">
            @csrf

            @include('backend::exchange-refund-policy.partials.form', [
                'exchangeRefundPolicyParagraph' => $exchangeRefundPolicyParagraph,
            ])
        </form>
    </div>
@stop
