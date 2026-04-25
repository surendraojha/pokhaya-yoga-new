@extends('layouts.admin')
@section('content')

    <div class="content">

        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li>Schedule Management</li>
                </ul>
                <ul class="breadcrumb-elements">
                    <a href="{{ route('schedule.create') }}" class="btn btn-success">Add Schedule Entry</a>
                </ul>
                <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            </div>
        </div>

        @if(session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif

        <div class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">

                        {{-- Filter Form --}}
                        <div class="panel-body" style="border-bottom: 1px solid #ddd;">
                            <form method="GET" action="{{ route('schedule.index') }}" class="form-inline">
                                <div class="form-group">
                                    <label for="course_id" class="mr-2">Filter by Course:</label>
                                    <select name="course_id" id="course_id" class="form-control">
                                        <option value="">-- All Courses --</option>
                                        @foreach($yogaClasses as $class)
                                            <option value="{{ $class->id }}" {{ request('course_id') == $class->id ? 'selected' : '' }}>
                                                {{ $class->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary ml-2">Filter</button>
                                @if(request('course_id'))
                                    <a href="{{ route('schedule.index') }}" class="btn btn-default ml-2">Clear</a>
                                @endif
                            </form>
                        </div>

                        <div class="panel-heading">
                            <div class="panel-title">
                                @if($schedules->isNotEmpty())
                                    @foreach($schedules as $className => $classSchedules)
                                        <h4>{{ $className }}</h4>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Subtitle</th>
                                                    <th>Content</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($classSchedules as $schedule)
                                                    <tr>
                                                        <td>{{ $schedule->title }}</td>
                                                        <td>{{ $schedule->subtitle ?? '—' }}</td>
                                                        <td>{{ Str::limit(strip_tags($schedule->content), 80) }}</td>
                                                        <td>
                                                            <a href="{{ route('schedule.edit', $schedule->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                            <form action="{{ route('schedule.destroy', $schedule->id) }}" method="POST" style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <hr>
                                    @endforeach
                                @else
                                    <p>No schedule entries found. <a href="{{ route('schedule.create') }}">Create one now</a>.</p>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
