@extends('layouts.admin')
@section('content')

    <div class="content">

        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li>Rooms</li>
                </ul>
                <ul class="breadcrumb-elements">
                    <a href="{{ route('room.create') }}" class="btn btn-success">Create Room</a>
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
                                            <th>Price/Night</th>
                                            <th>Bed Type</th>
                                            <th>Guests</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        @php $sn = 1 @endphp
                                        @foreach($informations as $information)
                                            <tr>
                                                <td>{{$sn++}}</td>
                                                <td>{{$information->title}}</td>
                                                <td>${{number_format($information->price, 2)}}</td>
                                                <td>{{$information->bed_type}}</td>
                                                <td>{{$information->guests}}</td>
                                                <td>
                                                    @php
                                                        $featuredImage = $information->images->firstWhere('is_featured', true) ?? $information->images->first();
                                                    @endphp
                                                    @if($featuredImage)
                                                        <img height='80px' src="{{ asset('uploads/' . $featuredImage->image) }}" alt="{{ $information->title }}" />
                                                        <span class="badge badge-info">{{ $information->images->count() }} image(s)</span>
                                                    @else
                                                        <span class="text-muted">No images</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($information->is_active)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ Form::open(['method' => 'delete', 'route' => ['room.destroy', $information->id]]) }}
                                                    <a href="{{ route('room.edit', $information->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <button type="submit" class="btn btn-danger btn-sm delete"
                                                        onclick="return confirm('Are you sure you want to delete this room?');">Delete</button>
                                                    {{ Form::close() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <h3>No Rooms Added Yet</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
