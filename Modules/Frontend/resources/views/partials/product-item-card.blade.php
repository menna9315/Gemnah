@php
    $category = $item->product?->category;
    $galleryImage = $item->itemImages->first()?->image;
    $primaryImage = $item->image ?: $item->home_image ?: $galleryImage ?: $item->product?->image;
    $secondaryImage = $item->home_image ?: $galleryImage ?: $primaryImage;
    $primaryImageUrl = $primaryImage ? asset($primaryImage) : asset('frontend/assets/image/product/p-1.jpg');
    $secondaryImageUrl = $secondaryImage ? asset($secondaryImage) : $primaryImageUrl;
    $itemUrl = $category ? route('frontend.products.item', [$category->slug, $item->slug]) : '#';
    $salePrice = (float) ($item->price_after_discount ?: $item->selling_price);
    $oldPrice = (float) $item->original_price;
    $description = trim(strip_tags($item->description ?? ''));
@endphp

<article class="single-product gemnah-product-card">
    <div class="row single-product-wrap">
        <div class="product-image-col">
            <div class="product-image">
                <a href="{{ $itemUrl }}" class="pro-img" aria-label="{{ $item->title }}">
                    <img src="{{ $primaryImageUrl }}" class="w-100 img-fluid img1" alt="{{ $item->title }}">
                    <img src="{{ $secondaryImageUrl }}" class="w-100 img-fluid img2" alt="{{ $item->title }}">

                    @if ($item->is_out_of_stock)
                        <span class="product-label product-label-sold product-label-left">Out of stock</span>
                    @elseif (! empty($label))
                        <span class="product-label product-label-new product-label-left">{{ $label }}</span>
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
                        @if ($salePrice > 0)
                            <span class="new-price primary-color">EGP {{ number_format($salePrice, 2) }}</span>

                            @if ($oldPrice > $salePrice)
                                <span class="old-price">
                                    <span class="mer-3">~</span>
                                    <span class="text-decoration-line-through">EGP {{ number_format($oldPrice, 2) }}</span>
                                </span>
                            @endif
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
                        <p>{{ Illuminate\Support\Str::limit($description, 100) }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</article>
