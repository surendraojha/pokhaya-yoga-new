@section("title", "Bookings List")

@extends('layouts.admin')

@section('content')

    <div class="content">


        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li> Bookings</li>
                </ul>

                <ul class="breadcrumb-elements">
                    <a href="{{ route('bookings.create') }} " class="btn btn-success">Create </a>
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
                                @if($informations->isNotEmpty())
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Sn.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Total Attendance</th>
                                            <th>Room Type</th>
                                            <th>Actual Price</th>
                                            <th>Amount to be paid</th>
                                            <th>Referred By</th>
                                            <th>Created At</th>
                                            {{-- <th>Status</th> --}}
                                            <th>Action</th>
                                        </tr>
                                        @php $sn = 1 @endphp
                                        @foreach($informations as $k => $information)
                                            <tr>
                                                <td>{{$sn++}}</td>
                                                <td>{{$information->name}}</td>
                                                <td>{{$information->email}}</td>
                                                <td>{{$information->phone}}</td>
                                                <td>{{$information->address}}</td>
                                                <td>{{$information->numberOfAttendants}}</td>
                                                <td>{{$information->room_type}}</td>
                                                <td>{{$information->actual_price}}</td>
                                                <td>{{ $information->amount_to_be_paid }}</td>
                                                <td>


                                                    {{$information->customer_name}}

                                                </td>
                                                <td>{{$information->created_at}}</td>

                                                {{-- <td><img src="{{asset('uploads/'.$information->image)}}" style="height: 100px">
                                                </td> --}}
                                                <td>
                                                    {{ Form::open(['method' => 'delete', 'route' =>
                                                    ['bookings.destroy', $information->id]]) }}
                                                    <a href="{{ route('bookings.edit', $information->id) }}"
                                                        class="btn btn-primary btn-sm"><i class="fa fa-edit"> </i></a>
                                                    <button type="submit" class="btn btn-danger btn-sm delete"
                                                        onclick="return confirm('You Want to Delete?');"><i class="fa fa-trash">
                                                        </i></button>
                                                    {{ Form::close() }}


                                                    @if($information->status == 0)

                                                        <p>Unpaid</p>

                                                        <a href="{{url('admin/bookings/status/' . $information->id)}}">
                                                            Mark as paid</a>
                                                    @else
                                                        <p>Paid</p>

                                                    @endif
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