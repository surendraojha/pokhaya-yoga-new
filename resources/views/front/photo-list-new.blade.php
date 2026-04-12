@extends('front.layouts.main')
@push('seo-meta')
    <x-seo-meta :title="$seoMeta->meta_title" :keyword="$seoMeta->meta_keyword" :description="$seoMeta->meta_des" />
@endpush

@section('content')

{{-- Page Banner --}}
<x-page-banner title="Gallery" />

{{-- Gallery Section --}}
<div class="gallery-section gallery-page">
  <div class="container">


    <div class="portfolio-item row">

      @foreach($photoList as $list)
      <div class="item selfie col-12 col-sm-12 col-md-6 col-lg-3">
        <a href="{{ asset('uploads/galary/' . $list->image) }}" class="fancylight popup-btn" data-fancybox-group="light">
          <figure>
            <img class="img-fluid" src="{{ asset('uploads/galary/thumbnails/' . $list->image) }}" alt="Pokhara Yoga School">
          </figure>
          <h5>{{ $list->description }}</h5>
        </a>
      </div>
      @endforeach

    </div>

  </div>
</div>

@endsection
