@extends('layouts.admin')
@section('content')

<div class="content">

    <div class="page-header">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li>Edit Accommodation & Food</li>
            </ul>
            <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-sm-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title"></div>

                        {{ Form::model($accommodationAndFood, [
                            'method' => 'patch',
                            'route' => ['accommodation-and-foods.update', $accommodationAndFood->id],
                            'files' => true
                        ]) }}

                        @include('admin.accommodation-and-foods.form')

                        {{ Form::close() }}

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection