@extends('layouts.admin')
@section('content')

<div class="content">


    <div class="page-header">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li> Customers</li>
            </ul>

            <ul class="breadcrumb-elements">
                <a href="{{ action('Admin\CustomerController@create') }} " class="btn btn-success">Create </a>
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
                                    {{-- <th>Gender</th> --}}
                                    {{-- <th>Nationality</th> --}}
                                    {{-- <th>DOB</th> --}}
                                    {{-- <th>Address</th> --}}
                                    {{-- <th>Image</th> --}}
                                    {{-- <th>Contact</th> --}}
                                    <th>Earnings</th>
                                    {{-- <th>Status</th> --}}
                                    <th>Action</th>
                                </tr>
                                @php $sn =1 @endphp
                                @foreach($informations as $k => $information)
                                <tr>
                                    <td>{{$sn++}}</td>
                                    <td>{{$information->name}}</td>
                                    <td>{{$information->email}}</td>
                                    {{-- <td>{{$information->gender}}</td> --}}
                                    {{-- <td>{{$information->nationality}}</td> --}}
                                    {{-- <td>{{$information->dob}}</td> --}}
                                    {{-- <td>{{$information->address}}</td> --}}
                                    {{-- <td>{{$information->image}}</td> --}}
                                    {{-- <td>{{$information->contact}}</td> --}}
                                    <td>{{$information->referred_earning}}</td>



                                    <td>

                                        {{ Form::open(['method' => 'delete', 'action' => ['Admin\CustomerController@destroy', $information->id]]) }}
                                        <a href="{{ action('Admin\CustomerController@edit', $information->id) }}"
                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"> </i></a>
                                        {{-- <a href="{{ action('Front\FrontController@singlePage', $information->id) }}"
                                        class="btn btn-info btn-sm" target="_blank"><i class="fa fa-eye"> </i></a> --}}
                                        <button type="submit" class="btn btn-danger btn-sm delete"
                                            onclick="return confirm('You Want to Delete?');"><i class="fa fa-trash">
                                            </i></button>
                                        {{ Form::close() }}


                                        @if($information->referred_earning >0)
                                        <a class="btn btn-success"
                                            onclick="return confirm('are you sure you want to clear payment. clear payment means you have paid them their reward')"
                                            href="{{ route('clear.payment',$information->id) }}">Clear Payment</a>
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
