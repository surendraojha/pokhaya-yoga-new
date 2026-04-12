@extends('theme.master')
@section('title', "Our Team")
@section('content')
@include('admin.message')
  <!-- main wrapper -->
  <section id="blog-home" class="blog-home-main-block">
    <div class="container">
        <h1 class="blog-home-heading text-white">Our Team</h1>
    </div>
  </section>
  <section id="policy-block" class="privacy-policy-block">
    <div class="container">
      <div class="panel-setting-main-block">
        <div >
          <div class="row">

                    @foreach($informations as $value)

                    <div class="col-md-4">

                        <div class="panel-setting">
                            <img style="height: 153px;"
                                    src="{{ asset('surendra_uploads/'.$value->photo) }}"
                                    alt="blog">

                                <h5 class="testimonial-heading">{{ $value->name }}</h5>
                                <p >

                                    {{ $value->short_desc }}
                                                             </p>












                            <a target="_blank"
                                href="{{ route('ourteam.show',$value->id) }}">Read More</a>
                        </div>





                    </div>


                    @endforeach


                </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end main wrapper -->
@endsection
