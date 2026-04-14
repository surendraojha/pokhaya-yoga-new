@extends('layouts.admin')
@section('content')

    <div class="content">


        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li> Blog Users</li>
                </ul>

                <ul class="breadcrumb-elements">
                    <a href="{{ route('blog-users.create') }} " class="btn btn-success">Create </a>
                </ul>

                <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a
                    class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            </div>
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
                                            <th>Position</th>
                                            <th>Social media</th>
                                            <th>Image</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        @php $sn = 1 @endphp
                                        @foreach($informations as $k => $information)
                                            <tr>
                                                <td>{{$sn++}}</td>
                                                <td>{{$information->name}}</td>
                                                <td>{{$information->position}}</td>
                                                <td>{{$information->social_media_url1}}</td>
                                                <td><img src="{{asset('uploads/blog-users/' . $information->image)}}"
                                                        style="height: 100px"></td>
                                                <td> {{ $information->created_at }} </td>

                                                <td>
                                                    {{ Form::open(['method' => 'delete', 'route' =>
                                                    ['blog-users.destroy', $information->id]]) }}
                                                    <a href="{{ route('blog-users.edit', $information->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <button type="submit" class="btn btn-danger btn-sm delete"
                                                        onclick="return confirm('You Want to Delete?');">Delete</button>
                                                    {{ Form::close() }}
                                                </td>
                                            </tr>

                                        @endforeach
                                        {{ $informations->links() }}

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