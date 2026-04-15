<div class="form-group">
    <label>Title</label>
    {{ Form::text('title', null, ['class' => 'form-control', 'required']) }}
</div>

<div class="form-group">
    <label>Content</label>
    {{ Form::textarea('content', null, [
    'class' => 'form-control',
    'id' => 'summernote'
]) }}
</div>

<div class="form-group">
    <label>Video URL</label>
    {{ Form::text('video', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    <button class="btn btn-success">Save</button>
</div>