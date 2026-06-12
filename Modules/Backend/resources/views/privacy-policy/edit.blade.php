@extends('adminlte::page')

@section('title', 'Edit Privacy Policy')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Edit Privacy Policy Paragraph</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('backend.privacy-policy.update', $privacyPolicyParagraph) }}" method="post">
            @csrf
            @method('PUT')

            @include('backend::privacy-policy.partials.form', [
                'privacyPolicyParagraph' => $privacyPolicyParagraph,
            ])
        </form>
    </div>
@stop
