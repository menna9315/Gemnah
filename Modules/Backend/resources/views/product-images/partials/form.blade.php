<div class="card-body">
    <div class="alert alert-light border">
        Collection: <strong>{{ $collection->title }}</strong>
        <span class="mx-2">/</span>
        Category: <strong>{{ $category->title }}</strong>
        <span class="mx-2">/</span>
        Product: <strong>{{ $product->title }}</strong>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image"
                    class="form-control-file @error('image') is-invalid @enderror">

                @error('image')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror

                @if ($productImage->image)
                    <div class="mt-2">
                        <img src="{{ asset($productImage->image) }}" alt="{{ $product->title }}"
                            class="product-image-preview">
                    </div>
                @endif
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="product_order">Order</label>
                <input type="number" name="product_order" id="product_order"
                    class="form-control @error('product_order') is-invalid @enderror"
                    value="{{ old('product_order', $productImage->product_order ?? 0) }}" min="0">

                @error('product_order')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
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
