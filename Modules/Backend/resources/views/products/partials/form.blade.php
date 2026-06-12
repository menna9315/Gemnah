<div class="card-body">
    <div class="alert alert-light border">
        Collection: <strong>{{ $collection->title }}</strong>
        <span class="mx-2">/</span>
        Category: <strong>{{ $category->title }}</strong>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $product->title) }}">

                @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                    value="{{ old('slug', $product->slug) }}" placeholder="Generated from title if empty">

                @error('slug')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="manual_order">Order</label>
                <input type="number" name="manual_order" id="manual_order"
                    class="form-control @error('manual_order') is-invalid @enderror"
                    value="{{ old('manual_order', $product->manual_order ?? 0) }}" min="0">

                @error('manual_order')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="product_code">Product Code</label>
                <input type="text" name="product_code" id="product_code"
                    class="form-control @error('product_code') is-invalid @enderror"
                    value="{{ old('product_code', $product->product_code) }}">

                @error('product_code')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="taxes">Taxes</label>
                <input type="number" name="taxes" id="taxes"
                    class="form-control @error('taxes') is-invalid @enderror"
                    value="{{ old('taxes', $product->taxes ?? 0) }}" min="0" step="0.01">

                @error('taxes')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="5"
            class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>

        @error('description')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror">

        @error('image')
            <span class="invalid-feedback d-block">{{ $message }}</span>
        @enderror

        @if ($product->image)
            <div class="mt-2">
                <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" class="product-preview">
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="seo_title">SEO Title</label>
                <input type="text" name="seo_title" id="seo_title"
                    class="form-control @error('seo_title') is-invalid @enderror"
                    value="{{ old('seo_title', $product->seo_title) }}">

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
                    value="{{ old('seo_keywords', $product->seo_keywords) }}">

                @error('seo_keywords')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="seo_description">SEO Description</label>
        <textarea name="seo_description" id="seo_description" rows="4"
            class="form-control @error('seo_description') is-invalid @enderror">{{ old('seo_description', $product->seo_description) }}</textarea>

        @error('seo_description')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="row">
        <div class="col-md-6">
            <input type="hidden" name="show_in_store" value="0">
            <div class="custom-control custom-switch">
                <input type="checkbox" name="show_in_store" value="1" id="show_in_store"
                    class="custom-control-input @error('show_in_store') is-invalid @enderror"
                    @checked((bool) old('show_in_store', $product->show_in_store))>
                <label class="custom-control-label" for="show_in_store">Show in store</label>
            </div>
        </div>

        <div class="col-md-6">
            <input type="hidden" name="show_in_menu" value="0">
            <div class="custom-control custom-switch">
                <input type="checkbox" name="show_in_menu" value="1" id="show_in_menu"
                    class="custom-control-input @error('show_in_menu') is-invalid @enderror"
                    @checked((bool) old('show_in_menu', $product->show_in_menu))>
                <label class="custom-control-label" for="show_in_menu">Show in menu</label>
            </div>
        </div>
    </div>
</div>

<div class="card-footer d-flex justify-content-between">
    <a href="{{ route('backend.collections.categories.show', [$collection, $category]) }}"
        class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i>
        Save
    </button>
</div>
