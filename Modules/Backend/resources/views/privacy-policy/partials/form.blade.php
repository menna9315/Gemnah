<div class="card-body">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title', $privacyPolicyParagraph->title) }}">

        @error('title')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="7"
            class="form-control @error('description') is-invalid @enderror">{{ old('description', $privacyPolicyParagraph->description) }}</textarea>

        @error('description')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="paragraph_order">Paragraph Order</label>
        <input type="number" name="paragraph_order" id="paragraph_order"
            class="form-control @error('paragraph_order') is-invalid @enderror"
            value="{{ old('paragraph_order', $privacyPolicyParagraph->paragraph_order) }}">

        @error('paragraph_order')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="card-footer d-flex justify-content-between">
    <a href="{{ route('backend.privacy-policy.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i>
        Save
    </button>
</div>
