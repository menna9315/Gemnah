@extends('frontend::layouts.app')

@section('title', 'GEMNAH')

@section('content')
    <main id="main">
        @if ($homeBanners->isNotEmpty())
            <section class="gemnah-home-hero">
                <div class="home-slider swiper" id="home-slider">
                    <div class="swiper-wrapper">
                        @foreach ($homeBanners as $banner)
                            @php
                                $bannerImage = $banner->image
                                    ? asset($banner->image)
                                    : asset('frontend/assets/image/index/slider-1.png');
                            @endphp

                            <div class="swiper-slide">
                                <div class="gemnah-home-hero-slide">
                                    <img src="{{ $bannerImage }}" alt="{{ $banner->title ?: 'GEMNAH home banner' }}"
                                        class="gemnah-home-hero-image">

                                    <div class="gemnah-home-hero-overlay">
                                        <div class="container">
                                            <div class="gemnah-home-hero-copy">
                                                @if ($banner->description)
                                                    <div class="gemnah-home-kicker">GEMNAH Collection</div>
                                                @endif

                                                @if ($banner->title)
                                                    <h1>{{ $banner->title }}</h1>
                                                @endif

                                                @if ($banner->description)
                                                    <p>{!! nl2br(e($banner->description)) !!}</p>
                                                @endif

                                                @if ($banner->button && $banner->button_url)
                                                    <a href="{{ $banner->button_url }}" class="btn-style primary-btn gemnah-home-hero-btn">
                                                        {{ $banner->button }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if ($homeBanners->count() > 1)
                        <div class="swiper-dots gemnah-home-hero-dots">
                            <div class="swiper-pagination swiper-pagination-homeslider"></div>
                        </div>
                    @endif
                </div>
            </section>
        @endif

        @if ($bestSellerProductItems->isNotEmpty())
            <section class="gemnah-home-products section-ptb">
                <div class="container">
                    <div class="gemnah-section-heading text-center">
                        <span class="gemnah-products-kicker">Customer favorites</span>
                        <h2>Best seller product items</h2>
                    </div>

                    <div class="gemnah-products-grid row row-mtm30">
                        @foreach ($bestSellerProductItems as $item)
                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                                @include('frontend::partials.product-item-card', [
                                    'item' => $item,
                                    'label' => 'Best',
                                ])
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        @if ($featuredProductItems->isNotEmpty())
            <section class="gemnah-home-products gemnah-home-products-alt section-ptb">
                <div class="container">
                    <div class="gemnah-section-heading text-center">
                        <span class="gemnah-products-kicker">Selected by GEMNAH</span>
                        <h2>Featured product items</h2>
                    </div>

                    <div class="gemnah-products-grid row row-mtm30">
                        @foreach ($featuredProductItems as $item)
                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                                @include('frontend::partials.product-item-card', [
                                    'item' => $item,
                                    'label' => 'Featured',
                                ])
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </main>
@endsection
