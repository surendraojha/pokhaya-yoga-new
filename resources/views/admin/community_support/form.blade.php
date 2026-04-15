<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', null, [
        'class' => 'form-control',
        'id' => 'summernote'
    ]) }}
</div>

<hr>
<h4>Statistics</h4>

<div id="stats-wrapper">

    @if(!empty($information->stats) && is_array($information->stats))
    @foreach($information->stats as $stat)
    <div class="form-group stat-item">
        <div style="display:flex; gap:10px;">
            <input type="text"
                name="stats[]"
                value="{{ $stat }}"
                class="form-control">

            <button type="button" class="btn btn-danger remove-stat">X</button>
        </div>
    </div>
    @endforeach
    @else
    <div class="form-group stat-item">
        <div style="display:flex; gap:10px;">
            <input type="text"
                name="stats[]"
                class="form-control"
                placeholder="Enter stat">

            <button type="button" class="btn btn-danger remove-stat">X</button>
        </div>
    </div>
    @endif

</div>

<button type="button" id="add-stat" class="btn btn-primary mt-2">
    + Add Stat
</button>

<hr>

<div class="form-group">
    {{ Form::label('image', 'Image') }}
    {{ Form::file('image', ['class' => 'form-control']) }}

    @if(isset($information) && $information->image)
    <br>
    <img src="{{ asset('uploads/community/' . $information->image) }}"
        style="height: 120px;">
    @endif
</div>

<input type="submit" value="Save" class="btn btn-success">