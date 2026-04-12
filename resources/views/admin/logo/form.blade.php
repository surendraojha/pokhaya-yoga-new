<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('Logo', 'logo') }}
    {{ Form::file('logo', null, ['class' => 'form-control']) }}
</div>
<input type="submit" value="Add" class="btn btn-success">