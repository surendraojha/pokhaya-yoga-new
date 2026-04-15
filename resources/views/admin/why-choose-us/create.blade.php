@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="page-header">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li>Create</li>
            </ul>
            <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">Add Why Choose Us Section</div>
                    </div>
                    <div class="panel-body">
                        {{ Form::open(['method' => 'post', 'route' => 'why-choose-us.store', 'files' => true]) }}
                            @include('admin.why-choose-us.form')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection