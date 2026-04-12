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
