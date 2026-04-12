<div class="form-group">
    {{ Form::label('category', 'Photo Category') }}
    {{ Form::select('photo_category_id', $categories, null, ['class' => 'form-control', 'required']) }}
</div>
<div class="form-group">
    {{ Form::label('capture', 'Capture') }}
    {{ Form::text('title', null, ['class' => 'form-control', 'required']) }}
</div>
<div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::text('description', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('image', 'Image') }}
    <input type="file" class="form-control" name="image[]" multiple>
</div>




<div class="form-group">
    <button type="submit" class="btn btn-success">Save</button>
</div>
