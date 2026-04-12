@section("title", "$seoMeta->meta_title")
@section("keyword", "$seoMeta->meta_keyword")
@section("desc", "$seoMeta->meta_des")
@section("photolist")
  @endsection
@include('front.includes.header')

<!-- start banner Area -->
<div class="page-banner">
  <div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <h1>Gallery</h1>
          <ul class="breadcrumb">
            <li><a href="{{action('Front\FrontController@index')}}">Home</a></li>
            <li>Gallery</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End banner Area -->

<!-- Start gallery Area -->

<section class="gallery-area section-gap mt-5 mb-5">
	<div class="container">
		<div class="social-icons pb-2">
@include('front.includes.social-media')
</div>
	<div class="row">
	    <p>"<a href="{{url('/') }}">Welcome to Pokhara Yoga and Retreat Center</a> which is for all the Yoga lovers looking to nurture their passion, build their career as well as for those looking for peace.
	    Led by some of the greatest yoga healers, we help you to become the best yoga teachers. We not only offer yogic practices, but also an understanding about the science behind yoga. 
	    We host life changing sessions, retreats
	    and workshops and have helped people heal and transform themselves. Pokhara Yoga And retreat center is one of the topmost yoga training schools that offers luxury
	    wellness journey in the most natural and peaceful environment."</p>
	@foreach($photoList as $list)
	<div class="col-lg-4">
	    <div class="box">
	      <a href="{{asset('uploads/galary/'.$list->image)}}" class="img-gal link-gallery" data-lightbox="roadtrip">
		<div class="single-imgs relative">
		  <div class="overlay overlay-bg"></div>
		     <div class="relative">
			<img class="img-fluid img-gallery modal-img pt-3" src="{{asset('uploads/galary/thumbnails/'.$list->image)}}" alt="Pokhara yoga School" >
		     </div>
		</div>
	      </a>
	<div class="photo-desc col-sm"><p>{{ $list->description }}</p></div>
	     </div>
	</div>
	@endforeach
	</div>
	</div>
</section>
			<!-- End gallery Area -->


@include('front.includes.footer')
