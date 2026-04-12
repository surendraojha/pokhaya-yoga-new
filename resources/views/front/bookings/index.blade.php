{{-- @section("title", "$seoMeta->title")
@section("keyword", "$seoMeta->meta_keyword")
@section("desc", "$seoMeta->meta_des") --}}

{{-- @section("register")
@endsection --}}

@section("title", "My Bookings")



@include('front.includes.header')

<!-- start banner Area -->
<div class="page-banner">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h1 class="text-uppercase">My Bookings</h1>
                    {{-- <ul class="breadcrumb">
                        <li><a href="">Dashboard</a></li>
                        <li>Register Us</li>
                    </ul> --}}
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
                {{-- <h4>My Bookings</h4>
                <h2>{{session('message')}}</h2> --}}

                {{-- <input type="text" readonly value="{{url('register_yoga/'.$customer->referral_token)}}"> --}}
                @if($errors->any())
                <div class='alert alert-danger'>
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- <form action="{{route('customer.booking')}}" method="POST"> --}}
                    @csrf
                    <div class="row">
                        <div class="col-md-12">

                            <table class="table table-striped">
                                <thead>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Number Of Attendants</th>
                                    <th>Room Type</th>
                                    <th>Actual Price</th>
                                    <th>Amount to be paid</th>
                                    <th>Referred By</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </thead>

                                <tbody>
                                    @foreach ($informations as $value)
                                    <tr>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->phone }}</td>
                                        <td>{{ $value->address }}</td>
                                        <td>{{ $value->numberOfAttendants }}</td>
                                        <td>{{ $value->room_type }}</td>
                                        <td>{{ $value->actual_price }}</td>
                                        <td>{{ $value->amount_to_be_paid }}</td>
                                        <td>{{ $value->referer }}</td>
                                        <td>
                                            @if($value->status=='1')
                                                Paid
                                            @else
                                                Unpaid
                                            @endif
                                        </td>


                                        <td>

                                            <form action="{{ route('customer.booking.delete') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value={{ $value->id }}>

                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure , you want to delete this booking?')"
                                                >
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>




                        </div>
                    </div>
                {{-- </form> --}}
                <div>

                </div>

                @if(\Session::has('msg'))
                <div class='alert alert-success'>
                    <p>{{ \Session::get('msg') }}</p>
                </div>
                {{-- @elseif(\Session::has('errors'))
          <div class = 'alert alert-danger'>
            <p>{{ \Session::get('errors') }}</p> --}}
            </div>
            @endif

        </div>
    </div>
</div>
</div>

@include('front.includes.footer')
