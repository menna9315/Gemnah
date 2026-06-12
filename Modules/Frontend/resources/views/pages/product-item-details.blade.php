@extends('frontend::layouts.app')

@section('title', ($item->seo_title ?: $item->title ?: 'Product details') . ' - GEMNAH')

@section('content')
    @php
        $galleryImages = $item->itemImages
            ->pluck('image')
            ->filter()
            ->unique()
            ->values();
        $sellingPrice = (float) $item->selling_price;
        $carouselId = 'product-item-carousel-'.$item->id;
        $isUnavailable = $item->is_out_of_stock || (int) $item->stock_quantity <= 0;
    @endphp

    <div class="breadcrumb-area ptb-30 bg-img text-center gemnah-about-template-banner"
        data-bgimg="{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}"
        style="background-image: url('{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}')">
        <div class="container">
            <h2 class="extra-color font-24 font-xl-32 mst-4 mst-xl-7">{{ $item->title ?: 'Product details' }}</h2>
        </div>
    </div>

    <main id="main">
        <section class="gemnah-product-detail-content">
            <div class="container">
                <a href="{{ route('frontend.products.category', $category->slug) }}" class="gemnah-product-back">
                    <i class="ri-arrow-left-line"></i>
                    {{ $category->title ?: 'Back to products' }}
                </a>

                @if (session('success'))
                    <div class="gemnah-auth-alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->has('cart') || $errors->has('quantity'))
                    <div class="gemnah-checkout-error-alert">
                        {{ $errors->first('cart') ?: $errors->first('quantity') }}
                    </div>
                @endif

                <div class="gemnah-product-detail-grid">
                    <div class="gemnah-product-gallery">
                        @if ($galleryImages->isNotEmpty())
                            <div id="{{ $carouselId }}" class="carousel slide gemnah-product-carousel" data-bs-interval="false">
                                <div class="carousel-inner gemnah-product-gallery-main">
                                    @foreach ($galleryImages as $galleryImage)
                                        <div class="carousel-item @if ($loop->first) active @endif">
                                            <img src="{{ asset($galleryImage) }}" alt="{{ $item->title }} image {{ $loop->iteration }}" class="img-fluid">
                                        </div>
                                    @endforeach
                                </div>

                                @if ($galleryImages->count() > 1)
                                    <button class="carousel-control-prev gemnah-product-carousel-control" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="prev" aria-label="Previous image">
                                        <span><i class="ri-arrow-left-line"></i></span>
                                    </button>
                                    <button class="carousel-control-next gemnah-product-carousel-control" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="next" aria-label="Next image">
                                        <span><i class="ri-arrow-right-line"></i></span>
                                    </button>
                                @endif
                            </div>

                            @if ($galleryImages->count() > 1)
                                <div class="carousel-indicators gemnah-product-gallery-thumbs">
                                    @foreach ($galleryImages as $galleryImage)
                                        <button type="button" class="gemnah-product-thumb @if ($loop->first) active @endif" data-bs-target="#{{ $carouselId }}" data-bs-slide-to="{{ $loop->index }}" aria-label="Show image {{ $loop->iteration }}" @if ($loop->first) aria-current="true" @endif>
                                            <img src="{{ asset($galleryImage) }}" alt="{{ $item->title }} image {{ $loop->iteration }}">
                                        </button>
                                    @endforeach
                                </div>
                            @endif
                        @else
                            <div class="gemnah-product-gallery-main gemnah-product-gallery-empty">
                                <span><i class="ri-image-line"></i></span>
                                <p>No product item images yet.</p>
                            </div>
                        @endif
                    </div>

                    <article class="gemnah-product-detail-info">
                        @if ($item->product?->title || $category->title)
                            <span class="gemnah-products-kicker">
                                {{ $category->title }}
                                @if ($item->product?->title)
                                    / {{ $item->product->title }}
                                @endif
                            </span>
                        @endif

                        <h1>{{ $item->title }}</h1>

                        <div class="gemnah-product-detail-price">
                            @if ($sellingPrice > 0)
                                EGP {{ number_format($sellingPrice, 2) }}
                            @else
                                Contact for price
                            @endif
                        </div>

                        <div class="gemnah-product-stock {{ $isUnavailable ? 'is-out' : 'is-in' }}">
                            <span></span>
                            {{ $isUnavailable ? 'Out of stock' : number_format((int) $item->stock_quantity).' in stock' }}
                        </div>

                        <dl class="gemnah-product-specs">
                            @if ($item->color)
                                <div>
                                    <dt>Color</dt>
                                    <dd>
                                        @if ($item->color->code)
                                            <span class="gemnah-color-dot" style="background-color: {{ $item->color->code }}"></span>
                                        @endif
                                        {{ $item->color->name }}
                                    </dd>
                                </div>
                            @endif

                            @if ($item->size)
                                <div>
                                    <dt>Size</dt>
                                    <dd>{{ $item->size->value }}</dd>
                                </div>
                            @endif

                            @if ($item->fabric)
                                <div>
                                    <dt>Fabric</dt>
                                    <dd>{{ $item->fabric }}</dd>
                                </div>
                            @endif

                            @if ($item->item_code)
                                <div>
                                    <dt>Item code</dt>
                                    <dd>{{ $item->item_code }}</dd>
                                </div>
                            @endif
                        </dl>

                        @if ($item->description || $item->description2)
                            <div class="gemnah-product-description">
                                @if ($item->description)
                                    <h2>Description</h2>
                                    <div>{!! nl2br(e($item->description)) !!}</div>
                                @endif

                                @if ($item->description2)
                                    <h2>More details</h2>
                                    <div>{!! nl2br(e($item->description2)) !!}</div>
                                @endif
                            </div>
                        @endif

                        <form action="{{ route('frontend.cart.items.store', $item) }}" method="post" class="gemnah-product-actions">
                            @csrf
                            <input type="hidden" name="quantity" value="1">

                            <button type="submit" name="redirect_to" value="cart"
                                class="btn-style quaternary-btn gemnah-product-action-btn @if ($isUnavailable) disabled pe-none @endif"
                                @if ($isUnavailable) disabled aria-disabled="true" @endif>
                                <span class="product-bag-icon"><i class="ri-shopping-bag-3-line"></i></span>
                                <span>Add to cart</span>
                            </button>

                            <button type="submit" name="redirect_to" value="checkout"
                                class="btn-style secondary-btn gemnah-product-action-btn gemnah-buy-now @if ($isUnavailable) disabled pe-none @endif"
                                @if ($isUnavailable) disabled aria-disabled="true" @endif>
                                <span class="product-bag-icon"><i class="ri-flashlight-line"></i></span>
                                <span>Buy it now</span>
                            </button>
                        </form>
                    </article>
                </div>

                @if ($item->size_chart_image)
                    <section class="gemnah-size-chart">
                        <div class="gemnah-section-heading">
                            <span class="gemnah-products-kicker">Fit guide</span>
                            <h2>Size chart</h2>
                        </div>

                        <a href="{{ asset($item->size_chart_image) }}" target="_blank" rel="noopener">
                            <img src="{{ asset($item->size_chart_image) }}" alt="{{ $item->title }} size chart">
                        </a>
                    </section>
                @endif

                @if ($relatedProductItems->isNotEmpty())
                    <section class="gemnah-related-products">
                        <div class="gemnah-section-heading text-center">
                            <span class="gemnah-products-kicker">More from GEMNAH</span>
                            <h2>You may also like</h2>
                        </div>

                        <div class="gemnah-products-grid row row-mtm30">
                            @foreach ($relatedProductItems as $relatedItem)
                                @php
                                    $relatedCategory = $relatedItem->product?->category;
                                @endphp

                                @continue(! $relatedCategory)

                                @php
                                    $relatedGalleryImage = $relatedItem->itemImages->first()?->image;
                                    $relatedPrimaryImage = $relatedItem->image
                                        ?: $relatedItem->home_image
                                        ?: $relatedGalleryImage
                                        ?: $relatedItem->product?->image;
                                    $relatedSecondaryImage = $relatedItem->home_image ?: $relatedGalleryImage ?: $relatedPrimaryImage;
                                    $relatedPrimaryImageUrl = $relatedPrimaryImage
                                        ? asset($relatedPrimaryImage)
                                        : asset('frontend/assets/image/product/p-1.jpg');
                                    $relatedSecondaryImageUrl = $relatedSecondaryImage
                                        ? asset($relatedSecondaryImage)
                                        : $relatedPrimaryImageUrl;
                                    $relatedUrl = route('frontend.products.item', [$relatedCategory->slug, $relatedItem->slug]);
                                    $relatedSellingPrice = (float) $relatedItem->selling_price;
                                @endphp

                                <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                                    <article class="single-product gemnah-product-card">
                                        <div class="row single-product-wrap">
                                            <div class="product-image-col">
                                                <div class="product-image">
                                                    <a href="{{ $relatedUrl }}" class="pro-img" aria-label="{{ $relatedItem->title }}">
                                                        <img src="{{ $relatedPrimaryImageUrl }}" class="w-100 img-fluid img1" alt="{{ $relatedItem->title }}">
                                                        <img src="{{ $relatedSecondaryImageUrl }}" class="w-100 img-fluid img2" alt="{{ $relatedItem->title }}">

                                                        @if ($relatedItem->is_out_of_stock)
                                                            <span class="product-label product-label-sold product-label-left">Sold</span>
                                                        @elseif ($relatedItem->is_best_seller)
                                                            <span class="product-label product-label-new product-label-left">Best</span>
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="product-content">
                                                <div class="pro-content">
                                                    @if ($relatedItem->product?->title)
                                                        <div class="gemnah-products-meta text-truncate">{{ $relatedItem->product->title }}</div>
                                                    @endif

                                                    <div class="product-title">
                                                        <span class="d-block">
                                                            <a href="{{ $relatedUrl }}" class="primary-link">{{ $relatedItem->title }}</a>
                                                        </span>
                                                    </div>

                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            @if ($relatedSellingPrice > 0)
                                                                <span class="new-price primary-color">EGP {{ number_format($relatedSellingPrice, 2) }}</span>
                                                            @else
                                                                <span class="new-price primary-color">Contact for price</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif
            </div>
        </section>
    </main>
@endsection
