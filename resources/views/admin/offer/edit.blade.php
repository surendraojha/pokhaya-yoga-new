@extends('layouts.admin')
@section('content')

<div class="content">

    <div class="page-header">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li>Offer</li>
                <li>Edit</li>
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
                            <h3>Edit Offer</h3>
                        </div>
                    </div>
                    
                    <div class="panel-body">
                        {{ Form::model($information, [
                            'method' => 'patch',
                            'route' => ['offer.update', $information->id],
                            'files' => true
                        ]) }}
                        
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