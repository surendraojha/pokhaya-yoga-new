@section('title', 'Our Team')
@section('ourteam')
@endsection

@include('front.includes.header')



 
			<!-- start banner Area -->
		<div class="page-header mb-5" style="background: url({{asset('uploads/1912290857286b08376ed358de4d372981536c9ef361.jpg')}});background-repeat: no-repeat; background-size: cover; background-position: center;resize: both;     height: 400px;">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center  " style="padding-top: 200px; ">Our Team / Member</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header --><!-- .page-header -->
			<!-- End banner Area -->	

			<!-- Start feature Area -->
			
<div class="container-fluid " style="padding: 20px 0px; ">

    <div class="container py-5">
        

    

        

       


        <div class="row">
            @foreach($lists as $list)



            <div class="col-sm-3">
                <div class="card ">
                    <div class="card-header img-thumbnail">
                        <img src="{{asset('uploads/'.$list->image)}}" class="w-100 img-fluid" style="height: 200px; ">
                    </div>

                    <div class="card-body">
                        <ul class="list-group" style="font-size: 14px">
                            <li><strong>Name: </strong> {{$list->name}}</li>
                            <li><strong>Desg: </strong> {{$list->desg}}</li>
                            <li><strong>Address: </strong> {{$list->address}}</li>
                            <li><strong>Contact: </strong> {{$list->contact}}</li>
                        </ul>



                    </div>


                </div>

            </div>
            @endforeach
            





        </div>
        

    </div>


</div>

</div>









@include('front.includes.footer')
