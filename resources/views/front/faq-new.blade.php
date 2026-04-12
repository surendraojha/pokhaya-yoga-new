@extends('front.layouts.main')
@push('seo-meta')
    <x-seo-meta :title="$seoMeta->meta_title" :keyword="$seoMeta->meta_keyword" :description="$seoMeta->meta_des" />
@endpush

@section('content')
    <x-page-banner title="FAQS" />

    {{-- FAQs Section --}}
    <div class="faqs-section">
        <div class="container">

            {{-- <div class="social-icons pb-2">
                @include('front.includes.social-media')
            </div> --}}

            <div class="row">
                <div class="col-12 col-sm-12 col-md-1 col-lg-1"></div>

                <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                    <div class="accordion-container">

                        @foreach ($faqs as $lists)
                            @foreach ($lists->faq_content as $list)
                                <div class="set">
                                    <a href="javascript:void(0)">
                                        {{ $list['question'] }}
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <div class="content" style="display: none;">
                                        <p>{!! $list['answer'] !!}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach

                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-1 col-lg-1"></div>
            </div>

        </div>
    </div>
@endsection
