<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('content', 'Content') }}
    {{ Form::textarea('content', null, ['class' => 'form-control', 'rows' => '3']) }}
</div>

<div class="form-group">
    {{ Form::label('url', 'Video URL') }}
    {{ Form::text('url', null, ['class' => 'form-control', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('image', 'Thumbnail Image') }}
    {{ Form::file('image', ['class' => 'form-control']) }}
</div>

@if(isset($information) && $information->image)
    <div class="form-group">
        <label>Current Image</label><br>
        <img src="{{ asset('uploads/video-testimonial/' . $information->image) }}" height="100px">
    </div>
@endif

<div class="form-group">
    <button type="submit" class="btn btn-success">Save</button>
</div>