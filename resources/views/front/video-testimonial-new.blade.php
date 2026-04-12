@extends('front.layouts.main')
@push('seo-meta')
    <x-seo-meta :title="$seoMeta->meta_title" :keyword="$seoMeta->meta_keyword" :description="$seoMeta->meta_des" />
@endpush

@section('content')

{{-- Page Banner --}}
<x-page-banner title="Video Testimonials" image="{{ asset('/uploads/' . $banner->image) }}" />

{{-- Video Testimonials Section --}}
@if (!$videoTestimonials->isEmpty())
<div class="video-testimonials-section">
  <div class="container">
    <div class="row">

      @foreach ($videoTestimonials as $testimonial)
      <div class="col-12 col-sm-6 col-md-6 col-lg-4">
        <div class="video-testi-box">
          <iframe
            width="100%"
            height="220"
            src="{{ $testimonial->url }}"
            title="{{ $testimonial->title }}"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin"
            allowfullscreen>
          </iframe>
          <h2>
            <a href="{{ route('front.video-testimonial-detail', $testimonial->title) }}">
              {{ $testimonial->title }}
            </a>
          </h2>
          <p>{!! strip_tags(substr($testimonial->content, 0, 100)) !!}</p>
          <a href="{{ route('front.video-testimonial-detail', $testimonial->title) }}" class="btn btn-reads">Read more</a>
        </div>
      </div>
      @endforeach


      {{$videoTestimonials->links()}}
      {{-- Pagination --}}
      {{-- @if ($videoTestimonials->hasPages())
      <div class="col-12 col-sm-12">
        <ul class="pagination">
          <li class="pagination-item {{ $videoTestimonials->onFirstPage() ? 'disabled' : '' }}">
            <a href="{{ $videoTestimonials->previousPageUrl() }}">Previous</a>
          </li>
          @for ($i = 1; $i <= $videoTestimonials->lastPage(); $i++)
          <li class="pagination-item {{ $videoTestimonials->currentPage() == $i ? 'pg-active' : '' }}">
            <a href="{{ $videoTestimonials->url($i) }}">{{ $i }}</a>
          </li>
          @endfor
          <li class="pagination-item {{ $videoTestimonials->currentPage() == $videoTestimonials->lastPage() ? 'disabled' : '' }}">
            <a href="{{ $videoTestimonials->nextPageUrl() }}">Next</a>
          </li>
        </ul>
      </div>
      @endif --}}

    </div>
  </div>
</div>
@endif

@endsection
