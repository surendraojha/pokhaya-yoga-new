@extends('front.layouts.main')


@section('content')

    @push('seo-meta')
        <x-seo-meta :title="$information->meta_title" :keywords="$information->meta_keywords" :description="$information->meta_description" />
    @endpush


    <div class="training-details-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-9 training-details-left">
                    <h2>{{ $information->title }} </h2>
                    <ul class="training-lists">
                        <li>Trainer: Clinne John </li>
                        <li>Date: Jul 18, 2026 - Oct 31, 2026 </li>
                        <li>Level: Begin </li>
                        <li>Members: 30 Members </li>
                    </ul>
                    <img class="main-images" src="{{ $information->image_url }}" alt="">

                    <p>{!! $information->content !!}</p>

                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-3 training-details-right">
                    <aside class="sidebar">
                        <a href="register.html" class="register">Register here</a>
                        <ul class="popular-lists">
                            @foreach ($popularClasses as $class)
                                <li>
                                    <a href="{{ route('yoga-class.single-page', $class->slug) }}">
                                        <img src="{{ $class->image_url }}" alt="{{ $class->title }}">
                                        <h5>{{ $class->title }}</h5>
                                    </a>
                                    <p>{{ Str::limit(strip_tags($class->content), 80) }}</p>
                                </li>
                            @endforeach
                        </ul>
                        @if ($schedules->isNotEmpty())
                            <a href="#schedule-section" class="btn btn-download">
                                <i class="fa-solid fa-user-clock"></i> Daily Schedule
                            </a>
                        @endif
                    </aside>
                </div>
            </div>
        </div>
    </div>


    {{-- Inside training-details-left, after the content paragraph --}}
    @if ($schedules->isNotEmpty())
        <div class="schedule-section mt-4">
            <h3>Daily Schedule</h3>
            @foreach ($schedules as $day => $daySchedules)
                <div class="schedule-day mb-3">
                    <h5 class="schedule-day-title">{{ $day }}</h5>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Time Slot</th>
                                <th>Activity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($daySchedules as $schedule)
                                <tr>
                                    <td>{{ $schedule->time_slot }}</td>
                                    <td>{{ $schedule->activity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    @endif

    <div class="accommod-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h3>Accommodation</h3>
                    <p>Pokhara Yoga School and Retreat Center offers the best 200 Hour Yoga Teacher Training in Pokhara
                        Nepal in the lush greenery of the Himalayan forest. We welcome learners from all over the world
                        aspiring to be certified Yoga teachers. Completing our 200 Hour Yoga Teacher Training Course (YTTC
                        200 Hour) will make you eligible for the Yoga Alliance 200 RYT Accreditation, letting you become a
                        Registered Yoga Teacher (RYT). You can teach Yoga in any school, college, professional sports
                        institute, or Yoga Learning Centre in any part of the globe.</p>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <h4>Shared Room</h4>
                    <div class="owl-five owl-carousel owl-theme">
                        <div class="item">
                            <a href="room-details.html"><img src="./images/food2.jpg" alt=""></a>
                            <h6><a href="room-details.html">Single Room</a> </h6>
                        </div>
                        <div class="item">
                            <a href="room-details.html"><img src="./images/food2.jpg" alt=""></a>
                            <h6><a href="room-details.html">Double Room</a> </h6>
                        </div>
                        <div class="item">
                            <a href="room-details.html"><img src="./images/food2.jpg" alt=""></a>
                            <h6><a href="room-details.html">Triple Room</a> </h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <h4>Private Room</h4>
                    <div class="owl-six owl-carousel owl-theme">
                        <div class="item">
                            <a href="room-details.html"><img src="./images/food2.jpg" alt=""></a>
                            <h6><a href="room-details.html">Single Room</a> </h6>
                        </div>
                        <div class="item">
                            <a href="room-details.html"><img src="./images/food2.jpg" alt=""></a>
                            <h6><a href="room-details.html">Double Room</a> </h6>
                        </div>
                        <div class="item">
                            <a href="room-details.html"><img src="./images/food2.jpg" alt=""></a>
                            <h6><a href="room-details.html">Triple Room</a> </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="certificate-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h4>Certificate</h4>
                    <p>Learn from our certified and highly experienced Yoga Teachers Trainers and Spiritual Masters. Set for
                        a soul-enriching and life-transformative journey with a profound understanding of Yoga from learning
                        core basics and fundamental principles to various Asanas, and philosophical aspects to mastering
                        Hatha Yoga and Ashtanga Yoga.</p>
                    <img src="./images/certificate.webp" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="faqs-section">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-1 col-lg-1">

                    </div>
                    <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                        <h4>Frequently Asked Questions</h4>
                        <div class="accordion-container">

                            @foreach ($faqs as $faq)
                                @foreach ($faq->faq_content as $list)
                                    <div class="set">
                                        <a href="javascript:void(0)">
                                            {{ $list['question'] }}
                                            <i class="fa fa-minus"></i>
                                        </a>
                                        <div class="content" style="display: none;">
                                            <p>
                                                {!! $list['answer'] !!}

                                            </p>
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
@endsection
