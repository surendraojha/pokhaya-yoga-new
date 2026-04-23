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
    {{ Form::label('day', 'Day') }}
    {{ Form::select('day', $days, old('day', isset($schedule) ? $schedule->day : null), ['class' => 'form-control', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('class_id', 'Yoga Class') }}
    {{ Form::select('class_id', $yogaClasses->pluck('title', 'id'), old('class_id', isset($schedule) ? $schedule->class_id : null), ['class' => 'form-control', 'required']) }}
</div>

@if (isset($schedule))
    <div class="form-group">
        {{ Form::label('time_slot', 'Time Slot') }}
        {{ Form::text('time_slot', old('time_slot', isset($schedule) ? $schedule->time_slot : null), ['class' => 'form-control', 'placeholder' => 'e.g., 5:30 - 6:30', 'required']) }}
    </div>

    <div class="form-group">
        {{ Form::label('activity', 'Activity') }}
        {{ Form::text('activity', old('activity', isset($schedule) ? $schedule->activity : null), ['class' => 'form-control', 'placeholder' => 'e.g., Self-Meditation', 'required']) }}
    </div>
@else
    <div class="form-group">
        <label class="form-label">Schedule Entries</label>
        <div id="schedule-entries">
            @php
                $oldEntries = old('entries', [['time_slot' => '', 'activity' => '']]);
            @endphp

            @foreach ($oldEntries as $index => $entry)
                <div class="schedule-entry row mb-3 g-2 align-items-end">


                    <div class="col-md-5">
                        <label for="entries_{{ $index }}_time_slot" class="form-label">Time Slot</label>
                        <input type="text" name="entries[{{ $index }}][time_slot]"
                            id="entries_{{ $index }}_time_slot" value="{{ $entry['time_slot'] ?? '' }}"
                            class="form-control" placeholder="e.g., 5:30 - 6:30" required>
                    </div>
                    <div class="col-md-5">
                        <label for="entries_{{ $index }}_activity" class="form-label">Activity</label>
                        <input type="text" name="entries[{{ $index }}][activity]"
                            id="entries_{{ $index }}_activity" value="{{ $entry['activity'] ?? '' }}"
                            class="form-control" placeholder="e.g., Self-Meditation" required>
                    </div>
                    <div class="col-md-2 d-grid">
                        <button type="button"
                            class="btn btn-danger remove-entry"{{ $index === 0 ? ' disabled' : '' }}>
                            Remove
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-secondary" id="add-schedule-entry">
            Add another time slot
        </button>
    </div>
@endif

<div class="form-group">
    {{ Form::submit(isset($schedule) ? 'Update Schedule Entry' : 'Create Schedule Entry', ['class' => 'btn btn-primary']) }}
    <a href="{{ route('schedule.index') }}" class="btn btn-secondary">Cancel</a>
</div>
