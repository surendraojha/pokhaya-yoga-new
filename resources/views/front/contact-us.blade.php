@section('title', "$seoMeta->meta_title")
@section('keyword', "$seoMeta->meta_keyword")
@section('desc', "$seoMeta->meta_des")


@section('page-css')
    <style type="text/css" media="screen">
        .page-banner {
            @if (is_null($banner->image))
                background: url("https://pokharayogaschoolandretreatcenter.com/uploads/IMG20191103125404.jpg") center no-repeat;
            @else
                background: url({{ asset('uploads/' . $banner->image) }}) center no-repeat;
            @endif
            background-size: cover;
            display: table;
            aspect-ratio: 6 / 2.5;
        }


        .faqs-body {
            padding: 0px;
        }
    </style>
@endsection

@include('front.includes.header')

<!-- start banner Area -->
<div class="page-banner">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h1 class="text-uppercase">Contact Us</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ action('Front\FrontController@index') }}">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End banner Area -->
{{--  --}}
<div class="contact-body">
    <div class="container">
        <div class="social-icons pb-2">
            @include('front.includes.social-media')
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 contactbox">
                <i class="fa fa-map-marker"></i>
                <h4>Address</h4>
                <p>Leak Side Road Sedi hight </p>
                <p>Pokhara, Nepal</p>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 contactbox">
                <i class="fa fa-phone"></i>
                <h4>Phone</h4>
                <p><a href="tel:+977-9856027660">+977-9856027660</a></p>
                <p><a href="tel:+977-6-1420115">+977-6-1420115</a></p>

            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 contactbox">
                <i class="fa fa-envelope"></i>
                <h4>Email Address</h4>
                <p><a href="mailto:info@pokharayogaschoolandretreatcenter.com">Info@pokharayogaschoolandretreatcenter.com
                    </a></p>
            </div>
        </div>
    </div>
</div>
<div class="contact-message">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12">
                <h4>Send Us Message</h4>

                @if ($errors->any())
                    <div class = 'alert alert-danger'>
                        <ul>
                            @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (\Session::has('msg'))
                    <div class = 'alert alert-success'>
                        <p>{{ \Session::get('msg') }}</p>
                    </div></br>
                @endif
                <form action="{{ action('Front\FrontController@contactUsPost') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-form">
                                <input type="text" name="name" class="form-control" placeholder="Your name">
                            </div>
                            <div class="md-form">
                                <input type="email" name="email" class="form-control" placeholder="Your email">
                            </div>
                            <div class="md-form">
                                <input type="text" name="number" class="form-control" placeholder="Phone Numaber">
                            </div>
                            <div class="md-form">
                                <input type="text" name="subject" class="form-control" placeholder="Subject">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="md-form">
                                <textarea type="text" name="message" placeholder="Your message"></textarea>
                            </div>

                            <div class="md-form">
                                <div class="row d-flex m-auto align-items-center justify-content-center">
                                    <div class="col-md-3 col-xs-4 ">
                                        <label for="captcha_h" class="captcha_h d-flex justify-content-between fz-4">
                                            <span id="num1" class="chaptcha_item num1"></span>
                                            <span id="plus" class="chaptcha_item plus">+</span>
                                            <span id="num2" class="chaptcha_item num2"></span>
                                            <span id="equal" class="chaptcha_item equal">=</span>
                                        </label>
                                    </div>
                                    <div class="col-md-7 col-xs-8 ">
                                        <label for="captcha_h" class="captcha_h d-flex justify-content-between fz-4">
                                            <input type="number" name="captcha_response" placeholder="Captcha Answer"
                                                id="captcha_res" value="" class="captcha_res m-0" required>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!--<div class="col-12 d-flex  p-2">-->
                            <!--  <div class="g-recaptcha"  data-sitekey="{{ config('google_captcha.site_key') }}"></div>-->
                            <!--</div>-->
                            <div class="form-group pt-1">
                                <input type="submit" value="Send"
                                    class="btn btn-success send-btn text-white pt-2 pb-3 text-uppercase captchaBtn"
                                    style="font-size: 20px">
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="maps">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3515.365384141506!2d83.95516647436196!3d28.226587502401273!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399595de712b959d%3A0x783b7482c3801703!2sPokhara%20Yoga%20School%20And%20Retreat%20Center!5e0!3m2!1sen!2sae!4v1684058597363!5m2!1sen!2sae"
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    <!--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14061.500755413554!2d83.9579024!3d28.2262898!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x66a4a983cbaa31f8!2sInfinity%20Resort!5e0!3m2!1sen!2sde!4v1582266869455!5m2!1sen!2sde" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>-->
</div>










@include('front.includes.footer')
