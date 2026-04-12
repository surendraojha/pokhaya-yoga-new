@extends('layouts.admin')
@section('content')

     <div class="content">
                        
        
<div class="page-header">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li> Event / News</li>
        </ul>
        
        <ul class="breadcrumb-elements">
            <a href="{{ action('Admin\NoticeController@create') }} " class="btn btn-success">Create </a>
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
                    
                    
                    <th>Sn.</th>
                    <th>Title</th>
                    <th>image</th>
                    <th> Created At</th>
                   
                    
                   
                    
                    <th>Action</th>
                </tr>
                 @php $sn =1 @endphp
             @foreach($informations as $k => $information)
                <tr>
                    <td>{{$sn++}}</td>
                    <td>{{$information->title}}</td>
                    <td><img src="{{asset('uploads/'.$information->image)}}" class="img-fluid" style="height: 100px; width: 200px "></td>
                    <td> {{ $information->created_at->format('d/M/Y') }} </td>
                    
                    
                

                 
                    
                                                            <td>
                                            {{ Form::open(['method' => 'delete', 'action' => ['Admin\NoticeController@destroy', $information->id]]) }}
                                            <a href="{{ action('Admin\NoticeController@edit', $information->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <button type="submit" class="btn btn-danger btn-sm delete" onclick="return confirm('You Want to Delete?');"><i class="fa fa-trash"></i></button>
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