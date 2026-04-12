
 <!-- enquiry modal -->
  @if(request()->is('contact-us','student-register','student/pay'))
    @else
    <div class="enquiry-sticky-btn">
    <button type="button" class="btn btn-primary enquiry-btn" data-toggle="modal" data-target="#enquirymodal">
        Enquire Now
    </button>
    </div>
    @endif
  <!-- Modal -->
  <div class="modal fade enquirymodal pt-0" id="enquirymodal" tabindex="-1" role="dialog" aria-labelledby="enquirymodalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="enquirymodalLabel">Send Us Message</h4>
          <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{action('Front\FrontController@contactUsPost')}}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="contact-message p-2">
                    <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="row">
                            <div class="col-md-6 col-lg-12">
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

                                <div class="col-12 md-form">
                                <textarea type="text" class="h-100" name="message" placeholder="Your message"></textarea>
                                </div>
                                <div class="md-form">
                                  <div class="row d-flex m-auto align-items-center justify-content-center pt-2">
                                    <div class="col-md-3 col-xs-4 ">
                                      <label for="captcha_h" class="captcha_h d-flex justify-content-between fz-4">
                                        <span  id="num1" class="chaptcha_item num1"></span>
                                        <span  id="plus" class="chaptcha_item plus">+</span>
                                        <span  id="num2" class="chaptcha_item num2"></span>
                                        <span  id="equal" class="chaptcha_item equal">=</span>
                                      </label>
                                    </div>
                                    <div class="col-md-7 col-xs-8 ">
                                        <label for="captcha_h" class="captcha_h d-flex justify-content-between fz-4">
                                           <input type="number"  name="captcha_response" placeholder="Captcha Answer" id="captcha_res" value="" class="captcha_res m-0" required>
                                        </label>
                                    </div>
                                  </div>
                                </div>

                                <!-- <div class="col-12 d-flex  p-2">-->
                                <!--    <div class="g-recaptcha"  data-sitekey="{{config('google_captcha.site_key')}}"></div>-->
                                <!--</div>-->
                                <div class=" col-12 form-group pt-1 text-center">
                                <input type="submit" value="Send" class="btn btn-success send-btn text-white pt-2 pb-3 text-uppercase captchaBtn" style="font-size: 20px">

                            </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
    <!-- enquery modal end -->

<footer
 {{-- class="wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;" --}}


 >
  <div class="top-footer">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
          <a href="{{action('Front\FrontController@index')}}">
          <img style="aspect-ratio:16/9" class="lazy" data-src="{{asset('uploads/'.$setting->logo)}}" alt=""></a>
          <h6>{{ $setting->title }}</h6>
          <p>{{ $setting->address }}</p>
          <p><strong>Phone</strong><a href="tel:{{ $setting->number }}"> {{ $setting->number }}</a></p>
          <p><strong>E-mail</strong> <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></p>
          <div class="social-media-container">
                <ul class="social-icons">
                  <li><a href="{{ $setting->instragram }}"><i class="fa fa-instagram"></i></a></li>
                  <li><a href="{{ $setting->facebook }}"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="{{ $setting->youtube }}"><i class="fa fa-youtube"></i></a></li>
                  <li><a href="https://wa.me/{{ $setting->whats_app }}"><i class="fa fa-whatsapp"></i></a></li>
                </ul>
             </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
          <ul>
            {{-- <!--<img src="{{ asset('uploads/pokhara-yoga.png') }}" alt="pokhara yoga school" class="w-100 img-fluid " style="height: 150px;">--> --}}
            <img height="200px" width="250px" data-src="{{asset('uploads/pokhara-yoyoy.webp')}}" alt="pokhara yoga school"
             class="w-100 img-fluid lazy">
          </ul>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
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
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
          <h4>Other Links</h4>
          <ul>

            <li><a href="{{action('Front\FrontController@aboutUs')}}"><i class="fa fa-info-circle" aria-hidden="true"></i> About Us</a></li>
             <li><a href="{{action('Front\FrontController@faq')}}"><i class="fa fa-question-circle" aria-hidden="true"></i> FAQs</a></li>
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




    <script type="text/javascript"  src="{{ asset('js/jquery.min.js') }}?v=20250730"></script>

     <script type="text/javascript" defer  src="{{ asset('front/js/output.min.js') }}?v=20250730" async></script>
     <script defer type="text/javascript" src="{{ asset('front/js/slick.js') }}?v=20250730"></script>


<!-- Form Captcha-->
<script async>

    let num1 = Math.floor(Math.random() * 10);
    $('.num1').text(num1);
    let num2 = Math.floor(Math.random() * 10);
    $('.num2').text(num2);
    let captcha_res = num1 + num2;

      $(document).ready(function(){
        $(".captchaBtn").click(function(event){
        //   let abc = parseInt($('.num1').text()) + parseInt($('.num2').text()) === parseInt($('.captcha_res').val());
           let resCap=num1 +num2=== parseInt($('.captcha_res').val());
          if (resCap) {
            return true;
        }
        else {
            alert("Please Enter Correct Captcha Answer");
            return false;
             event.preventDefault();
        }

        });
      });

</script>

<!--announcement slider-->
<script defer  type="text/javascript">
    jQuery(window).on('load', function() {
  $('.slick').slick({
    arrows: true,
    autoplay: true,
    autoplaySpeed: 5000,
    nextArrow: '<span class="arrow next-slide"></span>',
    prevArrow: ''
  });
});
</script>


<script defer  type="text/javascript">

            document.getElementById('target-country').addEventListener('click', function () {
                $('#target-country').text('Loading..');

    loadGoogleTranslateScript();
                    $('#target-country').hide();

});


            function loadGoogleTranslateScript() {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';

    // Define a callback function to initialize the translation element
    window.googleTranslateElementInit = function () {
        // Change the target language for translation
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
            autoDisplay: false
        }, 'google_translate_element');
    };

    // Append the script to the document
    document.body.appendChild(script);
}
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

        }

    }, 10);
  }

  document.addEventListener("scroll", lazyload);
  window.addEventListener("resize", lazyload);
  window.addEventListener("orientationChange", lazyload);

});

// lazy loading slider
$(document).ready(function() {
    $('#carouselExampleCaptions').on('slid.bs.carousel', function (e) {
        // Remove the "lazy" class from images when a new slide becomes active
        $(this).find('.carousel-item.active img.lazy').each(function() {
            $(this).removeClass('lazy');
            $(this).attr('src', $(this).data('src'));
        });

        // Additional custom code for handling slide change can be added here

        // Example: Get the index of the active slide
        var activeSlideIndex = $(this).find('.carousel-item.active').index();

        // Example: Log the active slide index
        // console.log("Active slide index:", activeSlideIndex);

        // Add your custom code here
    });
});


var userLanguage = navigator.language || navigator.languages[0];


</script>
 <!--GetButton.io widget -->
<script type="text/javascript" defer>
    (function () {
    var options = {
    facebook: "101037014835121", // Facebook page ID
    whatsapp: "+977-9856027660", // WhatsApp number
    call_to_action: "Message us", // Call to action
    button_color: "#A8CE50", // Color of button
    position: "right", // Position may be 'right' or 'left'
    order: "facebook,whatsapp", // Order of buttons
  };
    var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
    var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
    s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
    var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
 <!--GetButton.io widget-->

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<!--{{-- <script type="text/javascript"  src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e1d562b92c979de"></script> --}}-->
<script type="text/javascript"  src="{{asset('js/functions.js')}}"></script>


@yield('page-js')
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PHJSC73"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

</body>
</html>
