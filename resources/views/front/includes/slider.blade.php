<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @php $c = 1; @endphp
            @foreach ($sliders as $slider)
                <li data-target="#carouselExampleCaptions" data-slide-to="{{ $c }}"
                    class="@if ($c == 1) active @else @endif"></li>
                @php $c++; @endphp
            @endforeach
        </ol>
        <div class="carousel-inner">
            @php $c = 1; @endphp
            @foreach ($sliders as $slider)
                <div class="carousel-item @if ($c == 1) active @endif">
                    <img src="{{ asset('uploads/' . $slider->image) }}"

                            class="d-block w-100 delayed-slide-img" alt="Yoga school in nepal"

                            @if($c == 1) differ @endif
                            >

                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $slider->title }} </h5>
                        <p>{!! $slider->content !!}</p>
                    </div>
                </div>
                @php $c++; @endphp
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
