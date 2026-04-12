<div class="form-group">
    {{ Form::label('category', 'Team Category') }}
    {{ Form::select('team_category_id', $categories, null, ['class' => 'form-control', 'required']) }}
</div>
<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('content', 'Content') }}
    {{ Form::textarea('content', null, ['class' => 'form-control', 'id' => 'summernote']) }}
</div>

<div class="form-group">
    {{ Form::label('image', 'Image') }}
    {{ Form::file('image', null, ['class' => 'form-control']) }}
</div>


<div class="form-group">
    {{ Form::label('meta_keyword', 'Meta Keyword') }}
    {{ Form::textarea('meta_keyword', null, ['class' => 'form-control', 'rows' => '3']) }}
</div>
<div class="form-group">
    {{ Form::label('meta_des', 'Meta Description') }}
    {{ Form::textarea('meta_des', null, ['class' => 'form-control', 'rows' => '3']) }}
</div>
<div class="form-group">
    {{ Form::label('meta_title', 'Meta Title') }}
    {{ Form::textarea('meta_title', null, ['class' => 'form-control', 'rows' => '3']) }}
</div>

<div class="form-group">
    {{ Form::label('order', 'Order') }}
    {{ Form::text('order', null, ['class' => 'form-control', 'required']) }}
</div>



<div class="form-group">
    <button type="submit" class="btn btn-success">Save</button>
</div>
