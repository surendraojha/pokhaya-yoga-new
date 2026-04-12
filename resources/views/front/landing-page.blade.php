@section("title", "$seoMeta->meta_title")
@section("keyword", "$seoMeta->meta_keyword")
@section("desc", "$seoMeta->meta_des")
@section("yoga-school-retreat-centre")
@endsection


@section('external-css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />

{{-- linked js --}}
{{-- <script src="{{asset('js/landing.js')}}"></script> --}}

{{-- linked css --}}
<link href="{{ asset('landing/css/styles.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('landing/css/landingStyles.css') }}" rel="stylesheet" type="text/css">

@endsection

@include('front.includes.header')

<script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "WebSite",
        "name": "Pokhara yoga School",
        "url": "http://pokharayogaschoolandretreatcenter.com",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "http://pokharayogaschoolandretreatcenter.com/search?q={search_term_string}",
            "query-input": "required name=search_term_string"
            }
            }
</script>



{{-- matching source --}}
<section id="hero" style="background-image: url('{{ asset('uploads/'.$LandingCourse->banner_image) }}');">
    <div class="offer col-sm-9 col-md-6 col-lg-8 align-items-center">
        <h2>Golden opportunity to do Yoga Teacher Training .
            Limited seat and less price due to pandemic ! 15% OFF</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center hero-img animated"
                data-aos="zoom-out" data-aos-delay="300">
                <div data-aos="zoom-out">

                    <h1>Yoga Teacher Training Course In Nepal</h1>
                    <div class="text-center text-lg-left">
                        <ul class="list-group">
                            @foreach ($courses as $value)

                            <li class="list-group-item list-group-item-primary">

                                <a href="{{ route('yoga-class.single-page',$value->slug) }}">
                                    {{ $value->title }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 order-1 order-lg-2 hero-img">

                <div id="contact" class="contact card">
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="card-title">Send Us Message</h5>
                        </div>
                        <form method="POST" action="{{ route('contact-us.post')  }}" >
                            @csrf

                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name *"
                                    data-rule="minlen:4" data-msg="Please enter at least 4 chars"
                                    value="{{ old('name') }}" />
                                <div class="validate">@error('name'){{ $message }}
                                    @enderror</div>
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email *" data-rule="email" data-msg="Please enter a valid email"
                                    value="{{ old('email') }}" />
                                <div class="validate">@error('email'){{ $message }}
                                    @enderror</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="number" id="phone"
                                    placeholder="Phone Number *" data-msg="Please enter your phone number"
                                    value="{{ old('number') }}" />
                                <div class="validate">@error('phone'){{ $message }}
                                    @enderror</div>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="subject" id="subject">
                                    <option>Subject</option>
                                    @foreach ($courses as $key => $value)
                                        <option value="{{ $key }}" >
                                            {{ $value->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="2" data-rule="required"
                                    data-msg="Please write something for us" placeholder="Your Message/Remarks *"
                                    value="{{ old('message') }}"></textarea>
                                <div class="validate">@error('remark'){{ $message }}
                                    @enderror</div>
                            </div>

                            <div class="text-center"><button  type="submit">Send Message</button></div>
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
            <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
        </defs>
        <g class="wave1">
            <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
        </g>
        <g class="wave2">
            <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
        </g>
        <g class="wave3">
            <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
        </g>
    </svg>
</section>



 <main id="main">
<section id="classes" class="classes">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex align-items-center" data-aos="fade-right">
                    <div class="row">
                        <div class="col-sm-6 offset-md-2 col-md-5 col-lg-6 offset-lg-0">
                            <p class="">
                                {!! $blogs[0]['content'] !!}
                            </p>
                        </div>
                        </div>
                        <div class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                            <p class="">
                                {!!  $blogs[1]['content']  !!}
                            </p>
                        </div>
                      </div>

                    {{-- <div class="row text-center">
                        <div class="col-sm-9 col-md-6 pt-4" data-aos="fade-up">
                            <p class="mt-3">
                                {{ $LandingCourse->content }}
                            </p>
                        </div>
                        <div class="col-xs-12 text-center" style="background-color:none; margin-top:10px;">
                            <div class='image-overlay'>
                                <img src="{{ asset('uploads/'.$LandingCourse->photo_2) }}" width="60%"
                                    style="opacity: 0.6;">
                                <img src="{{ asset('uploads/'.$LandingCourse->photo_1) }}" width="60%"
                                    class='top-image'>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="col-sm-9 col-md-6 pt-4" data-aos="fade-up">
                        <p class="mt-3">
                            {{ $LandingCourse->content }}
                        </p>
                    </div> --}}
                    {{-- <p class="text-center mt-5">
                        <a href="#hero" class="btn-get-started scrollto">JOIN NOW</a>
                    </p> --}}
                </div>
    {{--
                <div class="col-md-6 pt-4" data-aos="fade-up">
                    <h3> {{$LandingCourse->title  }}</h3>
                    <p class="mt-3">
                        {{ $LandingCourse->content }}
                    </p> --}}


                {{-- </div> --}}


            </div>
        </div>
</section>


<section id="counts" class="counts about">
        <h2>Location</h2>
        <div class="container">
            <div class="row">
                    <div class="col-lg-9 col-md-6 pt-4 d-flex align-items-cente" data-aos="fade-right">
                        <img src="{{ asset('uploads/'.$LandingCourse->photo_2) }}" class="img-fluid" alt="">
                </div>
                <div class="col order-5 "data-aos="fade-right">
                    <p>Situated among lush green hills, just a 15-minute walk from the tourist hub of Pokhara, Infinity Resort offers guests a mix of warm, traditional Nepalese hospitality and modern facilities. The main hotel building and cottages are joined by a garden and pool area, and the pathways are lined with pots of herbs and vegetables. Nestled up in the hills overlooking Phewa Lake, Infinity Resort is an ideal venue for Pokhara Yoga School’s transformative retreats and programs.

                        The city of Pokhara is located in the geographical centre of the country. It's the second largest city in Nepal. Lakeside is the tourist hub of the city, a Mecca for travellers, aircraft pilots, paragliders and trekkers from all corners of the world.</p>
                </div>

    {{--
                <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center order-md-1 py-5 px-lg-5"
                    data-aos="fade-left">
                    <h3>Highlights of 200 Hours Yoga Teacher Training Course</h3>
                    <div class="row">
                        @foreach ($LandingHighlight as $value)
                        <div class="col-12 icon-box mt-2" data-aos="zoom-in" data-aos-delay="50">
                            <div class="icon small-icon"><i class="fa fa-check"></i></div>
                            <p class="title">{{ $value->title }}</p>
                        </div>
                        @endforeach

                    </div>
                </div> --}}
            </div>
        </div>
</section>
<section id="details_yoga" class="details_yoga">
        <div class="container">
            <div class="row content">
                <div class="col-md-12 mb-5 text-center">
                    <h3>ABOUT YOGA ALLIANCE USA CERTIFICATION</h3>
                </div>
                <div class="col-md-12 pt-4" data-aos="fade-up">
                    <p>{{ $LandingCourse->certification_content }}</p>

                    <p class="text-center mt-5">
                        <a href="#hero" class="details_btn btn-get-started scrollto">JOIN NOW</a>
                    </p>
                </div>
            </div>
        </div>
</section>


    {{-- <section id="counts" class="counts about">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12  col-md-8 col-lg-8  single-page">
                    <p>
                    {!! $blogs[0]['content'] !!}

                    </p>
                </div>
                <div class="col-md-12 mb-5 text-center">
                </div>
                <div class="col-xl-12 col-lg-12 d-flex align-items-center order-md-2" data-aos="fade-right">
                    <div class="row">
                        <div class="col">
                            <img src="{{ asset('uploads/'.$LandingCourse->outcome_photo) }}" class="img-fluid" alt="">
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section> --}}
<section id="details_video" class="about">
        <div class="container">
            <div class="row">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/p9X16AB-3tI" allowfullscreen></iframe>
                  </div>
                <div class="col-md-12 mb-5 text-center">
                </div>
                <div class="col-xl-12 col-lg-12 d-flex align-items-center order-md-2" data-aos="fade-right">
                    <div class="row">


                        {{-- <div class="col">
                            <img src="{{ asset('uploads/'.$LandingCourse->why_choose_us_photo) }}" class="img-fluid"
                                alt=""> --}}
                        </div>

                    </div>
                </div>

            </div>
        </div>
</section>
{{--  --}}
@if(!$testimonials->isEmpty())
<div class="testimonials">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12">
        <h4>Yoga Teacher Training Student Testimonials</h4>
      </div>
      @foreach($testimonials as $test)
      <div class="col-12 col-sm-12 col-md-4 col-lg-4">
        <div class="testi-box">
          <img src="{{asset('uploads/testimonials/thumbnails/'.$test->image)}}" alt="Yoga school in nepal">
          <h6><i class="fa fa-quote-left"></i> {{$test->name}}</h6>
          <p>{!! $test->content !!}</p>
          <p><strong>Thank You</strong></p>
        </div>
      </div>
      @endforeach


      <div class="col-12 col-sm-12">
        <a href="{{-- {{action('Front\FrontController@testimonial')}} --}}" class="btn btn-testi">Read More Testimonials <i class="fa fa-angle-double-right"></i></a>
      </div>
    </div>
  </div>
</div>
@else
@endif
{{--not required,remove  --}}
    {{-- <div class="testimonials">
        <div class="container">
          <div class="row">
            <div class="col-12 col-sm-12">


              <h4>Yoga Teacher Training Student Testimonials</h4>
            </div>
                  <div class="col-12 col-sm-12 col-md-4 col-lg-4">
              <div class="testi-box">
                <img src="{{  asset('uploads/'.$testimonial[0]['image'] )}}" alt="Yoga school in nepal">
                <h6><i class="fa fa-quote-left"></i> {{ $testimonial[0]['name'] }}</h6>
                <p >{!! $testimonial[0]['content'] !!}</p>
                <p><strong>Thank You</strong></p>
              </div>
            </div>
                  <div class="col-12 col-sm-12 col-md-4 col-lg-4">
              <div class="testi-box">
                <img src="{{  asset('uploads/'.$testimonial[1]['image'] )}}" alt="Yoga school in nepal">
                <h6><i class="fa fa-quote-left"></i> {{ $testimonial[1]['name'] }}</h6>
                <p>{!! $testimonial[1]['content'] !!}</p>
              <span style="font-size: 1rem;">Thank you very much for this wonderful time, </span></p><p>Joshua</p></p>
                <p><strong>Thank You</strong></p>
              </div>
            </div>
                  <div class="col-12 col-sm-12 col-md-4 col-lg-4">
              <div class="testi-box">
                <img src="{{  asset('uploads/'.$testimonial[2]['image'] )}}" alt="Yoga school in nepal">
                <h6><i class="fa fa-quote-left"></i> {{ $testimonial[2]['name'] }}</h6>
                <p>{!! $testimonial[1]['content'] !!}</p>
                <p><strong>Thank You</strong></p>
              </div>
            </div>


            <div class="col-12 col-sm-12">
              <a href="" class="btn btn-testi">Read More Testimonials <i class="fa fa-angle-double-right"></i></a>
            </div>
          </div>
        </div>
    </div> --}}
<section id="tabs" >
        <div class="container">
            <h6 class="section-title h1">Yoga Teacher Training Fees and Schedule</h6>
            <div class="row">
                <div class="col-12 col-sm-12">
                        <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                             <a class="nav-item nav-link   active " id="nav-home-tab" data-toggle="tab" href="#nav-home1" role="tab" aria-controls="nav-home1" aria-selected="true">200 hours</a>
                             <a class="nav-item nav-link  " id="nav-home-tab" data-toggle="tab" href="#nav-home2" role="tab" aria-controls="nav-home2" aria-selected="true">300 hours</a>
                        </div>
                        </nav>
                      <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
        {{-- 200 hrs --}}
                        <div class="tab-pane fade show  active  " id="nav-home1" role="tabpanel" aria-labelledby="nav-home-tab1">
                                <h5>200 hours Yoga Teacher Training In Pokhara Nepal Fee & Schedule {{ date('Y') }}</h5>
                                <div class="table-responsive" id="sailorTableArea">
                                    <table id="sailorTable" class="table table-striped table-bordered" width="100%" style="color:#fff">
                                    <thead>
                                        <tr>
                                        <th scope="col">From</th>
                                        <th scope="col">To</th>
                                        <th scope="col">Place</th>
                                        <th scope="col">Share Room</th>
                                        <th scope="col">Private Room</th>
                                        <th scope="col">Enquiry</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($feeList_200 as $value)
                                        <tr>
                                            <td>{{ $value->from }}</td>
                                            <td>{{ $value->to }}</td>
                                            <td>{{ $value->place }}</td>
                                            <td>{{ $value->share_room }} Euro</td>
                                            <td>{{ $value->private_room }} Euro</td>
                                            <td><a href="{{ route('customer.login') }}" class="apply">  Apply <img src="https://pokharayogaschoolandretreatcenter.com/uploads/new1.gif" alt="Yoga school in nepal"></a></td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
        {{--300 hrs  --}}
                        <div class="tab-pane fade show  " id="nav-home2" role="tabpanel" aria-labelledby="nav-home-tab2">
                            <h5>300 hours Yoga Teacher Training In Pokhara Nepal Fee & Schedule {{ date('Y') }}</h5>
                                <div class="table-responsive" id="sailorTableArea">
                                    <table id="sailorTable" class="table table-striped table-bordered" width="100%" style="color:#fff">
                                        <thead>
                                            <tr>
                                            <th scope="col">From</th>
                                            <th scope="col">To</th>
                                            <th scope="col">Place</th>
                                            <th scope="col">Share Room</th>
                                            <th scope="col">Private Room</th>
                                            <th scope="col">Enquiry</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($feeList_300 as $value)
                                            <tr>
                                                <td>{{ $value->from }}</td>
                                                <td>{{ $value->to }}</td>
                                                <td>{{ $value->place }}</td>
                                                <td>{{ $value->share_room }} Euro</td>
                                                <td>{{ $value->private_room }} Euro</td>
                                                <td><a href="{{ route('customer.login') }}" class="apply">  Apply <img src="https://pokharayogaschoolandretreatcenter.com/uploads/new1.gif" alt="Yoga school in nepal"></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
</section>


<section id="details" class="about">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center order-md-1" data-aos="fade-right">
                    <div class="row">
                        @foreach ($LandingAd as $value)
                        <div class="col">
                            <img src="{{ asset('uploads/'.$value->photo) }}" class="img-fluid" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 order-md-2 mb-5" data-aos="fade-left">
                    <p class="text-center mt-5">
                        <a href="https://wa.me/{{ $whats_app->whats_app }}" class="book_now btn-get-started scrollto" target="_blank">Book a Call</a>

                    </p>
                </div>
            </div>
        </div>
</section>
</main>

{{-- matching source close --}}


@include('front.includes.footer')

{{-- added script --}}
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>


