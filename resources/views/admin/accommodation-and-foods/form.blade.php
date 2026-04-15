<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control', 'required' => true]) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', null, [
        'class' => 'form-control',
        'id' => 'summernote',
        'rows' => 4
    ]) }}
</div>

<div class="form-group">
    {{ Form::label('link', 'Link (URL for "Read More")') }}
    {{ Form::url('link', null, ['class' => 'form-control', 'placeholder' => 'https://...']) }}
    <small class="text-muted">Optional – if empty, the button will link to "#"</small>
</div>

<div class="form-group">
    {{ Form::label('image', 'Image') }}
    {{ Form::file('image', ['class' => 'form-control']) }}

    @if(isset($accommodationAndFood) && $accommodationAndFood->image)
    <br>
    <img src="{{ asset($accommodationAndFood->image) }}" style="height: 120px;">
    @endif
</div>

<div class="form-group">
    {{ Form::label('sort_order', 'Sort Order') }}
    {{ Form::number('sort_order', null, ['class' => 'form-control', 'placeholder' => '0, 1, 2...']) }}
    <small class="text-muted">Lower numbers appear first</small>
</div>

<div class="form-group">
    <label>
        {{ Form::checkbox('is_active', 1, null) }} Active
    </label>
    <small class="text-muted d-block">Uncheck to hide this item from frontend</small>
</div>

<input type="submit" value="Save" class="btn btn-success">