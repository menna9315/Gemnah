@extends('frontend::layouts.app')

@section('title', 'Your Orders - GEMNAH')

@section('content')
    <div class="breadcrumb-area ptb-30 bg-img text-center gemnah-about-template-banner"
        data-bgimg="{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}"
        style="background-image: url('{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}')">
        <div class="container">
            <h2 class="extra-color font-24 font-xl-32 mst-4 mst-xl-7">Your orders</h2>
        </div>
    </div>

    <main id="main">
        <section class="gemnah-account-content">
            <div class="container">
                <div class="gemnah-account-wrap">
                    @include('frontend::auth.partials.orders', ['orders' => $orders])
                </div>
            </div>
        </section>
    </main>
@endsection
