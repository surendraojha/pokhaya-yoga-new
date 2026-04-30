@extends('layouts.admin')
@section('content')

    <div class="content card">

        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{ route('sound-healing.index') }}">Sound Healing</a></li>
                    <li>Edit</li>
                </ul>
            </div>
        </div>

        <div class="content card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{ Form::model($information, ['route' => ['sound-healing.update', $information->id], 'method' => 'PUT', 'files' => true]) }}

                                @include('admin.sound-healing.form')

                                <div class="form-group mt-3">
                                    <input type="submit" value="Update" class="btn btn-info">
                                    <a href="{{ route('sound-healing.index') }}" class="btn btn-default">Cancel</a>
                                </div>

                            {{ Form::close() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
