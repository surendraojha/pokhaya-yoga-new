@section("title", "$list->title")
@section("keyword", "$list->meta_keyword")
@section("desc", "$list->meta_des")


@include('front.includes.header')

<style type="text/css" media="screen">
  .page-banner{
    @if(is_null($list->image))
  background: url("https://pokharayogaschoolandretreatcenter.com/uploads/IMG20191103125404.jpg") center no-repeat;
  @else
  background: url({{ asset('uploads/'.$list->image) }}) center no-repeat;
 @endif
  background-size: cover;
  display: table;
  width: 100%;
  height: 400px;
}
</style>





 
            <!-- start banner Area -->
        <div class="page-header mb-5" style="background: url({{asset('uploads/'.$list->image)}});background-repeat: no-repeat; background-size: cover; background-position: center;    height: 400px;">
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
              

                        <!-- about us -->

                       
                        <div class="row ">
                             <div class="col-sm-12">   
                        <p class="text-center text-justify about-us-title text-uppercase"><strong>{{$list->title}}</strong></p>

                        <p class="pt-2 px-5">{!! $list->content !!} </p>
                    </div>
                        </div>
                        

                        <!-- /about us -->

                        







                        </div>






                        <!-- /gallery -->
                        


















                    </div>
                    <!-- /sidebar-2 -->


                </div>
                





            </div>
            <!-- /wrapper -->

        


    </div>

    <!-- /about us -->
















@include('front.includes.footer')
