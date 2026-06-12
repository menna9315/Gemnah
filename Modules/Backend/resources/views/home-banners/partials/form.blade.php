<div class="card-body">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title', $homeBanner->title) }}">

        @error('title')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="6"
            class="form-control @error('description') is-invalid @enderror">{{ old('description', $homeBanner->description) }}</textarea>

        @error('description')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="image_order">Image Order</label>
                <input type="number" name="image_order" id="image_order"
                    class="form-control @error('image_order') is-invalid @enderror"
                    value="{{ old('image_order', $homeBanner->image_order) }}">

                @error('image_order')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="button">Button</label>
                <input type="text" name="button" id="button" class="form-control @error('button') is-invalid @enderror"
                    value="{{ old('button', $homeBanner->button) }}">

                @error('button')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="button_url">Button URL</label>
                <input type="text" name="button_url" id="button_url"
                    class="form-control @error('button_url') is-invalid @enderror"
                    value="{{ old('button_url', $homeBanner->button_url) }}">

                @error('button_url')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror">

        @error('image')
            <span class="invalid-feedback d-block">{{ $message }}</span>
        @enderror

        @if ($homeBanner->image)
            <div class="mt-2">
                <img src="{{ asset($homeBanner->image) }}" alt="{{ $homeBanner->title }}" class="home-banner-preview">
            </div>
        @endif
    </div>
</div>

<div class="card-footer d-flex justify-content-between">
    <a href="{{ route('backend.home-banners.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i>
        Save
    </button>
</div>
