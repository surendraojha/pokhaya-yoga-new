@extends('layouts.admin')
@section('content')

     <div class="content">


<div class="page-header card">
    <div class="breadcrumb-line">
        <ul class="breadcrumb bg-white">
            <li> Announcements</li>
        </ul>

        <ul class="breadcrumb-elements">
            <a href="{{ action('Admin\AnnouncementController@create') }} " class="btn btn-success">Create </a>
        </ul>
        <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
</div>
<div class="content card">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        @if($informations->isNotEmpty())
                        <table class="table table-striped">
                    <tr>

                    <th>Content</th>
                    <th>image</th>




                    <th>Action</th>
                </tr>
             @foreach($informations as $k => $information)
                <tr>
                    <td>{!! $information->content !!}</td>
                    <td><img src="{{asset('uploads/'.$information->image)}}" style="height: 200px"></td>


                    <td>
                     {{ Form::open(['method' => 'delete', 'action' => ['Admin\AnnouncementController@destroy', $information->id]]) }}
                        <a href="{{ action('Admin\AnnouncementController@edit', $information->id) }}" class="btn btn-primary btn-sm">Edit</a>
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
