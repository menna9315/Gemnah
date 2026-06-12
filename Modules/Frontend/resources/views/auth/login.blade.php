@extends('frontend::layouts.app')

@section('title', 'Sign In - GEMNAH')

@section('content')
    <div class="breadcrumb-area ptb-30 bg-img text-center gemnah-about-template-banner"
        data-bgimg="{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}"
        style="background-image: url('{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}')">
        <div class="container">
            <h2 class="extra-color font-24 font-xl-32 mst-4 mst-xl-7">Sign in</h2>
        </div>
    </div>

    <main id="main">
        <section class="gemnah-auth-content">
            <div class="container">
                <div class="gemnah-auth-layout">
                    <aside class="gemnah-auth-intro">
                        <span class="gemnah-auth-kicker">GEMNAH ACCOUNT</span>
                        <h1>Welcome back</h1>
                        <p>Sign in to continue with your saved details and orders.</p>
                    </aside>

                    <section class="gemnah-auth-panel">
                        @if (session('success'))
                            <div class="gemnah-auth-alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('frontend.login.store') }}" method="post" class="gemnah-auth-form">
                            @csrf

                            <div class="field-row row">
                                <div class="field-col col-12">
                                    <label for="email" class="field-label">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="w-100 @error('email') msg_error @enderror"
                                        value="{{ old('email') }}" placeholder="Email" autocomplete="email" autofocus>
                                    @error('email')
                                        <small class="gemnah-auth-error">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="field-col col-12">
                                    <label for="password" class="field-label">Password</label>
                                    <input type="password" name="password" id="password"
                                        class="w-100 @error('password') msg_error @enderror"
                                        placeholder="Password" autocomplete="current-password">
                                    @error('password')
                                        <small class="gemnah-auth-error">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="field-col col-12">
                                    <label class="gemnah-auth-check">
                                        <input type="checkbox" name="remember" value="1" @checked(old('remember'))>
                                        <span>Remember me</span>
                                    </label>
                                </div>

                                <div class="field-col col-12">
                                    <button type="submit" class="btn-style secondary-btn gemnah-auth-submit">
                                        Sign in
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="gemnah-auth-switch">
                            New to GEMNAH?
                            <a href="{{ route('frontend.register') }}">Create an account</a>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </main>
@endsection
