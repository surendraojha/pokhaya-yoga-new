@extends('front.layouts.main')

@section('content')

    @push('seo-meta')
        <x-seo-meta :title="$information->meta_title" :description="$information->des" :keywords="$information->keyword" />
    @endpush


    <x-page-banner :title="$information->title" />

    <div class="about-body text-justify">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12  col-md-12 col-lg-12  single-page">
                    <p>{!! $information->content !!}</p>
                </div>

            </div>
        </div>
    </div>

    <style type="text/css">
        .faqs-body {
            padding: 0px;
        }
    </style>


    <div class="faqs-body">
        <div class="container">
            <div class="social-icons">
            </div>
            @if (is_null($categories))
            @else
                @foreach ($categories as $category)
                    <h3 class="pb-2 curriculam">{{ $category->name }}</h3>
                    <div class="row">
                        <div class="col-12 col-sm-12">

                        </div>



                        @foreach ($category->curriculamList as $drop)
                            <div class="col-12 col-sm-12 col-sm-6 col-md-6 pb-3">
                                <div class="accordion-container">
                                    <div class="set">
                                        <a href="javascript:void(0)">
                                            {{ $drop->title }}
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <div class="content" style="display: none;">
                                            <p>{!! $drop->content !!}</p>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        @endforeach





                    </div>
                @endforeach
            @endif
        </div>
    </div>





@endsection
