<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SoundHealing;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Helpers\Helper;
use App\Models\OurTeam;

class SoundHealingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informations = SoundHealing::paginate(10);
        $teachers = OurTeam::all();
        return view('admin.sound-healing.index', compact('informations', 'teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = OurTeam::all();

        return view('admin.sound-healing.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
            'location' => 'required',
            'teacher_id' => 'required|integer',
            'slug'       => 'nullable|string|unique:sound_healings,slug',

        ]);

        $information = new SoundHealing;

        $information->image = '';
        $information->background_image = '';

        if ($request->hasFile('image')) {
            $information->image = Helper::uploadImage(
                $request->file('image'),
                public_path() . '/uploads/',
                env('BANNER_WIDTH'),
                env('BANNER_HEIGHT')
            );
        }

        if ($request->hasFile('background_image')) {
            $information->background_image = Helper::uploadImage(
                $request->file('background_image'),
                public_path() . '/uploads/',
                env('BANNER_WIDTH'),
                env('BANNER_HEIGHT')
            );
        }

        $information->title                  = $request->title;
        $information->slug                    = $request->slug
            ? Str::slug($request->slug)
            : $this->generateUniqueSlug($request->title);
        $information->location               = $request->location;
        $information->tripe_room             = $request->tripe_room;
        $information->shared_room            = $request->shared_room;
        $information->private_room           = $request->private_room;
        $information->what_to_expect_title   = $request->what_to_expect_title;
        $information->what_to_expect_subtitle = $request->what_to_expect_subtitle;
        $information->what_to_expect         = $request->what_to_expect;
        $information->content                = $request->content;
        $information->teacher_id             = $request->teacher_id;
        $information->student_taught         = $request->student_taught;
        $information->experience_year        = $request->experience_year;
        $information->workshop_lead          = $request->workshop_lead;


        $information->meta_title        = $request->meta_title;
        $information->meta_description          = $request->meta_description;
        $information->meta_keyword          = $request->meta_keyword;
        $information->save();

        return redirect('admin/sound-healing')->with('msg', 'Sound Healing Added');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $information = SoundHealing::findOrFail($id);
        $teachers = OurTeam::all();

        return view('admin.sound-healing.edit', compact('information', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'      => 'required',
            'content'    => 'required',
            'location'   => 'required',
            'teacher_id' => 'required|integer',
            'slug'       => 'nullable|string|unique:sound_healings,slug,' . $id,

        ]);

        $information = SoundHealing::findOrFail($id);

        // Handle image
        $information->image = $information->image;
        if ($request->hasFile('image')) {
            $oldImage = public_path() . '/uploads/' . $information->image;
            if (File::exists($oldImage)) File::delete($oldImage);
            $information->image = Helper::uploadImage(
                $request->file('image'),
                public_path() . '/uploads/',
                env('BANNER_WIDTH'),
                env('BANNER_HEIGHT')
            );
        }

        // Handle background_image
        $information->background_image = $information->background_image;
        if ($request->hasFile('background_image')) {
            $oldBg = public_path() . '/uploads/' . $information->background_image;
            if (File::exists($oldBg)) File::delete($oldBg);
            $information->background_image = Helper::uploadImage(
                $request->file('background_image'),
                public_path() . '/uploads/',
                env('BANNER_WIDTH'),
                env('BANNER_HEIGHT')
            );
        }

        $information->title                   = $request->title;
        $information->slug                    = $request->slug? Str::slug($request->slug): $information->slug;
        $information->location                = $request->location;
        $information->tripe_room              = $request->tripe_room;
        $information->shared_room             = $request->shared_room;
        $information->private_room            = $request->private_room;
        $information->what_to_expect_title    = $request->what_to_expect_title;
        $information->what_to_expect_subtitle = $request->what_to_expect_subtitle;
        $information->what_to_expect          = $request->what_to_expect;
        $information->content                 = $request->content;
        $information->teacher_id              = $request->teacher_id;
        $information->student_taught          = $request->student_taught;
        $information->experience_year         = $request->experience_year;
        $information->workshop_lead           = $request->workshop_lead;

        $information->meta_title        = $request->meta_title;
        $information->meta_description          = $request->meta_description;
        $information->meta_keyword          = $request->meta_keyword;

        $information->save();

        Cache::forget('sound_healing_' . $information->id);

        return redirect('admin/sound-healing')->with('msg', 'Sound Healing Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $information = SoundHealing::findOrFail($id);

        foreach (['image', 'background_image'] as $field) {
            if ($information->$field) {
                $path = public_path() . '/uploads/' . $information->$field;
                if (File::exists($path)) File::delete($path);
            }
        }

        Cache::forget('sound_healing_' . $information->id);
        $information->delete();

        return redirect('admin/sound-healing')->with('msg', 'Sound Healing Deleted');
    }


    private function generateUniqueSlug(string $title, int $excludeId = null): string
    {

        $baseSlug = Str::slug($title);
        $slug     = $baseSlug;
        $counter  = 1;

        while (
            SoundHealing::where('slug', $slug)
            ->when($excludeId, fn($q) => $q->where('id', '!=', $excludeId))
            ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter++;
        }

        return $slug;
    }
}
