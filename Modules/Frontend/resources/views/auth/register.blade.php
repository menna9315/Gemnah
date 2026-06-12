@extends('frontend::layouts.app')

@section('title', 'Create Account - GEMNAH')

@section('content')
    <div class="breadcrumb-area ptb-30 bg-img text-center gemnah-about-template-banner"
        data-bgimg="{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}"
        style="background-image: url('{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}')">
        <div class="container">
            <h2 class="extra-color font-24 font-xl-32 mst-4 mst-xl-7">Create account</h2>
        </div>
    </div>

    <main id="main">
        <section class="gemnah-auth-content">
            <div class="container">
                <div class="gemnah-auth-layout">
                    <aside class="gemnah-auth-intro">
                        <span class="gemnah-auth-kicker">JOIN GEMNAH</span>
                        <h1>Your account</h1>
                        <p>Create a customer profile for a smoother GEMNAH shopping experience.</p>
                    </aside>

                    <section class="gemnah-auth-panel">
                        <form action="{{ route('frontend.register.store') }}" method="post" class="gemnah-auth-form">
                            @csrf

                            <div class="field-row row">
                                <div class="field-col col-12 col-md-6">
                                    <label for="name" class="field-label">Name</label>
                                    <input type="text" name="name" id="name"
                                        class="w-100 @error('name') msg_error @enderror"
                                        value="{{ old('name') }}" placeholder="Name" autocomplete="name" autofocus>
                                    @error('name')
                                        <small class="gemnah-auth-error">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="field-col col-12 col-md-6">
                                    <label for="phone" class="field-label">Phone</label>
                                    <input type="text" name="phone" id="phone"
                                        class="w-100 @error('phone') msg_error @enderror"
                                        value="{{ old('phone') }}" placeholder="Phone" autocomplete="tel">
                                    @error('phone')
                                        <small class="gemnah-auth-error">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="field-col col-12">
                                    <label for="email" class="field-label">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="w-100 @error('email') msg_error @enderror"
                                        value="{{ old('email') }}" placeholder="Email" autocomplete="email">
                                    @error('email')
                                        <small class="gemnah-auth-error">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="field-col col-12 col-md-6">
                                    <label for="password" class="field-label">Password</label>
                                    <input type="password" name="password" id="password"
                                        class="w-100 @error('password') msg_error @enderror"
                                        placeholder="Password" autocomplete="new-password">
                                    @error('password')
                                        <small class="gemnah-auth-error">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="field-col col-12 col-md-6">
                                    <label for="password_confirmation" class="field-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="w-100" placeholder="Confirm password" autocomplete="new-password">
                                </div>

                                <div class="field-col col-12">
                                    <button type="submit" class="btn-style secondary-btn gemnah-auth-submit">
                                        Create account
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="gemnah-auth-switch">
                            Already have an account?
                            <a href="{{ route('frontend.login') }}">Sign in</a>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </main>
@endsection
