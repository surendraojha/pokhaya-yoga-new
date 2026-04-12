@extends('front.layouts.main')

@section('content')
    {{-- Page Banner --}}

    @push('seo-meta')
        <x-seo-meta :title="$information->meta_title" :description="$information->meta_description" :keywords="$information->meta_keywords" />
    @endpush

        <x-page-banner :title="$information->title" :image="$information->image_url" />

    {{-- Blog Content --}}
    <div class="blog-sections py-5">
        <div class="container">
            <div class="row">

                {{-- LEFT SIDE --}}
                <div class="col-lg-12">

                    {{-- Title --}}
                    <h2 class="mb-3">{{ $information->title }}</h2>

                    {{-- Featured Image --}}
                    <img class="img-fluid mb-3"
                        src="{{ $information->image ? asset('uploads/blogs/' . $information->image) : asset('images/default-blog.jpg') }}"
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
                            <li class="list-inline-item"><a href="#"><i class="fa-brands fa-square-x-twitter"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>

                    </div>

                    {{-- Content --}}
                    <div class="blog-content">
                        {!! $information->content !!}
                    </div>

                </div>



            </div>
        </div>
    </div>
@endsection
