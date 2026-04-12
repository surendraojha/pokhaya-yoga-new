@section('title', 'Nara Member')
@section('nara')
@endsection
@include('front.includes.header')



 
			<!-- start banner Area -->
	<div class="page-header mb-5" style="background: url({{asset('uploads/1912290857286b08376ed358de4d372981536c9ef361.jpg')}});background-repeat: no-repeat; background-size: cover; background-position: center;resize: both;     height: 400px;">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center  " style="padding-top: 200px; color: #fff">Nara Member</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header --><!-- .page-header -->
			<!-- End banner Area -->	

			<!-- Start feature Area -->
			
			<!-- End feature Area -->		

			<!-- Start info Area -->
			<div class="wrapper" style="background: #e9e9e9">
			<section class="info-area pb-5">
				<div class="container">
					<h4 class="py-3">Nara member:</h4>
					<div class="row align-items-center">
						<div class="col-lg-12 col-sm-12 no-padding info-area-left ">
							<style type="text/css">
								
								table th{
                    border-right: 1px solid #fff;
								}
								table td{
                    border-right: 1px solid #fff;
								}
							</style>
							{{-- table --}}
							<table class="table table-striped border-info" >
								<tr style="background: #29abe2; color: #fff" >
									<th >S.n</th>
									<th>Address</th>
									<th>Name of Company</th>
									<th>Managing Director</th>
									<th>Email</th>
									<th>Website</th>
								</tr>
								@php $sn =1; @endphp
								@foreach($naraMember as $list)
								<tr class="border-info">
									<td>{{$sn}}</td>
									<td>{{$list->address}}</td>
									<td>{{$list->name_of_company}} </td>
									<td>{{$list->M_d}} </td>
									<td>{{$list->email}}</td>
									<td><a href="https://{{$list->website}}" target="_blank" class="text-info"> {{$list->website}} </a> </td>
									
								</tr>
								@php $sn++ @endphp
								@endforeach





							</table>

							{{-- /table --}}





						</div>
						
					</div>
				</div>	
			</section>
		</div>
			<!-- End info Area -->	












@include('front.includes.footer')