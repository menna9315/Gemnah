@extends('adminlte::page')

@section('title', 'Create Privacy Policy')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Create Privacy Policy Paragraph</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.privacy-policy.store') }}" method="post">
            @csrf

            @include('backend::privacy-policy.partials.form', [
                'privacyPolicyParagraph' => $privacyPolicyParagraph,
            ])
        </form>
    </div>
@stop
