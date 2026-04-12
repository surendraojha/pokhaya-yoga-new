@extends('front.layouts.main')
@section('content')
@push('title', "$seoMeta->meta_title")
@push('keyword', "$seoMeta->meta_keyword")
@push('desc', "$seoMeta->meta_des")

@push('page-css')
    <style type="text/css" media="screen">
        .page-banner {
            @if (is_null($banner->image))
                background: url("https://pokharayogaschoolandretreatcenter.com/uploads/IMG20191103125404.jpg") center no-repeat;
            @else
                background: url({{ asset('uploads/' . $banner->image) }}) center no-repeat;
            @endif
            background-size: cover;
        }
    </style>
@endpush

<!-- Page Banner -->
<div class="page-banner">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="strokeme">
                        <div class="strokeme">
                            <h1>Contact Us</h1>
                        </div>
                        <ul class="breadcrumb">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Info + Form -->
<div class="contact-infos">
    <div class="container">

        {{-- Global Success Message --}}
        @if (\Session::has('msg'))
            <div class="alert alert-success mt-3">
                <p class="mb-0">{{ \Session::get('msg') }}</p>
            </div>
        @endif

        <div class="row">

            {{-- LEFT: Contact Form --}}
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <h2>Drop a line</h2>

                <form action="{{ route('contact-us.post') }}" method="POST" novalidate>
                    @csrf
                    <div class="row">

                        {{-- Name --}}
                        <div class="col-md-12">
                            <div class="md-form">
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="col-md-12">
                            <div class="md-form">
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Phone --}}
                        <div class="col-md-12">
                            <div class="md-form">
                                <input
                                    type="text"
                                    name="number"
                                    class="form-control @error('number') is-invalid @enderror"
                                    placeholder="Phone Number"
                                    value="{{ old('number') }}">
                                @error('number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Subject --}}
                        <div class="col-md-12">
                            <div class="md-form">
                                <input
                                    type="text"
                                    name="subject"
                                    class="form-control @error('subject') is-invalid @enderror"
                                    placeholder="Subject"
                                    value="{{ old('subject') }}">
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Message --}}
                        <div class="col-md-12">
                            <div class="md-form">
                                <textarea
                                    name="message"
                                    class="form-control @error('message') is-invalid @enderror"
                                    placeholder="Your message...">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Captcha --}}
                        <div class="col-md-12">
                            <div class="md-form">
                                <div class="row d-flex m-auto align-items-center">
                                    <div class="col-md-4 col-xs-4">
                                        <label for="captcha_res" class="captcha_h d-flex justify-content-between fz-4">
                                            <span id="num1"  class="chaptcha_item num1"></span>
                                            <span id="plus"  class="chaptcha_item plus">+</span>
                                            <span id="num2"  class="chaptcha_item num2"></span>
                                            <span id="equal" class="chaptcha_item equal">=</span>
                                        </label>
                                    </div>
                                    <div class="col-md-8 col-xs-8">
                                        <input
                                            type="number"
                                            name="captcha_response"
                                            id="captcha_res"
                                            placeholder="Captcha Answer"
                                            value="{{ old('captcha_response') }}"
                                            class="form-control captcha_res @error('captcha_response') is-invalid @enderror"
                                            required>
                                        @error('captcha_response')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="col-md-12">
                            <div class="md-form">
                                <button type="submit" class="btn btn-primary captchaBtn">
                                    Send Message
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

            {{-- RIGHT: Contact Info --}}
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <h2>Let's Start a Project</h2>
                <ul class="address-info">
                    <li>
                        <i class="fa fa-phone-volume"></i>
                        <h5>Call Us @</h5>
                        <p><a href="tel:+977-9856027660">+977-9856027660</a></p>
                    </li>
                    <li>
                        <i class="fa fa-phone-volume"></i>
                        <h5>Call Us @</h5>
                        <p><a href="tel:+977-6-1420115">+977-6-1420115</a></p>
                    </li>
                    <li>
                        <i class="fa fa-envelope"></i>
                        <h5>For Inquiry:</h5>
                        <p>
                            <a href="mailto:info@pokharayogaschoolandretreatcenter.com">
                                Info@pokharayogaschoolandretreatcenter.com
                            </a>
                        </p>
                    </li>
                    <li>
                        <i class="fa fa-map-marker-alt"></i>
                        <h5>Find Us</h5>
                        <p>Leak Side Road Sedi hight, Pokhara, Nepal</p>
                    </li>
                </ul>

                <h3>Get Social</h3>
                @include('front.includes.social-media')
            </div>

        </div>
    </div>
</div>

<!-- Map -->
<div class="maps">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3515.365384141506!2d83.95516647436196!3d28.226587502401273!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399595de712b959d%3A0x783b7482c3801703!2sPokhara%20Yoga%20School%20And%20Retreat%20Center!5e0!3m2!1sen!2sae!4v1684058597363!5m2!1sen!2sae"
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>

@push('page-js')
<script>
    // ── Math Captcha ──────────────────────────────────────────────────────────────
    let captchaAnswer = 0;

    function generateCaptcha() {
        const n1 = Math.floor(Math.random() * 10) + 1;  // 1–10
        const n2 = Math.floor(Math.random() * 10) + 1;  // 1–10
        captchaAnswer = n1 + n2;

        document.getElementById('num1').textContent = n1;
        document.getElementById('num2').textContent = n2;

        // Clear previous answer but restore old() value only on first load
        const resField = document.getElementById('captcha_res');
        resField.value = '';
        resField.dataset.answer = captchaAnswer; // store for validation
    }

    // Validate before submit
    document.querySelector('.captchaBtn').addEventListener('click', function (e) {
        const resField  = document.getElementById('captcha_res');
        const userInput = parseInt(resField.value, 10);
        const correct   = parseInt(resField.dataset.answer, 10);

        if (isNaN(userInput) || userInput !== correct) {
            e.preventDefault();

            // Show inline error
            let errEl = document.getElementById('captcha-error');
            if (!errEl) {
                errEl = document.createElement('div');
                errEl.id        = 'captcha-error';
                errEl.className = 'invalid-feedback d-block';
                resField.parentNode.appendChild(errEl);
            }
            errEl.textContent = 'Incorrect captcha answer. Please try again.';
            resField.classList.add('is-invalid');

            // Regenerate so the user gets fresh numbers
            generateCaptcha();
        }
    });

    // Remove error styling when user starts typing
    document.getElementById('captcha_res').addEventListener('input', function () {
        this.classList.remove('is-invalid');
        const errEl = document.getElementById('captcha-error');
        if (errEl) errEl.textContent = '';
    });

    // Boot on page load
    document.addEventListener('DOMContentLoaded', generateCaptcha);
</script>
@endpush

@endsection
