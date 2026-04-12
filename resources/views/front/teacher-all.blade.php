{{-- @section("title", "$information->meta_title")
@section("keyword", "$information->meta_keyword")
@section("desc", "$information->meta_des") --}}



 @section("singlepage")
  @endsection
@include('front.includes.header')

<div class="page-banner">
  <div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <h1>All Teachers</h1>
          <ul class="breadcrumb">
            {{-- <li><a href="{{action('Front\FrontController@index')}}">Home</a></li>
            <li>{{$information->name}}</li> --}}


          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

 <div class="about-body text-justify">
  <div class="container">

 
    <div class="row border border-5" style="margin-bottom:10px;">
        <div class="col-12 col-sm-12  col-md-8 col-lg-8  single-page">
            @foreach ($information as $info)
              <div class="teacher-detail">
                <h> <strong>Name:</strong><span class="pr-1"> </span>{{$info->name}}</h2>
                <p>{!!  $info->content !!}</p>
                <div class="row">
                    <div class="col-sm-7">
                     <img src="{{ asset('uploads/ourTeam/thumbnails/'.$info->image) }}" alt="{{ $info->name }}" class="img-fluid">
                    </div>
                </div>
              </div>
            @endforeach
        </div>
      <div class="col-sm-4 mt-2">
        <div class="card py-2 px-2" style="overflow: hidden">
            <h3 class="py-2" style="color: #026B2F">Service Hightlight</h3>
            <p> <div class="fb-page" data-href="https://www.facebook.com/pokharayogaschool/" data-tabs="timeline" data-width="" data-height="320px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/pokharayogaschool/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/pokharayogaschool/">Pokhra Yoga School</a></blockquote></div></p>
        </div>
       </div>
    </div>

  </div>
</div>

<style type="text/css">

.faqs-body{
 padding: 0px;
}
</style>







@include('front.includes.footer')
