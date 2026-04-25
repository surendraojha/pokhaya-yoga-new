@extends('layouts.admin')
@section('content')

    <div class="content card">


        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li> Yoga Class</li>
                </ul>

                <ul class="breadcrumb-elements">
                    <a href="{{ route('yoga-certificate.create') }} " class="btn btn-success">Create </a>
                </ul>

                <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a
                    class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            </div>
        </div>
        <div class="content card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                @if ($informations->isNotEmpty())
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Sn.</th>
                                            <th>Yoga Class</th>
                                            <th>Image</th>

                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        @php $sn = 1 @endphp
                                        @foreach ($informations as $k => $information)
                                            <tr>
                                                <td>{{ $sn++ }}</td>
                                                <td>{{ $information?->yogaClass?->title }}</td>
                                                <td><img src="{{ asset('uploads/' . $information->image) }}"
                                                        style="height: 100px"></td>
                                                <td> {{ $information->created_at }} </td>
                                                <td>
                                                    {{ Form::open(['method' => 'delete', 'route' => ['yoga-certificate.destroy', $information->id]]) }}
                                                    <a href="{{ route('yoga-certificate.edit', $information->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <button type="submit" class="btn btn-danger btn-sm delete"
                                                        onclick="return confirm('You Want to Delete?');">Delete</button>
                                                    {{ Form::close() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{ $informations->links() }}

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
