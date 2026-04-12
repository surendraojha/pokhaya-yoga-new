@section('title', 'News & Event')
@section('news')
@endsection
@include('front.includes.header')







 
            <!-- start banner Area -->
        <div class="page-header mb-5" style="background: url({{asset('uploads/191118062939banner4.jpg')}});background-repeat: no-repeat; background-size: cover;  background-position: center;  height: 400px;">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center  " style="padding-top: 200px; color: #fff">News & Events</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header --><!-- .page-header -->
            <!-- End banner Area -->    

            <!-- Start feature Area --><!-- .page-header --><!-- .page-header -->
			<!-- End banner Area -->	

			<!-- Start feature Area -->




<!-- about us event -->
    <div class="container-fluid">
        
            <!-- wrapper ---->
            <div class="wrapper">
                <div class="row py-5">
                    {{-- single post --}}
                    @foreach($notices as $list)
                    <div class="col-sm-4">
                        <div class="card border-0">
                            <div class="card-header bg-white border-0">
                                 <img src="{{ asset('uploads/'.$list->image) }}" alt="" class="img-fluid img-thumbnail " style="height: 200px; width: 100%;object-fit: cover;">
                           
                           
                             <a href="{{action('Front\FrontController@singlePost',$list->id)}}" class="pb-2news-titles ">
                                 <h5>{{$list->title}}</h5>
                             </a>
                                  </div>
                               

                             

                        </div>

                    </div>
                    @endforeach

                    {{-- /single post --}}

                </div>
                {{ $notices->links() }}


                </div>
                





            </div>
            <!-- /wrapper -->

        


















@include('front.includes.footer')
