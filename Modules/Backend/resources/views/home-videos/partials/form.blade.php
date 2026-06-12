<div class="card-body">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title', $homeVideo->title) }}">

        @error('title')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="6"
            class="form-control @error('description') is-invalid @enderror">{{ old('description', $homeVideo->description) }}</textarea>

        @error('description')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="video">Video</label>
        <input type="file" name="video" id="video" class="form-control-file @error('video') is-invalid @enderror">

        @error('video')
            <span class="invalid-feedback d-block">{{ $message }}</span>
        @enderror

        @if ($homeVideo->video)
            <div class="mt-2">
                <video class="home-video-preview" src="{{ asset($homeVideo->video) }}" controls
                    preload="metadata"></video>
            </div>
        @endif
    </div>

    <input type="hidden" name="display_at_home" value="0">
    <div class="custom-control custom-switch">
        <input type="checkbox" name="display_at_home" value="1" id="display_at_home"
            class="custom-control-input @error('display_at_home') is-invalid @enderror"
            @checked((bool) old('display_at_home', $homeVideo->display_at_home))>
        <label class="custom-control-label" for="display_at_home">Display at home</label>
    </div>

    @error('display_at_home')
        <span class="invalid-feedback d-block">{{ $message }}</span>
    @enderror
</div>

<div class="card-footer d-flex justify-content-between">
    <a href="{{ route('backend.home-videos.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i>
        Save
    </button>
</div>
