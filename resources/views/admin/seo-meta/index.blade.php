@extends('layouts.admin')
@section('content')

     <div class="content card">


<div class="page-header">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li> Seo Meta Tags</li>
        </ul>

        <ul class="breadcrumb-elements">
            <a href="{{ action('Admin\SeoMetaController@create') }} " class="btn btn-success">Create </a>
        </ul>

        <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
</div>
<div class=" card-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        @if($informations->isNotEmpty())
                        <table class="table table-striped">
                    <tr>


                    <th>Sn.</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Auth</th>
                    <th>Seo Keyword</th>
                    <th>Seo Des</th>
                    <th>Meta Title</th>
                    <th>Created At</th>




                    <th>Action</th>
                </tr>
                @php $sn =1 @endphp
             @foreach($informations as $k => $information)
                <tr>
                    <td>{{$sn++}}</td>
                    <td>{{$information->name}}</td>
                    <td>{{$information->title}}</td>
                    <td>{{$information->auth}}</td>
                    <td>{{$information->meta_keyword}}</td>
                    <td>{{$information->meta_des}}</td>
                    <td>{{$information->meta_title}}</td>
                    <td> {{ $information->created_at }} </td>






                                                            <td>
                                            {{ Form::open(['method' => 'delete', 'action' => ['Admin\SeoMetaController@destroy', $information->id]]) }}
                                            <a href="{{ action('Admin\SeoMetaController@edit', $information->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"> </i></a>

                    <button type="submit" class="btn btn-danger btn-sm delete" onclick="return confirm('You Want to Delete?');"><i class="fa fa-trash"> </i></button>
                                            {{ Form::close() }}
                                        </td>
                </tr>

             @endforeach

                </table>
                @else
                <h3>No information Added</h3>
                @endif
            </div>
                </div>


</div>
        </div>
    </div>
    </div>


                    </div>








@endsection
