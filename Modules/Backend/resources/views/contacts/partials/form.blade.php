<div class="card-body">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $contact->name) }}">

        @error('name')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="phone1">Phone 1</label>
                <input type="text" name="phone1" id="phone1" class="form-control @error('phone1') is-invalid @enderror"
                    value="{{ old('phone1', $contact->phone1) }}">

                @error('phone1')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="phone2">Phone 2</label>
                <input type="text" name="phone2" id="phone2" class="form-control @error('phone2') is-invalid @enderror"
                    value="{{ old('phone2', $contact->phone2) }}">

                @error('phone2')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email', $contact->email) }}">

        @error('email')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="instgram_link">Instagram Link</label>
        <input type="text" name="instgram_link" id="instgram_link"
            class="form-control @error('instgram_link') is-invalid @enderror"
            value="{{ old('instgram_link', $contact->instgram_link) }}">

        @error('instgram_link')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="facebook_link">Facebook Link</label>
        <input type="text" name="facebook_link" id="facebook_link"
            class="form-control @error('facebook_link') is-invalid @enderror"
            value="{{ old('facebook_link', $contact->facebook_link) }}">

        @error('facebook_link')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="tiktok_link">Tiktok Link</label>
        <input type="text" name="tiktok_link" id="tiktok_link"
            class="form-control @error('tiktok_link') is-invalid @enderror"
            value="{{ old('tiktok_link', $contact->tiktok_link) }}">

        @error('tiktok_link')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="card-footer d-flex justify-content-between">
    <a href="{{ route('backend.contacts.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i>
        Save
    </button>
</div>
