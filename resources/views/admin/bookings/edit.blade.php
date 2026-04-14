@extends('layouts.admin')

@section("title", "Edit Bookings")

@section('content')

<div class="content">
    <div class="page-header">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li>Edit </li>
            </ul>
            <ul class="breadcrumb-elements">
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
                        </div>
                        {{ Form::model($information, ['method' => 'patch', 'route' => ['bookings.update', $information->id],'files' => true]) }}
                            @include('admin.bookings.form')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>








@endsection
