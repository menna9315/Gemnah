<div class="card-body">
    <div class="alert alert-light border">
        Collection: <strong>{{ $collection->title }}</strong>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $category->title) }}">

                @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                    value="{{ old('slug', $category->slug) }}" placeholder="Generated from title if empty">

                @error('slug')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="category_order">Order</label>
                <input type="number" name="category_order" id="category_order"
                    class="form-control @error('category_order') is-invalid @enderror"
                    value="{{ old('category_order', $category->category_order ?? 0) }}" min="0">

                @error('category_order')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="5"
            class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description) }}</textarea>

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

        @if ($category->image)
            <div class="mt-2">
                <img src="{{ asset($category->image) }}" alt="{{ $category->title }}" class="category-preview">
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="seo_title">SEO Title</label>
                <input type="text" name="seo_title" id="seo_title"
                    class="form-control @error('seo_title') is-invalid @enderror"
                    value="{{ old('seo_title', $category->seo_title) }}">

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
                    value="{{ old('seo_keywords', $category->seo_keywords) }}">

                @error('seo_keywords')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="seo_description">SEO Description</label>
        <textarea name="seo_description" id="seo_description" rows="4"
            class="form-control @error('seo_description') is-invalid @enderror">{{ old('seo_description', $category->seo_description) }}</textarea>

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
                    @checked((bool) old('show_in_store', $category->show_in_store))>
                <label class="custom-control-label" for="show_in_store">Show in store</label>
            </div>
        </div>

        <div class="col-md-6">
            <input type="hidden" name="show_in_menu" value="0">
            <div class="custom-control custom-switch">
                <input type="checkbox" name="show_in_menu" value="1" id="show_in_menu"
                    class="custom-control-input @error('show_in_menu') is-invalid @enderror"
                    @checked((bool) old('show_in_menu', $category->show_in_menu))>
                <label class="custom-control-label" for="show_in_menu">Show in menu</label>
            </div>
        </div>
    </div>
</div>

<div class="card-footer d-flex justify-content-between">
    <a href="{{ route('backend.collections.show', $collection) }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i>
        Save
    </button>
</div>
