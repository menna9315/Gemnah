<div class="card-body">
    <div class="alert alert-light border">
        Collection: <strong>{{ $collection->title }}</strong>
        <span class="mx-2">/</span>
        Category: <strong>{{ $category->title }}</strong>
        <span class="mx-2">/</span>
        Product: <strong>{{ $product->title }}</strong>
    </div>

    <h5 class="mb-3">Basic Information</h5>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $item->title) }}">

                @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                    value="{{ old('slug', $item->slug) }}" placeholder="Generated from title if empty">

                @error('slug')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="item_code">Item Code</label>
                <input type="text" name="item_code" id="item_code"
                    class="form-control @error('item_code') is-invalid @enderror"
                    value="{{ old('item_code', $item->item_code) }}">

                @error('item_code')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="stock_quantity">Stock Quantity</label>
                <input type="number" name="stock_quantity" id="stock_quantity"
                    class="form-control @error('stock_quantity') is-invalid @enderror"
                    value="{{ old('stock_quantity', $item->stock_quantity ?? 0) }}" min="0" max="4294967295">

                @error('stock_quantity')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="manual_order">Manual Order</label>
                <input type="number" name="manual_order" id="manual_order"
                    class="form-control @error('manual_order') is-invalid @enderror"
                    value="{{ old('manual_order', $item->manual_order ?? 0) }}" min="0">

                @error('manual_order')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="4"
            class="form-control @error('description') is-invalid @enderror">{{ old('description', $item->description) }}</textarea>

        @error('description')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description2">Description 2</label>
        <textarea name="description2" id="description2" rows="4"
            class="form-control @error('description2') is-invalid @enderror">{{ old('description2', $item->description2) }}</textarea>

        @error('description2')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <h5 class="mt-4 mb-3">Pricing</h5>
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label for="selling_price">Selling Price</label>
                <input type="number" name="selling_price" id="selling_price"
                    class="form-control @error('selling_price') is-invalid @enderror"
                    value="{{ old('selling_price', $item->selling_price ?? 0) }}" min="0" step="0.01">

                @error('selling_price')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md">
            <div class="form-group">
                <label for="original_price">Original Price</label>
                <input type="number" name="original_price" id="original_price"
                    class="form-control @error('original_price') is-invalid @enderror"
                    value="{{ old('original_price', $item->original_price ?? 0) }}" min="0" step="0.01">

                @error('original_price')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md">
            <div class="form-group">
                <label for="discount_value">Discount Value</label>
                <input type="number" name="discount_value" id="discount_value"
                    class="form-control @error('discount_value') is-invalid @enderror"
                    value="{{ old('discount_value', $item->discount_value ?? 0) }}" min="0" step="0.01">

                @error('discount_value')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md">
            <div class="form-group">
                <label for="price_after_discount">Price After Discount</label>
                <input type="number" name="price_after_discount" id="price_after_discount"
                    class="form-control @error('price_after_discount') is-invalid @enderror"
                    value="{{ old('price_after_discount', $item->price_after_discount ?? 0) }}" min="0" step="0.01">

                @error('price_after_discount')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md">
            <div class="form-group">
                <label for="taxes">Taxes</label>
                <input type="number" name="taxes" id="taxes" class="form-control @error('taxes') is-invalid @enderror"
                    value="{{ old('taxes', $item->taxes ?? 0) }}" min="0" step="0.01">

                @error('taxes')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <h5 class="mt-4 mb-3">Features</h5>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="color_id">Color</label>
                <select name="color_id" id="color_id" class="form-control @error('color_id') is-invalid @enderror">
                    <option value="">No color</option>
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}" @selected((string) old('color_id', $item->color_id) === (string) $color->id)>
                            {{ $color->name }} ({{ $color->code }})
                        </option>
                    @endforeach
                </select>

                @error('color_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="size_id">Size</label>
                <select name="size_id" id="size_id" class="form-control @error('size_id') is-invalid @enderror">
                    <option value="">No size</option>
                    @foreach ($sizes as $size)
                        <option value="{{ $size->id }}" @selected((string) old('size_id', $item->size_id) === (string) $size->id)>
                            {{ $size->value }}
                        </option>
                    @endforeach
                </select>

                @error('size_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="fabric">Fabric</label>
                <input type="text" name="fabric" id="fabric"
                    class="form-control @error('fabric') is-invalid @enderror" value="{{ old('fabric', $item->fabric) }}">

                @error('fabric')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <input type="hidden" name="is_best_seller" value="0">
            <div class="custom-control custom-switch">
                <input type="checkbox" name="is_best_seller" value="1" id="is_best_seller"
                    class="custom-control-input @error('is_best_seller') is-invalid @enderror"
                    @checked((bool) old('is_best_seller', $item->is_best_seller))>
                <label class="custom-control-label" for="is_best_seller">Best seller</label>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <input type="hidden" name="is_featured" value="0">
            <div class="custom-control custom-switch">
                <input type="checkbox" name="is_featured" value="1" id="is_featured"
                    class="custom-control-input @error('is_featured') is-invalid @enderror"
                    @checked((bool) old('is_featured', $item->is_featured))>
                <label class="custom-control-label" for="is_featured">Featured</label>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <input type="hidden" name="is_out_of_stock" value="0">
            <div class="custom-control custom-switch">
                <input type="checkbox" name="is_out_of_stock" value="1" id="is_out_of_stock"
                    class="custom-control-input @error('is_out_of_stock') is-invalid @enderror"
                    @checked((bool) old('is_out_of_stock', $item->is_out_of_stock))>
                <label class="custom-control-label" for="is_out_of_stock">Out of stock</label>
            </div>
        </div>
    </div>

    <h5 class="mt-4 mb-3">Images</h5>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror">

                @error('image')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror

                @if ($item->image)
                    <div class="mt-2">
                        <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="product-item-preview">
                    </div>
                @endif
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="home_image">Home Image</label>
                <input type="file" name="home_image" id="home_image"
                    class="form-control-file @error('home_image') is-invalid @enderror">

                @error('home_image')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror

                @if ($item->home_image)
                    <div class="mt-2">
                        <img src="{{ asset($item->home_image) }}" alt="{{ $item->title }}" class="product-item-preview">
                    </div>
                @endif
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="size_chart_image">Size Chart Image</label>
                <input type="file" name="size_chart_image" id="size_chart_image"
                    class="form-control-file @error('size_chart_image') is-invalid @enderror">

                @error('size_chart_image')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror

                @if ($item->size_chart_image)
                    <div class="mt-2">
                        <img src="{{ asset($item->size_chart_image) }}" alt="{{ $item->title }}"
                            class="product-item-preview">
                    </div>
                @endif
            </div>
        </div>
    </div>

    <h5 class="mt-4 mb-3">SEO</h5>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="seo_title">SEO Title</label>
                <input type="text" name="seo_title" id="seo_title"
                    class="form-control @error('seo_title') is-invalid @enderror"
                    value="{{ old('seo_title', $item->seo_title) }}">

                @error('seo_title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="seo_keywords">SEO Keywords</label>
                <input type="text" name="seo_keywords" id="seo_keywords"
                    class="form-control @error('seo_keywords') is-invalid @enderror"
                    value="{{ old('seo_keywords', $item->seo_keywords) }}">

                @error('seo_keywords')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="seo_description">SEO Description</label>
        <textarea name="seo_description" id="seo_description" rows="4"
            class="form-control @error('seo_description') is-invalid @enderror">{{ old('seo_description', $item->seo_description) }}</textarea>

        @error('seo_description')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <h5 class="mt-4 mb-3">Visibility</h5>
    <div class="row">
        <div class="col-md-6">
            <input type="hidden" name="show_in_store" value="0">
            <div class="custom-control custom-switch">
                <input type="checkbox" name="show_in_store" value="1" id="show_in_store"
                    class="custom-control-input @error('show_in_store') is-invalid @enderror"
                    @checked((bool) old('show_in_store', $item->show_in_store))>
                <label class="custom-control-label" for="show_in_store">Show in store</label>
            </div>
        </div>

        <div class="col-md-6">
            <input type="hidden" name="show_in_menu" value="0">
            <div class="custom-control custom-switch">
                <input type="checkbox" name="show_in_menu" value="1" id="show_in_menu"
                    class="custom-control-input @error('show_in_menu') is-invalid @enderror"
                    @checked((bool) old('show_in_menu', $item->show_in_menu))>
                <label class="custom-control-label" for="show_in_menu">Show in menu</label>
            </div>
        </div>
    </div>
</div>

<div class="card-footer d-flex justify-content-between">
    <a href="{{ route('backend.collections.categories.products.show', [$collection, $category, $product]) }}"
        class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i>
        Save
    </button>
</div>
