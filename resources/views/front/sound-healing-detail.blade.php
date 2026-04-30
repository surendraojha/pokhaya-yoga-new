@extends('front.layouts.main')

@section('content')
    @push('seo-meta')
        <x-seo-meta :title="$seoMeta->meta_title" :description="$seoMeta->meta_des" :keywords="$seoMeta->meta_keyword" />
    @endpush

    @push('page-css')
        <style type="text/css" media="screen">
            .hero-sections {

                background: linear-gradient(135deg, rgba(107, 70, 193, 0.9), rgba(147, 51, 234, 0.9)),
                    url("{{ asset('uploads/' . $soundHealing->background_image) }}") center/cover;
            }
        </style>
    @endpush

    <!-- Hero Section -->
    <section class="hero-sections">
        <div class="hero-content">
            <div class="hero-text">
                <h1>{{ $soundHealing->title }}</h1>
                <p class="subtitle">{{ $soundHealing->location }}</p>
                <p>{!! $soundHealing->content !!}</p>
                <div class="hero-features">
                    @if ($soundHealing->date)
                        <div class="feature-item">
                            <i class="fas fa-calendar"></i>
                            <span>{{ $soundHealing->date }}</span>
                        </div>
                    @endif
                    @if ($soundHealing->tripe_room)
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Triple Room: {{ $soundHealing->tripe_room }}</span>
                        </div>
                    @endif
                    @if ($soundHealing->shared_room)
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Shared Room: {{ $soundHealing->shared_room }}</span>
                        </div>
                    @endif
                    @if ($soundHealing->private_room)
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Private Room: {{ $soundHealing->private_room }}</span>
                        </div>
                    @endif
                </div>
                <div style="display: flex; gap: 1rem;">
                    <a href="#what-to-expect" class="btn btn-primary">What to Expect</a>
                    <a href="#instructor" class="btn btn-secondary">Meet Your Guide</a>
                </div>
            </div>
            <div class="hero-image">
                @if ($soundHealing->image)
                    <img src="{{ asset('uploads/' . $soundHealing->image) }}" alt="{{ $soundHealing->title }}">
                @else
                    <img src="https://picsum.photos/seed/soundhealing/600/700" alt="{{ $soundHealing->title }}">
                @endif
            </div>
        </div>
    </section>

    <!-- What to Expect Section -->
    @if ($soundHealing->what_to_expect)
        <section class="what-to-expect" id="what-to-expect">
            <div class="container">
                <h2 class="section-title">
                    {{ $soundHealing->what_to_expect_title ?? 'What to Expect' }}
                </h2>
                @if ($soundHealing->what_to_expect_subtitle)
                    <p class="section-subtitle">{{ $soundHealing->what_to_expect_subtitle }}</p>
                @endif
                <div class="expect-grid">
                    @foreach (json_decode($soundHealing->what_to_expect, true) ?? [] as $index => $expect)
                        <div class="expect-card">
                            <div class="expect-number">{{ $index + 1 }}</div>
                            <h3>{{ $expect['title'] }}</h3>
                            <p>{{ $expect['description'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Instructor Section -->
    @if ($soundHealing->teacher)
        <section class="instructor" id="instructor">
            <div class="container">
                <h2 class="section-title">Meet Your Guide</h2>
                <div class="instructor-container">
                    <div class="instructor-image">
                        @if ($soundHealing->teacher->image)
                            <img src="{{ asset('uploads/ourTeam/thumbnails/' . $soundHealing->teacher->image) }}"
                                alt="{{ $soundHealing->teacher->name }}">
                        @else
                            <img src="https://picsum.photos/seed/instructor/400/500"
                                alt="{{ $soundHealing->teacher->name }}">
                        @endif
                        <div class="instructor-badge">
                            <h4>{{ $soundHealing->teacher->name }}</h4>
                            <p>Sound Healing Expert</p>
                        </div>
                    </div>
                    <div class="instructor-info">
                        <h3>{{ $soundHealing->teacher->name }}</h3>
                        @if ($soundHealing->teacher->description)
                            <p>{!! $soundHealing->teacher->description !!}</p>
                        @endif
                        <div class="instructor-stats">
                            @if ($soundHealing->student_taught)
                                <div class="stat-item">
                                    <div class="stat-number">{{ $soundHealing->student_taught }}</div>
                                    <div class="stat-label">Students Taught</div>
                                </div>
                            @endif
                            @if ($soundHealing->experience_year)
                                <div class="stat-item">
                                    <div class="stat-number">{{ $soundHealing->experience_year }}+</div>
                                    <div class="stat-label">Years Experience</div>
                                </div>
                            @endif
                            @if ($soundHealing->workshop_lead)
                                <div class="stat-item">
                                    <div class="stat-number">{{ $soundHealing->workshop_lead }}</div>
                                    <div class="stat-label">Workshops Led</div>
                                </div>
                            @endif
                        </div>
                        <a href="{{ url('teacher/' . $soundHealing->teacher->id) }}" class="btn btn-gradient">
                            Learn More About {{ $soundHealing->teacher->name }}
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif


    <!-- Schedule Section -->
    <section class="schedule" id="schedule">
        <div class="container">
            <h2 class="section-title">Upcoming Sessions</h2>
            <div class="schedule-grid">
                
                @foreach ($soundHealingSessions as $value)
                    <div class="schedule-card" data-time="morning">
                        <div class="schedule-header">
                            <div class="schedule-date">{{ date('D, M d', strtotime($value->date)) }} </div>
                            <div class="schedule-time">{{ $value->time }}</div>
                        </div>
                        <h3 class="schedule-title">{{ $value->title }}</h3>
                        <p class="schedule-instructor">with {{ $value->soundHealing->teacher->name }}</p>
                        <p class="schedule-description">{{ $value->description }}</p>
                        <div class="schedule-spots">
                            <span class="spots-left">{{ $value->spots_left }} spots left</span>
                            <a href="{{ url('student-register') }}" class="btn btn-gradient">Book</a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>


    <!-- FAQ Section -->
    <div class="faqs-section">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-1 col-lg-1"></div>
                    <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                        <h4>Frequently Asked Questions</h4>
                        <div class="accordion-container">
                            <div class="set">
                                <a href="javascript:void(0)">
                                    What is sound healing?
                                    <i class="fa fa-plus"></i>
                                </a>
                                <div class="content" style="display: none;">
                                    <p>Sound healing is a therapeutic practice that uses sound vibrations from instruments
                                        like crystal bowls, gongs, and chimes to promote physical, mental, and emotional
                                        well-being.</p>
                                </div>
                            </div>
                            <div class="set">
                                <a href="javascript:void(0)">
                                    Do I need prior experience?
                                    <i class="fa fa-plus"></i>
                                </a>
                                <div class="content" style="display: none;">
                                    <p>No prior experience is needed. Our sessions are open to all levels and backgrounds.
                                    </p>
                                </div>
                            </div>
                            <div class="set">
                                <a href="javascript:void(0)">
                                    What should I bring?
                                    <i class="fa fa-plus"></i>
                                </a>
                                <div class="content" style="display: none;">
                                    <p>We recommend comfortable clothing, a water bottle, and an open mind. All props and
                                        equipment are provided.</p>
                                </div>
                            </div>
                            <div class="set">
                                <a href="javascript:void(0)">
                                    How long is each session?
                                    <i class="fa fa-plus"></i>
                                </a>
                                <div class="content" style="display: none;">
                                    <p>Sessions typically run 75 minutes, with extended workshop options available on
                                        weekends.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-1 col-lg-1"></div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // FAQ Accordion
            document.querySelectorAll('.faqs-section .set > a').forEach(function(el) {
                el.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    const icon = this.querySelector('i');
                    const isOpen = content.style.display === 'block';

                    document.querySelectorAll('.faqs-section .content').forEach(c => c.style.display = 'none');
                    document.querySelectorAll('.faqs-section .set > a i').forEach(i => {
                        i.classList.replace('fa-minus', 'fa-plus');
                    });

                    if (!isOpen) {
                        content.style.display = 'block';
                        icon.classList.replace('fa-plus', 'fa-minus');
                    }
                });
            });
        </script>
    @endpush
@endsection
