@extends('layouts.admin')
@section('content')

<div class="content">

    <div class="page-header card">
        <div class="breadcrumb-line">
            <ul class="breadcrumb bg-white">
                <li>Accommodation & Food</li>
            </ul>

            <ul class="breadcrumb-elements">
                <a href="{{ route('accommodation-and-foods.create') }}" class="btn btn-success">Create New</a>
            </ul>

            <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
        </div>
    </div>

    <div class="content card">
        <div class="row">
            <div class="col-sm-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">

                            @if ($items->isNotEmpty())
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Link</th>
                                        <th>Sort Order</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($item->description, 100) !!}</td>
                                        <td>
                                            @if($item->image)
                                                <img src="{{ asset($item->image) }}" style="height: 60px;">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->link)
                                                <a href="{{ $item->link }}" target="_blank">Link</a>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->sort_order }}</td>
                                        <td>
                                            @if($item->is_active)
                                                <span class="badge bg-success">Yes</span>
                                            @else
                                                <span class="badge bg-danger">No</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('accommodation-and-foods.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <a href="{{ route('accommodation-and-foods.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                                <button type="submit" class="btn btn-danger btn-sm delete" onclick="return confirm('Delete this item?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <h3>No Accommodation & Food items found.</h3>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection