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
                <h3 class="card-title">Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             {{ Form::model($information, ['method' => 'patch', 'action' => ['Admin\FeatureController@update', $information->id],'files' => true]) }}
                        @include('admin.feature.form')
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