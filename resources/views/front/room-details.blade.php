@extends('front.layouts.main')

@push('seo-meta')
    <x-seo-meta title="{{ $room->title }}" />
@endpush

@section('content')

    <x-page-banner title="Room Details" />

    @if($room)
        <div class="room-details-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <section class="room-gallery">
                            <div class="main-image">
                                @php
                                    $featuredImage = $room->images->firstWhere('is_featured', true) ?? $room->images->first();
                                @endphp
                                <img id="main-room-image" src="{{ asset('uploads/' . ($featuredImage ? $featuredImage->image : 'placeholder.jpg')) }}" alt="{{ $room->title }}">
                            </div>
                            @if($room->images->count() > 1)
                                <div class="thumbnail-images">
                                    @foreach($room->images as $image)
                                        <img class="thumbnail {{ $image->is_featured ? 'active' : '' }}" src="{{ asset('uploads/' . $image->image) }}" alt="{{ $room->title }}" data-image="{{ asset('uploads/' . $image->image) }}">
                                    @endforeach
                                </div>
                            @endif
                        </section>

                        <div class="content-wrapper">
                            <!-- Room Details Section -->
                            <section class="room-details">
                                <header class="room-header">
                                    <h1>{{ $room->title }}</h1>
                                    <div class="room-highlights">
                                        @if($room->size)
                                            <span><i class="fas fa-expand"></i> {{ $room->size }}</span>
                                        @endif
                                        <span><i class="fas fa-bed"></i> {{ $room->bed_type }}</span>
                                        <span><i class="fas fa-users"></i> Sleeps {{ $room->guests }}</span>
                                    </div>
                                </header>

                                <div class="room-description">
                                    <h2>Room Information</h2>
                                    {!! $room->description !!}
                                    @if($room->detailed_description)
                                        {!! $room->detailed_description !!}
                                    @endif
                                </div>

                                @if($room->amenities->isNotEmpty())
                                    <section class="room-amenities">
                                        <h2>Amenities</h2>
                                        <ul>
                                            @foreach($room->amenities as $amenity)
                                               <li> {!! $amenity->icon !!}{{ $amenity->title }}</li>
                                            @endforeach
                                        </ul>
                                    </section>
                                @endif

                                <section class="room-policies">
                                    <h2>Hotel Policies</h2>
                                    <div class="policy-item">
                                        <h3>Check-in / Check-out</h3>
                                        <p>Check-in: 3:00 PM - 11:00 PM<br>Check-out: 11:00 AM</p>
                                    </div>
                                    <div class="policy-item">
                                        <h3>Cancellation</h3>
                                        <p>Free cancellation up to 48 hours before check-in. After that, the first night is non-refundable.</p>
                                    </div>
                                </section>
                            </section>

                            <!-- Booking Card Section (Aside) -->
                            <aside class="booking-card">
                                <div class="price-summary">
                                    <span class="price-per-night">${{ number_format($room->price, 2) }}</span>
                                    <span class="price-label">per night</span>
                                </div>
                                <form class="booking-form" action="{{ route('post-book') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="room" value="{{ $room->id }}">
                                    <input type="hidden" name="room_type" value="share">
                                    <div class="form-group">
                                        <label for="check-in">Check-in</label>
                                        <input type="date" id="check-in" name="check_in" value="{{ old('check_in') }}" required>
                                        @error('check_in')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="check-out">Check-out</label>
                                        <input type="date" id="check-out" name="check_out" value="{{ old('check_out') }}" required>
                                        @error('check_out')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="children">Guests</label>
                                        <select id="children" name="children" required>
                                            <option value="">Select number of guests</option>
                                            @for ($i = 1; $i <= $room->guests + 2; $i++)
                                                <option value="{{ $i }}" {{ old('children', $room->guests) == $i ? 'selected' : '' }}>{{ $i }} Guest{{ $i > 1 ? 's' : '' }}</option>
                                            @endfor
                                        </select>
                                        @error('children')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" name="name" value="{{ old('name', auth('customer')->user()->name ?? '') }}" required>
                                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" value="{{ old('email', auth('customer')->user()->email ?? '') }}" required>
                                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="number">Phone</label>
                                        <input type="tel" id="number" name="number" value="{{ old('number', auth('customer')->user()->phone ?? '') }}" required>
                                        @error('number')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" id="address" name="address" value="{{ old('address', auth('customer')->user()->address ?? '') }}" required>
                                        @error('address')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <input type="hidden" name="actual_price" id="actual_price" value="{{ $room->price }}">
                                    <button type="submit" class="btn-book-now">Reserve Now</button>
                                </form>
                                <p class="booking-note">You won't be charged yet</p>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>Room not found.</p>
                </div>
            </div>
        </div>
    @endif

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainImage = document.getElementById('main-room-image');
            const thumbnails = document.querySelectorAll('.thumbnail');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    const newImageSrc = this.getAttribute('data-image');
                    mainImage.setAttribute('src', newImageSrc);

                    thumbnails.forEach(thumb => thumb.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
@endpush

@endsection
