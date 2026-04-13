@extends('layouts.admin')
@section('content')

	 <div class="content">


<div class="page-header">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>Testimonial</li>
        </ul>

        <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
</div>
<div class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">

            </div>
            {{ Form::open(['method' => 'post', 'route' => 'testimonial.store', 'files' => true ] ) }}

            @csrf
            
            @include('admin.testimonial.form')
                        {{ Form::close() }}
                </div>



</div>
        </div>
    </div>
    </div>


                    </div>

@endsection






