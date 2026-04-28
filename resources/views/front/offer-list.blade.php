@extends('front.layouts.main')

@push('seo-meta')
    <x-seo-meta title="Offer Lists" />
@endpush

@section('content')
    @if (!empty($banner->image))
        <x-page-banner
            :image="asset('/uploads/' . $banner->image)"
            title="Offer Lists"
        />
    @endif

    <div class="scholar-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    @if ($offers->isNotEmpty())
                        <div class="scholarship-cards">
                            @foreach ($offers as $offer)
                                @php
                                    $discount = (int) ($offer->discount ?? 0);
                                    $price = (float) ($offer->price ?? 0);
                                    $discountedPrice = $offer->discounted_price ?? round($price - (($price * $discount) / 100), 2);
                                @endphp

                                <div class="scholarship-card">
                                    <a href="{{ route('front.offer-detail', $offer->id) }}">
                                        @if ($offer->image)
                                            <img loading="lazy" src="{{ asset('uploads/offers/' . $offer->image) }}" alt="{{ $offer->title }}">
                                        @else
                                            <img loading="lazy" src="{{ asset('images/placeholder.jpg') }}" alt="{{ $offer->title }}">
                                        @endif
                                    </a>

                                    <div class="discount-badge">
                                        <span class="percent">{{ $discount }}%</span>
                                        <span class="off">OFF</span>
                                    </div>

                                    <div class="card-content">
                                        <h3 class="card-title"><a href="{{ route('front.offer-detail', $offer->id) }}">{{ $offer->title }}</a></h3>

                                        <a href="{{ route('front.offer-detail', $offer->id) }}" class="card-button">View More</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-info mb-0">
                            No offers available right now.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
