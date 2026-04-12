

{{-- @section("title", "$seoMeta->title")
@section("keyword", "$seoMeta->meta_keyword")
@section("desc", "$seoMeta->meta_des") --}}

@section("register")
@endsection
@include('front.includes.header')

<!-- start banner Area -->
         <div class="page-banner">
<div class="overlay">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12">
        <h1 class="text-uppercase">Dashboard</h1>
        <ul class="breadcrumb">
          <li><a href="">Profile Pgae</a></li>
          <li></li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
          <!-- End banner Area -->   
                         {{--  --}}

<div class="contact-message">
<div class="container">
  <div class="row">
    <div class="col-12 col-sm-12">
      <h4>User Profile</h4>
      <a href="{{url('generate_token')}}" class="">Generate Token</a>

      @if($customer->referral_token)
          <input type="text" readonly value="{{url('getReferralLink/'.$customer->referral_token)}}">
      @endif
        @if($errors->any())
          <div class = 'alert alert-danger'>
              <ul>
                  @foreach($errors->all() as $e)
                  <li>{{ $e }}</li>
                  @endforeach
              </ul>
          </div>
          @endif

          <div>
            <table style="width:100%">
            
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Nationality</th> 
                  <th>DOB</th>
                  <th>Address</th>
                  <th>Contact</th>
                  <th>Earnings</th>
                </tr>
           <tr><td><h5>{{$customer->name}}</h5></td> </tr>
           <tr> <td><h5>{{$customer->email}}</h5></td></tr>
            <tr><td><h5>{{$customer->gender}}</h5></td></tr>
              <tr><td><h5>{{$customer->nationality}}</h5></td></tr>
                <tr><td><h5>{{$customer->dob}}</h5></td></tr>
                  <tr> <td><h5>{{$customer->address}}</h5></td></tr>
                    <tr> <td><h5>{{$customer->contact}}</h5></td></tr>
            <tr><td> <h5><Strong>{{$customer->referred_earning}}</Strong></h5></td></tr>
         
        </table>
          </div>

          <div>
            <table style="width:100%">
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Room Type</th>
                <th>Total Attendance</th> 
                <th>Actual Price</th>
                <th>Total Price</th>
                <th>Status</th>
              </tr>
              <tr>
                {{-- <tr><td><h5>{{$bookings->customer_id}}</h5></td></tr> --}}
                {{-- <tr> <td><h5>{{$bookings->email}}</h5></td></tr>
                  <tr> <td><h5>{{$bookings->phone}}</h5></td></tr> --}}
              </tr>
            </table>
          </div>

          @if(\Session::has('msg'))
          <div class = 'alert alert-success'>
              <p>{{ \Session::get('msg') }}</p>
          </div></br>
          @endif
      
    </div>
  </div>
</div>
</div>           

@include('front.includes.footer')
