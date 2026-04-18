@extends('front.layouts.main')

@push('seo-meta')
    <x-seo-meta title="Daily Schedule" />
@endpush

@section('content')

    <x-page-banner  :image="asset('/uploads/' . $banner->image)" title="Daily Schedule" />

    <div class="schedule-sections">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h2>One Week Schedule</h2>
                    <div class="date-range">Sunday - Saturday</div>
                    <table class="schedule-table">
                        <thead>
                            <tr class="schedule-row schedule-header-row">
                                <th class="schedule-cell schedule-time-header">Time</th>

                                @foreach($days as $day)
                                    <th class="schedule-cell schedule-day-header day-{{ strtolower($day) }}">
                                        {{ $day }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($timeSlots as $timeSlot)
                                @php
                                    $slotClass = str_replace([' ', ':'], ['-', ''], strtolower($timeSlot));
                                @endphp

                                <tr class="schedule-row schedule-time-row time-{{ $slotClass }}">

                                    <!-- Time column -->
                                    <td class="schedule-cell schedule-time-slot">
                                        {{ $timeSlot }}
                                    </td>

                                    @foreach($days as $day)
                                                @php
                                                    $entry = $scheduleEntries->get($day)?->get($timeSlot);
                                                @endphp

                                                <td class="
                                            schedule-cell 
                                            schedule-activity 
                                            day-{{ strtolower($day) }} 
                                            time-{{ $slotClass }}
                                            {{ $entry ? 'has-activity' : 'empty' }}
                                        ">
                                                    {{ $entry?->activity ?? '' }}
                                                </td>
                                    @endforeach

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection