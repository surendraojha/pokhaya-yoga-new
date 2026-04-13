@extends('layouts.admin')
@section('content')

    <div class="content card">


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
        <div class="content card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">

                            </div>
                            {{ Form::model($slider, ['method' => 'patch', 'route' => ['slider.update', $slider->id], 'files' => true]) }}
                            @include('admin.slider.form')

                            {{ Form::close() }}
                        </div>



                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection