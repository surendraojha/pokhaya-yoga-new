@include('front.includes.header')



<div class="home " style="height: 300px">
		<div class="background_image" style="background-image:url({{asset('front/images/about.jpg')}})"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_title pt-5" style="color: #FFA37B; font-size: 50px;">Book A Room</div>
							<div class="booking_form_container">
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="booking" style="padding-top: 0px">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="booking_title text-center" ><h2>Book a room</h2></div>
					<div class="booking_text text-center">
						
					</div>

					<!-- Booking Slider -->
					<div class="booking_slider_container">
						<div class="owl-carousel owl-theme booking_slider">
							
							<!-- Slide -->
							<div class="booking_item">
								<div class="background_image" style="background-image:url({{asset('uploads/19.09.22.11.38.0668490888_2506127582781395_8545961110505783296_n.jpg')}})"></div>
								<div class="booking_overlay trans_200"></div>
								<div class="booking_price">800</div>
								<div class="booking_link"><a href="booking.html">Family Room</a></div>
							</div>

							<!-- Slide -->
							<div class="booking_item">
								<div class="background_image" style="background-image:url({{asset('uploads/19.09.22.11.39.5068993430_483770145526939_6261715090936954880_n.jpg')}})"></div>
								<div class="booking_overlay trans_200"></div>
								<div class="booking_price">600</div>
								<div class="booking_link"><a href="booking.html">Stander Room</a></div>
							</div>

							<!-- Slide -->
							<div class="booking_item">
								<div class="background_image" style="background-image:url({{asset('uploads/19.09.22.11.40.4969034736_387571508821016_7794410102210953216_n.jpg')}})"></div>
								<div class="booking_overlay trans_200"></div>
								<div class="booking_price">500</div>
								<div class="booking_link"><a href="booking.html">Budget Room</a></div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@include('front.includes.footer')