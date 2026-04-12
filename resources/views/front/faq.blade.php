
@section("title", "$seoMeta->meta_title")
@section("keyword", "$seoMeta->meta_keyword")
@section("desc", "$seoMeta->meta_des")
@section("faqs")
@endsection
@include('front.includes.header')

<div class="page-banner">
  <div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <h1>FAQS</h1>
          <ul class="breadcrumb">
            <li><a href="{{action('Front\FrontController@index')}}">Home</a></li>
            <li>FAQS</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- faqs --}}


<div class="faqs-body">
  <div class="container">
    <div class="social-icons pb-2">
  @include('front.includes.social-media')
</div>
    <div class="row">
      <div class="col-12 col-sm-12">
        <h4>Frequently Asked Questions</h4>
      </div>


      @foreach($faqs as $lists)
      @foreach($lists->faq_content as $list)
      
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
  </div>
</div>













@include('front.includes.footer')
