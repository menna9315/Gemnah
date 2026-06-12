@php
    $cartItems = $frontendCartItems ?? collect();
    $cartCount = $frontendCartCount ?? 0;
    $cartSubtotal = $frontendCartSubtotal ?? 0;
    $continueShoppingUrl = $firstMenuCategory
        ? route('frontend.products.category', $firstMenuCategory->slug)
        : route('frontend.home');
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
                            @endphp

                            <div class="cart-drawer-info ptb-15 bst">
                                <div class="cart-drawer-content d-flex flex-wrap">
                                    <div class="cart-drawer-image width-88">
                                        <a href="{{ $itemUrl }}" class="d-block br-hidden">
                                            <img src="{{ asset($itemImage) }}" class="w-100 img-fluid" alt="{{ $productItem?->title ?: 'Cart item' }}">
                                        </a>
                                    </div>
                                    <div class="cart-drawer-info width-calc-88 psl-15">
                                        <div class="cart-drawer-detail">
                                            <a href="{{ $itemUrl }}" class="primary-link">{{ $productItem?->title ?: 'Product item' }}</a>
                                            <span class="d-block mst-6">
                                                Qty {{ $cartItem->quantity }}
                                                @if ($productItem?->color || $productItem?->size)
                                                    /
                                                    {{ collect([$productItem?->color?->name, $productItem?->size?->value])->filter()->implode(' / ') }}
                                                @endif
                                            </span>
                                        </div>
                                        <div class="heading-color heading-weight mst-6">
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
                        <span class="heading-color heading-weight">EGP {{ number_format($cartSubtotal, 2) }}</span>
                    </div>
                    <div class="font-12 mst-7">Shipping and taxes are confirmed at checkout.</div>
                    <div class="drawer-cart-checkout mst-12">
                        <a href="{{ route('frontend.checkout') }}" class="w-100 btn-style secondary-btn">
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
