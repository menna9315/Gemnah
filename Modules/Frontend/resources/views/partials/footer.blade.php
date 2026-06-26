@php
    $footerMenuCategories = $frontendMenuCategories ?? collect();
@endphp

<!-- footer start -->
        <footer id="footer">
            <!-- footer-insta start -->
            {{-- <div class="footer-insta section-ptb bst">
                <div class="container-fluid">
                    <div class="insta-category">
                        <div class="section-capture text-center">
                            <span class="sub-title">@Furniture theme</span>
                            <div class="section-title">
                                <h2 class="section-heading">Follow on instagram</h2>
                            </div>
                        </div>
                        <div class="insta-wrap">
                            <div class="insta-slider swiper" id="insta-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="insta-post banner-hover">
                                            <a href="javascript:void(0)" class="d-block position-relative banner-img br-hidden">
                                                <img src="{{ asset('frontend/assets') }}/image/instagram/footer-insta1.jpg" class="w-100 img-fluid" alt="footer-insta1">
                                                <div class="footer-insta-content position-absolute top-0 end-0 bottom-0 start-0 d-flex flex-column align-items-center justify-content-between primary-bg ptb-30 plr-15 plr-md-30 mtb-15 mtb-md-20 mlr-15 mlr-md-20 text-center border-radius">
                                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                                        <span class="secondary-color icon-16 width-48 height-48 d-flex align-items-center justify-content-center body-bg rounded-circle"><i class="ri-instagram-line d-block lh-1"></i></span>
                                                    </div>
                                                    <div class="insta-link mst-15">
                                                        <span class="extra-color text-uppercase heading-weight">View gallery</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="insta-post banner-hover">
                                            <a href="javascript:void(0)" class="d-block position-relative banner-img br-hidden">
                                                <img src="{{ asset('frontend/assets') }}/image/instagram/footer-insta2.jpg" class="w-100 img-fluid" alt="footer-insta2">
                                                <div class="footer-insta-content position-absolute top-0 end-0 bottom-0 start-0 d-flex flex-column align-items-center justify-content-between primary-bg ptb-30 plr-15 plr-md-30 mtb-15 mtb-md-20 mlr-15 mlr-md-20 text-center border-radius">
                                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                                        <span class="secondary-color icon-16 width-48 height-48 d-flex align-items-center justify-content-center body-bg rounded-circle"><i class="ri-instagram-line d-block lh-1"></i></span>
                                                    </div>
                                                    <div class="insta-link mst-15">
                                                        <span class="extra-color text-uppercase heading-weight">View gallery</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="insta-post banner-hover">
                                            <a href="javascript:void(0)" class="d-block position-relative banner-img br-hidden">
                                                <img src="{{ asset('frontend/assets') }}/image/instagram/footer-insta3.jpg" class="w-100 img-fluid" alt="footer-insta3">
                                                <div class="footer-insta-content position-absolute top-0 end-0 bottom-0 start-0 d-flex flex-column align-items-center justify-content-between primary-bg ptb-30 plr-15 plr-md-30 mtb-15 mtb-md-20 mlr-15 mlr-md-20 text-center border-radius">
                                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                                        <span class="secondary-color icon-16 width-48 height-48 d-flex align-items-center justify-content-center body-bg rounded-circle"><i class="ri-instagram-line d-block lh-1"></i></span>
                                                    </div>
                                                    <div class="insta-link mst-15">
                                                        <span class="extra-color text-uppercase heading-weight">View gallery</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="insta-post banner-hover">
                                            <a href="javascript:void(0)" class="d-block position-relative banner-img br-hidden">
                                                <img src="{{ asset('frontend/assets') }}/image/instagram/footer-insta4.jpg" class="w-100 img-fluid" alt="footer-insta4">
                                                <div class="footer-insta-content position-absolute top-0 end-0 bottom-0 start-0 d-flex flex-column align-items-center justify-content-between primary-bg ptb-30 plr-15 plr-md-30 mtb-15 mtb-md-20 mlr-15 mlr-md-20 text-center border-radius">
                                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                                        <span class="secondary-color icon-16 width-48 height-48 d-flex align-items-center justify-content-center body-bg rounded-circle"><i class="ri-instagram-line d-block lh-1"></i></span>
                                                    </div>
                                                    <div class="insta-link mst-15">
                                                        <span class="extra-color text-uppercase heading-weight">View gallery</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="insta-post banner-hover">
                                            <a href="javascript:void(0)" class="d-block position-relative banner-img br-hidden">
                                                <img src="{{ asset('frontend/assets') }}/image/instagram/footer-insta5.jpg" class="w-100 img-fluid" alt="footer-insta5">
                                                <div class="footer-insta-content position-absolute top-0 end-0 bottom-0 start-0 d-flex flex-column align-items-center justify-content-between primary-bg ptb-30 plr-15 plr-md-30 mtb-15 mtb-md-20 mlr-15 mlr-md-20 text-center border-radius">
                                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                                        <span class="secondary-color icon-16 width-48 height-48 d-flex align-items-center justify-content-center body-bg rounded-circle"><i class="ri-instagram-line d-block lh-1"></i></span>
                                                    </div>
                                                    <div class="insta-link mst-15">
                                                        <span class="extra-color text-uppercase heading-weight">View gallery</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="insta-post banner-hover">
                                            <a href="javascript:void(0)" class="d-block position-relative banner-img br-hidden">
                                                <img src="{{ asset('frontend/assets') }}/image/instagram/footer-insta6.jpg" class="w-100 img-fluid" alt="footer-insta6">
                                                <div class="footer-insta-content position-absolute top-0 end-0 bottom-0 start-0 d-flex flex-column align-items-center justify-content-between primary-bg ptb-30 plr-15 plr-md-30 mtb-15 mtb-md-20 mlr-15 mlr-md-20 text-center border-radius">
                                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                                        <span class="secondary-color icon-16 width-48 height-48 d-flex align-items-center justify-content-center body-bg rounded-circle"><i class="ri-instagram-line d-block lh-1"></i></span>
                                                    </div>
                                                    <div class="insta-link mst-15">
                                                        <span class="extra-color text-uppercase heading-weight">View gallery</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="insta-post banner-hover">
                                            <a href="javascript:void(0)" class="d-block position-relative banner-img br-hidden">
                                                <img src="{{ asset('frontend/assets') }}/image/instagram/footer-insta7.jpg" class="w-100 img-fluid" alt="footer-insta7">
                                                <div class="footer-insta-content position-absolute top-0 end-0 bottom-0 start-0 d-flex flex-column align-items-center justify-content-between primary-bg ptb-30 plr-15 plr-md-30 mtb-15 mtb-md-20 mlr-15 mlr-md-20 text-center border-radius">
                                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                                        <span class="secondary-color icon-16 width-48 height-48 d-flex align-items-center justify-content-center body-bg rounded-circle"><i class="ri-instagram-line d-block lh-1"></i></span>
                                                    </div>
                                                    <div class="insta-link mst-15">
                                                        <span class="extra-color text-uppercase heading-weight">View gallery</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-buttons">
                                <div class="swiper-buttons-wrap">
                                    <button type="button" class="swiper-prev swiper-prev-insta" aria-label="Arrow previous"><i class="ri-arrow-left-line d-block lh-1"></i></button>
                                    <button type="button" class="swiper-next swiper-next-insta" aria-label="Arrow next"><i class="ri-arrow-right-line d-block lh-1"></i></button>
                                </div>
                            </div>
                            <div class="swiper-dots">
                                <div class="swiper-pagination swiper-pagination-insta"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer-insta end -->
            <!-- footer-service start -->
            <div class="footer-service ptb-30 ptb-xl-50 extra-bg beb">
                <div class="container">
                    <div class="service-area">
                        <div class="row row-mtm">
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="service-content d-flex justify-content-lg-center">
                                    <span class="service-icon width-80"><i class="ri-phone-line secondary-color icon-24 width-80 height-80 d-flex align-items-center justify-content-center body-bg rounded-circle lh-1"></i></span>
                                    <div class="service-text d-flex flex-column justify-content-center psl-15">
                                        <h6 class="font-18">Call now</h6>
                                        <span class="d-block mst-10"><a href="tel:(+00)123456789" class="body-primary-color heading-weight">(+00)-123456789</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="service-content d-flex justify-content-lg-center">
                                    <span class="service-icon width-80"><i class="ri-mail-line secondary-color icon-24 width-80 height-80 d-flex align-items-center justify-content-center body-bg rounded-circle lh-1"></i></span>
                                    <div class="service-text d-flex flex-column justify-content-center psl-15">
                                        <h6 class="font-18">Email now</h6>
                                        <span class="d-block mst-10"><a href="mailto:demo@demo.com" class="body-primary-color">demo@demo.com</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="service-content d-flex justify-content-lg-center">
                                    <span class="service-icon width-80"><i class="ri-map-pin-line secondary-color icon-24 width-80 height-80 d-flex align-items-center justify-content-center body-bg rounded-circle lh-1"></i></span>
                                    <div class="service-text d-flex flex-column justify-content-center psl-15">
                                        <h6 class="font-18">Address</h6>
                                        <span class="d-block mst-10">1234 MG road, Bengaluru, Karnataka 560001, India</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="service-content d-flex justify-content-lg-center">
                                    <span class="service-icon width-80"><i class="ri-gift-line secondary-color icon-24 width-80 height-80 d-flex align-items-center justify-content-center body-bg rounded-circle lh-1"></i></span>
                                    <div class="service-text d-flex flex-column justify-content-center psl-15">
                                        <h6 class="font-18">Gift code</h6>
                                        <span class="d-block mst-10">Promocode - 11%OFF</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- footer-service end -->
            <!-- footer-top start -->
            <div class="footer-area section-ptb extra-bg">
                <div class="container">
                    <div class="row row-mtm">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="footer-info">
                                <div class="footer-theme-logo">
                                    <a href="{{ route('frontend.home') }}" class="d-inline-block theme-logo">
                                        <img src="{{ asset('frontend/assets') }}/image/index/gemnah-logo-current.png" class="gemnah-footer-logo img-fluid" alt="GEMNAH logo">
                                    </a>
                                </div>
                                <div class="footer-company-detail mst-23">
                                    <p>Timeless modest wear, thoughtfully designed in Egypt.©2026 Gemnah.All rights reserved.</p>
                                </div>

                                @if ($footerContact?->instgram_link || $footerContact?->facebook_link || $footerContact?->tiktok_link)
                                    <ul class="gemnah-footer-social">
                                        @if ($footerContact?->facebook_link)
                                            <li>
                                                <a href="{{ $footerContact->facebook_link }}" target="_blank" rel="noopener"
                                                    aria-label="Facebook">
                                                    <i class="ri-facebook-fill"></i>
                                                </a>
                                            </li>
                                        @endif

                                        @if ($footerContact?->instgram_link)
                                            <li>
                                                <a href="{{ $footerContact->instgram_link }}" target="_blank" rel="noopener"
                                                    aria-label="Instagram">
                                                    <i class="ri-instagram-line"></i>
                                                </a>
                                            </li>
                                        @endif

                                        @if ($footerContact?->tiktok_link)
                                            <li>
                                                <a href="{{ $footerContact->tiktok_link }}" target="_blank" rel="noopener"
                                                    aria-label="Tiktok">
                                                    <i class="ri-tiktok-line"></i>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                              
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="row">
                                <div class="col-6">
                                    <div class="footer-menu">
                                        <h6 class="ft-title font-18">Information</h6>
                                        <div class="ft-link">
                                            <ul class="ftlink-ul ul-ft pst-20">
                                                <li class="ftlink-li">
                                                    <a href="{{ route('frontend.about-us') }}" class="d-inline-block body-primary-color">About us</a>
                                                </li>
                                                <li class="ftlink-li">
                                                    <a href="{{ route('frontend.contact-us') }}" class="d-inline-block body-primary-color">Contact us</a>
                                                </li>
                                                <li class="ftlink-li">
                                                    <a href="{{ route('frontend.terms-conditions') }}" class="d-inline-block body-primary-color">Terms & Conditions</a>
                                                </li>
                                                <li class="ftlink-li">
                                                    <a href="{{ route('frontend.exchange-refund-policy') }}" class="d-inline-block body-primary-color">Exchange & Refund Policy</a>
                                                </li>
                                                <li class="ftlink-li">
                                                    <a href="{{ route('frontend.privacy-policy') }}" class="d-inline-block body-primary-color">Privacy Policy</a>
                                                </li>
                                                <li class="ftlink-li">
                                                    <a href="{{ route('frontend.shipping-policy') }}" class="d-inline-block body-primary-color">Shipping Policy</a>
                                                </li>
                                                {{-- <li class="ftlink-li">
                                                    <a href="sitemap.html" class="d-inline-block body-primary-color">Sitemap</a>
                                                </li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="footer-menu">
                                        <h6 class="ft-title font-18">Products</h6>
                                        <div class="ft-link">
                                            <ul class="ftlink-ul ul-ft pst-20">
                                                <li class="ftlink-li">
                                                    <a href="{{ route('frontend.products.index') }}" class="d-inline-block body-primary-color">All products</a>
                                                </li>
                                                @forelse ($footerMenuCategories as $menuCategory)
                                                    <li class="ftlink-li">
                                                        <a href="{{ route('frontend.products.category', $menuCategory->slug) }}" class="d-inline-block body-primary-color">
                                                            {{ $menuCategory->title }}
                                                        </a>
                                                    </li>
                                                @empty
                                                    <li class="ftlink-li">
                                                        <span class="d-inline-block body-primary-color">No categories yet</span>
                                                    </li>
                                                @endforelse
                                                {{-- <li class="ftlink-li">
                                                    <a href="terms-condition.html" class="d-inline-block body-primary-color">Terms & condition</a>
                                                </li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="gemnah-footer-join">
                                <h6 class="font-18">Join Our Family</h6>
                                <p class="mst-12">Be first to know about new collections, offers, and GEMNAH updates.</p>

                                @if (session('join_success'))
                                    <div class="gemnah-footer-join-success">
                                        {{ session('join_success') }}
                                    </div>
                                @endif

                                <form action="{{ route('frontend.join-us.store') }}" method="post" class="gemnah-footer-join-form mst-18">
                                    @csrf
                                    <input type="email" name="join_email" class="w-100 @error('join_email') msg_error @enderror"
                                        value="{{ old('join_email') }}" placeholder="Email address" autocomplete="email">
                                    @error('join_email')
                                        <small class="gemnah-footer-join-error">{{ $message }}</small>
                                    @enderror
                                    <button type="submit" class="btn-style secondary-btn w-100 mst-12">
                                        Join now
                                    </button>
                                </form>
                            </div>
                        </div>
                        {{-- <div class="col-12 col-lg-4">
                            <div class="footer-article">
                                <h6 class="font-18">Latest blog</h6>
                                <div class="row row-mtm15 pst-25">
                                    <div class="col-12">
                                        <div class="footer-article-post banner-hover d-flex flex-wrap">
                                            <div class="width-80">
                                                <a href="article.html" class="d-block banner-img br-hidden"><img src="{{ asset('frontend/assets') }}/image/index/article/a-1.jpg" class="w-100 img-fluid" alt="a-1"></a>
                                            </div>
                                            <div class="width-calc-120 width-xl-calc-128 plr-15">
                                                <span class="d-block heading-weight"><a href="article.html" class="d-inline-block w-100 primary-link text-truncate">Decor that transforms</a></span>
                                                <p class="mst-5 w-100 text-truncate">Fresh ideas for comfort</p>
                                            </div>
                                            <div class="width-40 width-xl-48">
                                                <a href="article.html" class="footer-article-btn secondary-color width-40 width-xl-48 height-40 height-xl-48 d-flex align-items-center justify-content-center body-bg rounded-circle" aria-label="Page link"><i class="ri-arrow-right-line d-block lh-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="footer-article-post banner-hover d-flex flex-wrap">
                                            <div class="width-80">
                                                <a href="article.html" class="d-block banner-img br-hidden"><img src="{{ asset('frontend/assets') }}/image/index/article/a-2.jpg" class="w-100 img-fluid" alt="a-2"></a>
                                            </div>
                                            <div class="width-calc-120 width-xl-calc-128 plr-15">
                                                <span class="d-block heading-weight"><a href="article.html" class="d-inline-block w-100 primary-link text-truncate">Sleep in modern style</a></span>
                                                <p class="mst-5 w-100 text-truncate">Style meets cozy sleep</p>
                                            </div>
                                            <div class="width-40 width-xl-48">
                                                <a href="article.html" class="footer-article-btn secondary-color width-40 width-xl-48 height-40 height-xl-48 d-flex align-items-center justify-content-center body-bg rounded-circle" aria-label="Page link"><i class="ri-arrow-right-line d-block lh-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- footer-top end -->
            <!-- footer-bottom start -->
            {{-- <div class="copyright ptb-15 extra-bg bst">
                <div class="container">
                    <div class="row align-items-md-center">
                        <div class="col-12 col-md-6 text-center text-md-start">Powered by spacingtech<sup>TM</sup></div>
                        <div class="col-12 col-md-6 mst-8 mst-md-0">
                            <ul class="payment-ul">
                                <li class="payment-li ul-mt5 justify-content-center justify-content-md-end">
                                    <a href="javascript:void(0)" class="d-block"><img src="{{ asset('frontend/assets') }}/image/other/paying-visa.png" class="width-40 img-fluid border-radius" alt="paying-visa"></a>
                                    <a href="javascript:void(0)" class="d-block"><img src="{{ asset('frontend/assets') }}/image/other/paying-maestro.png" class="width-40 img-fluid border-radius" alt="paying-maestro"></a>
                                    <a href="javascript:void(0)" class="d-block"><img src="{{ asset('frontend/assets') }}/image/other/paying-american.png" class="width-40 img-fluid border-radius" alt="paying-american"></a>
                                    <a href="javascript:void(0)" class="d-block"><img src="{{ asset('frontend/assets') }}/image/other/paying-paypal.png" class="width-40 img-fluid border-radius" alt="paying-paypal"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- footer-bottom end -->
        </footer>
        <!-- footer end -->
