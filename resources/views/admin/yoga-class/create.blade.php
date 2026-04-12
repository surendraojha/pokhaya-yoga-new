
@extends('layouts.admin')
@section('content')

	 <div class="content card">


<div class="page-header">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>Create</li>
        </ul>

        <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
</div>
<div class="content card-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">

            </div>
            {{ Form::open(['method' => 'post', 'action' => 'Admin\YogaClassController@store', 'files' => true]) }}
                        @include('admin.yoga-class.form')

                        {{-- <div class="form-group row">
                            <div class="col-md-12 col-form-label text-md-left">
                                <div class="field_wrapper">
                                    <div class="col">
                                        <table class="table table-bordered table-responsive"
                                            id="video_table">
                                            <tr>
                                                <th>Url</th>
                                            </tr>
                                            <tr>
                                                <button type="button" name="video_add" id="video_add"
                                                    class="add_more_btn btn btn-success">Add More Videos</button>

                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <input type="submit" value="save" class="btn btn-info">

                        {{ Form::close() }}
                </div>



</div>
        </div>
    </div>
    </div>


                    </div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>

    $('#video_add').on('click', function() {

    var index = $('#video_table tr').length;
    var $newVideo = $(`<tr>
                <td><textarea name="video[` + index + `][url]"  cols="50" rows="4"></textarea></td>
                <td><button type="button" name="remove-video-row" id="video_remove" class="btn btn-danger remove-video-row">Remove</button></td>
        </tr> `);

        $('#video_table').append($newVideo);
        $('#video_table').find('.textarea');
    });

    $('#video_table').on('click', '.remove-video-row', function(e) {
    $(e.target).closest('#video_table tr').remove();
    });


</script>




@endsection
