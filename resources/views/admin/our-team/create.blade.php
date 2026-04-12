@extends('layouts.admin')
@section('content')

	 <div class="content">
                        
		
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
            </div>
            <div class="card-body">
            {{ Form::open(['method' => 'post', 'action' => 'Admin\OurTeamController@store', 'files' => true]) }}
                        @include('admin.our-team.form')
                        {{ Form::close() }}
                </div>
            
       
      
</div>
</div> </section>
</div>
</section>
</div>


@endsection

	 		

	 	
	

