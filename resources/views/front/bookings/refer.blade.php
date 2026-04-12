{{-- @section("title", "$seoMeta->title")
@section("keyword", "$seoMeta->meta_keyword")
@section("desc", "$seoMeta->meta_des") --}}

{{-- @section("register")
@endsection --}}

@section("title", "Refer and Earn")

@include('front.includes.header')

<!-- start banner Area -->
<div class="page-banner">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h1 class="text-uppercase">Refer and Earn</h1>
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
                            <p>Pokhara Yoga School start a new way of geeting touch with Yoga lovers, Refer and Earn. If you Refer our site to your friend, family or any one and if your referral booked with us you will get $100 Reward, this Rewarded amount will be transfer to your any given bank account and referral can get $100 discount in the course fee.</p>
                        </div>

                        <div class="col-md-12">


                            @if($customer->referral_token)
                            <label for="">
                                Referer Link
                            </label>
                                <input type="text" readonly name="" value="{{ route('booking',$customer->referral_token) }}" id="">

                            @else
                                <a class="btn btn-success" href="{{ route('generate.token') }}">
                                    Generate Token
                                </a>
                            @endif

                            <table>
                                {{-- <thead> --}}


                                {{-- </thead> --}}

                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $customer->name }}</td>
                                    </tr>


                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $customer->email }}</td>
                                    </tr>

                                    <tr>
                                        <th>Earning From Referral</th>
                                        <td>$ {{ $customer->referred_earning }}</td>
                                    </tr>

                                    <tr>
                                        <th>Referral Token</th>
                                        <td>{{ $customer->referral_token }}</td>
                                    </tr>




                                    </tr>


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
