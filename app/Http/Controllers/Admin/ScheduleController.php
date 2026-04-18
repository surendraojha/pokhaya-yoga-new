<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::orderBy('day')->orderBy('time_slot')->get()->groupBy('day');

        return view('admin.schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    private function dayOptions(): array
    {
        return [
            'Sunday' => 'Sunday',
            'Monday' => 'Monday',
            'Tuesday' => 'Tuesday',
            'Wednesday' => 'Wednesday',
            'Thursday' => 'Thursday',
            'Friday' => 'Friday',
            'Saturday' => 'Saturday',
        ];
    }

    public function create()
    {
        $days = $this->dayOptions();

        return view('admin.schedule.create', compact('days'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'day' => 'required|string',
        ];

        if ($request->has('entries')) {
            $rules['entries'] = 'required|array|min:1';
            $rules['entries.*.time_slot'] = 'required|string';
            $rules['entries.*.activity'] = 'required|string';
        } else {
            $rules['time_slot'] = 'required|string';
            $rules['activity'] = 'required|string';
        }

        $request->validate($rules);

        if ($request->has('entries')) {
            foreach ($request->input('entries', []) as $entry) {
                Schedule::create([
                    'day' => $request->day,
                    'time_slot' => $entry['time_slot'],
                    'activity' => $entry['activity'],
                ]);
            }
        } else {
            Schedule::create([
                'day' => $request->day,
                'time_slot' => $request->time_slot,
                'activity' => $request->activity,
            ]);
        }

        return redirect('admin/schedule')->with('msg', 'Schedule entry added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $schedule = Schedule::findOrFail($id);
        $days = $this->dayOptions();

        return view('admin.schedule.edit', compact('schedule', 'days'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'day' => 'required|string',
            'time_slot' => 'required|string',
            'activity' => 'required|string',
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->update([
            'day' => $request->day,
            'time_slot' => $request->time_slot,
            'activity' => $request->activity,
        ]);

        return redirect('admin/schedule')->with('msg', 'Schedule entry updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect('admin/schedule')->with('msg', 'Schedule entry deleted successfully');
    }
}
