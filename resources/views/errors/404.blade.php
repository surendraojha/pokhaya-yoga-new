@include('front.includes.header')

@section('title', __('Not Found'))
@section('code', '404')
<link href="{{ asset('landing/css/styles.css') }}" rel="stylesheet" type="text/css">


<div id="notfound" >
    <div class="notfound">
    <div class="notfound-404" >
    <h1>404</h1>
    <h2>Page not found</h2>
    </div>
    <a href="{{ url('/') }}">Homepage</a>
    </div>
    </div>

@include('front.includes.footer')





