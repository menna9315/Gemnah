<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="value">Value</label>
                <input type="text" name="value" id="value" class="form-control @error('value') is-invalid @enderror"
                    value="{{ old('value', $size->value) }}">

                @error('value')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="size_chart_image">Size Chart Image</label>
                <input type="file" name="size_chart_image" id="size_chart_image"
                    class="form-control-file @error('size_chart_image') is-invalid @enderror">

                @error('size_chart_image')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror

                @if ($size->size_chart_image)
                    <div class="mt-2">
                        <img src="{{ asset($size->size_chart_image) }}" alt="{{ $size->value }}"
                            class="size-chart-preview">
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="card-footer d-flex justify-content-between">
    <a href="{{ route('backend.sizes.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i>
        Save
    </button>
</div>
