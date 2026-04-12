@extends('layouts.admin')
@section('content')

    <div class="content">


        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li> All Page</li>
                </ul>

                <ul class="breadcrumb-elements">
                    <a href="{{ route('all-page.create') }} " class="btn btn-success">Create </a>
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
                                @if ($informations->isNotEmpty())
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Sn.</th>
                                            <th>Title</th>
                                            <th>Order</th>
                                            <th> Slug</th>
                                            <th>image</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        @php $sn =1 @endphp
                                        @foreach ($informations as $k => $information)
                                            <tr>
                                                <td>{{ $sn++ }}</td>
                                                <td>{{ $information->title }}</td>
                                                <td>{{ $information->order }}</td>
                                                <td>{{ $information->slug }}</td>
                                                <td><img src="{{ asset('uploads/' . $information->image) }}"
                                                        style="height: 100px"></td>
                                                <td> {{ $information->created_at }} </td>
                                                <td>
                                                    <form action="{{route('all-page.destroy',$information->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                          <a href="{{ route('all-page.edit', $information->id) }}"
                                                        class="btn btn-primary btn-sm"><i class="fa fa-edit"> </i></a>
                                                    <a href="{{ route('front.single-page', $information->slug) }}"
                                                        class="btn btn-info btn-sm" target="_blank"><i class="fa fa-eye">
                                                        </i></a>
                                                    <button type="submit" class="btn btn-danger btn-sm delete"
                                                        onclick="return confirm('You Want to Delete?');"><i
                                                            class="fa fa-trash"> </i></button>
                                                    </form>
                                                    {{-- {{ Form::open(['method' => 'delete', 'action' => route('all-page.destroy', [$information->id])]) }}

                                                    {{ Form::close() }} --}}
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
