@section('title', $list->title )
@section($list->title )
@endsection
@include('front.includes.header')







 
            <!-- start banner Area -->
        <div class="page-header mb-5" style="background: url({{asset('uploads/'.$list->image)}})no-repeat center center  ;background-repeat: no-repeat; background-size: cover; background-position: center;   height: 400px;">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center  " style="padding-top: 200px; color: #fff">{{$list->title}} </h1>
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
        
            <!-- wrapper -->
            <div class="wrapper">
                <div class="row px-5">

                    <div class="col-sm-12">   
                        <p class="text-center text-justify about-us-title text-uppercase"><strong>{{$list->title}}</strong></p>

                        <p class="pt-2 px-5">{!! $list->content !!} </p>
                    </div>
                  




                        <!-- /gallery -->
                        





                    </div>
                    <!-- /sidebar-2 -->


                </div>
                





            </div>
            <!-- /wrapper -->

        


    

    <!-- /about us -->
















@include('front.includes.footer')
