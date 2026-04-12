@include('front.includes.header')

<section id="privacy" class="privacyPolicy">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="policy col">
		        <div class="page-header-image mb-5 ">
                    <h1>{{ $information->title }}</h1>
                    <p>{!!  $information->content !!}</p>
            </div>
        </div>
    </div>
    </div>
</section>


@include('front.includes.footer')
