@extends('layouts.admin')
@section('content')

<div class="content">

    <div class="page-header">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li>Video Testimonial</li>
            </ul>

            <ul class="breadcrumb-elements">
                <a href="{{ route('video-testimonial.create') }}" class="btn btn-success">Create</a>
            </ul>

            <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
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
                                        <th>Content</th>
                                        <th>Video URL</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>

                                    @php $sn = 1; @endphp
                                    @foreach($informations as $information)
                                        <tr>
                                            <td>{{ $sn++ }}</td>
                                            <td>{{ $information->title }}</td>
                                            <td>{{ $information->content }}</td>
                                            <td>
                                                <a href="{{ $information->url }}" target="_blank">
                                                    {{ $information->url }}
                                                </a>
                                            </td>

                                            <td>
                                                @if($information->image)
                                                    <img height="100px"
                                                         src="{{ asset('uploads/video-testimonial/' . $information->image) }}" />
                                                @endif
                                            </td>

                                            <td>
                                                {{ Form::open(['method' => 'delete', 'route' => ['video-testimonial.destroy', $information->id]]) }}

                                                <a href="{{ route('video-testimonial.edit', $information->id) }}"
                                                   class="btn btn-primary btn-sm">Edit</a>

                                                <button type="submit"
                                                        class="btn btn-danger btn-sm delete"
                                                        onclick="return confirm('You Want to Delete?');">
                                                    Delete
                                                </button>

                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </table>
                            @else
                                <h3>No Video Testimonial Added</h3>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection