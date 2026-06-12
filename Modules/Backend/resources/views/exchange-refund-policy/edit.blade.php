@extends('adminlte::page')

@section('title', 'Edit Exchange & Refund Policy')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Edit Exchange & Refund Policy Paragraph</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.exchange-refund-policy.update', $exchangeRefundPolicyParagraph) }}" method="post">
            @csrf
            @method('PUT')

            @include('backend::exchange-refund-policy.partials.form', [
                'exchangeRefundPolicyParagraph' => $exchangeRefundPolicyParagraph,
            ])
        </form>
    </div>
@stop
