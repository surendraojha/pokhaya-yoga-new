@extends('layouts.admin')
@section('content')

     <div class="content">
                        
        
<div class="page-header">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li> Message</li>
        </ul>
        <ul class="breadcrumb-elements">
          

            <a href="# " class="btn btn-success">All Message</a>
            
        </ul>
        <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
</div>
<div class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        @if($informations->isNotEmpty())
                        <table class="table table-striped">
                    <tr>
                    
                    
                    <th> Name</th>
                   
                    <th>Email</th>
                    <th>Number</th>
                    <th>Subject</th>
                    <th>Message</th>
                   
                    <th> Date</th>
               
                   
                    
                    <th>Action</th>
                </tr>
             @foreach($informations as $k => $information)
                <tr>
                    <td>{{$information->name}}</td>
        
                    <td>{{$information->email}}</td>
                    <td>{{$information->number}}</td>
                    <td>{{$information->subject}}</td>
                    <td>{{$information->message}}</td>
           
                    <td>{{$information->created_at}}</td>

                    

                 
                    
                                                            <td>
                                            {{ Form::open(['method' => 'delete', 'action' => ['Admin\ContactController@destroy', $information->id]]) }}
                                           
                    <button type="submit" class="btn btn-danger btn-sm delete" onclick="return confirm('You Want to Delete?');">Delete</button>
                                            {{ Form::close() }}
                                        </td>
                </tr>
               
             @endforeach
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