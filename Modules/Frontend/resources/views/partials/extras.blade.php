@php
    $menuCategories = $frontendMenuCategories ?? collect();
    $customerIsSignedIn = auth('customer')->check();
    $customerAccountUrl = $customerIsSignedIn ? route('frontend.account') : route('frontend.login');
@endphp

<!-- mobile-menu start -->
        <div class="mobile-menu d-xl-none position-fixed top-0 bottom-0 body-bg z-index-5 invisible box-shadow" id="mobile-menu">
            <div class="mobile-contents d-flex flex-column">
                <div class="menu-close ptb-10 plr-15 beb">
                    <button type="button" class="menu-close-btn d-block body-secondary-color icon-16 ms-auto" aria-label="Menu close"><i class="ri-close-large-line d-block lh-1"></i></button>
                </div>
                <div class="mobilemenu-content beb">
                    <div class="main-wrap">
                        <ul class="menu-ul">
                            <li class="menu-li bst">
                                <div class="menu-btn">
                                    <span class="d-block ptb-10 plr-15"><a href="{{ route('frontend.home') }}" class="d-inline-block body-color text-uppercase heading-weight">Home</a></span>
                                </div>
                            </li>
                            <li class="menu-li bst">
                                <div class="menu-btn">
                                    <span class="d-block ptb-10 plr-15"><a href="{{ route('frontend.about-us') }}" class="d-inline-block body-color text-uppercase heading-weight">About</a></span>
                                </div>
                            </li>
                            <li class="menu-li bst">
                                <div class="menu-btn d-flex flex-row-reverse">
                                    <button type="button" class="width-48 icon-16 ptb-10 bsl" data-bs-toggle="collapse" data-bs-target="#menu-products" aria-expanded="false" aria-label="Products menu"><i class="ri-add-line d-block lh-1"></i></button>
                                    <span class="width-calc-48 ptb-10 plr-15"><a href="{{ route('frontend.products.index') }}" class="d-inline-block body-color text-uppercase heading-weight">Products</a></span>
                                </div>
                                <div class="menu-dropdown collapse" id="menu-products">
                                    <ul class="menudrop-ul">
                                        @forelse ($menuCategories as $menuCategory)
                                            <li class="menudrop-li bst">
                                                <span class="d-block ptb-10 psl-20 per-15">
                                                    <a href="{{ route('frontend.products.category', $menuCategory->slug) }}" class="d-inline-block body-color">{{ $menuCategory->title }}</a>
                                                </span>
                                            </li>
                                        @empty
                                            <li class="menudrop-li bst">
                                                <span class="d-block ptb-10 psl-20 per-15 body-color">No categories yet</span>
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                            </li>
                            <li class="menu-li bst">
                                <div class="menu-btn">
                                    <span class="d-block ptb-10 plr-15"><a href="{{ route('frontend.contact-us') }}" class="d-inline-block body-color text-uppercase heading-weight">Contact Us</a></span>
                                </div>
                            </li>
                            <li class="menu-li bst">
                                <div class="menu-btn">
                                    <span class="d-block ptb-10 plr-15"><a href="{{ $customerAccountUrl }}" class="d-inline-block body-color text-uppercase heading-weight">Account</a></span>
                                </div>
                            </li>
                            @if ($customerIsSignedIn)
                                <li class="menu-li bst">
                                    <div class="menu-btn">
                                        <span class="d-block ptb-10 plr-15"><a href="{{ route('frontend.orders') }}" class="d-inline-block body-color text-uppercase heading-weight">Your Orders</a></span>
                                    </div>
                                </li>
                                <li class="menu-li bst">
                                    <div class="menu-btn">
                                        <span class="d-block ptb-10 plr-15">
                                            <form action="{{ route('frontend.logout') }}" method="post" class="m-0">
                                                @csrf
                                                <button type="submit" class="d-inline-block body-color text-uppercase heading-weight bg-transparent border-0 p-0">
                                                    Sign out
                                                </button>
                                            </form>
                                        </span>
                                    </div>
                                </li>
                            @else
                                <li class="menu-li bst">
                                    <div class="menu-btn">
                                        <span class="d-block ptb-10 plr-15"><a href="{{ route('frontend.login') }}" class="d-inline-block body-color text-uppercase heading-weight">Sign in</a></span>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile-menu end -->
        <!-- search-modal start -->
        <div class="search-modal modal fade" id="searchmodal">
            <div class="modal-dialog mw-100 m-0">
                <div class="modal-content body-bg border-0 rounded-0">
                    <div class="modal-body p-0">
                        <div class="container">
                            <div class="search-content ptb-30">
                                <div class="search-box d-flex flex-row-reverse">
                                    <button type="button" class="d-block search-close body-secondary-color icon-16" data-bs-dismiss="modal" aria-label="Close"><i class="ri-close-large-line d-block lh-1"></i></button>
                                    <form method="get" action="javascript:void(0)" class="search-form w-100">
                                        <div class="search-bar position-relative">
                                            <div class="form-search d-flex flex-row-reverse">
                                                <input type="search" name="search-input" class="search-input w-100 h-auto ptb-0 plr-15 bg-transparent border-0" value="" placeholder="Search here" required>
                                                <button type="submit" onclick="window.location.href='search-product.html'" class="d-block search-btn body-secondary-color icon-16" aria-label="Go to search" disabled><i class="ri-search-line d-block lh-1"></i></button>
                                            </div>
                                            <div class="d-none search-results position-absolute top-100 start-0 end-0 body-bg z-1 border-full border-radius box-shadow">
                                                <div class="search-for ptb-10 plr-15 beb">Search for <span class="search-text">a</span></div>
                                                <ul class="search-ul">
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="{{ asset('frontend/assets') }}/image/search/search-product1.jpg" class="w-100 img-fluid border-radius" alt="search-product1"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Luna velvet sofa</span>
                                                        </a>
                                                    </li>
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="{{ asset('frontend/assets') }}/image/search/search-product2.jpg" class="w-100 img-fluid border-radius" alt="search-product2"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Aurora storage bed</span>
                                                        </a>
                                                    </li>
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="{{ asset('frontend/assets') }}/image/search/search-product3.jpg" class="w-100 img-fluid border-radius" alt="search-product3"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Cavelo oak dining set</span>
                                                        </a>
                                                    </li>
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="{{ asset('frontend/assets') }}/image/search/search-product4.jpg" class="w-100 img-fluid border-radius" alt="search-product4"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Dexon work desk</span>
                                                        </a>
                                                    </li>
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="{{ asset('frontend/assets') }}/image/search/search-product5.jpg" class="w-100 img-fluid border-radius" alt="search-product5"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Riva patio chair set</span>
                                                        </a>
                                                    </li>
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="{{ asset('frontend/assets') }}/image/search/search-product6.jpg" class="w-100 img-fluid border-radius" alt="search-product6"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Modo side cabinet</span>
                                                        </a>
                                                    </li>
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="{{ asset('frontend/assets') }}/image/search/search-product7.jpg" class="w-100 img-fluid border-radius" alt="search-product7"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Bunny bunk bed</span>
                                                        </a>
                                                    </li>
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="{{ asset('frontend/assets') }}/image/search/search-product8.jpg" class="w-100 img-fluid border-radius" alt="search-product8"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Milo nesting tables</span>
                                                        </a>
                                                    </li>
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="{{ asset('frontend/assets') }}/image/search/search-product9.jpg" class="w-100 img-fluid border-radius" alt="search-product9"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Halo pendant light</span>
                                                        </a>
                                                    </li>
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="{{ asset('frontend/assets') }}/image/search/search-product10.jpg" class="w-100 img-fluid border-radius" alt="search-product10"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Vera lounge chair</span>
                                                        </a>
                                                    </li>
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="{{ asset('frontend/assets') }}/image/search/search-product11.jpg" class="w-100 img-fluid border-radius" alt="search-product11"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Arlo coffee table</span>
                                                        </a>
                                                    </li>
                                                    <li class="search-li ptb-5 plr-15 bst">
                                                        <a href="product.html" class="body-primary-color d-flex flex-wrap align-items-center">
                                                            <span class="width-48"><img src="{{ asset('frontend/assets') }}/image/search/search-product12.jpg" class="w-100 img-fluid border-radius" alt="search-product12"></span>
                                                            <span class="width-calc-48 psl-15 text-truncate">Noko wall shelf</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="search-more ptb-10 plr-15 bst"><a href="search-product.html" class="body-secondary-color text-decoration-underline">See all results (12)</a></div>
                                                <div class="search-fail ptb-10 plr-15">Search not found</div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="search-example-text mst-15">Trending search: a, e, chair...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- search-modal end -->
        @include('frontend::partials.cart-drawer')
        <!-- bottom-menu start -->
        <div class="bottom-menu d-md-none position-sticky bottom-0 body-bg z-1 box-shadow">
            <div class="bottom-menu-element d-flex flex-wrap align-items-center">
                <div class="col">
                    <a href="{{ route('frontend.home') }}" class="d-flex flex-column align-items-center ptb-10 text-center">
                        <span class="bottom-menu-icon heading-color icon-16"><i class="ri-home-8-line d-block lh-1"></i></span>
                        <span class="bottom-menu-title body-color font-10 mst-4 text-uppercase lh-1">Home</span>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ $customerAccountUrl }}" class="d-flex flex-column align-items-center ptb-10 text-center">
                        <span class="bottom-menu-icon heading-color icon-16"><i class="ri-user-3-line d-block lh-1"></i></span>
                        <span class="bottom-menu-title body-color font-10 mst-4 text-uppercase lh-1">Account</span>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('frontend.products.index') }}" class="d-flex flex-column align-items-center ptb-10 text-center">
                        <span class="bottom-menu-icon heading-color icon-16"><i class="ri-layout-grid-line d-block lh-1"></i></span>
                        <span class="bottom-menu-title body-color font-10 mst-4 text-uppercase lh-1">Shop</span>
                    </a>
                </div>
                <div class="col">
                    @if ($customerIsSignedIn)
                        <a href="{{ route('frontend.orders') }}" class="d-flex flex-column align-items-center ptb-10 text-center">
                            <span class="bottom-menu-icon heading-color icon-16"><i class="ri-file-list-3-line d-block lh-1"></i></span>
                            <span class="bottom-menu-title body-color font-10 mst-4 text-uppercase lh-1">Orders</span>
                        </a>
                    @else
                        <a href="wishlist.html" class="d-flex flex-column align-items-center ptb-10 text-center">
                            <span class="bottom-menu-icon-wrap position-relative per-7">
                                <span class="d-block bottom-menu-icon heading-color icon-16"><i class="ri-heart-line d-block lh-1"></i></span>
                                <span class="bottom-menu-counter wishlist-counter extra-color font-10 position-absolute end-0 secondary-bg d-flex align-items-center justify-content-center rounded-circle">4</span>
                            </span>
                            <span class="bottom-menu-title body-color font-10 mst-4 text-uppercase lh-1">Wishlist</span>
                        </a>
                    @endif
                </div>
                <div class="col">
                    <a href="javascript:void(0)" class="js-cart-drawer d-flex flex-column align-items-center ptb-10 text-center">
                        <span class="bottom-menu-icon-wrap position-relative per-7">
                            <span class="d-block bottom-menu-icon heading-color icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                            <span class="bottom-menu-counter cart-counter extra-color font-10 position-absolute end-0 secondary-bg d-flex align-items-center justify-content-center rounded-circle">{{ $frontendCartCount ?? 0 }}</span>
                        </span>
                        <span class="bottom-menu-title body-color font-10 mst-4 text-uppercase lh-1">Cart</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- bottom-menu end -->
        <!-- bg-screen start -->
        <div class="bg-screen">
            <div class="bg-back position-fixed top-0 end-0 bottom-0 start-0 bg-black z-index-4 opacity-0 invisible"></div>
            <div class="bg-shop position-fixed top-0 end-0 bottom-0 start-0 bg-black z-index-4 opacity-0 invisible"></div>
        </div>
        <!-- bg-screen end -->
        <!-- back-to-top start -->
        <a href="javascript:void(0)" id="top" class="icon-16 secondary-btn position-fixed width-32 height-32 d-flex align-items-center justify-content-center z-1 opacity-0 invisible rounded-circle" aria-label="Back to top"><i class="ri-arrow-up-line d-block lh-1"></i></a>
        <!-- back-to-top end -->
