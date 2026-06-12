<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $color->name) }}">

                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="code">Code</label>
                @php
                    $swatchCode = old('code', $color->code ?: '#000000');
                    $swatchCode = preg_match('/^#[0-9A-Fa-f]{6}$/', $swatchCode) ? $swatchCode : '#000000';
                @endphp

                <div class="input-group">
                    <input type="text" name="code" id="code"
                        class="form-control @error('code') is-invalid @enderror"
                        value="{{ old('code', $color->code) }}" placeholder="#000000">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <span class="color-swatch" style="background-color: {{ $swatchCode }}"></span>
                        </span>
                    </div>

                    @error('code')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-footer d-flex justify-content-between">
    <a href="{{ route('backend.colors.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i>
        Save
    </button>
</div>
