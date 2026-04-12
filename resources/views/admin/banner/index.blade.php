@extends('layouts.admin')
@section('content')


<div class="content">
    <div class="page-header">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li> Banner Image</li>
            </ul>

            <ul class="breadcrumb-elements">
                <a href="{{ action('Admin\BannerController@create') }} " class="btn btn-success">Create </a>
            </ul>

            <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
    </div>


        <div class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                @if ($informations->isNotEmpty())
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Title</th>
                                            <th>image</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($informations as $k => $information)
                                            <tr>
                                                <td>{{ $information->title }}</td>
                                                <td><img src="{{ asset('uploads/' . $information->image) }}"
                                                        style="height: 100px; width:100px;"></td>

                                                <td>
                                                    {{ Form::open(['method' => 'delete', 'action' => ['Admin\BannerController@destroy', $information->id]]) }}
                                                    <a href="{{ action('Admin\BannerController@edit', $information->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <button type="submit" class="btn btn-danger btn-sm delete"
                                                        onclick="return confirm('You Want to Delete?');">Delete</button>
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
