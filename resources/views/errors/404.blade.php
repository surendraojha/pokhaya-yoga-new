@extends('front.layouts.main')

@section('code', '404')

@section('content')

@push('seo-meta')
    <title> {{__('Not Found')}}</title>
@endpush
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>404</h1>
                <h2>Page not found</h2>
            </div>
            <a href="{{ url('/') }}">Homepage</a>
        </div>
    </div>
@endsection
