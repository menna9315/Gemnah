@extends('adminlte::page')

@section('title', 'Color Details')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Color Details</h1>
        <a href="{{ route('backend.colors.edit', $color) }}" class="btn btn-primary">
            <i class="fas fa-edit"></i>
            Edit Color
        </a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <dl class="row collection-details">
                <dt class="col-sm-3">Name</dt>
                <dd class="col-sm-9">{{ $color->name }}</dd>

                <dt class="col-sm-3">Code</dt>
                <dd class="col-sm-9"><code>{{ $color->code }}</code></dd>

                <dt class="col-sm-3">Preview</dt>
                <dd class="col-sm-9">
                    <span class="color-detail-swatch" style="background-color: {{ $color->code }}"></span>
                </dd>
            </dl>
        </div>

        <div class="card-footer">
            <a href="{{ route('backend.colors.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i>
                Back
            </a>
        </div>
    </div>
@stop
