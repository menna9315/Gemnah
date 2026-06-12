@extends('adminlte::page')

@section('title', 'Shipping Fees')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Shipping Fees</h1>

        @if ($shippingFee)
            <a href="{{ route('backend.shipping-fees.edit', $shippingFee) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i>
                Edit Shipping Fee
            </a>
        @else
            <a href="{{ route('backend.shipping-fees.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Add Shipping Fee
            </a>
        @endif
    </div>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover mb-0">
                <tbody>
                    @if ($shippingFee)
                        <tr>
                            <th style="width: 220px;">City</th>
                            <td>{{ $shippingFee->city }}</td>
                        </tr>
                        <tr>
                            <th>Shipping Fee</th>
                            <td>EGP {{ number_format((float) $shippingFee->amount, 2) }}</td>
                        </tr>
                    @else
                        <tr>
                            <td class="text-center py-4">No shipping fee record yet.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop
