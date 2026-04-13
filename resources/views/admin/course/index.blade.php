@extends('layouts.admin')
@section('content')

    <div class="content">


        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li> Yoga Teacher Training In Nepal</li>
                </ul>

                <ul class="breadcrumb-elements">
                    <a href="{{ route('course.create') }} " class="btn btn-success">Create </a>
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
                                            <th>Title</th>

                                            <th>Slug</th>
                                            <th>image</th>
                                            <th> Created at </th>

                                            <th>Action</th>
                                        </tr>
                                        @php $sn = 1 @endphp
                                        @foreach($informations as $k => $information)
                                            <tr>
                                                <td>{{$sn++}}</td>
                                                <td>{{$information->title}}</td>

                                                <td>{{ $information->slug }}</td>
                                                <td><img src="{{asset('uploads/course/thumbnails/' . $information->image)}}"
                                                        class="img-fluid" style="height: 100px; width: 200px "></td>
                                                <td>{{ $information->created_at->format('d/m/yh') }} </td>

                                                <td>
                                                    {{ Form::open(['method' => 'DELETE', 'route' => ['course.destroy', $information->id]]) }}
                                                    <a href="{{ route('course.edit', $information->id) }}"
                                                        class="btn btn-primary btn-sm"><i class="fa fa-edit"> </i></a>
                                                    <button type="submit" class="btn btn-danger btn-sm delete"
                                                        onclick="return confirm('You Want to Delete?');"><i class="fa fa-trash">
                                                        </i></button>
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