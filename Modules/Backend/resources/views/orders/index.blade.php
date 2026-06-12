@extends('adminlte::page')

@section('title', 'Orders')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <h1>Orders</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Customer</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Payment</th>
                        <th class="text-center" style="width: 90px;">Items</th>
                        <th style="width: 130px;">Total</th>
                        <th style="width: 160px;">Placed At</th>
                        <th class="text-right" style="width: 120px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        @php
                            $status = (string) ($order->status ?: 'pending');
                            $paymentStatus = (string) ($order->payment_status ?: 'unpaid');
                        @endphp

                        <tr>
                            <td>
                                <strong>{{ $order->order_number }}</strong>
                                @if ($order->shippingAddress?->city)
                                    <small class="d-block text-muted">{{ $order->shippingAddress->city }}</small>
                                @endif
                            </td>
                            <td>
                                {{ $order->customer_name }}
                                <small class="d-block text-muted">{{ $order->customer_email }}</small>
                            </td>
                            <td>{{ $order->customer_phone }}</td>
                            <td>
                                <span class="badge order-status-badge order-status-{{ str_replace('_', '-', $status) }}">
                                    {{ ucwords(str_replace('_', ' ', $status)) }}
                                </span>
                            </td>
                            <td>{{ ucwords(str_replace('_', ' ', $paymentStatus)) }}</td>
                            <td class="text-center">{{ $order->items_count }}</td>
                            <td>EGP {{ number_format((float) $order->total_amount, 2) }}</td>
                            <td>{{ optional($order->placed_at ?: $order->created_at)->format('Y-m-d H:i') }}</td>
                            <td class="text-right">
                                <a href="{{ route('backend.orders.show', $order) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                    Details
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-4">No orders yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($orders->hasPages())
            <div class="card-footer">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
@stop
