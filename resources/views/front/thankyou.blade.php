@extends('front.layouts.main')
@section('content')
    @push('page-css')
        <style>
            .registration-msg {
                display: block;
                position: relative;
                top: 50%;
                margin: auto;
                text-align: center;
                color: #000000;
                background: #f0f8ff4f;
                padding: 10px;
                border-radius: 12px;
            }

            .registration-msg h1 {
                font-size: 24px;
            }

            .registration-msg h2 {
                font-size: 20px;
            }
        </style>
    @endpush
    <section id="thankyou" class="thankyou" style="margin-top: 3em;">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="image col">
                    <div class="registration-msg ">
                        @if (session('success'))
                            <div class="panel panel-default">
                                <div class="alert alert-success">{{ session('success') }}</div>
                                <a class="btn btn-success" href="{{ route('cyber.hosted.pay') }}">Pay here</a>
                            </div>
                        @else
                            <h1 class="text-center">Thank You For Contacting Us !</h1>
                            <h2 class="text-center"> For More Information , Visit Our Site !! </h2>
                        @endif
                    </div>
                    <div class="page-header-image mb-5 "
                        style="background: url('https://www.pokharayogaschoolandretreatcenter.com/uploads/20.05.14.01.27.20IMG-4679.JPG');background-repeat: no-repeat; background-size: cover; background-position: center;resize: both; height: 500px; color:#a8ce50;    text-align: center;padding-top: 20px;">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
