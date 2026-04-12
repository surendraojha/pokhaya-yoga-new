

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



          {{-- <input type="text" readonly value="{{url('register_yoga/'.$customer->referral_token)}}"> --}}

        @if($errors->any())
          <div class = 'alert alert-danger'>
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
                    {!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>'Name']) !!}

                  </div>
              <div class="md-form">
                {!! Form::text('email',null,['class'=>'form-control','required','placeholder'=>'Email']) !!}

              </div>
              <div class="md-form">
                {!! Form::text('phone',null,['class'=>'form-control','required','placeholder'=>'Contact Number']) !!}

              </div>

              <div class="md-form">
                {!! Form::text('address',null,['class'=>'form-control','required','placeholder'=>'Address']) !!}

              </div>

              <div class="md-form">
                {!! Form::number('numberOfAttendants',null,['class'=>'form-control','required','placeholder'=>'Number of Attendants','id'=>'numberOfAttendants']) !!}

              </div>

              {!! Form::select('room_type',['private'=>'private',

              'share'=>'share'
            ],null,['class'=>'form-control','required','placeholder'=>'Select Package','id'=>'room_type']) !!}



              <div class="md-form">

                {{-- {!! Form::select('package_id',$results,null,['class'=>'form-control','required','placeholder'=>'Select Package','id'=>'package-id']) !!} --}}

                <select name='package' id="package-id">
                  <option value=''>Select package</option>
              @foreach ($results as $res)
                   <option value='{{$res->id}}'> Private: {{$res->private_room}} ,Share: {{$res->share_room}},From Date: {{$res->from}},To Date: {{$res->to}}</option>
              @endforeach
            </select>
              </div>
              <input type="hidden" id="set-price" value="{{url('set-price')}}">
              <input type="text" name="actual_price" id="amount-id">
              <div class="md-form">
                @if(@$token)
                    <input id="customer-name" type="text" readonly value="{{@$customer->name}}">

                @else

                    <input type="text" name="token" id="token">
                @endif
                {{-- {!! Form::text('referred_by',null,['class'=>'form-control','required','value'=>$customer->name]) !!} --}}
              <div class="form-group pt-1">
              <input type="submit" value="Send" class="btn btn-success send-btn text-white pt-2 pb-3 text-uppercase" style="font-size: 20px">
          </div>

            </div>
        </div>
          </div>
        </form>
        <div>

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
