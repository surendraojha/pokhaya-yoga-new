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
                    <h1 class="text-uppercase">Yoga Packages Registration</h1>
                    <ul class="breadcrumb">
                        <li><a href="">Dashboard</a></li>
                        <li>Register Us</li>
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
                <h4>Register</h4>
                <h2>{{session('message')}}</h2>

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

                <form action="{{action('Front\FrontController@bookings')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-form">
                                {!! Form::label('name', 'Name'); !!}

                                {!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>'Name'])
                                !!}

                            </div>
                            <div class="md-form">
                                {!! Form::label('email', 'Email'); !!}

                                {!! Form::text('email',null,['class'=>'form-control','required','placeholder'=>'Email'])
                                !!}

                            </div>
                            <div class="md-form">
                                {!! Form::label('phone', 'Phone'); !!}

                                {!! Form::text('phone',null,['class'=>'form-control','required','placeholder'=>'Contact
                                Number']) !!}

                            </div>

                            <div class="md-form">
                                {!! Form::label('address', 'Address'); !!}

                                {!!
                                Form::text('address',null,['class'=>'form-control','required','placeholder'=>'Address'])
                                !!}

                            </div>

                            <div class="md-form">
                                {!! Form::label('numberOfAttendants', 'No. Of Attendants'); !!}

                                {!!
                                Form::number('numberOfAttendants',null,['class'=>'form-control','required','placeholder'=>'Number
                                of Attendants','id'=>'numberOfAttendants']) !!}

                            </div>

                            <div class="md-form">


                                {!! Form::label('room_type', 'Room Type'); !!}


                                {!! Form::select('room_type',['private'=>'private',

                                'share'=>'share'
                                ],null,['class'=>'form-control','required','placeholder'=>'Select
                                Rooms','id'=>'room_type']) !!}

                            </div>
                            <div class="md-form">
                                {!! Form::label('package', 'Package'); !!}
                                <select name='package' id="package-id">
                                    <option value=''>Select package</option>
                                    @foreach ($results as $res)
                                    <option value='{{$res->id}}'> Private: {{$res->private_room}} ,Share:
                                        {{$res->share_room}},From Date: {{$res->from}},To Date: {{$res->to}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <input type="hidden" id="set-price" value="{{url('set-price')}}">
                            <input type="text" name="actual_price" id="amount-id">
                            <div class="md-form">
                                @if(@$referral_name)

                                {!! Form::label('referral_name', 'Referral Name'); !!}


                                <input type="text" name="referral_name" readonly value="{{@$referral_name}}" name="referred_by">
                                @else
                                <input type="text" name="referral_name" readonly value="">
                                @endif
                                {{-- {!! Form::text('referred_by',null,['class'=>'form-control','required','value'=>$customer->name]) !!} --}}
                                <div class="form-group pt-1">
                                    <input type="submit" value="Send"
                                        class="btn btn-success send-btn text-white pt-2 pb-3 text-uppercase"
                                        style="font-size: 20px">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
