<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\YogaCertificate;
use App\Models\YogaClass;
use Illuminate\Support\Facades\File;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Cache;
use Image;

class YogaCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informations = YogaCertificate::with('yogaClass')->paginate(10);
        return view('admin.yoga-certificate.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $yogaClasses = YogaClass::all();
        return view('admin.yoga-certificate.create', compact('yogaClasses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $information = new YogaCertificate;

        $information->image = '';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = Helper::uploadImage($file, public_path() . '/uploads/', env("BANNER_WIDTH"), env("BANNER_HEIGHT"));
            $information->image = $image_name;
        }

        $information->description   = $request->description;
        $information->yoga_class_id = $request->yoga_class_id;
        $information->save();

        return redirect('admin/yoga-certificate')->with('msg', 'Certificate Added');
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
        $information = YogaCertificate::findOrFail($id);
        $yogaClasses = YogaClass::all();
        return view('admin.yoga-certificate.edit', compact('information', 'yogaClasses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $information = YogaCertificate::findOrFail($id);
        $oldfile = $information->image;

        $information->image = $oldfile;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = Helper::uploadImage($file, public_path() . '/uploads/', env("BANNER_WIDTH"), env("BANNER_HEIGHT"));

            $oldPath = public_path() . '/uploads/' . $oldfile;
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            $information->image = $image_name;
        }

        $information->description   = $request->description;
        $information->yoga_class_id = $request->yoga_class_id;
        $information->save();

        return redirect('admin/yoga-certificate')->with('msg', 'Certificate Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $information = YogaCertificate::findOrFail($id);

        $path = public_path() . '/uploads/' . $information->image;
        if (File::exists($path)) {
            File::delete($path);
        }

        $information->delete();

        return redirect('admin/yoga-certificate')->with('msg', 'Certificate Deleted');
    }
}
