@extends('adminlte::page')

@section('title', 'Shipping Fees')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Shipping Fees</h1>

        <a href="{{ route('backend.shipping-fees.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Create Shipping Fee
        </a>
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
                <thead>
                    <tr>
                        <th>City</th>
                        <th>Shipping Fee</th>
                        <th style="width: 130px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($shippingFees as $shippingFee)
                        <tr>
                            <td>{{ $shippingFee->city }}</td>
                            <td>EGP {{ number_format((float) $shippingFee->amount, 2) }}</td>
                            <td>
                                <a href="{{ route('backend.shipping-fees.edit', $shippingFee) }}"
                                    class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4">No shipping fees yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
