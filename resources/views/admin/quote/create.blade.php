@extends('layouts.admin')
@section('content')

<div class="content">

    <div class="page-header">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li>Quotes</li>
                <li>Create</li>
            </ul>

            <ul class="breadcrumb-elements">
                <a href="{{ route('quote.index') }}" class="btn btn-success">Back</a>
            </ul>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-sm-12">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Create Quote</h3>
                    </div>

                    <div class="panel-body">

                        {{ Form::open(['route' => 'quote.store', 'method' => 'POST']) }}

                            @include('admin.quote.form')

                            <button type="submit" class="btn btn-primary">
                                Save Quote
                            </button>

                            <a href="{{ route('quote.index') }}" class="btn btn-default">
                                Cancel
                            </a>

                        {{ Form::close() }}

                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

@endsection