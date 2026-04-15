@extends('layouts.admin')
@section('content')

<div class="content">

    <div class="page-header card">
        <div class="breadcrumb-line">
            <ul class="breadcrumb bg-white">
                <li>Community Support</li>
            </ul>

            @if ($supports->isNotEmpty())
            @else
            <ul class="breadcrumb-elements">
                <a href="{{ route('community_support.create') }}" class="btn btn-success">Create</a>
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

                            @if ($supports->isNotEmpty())

                            <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Stats</th>
                                    <th>Action</th>
                                </tr>

                                @foreach ($supports as $support)
                                <tr>
                                    <td>{{ $support->title }}</td>

                                    <td>
                                        {!! \Illuminate\Support\Str::limit($support->description, 100) !!}
                                    </td>

                                    <td>
                                        @if($support->image)
                                        <img src="{{ asset('uploads/community/' . $support->image) }}"
                                            style="height: 120px;">
                                        @else
                                        <span class="text-muted">No Image</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if(!empty($support->stats) && is_array($support->stats))
                                        <ul>
                                            @foreach($support->stats as $stat)
                                            <li>{{ $stat }}</li>
                                            @endforeach
                                        </ul>
                                        @else
                                        <span class="text-muted">No Stats</span>
                                        @endif
                                    </td>

                                    <td>
                                        <form action="{{ route('community_support.destroy', $support->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('community_support.edit', $support->id) }}"
                                                class="btn btn-primary btn-sm">
                                                Edit
                                            </a>

                                            <button type="submit"
                                                class="btn btn-danger btn-sm delete"
                                                onclick="return confirm('You Want to Delete?');">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </table>

                            @else
                            <h3>No Community Support Added</h3>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection