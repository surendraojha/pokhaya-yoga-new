@extends('layouts.admin')
@section('content')

    <div class="content card">

        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li>Sound Healing</li>
                </ul>

                <ul class="breadcrumb-elements">
                    <a href="{{ route('sound-healing.create') }}" class="btn btn-success">Create</a>
                </ul>

                <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            </div>
        </div>

        @if(session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif

        <div class="content card-body">
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
                                            <th>Location</th>
                                            <th>Image</th>
                                            <th>Teacher ID</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        @php $sn = 1 @endphp
                                        @foreach($informations as $information)
                                            <tr>
                                                <td>{{ $sn++ }}</td>
                                                <td>{{ $information->title }}</td>
                                                <td>{{ $information->location }}</td>
                                                <td>
                                                    @if($information->image)
                                                        <img src="{{ asset('uploads/' . $information->image) }}" style="height: 60px;">
                                                    @else
                                                        —
                                                    @endif
                                                </td>
                                                <td>{{ $information->teacher_id }}</td>
                                                <td>{{ $information->created_at }}</td>
                                                <td>
                                                    {{ Form::open(['method' => 'delete', 'route' => ['sound-healing.destroy', $information->id]]) }}
                                                    <a href="{{ route('sound-healing.edit', $information->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <button type="submit" class="btn btn-danger btn-sm delete"
                                                        onclick="return confirm('You want to Delete?');">Delete</button>
                                                    {{ Form::close() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    {{ $informations->links() }}
                                @else
                                    <h3>No Sound Healing records found</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
