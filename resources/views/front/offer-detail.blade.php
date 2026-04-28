@extends('front.layouts.main')

@push('seo-meta')
    <x-seo-meta title="{{ $offer->title }} - Offer" />
@endpush

@section('content')
    {{-- Hero Section --}}
    <section class="hero">
        <div class="hero-content">
            @php
                $discount = (int) ($offer->discount ?? 0);
                $price = (float) ($offer->price ?? 0);
                $savings = round($price * ($discount / 100), 2);
                $heroStats = is_array($offer->hero_stats ?? null) ? $offer->hero_stats : [];
                $heroStats = array_values(array_filter($heroStats, function ($stat) {
                    return !empty($stat['big_text']) || !empty($stat['small_text']);
                }));
            @endphp

            <span class="hero-badge">
                @if ($discount > 0)
                    LIMITED TIME - {{ $discount }}% OFF
                @else
                    SPECIAL OFFER
                @endif
            </span>
            <h1>{{ $offer->hero_title ?: $offer->title }}</h1>

            @if ($offer->hero_description)
                <p>{!! Str::limit(strip_tags($offer->hero_description), 300, '...') !!}</p>
            @else
                <p>Experience the transformative power of yoga with our specialized programs.</p>
            @endif

            <div class="hero-stats">
                @if (count($heroStats) > 0)
                    @foreach ($heroStats as $stat)
                        <div class="stat-item">
                            <div class="stat-number">{{ $stat['big_text'] ?? '' }}</div>
                            <div class="stat-label">{{ $stat['small_text'] ?? '' }}</div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    {{-- Offer Timer Section --}}
    @if ($offer->end_date)
        <section class="offer-timer">
            <div class="timer-header">
                <h2>⏰ Special Offer Ends In:</h2>
            </div>
            <div class="countdown">
                <div class="countdown-item">
                    <span class="countdown-number" id="days">00</span>
                    <span class="countdown-label">Days</span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-number" id="hours">00</span>
                    <span class="countdown-label">Hours</span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-number" id="minutes">00</span>
                    <span class="countdown-label">Minutes</span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-number" id="seconds">00</span>
                    <span class="countdown-label">Seconds</span>
                </div>
            </div>
        </section>
    @endif

    {{-- Offer Details Section --}}
    <section class="course-details">
        <div class="course-grid">
            <div class="course-info">
                <h2 class="section-title">{{ $offer->title }}</h2>
                <p class="course-description">
                    {!! $offer->content ?? 'Experience the transformative power of yoga with our carefully crafted program.' !!}
                </p>

                {{-- Features List --}}
                @if ($offer->features_list && count($offer->features_list) > 0)
                    <ul class="features-list" style="margin-top: 2rem;">
                        @foreach ($offer->features_list as $feature)
                            <li>
                                @if (isset($feature['icon']))
                                    <i class="{{ $feature['icon'] }}"></i>
                                @else
                                    <i class="fas fa-check-circle"></i>
                                @endif
                                {{ $feature['text'] ?? '' }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="course-image">
                @if ($offer->image)
                    <img src="{{ asset('uploads/offers/' . $offer->image) }}" alt="{{ $offer->title }}">
                @else
                    <div
                        style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 400px; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-size: 18px; font-weight: bold;">
                        {{ $offer->title }}
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Price Section --}}
    <section class="price-section">
        <div class="price-badge">
            @if ($discount > 0)
                SAVE {{ $discount }}% TODAY!
            @else
                SPECIAL PRICE
            @endif
        </div>
        <h2 style="color: #000; margin-bottom: 1rem;">Investment in Your Well-being</h2>

        <div class="price-container">
            @if ($discount > 0)
                <span class="original-price">NPR {{ number_format($price, 2) }}</span>
            @endif
            <span class="current-price">NPR {{ number_format($price - $savings, 2) }}</span>
        </div>

        @if ($discount > 0)
            <div class="savings">You Save NPR {{ number_format($savings, 2) }}!</div>
        @endif

        <p style="margin-top: 1.5rem; color: #666;">
            @if ($offer->end_date)
                Valid until {{ $offer->end_date->format('d F, Y') }}
            @else
                Limited time offer
            @endif
        </p>
    </section>

    {{-- What You'll Learn Section --}}
    @if ($offer->learn_items && count($offer->learn_items) > 0)
        <section class="learn-section">
            <div class="learn-container">
                <h2 class="section-title" style="text-align: center;">What You'll Master</h2>
                <div class="learn-grid">
                    @foreach ($offer->learn_items as $item)
                        <div class="learn-card">
                            @if (isset($item['icon']))
                                <div class="learn-icon">
                                    <i class="{{ $item['icon'] }}"></i>
                                </div>
                            @endif
                            <h3>{{ $item['title'] ?? '' }}</h3>
                            <p>{{ $item['description'] ?? '' }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- CTA Section --}}
    <div class="cta-container">
        <a href="tel:9801111111" class="cta-button">
            <i class="fas fa-phone"></i> Call Now to Reserve Your Spot - $149
        </a>
    </div>

@endsection

@push('scripts')
    <script>
        // Countdown Timer
        function startCountdown() {
            const endDateStr = '{{ $offer->end_date }}';
            if (!endDateStr) return;

            const endDate = new Date(endDateStr).getTime();

            function updateTimer() {
                const now = new Date().getTime();
                const distance = endDate - now;

                if (distance < 0) {
                    document.getElementById('days').textContent = '00';
                    document.getElementById('hours').textContent = '00';
                    document.getElementById('minutes').textContent = '00';
                    document.getElementById('seconds').textContent = '00';
                    document.querySelector('.timer-header h2').textContent = '⏰ Offer Expired';
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById('days').textContent = String(days).padStart(2, '0');
                document.getElementById('hours').textContent = String(hours).padStart(2, '0');
                document.getElementById('minutes').textContent = String(minutes).padStart(2, '0');
                document.getElementById('seconds').textContent = String(seconds).padStart(2, '0');
            }

            updateTimer();
            setInterval(updateTimer, 1000);
        }

        startCountdown();

        // Animate elements on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.learn-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    </script>
@endpush