@extends('front.layouts.main')

@section('content')
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
                            <li><a href="200-hour-yoga.html"><img src="./images/train1.jpeg" alt="">
                                    <h5>100 Hour Yoga Teacher Training</h5>
                                </a>
                                <p>Pokhara Yoga School and Retreat Center offers</p>
                            </li>
                            <li><a href="200-hour-yoga.html"><img src="./images/train2.jpg" alt="">
                                    <h5>400 Hour Yoga Teacher Training</h5>
                                </a>
                                <p>Pokhara Yoga School and Retreat Center offers</p>
                            </li>
                            <li><a href="200-hour-yoga.html"><img src="./images/train3.jpg" alt="">
                                    <h5>500 Hour Yoga Teacher Training</h5>
                                </a>
                                <p>Pokhara Yoga School and Retreat Center offers</p>
                            </li>
                        </ul>
                        <a href="schedule.html" class="btn btn-download"><i class="fa-solid fa-user-clock"></i> Daily
                            Schedule</a>
                        <h5>Instagram News Feed Here</h5>
                    </aside>
                </div>
            </div>
        </div>
    </div>

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
