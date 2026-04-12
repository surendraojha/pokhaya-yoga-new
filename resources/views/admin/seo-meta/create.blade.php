@extends('layouts.admin')
@section('content')

	 <div class="content card">
                        
		
<div class="page-header card-body">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>Create</li>
        </ul>
        
        <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
</div>
<div class="content card-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        
            </div>
            {{ Form::open(['method' => 'post', 'action' => 'Admin\SeoMetaController@store', 'files' => true]) }}
                        @include('admin.seo-meta.form')
                        {{ Form::close() }}
                </div>
            
       
      
</div>  
        </div>
    </div>
    </div>	

		
                    </div>



	 		

	 	
	

@endsection