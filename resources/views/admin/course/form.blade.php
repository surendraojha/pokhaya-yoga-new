<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}
</div>
<div class="form-group">
    {{ Form::label('slug', 'Slug') }}
    {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
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
<input type="submit" value="save" class="btn btn-info">
	
	</div>