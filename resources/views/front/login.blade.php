

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
        <h1 class="text-uppercase">Login</h1>
        <ul class="breadcrumb">
          <li><a href="{{action('Front\FrontController@index')}}">Home</a></li>
          <li>Login</li>
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
      <h4>Login</h4>

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
      <form action="{{action('Front\FrontController@loginAuth')}}" method="POST">
          @csrf
        <div class="row">
          <div class="col-md-6">
            
            <div class="md-form">
              <input type="email" name="email" class="form-control" placeholder="Your email">
            </div>
            <div class="md-form">
              <input type="password" name="password" class="form-control" placeholder="Your password">
            </div>
          
         
            <div class="form-group pt-1">
            <input type="submit" value="Send" class="btn btn-success send-btn text-white pt-2 pb-3 text-uppercase" style="font-size: 20px">
        </div>
        <p class="sign-up text-center">Already have an Account?<a href="{{ route('login') }}"> Sign In</a></p>
        <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
          </div>
      </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>           

@include('front.includes.footer')
