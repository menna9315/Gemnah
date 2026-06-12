@extends('adminlte::page')

@section('title', 'Edit Terms & Conditions')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Edit Terms & Conditions Paragraph</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.terms-conditions.update', $termsConditionsParagraph) }}" method="post">
            @csrf
            @method('PUT')

            @include('backend::terms-conditions.partials.form', [
                'termsConditionsParagraph' => $termsConditionsParagraph,
            ])
        </form>
    </div>
@stop
