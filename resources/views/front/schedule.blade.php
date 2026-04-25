@extends('front.layouts.main')

@push('seo-meta')
    <x-seo-meta title="Daily Schedule" />
@endpush

@section('content')
    <x-page-banner :image="asset('/uploads/' . @$banner->image)" title="Daily Schedule" />

    <div class="schedule-sections">
        <div class="container">
            <div class="row">
                @foreach ($scheduleEntries as $item)
                    <div class="col-12 col-sm-12">
                        <h2>One Week Schedule {{ $item?->yogaClass?->title }}</h2>

                        <div class="date-range">{{ $item->title }}</div>
                        <div class="date-range">{{ $item->subtitle }}</div>

                        <div class="schedule-day mb-3">
                            <div class="schedule-entry mb-3">

                                {!! $item->content !!}
                            </div>
                        </div>

                    </div>
                @endforeach

                {{ $scheduleEntries->links() }}
            </div>
        </div>
    </div>
@endsection
