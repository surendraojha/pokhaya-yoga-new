{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Footer</title>
</head>
<body> --}}


<footer
 {{-- class="wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;" --}}


 >
  <div class="top-footer">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
          <a href="{{action('Front\FrontController@index')}}">
          <img width="250px" height="105px" class="lazy" data-src="{{asset('uploads/'.$setting->logo)}}" alt=""></a>
          <h6>{{ $setting->title }}</h6>
          <p>{{ $setting->address }}</p>
          <p><strong>Phone</strong><a href="tel:{{ $setting->number }}"> {{ $setting->number }}</a></p>
          <p><strong>E-mail</strong> <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></p>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
          <ul>
            {{-- <!--<img src="{{ asset('uploads/pokhara-yoga.png') }}" alt="pokhara yoga school" class="w-100 img-fluid " style="height: 150px;">--> --}}
            <img height="200px" width="250px" data-src="{{asset('uploads/pokhara-yoyoy.webp')}}" alt="pokhara yoga school"
             class="w-100 img-fluid lazy">
          </ul>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
          <h4>Yoga Classes</h4>
          <ul>
            @foreach($yogaClass as $class)
            {{-- {{ dd($class) }} --}}
            <li><a href="{{ action('Front\FrontController@yogaClass',$class->slug) }}">
                <i class="yoga_icon"><img class="lazy" data-src="{{asset('uploads/yogaicon.png')}}"
                 style="height: 25px;width: 25px;margin-top: 12px;padding-top: 4px;" alt=""></i>
              {{$class->title}}</a>
            </li>
            @endforeach
          </ul>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
          <h4>Other Links</h4>
          <ul>

            <li><a href="{{action('Front\FrontController@aboutUs')}}"><i class="fa fa-info-circle" aria-hidden="true"></i> About Us</a></li>
           {{--  <li><a href="{{action('Front\FrontController@feeList')}}"><i class="fa fa-angle-right"></i> Fee &amp; Schedule</a></li> --}}
             <li><a href="{{action('Front\FrontController@faq')}}"><i class="fa fa-question-circle" aria-hidden="true"></i> FAQs</a></li>
          {{--   <li><a href="{{action('Front\FrontController@testimonial')}}"><i class="fa fa-angle-right"></i> Student Testimonial</a></li> --}}
            <li><a href="{{action('Front\FrontController@photoList')}}"><i class="fa fa-picture-o" aria-hidden="true"></i> Photo Gallery</a></li>

            <li><a href="{{action('Front\FrontController@contactUs')}}"><i class="fa fa-phone-square" aria-hidden="true"></i> Contact Us</a></li>
            <li><a href="{{action('Front\FrontController@privacyPolicy')}}"><i class="fa fa-user-secret" aria-hidden="true"></i>Privacy Policy</a></li>

          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="bottom-footer">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <p>Copyright © {{ date('Y') }} . All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </div>
</footer>

{{-- <div class="scroll-top-wrapper show">
  <span class="scroll-top-inner">
    <i class="fa fa-angle-up"></i>
    <h5>TOP</h5>
  </span>
</div> --}}
{{-- <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script> --}}



<!--{{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>-->
<!--    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>-->

<!--<script type="text/javascript" src="{{asset('front/js/bootstrap.min.js')}}"></script>-->
<!--<script type="text/javascript" src="{{asset('front/js/popper.min.js')}}"></script>-->
<!--<script type="text/javascript" src="{{asset('front/js/owl.carousel.min.js')}}"></script>-->

<!--<script type="text/javascript" src="{{asset('front/js/main.js')}}"></script>-->
<!--<script type="text/javascript" src="{{asset('front/js/wow.min.js')}}"></script> --}}-->
<!--{{-- <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> --}}-->



    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    

<script type="text/javascript">
    // Hide the extra content initially, using JS so that if JS is disabled, no problemo:
    $('.read-more-content').addClass('hide_content')
    $('.read-more-show, .read-more-hide').removeClass('hide_content')

    // Set up the toggle effect:
    $('.read-more-show').on('click', function(e) {
        $(this).next('.read-more-content').removeClass('hide_content');
        $(this).addClass('hide_content');
        e.preventDefault();
    });

    // Changes contributed by @diego-rzg
    $('.read-more-hide').on('click', function(e) {
        var p = $(this).parent('.read-more-content');
        p.addClass('hide_content');
        p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
        e.preventDefault();
    });

 

    // load iframe of video
    function loadYouTubeVideo(id, videoId,buttonId) {
        // The ID of the YouTube video you want to load
        $('#'+buttonId).remove();
        // Create the iframe element
        var iframe = document.createElement('iframe');

        // Set the source of the iframe to the YouTube video with autoplay enabled
        iframe.src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1';

        // Set the width and height of the iframe
        iframe.width = '560';
        iframe.height = '315';

        // Set frameborder to 0 to hide the YouTube border
        iframe.frameBorder = '0';

        // Append the iframe to the container
        var container = document.getElementById(id);
        container.appendChild(iframe);
    }

    // Add a click event listener to the button to trigger video loading
    // var loadButton = document.getElementById('load-video-button');
    // loadButton.addEventListener('click', loadYouTubeVideo);
</script>

     <!--<script type="text/javascript" src="{{ asset('front/js/output.min.js') }}"></script>-->
{{-- <script type="text/javascript" src="{{ asset('js/ajax.lightbox.js') }}"></script> --}}

<script>
document.addEventListener("DOMContentLoaded", function() {
  var lazyloadImages = document.querySelectorAll("img.lazy");
  var lazyloadThrottleTimeout;


  function lazyload () {
    if(lazyloadThrottleTimeout) {
      clearTimeout(lazyloadThrottleTimeout);
    //   alert('timeout cleared');
    }

    lazyloadThrottleTimeout = setTimeout(function() {
        var scrollTop = window.pageYOffset;
        lazyloadImages.forEach(function(img) {
            if(img.offsetTop < (window.innerHeight + scrollTop)) {
              img.src = img.dataset.src;
              img.classList.remove('lazy');
            }
        });
        if(lazyloadImages.length == 0) {
          document.removeEventListener("scroll", lazyload);
          window.removeEventListener("resize", lazyload);
          window.removeEventListener("orientationChange", lazyload);
                    // document.removeEventListener("mousemove", lazyload);

        }

    }, 10);
  }

  document.addEventListener("scroll", lazyload);
  window.addEventListener("resize", lazyload);
  window.addEventListener("orientationChange", lazyload);
    // document.addEventListener("mousemove", lazyload);

});

// lazy loading on carasal
// var owl = $('.carousel.lazy');
// owl.owlCarousel();
// // Listen to owl events:
// owl.on('changed.carousel', function(event) {
//      var lazyloadImages = document.querySelectorAll("img.lazy");
//       lazyloadImages.forEach(function(img) {
//             // if(img.offsetTop < (window.innerHeight + scrollTop)) {
//               img.src = img.dataset.src;
//               img.classList.remove('lazy');
//             // }
//         });
// })

// $(function() {
//   return $(".carousel.lazy").on("slide", function(ev) {
//     // var lazy;
//     // lazy = $(ev.relatedTarget).find("img[data-src]");



//     // lazy.attr("src", lazy.data('src'));
//     // lazy.removeAttr("data-src");
//   });
// });


</script>
<script>
//   new WOW().init();
</script>
<!-- GetButton.io widget -->
// <script type="text/javascript">
//     (function () {
//     var options = {
//     facebook: "101037014835121", // Facebook page ID
//     whatsapp: "+977-9856027660", // WhatsApp number
//     call_to_action: "Message us", // Call to action
//     button_color: "#A8CE50", // Color of button
//     position: "right", // Position may be 'right' or 'left'
//     order: "facebook,whatsapp", // Order of buttons
//   };
//     var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
//     var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
//     s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
//     var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
//     })();
// </script>
<!-- /GetButton.io widget -->

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<!--{{-- <script type="text/javascript"  src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e1d562b92c979de"></script> --}}-->
<!--<script type="text/javascript"  src="{{asset('js/functions.js')}}"></script>-->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PHJSC73"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

</body>
</html>
