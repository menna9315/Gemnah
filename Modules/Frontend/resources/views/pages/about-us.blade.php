@extends('frontend::layouts.app')

@section('title', 'About Us - GEMNAH')

@section('content')
    <div class="breadcrumb-area ptb-30 bg-img text-center gemnah-about-template-banner"
        data-bgimg="{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}"
        style="background-image: url('{{ asset('frontend/assets/image/other/gemnah-inner-banner.png') }}')">
        <div class="container">
            {{-- <span class="d-block extra-color">
                <a href="{{ route('frontend.home') }}" class="extra-color">Home</a> - About us
            </span> --}}
            <h2 class="extra-color font-24 font-xl-32 mst-4 mst-xl-7">About us</h2>
        </div>
    </div>

    <main id="main">
        {{-- <section class="gemnah-about-banner-section">
            <div class="container">
                <div class="about-banner">
                    <div class="banner-hover">
                        <span class="d-block banner-img br-hidden">
                            <img src="{{ asset('frontend/assets/image/other/about-banner1.jpg') }}" class="w-100 img-fluid" alt="About GEMNAH">
                        </span>
                    </div>
                </div>
            </div>
        </section> --}}

        <section class="gemnah-about-content">
            <div class="container">
                <div class="gemnah-about-list">
                    @forelse ($paragraphs as $paragraph)
                        <article class="gemnah-about-paragraph">
                            @if ($paragraph->title)
                                <h2>{{ $paragraph->title }}</h2>
                            @endif

                            @if ($paragraph->description)
                                <div class="gemnah-about-description">
                                    {!! nl2br(e($paragraph->description)) !!}
                                </div>
                            @endif
                        </article>
                    @empty
                        <article class="gemnah-about-paragraph text-center">
                            <h2>About GEMNAH</h2>
                            <div class="gemnah-about-description">
                                About us content will appear here once it is added from the dashboard.
                            </div>
                        </article>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
@endsection
