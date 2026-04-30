@extends('front.layouts.main')

@section('content')
    @push('seo-meta')
        <x-seo-meta :title="$seoMeta->meta_title" :description="$seoMeta->meta_des" :keywords="$seoMeta->meta_keyword" />
    @endpush

    @push('page-css')
        <style type="text/css" media="screen">
            .page-banner {
                @if (is_null($banner->image))
                    background: url("https://pokharayogaschoolandretreatcenter.com/uploads/IMG20191103125404.jpg") center no-repeat;
                @else
                    background: url({{ asset('uploads/' . $banner->image) }}) center no-repeat;
                @endif
                background-size: cover;
            }
        </style>
    @endpush

    <!-- Page Banner -->
    <div class="page-banner">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="strokeme">
                            <h1>Sound Healing</h1>
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Sound Healing</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sound-section">
        <div class="container">

            @forelse ($soundHealings as $item)
                <div class="row sound-rows">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                        @if ($item->image)
                            <img src="{{ asset('uploads/' . $item->image) }}" alt="{{ $item->title }}">
                        @else
                            <img src="{{ asset('images/sound1.jpg') }}" alt="{{ $item->title }}">
                        @endif
                    </div>
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                        <h5>
                            <a href="{{ route('front.sound-healing.show', $item->id) }}">{{ $item->title }}</a>
                        </h5>
                        <ul>
                            @if ($item->location)
                                <li><i class="fa fa-map-marker-alt"></i> {{ $item->location }}</li>
                            @endif
                            @if ($item->date)
                                <li><i class="fa fa-calendar"></i> {{ $item->date }}</li>
                            @endif
                            @if ($item->tripe_room)
                                <li><i class="fa fa-users"></i> Triple Room: {{ $item->tripe_room }}</li>
                            @endif
                            @if ($item->shared_room)
                                <li><i class="fa fa-users"></i> Shared Room: {{ $item->shared_room }}</li>
                            @endif
                            @if ($item->private_room)
                                <li><i class="fa fa-user"></i> Private Room: {{ $item->private_room }}</li>
                            @endif
                        </ul>
                        <p>{{ Str::limit(strip_tags($item->content), 200) }}</p>
                        <a href="{{ route('front.sound-healing.show', $item->slug) }}" class="btn btn-view">
                            Load More <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="row">
                    <div class="col-12 text-center">
                        <p>No sound healing programs found.</p>
                    </div>
                </div>
            @endforelse

            <div class="col-12 col-sm-12">
                {{ $soundHealings->links() }}
            </div>

        </div>
    </div>

    @push('scripts')
        <script src="https://widgets.sociablekit.com/instagram-feed/widget.js" defer></script>
    @endpush
@endsection
