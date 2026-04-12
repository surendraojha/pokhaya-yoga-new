    <div class="container">
        <!--<h3 class="text-center pt-3">Our Gallery</h3>-->
        <div class="row">
            @foreach ($photoList as $photo)
                <div class="col-sm-3 py-3">
                    <a href="{{ asset('uploads/galary/' . $photo->image) }}" class="img-gal link-gallery"
                        data-lightbox="roadtrip">
                        <div class="card photo-list">
                            <img width="250px" height="105px"
                                data-src="{{ asset('uploads/galary/thumbnails/' . $photo->image) }}"
                                alt="Pokhara yoga school" class="w-100 img-fluid lazy">
                        </div>
                    </a>

                </div>
            @endforeach
            <div class="col-12 col-sm-12">
                <a href="{{ action('Front\FrontController@photoList') }}" class="btn btn-testi">View More
                    Gallery
                    Items <i class="fa fa-angle-double-right"></i></a>
            </div>
        </div>
    </div>