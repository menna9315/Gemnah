<div class="card-body">
    <div class="alert alert-light border">
        Collection: <strong>{{ $collection->title }}</strong>
        <span class="mx-2">/</span>
        Category: <strong>{{ $category->title }}</strong>
        <span class="mx-2">/</span>
        Product: <strong>{{ $product->title }}</strong>
        <span class="mx-2">/</span>
        Item: <strong>{{ $item->title }}</strong>
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

                @if ($productItemImage->image)
                    <div class="mt-2">
                        <img src="{{ asset($productItemImage->image) }}" alt="{{ $item->title }}"
                            class="product-item-preview">
                    </div>
                @endif
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="item_order">Order</label>
                <input type="number" name="item_order" id="item_order"
                    class="form-control @error('item_order') is-invalid @enderror"
                    value="{{ old('item_order', $productItemImage->item_order ?? 0) }}" min="0">

                @error('item_order')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="card-footer d-flex justify-content-between">
    <a href="{{ route('backend.collections.categories.products.items.show', [$collection, $category, $product, $item]) }}"
        class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i>
        Save
    </button>
</div>
