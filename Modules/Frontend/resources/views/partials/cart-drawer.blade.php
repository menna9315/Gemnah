@php
    $cartItems = $frontendCartItems ?? collect();
    $cartCount = $frontendCartCount ?? 0;
    $cartSubtotal = $frontendCartSubtotal ?? 0;
    $continueShoppingUrl = route('frontend.products.index');
@endphp

<!-- cart-drawer start -->
<div class="cart-drawer position-fixed top-0 bottom-0 body-bg z-index-5 invisible box-shadow" id="cart-drawer">
    <div class="drawer-contents d-flex flex-column">
        <div class="drawer-fixed-header ptb-10 plr-15 beb">
            <div class="drawer-header d-flex align-items-center justify-content-between">
                <h6 class="font-18">My shopping cart</h6>
                <div class="drawer-close">
                    <button type="button" class="drawer-close-btn body-secondary-color icon-16" aria-label="Close">
                        <i class="ri-close-large-line d-block lh-1"></i>
                    </button>
                </div>
            </div>
        </div>

        @if ($cartItems->isEmpty())
            <div class="drawer-cart-empty h-100 ptb-30 plr-15">
                <div class="drawer-scrollable h-100 d-flex flex-column align-items-center justify-content-center text-center">
                    <span class="heading-color icon-32 meb-21"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                    <h2 class="font-24">No items in your shopping cart yet.</h2>
                    <a href="{{ $continueShoppingUrl }}" class="btn-style secondary-btn mst-21">Continue shopping</a>
                </div>
            </div>
        @else
            <div class="drawer-inner h-100 d-flex flex-column justify-content-between overflow-hidden">
                <div class="drawer-scrollable h-100 overflow-auto">
                    <div class="cart-drawer-table plr-15">
                        @foreach ($cartItems as $cartItem)
                            @php
                                $productItem = $cartItem->productItem;
                                $product = $productItem?->product;
                                $category = $product?->category;
                                $itemUrl = $productItem && $category
                                    ? route('frontend.products.item', [$category->slug, $productItem->slug])
                                    : 'javascript:void(0)';
                                $itemImage = $productItem?->image
                                    ?: $productItem?->home_image
                                    ?: $product?->image
                                    ?: 'frontend/assets/image/product/p-1.jpg';
                                $cartQuantity = (int) $cartItem->quantity;
                                $cartQuantityMax = (int) $productItem?->stock_quantity > 0
                                    ? min((int) $productItem->stock_quantity, 99)
                                    : 99;
                                $itemOptions = collect([$productItem?->color?->name, $productItem?->size?->value])
                                    ->filter()
                                    ->implode(' / ');
                            @endphp

                            <div class="cart-drawer-info ptb-15 bst gemnah-cart-line" data-cart-line-id="{{ $cartItem->id }}">
                                <div class="cart-drawer-content d-flex flex-wrap">
                                    <div class="cart-drawer-image width-88">
                                        <a href="{{ $itemUrl }}" class="d-block br-hidden">
                                            <img src="{{ asset($itemImage) }}" class="w-100 img-fluid" alt="{{ $productItem?->title ?: 'Cart item' }}">
                                        </a>
                                    </div>
                                    <div class="cart-drawer-info width-calc-88 psl-15">
                                        <div class="cart-drawer-detail">
                                            <a href="{{ $itemUrl }}" class="primary-link">{{ $productItem?->title ?: 'Product item' }}</a>
                                            @if ($itemOptions)
                                                <span class="d-block mst-6">{{ $itemOptions }}</span>
                                            @endif
                                        </div>
                                        <div class="gemnah-cart-quantity mst-8" aria-label="Cart quantity">
                                            <form action="{{ route('frontend.cart.items.update', $cartItem) }}" method="post" class="js-cart-quantity-form">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="quantity" value="{{ max(1, $cartQuantity - 1) }}" class="js-cart-quantity-input">
                                                <button type="submit" class="gemnah-cart-quantity-btn js-cart-quantity-decrease" aria-label="Decrease quantity" @disabled($cartQuantity <= 1)>
                                                    <i class="ri-subtract-line"></i>
                                                </button>
                                            </form>

                                            <span class="gemnah-cart-quantity-value js-cart-quantity-value">{{ $cartQuantity }}</span>

                                            <form action="{{ route('frontend.cart.items.update', $cartItem) }}" method="post" class="js-cart-quantity-form">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="quantity" value="{{ min($cartQuantityMax, $cartQuantity + 1) }}" class="js-cart-quantity-input">
                                                <button type="submit" class="gemnah-cart-quantity-btn js-cart-quantity-increase" aria-label="Increase quantity" @disabled($cartQuantity >= $cartQuantityMax)>
                                                    <i class="ri-add-line"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="heading-color heading-weight mst-6 js-cart-line-total">
                                            EGP {{ number_format((float) $cartItem->total_price, 2) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="drawer-footer ptb-15 plr-15 bst">
                    <div class="drawer-total d-flex justify-content-between">
                        <span>Subtotal</span>
                        <span class="heading-color heading-weight js-cart-subtotal">EGP {{ number_format($cartSubtotal, 2) }}</span>
                    </div>
                    <div class="font-12 mst-7">Shipping and taxes are confirmed at checkout.</div>
                    <div class="drawer-cart-checkout mst-12">
                        <a href="{{ route('frontend.checkout') }}" class="w-100 btn-style secondary-btn js-cart-checkout-link">
                            Checkout {{ $cartCount ? '('.$cartCount.')' : '' }}
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<!-- cart-drawer end -->

@if (session('cart_open'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var drawer = document.getElementById('cart-drawer');
            var backdrop = document.querySelector('.bg-screen .bg-shop');

            if (drawer) {
                drawer.classList.remove('invisible');
                drawer.classList.add('active', 'visible');
            }

            if (backdrop) {
                backdrop.classList.remove('opacity-0', 'invisible');
                backdrop.classList.add('opacity-50', 'visible');
            }
        });
    </script>
@endif

@once
    <script>
        document.addEventListener('submit', function (event) {
            var form = event.target.closest('.js-cart-quantity-form');

            if (! form) {
                return;
            }

            event.preventDefault();

            if (form.dataset.loading === 'true') {
                return;
            }

            var quantityWrap = form.closest('.gemnah-cart-quantity');
            var line = form.closest('.gemnah-cart-line');
            var buttons = quantityWrap ? Array.prototype.slice.call(quantityWrap.querySelectorAll('.gemnah-cart-quantity-btn')) : [];
            var previousButtonState = buttons.map(function (button) {
                return {
                    button: button,
                    disabled: button.disabled
                };
            });

            form.dataset.loading = 'true';
            buttons.forEach(function (button) {
                button.disabled = true;
            });

            fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                credentials: 'same-origin',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(function (response) {
                    return response.json().then(function (data) {
                        if (! response.ok) {
                            throw data;
                        }

                        return data;
                    });
                })
                .then(function (data) {
                    var quantityValue = quantityWrap ? quantityWrap.querySelector('.js-cart-quantity-value') : null;
                    var decreaseButton = quantityWrap ? quantityWrap.querySelector('.js-cart-quantity-decrease') : null;
                    var increaseButton = quantityWrap ? quantityWrap.querySelector('.js-cart-quantity-increase') : null;
                    var decreaseInput = decreaseButton ? decreaseButton.closest('form').querySelector('.js-cart-quantity-input') : null;
                    var increaseInput = increaseButton ? increaseButton.closest('form').querySelector('.js-cart-quantity-input') : null;
                    var lineTotal = line ? line.querySelector('.js-cart-line-total') : null;
                    var subtotal = document.querySelector('.js-cart-subtotal');
                    var checkoutLink = document.querySelector('.js-cart-checkout-link');

                    if (quantityValue) {
                        quantityValue.textContent = data.quantity;
                    }

                    if (decreaseInput) {
                        decreaseInput.value = data.decrease_quantity;
                    }

                    if (increaseInput) {
                        increaseInput.value = data.increase_quantity;
                    }

                    if (decreaseButton) {
                        decreaseButton.disabled = ! data.can_decrease;
                    }

                    if (increaseButton) {
                        increaseButton.disabled = ! data.can_increase;
                    }

                    if (lineTotal) {
                        lineTotal.textContent = data.line_total;
                    }

                    if (subtotal) {
                        subtotal.textContent = data.subtotal;
                    }

                    if (checkoutLink) {
                        checkoutLink.textContent = data.checkout_text;
                    }

                    document.querySelectorAll('.cart-counter').forEach(function (counter) {
                        counter.textContent = data.cart_count;
                    });
                })
                .catch(function (data) {
                    previousButtonState.forEach(function (state) {
                        state.button.disabled = state.disabled;
                    });

                    if (data && data.message) {
                        alert(data.message);
                    }
                })
                .finally(function () {
                    delete form.dataset.loading;
                });
        });
    </script>
@endonce
