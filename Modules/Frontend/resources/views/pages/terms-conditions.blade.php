@extends('frontend::layouts.app')

@section('title', 'Terms & Conditions - GEMNAH')

@section('content')
    <div class="breadcrumb-area ptb-30 bg-img text-center gemnah-about-template-banner"
        data-bgimg="{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}"
        style="background-image: url('{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}')">
        <div class="container">
            <h2 class="extra-color font-24 font-xl-32 mst-4 mst-xl-7">Terms & Conditions</h2>
        </div>
    </div>

    <main id="main">
        <section class="gemnah-terms-content">
            <div class="container">
                <div class="gemnah-terms-list">
                    @forelse ($paragraphs as $paragraph)
                        @if ($paragraph->title || $paragraph->description)
                            <article class="gemnah-terms-paragraph">
                                @if ($paragraph->title)
                                    <h4 class="gemnah-terms-title">{{ $paragraph->title }}</h4>
                                @endif

                                @if ($paragraph->description)
                                    <div class="gemnah-terms-description">
                                        {!! nl2br(e($paragraph->description)) !!}
                                    </div>
                                @endif
                            </article>
                        @endif
                    @empty
                        <article class="gemnah-terms-paragraph text-center">
                            Terms and conditions content will appear here once it is added from the dashboard.
                        </article>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
@endsection
