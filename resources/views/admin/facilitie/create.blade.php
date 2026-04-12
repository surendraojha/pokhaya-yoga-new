 @extends('layouts.admin')
@section('content')
 <section class="content-header">
      <div class="container-fluid">

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             {{ Form::open(['method' => 'post', 'action' => 'Admin\FacilitieController@store', 'files' => true]) }}
                        @include('admin.facilitie.form')
                        {{ Form::close() }}
            </div>
            <!-- /.card -->

          </div>

      </div>
  </div>
</section>


      </div>

  </section>

@endsection