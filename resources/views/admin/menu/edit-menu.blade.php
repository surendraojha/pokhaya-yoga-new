@extends('layouts.admin')
@section('content')

     <div class="content">
                        
        
<div class="page-header">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>Edit </li>
        </ul>
        <ul class="breadcrumb-elements">
            
        </ul>
        <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
</div>
<div class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                       
            </div>
            {{ Form::model($information, ['method' => 'patch', 'action' => ['Admin\MenuController@updateMenu', $information->id],'files' => true]) }}
                        <div class="form-group">
    {{ Form::label('menu', 'Menu') }}
  <input type="text" value="{{ $information->ourMenu->name }}"  class="form-control" readonly>
  <input type="hidden" value="{{ $information->ourMenu->id }}" name="our_menu_id" class="form-control">
    

</div>

    <div class="form-group">
    {{ Form::label('all_page_id', 'All pages') }}
    {{ Form::select('all_page_id', $allPages, null, ['class' => 'form-control', 'required']) }}
</div>
 <div class="form-group">
    {{ Form::label('order', 'order') }}
    {{ Form::number('order', null, ['class' => 'form-control']) }}
    
</div>

     
<input type="submit" value="Save" class="btn btn-success">                       
                        {{ Form::close() }}
                </div>
            
       
      
</div>  
        </div>
    </div>
    </div>  

        
                    </div>



            

        
    

@endsection