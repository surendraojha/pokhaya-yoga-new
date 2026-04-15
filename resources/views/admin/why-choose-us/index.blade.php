@extends('layouts.admin')
@section('content')
    <div class="content card">

        <div class="page-header ">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li>WHY CHOOSE POKHARA YOGA</li>
                </ul>

                <ul class="breadcrumb-elements">
                    @if (!is_null($information))
                    @else
                        <a href="{{ route('why-choose-us.create') }}" class="btn btn-success">Create</a>
                    @endif
                </ul>

                <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
                <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            </div>
        </div>

        <div class="content card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                @if (!is_null($information))
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <th>Title</th>
                                            <td>{{ $information->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>Subtitle</th>
                                            <td>{{ $information->subtitle ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Left List</th>
                                            <td>
                                                @if(is_array($information->left_list))
                                                    <ul>
                                                        @foreach($information->left_list as $item)
                                                            <li>{{ $item }}</li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Right List</th>
                                            <td>
                                                @if(is_array($information->right_list))
                                                    <ul>
                                                        @foreach($information->right_list as $item)
                                                            <li>{{ $item }}</li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Images</th>
                                            <td>
                                                @if(is_array($information->images) && count($information->images))
                                                    <div class="row">
                                                        @foreach($information->images as $image)
                                                            <div class="col-md-2 mb-2">
                                                                <img src="{{ asset($image) }}" class="img-thumbnail" style="max-height:100px">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    No images
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Created At</th>
                                            <td>{{ $information->created_at->format('D/M/Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Action</th>
                                            <td>
                                                <a href="{{ route('why-choose-us.edit', $information->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                {{-- Optional delete button --}}
                                            </td>
                                        </tr>
                                    </table>
                                @else
                                    <h3>No information added</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection