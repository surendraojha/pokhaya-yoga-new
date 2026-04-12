@extends('layouts.admin')
@section('content')

     <div class="content">
                        
        
<div class="page-header">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>Nara Member </li>
        </ul>
        <ul class="breadcrumb-elements">
            <a href="{{ action('Admin\NaraMemberController@create') }} " class="btn btn-success">Create </a>
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
                   
                    <th>Name of Company</th>
                  
                    <th> Address</th>
                    <th>Managing Director</th>
                    <th>Email</th>
                    <th>Website</th>

                    
                    <th>Action</th>
                </tr>

             @foreach($informations as $k => $information)
                <tr>
                   
                    <td>{{$information->name_of_company}}</td>
                    <td>{{$information->address}}</td>
                   
 <td>{{$information->M_d}}</td>
 <td>{{$information->email}}</td>
 <td>{{$information->website}}</td>
                    
                    
                    
                                                            <td>
                                            {{ Form::open(['method' => 'delete', 'action' => ['Admin\NaraMemberController@destroy', $information->id]]) }}
                                            <a href="{{ action('Admin\NaraMemberController@edit', $information->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm delete">Delete</button>
                                            {{ Form::close() }}
                                        </td>
                </tr>
               
             @endforeach
                </table>
                @else
                <h3>No Information Added</h3>
                @endif
            </div>
                </div>
       
      
</div>  
        </div>
    </div>
    </div>  

        
                    </div>



            

        
    

@endsection