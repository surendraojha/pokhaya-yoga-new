@extends('front.layouts.main')
@push('seo-meta')
    <x-seo-meta title="Teacher" />
@endpush

@section('content')

{{-- Page Banner --}}
<x-page-banner title="Teacher" />

{{-- Teacher Section --}}
<div class="teacher-section">
  <div class="container">
    <div class="row">

      <div class="col-12 col-sm-12">
        <h4>Our Yoga Teachers</h4>
      </div>

      @foreach ($information as $info)
      <div class="col-12 col-sm-6 col-md-4 col-lg-4">
        <div class="teacher-box">
          <img src="{{ asset('uploads/ourTeam/thumbnails/' . $info->image) }}" alt="{{ $info->name }}" class="img-fluid">
          <h5>
            <a href="{{ route('front.teacher-detail', $info->id) }}">
              {{ $info->name }}
            </a>
          </h5>
        </div>
      </div>
      @endforeach

      {{-- Pagination --}}
      @if ($information->hasPages())
      <div class="col-12 col-sm-12">
        <ul class="pagination">
          <li class="pagination-item {{ $information->onFirstPage() ? 'disabled' : '' }}">
            <a href="{{ $information->previousPageUrl() }}">Previous</a>
          </li>
          @for ($i = 1; $i <= $information->lastPage(); $i++)
          <li class="pagination-item {{ $information->currentPage() == $i ? 'pg-active' : '' }}">
            <a href="{{ $information->url($i) }}">{{ $i }}</a>
          </li>
          @endfor
          <li class="pagination-item {{ $information->currentPage() == $information->lastPage() ? 'disabled' : '' }}">
            <a href="{{ $information->nextPageUrl() }}">Next</a>
          </li>
        </ul>
      </div>
      @endif

    </div>
  </div>
</div>

@endsection
