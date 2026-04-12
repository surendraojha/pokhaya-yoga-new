@extends('layouts.admin')
@section('content')

     <div class="content">
                        
        
<div class="page-header">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>QR Code</li>
        </ul>
        <ul class="breadcrumb-elements">
            <a href="{{ action('Admin\QrCodeController@create') }} " class="btn btn-success">Create </a>
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
                    <th>Title </th>
                    <th>Image </th>                                    

                    <th>Action</th>
                </tr>
                @php $sn =1 @endphp
             @foreach($informations as $k => $information)
                <tr>
                    <td>{{$sn++}}</td>
                    <td>{{$information->title}}</td>
                    <td><img src="{{asset('uploads/qr/'.$information->image)}}" width="100" height="100"></td>
        
                    <td>
                    <a  href="{{ route('download.qr', $information->image) }}" class="btn btn-primary p-2 mb-1"><i class="fa fa-download" aria-hidden="true"></i></a>

                    {{ Form::open(['method' => 'delete', 'action' => ['Admin\QrCodeController@destroy', $information->id]]) }}
                    <a href="{{ action('Admin\QrCodeController@edit', $information->id) }}" class="btn btn-primary btn-sm">Edit</a>
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