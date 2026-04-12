@extends('layouts.admin')
@section('content')

     <div class="content card">
        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li>Edit </li>
                </ul>
                <ul class="breadcrumb-elements">
                </ul>
                <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
            </div>
        </div>
        <div class="content card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">

                            </div>
                                {{ Form::model($information, ['method' => 'patch', 'action' => ['Admin\FaqController@update', $information->id],'files' => true]) }}
                                {{-- @include('admin.faq.form') --}}
                                <div class="form-group">
                                    {{ Form::label('slug', 'Slug of page') }}
                                    {{ Form::text('slug', $information->page_slug, ['class' => 'form-control', 'id' => 'slug']) }}
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12 col-form-label text-md-left">
                                        <div class="field_wrapper">
                                            <div class="col">
                                                <table class="table table-bordered table-responsive"
                                                    id="faq_table">
                                                    <tr>
                                                        <th>Questions</th>
                                                        <th>Answers</th>
                                                        <th>Action</th>
                                                    </tr>


                                                    @if ($information->faq_content)
                                                        @foreach ($information->faq_content as $key => $faq)

                                                            <tr>
                                                                @if ($faq)
                                                                <td>
                                                                    <textarea name="faq[{{ $key }}][question]" id="" cols="50" rows="4">{{ $faq['question'] }}</textarea>
                                                                </td>

                                                                <td>
                                                                    <textarea name="faq[{{ $key }}][answer]" id="" class="textarea form-control"  cols="50" rows="4">{{ $faq['answer'] }}</textarea>
                                                                </td>

                                                                @endif
                                                                <td>
                                                                    <button type="button"
                                                                        class="remove-faq-row btn btn-danger"
                                                                        data-id="{{ $information->id }}"
                                                                        value="{{ $key }}-faq"
                                                                        class="btn btn-success">Remove</button>
                                                                </td>
                                                            </tr>

                                                        @endforeach
                                                    @endif
                                                    <button type="button" name="faq_add"
                                                        id="faq_add"
                                                        class="add_more_btn btn btn-success">Add
                                                        New</button>
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


<script>
    $(document).ready(function() {

        $('#faq_add').on('click', function() {
            var index = $('#faq_table tr').length;
            var $newFaq = $(`<tr>
                    <td><textarea name="faq[` + index + `][question]"  cols="50" rows="4"></textarea></td>
                    <td><textarea name="faq[` + index + `][answer]" class="textarea form-control" cols="50" rows="4"></textarea></td>
                    <td><button type="button" name="remove-faq-row" id="faq_add" class="btn btn-danger remove-faq-row">Remove</button></td>
                  </tr> `);

                $('#faq_table').append($newFaq);
                $('#faq_table').find('.textarea').summernote();

        });

        $('#faq_table').on('click', '.remove-faq-row', function(e) {
            $(e.target).closest('#faq_table tr').remove();
        });
    });

 </script>

@endsection
