<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <meta name="google-site-verification" content="Oz-mSFiSV1mePMCUtC3CtHSRN177F0hZpB-zWTZZ9qo">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title')</title>
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="Pokhara Yoga School">
    <meta property="og:title" content=" @yield('title')">
    <meta property="og:description" content=" @yield('desc')">
    <meta property="og:image" content="{{ asset('uploads/' . $setting->logo) }}">
    <meta name="author" content="pokhara yoga school">
    <meta name="description" content="@yield('desc')">
    <meta name="keywords" content=" @yield('keyword')">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="{{ url()->current() }}" hreflang="en">
    <meta name="google-site-verification" content="Oz-mSFiSV1mePMCUtC3CtHSRN177F0hZpB-zWTZZ9qo">
    <!--Bootstrap CSS-->
    <link rel="icon" href="{{ asset('favicon-small.png') }}" type="image/png" hreflang="en">

     {{-- <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}" hreflang="en"> --}}

    <!--Font Awesome CSS-->
    <!--Main CSS-->
    {{-- <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" hreflang="en"> --}}


      {{-- <link rel="stylesheet" type="text/css" href="{{asset('front/css/animate.css')}}" --}}
        {{-- hreflang="en"> --}}

 <!--Owl Carousel-->
    {{-- <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}" hreflang="en"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('front/css/owl.theme.default.min.css') }}" hreflang="en"> --}}
   <style>

   </style>

    <link rel="stylesheet" href="{{asset('front/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/font-awesome/css/font-awesome.min.css')}}">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet" --}}
        {{-- hreflang="en"> --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      {{--  <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet"> --}}
        
                <link href="{{asset('google-font.css')}}?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        

    {{-- <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet" hreflang="en"> --}}
    <link rel="stylesheet" href="{{asset('front/css/lightbox2.min.css')}}"
        hreflang="en">
    <!-- Google Tag Manager -->
    <script type="text/javascript">
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-PHJSC73');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Facebook Pixel Code -->
    <script type="text/javascript">
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '594742474993226');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <div><img height="1" width="1" style="display:none" alt=""
                src="https://www.facebook.com/tr?id=594742474993226&ev=PageView&noscript=1"></div>
    </noscript>
    <!-- End Facebook Pixel Code -->


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script type="text/javascript" async src="https://www.googletagmanager.com/gtag/js?id=UA-173922310-2"></script>
     <!--<script type="text/javascript" async src="{{ asset('front/js/google-tag-manager.js') }}"></script>-->
    <script type="text/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-173922310-2');
    </script>
<meta name="yandex-verification" content="7def2d808b273561" />

    <!-- Global site tag (gtag.js) - Google Ads: 10775170677 -->
    <script type="text/javascript" async src="https://www.googletagmanager.com/gtag/js?id=AW-10775170677"></script>
        <!--<script type="text/javascript" async src="{{ asset('front/js/google-ads-manager.js') }}"></script>-->

    <script type="text/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-10775170677');

        window.addEventListener('load', function() {
            jQuery('[href="https://www.pokharayogaschoolandretreatcenter.com/student-register"]').click(
        function() {
                gtag('event', 'conversion', {
                    'send_to': 'AW-10775170677/FJZxCN615vgCEPWcgJIo'
                });
            });
            if (window.location.pathname == "/thank-you") {
                gtag('event', 'conversion', {
                    'send_to': 'AW-10775170677/eOUpCPnLsvYCEPWcgJIo'
                });
            }

            jQuery('.apply').click(function() {
                gtag('event', 'conversion', {
                    'send_to': 'AW-10775170677/WOEwCNOq6PgCEPWcgJIo'
                });
            });

        });
    </script>


    <!-- google translate -->
    {{-- <script type="text/javascript">
        function googleTranslateElementInit() {

            new google.translate.TranslateElement({
                pageLanguage: 'en',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false
            }, 'google_translate_element');
        }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script> --}}


    {{-- <script type="text/javascript">
        function translateLanguage(lang) {

            var $frame = $('.goog-te-menu-frame:first');
            if (!$frame.size()) {
                alert("Error: Could not find Google translate frame.");
                return false;
            }
            $frame.contents().find('.goog-te-menu2-item span.text:contains(' + lang + ')').get(0).click();
            return false;
        }
    </script> --}}


    {{-- <script type="text/javascript">
  $('document').ready(function () {
      $('#google_translate_element').on("click", function () {

          // Change font family and color
          $("iframe").contents().find(".goog-te-menu2-item div, .goog-te-menu2-item:link div, .goog-te-menu2-item:visited div, .goog-te-menu2-item:active div") //, .goog-te-menu2 *
          .css({
              'color': '#544F4B',
              'background-color': '#e3e3ff',
              'font-family': '"Open Sans",Helvetica,Arial,sans-serif'
          });

          // Change hover effects  #e3e3ff = white
          $("iframe").contents().find(".goog-te-menu2-item div").hover(function () {
              $(this).css('background-color', '#17548d').find('span.text').css('color', '#e3e3ff');
          }, function () {
              $(this).css('background-color', '#e3e3ff').find('span.text').css('color', '#544F4B');
         });

          // Change Google's default blue border
          $("iframe").contents().find('.goog-te-menu2').css('border', '1px solid #17548d');

         $("iframe").contents().find('.goog-te-menu2').css('background-color', '#e3e3ff');

          // Change the iframe's box shadow
          $(".goog-te-menu-frame").css({
              '-moz-box-shadow': '0 3px 8px 2px #666666',
             '-webkit-box-shadow': '0 3px 8px 2px #666',
             'box-shadow': '0 3px 8px 2px #666'
          });
      });
  });
</script> --}}


    <!-- google translate  css -->

    {{-- <style type="text/css">
        /*google translate */
        /*OVERRIDE GOOGLE TRANSLATE WIDGET CSS BEGIN */
        div#google_translate_element div.goog-te-gadget-simple {
            border: none;
            background-color: transparent;
            background-color: #17548d;
            */
            /*#e3e3ff */
        }

        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value:hover {
            text-decoration: none;
        }

        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span {
            color: #aaa;
        }

        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span:hover {
            color: white;
        }

        .goog-te-gadget-icon {
            display: none !important;
            background: url("url for the icon") 0 0 no-repeat !important;
        }

        /*Remove the down arrow */
        /*when dropdown open */
        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span[style="color: rgb(213, 213, 213);"] {
            display: none;
        }

        /*after clicked/touched */
        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span[style="color: rgb(118, 118, 118);"] {
            display: none;
        }

        on page load (not yet touched or clicked) div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span[style="color: rgb(155, 155, 155);"] {
            display: none;
        }

        /*Remove span with left border line | (next to the arrow) in Chrome & Firefox */
        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span[style="border-left: 1px solid rgb(187, 187, 187);"] {
            display: none;
        }

        /*Remove span with left border line | (next to the arrow) in Edge & IE11 */
        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span[style="border-left-color: rgb(187, 187, 187); border-left-width: 1px; border-left-style: solid;"] {
            display: none;
        }

        /*HIDE the google translate toolbar */
        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        }

        body {
            top: 0px !important;
        }

    </style> --}}


    @yield('external-css')

</head>

<body>
    <!--  <div id="fb-root"></div>-->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.j s#xfbml=1&version=v6.0">
    </script>-->
    <div id="fb-root"></div>
    <script type="text/javascript" defer crossorigin=" anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0"></script>

    <header>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8 header-left">
                        <ul>
                            <li><a href="#"><i class="fa fa-mobile" aria-hidden="true"></i>
                                    {{ $setting->number }}</a></li>
                            <li><a href="mailto:{{ $setting->email }}"><i class="fa fa-envelope"></i>
                                    {{ $setting->email }}</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-2 col-lg-2 ">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                
                                <div id="google_translate_element"></div>
                                <script type="text/javascript">

                                    function googleTranslateElementInit() {
                                      new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                                    }
                                    
                                    </script>
                                    
                                    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                                
                                <ul class="navbar-nav ml-auto">
                                    <!--<li class="nav-item dropdown ">-->
                                    <!--    <a class="nav-link" href=""-->
                                    <!--        style="padding:1px; line-height:30px; color:#fff">Language</a>-->
                                    <!--    <ul>-->

                                    <!--        <li><a href="https://pokharayogaschoolandretreatcenter.com/">En</a></li>-->
                                            <!--<li><a href="https://sp.pokharayogaschoolandretreatcenter.com/">Sp</a></li>-->

                                    <!--    </ul>-->
                                    <!--</li>-->
                                    <li style="margin-left:19px;" id="google_translate_element"></li>
                                </ul>
                            </div>
                        </nav>

                    </div>
               {{--     <div class="col-12 col-sm-12 col-md-2 col-lg-2 header-right">
                        <ul class="wow shake" data-wow-delay="0.3s"
                            style="visibility: visible; animation-delay: 0.3s; animation-name: shake; ">

                            <!--<li><a href="{{ Route('customer.refer.page') }}" class="applys mt-3"-->
                            <!--        hreflang="en">Refer & Earn 100 Euro<i class="fa fa-money"-->
                            <!--            aria-hidden="true"></i></a></li>-->
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="menu-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 ">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="{{ action('Front\FrontController@index') }}">
                                <img width="180px" height="104px" src="{{ asset('uploads/' . $setting->logo) }}" alt="Yoga school in Nepal"></a>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link"
                                            href="{{ action('Front\FrontController@index') }}">Home</a>
                                    </li>
                                    <li class="nav-item dropdown ">
                                        <a class="nav-link" href="">Teacher Trainings </a>
                                        <ul>
                                            @foreach ($yogaClass as $class)
                                                <li><a
                                                        href="{{ action('Front\FrontController@yogaClass', $class->slug) }}">{{ $class->title }}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </li>

                                    {{-- <li class="nav-item dropdown ">
                                            <a class="nav-link" href="">Yoga Courses</a>
                                            <ul>
                                            @foreach ($yogaClass as $class)
                                            <li><a href="{{ action('Front\FrontController@yogaClass',$class->slug) }}">{{$class->title}}</a></li>
                                            @endforeach

                                            </ul>
                                        </li> --}}
                                        @foreach ($allPages as $page)
                                        @if ($page->slug != 'privacy-policy')
                                            <li class="nav-item ">
                                                <a class="nav-link"
                                                    href="{{ action('Front\FrontController@singlePage', $page->slug) }}">{{ $page->title }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                        
                                    <li class="nav-item ">
                                        <a class="nav-link"
                                            href="{{ action('Front\FrontController@curriculam') }}">Curriculum</a>
                                    </li>
                                    

                                    <li class="nav-item ">
                                        <a class="nav-link"
                                            href="{{ action('Front\FrontController@blogs') }}">Blog</a>
                                    </li>

                                    

                                    {{-- <li class="nav-item ">
                                            <a class="nav-link" href="{{action('Front\FrontController@photoList')}}">Gallery</a>
                                        </li> --}}
                                     <li class="nav-item ">
                                        <a class="nav-link"
                                            href="{{ action('Front\FrontController@aboutUs') }}">About us</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link"
                                            href="{{ action('Front\FrontController@contactUs') }}">Contact us</a>
                                    </li>
                                   

                                    @if (session()->has('User'))
                                        <li class="nav-item dropdown ">
                                            <a class="nav-link" href=""><img
                                                    src="{{ asset('uploads/pp.jpg') }}" width="60px" height="30px"
                                                    alt=""></a>
                                            <ul>
                                                <li><a
                                                        href="{{ action('Front\FrontController@userprofile_dashboard') }}">{{ session('name') }}
                                                        Dashboard</a></li>
                                                <li><a href="{{ action('Front\FrontController@register_yoga') }}">Join
                                                        Yoga</a></li>
                                                <li><a href="{{ action('Front\FrontController@logout') }}">Logout</a>
                                                </li>
                                            </ul>
                                        </li>
                                    @else
                                        <li class="nav-item dropdown ">
                                            @php
                                                $user = auth('customer')->user();
                                            @endphp

                                            @if (!$user)
                                                <a class="nav-link" href="{{ route('customer.register') }}">Join us</a>
                                                <ul>
                                                    <!--<li><a href="{{ route('customer.register') }}">Register</a></li>-->
                                                  
                                                    {{-- <li><a href="{{ action('Front\FrontController@yoga_package')}}">Yoga package</a></li> --}}
                                                </ul>
                                            @else
                                                <a class="nav-link" href="">Dashboard</a>
                                                <ul>
                                                    <li><a href="{{ route('customer.booking.index') }}">My
                                                            Bookings</a></li>

                                                    <li><a href="{{ route('booking') }}">Book Now</a></li>

                                                    <!--<li><a href="{{ route('customer.refer.page') }}">Refer & Earn 100-->
                                                    <!--        Euro</a></li>-->


                                                    <li>
                                                        <a href="#"
                                                            onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                                                            class="icon-menu"> <i
                                                                class="icon-power"></i>Logout</a>
                                                    </li>
                                                    <form id="frm-logout" action="{{ route('logout') }}"
                                                        method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>

                                        </li>
                                       
                                        {{-- <li><a href="{{ action('Front\FrontController@yoga_package')}}">Yoga package</a></li> --}}
                                </ul>
                                @endif
                                </li>

                                @endif
                                </ul>
                            </div>
                        </nav>
                        <div class="mobile-header">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <span class="clickmenus" onclick="openNav()">&#9776; </span>
                                        <div id="mySidenav" class="sidenav">
                                            <a href="javascript:void(0)" class="closebtn"
                                                onclick="closeNav()">&times;</a>
                                            <div class="mobile-menus">
                                                <ul>
                                                    <li><a href="{{ action('Front\FrontController@index') }}">Home</a>
                                                    </li>
                                                    <li><a
                                                            href="{{ action('Front\FrontController@curriculam') }}">Curriculum</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" type="text" data-toggle="collapse"
                                                            data-target="#multiCollapseExample2" aria-expanded="false"
                                                            aria-controls="multiCollapseExample2">Yoga Courses <i
                                                                class="wsmenu-arrow fa fa-angle-down "></i> </a>
                                                        <div class="collapse multi-collapse" id="multiCollapseExample2">
                                                            <div class="card card-body">
                                                                <ul>
                                                                    @foreach ($yogaClass as $class)
                                                                        <li><a
                                                                                href="{{ action('Front\FrontController@yogaClass', $class->slug) }}">{{ $class->title }}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    @foreach ($allPages as $page)
                                                        <li class=" ">
                                                            <a class=""
                                                                href="{{ action('Front\FrontController@singlePage', $page->slug) }}">{{ $page->title }}</a>
                                                        </li>
                                                    @endforeach
                                                    <li class=" ">
                                                        <a class=""
                                                            href="{{ action('Front\FrontController@blogs') }}">Blog</a>
                                                    </li>
                                                    <li class=" ">
                                                        <a class=""
                                                            href="{{ action('Front\FrontController@photoList') }}">Gallery</a>
                                                    </li>

                                                    <!--<li class="">-->
                                                    <!--    <a class=""-->
                                                    <!--        href="{{ route('customer.refer.page') }}">Refer & Earn 100-->
                                                    <!--        Euro</a>-->
                                                    <!--</li>-->
                                                    <li class="nav-item dropdown " >
                                                        <a class="nav-link" href="">Language</a>
                                                        <ul>
                                                          <li><a href="https://pokharayogaschoolandretreatcenter.com/">En</a></li>
                                                          <!--<li><a href="https://sp.pokharayogaschoolandretreatcenter.com/">Sp</a></li>-->
                                                        </ul>
                                                      </li>
                                                    <li><a href="{{action('Front\FrontController@aboutUs')}}"><i class="fa fa-info-circle" aria-hidden="true"></i> About us</a></li>

                                                    @if (!$user)
                                                        <li>
                                                            <a href="#" type="text" data-toggle="collapse"
                                                                data-target="#multiCollapseExample3"
                                                                aria-expanded="false"
                                                                aria-controls="multiCollapseExample3">Join us <i
                                                                    class="wsmenu-arrow fa fa-angle-down "></i> </a>
                                                            <div class="collapse multi-collapse"
                                                                id="multiCollapseExample3">
                                                                <div class="card card-body">
                                                                    <ul>
                                                                        <li><a
                                                                                href="{{ route('customer.register') }}">Register</a>
                                                                        </li>
                                                                        

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="#" type="text" data-toggle="collapse"
                                                                data-target="#multiCollapseExample3"
                                                                aria-expanded="false"
                                                                aria-controls="multiCollapseExample3">Dashboard <i
                                                                    class="wsmenu-arrow fa fa-angle-down "></i> </a>
                                                            <div class="collapse multi-collapse"
                                                                id="multiCollapseExample3">
                                                                <div class="card card-body">
                                                                    <ul>
                                                                        <li><a
                                                                                href="{{ route('customer.booking.index') }}">My
                                                                                Bookings</a></li>

                                                                        <li><a href="{{ route('booking') }}">Book
                                                                                Now</a></li>

                                                                        <!--<li><a-->
                                                                        <!--        href="{{ route('customer.refer.page') }}">Refer-->
                                                                        <!--        and Earn 100 Euro</a></li>-->

                                                                        <!--<li>-->
                                                                            <a href="#"
                                                                                onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                                                                                class="icon-menu"> <i
                                                                                    class="icon-power"></i>Logout</a>
                                                                        </li>
                                                                        <form id="frm-logout"
                                                                            action="{{ route('logout') }}"
                                                                            method="POST" style="display: none;">
                                                                            {{ csrf_field() }}
                                                                        </form>


                                                                      
                                                                        {{-- <li><a href="{{ action('Front\FrontController@yoga_package')}}">Yoga package</a></li> --}}
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-2 col-lg-2">
                <div class="menu-adds">
                    {{-- <p><i class="fa fa-phone-volume"></i> +977-1-1234567</p>
       {{-- <p><i class="fa fa-envelope"></i> info@pokharayogaschoolandretreatcenter.com</p> --}}
                </div>
            </div>
            <div class="col-12 col-sm-12">
                <div class="menu-adds-mobile">
                    {{-- <p><i class="fa fa-phone-volume"></i> +977-1-1234567</p> --}}
                    {{-- <p><i class="fa fa-envelope"></i> info@pokharayogaschoolandretreatcenter.com</p> --}}
                </div>
            </div>
        </div>
    </header>

