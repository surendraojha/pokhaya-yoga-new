<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', old('title', $information->title ?? null), ['class' => 'form-control', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('calendar_title', 'Calendar Title') }}
    {{ Form::text('calendar_title', old('calendar_title', $information->calendar_title ?? null), ['class' => 'form-control', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('meeting_location', 'Meeting Location') }}
    {{ Form::text('meeting_location', old('meeting_location', $information->meeting_location ?? null), ['class' => 'form-control', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('meeting_duration', 'Meeting Duration (minutes)') }}
    {{ Form::number('meeting_duration', old('meeting_duration', $information->meeting_duration ?? null), ['class' => 'form-control', 'required', 'min' => 1]) }}
</div>

<hr>

<div class="form-group">
    <label>Timezone Configurations</label>

    <div id="timezone-container">
        @php
            $timezones = old('timezones', $information->timezone_configurations ?? []);
        @endphp

        @foreach($timezones as $index => $config)
            <div class="timezone-row mb-3 p-3 border rounded">
                <div class="row">
                    <div class="col-md-5">
                        <label>Timezone</label>
                        <select name="timezones[{{ $index }}][timezone]" class="form-control" required>
                            @foreach(timezone_identifiers_list() as $tz)
                                <option value="{{ $tz }}" {{ ($config['timezone'] ?? '') === $tz ? 'selected' : '' }}>
                                    {{ $tz }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-5">
                        <label>Time Slots</label>
                        <input type="text" name="timezones[{{ $index }}][time_slots]"
                            value="{{ is_array($config['time_slots']) ? implode(',', $config['time_slots']) : $config['time_slots'] }}"
                            class="form-control">
                    </div>

                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger mt-4 remove-timezone">Remove</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <button type="button" id="add-timezone" class="btn btn-success mt-2">Add Timezone</button>
</div>

<div class="form-group mt-3">
    <button type="submit" class="btn btn-primary">Save</button>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let timezoneIndex = {{ count($timezones ?? []) }};

        document.getElementById('add-timezone').addEventListener('click', function () {
            const container = document.getElementById('timezone-container');

            const row = `
            <div class="timezone-row mb-3 p-3 border rounded">
                <div class="row">
                    <div class="col-md-5">
                        <label>Timezone</label>
                        <select name="timezones[${timezoneIndex}][timezone]" class="form-control" required>
                            ${getTimezoneOptions()}
                        </select>
                    </div>

                    <div class="col-md-5">
                        <label>Time Slots</label>
                        <input type="text"
                               name="timezones[${timezoneIndex}][time_slots]"
                               class="form-control"
                               placeholder="1:00 pm, 2:00 pm"
                               required>
                    </div>

                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger mt-4 remove-timezone">Remove</button>
                    </div>
                </div>
            </div>
        `;

            container.insertAdjacentHTML('beforeend', row);
            timezoneIndex++;
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-timezone')) {
                e.target.closest('.timezone-row').remove();
            }
        });

        function getTimezoneOptions() {
            return `{!! collect(timezone_identifiers_list())->map(fn($tz) => "<option value='$tz'>$tz</option>")->implode('') !!}`;
        }
    });
</script>