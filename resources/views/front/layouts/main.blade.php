<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="robots" content="noindex, nofollow" />

    @stack('seo-meta')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--Main CSS-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />

    @stack('page-css')

</head>

<body>

    <!-- HEADER START -->
    <header>
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 header-left">
                        <ul>
                            <li>
                                <a href="tel:{{ $setting->number }}">
                                    <i class="fa fa-phone-volume"></i> {{ $setting->number }}
                                </a>
                            </li>
                            <li>
                                <a href="mailto:{{ $setting->email }}">
                                    <i class="fa fa-envelope"></i> {{ $setting->email }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 header-right">
                        <ul>
                            <li class="language">Language</li>
                            <li><a href="{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ $setting->instragram }}"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="{{ $setting->youtube }}"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="https://wa.me/{{ $setting->whats_app }}"><i class="fab fa-whatsapp"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="menu-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-default">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img src="{{ asset('uploads/' . $setting->logo) }}" alt="Logo"
                                    style="width: 180px;">
                            </a>

                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav me-auto">
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                                            href="{{ url('/') }}">Home</a>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#"
                                            id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown">
                                            Teacher Training
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-dark">
                                            @foreach ($yogaClass as $class)
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('yoga-class.single-page', $class->slug) }}">
                                                        {{ $class->title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('curriculam') }}">Curriculum</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('blog') }}">Blog</a>
                                    </li>

                                    <li class="nav-item">
                                        @if (auth('customer')->check())
                                            <a class="nav-link"
                                                href="{{ route('customer.booking.index') }}">Dashboard</a>
                                        @else
                                            <a class="nav-link" href="{{ route('customer.register') }}">Join Us</a>
                                        @endif
                                    </li>

                                       <li class="nav-item">
                                            <a class="nav-link" target="_blank"
                                                href="https://www.google.com/search?sca_esv=0f7b0b670255fb6d&hl=en-NP&gl=np&sxsrf=ANbL-n4a8Ge5o01obRoR85u93Fu_MRDejA:1776477804323&q=Pokhara+Yoga+School+and+Retreat+Center+%E2%80%93+Yoga+Teacher+Training+in+Nepal,+Pokhara+Yoga+School+Lake+Side+Road+Sedi+hight,+Pokhara+00977&si=AL3DRZEsmMGCryMMFSHJ3StBhOdZ2-6yYkXd_doETEE1OR-qOQ1h9G5MxW9Q58Y-4lnlZJ60T-JRGDFKYOVaObwTAT6IP2CMcQf1XkYrVg1-BhhFNbyJtJz8rCn61WIFB7hUoeQSqDFge-49PXzDJcmZ8lHJ7NppsdFWFsG-qR2RnrgXZ5KOpLVf7oWaIIT2g6e0COMqeXbgSzjhqcjokDzexm1gT58cGA%3D%3D&sa=X&ved=2ahUKEwjukunDp_aTAxWRHBAIHTBdFf4QrrQLegQIIRAA&biw=1536&bih=730&dpr=1.25">Google Reviews</a>

                                    </li>



                                </ul>
                            </div>

                            <div class="nav-right-box d-none d-lg-block">
                                <ul>
                                    <li><a href="tel:{{ $setting->number }}" class="call"><i
                                                class="fa fa-phone-volume"></i> {{ $setting->number }}</a></li>
                                    <li><a href="{{ url('contact-us') }}" class="talk">Let's Talk</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>

            <span class="clickmenus" onclick="openNav()">&#9776; </span>
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="mobile-menus">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>
                            <a href="#" data-bs-toggle="collapse" data-bs-target="#mobTrain">Teacher Training <i
                                    class="fa fa-angle-down"></i></a>
                            <div class="collapse" id="mobTrain">
                                <div class="card card-body">
                                    <ul>
                                        @foreach ($yogaClass as $class)
                                            <li><a
                                                    href="{{ route('yoga-class.single-page', $class->slug) }}">{{ $class->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li><a href="{{ url('curriculam') }}">Curriculum</a></li>
                        <li><a href="{{ url('blog') }}">Blog</a></li>
                        <li>
                            @if (auth('customer')->check())
                                <a href="{{ route('customer.booking.index') }}">Dashboard</a>
                            @else
                                <a href="{{ route('customer.register') }}">Join Us</a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <footer>
        <div class="top-footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <img src="{ asset('uploads/pokhara-yoga.png') }}" alt="">
                        <p>Pokhara Yoga School and retreat center. The best Yoga school in Pokhara, Nepal.</p>
                        <p><i class="fa fa-map-marker-alt"></i> Lakeside road, Sedi Heights Pokhara, Nepal. </p>
                        <p><a href="tel:+9779856027660"><i class="fa fa-phone-volume"></i> +977-9856027660</a> </p>
                        <p><a href="mailto:info@pokharayogaschoolandretreatcenter.com"><i class="fa fa-envelope"></i>
                                info@pokharayogaschoolandretreatcenter.com</a> </p>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 quicks">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="{{ route('front.about') }}">About Us</a> </li>
                            <li><a href="{{ route('front.faq') }}">FAQs</a> </li>
                            <li><a href="{{ route('front.photo-list') }}">Gallery</a> </li>
                            <li><a href="{{ route('front.teacher') }}">Teachers</a> </li>
                            <li><a href="{{ route('front.testimonial')}}">Testimonials</a> </li>
                            <li><a href="{{ route('front.contact') }}">Contact Us</a> </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 quicks">
                        <h4>Yoga Classes</h4>

                        <ul>
                            @foreach ($yogaClass as $class)
                                <li><a href="{{ route('yoga-class.single-page', $class->slug) }}">{{ $class->title }}</a></li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 footer-social">
                        <h4>Subscribe Now</h4>
                        <form action="#" method="post">
                            @csrf
                            <input type="email" name="email" placeholder="Email ID" required="">
                            <button type="submit">Subscribe</button>
                        </form>
                        <h5>Follow Us</h5>
                        <ul>
                            <li><a target="_blank" href="{{ $setting->facebook }}"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a target="_blank" href="{{ $setting->instragram }}"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li><a target="_blank" href="{{ $setting->youtube }}"><i class="fab fa-youtube"></i></a>
                            </li>
                            <li><a target="_blank" href="https://wa.me/{{ $setting->whats_app }}"><i
                                        class="fab fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <ul>
                            <li><a href="{{ route('single-privacy-policy') }}">Privacy Policy</a> </li>
                            <li><a href="#">Terms & Conditions</a> </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <p>Copyright © 2026 . All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <div class="scroll-top-wrapper show">
        <span class="scroll-top-inner">
            <i class="fa fa-angle-up"></i>
            <h5>TOP</h5>
        </span>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        //MOBILE MENU

        function openNav() {
            document.getElementById("mySidenav").style.width = "300px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
    <script>
        new WOW().init();
    </script>
    <script>
        $('.portfolio-item').isotope({
            itemSelector: '.item',
            layoutMode: 'fitRows'
        });
        $('.portfolio-menu ul li').click(function() {
            $('.portfolio-menu ul li').removeClass('active');
            $(this).addClass('active');

            var selector = $(this).attr('data-filter');
            $('.portfolio-item').isotope({
                filter: selector
            });
            return false;
        });
        $(document).ready(function() {
            var popup_btn = $('.popup-btn');
            popup_btn.magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // --- MODAL FUNCTIONALITY ---
            const modal = document.getElementById('donate-modal');
            const openBtn = document.getElementById('open-donate-btn');
            const closeBtn = document.querySelector('.close-btn');
            const donationForm = document.getElementById('donation-form');
            const successMessage = document.getElementById('success-message');
            const formElement = document.getElementById('donation-form-element');
            const amountInput = document.getElementById('amount');

            openBtn.addEventListener('click', () => {
                modal.classList.add('show');
            });

            closeBtn.addEventListener('click', () => {
                modal.classList.remove('show');
                resetForm();
            });

            window.addEventListener('click', (event) => {
                if (event.target === modal) {
                    modal.classList.remove('show');
                    resetForm();
                }
            });

            // --- DONATION TIER SELECTION ---
            const tierButtons = document.querySelectorAll('.tier-btn');
            tierButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove selected class from all buttons
                    tierButtons.forEach(btn => btn.classList.remove('selected'));
                    // Add selected class to clicked button
                    button.classList.add('selected');
                    // Update the amount input in the modal
                    amountInput.value = button.dataset.amount;
                });
            });

            // --- FORM SUBMISSION ---
            formElement.addEventListener('submit', (event) => {
                event.preventDefault(); // Stop page reload

                // Basic validation (HTML 'required' attribute does most of this)
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const amount = document.getElementById('amount').value;

                if (name && email && amount > 0) {
                    // Hide form, show success message
                    donationForm.style.display = 'none';
                    successMessage.style.display = 'block';

                    // Simulate server call and close modal after 3 seconds
                    setTimeout(() => {
                        modal.classList.remove('show');
                        resetForm(); // Reset for next time
                    }, 3000);
                }
            });

            function resetForm() {
                donationForm.style.display = 'block';
                successMessage.style.display = 'none';
                formElement.reset();
                tierButtons.forEach(btn => btn.classList.remove('selected'));
            }
        });
    </script>

      @stack('scripts')
    @stack('page-js')


</body>

</html>
