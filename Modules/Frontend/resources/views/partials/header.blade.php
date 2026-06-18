@php
    $menuCategories = $frontendMenuCategories ?? collect();
    $customerIsSignedIn = auth('customer')->check();
    $customer = auth('customer')->user();
    $customerName = trim((string) ($customer?->name ?? ''));
    $customerFirstName = $customerName !== '' ? preg_split('/\s+/', $customerName)[0] : '';
    $customerAccountUrl = $customerIsSignedIn ? route('frontend.account') : route('frontend.login');
@endphp

<!-- header start -->
        <header id="header" class="main-header">
            <!-- header-top start -->
            <div class="header-top-area">
            
                <!-- header-top-first start -->
                <div class="header-top-first ptb-12 ptb-xl-15 position-relative body-bg">
                    <div class="container-fluid">
                        <div class="row align-items-center header-area">
                            <!-- header-mobile-menu start -->
                            <div class="col-3 d-xl-none header-element header-mobile-menu">
                                <a href="javascript:void(0)" class="d-inline-flex header-icon-toggler toggler-btn" aria-label="Menu toggler button">
                                    <span class="d-block header-block-icon primary-link icon-16"><i class="ri-menu-line d-block lh-1"></i></span>
                                </a>
                            </div>
                            <!-- header-mobile-menu end -->
                            <!-- header-logo start -->
                            <div class="col-6 col-xl-2 header-element header-logo">
                                <div class="header-theme-logo">
                                    <a href="{{ route('frontend.home') }}" class="d-block theme-logo">
                                        <img src="{{ asset('frontend/assets') }}/image/index/gemnah-logo-current.png" class="gemnah-frontend-logo img-fluid" alt="GEMNAH logo">
                                    </a>
                                </div>
                            </div>
                            <!-- header-logo end -->
                            <!-- header-menu start -->
                            <div class="col-xl-6 d-none d-xl-block header-element header-menu">
                                <div class="mainmenu-content">
                                    <div class="main-wrap">
                                        <ul class="menu-ul d-flex flex-wrap">
                                            <li class="menu-li">
                                                <a href="{{ route('frontend.home') }}" class="menu-link d-flex align-items-center ptb-10 plr-15">
                                                    <span class="menu-title text-uppercase heading-weight">Home</span>
                                                </a>
                                            </li>
                                            <li class="menu-li">
                                                <a href="{{ route('frontend.about-us') }}" class="menu-link d-flex align-items-center ptb-10 plr-15">
                                                    <span class="menu-title text-uppercase heading-weight">About</span>
                                                </a>
                                            </li>
                                            <li class="menu-li">
                                                <a href="{{ route('frontend.products.index') }}" class="menu-link d-flex align-items-center ptb-10 plr-15">
                                                    <span class="menu-title text-uppercase heading-weight">Products</span>
                                                    <span class="icon-16 fw-normal"><i class="ri-arrow-down-s-line d-block lh-1"></i></span>
                                                </a>
                                                <div class="menu-dropdown menu-sub collapse position-absolute top-auto body-bg z-2 DropDownSlide box-shadow gemnah-menu-dropdown">
                                                    <ul class="menudrop-ul ptb-25 gemnah-menu-dropdown-list">
                                                        <li class="menudrop-li">
                                                            <div class="ptb-5 plr-30">
                                                                <a href="{{ route('frontend.products.index') }}" class="d-inline-block body-primary-color">
                                                                    All products
                                                                </a>
                                                            </div>
                                                        </li>
                                                        @foreach ($menuCategories as $menuCategory)
                                                            <li class="menudrop-li">
                                                                <div class="ptb-5 plr-30">
                                                                    <a href="{{ route('frontend.products.category', $menuCategory->slug) }}" class="d-inline-block body-primary-color">
                                                                        {{ $menuCategory->title }}
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </li>
                                             <li class="menu-li">
                                                <a href="{{ route('frontend.contact-us') }}" class="menu-link d-flex align-items-center ptb-10 plr-15">
                                                    <span class="menu-title text-uppercase heading-weight">Contact Us</span>
                                                </a>
                                            </li>
                                            @if ($customerIsSignedIn)
                                                <li class="menu-li">
                                                    <a href="{{ route('frontend.orders') }}" class="menu-link d-flex align-items-center ptb-10 plr-15">
                                                        <span class="menu-title text-uppercase heading-weight">Your Orders</span>
                                                    </a>
                                                </li>
                                            @endif
                                          
                                        
                                          
                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- header-menu end -->
                            <!-- header-icon start -->
                            <div class="col-3 col-xl-4 header-element header-icon">
                                <div class="header-icon-block d-flex justify-content-end">
                                    <!-- header-search start -->
                                    <div class="header-search w-100 d-none d-xxl-block per-15">
                                        <div class="header-theme-search w-100">
                                            <form method="get" action="javascript:void(0)" class="search-form w-100">
                                                <div class="search-bar position-relative">
                                                    <div class="form-search w-100 height-48 d-flex ptb-10 plr-15 border-full br-hidden2">
                                                        <input type="search" name="search-input" class="search-input w-100 h-auto p-0 border-0 rounded-0" value="" placeholder="Search here" required>
                                                        <button type="submit" onclick="window.location.href='search-product.html'" class="d-block primary-link icon-16 rounded-0" aria-label="Go to search" disabled><i class="ri-search-line d-block lh-1"></i></button>
                                                    </div>
                                                    <div class="d-none search-results position-absolute top-auto start-0 end-0 body-bg z-2 border-full border-radius box-shadow">
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
                                    </div>
                                    <!-- header-search end -->
                                    <ul class="ul-mt15 flex-nowrap align-items-center header-icon-element">
                                        {{-- <li class="header-icon-wrap search-wrap d-xxl-none">
                                            <div class="header-icon-wrapper">
                                                <a href="#searchmodal" class="d-block header-icon-search" data-bs-toggle="modal" aria-label="Search modal">
                                                    <span class="header-block-icon primary-link icon-16"><i class="ri-search-line d-block lh-1"></i></span>
                                                </a>
                                            </div>
                                        </li> --}}
                                        <li class="header-icon-wrap user-wrap">
                                            <div class="header-icon-wrapper">
                                                <a href="{{ $customerAccountUrl }}" class="header-icon-user gemnah-header-account"
                                                    aria-label="{{ $customerIsSignedIn ? 'Customer account' : 'Customer login' }}">
                                                    <span class="header-block-icon primary-link icon-16"><i class="ri-user-3-line d-block lh-1"></i></span>
                                                    @if ($customerIsSignedIn)
                                                        <span class="gemnah-header-account-text">
                                                            Welcome, {{ $customer->name }}
                                                        </span>
                                                    @endif
                                                </a>
                                            </div>
                                        </li>
                                        {{-- <li class="header-icon-wrap wishlist-wrap d-none d-md-block">
                                            <div class="header-icon-wrapper">
                                                <a href="wishlist.html" class="d-block header-icon-wishlist">
                                                    <span class="d-block header-block-icon-wrap position-relative per-8 per-xl-0">
                                                        <span class="header-block-icon primary-link icon-16"><i class="ri-heart-line d-block lh-1"></i></span>
                                                        <span class="header-block-counter wishlist-counter extra-color font-12 position-absolute end-0 d-flex align-items-center justify-content-center secondary-bg rounded-circle">4</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </li> --}}
                                        <li class="header-icon-wrap cart-wrap">
                                            <div class="header-icon-wrapper">
                                                <a href="javascript:void(0)" class="d-block header-icon-cart js-cart-drawer">
                                                    <span class="d-block header-block-icon-wrap position-relative per-8 per-xl-0">
                                                        <span class="header-block-icon primary-link icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                        <span class="header-block-counter cart-counter extra-color font-12 position-absolute end-0 d-flex align-items-center justify-content-center secondary-bg rounded-circle">{{ $frontendCartCount ?? 0 }}</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- header-icon end -->
                        </div>

                        @if ($customerIsSignedIn && $customerFirstName)
                            <div class="gemnah-mobile-welcome">
                                Welcome, {{ $customerFirstName }}
                            </div>
                        @endif
                    </div>
                </div>
                <!-- header-top-first end -->
            </div>
            <!-- header-top end -->
        </header>
        <!-- header end -->
