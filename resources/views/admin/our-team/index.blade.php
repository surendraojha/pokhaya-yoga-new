@extends('layouts.admin')
@section('content')

     <div class="content" >


<div class="page-header">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>Our Team </li>
        </ul>
        <ul class="breadcrumb-elements">
            <a href="{{ action('Admin\OurTeamController@create') }} " class="btn btn-success">Create </a>
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
                        <table class="table table-striped" >
                    <tr>
                    <th >Sn.</th>
                    <th class="btn btn-primary ">Category</th>
                    <th>Name:</th>
                    <th>Desg:</th>

                    <th> Contact</th>
                    <th> Address</th>
                    <th>Order</th>

                    <th>Image</th>


                    <th>Action</th>
                </tr>
@php $sn =1 @endphp
             @foreach($informations as $k => $information)
                <tr>
                    <td>{{$sn++}}</td>

                    <td class="btn-info btn btn-sm">{{$information->teamCategory->name}}</td>
                    <td>{{$information->name}}</td>
                    <td>{{$information->desg}}</td>

 <td>{{$information->contact}}</td>
 <td>{{$information->address}}</td>
 <td>{{$information->order}}</td>
                    <td> <img height = '100px' src = "{{ asset('/uploads/ourTeam/thumbnails/'.$information->image) }}" /></td>




                                                            <td >

                                            <a href="{{ action('Admin\OurTeamController@edit', $information->id) }}" class="btn btn-primary btn-sm form-inline"><i class="fa fa-edit"></i></a>
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('You Want to Delete?');" data-task="{{ $information->id }}" id="dltBtn"><i class="fa fa-trash"> </i></button>


                                        </td>
                </tr>

             @endforeach
             {{ $informations->links() }}
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
