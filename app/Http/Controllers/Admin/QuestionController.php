<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index()
    {
        $informations = Question::latest()->get();
        return view('admin.question.index', compact('informations'));
    }

    public function create()
    {
        return view('admin.question.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateRequest($request);

        $validated['timezone_configurations'] = $this->formatTimezones($validated['timezones']);
        unset($validated['timezones']);

        Question::create($validated);

        return redirect()
            ->route('question.index')
            ->with('msg', 'Information Added');
    }

    public function edit($id)
    {
        $information = Question::findOrFail($id);
        return view('admin.question.edit', compact('information'));
    }

    public function update(Request $request, $id)
    {
        $information = Question::findOrFail($id);

        $validated = $this->validateRequest($request);

        $validated['timezone_configurations'] = $this->formatTimezones($validated['timezones']);
        unset($validated['timezones']);

        $information->update($validated);

        return redirect()
            ->route('question.index')
            ->with('msg', 'Information Updated');
    }

    public function destroy($id)
    {
        $information = Question::findOrFail($id);
        $information->delete();

        return redirect()
            ->route('question.index')
            ->with('msg', 'Information Deleted');
    }

    /*
    |--------------------------------------------------------------------------
    | Helper Methods
    |--------------------------------------------------------------------------
    */

    private function validateRequest(Request $request)
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'calendar_title' => 'required|string|max:255',
            'meeting_location' => 'required|string|max:255',
            'meeting_duration' => 'required|integer|min:1',

            'timezones' => 'required|array|min:1',
            'timezones.*.timezone' => 'required|string',
            'timezones.*.time_slots' => 'required|string',
        ]);
    }

    private function formatTimezones(array $timezones)
    {
        return collect($timezones)->map(function ($tz) {
            return [
                'timezone' => $tz['timezone'],
                'time_slots' => array_values(
                    array_filter(
                        array_map('trim', explode(',', $tz['time_slots']))
                    )
                ),
            ];
        })->values()->toArray();
    }
}