<footer class="wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
    <div class="top-footer">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <a href="{{action('Front\FrontController@index')}}"><img src="{{asset('uploads/'.$setting->logo)}}" alt=""></a>
            <h6>{{ $setting->title }}</h6>
            <p>{{ $setting->address }}</p>
            <p><strong>Phone</strong><a href="tel:{{ $setting->number }}"> {{ $setting->number }}</a></p>
            <p><strong>E-mail</strong> <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></p>
          </div>
          <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <ul>
              <!--<img src="{{ asset('uploads/pokhara-yoga.png') }}" alt="pokhara yoga school" class="w-100 img-fluid " style="height: 150px;">-->
              <img src="{{asset('uploads/pokhara-yoyoy.jpg')}}" alt="pokhara yoga school" class="w-100 img-fluid " style="height: 300px;">
            </ul>
          </div>
          <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <h4>Yoga Classes</h4>
            <ul>
              @foreach($yogaClass as $class)
              <li><a href="{{ action('Front\FrontController@yogaClass',$class->slug) }}"><i class="fa fa-angle-right"></i> {{$class->title}}  </a></li>
              @endforeach
            </ul>
          </div>
          <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <h4>Other Links</h4>
            <ul>

              <li><a href="{{action('Front\FrontController@aboutUs')}}"><i class="fa fa-angle-right"></i> About Us</a></li>
             {{--  <li><a href="{{action('Front\FrontController@feeList')}}"><i class="fa fa-angle-right"></i> Fee &amp; Schedule</a></li> --}}
               <li><a href="{{action('Front\FrontController@faq')}}"><i class="fa fa-angle-right"></i> FAQs</a></li>
            {{--   <li><a href="{{action('Front\FrontController@testimonial')}}"><i class="fa fa-angle-right"></i> Student Testimonial</a></li> --}}
              <li><a href="{{action('Front\FrontController@photoList')}}"><i class="fa fa-angle-right"></i> Photo Gallery</a></li>

              <li><a href="{{action('Front\FrontController@contactUs')}}"><i class="fa fa-angle-right"></i> Contact Us</a></li>
              <li><a href="{{action('Front\FrontController@privacyPolicy')}}"><i class="fa fa-angle-right"></i>Privacy Policy</a></li>

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



  {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('front/js/popper.min.js')}}"></script>
  <script src="{{asset('front/js/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('js/ajax.lightbox.js') }}"></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox.js"></script> --}}

  <script src="{{asset('front/js/main.js')}}"></script>
  <script src="{{asset('front/js/wow.min.js')}}"></script>
  {{-- <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> --}}

  <script>
    new WOW().init();
  </script>
  <!-- GetButton.io widget -->
  <script type="text/javascript">
      (function () {
      var options = {
      facebook: "476673743141805", // Facebook page ID
      whatsapp: "9825909867", // WhatsApp number
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
  <!-- /GetButton.io widget -->

  <!-- Go to www.addthis.com/dashboard to customize your tools -->
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e1d562b92c979de"></script>
  <script type="text/javascript" src="{{asset('js/functions.js')}}"></script>

  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PHJSC73"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->

  </body>
  </html>
