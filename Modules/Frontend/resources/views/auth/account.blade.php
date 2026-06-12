@extends('frontend::layouts.app')

@section('title', 'My Account - GEMNAH')

@section('content')
    <div class="breadcrumb-area ptb-30 bg-img text-center gemnah-about-template-banner"
        data-bgimg="{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}"
        style="background-image: url('{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}')">
        <div class="container">
            <h2 class="extra-color font-24 font-xl-32 mst-4 mst-xl-7">My account</h2>
        </div>
    </div>

    <main id="main">
        <section class="gemnah-account-content">
            <div class="container">
                @if (session('success'))
                    <div class="gemnah-auth-alert gemnah-account-alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="gemnah-account-wrap">
                    <section class="gemnah-account-panel">
                        <div class="gemnah-account-panel-header">
                            <div>
                                <span class="gemnah-auth-kicker">CUSTOMER</span>
                                <h2>Account details</h2>
                            </div>
                        </div>

                        <dl class="gemnah-account-details">
                            <div>
                                <dt>Name</dt>
                                <dd>{{ $customer->name }}</dd>
                            </div>

                            <div>
                                <dt>Email</dt>
                                <dd>{{ $customer->email }}</dd>
                            </div>

                            <div>
                                <dt>Phone</dt>
                                <dd>{{ $customer->phone ?: '-' }}</dd>
                            </div>
                        </dl>

                        <form action="{{ route('frontend.logout') }}" method="post" class="gemnah-account-logout-form">
                            @csrf
                            <button type="submit" class="btn-style quaternary-btn gemnah-account-logout">
                                Sign out
                            </button>
                        </form>
                    </section>
                </div>
            </div>
        </section>
    </main>
@endsection
