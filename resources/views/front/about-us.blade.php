@section('title', "$seoMeta->meta_title")
@section('keyword', "$seoMeta->meta_keyword")
@section('desc', "$seoMeta->meta_des")
@include('front.includes.header')




<!-- start banner Area -->
@foreach ($aboutUs as $aboutus)
    <div class="page-header mb-5"
        style="background: url({{ asset('uploads/' . $aboutus->image) }}) no-repeat center center;background-repeat: no-repeat; background-size: cover; background-position: center;resize: both;    height: 500px;">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center  " style="padding-top: 200px; color: #fff">About Us</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div>
@endforeach
<!-- .page-header --><!-- .page-header -->
<!-- End banner Area -->

<!-- Start feature Area -->

<!-- End feature Area -->
@foreach ($aboutUs as $aboutus)
    <!-- Start info Area -->
    <div class="wrapper">
        <section class="info-area pb-5">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-11 info-area-right">
                        <h2 class="mt-5 text-uppercase">{{ $aboutus->title }}</h2>
                        <p class="text-justify">
                            {!! $aboutus->content !!}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- End info Area -->
@endforeach












@include('front.includes.footer')
