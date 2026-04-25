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
        $query = Schedule::orderBy('title');

        if ($request->filled('course_id')) {
            $query->where('class_id', $request->course_id);
        }

        $schedules = $query->get()->groupBy('day');
        $yogaClasses = YogaClass::all();

        return view('admin.schedule.index', compact('schedules', 'yogaClasses'));
    }


    public function create()
    {
        $yogaClasses = YogaClass::all();

        return view('admin.schedule.create', compact( 'yogaClasses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string',
            'content' => 'required|string',
            'subtitle' => 'nullable|string',
            'class_id' => 'required|exists:yoga_classes,id',
        ];


        $request->validate($rules);


        Schedule::create([
            'title' => $request->title,
            'content' => $request->content,
            'subtitle' => $request->subtitle,
            'class_id' => $request->class_id,
        ]);


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
        $yogaClasses = YogaClass::all();

        return view('admin.schedule.edit', compact('schedule', 'yogaClasses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'title' => 'required|string',
            'content' => 'required|string',
            'subtitle' => 'nullable|string',
            'class_id' => 'required|exists:yoga_classes,id',
        ];

        $schedule = Schedule::findOrFail($id);
        $schedule->update([
            'title' => $request->title,
            'content' => $request->content,
            'subtitle' => $request->subtitle,
            'class_id' => $request->class_id,
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
