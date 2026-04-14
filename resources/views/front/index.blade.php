@extends('front.layouts.main')


@section('content')
<x-seo-meta :title="$seoMeta->meta_title" :description="$seoMeta->meta_des" :keywords="$seoMeta->meta_keyword" />

@push('page-css')
    <style>
        .print-tab .print-tab-content>div {
            display: none;
        }

        .print-tab .print-tab-content>div.view {
            display: block;
        }
    </style>
@endpush

{{-- ══════════════════════════════════════
BANNER / SLIDER
══════════════════════════════════════ --}}
<div class="banner-section">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-indicators">
            @foreach ($sliders as $index => $slider)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}"
                    class="{{ $index == 0 ? 'active' : '' }}" aria-label="Slide {{ $index + 1 }}">
                </button>
            @endforeach
        </div>

        <div class="carousel-inner">
            @foreach ($sliders as $index => $slider)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ asset('uploads/' . $slider->image) }}" class="d-block w-100" alt="{{ $slider->title }}">
                    <div class="carousel-overlay"></div>
                    <div class="carousel-caption">
                        <h1 class="bounceInUp wow">{{ $slider->title }}</h1>
                        <p class="bounceInUp wow">{!! $slider->content !!}</p>
                        <a href="{{ $slider->link ?? '#' }}" class="btn btn-join">View Details</a>
                        <img class="logo-images" src="{{ asset('images/YTTC-11.png') }}" alt="">
                    </div>
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>
</div>


{{-- ══════════════════════════════════════
WELCOME SECTION
══════════════════════════════════════ --}}
@if($welcome)
    <div class="welcome-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 welcome-left">
                    <h1>{{$welcome->title ?? 'Namaste and Welcome to Pokhara Yoga School and Retreat Center'}}</h1>

                    @if(!empty($welcome?->content))
                        {!! $welcome->content !!}
                    @else
                        <p>
                            Yoga is a way of life. Whether you aspire to be a certified Yoga teacher or desire to learn Yoga
                            in-depth to adopt it in your life and tap its optimum benefits, the best Yoga School in Nepal
                            welcomes passionate learners like you with open arms. Visit Pokhara Yoga School and Retreat Center
                            for a unique and soul-enriching experience.
                        </p>
                        <p>
                            Founded in 2019 in Pokhara with a vision to empower Yoga learners and enrich their lives with
                            in-depth learning and profound practice, our Yoga School provides 200-hours, 300-hours, and
                            500-hours Yoga Teacher Training in Nepal from talented and experienced teachers. Give yourself the
                            gift of an immersive and transformative spiritual journey with our Yoga Specialists.
                        </p>
                    @endif

                    <a href="{{ route('front.about') }}" class="btn btn-view mt-2">View Details</a>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 welcome-right">
                    @php
                        preg_match(
                            '/(?:youtube\.com\/(?:embed\/|watch\?v=|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/',
                            $welcome->video,
                            $matches,
                        );
                        $videoId = $matches[1] ?? null;
                        $thumbnail = $videoId
                            ? "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg"
                            : asset('images/train4.jpg');
                        $embedUrl = $videoId
                            ? "https://www.youtube.com/embed/{$videoId}?autoplay=1&rel=0"
                            : $welcome->video;
                    @endphp
                    <div class="play yt-thumb-wrap" data-embed="{{ $welcome->video }}" onclick="openYtLightbox(this)">
                        <img src="{{ $thumbnail }}" alt="{{ $welcome->title }}"
                            style="width:100%;height:100%;object-fit:cover;opacity:.85;transition:opacity .3s;"
                            onmouseover="this.style.opacity='.6'" onmouseout="this.style.opacity='.85'"
                            onerror="this.src='{{ asset('images/train4.jpg') }}'">
                        <div
                            style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;pointer-events:none;">
                            <svg viewBox="0 0 68 48" width="52" height="36" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M66.5 7.7a8.5 8.5 0 0 0-6-6C55.8.9 34 .9 34 .9S12.2.9 7.5 1.7a8.5 8.5 0 0 0-6 6C.7 12.4.7 24 .7 24s0 11.6.8 16.3a8.5 8.5 0 0 0 6 6c4.7.8 26.5.8 26.5.8s21.8 0 26.5-.8a8.5 8.5 0 0 0 6-6c.8-4.7.8-16.3.8-16.3s0-11.6-.8-16.3z"
                                    fill="red" />
                                <path d="M27.1 34.6l17.6-10.6-17.6-10.6v21.2z" fill="#fff" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

{{-- Welcome video popup --}}
<div class="modal fade welcome-popup" id="welcomeVideoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- Replace with dynamic URL when ready --}}
                <iframe width="100%" height="450" src="https://www.youtube.com/embed/0Ish_xCBEu0"
                    title="Pokhara Yoga School" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>


{{-- ══════════════════════════════════════
UPCOMING TRAININGS
══════════════════════════════════════ --}}
<div class="offer-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12">
                <h4>Upcoming Trainings</h4>
            </div>
            @foreach ($trainings as $training)
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-banner">
                            <a href="{{ route('yoga-class.single-page', $training->slug) }}">
                                <img class="banner-img" src="{{ asset('/uploads/course/' . $training->image) }}"
                                    alt="{{ $training->title }}">
                            </a>
                        </div>
                        <div class="card-body">
                            <h2 class="blog-title">
                                <a href="{{ route('yoga-class.single-page', $training->slug) }}">{{ $training->title }}</a>
                            </h2>
                            <p>{{ Str::limit(strip_tags($training->content), 80) }}</p>
                            <a href="{{ route('yoga-class.single-page', $training->slug) }}" class="btn btn-views">Apply
                                Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


{{-- ══════════════════════════════════════
POPULAR COURSES
══════════════════════════════════════ --}}
<div class="course-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12">
                <h3>Our Popular Courses</h3>
            </div>
            @foreach ($popularCourses as $course)
                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="image-box">
                        <img src="{{ asset('uploads/' . $course->image) }}" alt="{{ $course->title }}">
                        <div class="text-overlay">
                            <h2><a href="{{ route('yoga-class.single-page', $course->slug) }}">{{ $course->title }}</a>
                            </h2>
                            <p>{{ Str::limit(strip_tags($course->content), 100) }}</p>
                            <a href="{{ route('yoga-class.single-page', $course->slug) }}" class="btn btn-views">View
                                More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


{{-- ══════════════════════════════════════
VIDEO SECTION (full-width background)
══════════════════════════════════════ --}}
<div class="video-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="video-div">
                    <div class="overlay">
                        <a href="#" data-toggle="modal" data-target="#bgVideoModal">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade welcome-popup" id="bgVideoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe width="100%" height="450" src="https://www.youtube.com/embed/0Ish_xCBEu0"
                    title="Pokhara Yoga School" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>


{{-- ══════════════════════════════════════
COMMUNITY SUPPORT
══════════════════════════════════════ --}}
<main class="campaign-details">
    <div class="container">
        <div class="campaign-content">
            <div class="campaign-info">
                <h2>Community Supports</h2>
                <p>We believe yoga is for everyone. This year, we're raising funds to provide free classes, mats, and
                    teacher training scholarships to underserved communities, spreading healing and mindfulness far and
                    wide.</p>
                <ul class="stats-list">
                    <li><i class="fas fa-check-circle"></i> 500+ Free Yoga Mats Distributed</li>
                    <li><i class="fas fa-check-circle"></i> 20 Teacher Scholarships Funded</li>
                    <li><i class="fas fa-check-circle"></i> 10 Community Centers Supported</li>
                </ul>
            </div>
            <div class="donation-tiers">
                @if ($aboutUs && $aboutUs->image)
                    <img src="{{ asset('uploads/' . $aboutUs->image) }}" alt="Community Support">
                @else
                    <img src="{{ asset('images/img.jpg') }}" alt="Community Support">
                @endif
            </div>
        </div>
    </div>
</main>


{{-- ══════════════════════════════════════
SPECIAL OFFERS / SCHOLARSHIPS
══════════════════════════════════════ --}}
<div class="scholar-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="section-title">
                    <h2>Special Offers</h2>
                    <p>We believe everyone deserves access to the transformative power of yoga. Our scholarships are
                        designed to support passionate practitioners on their journey.</p>
                </div>
                <div class="scholarship-cards">
                    {{-- Static for now — make dynamic later --}}
                    <div class="scholarship-card">
                        <a href="#"><img src="{{ asset('images/schelor1.jpg') }}" alt="Beginner's Path"></a>
                        <div class="discount-badge"><span class="percent">50%</span><span class="off">OFF</span>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title"><a href="#">Beginner's Path</a></h3>
                            <a href="#" class="card-button">View More</a>
                        </div>
                    </div>
                    <div class="scholarship-card">
                        <a href="#"><img src="{{ asset('images/schelor2.jpg') }}" alt="Teacher Training"></a>
                        <div class="discount-badge"><span class="percent">40%</span><span class="off">OFF</span>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title"><a href="#">Teacher Training</a></h3>
                            <a href="#" class="card-button">View More</a>
                        </div>
                    </div>
                    <div class="scholarship-card">
                        <a href="#"><img src="{{ asset('images/schelor3.jpg') }}" alt="Community Service"></a>
                        <div class="discount-badge"><span class="percent">45%</span><span class="off">OFF</span>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title"><a href="#">Community Service</a></h3>
                            <a href="#" class="card-button">View More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- ══════════════════════════════════════
WHY CHOOSE US
══════════════════════════════════════ --}}
<div class="choose-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12">
                <h4>Why choose us?</h4>
                @if ($whyChooseUs)
                    <p>{{ $whyChooseUs->description }}</p>
                @else
                    <p>Power of Now Oasis provides high standards of education, clinical expertise, and holistic healing
                        treatments, all together in a safe environment, conducive to personal growth and transformation.
                    </p>
                @endif
            </div>

            @if ($features->count())
                @foreach ($features->take(6) as $feature)
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <ul>
                            <li><i class="fa-solid fa-circle-arrow-right"></i> {{ $feature->title }}</li>
                        </ul>
                    </div>
                @endforeach
            @else
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <ul>
                        <li><i class="fa-solid fa-circle-arrow-right"></i> Yoga Alliance accredited school.</li>
                        <li><i class="fa-solid fa-circle-arrow-right"></i> Peaceful beachfront location.</li>
                        <li><i class="fa-solid fa-circle-arrow-right"></i> Professional experienced team of expert
                            teachers.</li>
                        <li><i class="fa-solid fa-circle-arrow-right"></i> Highly regarded school, est 2010.</li>
                        <li><i class="fa-solid fa-circle-arrow-right"></i> 20 students maximum for personalized
                            attention.</li>
                        <li><i class="fa-solid fa-circle-arrow-right"></i> Individually customized Health Retreats.
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <ul>
                        <li><i class="fa-solid fa-circle-arrow-right"></i> Ayurvedic and Chinese medicine available.
                        </li>
                        <li><i class="fa-solid fa-circle-arrow-right"></i> Mental health and counselling available.
                        </li>
                        <li><i class="fa-solid fa-circle-arrow-right"></i> Zero-tolerance harassment policy.</li>
                        <li><i class="fa-solid fa-circle-arrow-right"></i> Karma yoga charitable foundation.</li>
                        <li><i class="fa-solid fa-circle-arrow-right"></i> Accommodation packages available.</li>
                        <li><i class="fa-solid fa-circle-arrow-right"></i> Honesty, integrity, authenticity in
                            everything we do.</li>
                    </ul>
                </div>
            @endif

            <div class="col-12 col-sm-6 col-md-6 col-lg-3"><img src="{{ asset('images/train7.png') }}" alt=""></div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3"><img src="{{ asset('images/train3.jpg') }}" alt=""></div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3"><img src="{{ asset('images/img.jpg') }}" alt="">
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3"><img src="{{ asset('images/train4.jpg') }}" alt=""></div>
        </div>
    </div>
</div>


{{-- ══════════════════════════════════════
GOOGLE REVIEWS (static placeholder)
══════════════════════════════════════ --}}
<div class="review">
    <h4>Google reviews</h4>
    <div class="elfsight-app-e22d77ae-3d63-4eee-8623-0174447a3272" data-elfsight-app-lazy></div>

</div>


{{-- ══════════════════════════════════════
QUOTES
══════════════════════════════════════ --}}
<div class="quote-section">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h4>Quote's for life</h4>
                </div>
                <div class="col-12 col-sm-12">
                    <div class="owl-four owl-carousel owl-theme">
                        <div class="item">
                            <h5>"Yoga does not just change the way we see things, it transforms the person who sees."
                            </h5>
                        </div>
                        <div class="item">
                            <h5>"When you listen to yourself, everything comes naturally. It comes from inside, like a
                                kind of will to do something. Try to be sensitive. That is yoga."</h5>
                        </div>
                        <div class="item">
                            <h5>"We all wish for world peace, but world peace will never be achieved unless we first
                                establish peace within our own minds."</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- ══════════════════════════════════════
WHY COME TO POKHARA
══════════════════════════════════════ --}}
<div class="comming-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12">
                <h4>
                    {{ $whyChooseUs->title ?? 'Why Coming To Pokhara, Nepal?' }}
                </h4>
                @if(!empty($whyChooseUs?->content))
                    {!! $whyChooseUs->content !!}
                @else
                    <p>
                        Nepal is an ancient land where yogis and sages have made their mark for thousands of years.
                        Its history and geography make this the perfect place for seekers and yogis to take a break
                        from the noise and demands of modern life, and step onto the yogic path.
                    </p>

                    <p>
                        Pokhara Yoga School is your best choice if you are looking for YTT Courses in Nepal, dedicated
                        teachers, rich traditional knowledge and an awe-inspiring scenery — the ideal setting for deep
                        introspection and reflection.
                    </p>

                    <p>
                        Embark upon a unique adventure of yoga and spirituality in the lap of the Himalayas, under the
                        guidance of acclaimed teachers at Pokhara Yoga School.
                    </p>
                @endif
                <a href="{{ route('front.about') }}" class="btn btn-teacher">Read More</a>
            </div>
        </div>
    </div>
</div>


{{-- ══════════════════════════════════════
MEET / CALENDAR (static — make dynamic later)
══════════════════════════════════════ --}}
<div class="question-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12">
                <h4>Do you have any questions?</h4>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="calendar-box">
                    <h5>Meet with house of OM</h5>
                    <div class="calendar-header">
                        <button class="nav-button" id="prevMonth">&lt;</button>
                        <div class="month-year" id="monthYear"></div>
                        <button class="nav-button" id="nextMonth">&gt;</button>
                    </div>
                    <div class="weekdays">
                        <div class="weekday">Sun</div>
                        <div class="weekday">Mon</div>
                        <div class="weekday">Tue</div>
                        <div class="weekday">Wed</div>
                        <div class="weekday">Thu</div>
                        <div class="weekday">Fri</div>
                        <div class="weekday">Sat</div>
                    </div>
                    <div class="days" id="calendarDays"></div>
                    <div class="footer">
                        <div class="selected-date" id="selectedDateDisplay">No date selected</div>
                        <button class="clear-button" id="clearSelection">Clear Selection</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 question-right">
                <h5>Meeting location</h5>
                <p class="meet"><i class="fa fa-map-marker-alt"></i> Google Meet</p>
                <h5>Meeting Duration</h5>
                <p class="time">30 mins</p>
                <h6>What time works best?</h6>
                <p>Showing times for your selected date</p>
                <form>
                    <select>
                        <option>UTC +05:45 Kathmandu, Kathmandu</option>
                    </select>
                </form>
                <ul>
                    <li><a href="#">1:00 pm</a></li>
                    <li><a href="#">2:00 pm</a></li>
                    <li><a href="#">3:00 pm</a></li>
                    <li><a href="#">4:00 pm</a></li>
                    <li><a href="#">5:00 pm</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


{{-- ══════════════════════════════════════
FEE & SCHEDULE (TABS)
══════════════════════════════════════ --}}

<div class="training-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12">
                <h4>Yoga Teacher Training Fees and Schedule</h4>
            </div>
            <div class="col-12 col-sm-12">
                <div class="print-tab" data-tab-id="1">

                    {{-- Tab Menu --}}
                    <ul class="print-tab-menu">
                        @foreach ($feeCategory as $index => $category)
                            <li data-tab-menu="tab-{{ $category->id }}" class="{{ $index == 0 ? 'active' : '' }}">
                                <a>{{ $category->title }}</a>
                            </li>
                        @endforeach
                    </ul>

                    {{-- Tab Content --}}
                    <div class="print-tab-content">
                        @foreach ($feeCategory as $index => $category)
                            <div data-tab-content="tab-{{ $category->id }}">
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <h3>{{ $category->title }} Yoga Teacher Training</h3>
                                    </div>
                                    @foreach ($category->feeList->sortBy('order')->take(6) as $list)
                                        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                            @if (!empty($list->image))
                                                <a href="{{ route('customer.register') }}">
                                                    <img src="{{ asset('uploads/' . $list->image) }}" alt="{{ $category->title }}">
                                                </a>
                                            @endif
                                            <div class="training-content">
                                                <ul>
                                                    <li>From: <span>{{ $list->from }}</span></li>
                                                    <li>To: <span>{{ $list->to }}</span></li>
                                                    <li>Place: <span>{{ $list->place }}</span></li>
                                                    <li>Triple Room: <span>{{ $list->triple_room }} USD</span></li>
                                                    <li>Shared Room: <span>{{ $list->share_room }} USD</span></li>
                                                    <li>Private Room: <span>{{ $list->private_room }} USD</span></li>
                                                </ul>
                                                <a href="{{ route('customer.register') }}" class="btn btn-apply">Apply Now</a>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-12 col-sm-12">
                                        <a href="{{ route('front.teacher') }}" class="btn btn-viewmore">View
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════
ACCOMMODATION & FOOD (static — make dynamic later)
══════════════════════════════════════ --}}
<div class="accommodation-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12">
                <h4>Accommodation & Food</h4>
            </div>
            @foreach ([['Student Life', 'food1.jpg', 'During the course, classes are held 5 days a week, for approximately 8 hours a day.'], ['Room & Facilities', 'food2.jpg', 'Our private rooms come fitted with king sized double beds with carefully selected mattresses.'], ['Food', 'food3.jpg', 'Infinity Resort is proud to serve guests wholesome vegetarian meals.']] as $item)
                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="image-box">
                        <img src="{{ asset('images/' . $item[1]) }}" alt="{{ $item[0] }}">
                        <div class="text-overlay">
                            <h2><a href="#">{{ $item[0] }}</a></h2>
                            <p>{{ $item[2] }}</p>
                            <a href="#" class="btn btn-views">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


{{-- ══════════════════════════════════════
FAQs══════════════════════════════════════ --}}
<div class="faqs-section">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-1 col-lg-1"></div>
                <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                    <h4>Frequently Asked Questions</h4>
                    <div class="accordion-container">
                        @foreach ($faqs as $faqGroup)
                            @foreach ($faqGroup->faq_content as $faq)
                                <div class="set">
                                    <a href="javascript:void(0)">
                                        {{ $faq['question'] }}
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <div class="content" style="display: none;">
                                        <p>{!! $faq['answer'] !!}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-1 col-lg-1"></div>
            </div>
        </div>
    </div>
</div>


{{-- ══════════════════════════════════════
GALLERY
══════════════════════════════════════ --}}
<div class="gallery-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12">
                <h4>Our Gallery</h4>
            </div>
        </div>
        <div class="portfolio-item row">
            @foreach ($photoList as $photo)
                <div class="item selfie col-12 col-sm-12 col-md-6 col-lg-3">
                    <a href="{{ asset('uploads/galary/' . $photo->image) }}" class="fancylight popup-btn"
                        data-fancybox-group="light">
                        <figure>
                            <img class="img-fluid" src="{{ asset('uploads/galary/thumbnails/' . $photo->image) }}"
                                alt="Pokhara Yoga School">
                        </figure>
                        @if ($photo->description)
                            <h5>{{ $photo->description }}</h5>
                        @endif
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>


{{-- ══════════════════════════════════════
TESTIMONIALS
══════════════════════════════════════ --}}
<div class="testimonials">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12">
                <h4>Testimonials</h4>
            </div>

            {{-- Text testimonials --}}
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 tesi-middle">
                <h5>Student Says</h5>
                <div class="owl-two owl-carousel owl-theme">
                    @forelse ($testimonials as $test)
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

            {{-- Video testimonials --}}
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
                            <div class="yt-thumb-wrap" data-embed="{{ $embedUrl }}" onclick="openYtLightbox(this)"
                                style="position:relative;cursor:pointer;border-radius:6px;overflow:hidden;aspect-ratio:16/9;background:#000;">
                                <img src="{{ $thumbnail }}" alt="{{ $testimonial->title }}"
                                    style="width:100%;height:100%;object-fit:cover;opacity:.85;transition:opacity .3s;"
                                    onmouseover="this.style.opacity='.6'" onmouseout="this.style.opacity='.85'"
                                    onerror="this.src='{{ asset('images/train4.jpg') }}'">
                                <div
                                    style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;pointer-events:none;">
                                    <svg viewBox="0 0 68 48" width="52" height="36" xmlns="http://www.w3.org/2000/svg">
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
                                    ...<a href="{{ route('front.video-testimonial-detail', $testimonial->title) }}">Read
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


<x-yt-lite-box />



@push('scripts')
    <!-- Elfsight Google Reviews | Untitled Google Reviews -->
    <script src="https://elfsightcdn.com/platform.js" async></script>
@endpush

@endsection