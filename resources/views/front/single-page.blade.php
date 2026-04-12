@extends('front.layouts.main')

@section('content')

{{-- Page Banner --}}
<div class="page-banner"
     style="background: url('{{ $information->image
        ? asset('uploads/blogs/'.$information->image)
        : asset('images/default-banner.jpg') }}') center/cover no-repeat;">

    <div class="overlay">
        <div class="container text-center">
            <h1>{{ $information->title }}</h1>

            <ul class="breadcrumb justify-content-center">
                <li><a href="{{ action('Front\FrontController@index') }}">Home</a></li>
                <li>{{ $information->title }}</li>
            </ul>
        </div>
    </div>
</div>

{{-- Blog Content --}}
<div class="blog-sections py-5">
    <div class="container">
        <div class="row">

            {{-- LEFT SIDE --}}
            <div class="col-lg-9">

                {{-- Title --}}
                <h2 class="mb-3">{{ $information->title }}</h2>

                {{-- Featured Image --}}
                <img class="img-fluid mb-3"
                     src="{{ $information->image
                        ? asset('uploads/blogs/'.$information->image)
                        : asset('images/default-blog.jpg') }}"
                     alt="{{ $information->title }}">

                {{-- Meta --}}
                <div class="d-flex justify-content-between flex-wrap mb-3">

                    <ul class="list-inline text-muted">
                        <li class="list-inline-item">
                            <i class="fa fa-user"></i>
                            {{ optional($information->user)->name ?? 'Admin' }}
                        </li>

                        <li class="list-inline-item">
                            <i class="fa fa-calendar"></i>
                            {{ $information->created_at->format('j M, Y') }}
                        </li>

                        <li class="list-inline-item">
                            <i class="fa fa-eye"></i>
                            {{ $information->views ?? 0 }} views
                        </li>
                    </ul>

                    {{-- Social --}}
                    <ul class="list-inline">
                        <li class="list-inline-item">Share:</li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa-brands fa-square-x-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>

                </div>

                {{-- Content --}}
                <div class="blog-content">
                    {!! $information->content !!}
                </div>

            </div>

            {{-- RIGHT SIDEBAR --}}
            <div class="col-lg-3">

                <aside>
                    <h4>Most Popular</h4>

                    <ul class="list-unstyled">

                        @foreach ($popularBlogs as $popular)
                            <li class="d-flex mb-3">

                                <img width="70"
                                     src="{{ $popular->image
                                        ? asset('uploads/blogs/thumbnails/'.$popular->image)
                                        : asset('images/default-blog.jpg') }}">

                                <div class="ms-2">
                                    <a href="{{ action('Front\FrontController@singleBlog', $popular->slug) }}">
                                        <h6 class="mb-1">{{ Str::limit($popular->title, 50) }}</h6>
                                    </a>
                                    <small>{{ $popular->created_at->format('j M, Y') }}</small>
                                </div>

                            </li>
                        @endforeach

                    </ul>
                </aside>

            </div>

        </div>
    </div>
</div>

@endsection
