@section('title', "$information->meta_title")
@section('keyword', "$information->meta_keyword")
@section('desc', "$information->meta_des")




@section('page-css')
    <style type="text/css" media="screen">
        .page-banner {
            @if (is_null($information->image))
                background: url("https://pokharayogaschoolandretreatcenter.com/uploads/IMG20191103125404.jpg") center no-repeat;
            @else
                background: url({{ asset('uploads/' . $information->image) }}) center no-repeat;
            @endif
            background-size: cover;
            display: table;
            aspect-ratio: 6 / 2.5;
        }


        .faqs-body {
            padding: 0px;
        }
        
    </style>

    @include('front.includes.lite-youtube-style')

@endsection
@include('front.includes.header')






<div class="page-banner">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <!--<h1>{{ $information->title }}</h1>-->
                    <ul class="breadcrumb">
                        <li><a href="{{ action('Front\FrontController@index') }}">Home</a></li>
                        <li>{{ $information->title }}</li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="single-page-heading">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h1>{{$information->title}}</h1>
                </div>
            </div>
        </div>
    </div>
    --}}

<div class="about-body text-justify">
    <div class="container">



        <div class="row">

            <div class="col-12 col-sm-12  col-md-12 col-lg-12  single-page">
                @if ($information->name)
                    <h2> <strong>Name:</strong><span class="pr-1"> </span>{{ $information->name }}</h2>
                @else
                @endif
                <p>{!! $information->content !!}</p>


            </div>

        </div>

        @if ($faqs->isNotEmpty())
            <div class="row my-3">
                <div class="col-12 col-sm-12 text-center">
                    <h2>Frequently Asked Questions</h2>
                </div>
                @foreach ($faqs as $lists)
                    @foreach ($lists->faq_content as $list)
                        <div class="col-12 col-sm-12 col-sm-6 col-md-6">
                            <div class="accordion-container">
                                <div class="set">
                                    <a href="javascript:void(0)">
                                        {{ $list['question'] }}
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <div class="content" style="display: none;">
                                        <p>{!! $list['answer'] !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        @endif

    </div>
</div>

<div class="faqs-body">
  <div class="container">
    <div class="social-icons">
</div>
    <div class="row">


@if(is_null($information->mainPageDrop))
   @else
      @foreach($information->mainPageDrop as $drop)
      <div class="col-12 col-sm-12 col-sm-6 col-md-6">
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

      @endif




    </div>
  </div>
</div>


@section('page-js')
    @include('front.includes.lite-youtube-script')

@endsection

@include('front.includes.footer')
