@extends('adminlte::page')

@section('title', 'Size Details')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Size Details</h1>
        <a href="{{ route('backend.sizes.edit', $size) }}" class="btn btn-primary">
            <i class="fas fa-edit"></i>
            Edit Size
        </a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <dl class="row collection-details">
                <dt class="col-sm-3">Value</dt>
                <dd class="col-sm-9">{{ $size->value }}</dd>

                <dt class="col-sm-3">Size Chart</dt>
                <dd class="col-sm-9">
                    @if ($size->size_chart_image)
                        <img src="{{ asset($size->size_chart_image) }}" alt="{{ $size->value }}"
                            class="size-chart-detail-image">
                    @else
                        <div class="size-chart-detail-empty">No image</div>
                    @endif
                </dd>
            </dl>
        </div>

        <div class="card-footer">
            <a href="{{ route('backend.sizes.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i>
                Back
            </a>
        </div>
    </div>
@stop
