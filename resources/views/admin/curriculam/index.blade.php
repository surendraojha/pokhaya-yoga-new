@extends('layouts.admin')
@section('content')

     <div class="content card">
                        
        
<div class="page-header">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li> Curriculam</li>
        </ul>
       
        <ul class="breadcrumb-elements">
            <a href="{{ action('Admin\CurriculamController@create') }} " class="btn btn-success">Create </a>
        </ul>
        
        <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
</div>
<div class="content card-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        @if(!is_null($information))
                        <table class="table table-striped">
                    <tr>
                    
                    
                    
                    <th>Title</th>
                    <th>Image</th>
                    <th>Created At</th>
                   
                    
                   
                    
                    <th>Action</th>
                </tr>
              
             
                <tr>
                    
                    <td>{{$information->title}}</td>
                    <td><img src="{{asset('uploads/'.$information->image)}}" style="height: 100px"></td>
                    <td> {{ $information->created_at }} </td>
                    
                    
                

                 
                    
                                                            <td>
                                            {{ Form::open(['method' => 'delete', 'action' => ['Admin\CurriculamController@destroy', $information->id]]) }}
                                            <a href="{{ action('Admin\CurriculamController@edit', $information->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"> </i></a>
                                           
                    <button type="submit" class="btn btn-danger btn-sm delete" onclick="return confirm('You Want to Delete?');"><i class="fa fa-trash"> </i></button>
                                            {{ Form::close() }}
                                        </td>
                </tr>
               
                </table>
                @else
                <h3>No information Added</h3>
                @endif
            </div>
                </div>
       
      
</div>  
        </div>
    </div>
    </div>  

        
                    </div>



            

        
    

@endsection