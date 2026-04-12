
@section("title", "$seoMeta->meta_title")
@section("keyword", "$seoMeta->meta_keyword")
@section("desc", "$seoMeta->meta_des")


 @section("courses")
  @endsection
@include('front.includes.header')

<style type="text/css" media="screen">
  .page-banner{
    @if(is_null($banner->image))
  background: url("https://pokharayogaschoolandretreatcenter.com/uploads/IMG20191103125404.jpg") center no-repeat;
  @else
  background: url({{ asset('uploads/'.$banner->image) }}) center no-repeat;
 @endif
  background-size: cover;
  display: table;
  width: 100%;
  height: 400px;
}
</style>


<div class="page-banner">
  <div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <h1>Our Courses</h1>
          <ul class="breadcrumb">
            <li><a href="{{action('Front\FrontController@index')}}">Home</a></li>
            <li>Our Courses</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

  {{-- popular Courses --}}
  @if ($popularCourses->isEmpty() == false)
  <div class="popular-course-section pt-4">
      <div class="container">
          <div class="row">

              @foreach ($popularCourses as $course)
                  <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                      <div class="pop-course-card">
                      <img width="250px" height="105px" class="lazy" data-src="{{asset('uploads/'.$course->image) }}"
                          alt="Yoga school courses in nepal">
                      <div class="teach-box">
                          <h4>{{ $course->title }}</h4>
                          <p>{{ str_limit(strip_tags($course->content), 100) }}</p>
                          <a href="{{ action('Front\FrontController@yogaClass', $course->slug) }}"
                              class="btn btn-read">Read More <i class="fa fa-angle-double-right"></i></a>
                      </div>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>

  </div>
@endif
{{-- popular course end --}}
{{--
 <div class="about-body text-justify">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12  col-md-8 col-lg-8  single-page">
        @if($information->name)
        <h2> <strong>Name:</strong><span class="pr-1"> </span>{{$information->name}}</h2>
        @else
        @endif
        <p>{!!  $information->content !!}</p>
      </div>
        <div class="col-sm-4">
            <div class="card py-2 px-2">
                <h3 class="py-2" style="color: #026B2F">See more</h3>
                <p> <div class="fb-page" data-href="https://www.facebook.com/pokharayogaschool/" data-tabs="timeline" data-width="" data-height="320px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/pokharayogaschool/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/pokharayogaschool/">Facebook: Pokhara Yoga School</a></blockquote></div></p>
            </div>
        </div>
    </div>
  </div>
</div> --}}

@include('front.includes.footer')
