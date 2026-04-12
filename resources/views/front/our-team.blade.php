@section('title', 'Our Team')
@section('ourteam')
@endsection
@include('front.includes.header')




			<!-- start banner Area -->
		<div class="page-header mb-5" style="background: url({{asset('uploads/1912290857286b08376ed358de4d372981536c9ef361.jpg')}});background-repeat: no-repeat; background-size: cover; background-position: center;resize: both;     height: 400px;">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center  " style="padding-top: 200px; color: #fff">Our Team / Member</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header --><!-- .page-header -->
			<!-- End banner Area -->

			<!-- Start feature Area -->

<div class="container-fluid ">

    <div class="container py-5">
        @php $c = 1;
        @endphp
        @foreach($categories as $category)
        <a href="{{action('Front\FrontController@ourTeamList',$category->id)}}" class="text-white mr-5 mb-5 btn @if($c & 1) btn-danger @else() btn-info @endif" style="border:none;">{{$category->name}}</a>

        @php $c++ @endphp
        @endforeach

        @foreach($categories as $category)






        <div class="row">



 @foreach($category->ourTeam as $list)
             <div class="col-sm-3 ">
                <div class="card">
                    <div class="card-header">
                        <img src="{{asset('uploads/'.$list->image)}}" class="img-fluid" style="height: 200px; width: 100%">
                    </div>

                    <div class="card-body">
                        <ul class="list-inline" style="font-size: 14px">
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

            @endforeach


    </div>


</div>

</div>









@include('front.includes.footer')
