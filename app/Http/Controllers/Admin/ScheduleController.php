<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\YogaClass;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Schedule::orderBy('day')->orderBy('time_slot');

        if ($request->filled('course_id')) {
            $query->where('class_id', $request->course_id);
        }

        $schedules = $query->get()->groupBy('day');
        $yogaClasses = YogaClass::all();

        return view('admin.schedule.index', compact('schedules', 'yogaClasses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    private function dayOptions(): array
    {
        return [
            'Sunday 7' => 'Sunday 7',
            'Monday 8' => 'Monday 8',
            'Tuesday 9' => 'Tuesday 9',
            'Wednesday 10' => 'Wednesday 10',
            'Thursday 11' => 'Thursday 11',
            'Friday 12' => 'Friday 12',
            'Saturday 13' => 'Saturday 13',
        ];
    }

    public function create()
    {
        $days = $this->dayOptions();
        $yogaClasses = YogaClass::all();

        return view('admin.schedule.create', compact('days', 'yogaClasses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'day' => 'required|string',
            'time_slot' => 'required_without:entries|string',
            'activity' => 'required_without:entries|string',
            'class_id' => 'required|exists:yoga_classes,id',
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
                    'class_id' => $request->class_id,
                    'activity' => $entry['activity'],
                ]);
            }
        } else {
            Schedule::create([
                'day' => $request->day,
                'time_slot' => $request->time_slot,
                'class_id' => $request->class_id,
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
        $yogaClasses = YogaClass::all();

        return view('admin.schedule.edit', compact('schedule', 'days', 'yogaClasses'));
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
            'time_slot' => 'required_without:entries|string',
            'activity' => 'required_without:entries|string',
            'class_id' => 'required|exists:yoga_classes,id',
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->update([
            'day' => $request->day,
            'time_slot' => $request->time_slot,
            'class_id' => $request->class_id,
            'activity' => $request->activity,
            'order' => $request->order,
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
