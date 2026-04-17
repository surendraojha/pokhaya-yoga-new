@extends('layouts.admin')
@section('content')

    <div class="content">


        <div class="page-header card">
            <div class="breadcrumb-line">
                <ul class="breadcrumb bg-white">
                    <li> Do you have any questions? - section</li>
                </ul>
                @if ($informations->isNotEmpty())
                @else
                    <ul class="breadcrumb-elements">
                        <a href="{{ route('question.create') }} " class="btn btn-success">Create </a>
                    </ul>
                @endif
                <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a
                    class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            </div>
        </div>
        <div class="content card">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                @if ($informations->isNotEmpty())
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Title</th>
                                            <th>Calendar Title</th>
                                            <th>Meeting Location</th>
                                            <th>Meeting Duration</th>
                                            <th>Timezone Configurations</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($informations as $k => $information)
                                            <tr>
                                                <td>{{ $information->title }}</td>
                                                <td>{{ $information->calendar_title }}</td>
                                                <td>{{ $information->meeting_location }}</td>
                                                <td>{{ $information->meeting_duration }}</td>
                                                <td>
                                                    @if($information->timezone_configurations)
                                                        @foreach($information->timezone_configurations as $config)
                                                            <strong>{{ $config['timezone'] }}:</strong>
                                                        {{ implode(', ', $config['time_slots'] ?? []) }}<br> @endforeach
                                                    @endif
                                                </td>
                                                <td>

                                                    <form action="{{ route('question.destroy', $information->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('question.edit', $information->id) }}"
                                                            class="btn btn-primary btn-sm">Edit</a>
                                                        <button type="submit" class="btn btn-danger btn-sm delete"
                                                            onclick="return confirm('You Want to Delete?');">Delete</button>
                                                    </form>
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