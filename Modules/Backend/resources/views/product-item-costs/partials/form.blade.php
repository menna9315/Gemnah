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
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $productItemCost->name) }}">

                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="value">Value</label>
                <input type="number" name="value" id="value"
                    class="form-control @error('value') is-invalid @enderror"
                    value="{{ old('value', $productItemCost->value ?? 0) }}" min="0" step="0.01">

                @error('value')
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
