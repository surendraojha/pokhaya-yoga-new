<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control', 'required']) }}
</div>
<div class="form-group">
    {{ Form::label('content', 'Content') }}
    {{ Form::textarea('content', null, ['class' => 'form-control', 'id' => 'summernote', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('url', 'Video URL') }}
    {{ Form::text('url', null, ['class' => 'form-control', 'required']) }}
</div>


<div class="form-group">
    <button type="submit" class="btn btn-success">Save</button>
</div>
