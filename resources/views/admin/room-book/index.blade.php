@extends('layouts.admin')
@section('content')

     <div class="content">
                        
        
<div class="page-header">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>Latest Rooms Book </li>
        </ul>
        <ul class="breadcrumb-elements">
            <a href=" " class="btn btn-success">Room Book </a>
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
                    <th>Name:</th>
                     <th>Number</th> 
                     <th>Email</th>
                    <th>Address</th>
                    <th> Room</th>
                    <th> Room Type</th>
                    <th> Check In</th>
                    <th> Check Out</th>
                    <th> Children</th>
                    <th> Created</th>
                    
                    <th>Action</th>
                </tr>
             @foreach($informations as $k => $information)
                <tr>
                    <td>{{$information->name}}</td>
                    <td>{{$information->number}}</td>
                    <td>{{$information->email}}</td>
                    <td>{{$information->address}}</td>
                    <td>{{$information->room}}</td>
                    <td>{{$information->room_type}}</td>
                    <td>{{$information->check_in}}</td>
                    <td>{{$information->check_out}}</td>
                    <td>{{$information->children}}</td>
                    <td>{{$information->created_at}}</td>
                   

                    
                     <td>{{$information->content}}</td>
                    
                                                            <td>
                                            {{ Form::open(['method' => 'delete', 'action' => ['Admin\RoomBookController@destroy', $information->id]]) }}
                                            
                                            <button type="submit" class="btn btn-danger btn-sm delete">Delete</button>
                                            {{ Form::close() }}
                                        </td>
                </tr>
               
             @endforeach
                </table>
                @else
                <h3>No Testimonial Added</h3>
                @endif
            </div>
                </div>
       
      
</div>  
        </div>
    </div>
    </div>  

        
                    </div>



            

        
    

@endsection