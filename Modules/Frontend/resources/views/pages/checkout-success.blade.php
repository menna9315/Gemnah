@extends('frontend::layouts.app')

@section('title', 'Order Placed - GEMNAH')

@section('content')
    <div class="breadcrumb-area ptb-30 bg-img text-center gemnah-about-template-banner"
        data-bgimg="{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}"
        style="background-image: url('{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}')">
        <div class="container">
            <h2 class="extra-color font-24 font-xl-32 mst-4 mst-xl-7">Order placed</h2>
        </div>
    </div>

    <main id="main">
        <section class="gemnah-checkout-content">
            <div class="container">
                <div class="gemnah-checkout-success">
                    <span><i class="ri-check-line"></i></span>
                    <h1>Thank you for your order</h1>
                    <p>Your order number is <strong>{{ $order->order_number }}</strong>.</p>

                    <div class="gemnah-checkout-total">
                        <span>Subtotal</span>
                        <strong>EGP {{ number_format((float) $order->subtotal, 2) }}</strong>
                    </div>

                    <div class="gemnah-checkout-total">
                        <span>Shipping</span>
                        <strong>EGP {{ number_format((float) $order->shipping_amount, 2) }}</strong>
                    </div>

                    <div class="gemnah-checkout-total">
                        <span>Total</span>
                        <strong>EGP {{ number_format((float) $order->total_amount, 2) }}</strong>
                    </div>

                    <a href="{{ route('frontend.home') }}" class="btn-style secondary-btn gemnah-checkout-success-action">
                        Continue shopping
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection
