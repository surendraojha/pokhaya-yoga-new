
<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('url', 'Url of Page') }}
    {{ Form::text('url', null, ['class' => 'form-control']) }}
</div>


<div class="form-group">
    <button type="submit" class="btn btn-success">Save</button>
</div>
