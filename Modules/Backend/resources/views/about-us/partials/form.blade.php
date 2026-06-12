<div class="card-body">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title', $aboutUs->title) }}">

        @error('title')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="6"
            class="form-control @error('description') is-invalid @enderror">{{ old('description', $aboutUs->description) }}</textarea>

        @error('description')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="paragraph_order">Paragraph Order</label>
                <input type="number" name="paragraph_order" id="paragraph_order"
                    class="form-control @error('paragraph_order') is-invalid @enderror"
                    value="{{ old('paragraph_order', $aboutUs->paragraph_order) }}">

                @error('paragraph_order')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="button_title">Button Title</label>
                <input type="text" name="button_title" id="button_title"
                    class="form-control @error('button_title') is-invalid @enderror"
                    value="{{ old('button_title', $aboutUs->button_title) }}">

                @error('button_title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="button_url">Button URL</label>
                <input type="text" name="button_url" id="button_url"
                    class="form-control @error('button_url') is-invalid @enderror"
                    value="{{ old('button_url', $aboutUs->button_url) }}">

                @error('button_url')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        @foreach (['image' => 'Image', 'image2' => 'Image 2'] as $field => $label)
            <div class="col-md-6">
                <div class="form-group">
                    <label for="{{ $field }}">{{ $label }}</label>
                    <input type="file" name="{{ $field }}" id="{{ $field }}"
                        class="form-control-file @error($field) is-invalid @enderror">

                    @error($field)
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror

                    @if ($aboutUs->{$field})
                        <div class="mt-2">
                            <img src="{{ asset($aboutUs->{$field}) }}" alt="{{ $label }}" class="about-us-preview">
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="card-footer d-flex justify-content-between">
    <a href="{{ route('backend.about-us.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i>
        Save
    </button>
</div>
