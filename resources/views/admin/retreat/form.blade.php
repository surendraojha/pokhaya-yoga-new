
<div class="form-group">
    {{ Form::label('from', 'From') }}
    {{ Form::text('from', null, ['class' => 'form-control', 'id' => 'title']) }}
</div>
<div class="form-group">
    {{ Form::label('to', 'To') }}
    {{ Form::text('to', null, ['class' => 'form-control', 'id' => 'title']) }}
</div>
<div class="form-group">
    {{ Form::label('nights', 'Nights') }}
    {{ Form::text('nights', null, ['class' => 'form-control', 'id' => 'title']) }}
</div>
<div class="form-group">
    {{ Form::label('days', 'Days') }}
    {{ Form::text('days', null, ['class' => 'form-control', 'id' => 'title']) }}
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
    {{ Form::label('price', 'Price') }}
    {{ Form::text('price', null, ['class' => 'form-control', 'id' => 'title']) }}
</div>
<div class="form-group">
    {{ Form::label('order', 'Order') }}
    {{ Form::number('order', null, ['class' => 'form-control', 'id' => 'title']) }}
</div>
<div class="form-group">
<input type="submit" value="save" class="btn btn-info">

	</div>
