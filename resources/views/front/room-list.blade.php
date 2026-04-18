@extends('front.layouts.main')

@push('seo-meta')
    <x-seo-meta title="Room List" />
@endpush

@section('content')
@if(!empty($banner->image))
    <x-page-banner 
        :image="asset('/uploads/' . $banner->image)" 
        title="Room List" 
    />
@endif
    <div class="room-list-section">
        <div class="container">
            <div class="row">
                @if ($informations->isNotEmpty())
                    @foreach ($informations as $room)
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                            <article class="room-card">
                                <div class="room-image">
                                    <a href="{{ route('front.room-detail', $room->id) }}">
                                        @php
                                            $featuredImage = $room->images->firstWhere('is_featured', true) ?? $room->images->first();
                                        @endphp
                                        <img src="{{ asset('uploads/' . ($featuredImage ? $featuredImage->image : 'placeholder.jpg')) }}" alt="{{ $room->title }}">
                                    </a>
                                    @if($room->badge)
                                        <span class="room-badge {{ strtolower(str_replace(' ', '-', $room->badge)) }}">{{ $room->badge }}</span>
                                    @endif
                                </div>
                                <div class="room-details">
                                    <h3><a href="{{ route('front.room-detail', $room->id) }}">{{ $room->title }}</a></h3>
                                    {!! Str::limit($room->description, 100) !!}
                                    <ul class="room-features">
                                        <li><i class="fas fa-bed"></i> {{ $room->bed_type }}</li>
                                        <li><i class="fas fa-users"></i> {{ $room->guests }} Guests</li>
                                        @if($room->size)
                                            <li><i class="fas fa-expand"></i> {{ $room->size }}</li>
                                        @endif
                                    </ul>
                                    <div class="room-footer">
                                        <div class="room-price">
                                            <span class="price-amount">${{ number_format($room->price, 2) }}</span>
                                            <span class="price-period">/ night</span>
                                        </div>
                                        <a href="{{ route('front.room-detail', $room->id) }}" class="btn btn-primary book-now-btn">View Details</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach

                    {{-- Pagination --}}
                    @if ($informations->hasPages())
                        <div class="col-12 col-sm-12">
                            <ul class="pagination">
                                <li class="pagination-item {{ $informations->onFirstPage() ? 'disabled' : '' }}">
                                    <a href="{{ $informations->previousPageUrl() }}">Previous</a>
                                </li>
                                @for ($i = 1; $i <= $informations->lastPage(); $i++)
                                    <li class="pagination-item {{ $informations->currentPage() == $i ? 'pg-active' : '' }}">
                                        <a href="{{ $informations->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="pagination-item {{ $informations->currentPage() == $informations->lastPage() ? 'disabled' : '' }}">
                                    <a href="{{ $informations->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                @else
                    <div class="col-12">
                        <p>No rooms available at the moment.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

