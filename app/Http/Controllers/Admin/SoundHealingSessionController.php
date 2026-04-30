<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SoundHealingSession;
use App\Models\SoundHealing;

class SoundHealingSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = SoundHealingSession::with('soundHealing')->paginate(10);

        return view('admin.sound-healing-sessions.index', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $soundHealings = SoundHealing::all();

        return view('admin.sound-healing-sessions.create', compact('soundHealings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sound_healing_id' => 'required|integer|exists:sound_healings,id',
            'date'             => 'required|date',
            'time'             => 'required|string',
            'title'            => 'required|string|max:255',
            'spots_left'       => 'nullable|string|max:255',
            'description'      => 'nullable|string|max:255',
        ]);

        SoundHealingSession::create($request->only([
            'sound_healing_id',
            'date',
            'time',
            'title',
            'spots_left',
            'description',
        ]));

        return redirect('admin/sound-healing-sessions')->with('msg', 'Session Added');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $session      = SoundHealingSession::findOrFail($id);
        $soundHealings = SoundHealing::all();

        return view('admin.sound-healing-sessions.edit', compact('session', 'soundHealings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'sound_healing_id' => 'required|integer|exists:sound_healings,id',
            'date'             => 'required|date',
            'time'             => 'required|string',
            'title'            => 'required|string|max:255',
            'spots_left'       => 'nullable|string|max:255',
            'description'      => 'nullable|string|max:255',
        ]);

        $session = SoundHealingSession::findOrFail($id);

        $session->update($request->only([
            'sound_healing_id',
            'date',
            'time',
            'title',
            'spots_left',
            'description',
        ]));

        return redirect('admin/sound-healing-sessions')->with('msg', 'Session Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $session = SoundHealingSession::findOrFail($id);
        $session->delete();

        return redirect('admin/sound-healing-sessions')->with('msg', 'Session Deleted');
    }
}
