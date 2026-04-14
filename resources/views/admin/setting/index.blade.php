@extends('layouts.admin')
@section('content')

  <section class="content-header">
    <div class="container-fluid">

      <div class="card">
        <div class="card-header">
          <h2 class="card-title pr-5 btn bg-secondary">Setting</h2>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
          @if(!is_null($information))
            <div class="form-group">
              <img src="{{ asset('uploads/' . $information->logo) }}" alt="" class="img-fluid" style="height: 150px">

            </div>
          @endif
          @if(is_null($information))
            {{ Form::open(['method' => 'post', 'route' => 'setting.store', 'files' => true]) }}

          @else

            {{ Form::model($information, ['method' => 'patch', 'route' => ['setting.update',
            $information->id],'files' => true]) }}
          @endif


          @include('admin.setting.form')
          {{ Form::close() }}

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </div>
  </section>

@endsection