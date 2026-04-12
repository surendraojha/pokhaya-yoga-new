@extends('front.layouts.main')
@push('seo-meta')
    <x-seo-meta :title="$videoTestimonial->title"  />
@endpush

@section('content')

{{-- Page Banner --}}
<x-page-banner title="Video Testimonial Details" />

{{-- Video Testimonial Detail Section --}}
<div class="video-testi-details">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12">
        <iframe
          width="100%"
          height="500"
          src="{{ $videoTestimonial->url }}"
          title="{{ $videoTestimonial->title }}"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          referrerpolicy="strict-origin-when-cross-origin"
          allowfullscreen>
        </iframe>
        <h2>{{ $videoTestimonial->title }}</h2>
        <p>{!! $videoTestimonial->content !!}</p>
      </div>
    </div>
  </div>
</div>

@endsection
