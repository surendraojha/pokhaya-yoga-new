<div class="form-group">
    {{ Form::label('category', 'Category') }}
    {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'required']) }}
</div>
<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}
</div>

<div class="form-group">
    {{ Form::label('content', 'Content') }}
    {{ Form::textarea('content', null, ['class' => 'form-control', 'id' => 'summernote']) }}
</div>

<div class="form-group">
    {{ Form::label('order', 'Order') }}
    {{ Form::number('order', null, ['class' => 'form-control', 'id' => 'title']) }}
</div>

<div class="form-group">
<input type="submit" value="save" class="btn btn-info">
	
	</div>