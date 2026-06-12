<div class="card-body">
    <div class="form-group">
        <label for="city">City</label>
        <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror"
            value="Alexandria" readonly>

        @error('city')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="amount">Shipping Fee</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">EGP</span>
            </div>
            <input type="number" name="amount" id="amount" step="0.01" min="0"
                class="form-control @error('amount') is-invalid @enderror"
                value="{{ old('amount', $shippingFee->amount) }}" required>

            @error('amount')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="card-footer d-flex justify-content-between">
    <a href="{{ route('backend.shipping-fees.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i>
        Save
    </button>
</div>
