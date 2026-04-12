@section('title', "$seoMeta->meta_title")
@section('keyword', "$seoMeta->meta_keyword")
@section('desc', "$seoMeta->meta_des")


@section('page-css')
    @if (is_null($banner->image))
        <link rel="preload" href="{{ asset('https://pokharayogaschoolandretreatcenter.com/uploads/IMG20191103125404.jpg') }}"
            as="image">
    @else
        <link rel="preload" href="{{ asset('uploads/' . $banner->image) }}" as="image">
    @endif


    <style type="text/css" media="screen">
        .page-banner {
            @if (is_null($banner->image))
                background: url("https://pokharayogaschoolandretreatcenter.com/uploads/IMG20191103125404.jpg") center no-repeat;
            @else
                background: url({{ asset('uploads/' . $banner->image) }}) center no-repeat;
            @endif
            background-size: cover;
            display: table;
            aspect-ratio: 6 / 2.5;
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
                    <h1>Blogs</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ action('Front\FrontController@index') }}">Home</a></li>
                        <li>Blogs</li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about-body text-justify">
    <div class="teaching-section bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h3>Our Blogs</h3>
                </div>
                @foreach ($blogs as $blog)
                    @php
                        $blogUser = \App\BlogUsers::where('id', $blog->blog_user_id)->first();
                    @endphp
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                        @if (!$blog->image == '')
                            <img src="{{ asset('uploads/blogs/thumbnails/' . $blog->image) }}" alt="Yoga school in nepal">
                        @else
                        @endif

                        <div class="teach-box">
                            <h4>{{ $blog->title }}</h4>
                            <ul>
                                @if ($blogUser)
                                    <li><i class="fa fa-user"></i> by <a
                                            href="{{ route('blog.author', Str::slug($blogUser->name)) }}">{{ $blogUser->name }}</a>
                                    </li>
                                @else
                                    <li><i class="fa fa-user"></i> by <a href="#">Admin</a></li>
                                @endif
                                <li><i class="fa fa-calendar"></i>{{ $blog->created_at->format('j M, Y') }}</li>
                            </ul>
                            <p>{{ strip_tags(str_limit($blog->content, 200)) }}</p>
                            <a href="{{ action('Front\FrontController@singleBlog', $blog->slug) }}"
                                class="btn btn-read">Read More <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                @endforeach

            </div>
            {{ $blogs->links() }}
        </div>
    </div>
</div>
@include('front.includes.footer')
