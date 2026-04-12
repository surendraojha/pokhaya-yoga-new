@extends('layouts.admin')
@section('content')

     <div class="content">


<div class="page-header">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li> Fee List </li>
        </ul>

        <ul class="breadcrumb-elements">
            <a href="{{ action('Admin\FeeListController@create') }} " class="btn btn-success">Create </a>
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
                    <th>Category</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Place</th>
                    <th>Share Room</th>
                    <th>Private Room</th>
                    <th>Triple Room</th>
                    <th> Order</th>
                    <th>Created At</th>




                    <th>Action</th>
                </tr>
                @php $sn =1 @endphp
             @foreach($informations as $k => $information)
                <tr>
                    <td>{{$sn++}}</td>
                    <td class="text-info">{{$information->fee_category}}</td>
                    <td>{{$information->from}}</td>
                    <td>{{$information->to}}</td>
                    <td>{{$information->place}}</td>
                    <td>{{$information->share_room}}</td>
                    <td>{{$information->private_room}}</td>
                     <td>{{$information->triple_room}}</td>
                    <td>{{$information->order}}</td>
                    <td> {{ $information->created_at }} </td>






                                                            <td>
                                            {{ Form::open(['method' => 'delete', 'action' => ['Admin\FeeListController@destroy', $information->id]]) }}
                                            <a href="{{ action('Admin\FeeListController@edit', $information->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"> </i></a>

                    <button type="submit" class="btn btn-danger btn-sm delete" onclick="return confirm('You Want to Delete?');"><i class="fa fa-trash"> </i></button>
                                            {{ Form::close() }}
                                        </td>
                </tr>

             @endforeach
                </table>

                {{ $informations->render() }}
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
