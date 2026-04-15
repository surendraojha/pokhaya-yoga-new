@extends('layouts.admin')
@section('content')

<div class="content">

    <div class="page-header">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li>Offer</li>
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
                        <div class="panel-title">
                            <h3>Create New Offer</h3>
                        </div>
                    </div>
                    
                    <div class="panel-body">
                        {{ Form::open(['method' => 'post', 'route' => 'offer.store', 'files' => true]) }}
                        
                        @csrf
                        
                        @include('admin.offer.form')
                        
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection