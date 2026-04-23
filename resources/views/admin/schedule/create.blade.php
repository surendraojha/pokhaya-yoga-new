@extends('layouts.admin')
@section('content')

    <div class="content card">

        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li>Create Schedule</li>
                </ul>
                <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a
                    class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            </div>
        </div>

        <div class="content card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                {{ Form::open(['route' => 'schedule.store', 'files' => true]) }}
                                @php $multiCreate = true; @endphp
                                @include('admin.schedule.form')
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const entriesContainer = document.getElementById('schedule-entries');
            const addButton = document.getElementById('add-schedule-entry');

            if (!entriesContainer || !addButton) {
                return;
            }

            function createEntryRow(index) {
                const row = document.createElement('div');
                row.className = 'schedule-entry row mb-3 g-2 align-items-end';
                row.innerHTML = `
               
                    <div class="col-md-5">
                        <label for="entries_${index}_time_slot" class="form-label">Time Slot</label>
                        <input type="text" name="entries[${index}][time_slot]" id="entries_${index}_time_slot" class="form-control" placeholder="e.g., 5:30 - 6:30" required>
                    </div>
                    <div class="col-md-5">
                        <label for="entries_${index}_activity" class="form-label">Activity</label>
                        <input type="text" name="entries[${index}][activity]" id="entries_${index}_activity" class="form-control" placeholder="e.g., Self-Meditation" required>
                    </div>
                    <div class="col-md-2 d-grid">
                        <button type="button" class="btn btn-danger remove-entry">Remove</button>
                    </div>
                `;

                row.querySelector('.remove-entry').addEventListener('click', function () {
                    row.remove();
                    refreshEntryIndexes();
                });

                return row;
            }

            function refreshEntryIndexes() {
                const rows = entriesContainer.querySelectorAll('.schedule-entry');

                rows.forEach((row, index) => {
                    const timeSlotInput = row.querySelector('input[name^="entries"][name*="[time_slot]"]');
                    const activityInput = row.querySelector('input[name^="entries"][name*="[activity]"]');
                    const timeSlotLabel = row.querySelector('label[for^="entries_"][for*="_time_slot"]');
                    const activityLabel = row.querySelector('label[for^="entries_"][for*="_activity"]');

                    if (timeSlotInput) {
                        timeSlotInput.name = `entries[${index}][time_slot]`;
                        timeSlotInput.id = `entries_${index}_time_slot`;
                    }

                    if (activityInput) {
                        activityInput.name = `entries[${index}][activity]`;
                        activityInput.id = `entries_${index}_activity`;
                    }

                    if (timeSlotLabel) {
                        timeSlotLabel.htmlFor = `entries_${index}_time_slot`;
                    }

                    if (activityLabel) {
                        activityLabel.htmlFor = `entries_${index}_activity`;
                    }

                    const removeButton = row.querySelector('.remove-entry');
                    if (removeButton) {
                        removeButton.disabled = rows.length === 1;
                    }
                });
            }

            addButton.addEventListener('click', function () {
                const nextIndex = entriesContainer.querySelectorAll('.schedule-entry').length;
                entriesContainer.appendChild(createEntryRow(nextIndex));
                refreshEntryIndexes();
            });

            entriesContainer.querySelectorAll('.remove-entry').forEach((button) => {
                button.addEventListener('click', function () {
                    const row = button.closest('.schedule-entry');
                    if (row) {
                        row.remove();
                        refreshEntryIndexes();
                    }
                });
            });

            refreshEntryIndexes();
        });
    </script>
@endpush
