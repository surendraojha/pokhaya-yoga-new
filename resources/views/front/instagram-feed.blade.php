@extends('front.layouts.main')


@section('content')








{{-- ══════════════════════════════════════
TESTIMONIALS
══════════════════════════════════════ --}}
<div class="testimonials">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12">
                <h4>Pokhara Yoga</h4>
            </div>


            <div class="sk-instagram-feed" data-embed-id="25675868"></div>

        </div>
    </div>
</div>




@push('scripts')
<!-- Elfsight Google Reviews | Untitled Google Reviews -->
{{-- <script src="https://elfsightcdn.com/platform.js" async></script> --}}
<script src="https://widgets.sociablekit.com/instagram-feed/widget.js" defer></script>

@endpush

@endsection
