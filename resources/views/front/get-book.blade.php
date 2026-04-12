@include('front.includes.header')
<div class="home " style="height: 300px">
		<div class="background_image" style="background-image:url({{asset('front/images/about.jpg')}})"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_title pt-5" style="color: #FFA37B; font-size: 50px;">Book Room Now</div>
							<div class="booking_form_container">
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<div class="container py-5">
	
<div class="row">
	<div class="col-sm-12" style="margin: auto;">
		<div class="card pt-5 pb-5 px-5 ">

			<form action="{{action('Front\FrontController@postBook')}}" method="POST">
@if($errors->any())
            <div class = 'alert alert-danger'>
                <ul>
                    @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(\Session::has('msg'))
            <div class = 'alert alert-success'>
                <p>{{ \Session::get('msg') }}</p>
            </div></br>
            @endif 
				<div class="row">

					<div class="col-sm-6">
						<div class="form-group">
							<strong> <label> Check In </label></strong>
							<input type="text" name="check_in" class=" form-control" value="{{$checkIn}}" required="required">

						</div>

						<div class="form-group">
							<strong> <label> Children </label></strong>
							<input type="text" name="children" class=" form-control" value="{{$children}}" required="required">

						</div>

						<div class="form-group">
							<strong> <label> Room Type </label></strong>
							<select class="form-control" name="room_type"> 
								<option value="single bed">Family Room</option>
								<option value="double bed">Stander Room</option>
								<option value="single bed">Budget Room</option>
								

							 </select>

						</div>
						
						<div class="form-group">
							<strong> <label> Full Name </label></strong>
							<input type="text" name="name" class=" form-control"  required="required">

						</div>

<div class="form-group">
							<strong> <label> Email </label></strong>
							<input type="email" name="email" class=" form-control"  required="required">

						</div>

					 </div>
					<div class="col-sm-6">
						<div class="form-group">
							<strong> <label> Check Out </label></strong>
							<input type="text" name="check_out" class="form-control" value="{{$checkOut}}" required="required">

						</div>

						<div class="form-group">
							<strong> <label> Room </label></strong>
							<input type="text" name="room" class=" form-control" value="{{$room}}" required="required">

						</div>

						<div class="form-group">
							<strong> <label> Number </label></strong>
							<input type="number" name="number" class=" form-control"  required="required">

						</div>


						<div class="form-group">
							<strong> <label> Address </label></strong>
							<input type="text" name="address" class=" form-control"  required="required">

						</div>

@csrf
<div class="form-group mt-5">
<input type="submit" value="Book" class="btn btn-info form-control text-white" >

</div>

					</div>



				</div>



			</form>
			







		</div>
	</div>

</div>


</div>


@include('front.includes.footer')