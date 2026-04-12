@extends('front.layouts.main')

@push('seo-meta')
    <x-seo-meta title="Testimonials" />
@endpush

@section('content')

    <x-page-banner title="Testimonials" :image="asset('/uploads/' . $banner->image)" />

    {{-- Testimonials Section --}}
    @if (!$testimonials->isEmpty())
        <div class="testimonial-section">
            <div class="container">
                <div class="row">

                    @foreach ($testimonials as $test)
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                            <div class="testimonial-box">
                                <img class="lazy" src="{{ asset('uploads/testimonials/thumbnails/' . $test->image) }}"
                                    alt="Yoga school in Nepal">
                                <h2><i class="fa-solid fa-quote-left"></i> {{ $test->name }}</h2>
                                <div class="read-more-container">
                                    <div class="text-box">
                                        <p>{!! $test->content !!}</p>
                                    </div>
                                    @if (strlen(strip_tags($test->content)) > 300)
                                        <button class="read-more-btn">Read More</button>
                                    @endif
                                </div>
                                <p><strong>Thank you!</strong></p>
                            </div>
                        </div>
                    @endforeach

                    {{-- Pagination --}}
                    @if ($testimonials->hasPages())
                        <div class="col-12 col-sm-12">
                            <ul class="pagination">
                                <li class="pagination-item {{ $testimonials->onFirstPage() ? 'disabled' : '' }}">
                                    <a href="{{ $testimonials->previousPageUrl() }}">Previous</a>
                                </li>
                                @for ($i = 1; $i <= $testimonials->lastPage(); $i++)
                                    <li class="pagination-item {{ $testimonials->currentPage() == $i ? 'pg-active' : '' }}">
                                        <a href="{{ $testimonials->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li
                                    class="pagination-item {{ $testimonials->currentPage() == $testimonials->lastPage() ? 'disabled' : '' }}">
                                    <a href="{{ $testimonials->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    @endif

    {{-- Read More JS (from new UI) --}}
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const readMoreButtons = document.querySelectorAll('.read-more-btn');

                readMoreButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const container = this.closest('.read-more-container');
                        container.classList.toggle('show');

                        if (container.classList.contains('show')) {
                            this.textContent = 'Read Less';
                            this.setAttribute('aria-expanded', 'true');
                        } else {
                            this.textContent = 'Read More';
                            this.setAttribute('aria-expanded', 'false');
                        }
                    });
                });
            });
        </script>
    @endpush

@endsection
