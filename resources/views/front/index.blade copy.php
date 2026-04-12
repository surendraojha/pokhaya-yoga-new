@section('title', "$seoMeta->meta_title")
@section('keyword', "$seoMeta->meta_keyword")
@section('desc', "$seoMeta->meta_des")


@extends('front.layouts.main')


@section('content')
    {{-- slider --}}
    <div class="slider" id="slider-placeholder">

        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @php $c = 1; @endphp
                @foreach ($sliders as $slider)
                    <li data-target="#carouselExampleCaptions" data-slide-to="{{ $c }}"
                        class="@if ($c == 1) active @else @endif"></li>
                    @php $c++; @endphp
                @endforeach
            </ol>
            <div class="carousel-inner">
                @php $c = 1; @endphp
                @foreach ($sliders as $slider)
                    <div class="carousel-item @if ($c == 1) active @endif">
                        <img data-src="{{ asset('uploads/' . $slider->image) }}" class="d-block w-100 delayed-slide-img"
                            alt="Yoga school in nepal" @if ($c != 1) differ @endif>

                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $slider->title }} </h5>
                            <p>{!! $slider->content !!}</p>
                        </div>
                    </div>
                    @php $c++; @endphp
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


    </div>

    <div class="index-h1 col-12 col-sm-12">
        <h1>Yoga Teacher Training In Nepal</h1>
    </div>



    @if (!$announcements->isEmpty())
        <div class="happenings">
            <div class="happenings-wrapper clearfix">
                <div class="happenings-title">
                    <h4 class="text-center text-upper">Announcements!</h4>
                </div>
                <div class="happenings-content">
                    <div class="slick">
                        @foreach ($announcements as $announcement)
                            <div class="announcement">
                                <div class="content-wrapper">
                                    <div class="row">
                                        @if ($announcement->image)
                                            <div class="col-lg-5">
                                                <img src="{{ asset('uploads/' . $announcement->image) }}"
                                                    alt="announcements" differ>
                                            </div>
                                        @endif
                                        <div class="col content-inner">
                                            <p>{!! $announcement->content !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- about us --}}

    <div class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6" {{-- wow fadeInLeft" --}} {{-- data-wow-delay="0.3s" --}}
                    {{-- style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;" --}}>
                    <div class="about-box">
                        <!--<h4>{{ $aboutUs->title }}</h4>-->
                        <h4>Namaste and Welcome to Pokhara Yoga School and Retreat Center</h4>
                        <p class="text-justify">
                            Yoga is a way of life. Whether you aspire to be a certified Yoga teacher or desire to learn Yoga
                            in-depth to adopt it in your life and tap its optimum benefits, the best Yoga School in Nepal
                            welcomes passionate learners like you with open arms. Visit Pokhara Yoga School and Retreat
                            Center for a unique and soul-enriching experience.<br>
                            Founded in 2019 in Pokhara with a vision to empower Yoga learners and enrich their lives with
                            in-depth learning and profound practice, our Yoga School provides 200-hours, 300-hours, and
                            500-hours Yoga Teacher Training in Nepal from talented and experienced teachers. Give yourself
                            the gift of an immersive and transformative spiritual journey with our Yoga Specialists.<br>
                            Besides Yoga training, we provide sound healing therapy and 3-day, 7-day, 10-day and 21-day Yoga
                            Retreat in Nepal that lets you unwind and set for the rejuvenating inner journey. Check out the
                            features of various Retreat Packages we offer and book the most suitable package as per your
                            needs and conveniences.<br>
                            Being one of the leading and trail-blazing Yoga Schools in Nepal, we provide high class Yoga
                            teacher training and International Yoga Alliance Certification to people from Nepal, India, and
                            other parts of the world. Our team of Yoga teachers consists of seasoned Yoga gurus who will
                            provide you with a profound knowledge of Ashtanga Vinyasa Yoga, Hatha Yoga and Kundalini Yoga.
                            They will be your spiritual gurus who will guide you at every step of your inner journey to self
                            and provide you Yoga Teacher Training Certificate.
                            <a href="{{ action('Front\FrontController@aboutUs') }}" class="btn btn-info">Read
                                More.</a>
                        </p>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-6" {{-- wow fadeInRight" --}} {{-- data-wow-delay="0.3s" --}}
                    {{-- style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;" --}}>
                    <div class="video-box" id="video-1">
                        <button name="video_1" type="button" id="video-button-1"
                            onclick="loadYouTubeVideo('video-1','0Ish_xCBEu0','video-button-1')" style="cursor:pointer;">
                            <img data-src="https://img.youtube.com/vi/0Ish_xCBEu0/mqdefault.jpg" width="485px"
                                height="285px" alt="play first video" class="lazy">

                        </button>

                    </div>
                    <div class="video-box" id="video-2" name="video_2">
                        <button type="button" id="video-button-2" style="cursor:pointer;"
                            onclick="loadYouTubeVideo('video-2','iiNPZxchEjY','video-button-2')">
                            <img data-src="https://img.youtube.com/vi/iiNPZxchEjY/mqdefault.jpg" width="485px"
                                height="285px" alt="play second video" class="lazy">

                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- /about us --}}

    {{-- yoga teacher --}}
    @if (!$teachers->isEmpty())
        <div class="yoga-teacher">
            <div class="container px-5">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <h4>Our Yoga Teachers</h4>
                        <p>For quite a long while, our particularly talented teachers have been controlling and
                            affecting
                            the understudies to turn into the leader of their own lives and to stir their own inward
                            holiness. The yogic way of thinking, engaging encounters, and monstrous information on our
                            instructors will urge you to make an effective change in your locale.</p>
                    </div>
                    @foreach ($teachers as $team)
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4" {{-- wow fadeInLeft" data-wow-delay="0.2s" --}} {{-- style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;" --}}>
                            <img data-src="{{ asset('uploads/ourTeam/thumbnails/' . $team->image) }}"
                                alt="{{ $team->name }}" class="team-img lazy">
                            <h6>{{ $team->name }}</h6>
                            <!--single teacher detail page-->
                              <a href="{{ action('Front\FrontController@teacher', $team->id) }}"
                            class="btn btn-read">Read More <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    @endforeach

                    <div class="col-12 col-sm-12">
                        <a href="{{ route('all-teachers') }}" class="btn btn-teacher" {{-- wow shake" data-wow-delay="0.3s" --}}
                            {{-- style="visibility: visible; animation-delay: 0.3s; animation-name: shake;" --}}>Read
                            More <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    @else
    @endif

    {{-- /yoga teacher --}}

    {{-- popular Courses --}}
    @if ($popularCourses->isEmpty() == false)
        <div class="popular-course-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <h3>Popular Courses</h3>
                    </div>

                    @foreach ($popularCourses as $course)
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="pop-course-card">
                                <img width="250px" height="105px" class="lazy"
                                    data-src="{{ asset('uploads/' . $course->image) }}" alt="Yoga school courses in nepal">
                                <div class="teach-box">
                                    <h4>{{ $course->title }}</h4>
                                    <p>{{ Str::limit(strip_tags($course->content), 100) }}</p>
                                    <a href="{{ action('Front\FrontController@yogaClass', $course->slug) }}"
                                        class="btn btn-read">Read More <i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12 col-sm-12">
                        <a href="
                        {{ action('Front\FrontController@popularCourse') }}
                        "
                            class="btn btn-testi">View More Courses <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    @endif
    {{-- popular course end --}}

    {{-- trainning --}}

    @if ($trainings->isEmpty() == false)
        <div class="teaching-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <h3>Yoga Teacher Training In Nepal</h3>
                    </div>

                    @foreach ($trainings as $other)
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4" {{-- wow fadeInLeft" data-wow-delay="0.2s" --}} {{-- style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft; " --}}>
                            <img class="lazy" data-src="{{ asset('uploads/course/thumbnails/' . $other->image) }}"
                                alt="Yoga school in nepal">
                            <div class="teach-box">
                                <h4>{{ $other->title }}</h4>
                                <p>{{ Str::limit(strip_tags($other->content), 200) }}</p>
                                <a href="{{ action('Front\FrontController@training', $other->slug) }}"
                                    class="btn btn-read">Read More <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    @endif

    {{-- /trainning --}}

    {{-- test --}}
    @if (!$testimonials->isEmpty())
        <div class="testimonials">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <h3 class="text-center pb-3">What Our Students Say About Us?</h3>
                    </div>
                    @foreach ($testimonials as $test)
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="testi-box">
                                <img class="lazy" height="100px" width="90px"
                                    data-src="{{ asset('uploads/testimonials/thumbnails/' . $test->image) }}"
                                    alt="Yoga school in nepal">
                                <h6><i class="fa fa-quote-left"></i> {{ $test->name }}</h6>
                                @php

                                    $content = str_replace('&nbsp;', ' ', $test->content);
                                    $content = html_entity_decode($content);
                                @endphp
                                @if (strlen($content) > 300)
                                    {{ strip_tags(substr($content, 0, 300)) }}
                                    <span class="read-more-show hide_content">...Read More<i
                                            class="fa fa-angle-down"></i></span>
                                    <span class="read-more-content">
                                        {{ strip_tags(substr($content, 300, strlen($content))) }}
                                        <span class="read-more-hide hide_content">Read Less <i
                                                class="fa fa-angle-up"></i></span> </span>
                                @else
                                    <p>{!! $content !!}</p>
                                @endif
                                <p><strong>Thank You</strong></p>
                            </div>
                        </div>
                    @endforeach


                    <div class="col-12 col-sm-12 d-sm-flex">
                        <a href="{{ action('Front\FrontController@testimonial') }}" class="btn btn-testi">Read More
                            Testimonials <i class="fa fa-angle-double-right"></i></a>
                        <a href="
                        {{ action('Front\FrontController@videoTestimonial') }}
                        "
                            class="btn btn-testi">Watch Video Testimonials <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    @endif


    {{-- /test --}}

    {{-- why pokhara yoga --}}

    <div class="teacher-training">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12" {{-- wow fadeInLeft" data-wow-delay="0.3s" --}} {{-- style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;" --}}>
                    <div class="tech-box">
                        <h4>{{ $whyChooseUs->title }}</h4>
                        <p>{!! $whyChooseUs->content !!}</p>

                        <a href="#" type="btn" class="btn btn-testi  enquiry-btn" data-toggle="modal"
                            data-target="#enquirymodal">Know more <i class="fa fa-angle-double-right"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <section id="tabs" class="tabs w-100">
        <div class="container">
            <h6 class="section-title h1">Yoga Teacher Training Fees and Schedule</h6>
            <h6 class="section-title h1">Upcoming Teacher Trainings</h6>
            <div class="row">
                <div class="col-12">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            @php $c = 1; @endphp
                            @foreach ($feeCategory as $category)
                                <a class="nav-item nav-link @if ($c == 1) active @endif"
                                    id="nav-tab-{{ $category->id }}" data-toggle="tab"
                                    href="#nav-content-{{ $category->id }}" role="tab"
                                    aria-controls="nav-content-{{ $category->id }}"
                                    aria-selected="{{ $c == 1 ? 'true' : 'false' }}">{{ $category->title }}</a>
                                @php $c++ @endphp
                            @endforeach
                        </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        @php $c = 1 @endphp
                        @foreach ($feeCategory as $category)
                            <div class="tab-pane fade show @if ($c == 1) active @endif"
                                id="nav-content-{{ $category->id }}" role="tabpanel"
                                aria-labelledby="nav-tab-{{ $category->id }}">

                                {{-- START OF NEW COLUMN-PER-RECORD TABLE STRUCTURE --}}
                                <div class="row"> {{-- Outer row for the grid of individual tables --}}
                                    @foreach ($category->feeList->sortBy('order') as $list)
                                        {{-- Each 'list' item (formerly a large table row) becomes a Bootstrap column --}}
                                        {{-- Adjust col-sm-6, col-md-4, col-lg-3 based on how many cards per row you want on different screen sizes --}}
                                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                            <div class="card card-custom-table"
                                                style="background-color: white; color: black; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                                {{-- A compact table for *each* data entry (effectively a "card") --}}
                                                <table class="table table-borderless table-sm m-0"
                                                    style="color: inherit;"> {{-- Using Bootstrap classes for smaller, borderless table --}}
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row"
                                                                style="width: 40%; text-align: left; padding-right: 10px;">
                                                                From:</th>
                                                            <td style="width: 60%; text-align: right;">{{ $list->from }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row"
                                                                style="width: 40%; text-align: left; padding-right: 10px;">
                                                                To:</th>
                                                            <td style="width: 60%; text-align: right;">{{ $list->to }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row"
                                                                style="width: 40%; text-align: left; padding-right: 10px;">
                                                                Place:</th>
                                                            <td style="width: 60%; text-align: right;">{{ $list->place }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row"
                                                                style="width: 40%; text-align: left; padding-right: 10px;">
                                                                Triple Room:</th>
                                                            <td style="width: 60%; text-align: right;">
                                                                {{ $list->triple_room }} USD</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row"
                                                                style="width: 40%; text-align: left; padding-right: 10px;">
                                                                Shared Room:</th>
                                                            <td style="width: 60%; text-align: right;">
                                                                {{ $list->share_room }} USD</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row"
                                                                style="width: 40%; text-align: left; padding-right: 10px;">
                                                                Private Room:</th>
                                                            <td style="width: 60%; text-align: right;">
                                                                {{ $list->private_room }} USD</td>
                                                        </tr>
                                                        <tr class="text-center"> {{-- Row for the button --}}
                                                            <td colspan="2" class="pt-3"> {{-- colspan="2" to span both columns --}}
                                                                <a href="{{ route('customer.register') }}"
                                                                    class="apply btn btn-primary">Apply</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                {{-- END OF NEW COLUMN-PER-RECORD TABLE STRUCTURE --}}

                            </div>
                            @php $c++ @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- this is for gallery --}}
    <section>
        <div class="container">
            {{-- <h3 class="text-center pt-3">Our Gallery</h3> --}}
            <div class="row">
                @foreach ($photoList as $photo)
                    <div class="col-sm-3 py-3">
                        <a href="{{ asset('uploads/galary/' . $photo->image) }}" class="img-gal link-gallery"
                            data-lightbox="roadtrip">
                            <div class="card photo-list">
                                <img width="250px" height="105px"
                                    data-src="{{ asset('uploads/galary/thumbnails/' . $photo->image) }}"
                                    alt="Pokhara yoga school" class="w-100 img-fluid lazy">
                            </div>
                        </a>

                    </div>
                @endforeach
                <div class="col-12 col-sm-12">
                    <a href="{{ action('Front\FrontController@photoList') }}" class="btn btn-testi">View More
                        Gallery
                        Items <i class="fa fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    {{-- blog --}}
    @if (!$blogs->isEmpty())
        <div class="teaching-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <h3 style="color:#ffffff;">Blog</h3>
                    </div>
                    @foreach ($blogs as $blog)
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                            @if (!$blog->image == '')
                                <img class="lazy" data-src="{{ asset('uploads/blogs/thumbnails/' . $blog->image) }}"
                                    alt="Yoga school in nepal">
                            @endif

                            <div class="teach-box">
                                <h4>{{ $blog->title }}</h4>
                                <ul>
                                    <li><i class="fa fa-user"></i> by <a href="#">Admin</a></li>
                                    <li><i class="fa fa-calendar"></i>{{ $blog->created_at->format('j M, Y') }}</li>
                                </ul>
                                <p>{!! Str::limit(strip_tags($blog->content), 200) !!}</p>
                                <a href="{{ action('Front\FrontController@singleBlog', $blog->slug) }}"
                                    class="btn btn-read">Read More <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!--faq section-->
    @if ($faqs->isNotEmpty())
        <div class="row my-3">
            <div class="col-12 col-sm-12 text-center">
                <h2>Frequently Asked Questions</h2>
            </div>
            @foreach ($faqs as $lists)
                @foreach ($lists->faq_content as $list)
                    <div class="col-12 col-sm-12 col-sm-6 col-md-6 ">
                        <div class="accordion-container">
                            <div class="set">
                                <a href="javascript:void(0)">
                                    {{ $list['question'] }}
                                    <i class="fa fa-plus"></i>
                                </a>
                                <div class="content px-3" style="display: none;">
                                    <p>{!! $list['answer'] !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    @endif






    <script>
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.querySelectorAll('.delayed-slide-img').forEach(function(img) {
                    const dataSrc = img.getAttribute('data-src');
                    if (dataSrc) {
                        img.setAttribute('src', dataSrc);
                    }
                });
            }, 1000); // 1 second delay
        });
    </script>

@endsection
