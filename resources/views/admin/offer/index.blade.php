@extends('layouts.admin')
@section('content')

<div class="content">

    <div class="page-header">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li>Offers</li>
            </ul>

            <ul class="breadcrumb-elements">
                <a href="{{ route('offer.create') }}" class="btn btn-success">Create</a>
            </ul>

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
                                    <thead>
                                        <tr>
                                            <th>Sn:</th>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Discounted Price</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>End Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    @php $sn = 1 @endphp

                                    @foreach($informations as $offer)
                                        <tr>
                                            <td>{{ $sn++ }}</td>
                                            <td>{{ $offer->title }}</td>
                                            <td>${{ number_format($offer->price, 2) }}</td>
                                            <td>{{ $offer->discount }}%</td>
                                            <td>${{ number_format($offer->discounted_price, 2) }}</td>

                                            <td>
                                                @if($offer->image)
                                                    <img height="80" width="80"
                                                         src="{{ asset('uploads/offers/thumbnails/' . $offer->image) }}" />
                                                @else
                                                    No Image
                                                @endif
                                            </td>

                                            <td>
                                                @if($offer->is_active)
                                                    <span class="label label-success">Active</span>
                                                @else
                                                    <span class="label label-danger">Inactive</span>
                                                @endif
                                            </td>

                                            <td>
                                                @if($offer->end_date)
                                                    {{ date('d M Y', strtotime($offer->end_date)) }}
                                                @else
                                                    No expiry
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('offer.destroy', $offer->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <a href="{{ route('offer.edit', $offer->id) }}"
                                                       class="btn btn-primary btn-sm">
                                                        Edit
                                                    </a>

                                                    <button type="submit"
                                                            class="btn btn-danger btn-sm delete"
                                                            onclick="return confirm('You want to delete?');">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <h3>No Offers Added</h3>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection