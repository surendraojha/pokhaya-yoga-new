@extends('layouts.admin')
@section('content')

    <div class="content">

        <div class="page-header card">
            <div class="breadcrumb-line">
                <ul class="breadcrumb bg-white">
                    <li>Welcome</li>
                </ul>

                @if ($informations->isEmpty())
                    <ul class="breadcrumb-elements">
                        <a href="{{ route('welcome.create') }}" class="btn btn-success">Create</a>
                    </ul>
                @endif

                <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
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
                                            <th>Content</th>
                                            <th>Video</th>
                                            <th>Action</th>
                                        </tr>

                                        @foreach ($informations as $welcome)
                                            <tr>
                                                <td>{{ $welcome->title }}</td>

                                                <td>{!! $welcome->content !!}</td>

                                                <td>
                                                    @if ($welcome->video)
                                                        <a href="{{ $welcome->video }}" target="_blank">View Video</a>
                                                    @else
                                                        No Video
                                                    @endif
                                                </td>

                                                <td>
                                                    <form action="{{ route('welcome.destroy', $welcome->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <a href="{{ route('welcome.edit', $welcome->id) }}"
                                                            class="btn btn-primary btn-sm">Edit</a>

                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('You want to delete?');">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                @else
                                    <h3>No Welcome Data Added</h3>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection