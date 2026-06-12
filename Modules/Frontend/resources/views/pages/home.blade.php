@extends('frontend::layouts.app')

@section('title', 'GEMNAH')

@section('content')
<!-- main start -->
        <main id="main">
            <!-- main-slider start -->
            <section class="slider-content">
                <div class="bg-img" data-bgimg="{{ asset('frontend/assets') }}/image/index/slider-bgimg.jpg">
                    <div class="container-fluid">
                        <div class="row row-mtm">
                            <div class="col-12 col-xl-9">
                                <div class="home-slider swiper" id="home-slider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide" data-animate="animate__fadeIn">
                                            <div class="slider-image">
                                                <div class="row row-mtm">
                                                    <div class="col-12 col-md-5 text-center text-md-start">
                                                        <div class="height-md-100 d-md-flex flex-md-column align-items-md-start justify-content-md-center pst-50 pst-xl-100 peb-md-50 peb-xl-100">
                                                            <div class="slider-subtitle secondary-color font-18 font-xl-20 meb-8 meb-xxl-11">Crafted for lasting comfort</div>
                                                            <h2 class="font-32 font-sm-48 font-xl-72 font-xxl-80">Soft elm footrest</h2>
                                                            <a href="collection.html" class="btn-style primary-btn mst-17 mst-sm-19 mst-xl-33 mst-xxl-37">Online store</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-7 text-center">
                                                        <div class="pst-50 pst-xl-100">
                                                            <div class="slide-img">
                                                                <span class="d-inline-block"><img src="{{ asset('frontend/assets') }}/image/index/slider-1.png" class="w-100 img-fluid" alt="slider-1"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide" data-animate="animate__fadeIn">
                                            <div class="slider-image">
                                                <div class="row row-mtm">
                                                    <div class="col-12 col-md-5 text-center text-md-start">
                                                        <div class="height-md-100 d-md-flex flex-md-column align-items-md-start justify-content-md-center pst-50 pst-xl-100 peb-md-50 peb-xl-100">
                                                            <div class="slider-subtitle secondary-color font-18 font-xl-20 meb-8 meb-xxl-11">Designed for pure comfort</div>
                                                            <h2 class="font-32 font-sm-48 font-xl-72 font-xxl-80">Luno bark armchair</h2>
                                                            <a href="collection.html" class="btn-style primary-btn mst-17 mst-sm-19 mst-xl-33 mst-xxl-37">Online store</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-7 text-center">
                                                        <div class="pst-50 pst-xl-100">
                                                            <div class="slide-img">
                                                                <span class="d-inline-block"><img src="{{ asset('frontend/assets') }}/image/index/slider-2.png" class="w-100 img-fluid" alt="slider-2"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide" data-animate="animate__fadeIn">
                                            <div class="slider-image">
                                                <div class="row row-mtm">
                                                    <div class="col-12 col-md-5 text-center text-md-start">
                                                        <div class="height-md-100 d-md-flex flex-md-column align-items-md-start justify-content-md-center pst-50 pst-xl-100 peb-md-50 peb-xl-100">
                                                            <div class="slider-subtitle secondary-color font-18 font-xl-20 meb-8 meb-xxl-11">Crafted in solid beechwood</div>
                                                            <h2 class="font-32 font-sm-48 font-xl-72 font-xxl-80">Kiri vane sideform</h2>
                                                            <a href="collection.html" class="btn-style primary-btn mst-17 mst-sm-19 mst-xl-33 mst-xxl-37">Online store</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-7 text-center">
                                                        <div class="pst-50 pst-xl-100">
                                                            <div class="slide-img">
                                                                <span class="d-inline-block"><img src="{{ asset('frontend/assets') }}/image/index/slider-3.png" class="w-100 img-fluid" alt="slider-3"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-buttons d-none position-absolute start-0 end-0 bottom-0 z-1 meb-md-80">
                                        <div class="swiper-buttons-wrap ul-mt5 align-items-center justify-content-center justify-content-md-start">
                                            <div><button type="button" class="swiper-prev swiper-prev-homeslider primary-link icon-24" aria-label="Arrow previous"><i class="ri-arrow-left-line d-block lh-1"></i></button></div>
                                            <div><button type="button" class="swiper-next swiper-next-homeslider primary-link icon-24" aria-label="Arrow next"><i class="ri-arrow-right-line d-block lh-1"></i></button></div>
                                        </div>
                                    </div>
                                    <div class="swiper-dots d-none position-absolute start-0 end-0 bottom-0 z-1 meb-md-80">
                                        <div class="swiper-pagination swiper-pagination-homeslider d-flex flex-wrap justify-content-center justify-content-md-start"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-3 d-none d-xl-block">
                                <div class="service-area section-ptb h-100 d-flex align-items-center">
                                    <div class="row row-mtm">
                                        <div class="col-12" data-animate="animate__fadeIn">
                                            <div class="service-content d-flex">
                                                <span class="service-icon width-80"><i class="ri-truck-line secondary-color icon-24 width-80 height-80 d-flex align-items-center justify-content-center body-bg rounded-circle lh-1"></i></span>
                                                <div class="service-text d-flex flex-column justify-content-center psl-15">
                                                    <h6 class="font-18">Free delivery</h6>
                                                    <p class="mst-8">No-cost shipping on all items</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" data-animate="animate__fadeIn">
                                            <div class="service-content d-flex">
                                                <span class="service-icon width-80"><i class="ri-lock-line secondary-color icon-24 width-80 height-80 d-flex align-items-center justify-content-center body-bg rounded-circle lh-1"></i></span>
                                                <div class="service-text d-flex flex-column justify-content-center psl-15">
                                                    <h6 class="font-18">Secure payment</h6>
                                                    <p class="mst-8">Protected checkout every time</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" data-animate="animate__fadeIn">
                                            <div class="service-content d-flex">
                                                <span class="service-icon width-80"><i class="ri-reset-left-line secondary-color icon-24 width-80 height-80 d-flex align-items-center justify-content-center body-bg rounded-circle lh-1"></i></span>
                                                <div class="service-text d-flex flex-column justify-content-center psl-15">
                                                    <h6 class="font-18">30 Days return</h6>
                                                    <p class="mst-8">Easy refunds within one month</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- slider-service-area start -->
                <div class="slider-service-area d-xl-none section-ptb extra-bg">
                    <div class="service-area section-pt">
                        <div class="container">
                            <div class="row row-mtm">
                                <div class="col-12 col-md-4" data-animate="animate__fadeIn">
                                    <div class="service-content d-flex">
                                        <span class="service-icon width-80"><i class="ri-truck-line secondary-color icon-24 width-80 height-80 d-flex align-items-center justify-content-center body-bg rounded-circle lh-1"></i></span>
                                        <div class="service-text d-flex flex-column justify-content-center psl-15">
                                            <h6 class="font-18">Free delivery</h6>
                                            <p class="mst-8">No-cost shipping on all items</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4" data-animate="animate__fadeIn">
                                    <div class="service-content d-flex">
                                        <span class="service-icon width-80"><i class="ri-lock-line secondary-color icon-24 width-80 height-80 d-flex align-items-center justify-content-center body-bg rounded-circle lh-1"></i></span>
                                        <div class="service-text d-flex flex-column justify-content-center psl-15">
                                            <h6 class="font-18">Secure payment</h6>
                                            <p class="mst-8">Protected checkout every time</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4" data-animate="animate__fadeIn">
                                    <div class="service-content d-flex">
                                        <span class="service-icon width-80"><i class="ri-reset-left-line secondary-color icon-24 width-80 height-80 d-flex align-items-center justify-content-center body-bg rounded-circle lh-1"></i></span>
                                        <div class="service-text d-flex flex-column justify-content-center psl-15">
                                            <h6 class="font-18">30 Days return</h6>
                                            <p class="mst-8">Easy refunds within one month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- slider-service-area end -->
            </section>
            <!-- main-slider end -->
            <!-- brand-logo start -->
            <div class="brand-logo section-ptb extra-bg">
                <div class="container">
                    <div class="brand-category">
                        <div class="section-capture text-center">
                            <span class="sub-title" data-animate="animate__fadeIn">Every popular store</span>
                            <div class="section-title" data-animate="animate__fadeIn">
                                <h2 class="section-heading">We our brand</h2>
                            </div>
                        </div>
                        <div class="brand-wrap">
                            <div class="brand-slider swiper" id="brand-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                        <div class="brand-content w-100 ptb-30 plr-15 body-bg text-center br-hidden">
                                            <span class="brand-img"><img src="{{ asset('frontend/assets') }}/image/brand-logo/brand-logo1.png" class="width-104 width-sm-144 img-fluid" alt="brand-logo1"></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                        <div class="brand-content w-100 ptb-30 plr-15 body-bg text-center br-hidden">
                                            <span class="brand-img"><img src="{{ asset('frontend/assets') }}/image/brand-logo/brand-logo2.png" class="width-104 width-sm-144 img-fluid" alt="brand-logo2"></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                        <div class="brand-content w-100 ptb-30 plr-15 body-bg text-center br-hidden">
                                            <span class="brand-img"><img src="{{ asset('frontend/assets') }}/image/brand-logo/brand-logo3.png" class="width-104 width-sm-144 img-fluid" alt="brand-logo3"></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                        <div class="brand-content w-100 ptb-30 plr-15 body-bg text-center br-hidden">
                                            <span class="brand-img"><img src="{{ asset('frontend/assets') }}/image/brand-logo/brand-logo4.png" class="width-104 width-sm-144 img-fluid" alt="brand-logo4"></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                        <div class="brand-content w-100 ptb-30 plr-15 body-bg text-center br-hidden">
                                            <span class="brand-img"><img src="{{ asset('frontend/assets') }}/image/brand-logo/brand-logo5.png" class="width-104 width-sm-144 img-fluid" alt="brand-logo5"></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                        <div class="brand-content w-100 ptb-30 plr-15 body-bg text-center br-hidden">
                                            <span class="brand-img"><img src="{{ asset('frontend/assets') }}/image/brand-logo/brand-logo6.png" class="width-104 width-sm-144 img-fluid" alt="brand-logo6"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-buttons">
                                <div class="swiper-buttons-wrap">
                                    <button type="button" class="swiper-prev swiper-prev-brandslider" aria-label="Arrow previous"><i class="ri-arrow-left-line d-block lh-1"></i></button>
                                    <button type="button" class="swiper-next swiper-next-brandslider" aria-label="Arrow next"><i class="ri-arrow-right-line d-block lh-1"></i></button>
                                </div>
                            </div>
                            <div class="swiper-dots" data-animate="animate__fadeIn">
                                <div class="swiper-pagination swiper-pagination-brandslider"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- brand-logo end -->
            <!-- home-about start -->
            <section class="home-about section-ptb">
                <div class="container">
                    <div class="row row-mtm justify-content-lg-between">
                        <div class="col-12 col-lg-6 text-center" data-animate="animate__fadeIn">
                            <span class="d-inline-block"><img src="{{ asset('frontend/assets') }}/image/index/home-about-img.png" class="w-100 img-fluid" alt="home-about-img"></span>
                        </div>
                        <div class="col-12 col-lg-5">
                            <div class="col-xxl-10 height-lg-100 d-lg-flex flex-lg-column align-items-lg-start justify-content-lg-center">
                                <div class="section-capture mb-0">
                                    <span class="sub-title" data-animate="animate__fadeIn">We are an interior design studio</span>
                                    <div class="section-title" data-animate="animate__fadeIn">
                                        <h2 class="section-heading">Comfortable furniture a essential into our work</h2>
                                    </div>
                                </div>
                                <p class="mst-17 mst-xl-24" data-animate="animate__fadeIn">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                <div class="mst-18 mst-xl-28" data-animate="animate__fadeIn">
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="ul-mtm20">
                                                <li>
                                                    <div><span class="heading-color heading-weight">Length :</span> 80cm</div>
                                                </li>
                                                <li>
                                                    <div><span class="heading-color heading-weight">Weight :</span> 8.0kg</div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="ul-mtm20">
                                                <li>
                                                    <div><span class="heading-color heading-weight">Width :</span> 60cm</div>
                                                </li>
                                                <li>
                                                    <div><span class="heading-color heading-weight">Height :</span> 66cm</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <a href="product.html" class="btn-style tertiary-btn mst-26 mst-xl-36" data-animate="animate__fadeIn">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- home-about end -->
            <!-- category-product start -->
            <section class="category-product section-ptb bst">
                <div class="container">
                    <div class="collection-category">
                        <div class="section-capture text-center">
                            <span class="sub-title" data-animate="animate__fadeIn">Browse collection</span>
                            <div class="section-title" data-animate="animate__fadeIn">
                                <h2 class="section-heading">Trending product</h2>
                            </div>
                        </div>
                        <div class="collection-wrap">
                            <div class="collection-product-slider swiper" id="trend-product-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" data-animate="animate__fadeIn">
                                        <div class="single-product">
                                            <div class="row single-product-wrap">
                                                <div class="product-image-col">
                                                    <div class="product-image">
                                                        <a href="product.html" class="pro-img">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-1.jpg" class="w-100 img-fluid img1" alt="p-1">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-2.jpg" class="w-100 img-fluid img2" alt="p-2">
                                                        </a>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                            <div class="product-cart-action">
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon">Cart</span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="pro-content">
                                                        <div class="product-title">
                                                            <span class="d-block"><a href="product.html" class="primary-link">Luna velvet sofa</a></span>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="price-box heading-weight">
                                                                <span class="new-price primary-color">$79.00</span>
                                                                <span class="old-price"><span class="mer-3">~</span><span class="text-decoration-line-through">$89.00</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-ratting">
                                                            <span class="review-ratting">
                                                                <span class="review-star">
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-line"></i>
                                                                </span>
                                                                <span class="review-average">4.0<span class="review-caption">2 reviews</span></span>
                                                            </span>
                                                        </div>
                                                        <div class="product-description">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry It is a long established fact that a will be distracted by the readable of at</p>
                                                        </div>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" data-animate="animate__fadeIn">
                                        <div class="single-product">
                                            <div class="row single-product-wrap">
                                                <div class="product-image-col">
                                                    <div class="product-image">
                                                        <a href="product.html" class="pro-img">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-3.jpg" class="w-100 img-fluid img1" alt="p-3">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-4.jpg" class="w-100 img-fluid img2" alt="p-4">
                                                            <span class="product-label product-label-new product-label-left">New</span>
                                                        </a>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                            <div class="product-cart-action">
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon">Cart</span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="pro-content">
                                                        <div class="product-title">
                                                            <span class="d-block"><a href="product.html" class="primary-link">Aurora storage bed</a></span>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="price-box heading-weight">
                                                                <span class="new-price primary-color">$49.00</span>
                                                                <span class="old-price"><span class="mer-3">~</span><span class="text-decoration-line-through">$59.00</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-ratting">
                                                            <span class="review-ratting">
                                                                <span class="review-star">
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                </span>
                                                                <span class="review-average">No reviews<span class="review-caption">0 reviews</span></span>
                                                            </span>
                                                        </div>
                                                        <div class="product-description">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry It is a long established fact that a will be distracted by the readable of at</p>
                                                        </div>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" data-animate="animate__fadeIn">
                                        <div class="single-product">
                                            <div class="row single-product-wrap">
                                                <div class="product-image-col">
                                                    <div class="product-image">
                                                        <a href="product.html" class="pro-img">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-5.jpg" class="w-100 img-fluid img1" alt="p-5">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-6.jpg" class="w-100 img-fluid img2" alt="p-6">
                                                        </a>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                            <div class="product-cart-action">
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon">Cart</span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="pro-content">
                                                        <div class="product-title">
                                                            <span class="d-block"><a href="product.html" class="primary-link">Cavelo oak dining set</a></span>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="price-box heading-weight">
                                                                <span class="new-price primary-color">$69.00</span>
                                                                <span class="old-price"><span class="mer-3">~</span><span class="text-decoration-line-through">$79.00</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-ratting">
                                                            <span class="review-ratting">
                                                                <span class="review-star">
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                </span>
                                                                <span class="review-average">No reviews<span class="review-caption">0 reviews</span></span>
                                                            </span>
                                                        </div>
                                                        <div class="product-description">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry It is a long established fact that a will be distracted by the readable of at</p>
                                                        </div>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" data-animate="animate__fadeIn">
                                        <div class="single-product">
                                            <div class="row single-product-wrap">
                                                <div class="product-image-col">
                                                    <div class="product-image">
                                                        <a href="product.html" class="pro-img">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-7.jpg" class="w-100 img-fluid img1" alt="p-7">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-8.jpg" class="w-100 img-fluid img2" alt="p-8">
                                                            <span class="product-label product-label-discount product-label-left">-5%</span>
                                                        </a>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                            <div class="product-cart-action">
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon">Cart</span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="pro-content">
                                                        <div class="product-title">
                                                            <span class="d-block"><a href="product.html" class="primary-link">Dexon work desk</a></span>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="price-box heading-weight">
                                                                <span class="new-price primary-color">$49.00</span>
                                                                <span class="old-price"><span class="mer-3">~</span><span class="text-decoration-line-through">$54.00</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-ratting">
                                                            <span class="review-ratting">
                                                                <span class="review-star">
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                </span>
                                                                <span class="review-average">No reviews<span class="review-caption">0 reviews</span></span>
                                                            </span>
                                                        </div>
                                                        <div class="product-description">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry It is a long established fact that a will be distracted by the readable of at</p>
                                                        </div>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" data-animate="animate__fadeIn">
                                        <div class="single-product">
                                            <div class="row single-product-wrap">
                                                <div class="product-image-col">
                                                    <div class="product-image">
                                                        <a href="product.html" class="pro-img">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-9.jpg" class="w-100 img-fluid img1" alt="p-9">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-10.jpg" class="w-100 img-fluid img2" alt="p-10">
                                                        </a>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                            <div class="product-cart-action">
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon">Cart</span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="pro-content">
                                                        <div class="product-title">
                                                            <span class="d-block"><a href="product.html" class="primary-link">Riva patio chair set</a></span>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="price-box heading-weight">
                                                                <span class="new-price primary-color">$89.00</span>
                                                                <span class="old-price"><span class="mer-3">~</span><span class="text-decoration-line-through">$99.00</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-ratting">
                                                            <span class="review-ratting">
                                                                <span class="review-star">
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                </span>
                                                                <span class="review-average">No reviews<span class="review-caption">0 reviews</span></span>
                                                            </span>
                                                        </div>
                                                        <div class="product-description">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry It is a long established fact that a will be distracted by the readable of at</p>
                                                        </div>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" data-animate="animate__fadeIn">
                                        <div class="single-product">
                                            <div class="row single-product-wrap">
                                                <div class="product-image-col">
                                                    <div class="product-image">
                                                        <a href="product.html" class="pro-img">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-11.jpg" class="w-100 img-fluid img1" alt="p-11">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-12.jpg" class="w-100 img-fluid img2" alt="p-12">
                                                            <span class="product-label product-label-sale product-label-left">Sale</span>
                                                        </a>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                            <div class="product-cart-action">
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon">Cart</span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="pro-content">
                                                        <div class="product-title">
                                                            <span class="d-block"><a href="product.html" class="primary-link">Modo side cabinet</a></span>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="price-box heading-weight">
                                                                <span class="new-price primary-color">$79.00</span>
                                                                <span class="old-price"><span class="mer-3">~</span><span class="text-decoration-line-through">$84.00</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-ratting">
                                                            <span class="review-ratting">
                                                                <span class="review-star">
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                </span>
                                                                <span class="review-average">No reviews<span class="review-caption">0 reviews</span></span>
                                                            </span>
                                                        </div>
                                                        <div class="product-description">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry It is a long established fact that a will be distracted by the readable of at</p>
                                                        </div>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-buttons">
                                <div class="swiper-buttons-wrap">
                                    <button type="button" class="swiper-prev swiper-prev-trend-product" aria-label="Arrow previous"><i class="ri-arrow-left-line d-block lh-1"></i></button>
                                    <button type="button" class="swiper-next swiper-next-trend-product" aria-label="Arrow next"><i class="ri-arrow-right-line d-block lh-1"></i></button>
                                </div>
                            </div>
                            <div class="swiper-dots" data-animate="animate__fadeIn">
                                <div class="swiper-pagination swiper-pagination-trend-product"></div>
                            </div>
                            <div class="view-button d-none" data-animate="animate__fadeIn">
                                <a href="collection.html" class="btn-style tertiary-btn">View all item</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- category-product end -->
            <!-- category-slider start -->
            <section class="category-slider section-ptb extra-bg">
                <div class="container-fluid">
                    <div class="cat-category">
                        <div class="section-capture text-center">
                            <span class="sub-title" data-animate="animate__fadeIn">Our latest store</span>
                            <div class="section-title" data-animate="animate__fadeIn">
                                <h2 class="section-heading">Shop by category</h2>
                            </div>
                        </div>
                        <div class="cat-wrap">
                            <div class="row">
                                <div class="col-md-10 col-xl-10">
                                    <div class="cat-slider swiper" id="cat-slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                                <div class="cat-block banner-hover d-flex flex-wrap align-items-md-start body-bg br-hidden">
                                                    <div class="col-12 col-md-6 banner-img overflow-hidden">
                                                        <img src="{{ asset('frontend/assets') }}/image/collection/collection-1.jpg" class="w-100 img-fluid" alt="collection-1">
                                                    </div>
                                                    <div class="col-12 col-md-6 height-md-100 d-flex flex-column align-items-center justify-content-center text-center cat-content">
                                                        <div class="height-md-100 d-flex flex-column justify-content-center pst-25 pst-md-30 peb-18 peb-md-30 plr-15 plr-md-30">
                                                            <span class="d-block primary-color meb-10">8+ Product</span>
                                                            <h6 class="font-20">Living room</h6>
                                                            <p class="mst-18">Design a modern living space with sofas, TV units, tables, and armchairs.</p>
                                                        </div>
                                                        <a href="collection.html" class="cat-btn extra-color primary-bg mt-md-auto pst-25 text-uppercase">Shop</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                                <div class="cat-block banner-hover d-flex flex-wrap align-items-md-start body-bg br-hidden">
                                                    <div class="col-12 col-md-6 banner-img overflow-hidden">
                                                        <img src="{{ asset('frontend/assets') }}/image/collection/collection-2.jpg" class="w-100 img-fluid" alt="collection-2">
                                                    </div>
                                                    <div class="col-12 col-md-6 height-md-100 d-flex flex-column align-items-center justify-content-center text-center cat-content">
                                                        <div class="height-md-100 d-flex flex-column justify-content-center pst-25 pst-md-30 peb-18 peb-md-30 plr-15 plr-md-30">
                                                            <span class="d-block primary-color meb-10">9+ Product</span>
                                                            <h6 class="font-20">Bedroom</h6>
                                                            <p class="mst-18">Discover beds, nightstands, and storage to refresh your private retreat.</p>
                                                        </div>
                                                        <a href="collection.html" class="cat-btn extra-color primary-bg mt-md-auto pst-25 text-uppercase">Shop</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                                <div class="cat-block banner-hover d-flex flex-wrap align-items-md-start body-bg br-hidden">
                                                    <div class="col-12 col-md-6 banner-img overflow-hidden">
                                                        <img src="{{ asset('frontend/assets') }}/image/collection/collection-3.jpg" class="w-100 img-fluid" alt="collection-3">
                                                    </div>
                                                    <div class="col-12 col-md-6 height-md-100 d-flex flex-column align-items-center justify-content-center text-center cat-content">
                                                        <div class="height-md-100 d-flex flex-column justify-content-center pst-25 pst-md-30 peb-18 peb-md-30 plr-15 plr-md-30">
                                                            <span class="d-block primary-color meb-10">2+ Product</span>
                                                            <h6 class="font-20">Dining room</h6>
                                                            <p class="mst-18">Upgrade meals with stylish dining tables, chairs, and matching sets now.</p>
                                                        </div>
                                                        <a href="collection.html" class="cat-btn extra-color primary-bg mt-md-auto pst-25 text-uppercase">Shop</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                                <div class="cat-block banner-hover d-flex flex-wrap align-items-md-start body-bg br-hidden">
                                                    <div class="col-12 col-md-6 banner-img overflow-hidden">
                                                        <img src="{{ asset('frontend/assets') }}/image/collection/collection-4.jpg" class="w-100 img-fluid" alt="collection-4">
                                                    </div>
                                                    <div class="col-12 col-md-6 height-md-100 d-flex flex-column align-items-center justify-content-center text-center cat-content">
                                                        <div class="height-md-100 d-flex flex-column justify-content-center pst-25 pst-md-30 peb-18 peb-md-30 plr-15 plr-md-30">
                                                            <span class="d-block primary-color meb-10">15+ Product</span>
                                                            <h6 class="font-20">Office furniture</h6>
                                                            <p class="mst-18">Furnish your workspace with desks, shelves, drawers, and comfy chairs.</p>
                                                        </div>
                                                        <a href="collection.html" class="cat-btn extra-color primary-bg mt-md-auto pst-25 text-uppercase">Shop</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                                <div class="cat-block banner-hover d-flex flex-wrap align-items-md-start body-bg br-hidden">
                                                    <div class="col-12 col-md-6 banner-img overflow-hidden">
                                                        <img src="{{ asset('frontend/assets') }}/image/collection/collection-5.jpg" class="w-100 img-fluid" alt="collection-5">
                                                    </div>
                                                    <div class="col-12 col-md-6 height-md-100 d-flex flex-column align-items-center justify-content-center text-center cat-content">
                                                        <div class="height-md-100 d-flex flex-column justify-content-center pst-25 pst-md-30 peb-18 peb-md-30 plr-15 plr-md-30">
                                                            <span class="d-block primary-color meb-10">10+ Product</span>
                                                            <h6 class="font-20">Outdoor</h6>
                                                            <p class="mst-18">Enjoy fresh air with patio chairs, tables, benches, and outdoor loungers.</p>
                                                        </div>
                                                        <a href="collection.html" class="cat-btn extra-color primary-bg mt-md-auto pst-25 text-uppercase">Shop</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-buttons">
                                <div class="swiper-buttons-wrap">
                                    <button type="button" class="swiper-prev swiper-prev-cat" aria-label="Arrow previous"><i class="ri-arrow-left-line d-block lh-1"></i></button>
                                    <button type="button" class="swiper-next swiper-next-cat" aria-label="Arrow next"><i class="ri-arrow-right-line d-block lh-1"></i></button>
                                </div>
                            </div>
                            <div class="swiper-dots" data-animate="animate__fadeIn">
                                <div class="swiper-pagination swiper-pagination-cat"></div>
                            </div>
                            <div class="view-button" data-animate="animate__fadeIn">
                                <a href="collections.html" class="btn-style tertiary-btn">View all category</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- category-slider end -->
            <!-- newsletter-area start -->
            <section class="newsletter-area section-pt">
                <div class="container">
                    <div class="newsletter-block plr-15 bg-img border-radius" data-bgimg="{{ asset('frontend/assets') }}/image/index/newsletter-bgimg.jpg" data-animate="animate__fadeIn">
                        <div class="row justify-content-xxl-center">
                            <div class="col-12 col-lg-4 col-xxl-3 d-lg-flex align-items-lg-center">
                                <div class="newsletter-title width-100 pst-30 pst-xl-50 peb-lg-30 peb-xl-50">
                                    <div class="section-capture text-center text-lg-start mb-0">
                                        <span class="sub-title" data-animate="animate__fadeIn">Our subscribe newsletter</span>
                                        <div class="section-title" data-animate="animate__fadeIn">
                                            <h2 class="section-heading">Join newsletter get 40% discount</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 col-xxl-3 text-center order-first order-lg-0" data-animate="animate__fadeIn">
                                <span class="d-inline-block newsletter-img"><img src="{{ asset('frontend/assets') }}/image/index/newsletter.png" class="w-100 img-fluid" alt="newsletter"></span>
                            </div>
                            <div class="col-12 col-md-10 col-lg-5 col-xxl-4 d-lg-flex align-items-lg-center mx-md-auto mx-lg-0" data-animate="animate__fadeIn">
                                <div class="newsletter-form width-100 pst-24 pst-lg-30 pst-xl-50 peb-30 peb-xl-50">
                                    <form method="post" class="news-form">
                                        <div class="news-wrap d-md-flex">
                                            <input type="email" id="newsletter-email" name="newsletter-email" class="width-100 text-center text-md-start" placeholder="Enter your email" required>
                                            <button type="submit" class="news-btn width-100 width-md-auto btn-style secondary-btn mst-15 mst-md-0 text-nowrap">Subscribe</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- newsletter-area end -->
            <!-- category-product start -->
            <section class="category-product section-pt">
                <div class="container">
                    <div class="collection-category">
                        <div class="section-capture text-center">
                            <span class="sub-title" data-animate="animate__fadeIn">Most brand item</span>
                            <div class="section-title" data-animate="animate__fadeIn">
                                <h2 class="section-heading">Featured product</h2>
                            </div>
                        </div>
                        <div class="collection-wrap">
                            <div class="collection-product-slider swiper" id="feature-product-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" data-animate="animate__fadeIn">
                                        <div class="single-product">
                                            <div class="row single-product-wrap">
                                                <div class="product-image-col">
                                                    <div class="product-image">
                                                        <a href="product.html" class="pro-img">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-13.jpg" class="w-100 img-fluid img1" alt="p-13">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-14.jpg" class="w-100 img-fluid img2" alt="p-14">
                                                        </a>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                            <div class="product-cart-action">
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon">Cart</span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="pro-content">
                                                        <div class="product-title">
                                                            <span class="d-block"><a href="product.html" class="primary-link">Bunny bunk bed</a></span>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="price-box heading-weight">
                                                                <span class="new-price primary-color">$29.00</span>
                                                                <span class="old-price"><span class="mer-3">~</span><span class="text-decoration-line-through">$39.00</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-ratting">
                                                            <span class="review-ratting">
                                                                <span class="review-star">
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                </span>
                                                                <span class="review-average">No reviews<span class="review-caption">0 reviews</span></span>
                                                            </span>
                                                        </div>
                                                        <div class="product-description">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry It is a long established fact that a will be distracted by the readable of at</p>
                                                        </div>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" data-animate="animate__fadeIn">
                                        <div class="single-product">
                                            <div class="row single-product-wrap">
                                                <div class="product-image-col">
                                                    <div class="product-image">
                                                        <a href="product.html" class="pro-img">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-15.jpg" class="w-100 img-fluid img1" alt="p-15">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-16.jpg" class="w-100 img-fluid img2" alt="p-16">
                                                        </a>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                            <div class="product-cart-action">
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon">Cart</span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="pro-content">
                                                        <div class="product-title">
                                                            <span class="d-block"><a href="product.html" class="primary-link">Milo nesting tables</a></span>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="price-box heading-weight">
                                                                <span class="new-price primary-color">$14.00</span>
                                                                <span class="old-price"><span class="mer-3">~</span><span class="text-decoration-line-through">$19.00</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-ratting">
                                                            <span class="review-ratting">
                                                                <span class="review-star">
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                </span>
                                                                <span class="review-average">No reviews<span class="review-caption">0 reviews</span></span>
                                                            </span>
                                                        </div>
                                                        <div class="product-description">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry It is a long established fact that a will be distracted by the readable of at</p>
                                                        </div>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" data-animate="animate__fadeIn">
                                        <div class="single-product">
                                            <div class="row single-product-wrap">
                                                <div class="product-image-col">
                                                    <div class="product-image">
                                                        <a href="product.html" class="pro-img">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-17.jpg" class="w-100 img-fluid img1" alt="p-17">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-18.jpg" class="w-100 img-fluid img2" alt="p-18">
                                                        </a>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                            <div class="product-cart-action">
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon">Cart</span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="pro-content">
                                                        <div class="product-title">
                                                            <span class="d-block"><a href="product.html" class="primary-link">Halo pendant light</a></span>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="price-box heading-weight">
                                                                <span class="new-price primary-color">$64.00</span>
                                                                <span class="old-price"><span class="mer-3">~</span><span class="text-decoration-line-through">$74.00</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-ratting">
                                                            <span class="review-ratting">
                                                                <span class="review-star">
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                </span>
                                                                <span class="review-average">No reviews<span class="review-caption">0 reviews</span></span>
                                                            </span>
                                                        </div>
                                                        <div class="product-description">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry It is a long established fact that a will be distracted by the readable of at</p>
                                                        </div>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" data-animate="animate__fadeIn">
                                        <div class="single-product">
                                            <div class="row single-product-wrap">
                                                <div class="product-image-col">
                                                    <div class="product-image">
                                                        <a href="product.html" class="pro-img">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-19.jpg" class="w-100 img-fluid img1" alt="p-19">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-20.jpg" class="w-100 img-fluid img2" alt="p-20">
                                                            <span class="product-label product-label-sold product-label-left">Sold</span>
                                                        </a>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                            <div class="product-cart-action">
                                                                <a href="javascript:void(0)" class="add-to-cart disabled">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon">Cart</span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="pro-content">
                                                        <div class="product-title">
                                                            <span class="d-block"><a href="product.html" class="primary-link">Vera lounge chair</a></span>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="price-box heading-weight">
                                                                <span class="new-price primary-color">$34.00</span>
                                                                <span class="old-price"><span class="mer-3">~</span><span class="text-decoration-line-through">$44.00</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-ratting">
                                                            <span class="review-ratting">
                                                                <span class="review-star">
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                </span>
                                                                <span class="review-average">No reviews<span class="review-caption">0 reviews</span></span>
                                                            </span>
                                                        </div>
                                                        <div class="product-description">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry It is a long established fact that a will be distracted by the readable of at</p>
                                                        </div>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart disabled">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" data-animate="animate__fadeIn">
                                        <div class="single-product">
                                            <div class="row single-product-wrap">
                                                <div class="product-image-col">
                                                    <div class="product-image">
                                                        <a href="product.html" class="pro-img">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-21.jpg" class="w-100 img-fluid img1" alt="p-21">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-22.jpg" class="w-100 img-fluid img2" alt="p-22">
                                                        </a>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                            <div class="product-cart-action">
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon">Cart</span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="pro-content">
                                                        <div class="product-title">
                                                            <span class="d-block"><a href="product.html" class="primary-link">Arlo coffee table</a></span>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="price-box heading-weight">
                                                                <span class="new-price primary-color">$4.00</span>
                                                                <span class="old-price"><span class="mer-3">~</span><span class="text-decoration-line-through">$9.00</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-ratting">
                                                            <span class="review-ratting">
                                                                <span class="review-star">
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                </span>
                                                                <span class="review-average">No reviews<span class="review-caption">0 reviews</span></span>
                                                            </span>
                                                        </div>
                                                        <div class="product-description">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry It is a long established fact that a will be distracted by the readable of at</p>
                                                        </div>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" data-animate="animate__fadeIn">
                                        <div class="single-product">
                                            <div class="row single-product-wrap">
                                                <div class="product-image-col">
                                                    <div class="product-image">
                                                        <a href="product.html" class="pro-img">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-23.jpg" class="w-100 img-fluid img1" alt="p-23">
                                                            <img src="{{ asset('frontend/assets') }}/image/product/p-24.jpg" class="w-100 img-fluid img2" alt="p-24">
                                                        </a>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                            <div class="product-cart-action">
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon">Cart</span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="pro-content">
                                                        <div class="product-title">
                                                            <span class="d-block"><a href="product.html" class="primary-link">Noko wall shelf</a></span>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="price-box heading-weight">
                                                                <span class="new-price primary-color">$9.00</span>
                                                                <span class="old-price"><span class="mer-3">~</span><span class="text-decoration-line-through">$14.00</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-ratting">
                                                            <span class="review-ratting">
                                                                <span class="review-star">
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                </span>
                                                                <span class="review-average">No reviews<span class="review-caption">0 reviews</span></span>
                                                            </span>
                                                        </div>
                                                        <div class="product-description">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry It is a long established fact that a will be distracted by the readable of at</p>
                                                        </div>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                                                    <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-buttons">
                                <div class="swiper-buttons-wrap">
                                    <button type="button" class="swiper-prev swiper-prev-feature-product" aria-label="Arrow previous"><i class="ri-arrow-left-line d-block lh-1"></i></button>
                                    <button type="button" class="swiper-next swiper-next-feature-product" aria-label="Arrow next"><i class="ri-arrow-right-line d-block lh-1"></i></button>
                                </div>
                            </div>
                            <div class="swiper-dots" data-animate="animate__fadeIn">
                                <div class="swiper-pagination swiper-pagination-feature-product"></div>
                            </div>
                            <div class="view-button d-none" data-animate="animate__fadeIn">
                                <a href="collection.html" class="btn-style tertiary-btn">View all item</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- category-product end -->
            <!-- testimonial start -->
            <section class="testimonial section-ptb">
                <div class="container">
                    <div class="testi-category">
                        <div class="section-capture text-center">
                            <span class="sub-title" data-animate="animate__fadeIn">Happy customer say</span>
                            <div class="section-title" data-animate="animate__fadeIn">
                                <h2 class="section-heading">Our customer love</h2>
                            </div>
                        </div>
                        <div class="testi-wrap">
                            <div class="testi-slider swiper" id="testi-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                        <div class="testi-content w-100 ptb-30 ptb-xl-50 plr-15 plr-md-30 plr-xxl-50 extra-bg text-center br-hidden">
                                            <span class="d-inline-block ptb-8 plr-8 body-bg rounded-circle"><img src="{{ asset('frontend/assets') }}/image/testimonial/testi-1.jpg" class="width-72 img-fluid rounded-circle" alt="testi-1"></span>
                                            <p class="mst-23">Absolutely love the build and texture of this piece! It's sleek, supportive, and adds the perfect touch to my modern studio setup. Highly recommended.</p>
                                            <div class="testi-review mst-23">
                                                <span class="testi-star review-color icon-16 ul-mt5 justify-content-center lh-1">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-line"></i>
                                                </span>
                                            </div>
                                            <div class="heading-color mst-15"><span class="primary-color font-18 heading-weight">Wesley bates</span> ~ Interior designer</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                        <div class="testi-content w-100 ptb-30 ptb-xl-50 plr-15 plr-md-30 plr-xxl-50 extra-bg text-center br-hidden">
                                            <span class="d-inline-block ptb-8 plr-8 body-bg rounded-circle"><img src="{{ asset('frontend/assets') }}/image/testimonial/testi-2.jpg" class="width-72 img-fluid rounded-circle" alt="testi-2"></span>
                                            <p class="mst-23">From unboxing to setup, everything was seamless. The material quality and finish are outstanding. This furniture line really elevates the living space.</p>
                                            <div class="testi-review mst-23">
                                                <span class="testi-star review-color icon-16 ul-mt5 justify-content-center lh-1">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-half-line"></i>
                                                </span>
                                            </div>
                                            <div class="heading-color mst-15"><span class="primary-color font-18 heading-weight">Paul smith</span> ~ Project architect</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                        <div class="testi-content w-100 ptb-30 ptb-xl-50 plr-15 plr-md-30 plr-xxl-50 extra-bg text-center br-hidden">
                                            <span class="d-inline-block ptb-8 plr-8 body-bg rounded-circle"><img src="{{ asset('frontend/assets') }}/image/testimonial/testi-3.jpg" class="width-72 img-fluid rounded-circle" alt="testi-3"></span>
                                            <p class="mst-23">The chair feels premium and is extremely comfortable. It's rare to find something that's both ergonomic and stylish. Will definitely purchase more soon!</p>
                                            <div class="testi-review mst-23">
                                                <span class="testi-star review-color icon-16 ul-mt5 justify-content-center lh-1">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                </span>
                                            </div>
                                            <div class="heading-color mst-15"><span class="primary-color font-18 heading-weight">Ashley rosa</span> ~ Home decor expert</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                        <div class="testi-content w-100 ptb-30 ptb-xl-50 plr-15 plr-md-30 plr-xxl-50 extra-bg text-center br-hidden">
                                            <span class="d-inline-block ptb-8 plr-8 body-bg rounded-circle"><img src="{{ asset('frontend/assets') }}/image/testimonial/testi-4.jpg" class="width-72 img-fluid rounded-circle" alt="testi-4"></span>
                                            <p class="mst-23">This set blends effortlessly with my current layout. The wood finish, clean lines, and fast delivery made the whole experience worth every penny.</p>
                                            <div class="testi-review mst-23">
                                                <span class="testi-star review-color icon-16 ul-mt5 justify-content-center lh-1">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-half-line"></i>
                                                    <i class="ri-star-line"></i>
                                                </span>
                                            </div>
                                            <div class="heading-color mst-15"><span class="primary-color font-18 heading-weight">David brown</span> ~ Furniture buyer</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                        <div class="testi-content w-100 ptb-30 ptb-xl-50 plr-15 plr-md-30 plr-xxl-50 extra-bg text-center br-hidden">
                                            <span class="d-inline-block ptb-8 plr-8 body-bg rounded-circle"><img src="{{ asset('frontend/assets') }}/image/testimonial/testi-5.jpg" class="width-72 img-fluid rounded-circle" alt="testi-5"></span>
                                            <p class="mst-23">Honestly one of the best furniture purchases I've made online. The seat is comfy, and the aesthetic is just perfect for a cozy minimalist space.</p>
                                            <div class="testi-review mst-23">
                                                <span class="testi-star review-color icon-16 ul-mt5 justify-content-center lh-1">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-half-line"></i>
                                                    <i class="ri-star-line"></i>
                                                    <i class="ri-star-line"></i>
                                                </span>
                                            </div>
                                            <div class="heading-color mst-15"><span class="primary-color font-18 heading-weight">Alycia gordan</span> ~ Retail consultant</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-buttons">
                                <div class="swiper-buttons-wrap">
                                    <button type="button" class="swiper-prev swiper-prev-testi" aria-label="Arrow previous"><i class="ri-arrow-left-line d-block lh-1"></i></button>
                                    <button type="button" class="swiper-next swiper-next-testi" aria-label="Arrow next"><i class="ri-arrow-right-line d-block lh-1"></i></button>
                                </div>
                            </div>
                            <div class="swiper-dots" data-animate="animate__fadeIn">
                                <div class="swiper-pagination swiper-pagination-testi"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonial end -->
        </main>
        <!-- main end -->
@endsection
