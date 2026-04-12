@extends('layouts.admin')
@section('content')

	 <div class="content card">


<div class="page-header card-body">
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
            {{ Form::open(['method' => 'post', 'action' => 'Admin\FaqController@store', 'files' => true]) }}
                        {{-- @include('admin.faq.form') --}}
                        <div class="form-group">
                            {{ Form::label('slug', 'Slug of page') }}
                            {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
                        </div>


                        <div class="form-group row">
                            <div class="col-md-12 col-form-label text-md-left">
                                <div class="field_wrapper">
                                    <div class="col">
                                        <table class="table table-bordered table-responsive"
                                            id="faq_table">
                                            <tr>
                                                <th>Question</th>
                                                <th>Answer</th>
                                            </tr>
                                            <tr>
                                                <button type="button" name="faq_add" id="faq_add"
                                                    class="add_more_btn btn btn-success">Add More</button>

                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                        <input type="submit" value="save" class="btn btn-info">

                            </div>

                        {{ Form::close() }}
                </div>



</div>
        </div>
    </div>
    </div>


                    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

{{-- <td><input type="text" name="faq[` + index + `][question]" placeholder="Enter question " class="form-control "   /></td> --}}
 {{-- <input type="text" name="faq[` + index + `][answer]" placeholder="Enter answer" class="form-control"  /> --}}

<script>

      $('#faq_add').on('click', function() {

        var index = $('#faq_table tr').length;
        var $newFaq = $(`<tr>
                    <td><textarea name="faq[` + index + `][question]" cols="50" rows="4"></textarea></td>
                    <td><textarea name="faq[` + index + `][answer]" class="textarea form-control" cols="50" rows="4"></textarea></td>
                    <td><button type="button" name="remove-faq-row" id="faq_add" class="btn btn-danger remove-faq-row">Remove</button></td>
            </tr> `);

            $('#faq_table').append($newFaq);
            $('#faq_table').find('.textarea').summernote();
        });

        $('#faq_table').on('click', '.remove-faq-row', function(e) {
        $(e.target).closest('#faq_table tr').remove();
        });


</script>



@endsection
