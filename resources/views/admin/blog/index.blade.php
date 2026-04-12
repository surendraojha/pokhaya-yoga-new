@extends('layouts.admin')
@section('content')

     <div class="content">


<div class="page-header">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li> Blog</li>
        </ul>

        <ul class="breadcrumb-elements">
            <a href="{{ action('Admin\BlogController@create') }} " class="btn btn-success">Create </a>
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
                        <table id="blogTableData" class="table table-striped">
                            <thead>
                                <tr>
            
                                 <th>Sn.</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Created At</th>
            
            
            
            
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $sn =1 @endphp
                             @foreach($informations as $k => $information)
                                <tr>
                                    <td>{{$sn++}}</td>
                                    <td>{{$information->title}}</td>
                                    <td><img src="{{asset('uploads/blogs/thumbnails/'.$information->image)}}" style="height: 100px"></td>
                                    <td> {{ $information->created_at }} </td>
                
                
                
                
                
                
                                                                            <td>
                                                            {{ Form::open(['method' => 'delete', 'action' => ['Admin\BlogController@destroy', $information->id]]) }}
                                                            <a href="{{ action('Admin\BlogController@edit', $information->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-sm delete" onclick="return confirm('You Want to Delete?');">Delete</button>
                                                            {{ Form::close() }}
                                                        </td>
                                </tr>
                
                             @endforeach
                            {{ $informations->links() }}
                            
                            </tbody>

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
