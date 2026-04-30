@extends('layouts.admin')
@section('content')

    <div class="content card">

        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li>Sound Healing Sessions</li>
                </ul>

                <ul class="breadcrumb-elements">
                    <a href="{{ route('sound-healing-sessions.create') }}" class="btn btn-success">Create</a>
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
                                @if($sessions->isNotEmpty())
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Sn.</th>
                                            <th>Sound Healing</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Spots Left</th>
                                            <th>Description</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        @php $sn = 1 @endphp
                                        @foreach($sessions as $session)
                                            <tr>
                                                <td>{{ $sn++ }}</td>
                                                <td>{{ $session->soundHealing->title ?? '—' }}</td>
                                                <td>{{ $session->title }}</td>
                                                <td>{{ $session->date }}</td>
                                                <td>{{ $session->time }}</td>
                                                <td>{{ $session->spots_left ?? '—' }}</td>
                                                <td>{{ $session->description ?? '—' }}</td>
                                                <td>{{ $session->created_at }}</td>
                                                <td>
                                                    {{ Form::open(['method' => 'delete', 'route' => ['sound-healing-sessions.destroy', $session->id]]) }}
                                                    <a href="{{ route('sound-healing-sessions.edit', $session->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <button type="submit" class="btn btn-danger btn-sm delete"
                                                        onclick="return confirm('You want to Delete?');">Delete</button>
                                                    {{ Form::close() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    {{ $sessions->links() }}
                                @else
                                    <h3>No Sound Healing Sessions found</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
