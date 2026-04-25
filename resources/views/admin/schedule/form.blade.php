@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    {{ Form::label('class_id', 'Yoga Class') }}
    {{ Form::select('class_id', $yogaClasses->pluck('title', 'id'), old('class_id', isset($schedule) ? $schedule->class_id : null), ['class' => 'form-control', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', old('title', isset($schedule) ? $schedule->title : null), ['class' => 'form-control', 'placeholder' => 'e.g., Morning Session', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('subtitle', 'Subtitle') }}
    {{ Form::text('subtitle', old('subtitle', isset($schedule) ? $schedule->subtitle : null), ['class' => 'form-control', 'placeholder' => 'e.g., Beginner Friendly']) }}
</div>

<div class="form-group">
    {{ Form::label('content', 'Content') }}
    {{ Form::textarea('content', old('content', isset($schedule) ? $schedule->content : null), ['class' => 'form-control', 'id' => 'summernote', 'required']) }}
</div>

<div class="form-group">
    {{ Form::submit(isset($schedule) ? 'Update Schedule Entry' : 'Create Schedule Entry', ['class' => 'btn btn-primary']) }}
    <a href="{{ route('schedule.index') }}" class="btn btn-secondary">Cancel</a>
</div>
