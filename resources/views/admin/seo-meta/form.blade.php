<div class="form-group">
    {{ Form::label('name', 'name') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('auth', 'Auth') }}
    {{ Form::text('auth', null, ['class' => 'form-control', 'id' => 'title']) }}
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
<input type="submit" value="save" class="btn btn-info">

	</div>
