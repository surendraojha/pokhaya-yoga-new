
@section("title", "$information->meta_title")
@section("desc", "$information->des")
@section("keyword", "$information->keyword")




 @section("singlepage")
  @endsection
@include('front.includes.header')

<div class="page-banner">
  <div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <h1>{{$information->title}}</h1>
          <ul class="breadcrumb">
            <li><a href="{{action('Front\FrontController@index')}}">Home</a></li>
            <li>{{$information->title}}</li>


          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

 <div class="about-body text-justify">
  <div class="container">



    <div class="row">

      <div class="col-12 col-sm-12  col-md-12 col-lg-12  single-page">

        <p>{!!  $information->content !!}</p>


      </div>

{{--
   <div class="col-sm-4">
    <div class="card py-2 px-2">
    <h3 class="py-2" style="color: #026B2F">Service Hightlight</h3>
    <p> <div class="fb-page" data-href="https://www.facebook.com/pokharayogaschool/" data-tabs="timeline" data-width="" data-height="320px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/pokharayogaschool/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/pokharayogaschool/">Pokhra Yoga School</a></blockquote></div></p>
  </div>

   </div>
   
   --}}

    </div>
  </div>
</div>

<style type="text/css">

.faqs-body{
 padding: 0px;
}
</style>


<div class="faqs-body">
  <div class="container">
    <div class="social-icons">
</div>
@if(is_null($categories))
   @else
   @foreach($categories as $category)
   <h3 class="pb-2 curriculam">{{ $category->name }}</h3>
    <div class="row">
      <div class="col-12 col-sm-12">

      </div>



      @foreach($category->curriculamList as $drop)
      <div class="col-12 col-sm-12 col-sm-6 col-md-6 pb-3">
        <div class="accordion-container">
          <div class="set">
            <a href="javascript:void(0)">
              {{ $drop->title }}
              <i class="fa fa-plus"></i>
            </a>
            <div class="content" style="display: none;">
                <p>{!! $drop->content !!}</p>
            </div>
          </div>



        </div>
      </div>
      @endforeach





    </div>
    @endforeach

      @endif
  </div>
</div>





@include('front.includes.footer')
