{{-- resources/views/admin/sound-healing/partials/form.blade.php --}}

<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}
</div>

<div class="form-group">
    {{ Form::label('location', 'Location') }}
    {{ Form::text('location', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('image', 'Image') }}
    {{ Form::file('image', ['class' => 'form-control']) }}
    @if (!empty($information->image))
        <div class="mt-1">
            <img src="{{ asset('uploads/' . $information->image) }}" style="height: 80px;">
        </div>
    @endif
</div>

<div class="form-group">
    {{ Form::label('background_image', 'Background Image') }}
    {{ Form::file('background_image', ['class' => 'form-control']) }}
    @if (!empty($information->background_image))
        <div class="mt-1">
            <img src="{{ asset('uploads/' . $information->background_image) }}" style="height: 80px;">
        </div>
    @endif
</div>

<div class="form-group">
    {{ Form::label('content', 'Content') }}
    {{ Form::textarea('content', null, ['class' => 'form-control', 'id' => 'summernote']) }}
</div>


<h5>Room Pricing</h5>

<div class="form-group">
    {{ Form::label('tripe_room', 'Triple Room') }}
    {{ Form::text('tripe_room', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('shared_room', 'Shared Room') }}
    {{ Form::text('shared_room', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('private_room', 'Private Room') }}
    {{ Form::text('private_room', null, ['class' => 'form-control']) }}
</div>

<hr>
<h5>What to Expect</h5>

<div class="form-group">
    {{ Form::label('what_to_expect_title', 'What to Expect Title') }}
    {{ Form::textarea('what_to_expect_title', null, ['class' => 'form-control', 'rows' => '2']) }}
</div>

<div class="form-group">
    {{ Form::label('what_to_expect_subtitle', 'What to Expect Subtitle') }}
    {{ Form::textarea('what_to_expect_subtitle', null, ['class' => 'form-control', 'rows' => '2']) }}
</div>

<div class="form-group">
    {{ Form::label('what_to_expect', 'What to Expect') }}
    {{ Form::textarea('what_to_expect', null, ['class' => 'form-control', 'rows' => '4']) }}
</div>

<hr>
<h5>Teacher Stats</h5>
<div class="form-group">
    {{ Form::label('teacher_id', 'Teacher') }}
    {{ Form::select('teacher_id', $teachers->pluck('name', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Select Teacher']) }}
</div>

<hr>
<div class="form-group">
    {{ Form::label('student_taught', 'Students Taught') }}
    {{ Form::text('student_taught', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('experience_year', 'Years of Experience') }}
    {{ Form::text('experience_year', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('workshop_lead', 'Workshops Led') }}
    {{ Form::text('workshop_lead', null, ['class' => 'form-control']) }}
</div>
