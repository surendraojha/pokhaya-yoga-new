@section("title", "$seoMeta->meta_title")
@section("keyword", "$seoMeta->meta_keyword")
@section("desc", "$seoMeta->meta_des")
@section("singlepage")
  @endsection
@include('front.includes.header')


<!-- start banner Area -->
<div class="page-banner" style="background-image:url('{{ asset('/uploads/'.$banner->image) }}')">
  <div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <h1>Video Testimonials</h1>
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
 @if (!$videoTestimonials->isEmpty())
 <div class="video-testimonials mb-3">
     <div class="container">
         <div class="row">
             @foreach ($videoTestimonials as $testimonial)
                 <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                     <div class="video-testi-box">
                        <div class="video-testi-top">
                            <iframe  src="{{ $testimonial->url }}" title="{{ $testimonial->title }}" frameborder="0" allow="accelerometer; control; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                        <div class="video-testi-content">
                            <h5>{{ $testimonial->title }}</h5>
                            <p>{!! strip_tags(substr($testimonial->content,0,100)) !!}</p>
                            <a href="{{ action('Front\FrontController@videoTestimonialDetail',$testimonial->title) }}" class="btn btn-read m-0 mt-1 ">Read
                                More.</a>
                        </div>

                     </div>
                 </div>
             @endforeach

         </div>
         {{ $videoTestimonials->links() }}
     </div>
 </div>
@endif


@include('front.includes.footer')
