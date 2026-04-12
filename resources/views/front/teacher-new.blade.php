@extends('front.layouts.main')
@push('seo-meta')
    <x-seo-meta title="Teacher Detail"  />
@endpush

@section('content')

{{-- Page Banner --}}
<x-page-banner :title="$information->name" image="{{ asset('/uploads/ourTeam/' . $information->image) }}" />

{{-- Teacher Detail Section --}}
<div class="teacher-detail-section">
  <div class="container">
    <div class="row">

      {{-- Left: Image --}}
      <div class="col-12 col-sm-12 col-md-4 col-lg-4 teacher-left">
        <img src="{{ asset('uploads/ourTeam/thumbnails/' . $information->image) }}" alt="{{ $information->name }}" class="img-fluid">
        <ul>
          <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          <li><a href="#"><i class="fab fa-youtube"></i></a></li>
          <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
        </ul>
      </div>

      {{-- Right: Content --}}
      <div class="col-12 col-sm-12 col-md-8 col-lg-8 teacher-right">
        <h2>{{ $information->name }}</h2>
        <hr>
        <h3>Biography</h3>
        {!! $information->content !!}
      </div>

    </div>
  </div>
</div>

@endsection
