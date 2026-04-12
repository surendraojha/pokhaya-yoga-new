@extends('front.layouts.main')

<x-seo-meta :title="$seoMeta->meta_title" :description="$seoMeta->meta_des" :keywords="$seoMeta->meta_keyword" />
@section('content')
    <!-- start banner Area -->
    @foreach ($aboutUs as $aboutus)
        <div class="page-header mb-5"
            style="background: url({{ asset('uploads/' . $aboutus->image) }}) no-repeat center center;background-repeat: no-repeat; background-size: cover; background-position: center;resize: both;    height: 500px;">
            <div class="container ">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center  " style="padding-top: 200px; color: #fff">About Us</h1>
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div>
    @endforeach

    <!-- End feature Area -->
    @foreach ($aboutUs as $aboutus)
        <!-- Start info Area -->
        <div class="wrapper">
            <section class="info-area pb-5">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-11 info-area-right">
                            <h2 class="mt-5 text-uppercase">{{ $aboutus->title }}</h2>
                            <p class="text-justify">
                                {!! $aboutus->content !!}
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- End info Area -->
    @endforeach




    <div class="faqs-section">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-1 col-lg-1">

                    </div>
                    <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                        <h4>Frequently Asked Questions</h4>
                        <div class="accordion-container">
                            @foreach ($faqs as $lists)
                                @foreach ($lists->faq_content as $list)
                                    <div class="set">
                                        <a href="javascript:void(0)">
                                            {{ $list['question'] }}
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <div class="content" style="display: none;">
                                            <p>{!! $list['answer'] !!}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach


                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-1 col-lg-1">

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="gallery-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h4>Our Gallery</h4>
                </div>
            </div>
            <div class="portfolio-item row">
                @foreach ($photoList as $list)
                    <div class="item selfie col-12 col-sm-12 col-md-6 col-lg-3">
                        <a href="{{ asset('uploads/galary/' . $list->image) }}" class="fancylight popup-btn"
                            data-fancybox-group="light">
                            <figure>
                                <img class="img-fluid" src="{{ asset('uploads/galary/thumbnails/' . $list->image) }}"
                                    alt="Pokhara Yoga School">
                            </figure>
                            <h5>{{ $list->description }}</h5>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h4>Testimonials</h4>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 tesi-middle">
                    <h5>Student Says</h5>
                    <div class="owl-two owl-carousel owl-theme">
                        @foreach ($testimonials as $test)
                            <div class="item">
                                <a href="#">
                                    <img class="lazy" src="{{ asset('uploads/testimonials/thumbnails/' . $test->image) }}"
                                        alt="Yoga school in Nepal">
                                </a>
                                <div class="student-content">
                                    <span class="quote"><i class="fa-solid fa-quote-left"></i></span>
                                    <p>

                                        {{ Str::substr(strip_tags($test->content), 0, 100) }}

                                        <a href="{{ route('front.testimonial') }}">Read more <i
                                                class="fa-solid fa-angle-down"></i></a>


                                    </p>
                                    <h6><i class="fa-solid fa-quote-left"></i> {{ $test->name }}, {{ $test->location }}
                                    </h6>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>


                <div class="col-12 col-sm-12 col-md-6 col-lg-6 testi-right">
                    <h5>Video</h5>
                    <div class="owl-three owl-carousel owl-theme">
                        @foreach ($videoTestimonials as $testimonial)
                            @php
                                preg_match(
                                    '/(?:youtube\.com\/(?:embed\/|watch\?v=|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/',
                                    $testimonial->url,
                                    $matches,
                                );
                                $videoId = $matches[1] ?? null;
                                $thumbnail = $videoId
                                    ? "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg"
                                    : asset('images/train4.jpg');
                                $embedUrl = $videoId
                                    ? "https://www.youtube.com/embed/{$videoId}?autoplay=1&rel=0"
                                    : $testimonial->url;
                            @endphp

                            <div class="item">
                                {{-- Clickable thumbnail --}}
                                <div class="yt-thumb-wrap" data-embed="{{ $embedUrl }}" onclick="openYtLightbox(this)"
                                    style="position:relative; cursor:pointer; border-radius:6px; overflow:hidden; aspect-ratio:16/9; background:#000;">
                                    <img src="{{ $thumbnail }}" alt="{{ $testimonial->title }}"
                                        style="width:100%; height:100%; object-fit:cover; opacity:.85; transition:opacity .3s;"
                                        onmouseover="this.style.opacity='.6'" onmouseout="this.style.opacity='.85'"
                                        onerror="this.src='{{ asset('images/train4.jpg') }}'">
                                    <div
                                        style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;pointer-events:none;">
                                        <svg viewBox="0 0 68 48" width="52" height="36"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M66.5 7.7a8.5 8.5 0 0 0-6-6C55.8.9 34 .9 34 .9S12.2.9 7.5 1.7a8.5 8.5 0 0 0-6 6C.7 12.4.7 24 .7 24s0 11.6.8 16.3a8.5 8.5 0 0 0 6 6c4.7.8 26.5.8 26.5.8s21.8 0 26.5-.8a8.5 8.5 0 0 0 6-6c.8-4.7.8-16.3.8-16.3s0-11.6-.8-16.3z"
                                                fill="red" />
                                            <path d="M27.1 34.6l17.6-10.6-17.6-10.6v21.2z" fill="#fff" />
                                        </svg>
                                    </div>
                                </div>

                                <div class="student-content">
                                    <h6>What Our Student Say</h6>
                                    <p>{!! strip_tags(substr($testimonial->content, 0, 100)) !!}
                                        ...<a
                                            href="{{ route('front.video-testimonial-detail', $testimonial->title) }}">Read
                                            more <i class="fa-solid fa-angle-down"></i></a>
                                    </p>
                                    <h6 class="author"><i class="fa-solid fa-quote-left"></i> {{ $testimonial->title }}
                                    </h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- YouTube Lightbox --}}
    <x-yt-lite-box />
@endsection
