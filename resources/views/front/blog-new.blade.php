@extends('front.layouts.main')

@section('content')
{{-- Page Banner --}}
<div class="page-banner">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>Blog</h1>
                    <ul class="breadcrumb justify-content-center">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Blog Section --}}
<div class="news-section py-5">
    <div class="container">
        <div class="row">

            @foreach ($blogs as $blog)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">

                        {{-- Image --}}
                        <div class="card-banner">
                            <img class="banner-img w-100"
                                src="{{ $blog->image
                                        ? asset('uploads/blogs/thumbnails/' . $blog->image)
                                        : asset('images/default-blog.jpg') }}"
                                alt="{{ $blog->title }}">
                        </div>

                        {{-- Content --}}
                        <div class="card-body d-flex flex-column">

                            {{-- Title --}}
                            <h5 class="blog-title">
                                <a href="{{ route('blog.detail', $blog->slug) }}">
                                    {{ $blog->title }}
                                </a>
                            </h5>

                            {{-- Meta --}}
                            <ul class="list-inline text-muted small mb-2">
                                <li class="list-inline-item">
                                    <i class="fa fa-user"></i>
                                    {{ optional($blog->user)->name ?? 'Admin' }}
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-calendar"></i>
                                    {{ $blog->created_at->format('j M, Y') }}
                                </li>
                            </ul>

                            {{-- Excerpt --}}
                            <p class="flex-grow-1">
                                {{ Str::limit(strip_tags($blog->content), 120) }}
                            </p>

                            {{-- Read More --}}
                            <a href="{{ route('blog.detail', $blog->slug) }}"
                               class="btn btn-outline-primary mt-auto">
                                Read More →
                            </a>

                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Pagination --}}
            <div class="col-12 mt-4">
                <div class="d-flex justify-content-center">
                    {{ $blogs->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
