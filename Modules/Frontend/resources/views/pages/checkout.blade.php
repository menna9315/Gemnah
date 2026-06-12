@extends('frontend::layouts.app')

@section('title', 'Checkout - GEMNAH')

@section('content')
    @php
        $cartItems = $cart?->items ?? collect();
        $cartSubtotal = $cart ? (float) $cart->subtotal : 0;
    @endphp

    <div class="breadcrumb-area ptb-30 bg-img text-center gemnah-about-template-banner"
        data-bgimg="{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}"
        style="background-image: url('{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}')">
        <div class="container">
            <h2 class="extra-color font-24 font-xl-32 mst-4 mst-xl-7">Checkout</h2>
        </div>
    </div>

    <main id="main">
        <section class="gemnah-checkout-content">
            <div class="container">
                @if ($cartItems->isEmpty())
                    <div class="gemnah-checkout-empty text-center">
                        <span><i class="ri-shopping-bag-3-line"></i></span>
                        <h1>Your cart is empty</h1>
                        <p>Add a product item to your cart before checkout.</p>
                        <a href="{{ route('frontend.home') }}" class="btn-style secondary-btn">Continue shopping</a>
                    </div>
                @else
                    @if ($errors->has('cart'))
                        <div class="gemnah-checkout-error-alert">
                            {{ $errors->first('cart') }}
                        </div>
                    @endif

                    <div class="gemnah-checkout-grid">
                        <section class="gemnah-checkout-form-panel">
                            <span class="gemnah-products-kicker">Delivery details</span>
                            <h1>Complete your order</h1>

                            <form action="{{ route('frontend.checkout.store') }}" method="post" class="gemnah-checkout-form">
                                @csrf

                                <div class="field-row row">
                                    <div class="field-col col-12 col-md-6">
                                        <label for="customer_name" class="field-label">Name</label>
                                        <input type="text" name="customer_name" id="customer_name"
                                            class="w-100 @error('customer_name') msg_error @enderror"
                                            value="{{ old('customer_name', $customer?->name) }}" placeholder="Name" autocomplete="name">
                                        @error('customer_name')
                                            <small class="gemnah-auth-error">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="field-col col-12 col-md-6">
                                        <label for="customer_phone" class="field-label">Phone</label>
                                        <input type="text" name="customer_phone" id="customer_phone"
                                            class="w-100 @error('customer_phone') msg_error @enderror"
                                            value="{{ old('customer_phone', $customer?->phone) }}" placeholder="Phone" autocomplete="tel">
                                        @error('customer_phone')
                                            <small class="gemnah-auth-error">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="field-col col-12">
                                        <label for="customer_email" class="field-label">Email</label>
                                        <input type="email" name="customer_email" id="customer_email"
                                            class="w-100 @error('customer_email') msg_error @enderror"
                                            value="{{ old('customer_email', $customer?->email) }}" placeholder="Email" autocomplete="email">
                                        @error('customer_email')
                                            <small class="gemnah-auth-error">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="field-col col-12 col-md-6">
                                        <label for="city" class="field-label">City</label>
                                        <input type="text" name="city" id="city"
                                            class="w-100 @error('city') msg_error @enderror"
                                            value="Alexandria" placeholder="City" autocomplete="address-level2" readonly aria-readonly="true">
                                        @error('city')
                                            <small class="gemnah-auth-error">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="field-col col-12 col-md-6">
                                        <label for="area" class="field-label">Area</label>
                                        <input type="text" name="area" id="area"
                                            class="w-100 @error('area') msg_error @enderror"
                                            value="{{ old('area') }}" placeholder="Area">
                                        @error('area')
                                            <small class="gemnah-auth-error">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="field-col col-12">
                                        <label for="address_line" class="field-label">Address</label>
                                        <textarea name="address_line" id="address_line" rows="4"
                                            class="w-100 @error('address_line') msg_error @enderror"
                                            placeholder="Address">{{ old('address_line') }}</textarea>
                                        @error('address_line')
                                            <small class="gemnah-auth-error">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="field-col col-12">
                                        <label for="notes" class="field-label">Notes</label>
                                        <textarea name="notes" id="notes" rows="3"
                                            class="w-100 @error('notes') msg_error @enderror"
                                            placeholder="Notes">{{ old('notes') }}</textarea>
                                        @error('notes')
                                            <small class="gemnah-auth-error">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="field-col col-12">
                                        <button type="submit" class="btn-style secondary-btn gemnah-checkout-submit">
                                            Place order
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </section>

                        <aside class="gemnah-checkout-summary">
                            <h2>Order summary</h2>

                            <div class="gemnah-checkout-items">
                                @foreach ($cartItems as $cartItem)
                                    @php
                                        $productItem = $cartItem->productItem;
                                    @endphp

                                    <div class="gemnah-checkout-item">
                                        <div>
                                            <strong>{{ $productItem?->title ?: 'Product item' }}</strong>
                                            <span>Qty {{ $cartItem->quantity }}</span>
                                        </div>
                                        <b>EGP {{ number_format((float) $cartItem->total_price, 2) }}</b>
                                    </div>
                                @endforeach
                            </div>

                            <div class="gemnah-checkout-total">
                                <span>Subtotal</span>
                                <strong>EGP {{ number_format($cartSubtotal, 2) }}</strong>
                            </div>

                            <div class="gemnah-checkout-total">
                                <span>Shipping</span>
                                <strong>EGP {{ number_format($shippingAmount ?? 0, 2) }}</strong>
                            </div>

                            <div class="gemnah-checkout-total">
                                <span>Total</span>
                                <strong>EGP {{ number_format($checkoutTotal ?? $cartSubtotal, 2) }}</strong>
                            </div>
                        </aside>
                    </div>
                @endif
            </div>
        </section>
    </main>
@endsection
