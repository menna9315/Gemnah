@extends('frontend::layouts.app')

@section('title', 'Shipping Policy - GEMNAH')

@section('content')
    <div class="breadcrumb-area ptb-30 bg-img text-center gemnah-about-template-banner"
        data-bgimg="{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}"
        style="background-image: url('{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}')">
        <div class="container">
            <h2 class="extra-color font-24 font-xl-32 mst-4 mst-xl-7">Shipping Policy</h2>
        </div>
    </div>

    <main id="main">
        <section class="gemnah-shipping-content">
            <div class="container">
                <div class="gemnah-shipping-list">
                    @forelse ($paragraphs as $paragraph)
                        @if ($paragraph->title || $paragraph->description)
                            <article class="gemnah-shipping-panel">
                                @if ($paragraph->title)
                                    <h2 class="gemnah-shipping-title">{{ $paragraph->title }}</h2>
                                @endif

                                @if ($paragraph->description)
                                    <div class="gemnah-shipping-description">
                                        {!! nl2br(e($paragraph->description)) !!}
                                    </div>
                                @endif
                            </article>
                        @endif
                    @empty
                        <article class="gemnah-shipping-panel text-center">
                            Shipping policy content will appear here once it is added from the dashboard.
                        </article>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
@endsection
