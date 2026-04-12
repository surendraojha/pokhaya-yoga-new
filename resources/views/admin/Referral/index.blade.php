@extends('layouts.admin')
@section('content')

     <div class="content">
                        
        
<div class="page-header">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li> Bookings</li>
        </ul>
       
        <ul class="breadcrumb-elements">
            <a href="{{ action('Admin\BookingsController@create') }} " class="btn btn-success">Create </a>
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
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Total Referrals</th>
                    <th>Successful Referrals</th>
                    <th>Action</th>
                    
                </tr>
                @php $sn =1 @endphp
             @foreach($informations as $k => $information)
                <tr>
                    <td>{{$sn++}}</td>
                    <td>{{$information->name}}</td>
                    <td>{{$information->address}}</td>
                    <td>{{$information->email}}</td>
                    <td>{{$information->contact}}</td>
                    <td>{{$information->total_referrals}}</td>
                    <td></td>
                    <td>{{$information->successful_referrals}}</td>
                    
                    {{-- <td><img src="{{asset('uploads/'.$information->image)}}" style="height: 100px"></td> --}}
                  <td>
    {{ Form::open(['method' => 'delete', 'action' => ['Admin\BookingsController@destroy', $information->id]]) }}
    <a href="{{ action('Admin\BookingsController@edit', $information->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"> </i></a>
    <button type="submit" class="btn btn-danger btn-sm delete" onclick="return confirm('You Want to Delete?');"><i class="fa fa-trash"> </i></button>
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