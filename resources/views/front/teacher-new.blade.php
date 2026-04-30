@extends('front.layouts.main')
@push('seo-meta')
    <x-seo-meta title="Teacher Detail" />
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
                    <img src="{{ asset('uploads/ourTeam/thumbnails/' . $information->image) }}" alt="{{ $information->name }}"
                        class="img-fluid">
                    <ul>

                        @if ($information->facebook || $information->instagram || $information->youtube || $information->whatsapp)
                            <ul>
                                @if ($information->facebook)
                                    <li>
                                        <a href="{{ $information->facebook }}" target="_blank" rel="noopener noreferrer">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                @endif

                                @if ($information->instagram)
                                    <li>
                                        <a href="{{ $information->instagram }}" target="_blank" rel="noopener noreferrer">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                @endif

                                @if ($information->youtube)
                                    <li>
                                        <a href="{{ $information->youtube }}" target="_blank" rel="noopener noreferrer">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                @endif

                                @if ($information->whatsapp)
                                    <li>
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $information->whatsapp) }}"
                                            target="_blank" rel="noopener noreferrer">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        @endif
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
