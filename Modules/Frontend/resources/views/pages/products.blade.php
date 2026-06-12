@extends('frontend::layouts.app')

@section('title', 'Products - GEMNAH')

@section('content')
    <div class="breadcrumb-area ptb-30 bg-img text-center gemnah-about-template-banner"
        data-bgimg="{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}"
        style="background-image: url('{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}')">
        <div class="container">
            <h2 class="extra-color font-24 font-xl-32 mst-4 mst-xl-7">Products</h2>
        </div>
    </div>

    <main id="main">
        <section class="gemnah-products-content gemnah-all-products-content">
            <div class="container">
                <div class="gemnah-products-heading text-center">
                    <span class="gemnah-products-kicker">Shop by category</span>
                    <h1>All products</h1>
                </div>

                @if ($categories->isNotEmpty())
                    <div class="gemnah-all-products-list">
                        @foreach ($categories as $category)
                            @php
                                $categoryItems = $productItemsByCategory->get($category->id, collect());
                            @endphp

                            @continue($categoryItems->isEmpty())

                            <section class="gemnah-products-category-section" id="category-{{ $category->slug }}">
                                <div class="gemnah-products-category-header">
                                    @if ($category->collection?->title)
                                        <span class="gemnah-products-kicker">{{ $category->collection->title }}</span>
                                    @endif

                                    <h2>{{ $category->title }}</h2>

                                    @if ($category->description)
                                        <div class="gemnah-products-category-description">
                                            {!! nl2br(e($category->description)) !!}
                                        </div>
                                    @endif
                                </div>

                                <div class="gemnah-products-grid row row-mtm30">
                                    @foreach ($categoryItems as $item)
                                        <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                                            @include('frontend::partials.product-item-card', [
                                                'item' => $item,
                                                'label' => $item->is_best_seller ? 'Best' : ($item->is_featured ? 'Featured' : null),
                                            ])
                                        </div>
                                    @endforeach
                                </div>
                            </section>
                        @endforeach
                    </div>
                @else
                    <div class="gemnah-products-empty text-center">
                        <span><i class="ri-shopping-bag-3-line"></i></span>
                        <h2>No products found</h2>
                        <p>Products will appear here once categories and items are added from the dashboard.</p>
                    </div>
                @endif
            </div>
        </section>
    </main>
@endsection
