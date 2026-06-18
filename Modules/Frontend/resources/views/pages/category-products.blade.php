@extends('frontend::layouts.app')

@section('title', ($category->seo_title ?: $category->title ?: 'Products') . ' - GEMNAH')

@section('content')
    <div class="breadcrumb-area ptb-30 bg-img text-center gemnah-about-template-banner"
        data-bgimg="{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}"
        style="background-image: url('{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}')">
        <div class="container">
            <h2 class="extra-color font-24 font-xl-32 mst-4 mst-xl-7">{{ $category->title ?: 'Products' }}</h2>
        </div>
    </div>

    <main id="main">
        <section class="gemnah-products-content">
            <div class="container">
                <div class="gemnah-products-heading text-center">
                    @if ($category->collection?->title)
                        <span class="gemnah-products-kicker">{{ $category->collection->title }}</span>
                    @endif

                    <h1>{{ $category->title ?: 'Products' }}</h1>

                    @if ($category->description)
                        <div class="gemnah-products-description">
                            {!! nl2br(e($category->description)) !!}
                        </div>
                    @endif
                </div>

                @if ($productItems->count())
                    <div class="gemnah-products-grid row row-mtm30">
                        @foreach ($productItems as $item)
                            @php
                                $galleryImage = $item->itemImages->first()?->image;
                                $primaryImage = $item->image ?: $item->home_image ?: $galleryImage ?: $item->product?->image;
                                $secondaryImage = $item->home_image ?: $galleryImage ?: $primaryImage;
                                $primaryImageUrl = $primaryImage
                                    ? asset($primaryImage)
                                    : asset('frontend/assets/image/product/p-1.jpg');
                                $secondaryImageUrl = $secondaryImage
                                    ? asset($secondaryImage)
                                    : $primaryImageUrl;
                                $sellingPrice = (float) $item->selling_price;
                                $description = trim(strip_tags($item->description ?? ''));
                                $itemUrl = route('frontend.products.item', [$category->slug, $item->slug]);
                            @endphp

                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                                <article class="single-product gemnah-product-card">
                                    <div class="row single-product-wrap">
                                        <div class="product-image-col">
                                            <div class="product-image">
                                                <a href="{{ $itemUrl }}" class="pro-img" aria-label="{{ $item->title }}">
                                                    <img src="{{ $primaryImageUrl }}" class="w-100 img-fluid img1" alt="{{ $item->title }}">
                                                    <img src="{{ $secondaryImageUrl }}" class="w-100 img-fluid img2" alt="{{ $item->title }}">

                                                    @if ($item->is_out_of_stock)
                                                        <span class="product-label product-label-sold product-label-left">Out of stock</span>
                                                    @elseif ($item->is_best_seller)
                                                        <span class="product-label product-label-new product-label-left">Best</span>
                                                    @endif
                                                </a>
                                            </div>
                                        </div>

                                        <div class="product-content">
                                            <div class="pro-content">
                                                @if ($item->product?->title)
                                                    <div class="gemnah-products-meta text-truncate">{{ $item->product->title }}</div>
                                                @endif

                                                <div class="product-title">
                                                    <span class="d-block">
                                                        <a href="{{ $itemUrl }}" class="primary-link">{{ $item->title }}</a>
                                                    </span>
                                                </div>

                                                <div class="product-price">
                                                    <div class="price-box heading-weight">
                                                        @if ($sellingPrice > 0)
                                                            <span class="new-price primary-color">EGP {{ number_format($sellingPrice, 2) }}</span>
                                                        @else
                                                            <span class="new-price primary-color">Contact for price</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if ($item->color || $item->size)
                                                    <div class="gemnah-products-options">
                                                        @if ($item->color)
                                                            <span class="gemnah-products-option">
                                                                @if ($item->color->code)
                                                                    <span class="gemnah-color-dot" style="background-color: {{ $item->color->code }}"></span>
                                                                @endif
                                                                {{ $item->color->name }}
                                                            </span>
                                                        @endif

                                                        @if ($item->size)
                                                            <span class="gemnah-products-option">{{ $item->size->value }}</span>
                                                        @endif
                                                    </div>
                                                @endif

                                                @if ($description !== '')
                                                    <div class="product-description">
                                                        <p>{{ \Illuminate\Support\Str::limit($description, 110) }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>

                    @if ($productItems->hasPages())
                        <div class="gemnah-products-pagination">
                            {{ $productItems->onEachSide(1)->links('pagination::bootstrap-4') }}
                        </div>
                    @endif
                @else
                    <div class="gemnah-products-coming-soon gemnah-products-coming-soon-center">
                        <span><i class="ri-time-line"></i></span>
                        <div>
                            <h2>Coming soon</h2>
                            <p>New pieces for this category are being prepared.</p>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </main>
@endsection
