@section("title", $blogUser->name)
@include('front.includes.header')



<!-- Start info Area -->
<div class="wrapper mt-5 pt-2">
<section class="info-area blog-auther-area py-5 ">
    <div class="container">
        <div class="row align-items-center blog-auther-area-content  pt-2">
            <div class="col-lg-5 col-md-5 col-12 info-area-left">
                <img src="{{asset('uploads/blog-users/'.$blogUser->image)}}" alt="{{ $blogUser->name }}">
                <div class="info-content">
                    <h2>{{ $blogUser->name }}</h2>
                    <h6>{{ $blogUser->position }}</h6>
                    <p>{{ $blogUser->year_of_experience }} Year of experience</p>
                    <a href="{{ $blogUser->social_media_url1 }}" target="blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-12 info-area-right">
                <h2 class="mt-1 text-uppercase">About {{ $blogUser->name }}</h2>
                <p class="text-justify">{!! $blogUser->about !!}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 blog-author-details">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="edu-tab" data-toggle="tab" href="#edu" role="tab" aria-controls="edu" aria-selected="true">Education</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="exp-tab" data-toggle="tab" href="#exp" role="tab" aria-controls="exp" aria-selected="false">Experience</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="edu" role="tabpanel" aria-labelledby="edu-tab">{!! $blogUser->education !!}</div>
                    <div class="tab-pane fade" id="exp" role="tabpanel" aria-labelledby="exp-tab">{!! $blogUser->experience !!}</div>
                    </div>
            </div>
        </div>
    </div>
</section>
<section class="user-related-blogs pt-2">
        <div class="container">
            <div class="row">
                <h3 class="py-2">Latest blogs by {{ $blogUser->name }}</h3>
                @foreach ($blogs as $blog)
                <div class="related-blog-details">
                    <div class="col-md-4 col-sm-6 col-12 related-blog-img p-0">
                        <img src="{{asset('uploads/blogs/'.$blog->image)}}" alt="{{ $blog->title }}">
                    </div>
                    <div class="col-md-8 col-sm-6 col-12 related-blog-content">
                        <h4 class="py-2">{{ $blog->title }}</h4>
                        <p>{{ strip_tags(str_limit($blog->content, 300)) }}</p>
                        <span><a href="{{action('Front\FrontController@singleBlog',$blog->slug)}}">Read More</a> | Published on : {{ $blog->created_at }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</section>
</div>




@include('front.includes.footer')
