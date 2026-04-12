
<div class="form-group">
    {{ Form::label('category', 'Fee Category') }}
    {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'required']) }}
</div>
<div class="form-group">
    {{ Form::label('from', 'From') }}
    {{ Form::text('from', null, ['class' => 'form-control', 'id' => 'title']) }}
</div>
<div class="form-group">
    {{ Form::label('to', 'To') }}
    {{ Form::text('to', null, ['class' => 'form-control', 'id' => 'title']) }}
</div>

<div class="form-group">
    {{ Form::label('place', 'Place') }}
    {{ Form::text('place', null, ['class' => 'form-control', 'id' => 'title']) }}
</div>

<div class="form-group">
    {{ Form::label('share_room', 'Share Room') }}
    {{ Form::text('share_room', null, ['class' => 'form-control', 'id' => 'title']) }}
</div>

<div class="form-group">
    {{ Form::label('private_room', 'Private Room') }}
    {{ Form::text('private_room', null, ['class' => 'form-control', 'id' => 'title']) }}
</div>

<div class="form-group">
    {{ Form::label('triple_room', 'Triple Room') }}
    {{ Form::text('triple_room', null, ['class' => 'form-control', 'id' => 'triple_room']) }}
</div>

<div class="form-group">
    {{ Form::label('order', 'Order') }}
    {{ Form::number('order', null, ['class' => 'form-control', 'id' => 'title']) }}
</div>

<div class="form-group">
<input type="submit" value="save" class="btn btn-info">
	
	</div>