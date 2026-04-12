{{-- @section("title", "$seoMeta->meta_title")
@section("keyword", "$seoMeta->meta_keyword")
@section("desc", "$seoMeta->meta_des") --}}
@section("singlepage")
  @endsection
@include('front.includes.header')


<style type="text/css">
    .read-more-show{
      cursor:pointer;
      color: #ed8323;
    }
    .read-more-hide{
      cursor:pointer;
      color: #ed8323;
    }

    .hide_content{
      display: none;
    }
</style>
<style>
@media(max-width: 991px){
    .slider img {height: auto!important;}

}
</style>
<!-- start banner Area -->
<div class="page-banner" style="background-image:url('{{ asset('/uploads/'.$banner->image) }}')">
  <div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <h1>Testimonials</h1>
          <ul class="breadcrumb">
            <li><a href="{{action('Front\FrontController@index')}}">Home</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End banner Area -->


 {{-- test --}}
 @if (!$testimonials->isEmpty())
 <div class="testimonials">
     <div class="container">
         <div class="row">
             <div class="col-12 col-sm-12 text-center pb-2">
                 <h3>Yoga Teacher Training Student Testimonials</h3>
             </div>
             @foreach ($testimonials as $test)
                 <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                     <div class="testi-box">
                         <img class="lazy" height="100px" width="90px"
                             data-src="{{ asset('uploads/testimonials/thumbnails/' . $test->image) }}"
                             alt="Yoga school in nepal">
                         <h6><i class="fa fa-quote-left"></i> {{ $test->name }}</h6>

                         @if(strlen($test->content) > 300)
                         {{ strip_tags(substr($test->content,0,300)) }}
                         <span class="read-more-show hide_content">...Read More<i class="fa fa-angle-down"></i></span>
                         <span class="read-more-content"> {{ strip_tags(substr($test->content,300,strlen($test->content))) }}
                         <span class="read-more-hide hide_content">Read Less <i class="fa fa-angle-up"></i></span> </span>
                         @else
                         <p>{!! $test->content !!}</p>
                         @endif
                         <p><strong>Thank You</strong></p>
                     </div>
                 </div>
             @endforeach

         </div>
     </div>
 </div>
@endif


{{-- /test --}}

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
</script>


@include('front.includes.footer')
