{{-- resources/views/admin/sound-healing-sessions/partials/form.blade.php --}}

<div class="form-group">
    {{ Form::label('sound_healing_id', 'Sound Healing') }}
    {{ Form::select('sound_healing_id', $soundHealings->pluck('title', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Select Sound Healing']) }}
</div>

<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('date', 'Date') }}
    {{ Form::date('date', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('time', 'Time') }}
    {{ Form::text('time', null, ['class' => 'form-control', 'placeholder' => 'e.g. 10:00 AM - 12:00 PM']) }}
</div>

<div class="form-group">
    {{ Form::label('spots_left', 'Spots Left') }}
    {{ Form::text('spots_left', null, ['class' => 'form-control', 'placeholder' => 'e.g. 5']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::text('description', null, ['class' => 'form-control']) }}
</div>
