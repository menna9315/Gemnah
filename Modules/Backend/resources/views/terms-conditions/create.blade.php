@extends('adminlte::page')

@section('title', 'Create Terms & Conditions')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Create Terms & Conditions Paragraph</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.terms-conditions.store') }}" method="post">
            @csrf

            @include('backend::terms-conditions.partials.form', [
                'termsConditionsParagraph' => $termsConditionsParagraph,
            ])
        </form>
    </div>
@stop
