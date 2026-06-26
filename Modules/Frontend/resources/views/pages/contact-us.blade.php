@extends('frontend::layouts.app')

@section('title', 'Contact Us - GEMNAH')

@section('content')
    <div class="breadcrumb-area ptb-30 bg-img text-center gemnah-about-template-banner"
        data-bgimg="{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}"
        style="background-image: url('{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}')">
        <div class="container">
            <h2 class="extra-color font-24 font-xl-32 mst-4 mst-xl-7">Contact us</h2>
        </div>
    </div>

    <main id="main">
        <section class="gemnah-contact-content">
            <div class="container">
                @if (session('success'))
                    <div class="gemnah-contact-alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="gemnah-contact-grid">
                    <aside class="gemnah-contact-info">
                        <span class="gemnah-contact-kicker">CONTACT GEMNAH</span>
                        {{-- <h2>{{ $contact?->name ?: 'Contact GEMNAH' }}</h2> --}}

                        <div class="gemnah-contact-list">
                       

                            @if ($contact?->email)
                                <a href="mailto:{{ $contact->email }}" class="gemnah-contact-item">
                                    <span><i class="ri-mail-line"></i></span>
                                    <strong>{{ $contact->email }}</strong>
                                </a>
                            @endif
                        </div>

                        @if ($contact?->instgram_link || $contact?->facebook_link || $contact?->tiktok_link)
                            <ul class="gemnah-contact-social">
                                @if ($contact?->instgram_link)
                                    <li>
                                        <a href="{{ $contact->instgram_link }}" target="_blank" rel="noopener"
                                            aria-label="Instagram">
                                            <i class="ri-instagram-line"></i>
                                        </a>
                                    </li>
                                @endif

                                @if ($contact?->facebook_link)
                                    <li>
                                        <a href="{{ $contact->facebook_link }}" target="_blank" rel="noopener"
                                            aria-label="Facebook">
                                            <i class="ri-facebook-fill"></i>
                                        </a>
                                    </li>
                                @endif

                                @if ($contact?->tiktok_link)
                                    <li>
                                        <a href="{{ $contact->tiktok_link }}" target="_blank" rel="noopener"
                                            aria-label="Tiktok">
                                            <i class="ri-tiktok-line"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        @endif
                    </aside>

                    <section class="gemnah-contact-form-wrap">
                        <h2>Send a message</h2>

                        <form action="{{ route('frontend.contact-us.store') }}" method="post" class="gemnah-contact-form">
                            @csrf

                            <div class="field-row row">
                                <div class="field-col col-12 col-md-6">
                                    <label for="name" class="field-label">Name</label>
                                    <input type="text" name="name" id="name" class="w-100 @error('name') msg_error @enderror"
                                        value="{{ old('name') }}" placeholder="Name" autocomplete="name">
                                    @error('name')
                                        <small class="gemnah-contact-error">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="field-col col-12 col-md-6">
                                    <label for="email" class="field-label">Email</label>
                                    <input type="email" name="email" id="email" class="w-100 @error('email') msg_error @enderror"
                                        value="{{ old('email') }}" placeholder="Email" autocomplete="email">
                                    @error('email')
                                        <small class="gemnah-contact-error">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="field-col col-12">
                                    <label for="phone" class="field-label">Phone</label>
                                    <input type="text" name="phone" id="phone" class="w-100 @error('phone') msg_error @enderror"
                                        value="{{ old('phone') }}" placeholder="Phone" autocomplete="tel">
                                    @error('phone')
                                        <small class="gemnah-contact-error">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="field-col col-12">
                                    <label for="message" class="field-label">Message</label>
                                    <textarea name="message" id="message" rows="6"
                                        class="w-100 @error('message') msg_error @enderror"
                                        placeholder="Message">{{ old('message') }}</textarea>
                                    @error('message')
                                        <small class="gemnah-contact-error">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="field-col col-12">
                                    <button type="submit" class="btn-style secondary-btn gemnah-contact-submit">
                                        Send message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </section>
    </main>
@endsection
