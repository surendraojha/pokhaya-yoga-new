{{-- @section("title", "$seoMeta->meta_title")
@section("keyword", "$seoMeta->meta_keyword")
@section("desc", "$seoMeta->meta_des") --}}
@section("singlepage")
  @endsection
@include('front.includes.header')


 <div class="detail-video-testimonial ">
     <div class="container">
         <div class="row">
                 <div class="col-12">
                    <div class="video-testi-box">
                        <div class="detail-video-testi-top">
                            <iframe  src="{{ $videoTestimonial->url }}" title="{{ $videoTestimonial->title }}" frameborder="0" allow="accelerometer; control; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                        <div class="detail-video-testi-content">
                            <h5>{{ $videoTestimonial->title }}</h5>
                            <p>{!! $videoTestimonial->content !!}</p>

                        </div>
                     </div>
                 </div>
         </div>
     </div>
 </div>




@include('front.includes.footer')
