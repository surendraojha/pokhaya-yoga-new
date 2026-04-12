@extends('layouts.admin')
@section('content')

     <div class="content">


<div class="page-header">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>Video Testimonial </li>
        </ul>
        <ul class="breadcrumb-elements">
            <a href="{{ action('Admin\VideoTestimonialController@create') }} " class="btn btn-success">Create </a>
        </ul>
        <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
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
                    <th>Sn:</th>
                    <th>Video Title:</th>
                    <th>Action</th>
                </tr>
                 @php $sn =1 @endphp
             @foreach($informations as $k => $information)
                <tr>
                    <td>{{$sn++}}</td>
                    <td>{{$information->title}}</td>
                    <td>
                        {{ Form::open(['method' => 'delete', 'action' => ['Admin\VideoTestimonialController@destroy', $information->id]]) }}
                        <a href="{{ action('Admin\VideoTestimonialController@edit', $information->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm delete">Delete</button>
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
