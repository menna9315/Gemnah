@extends('adminlte::page')

@section('title', 'Order Details')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend-theme.css') }}">
@stop

@section('content_header')
    <div class="d-flex flex-wrap align-items-center justify-content-between">
        <div>
            <h1 class="mb-1">Order Details</h1>
            <div class="text-muted">{{ $order->order_number }}</div>
        </div>

        <a href="{{ route('backend.orders.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i>
            Back
        </a>
    </div>
@stop

@section('content')
    @php
        $status = (string) ($order->status ?: 'pending');
        $paymentStatus = (string) ($order->payment_status ?: 'unpaid');
        $shippingAddress = $order->shippingAddress;
    @endphp

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
        <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
            <div>
                <span class="badge order-status-badge order-status-{{ str_replace('_', '-', $status) }}">
                    {{ ucwords(str_replace('_', ' ', $status)) }}
                </span>
                <span class="badge badge-light border ml-1">
                    Payment: {{ ucwords(str_replace('_', ' ', $paymentStatus)) }}
                </span>
            </div>

            <div class="ml-auto">
                @if ($status === 'pending')
                    <form action="{{ route('backend.orders.confirm', $order) }}" method="post"
                        onsubmit="return confirm('Confirm this order?')">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check"></i>
                            Confirm Order
                        </button>
                    </form>
                @elseif ($status === 'confirmed')
                    <form action="{{ route('backend.orders.shipping-company', $order) }}" method="post"
                        onsubmit="return confirm('Confirm this order in shipping company?')">
                        @csrf
                        <button type="submit" class="btn btn-info">
                            <i class="fas fa-shipping-fast"></i>
                            Confirm in Shipping Company
                        </button>
                    </form>
                @elseif ($status === 'shipping_company')
                    <form action="{{ route('backend.orders.deliver', $order) }}" method="post"
                        onsubmit="return confirm('Mark this order as delivered to customer?')">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-box-open"></i>
                            Delivered to Customer
                        </button>
                    </form>
                @else
                    <span class="text-muted">No action available for this status.</span>
                @endif
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <div class="order-detail-panel h-100">
                        <h5>Customer</h5>
                        <dl class="mb-0">
                            <dt>Name</dt>
                            <dd>{{ $order->customer_name }}</dd>

                            <dt>Email</dt>
                            <dd>{{ $order->customer_email }}</dd>

                            <dt>Phone</dt>
                            <dd>{{ $order->customer_phone }}</dd>
                        </dl>
                    </div>
                </div>

                <div class="col-lg-4 mb-3">
                    <div class="order-detail-panel h-100">
                        <h5>Shipping Address</h5>
                        @if ($shippingAddress)
                            <dl class="mb-0">
                                <dt>Name</dt>
                                <dd>{{ $shippingAddress->full_name }}</dd>

                                <dt>Phone</dt>
                                <dd>{{ $shippingAddress->phone }}</dd>

                                <dt>City</dt>
                                <dd>{{ $shippingAddress->city }}</dd>

                                @if ($shippingAddress->area)
                                    <dt>Area</dt>
                                    <dd>{{ $shippingAddress->area }}</dd>
                                @endif

                                <dt>Address</dt>
                                <dd>{!! nl2br(e($shippingAddress->address_line)) !!}</dd>
                            </dl>
                        @else
                            <p class="mb-0 text-muted">No shipping address saved for this order.</p>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4 mb-3">
                    <div class="order-detail-panel h-100">
                        <h5>Order Summary</h5>
                        <dl class="mb-0">
                            <dt>Placed At</dt>
                            <dd>{{ optional($order->placed_at ?: $order->created_at)->format('Y-m-d H:i') }}</dd>

                            <dt>Payment Method</dt>
                            <dd>{{ ucwords(str_replace('_', ' ', (string) $order->payment_method)) ?: 'N/A' }}</dd>

                            <dt>Subtotal</dt>
                            <dd>EGP {{ number_format((float) $order->subtotal, 2) }}</dd>

                            <dt>Shipping</dt>
                            <dd>EGP {{ number_format((float) $order->shipping_amount, 2) }}</dd>

                            <dt>Total</dt>
                            <dd class="font-weight-bold">EGP {{ number_format((float) $order->total_amount, 2) }}</dd>
                        </dl>
                    </div>
                </div>
            </div>

            @if ($order->notes)
                <div class="order-detail-panel mb-3">
                    <h5>Order Notes</h5>
                    <p class="mb-0">{!! nl2br(e($order->notes)) !!}</p>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-bordered mb-0">
                    <thead>
                        <tr>
                            <th style="width: 88px;">Image</th>
                            <th>Item</th>
                            <th>Code</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th class="text-center" style="width: 90px;">Qty</th>
                            <th style="width: 130px;">Unit Price</th>
                            <th style="width: 130px;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($order->items as $item)
                            @php
                                $productItem = $item->productItem;
                                $product = $productItem?->product;
                                $image = $productItem?->image
                                    ?: $productItem?->home_image
                                    ?: $product?->image
                                    ?: 'frontend/assets/image/product/p-1.jpg';
                            @endphp

                            <tr>
                                <td>
                                    <img src="{{ asset($image) }}" alt="{{ $item->item_title }}" class="order-item-thumb">
                                </td>
                                <td>
                                    @if ($item->product_title)
                                        <span class="d-block text-muted">{{ $item->product_title }}</span>
                                    @endif
                                    <strong>{{ $item->item_title }}</strong>
                                </td>
                                <td>{{ $item->item_code ?: '-' }}</td>
                                <td>{{ $item->color_name ?: '-' }}</td>
                                <td>{{ $item->size_value ?: '-' }}</td>
                                <td class="text-center">{{ $item->quantity }}</td>
                                <td>EGP {{ number_format((float) $item->unit_price, 2) }}</td>
                                <td>EGP {{ number_format((float) $item->total_price, 2) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">No items found for this order.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
