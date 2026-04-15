<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use Illuminate\Support\Facades\File;

class WhyChooseUsController extends Controller
{
    public function index()
    {
        $information = WhyChooseUs::first();
        return view('admin.why-choose-us.index', compact('information'));
    }

    public function create()
    {
        return view('admin.why-choose-us.create');
    }

    public function store(Request $request)
    {
        $information = new WhyChooseUs();

        $information->title = $request->title;
        $information->subtitle = $request->subtitle;

        // Lists (array)
        $information->left_list = $request->left_list ?? [];
        $information->right_list = $request->right_list ?? [];

        // Images upload
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/why-choose-us'), $name);
                $images[] = 'uploads/why-choose-us/' . $name;
            }
        }

        $information->images = $images;

        $information->save();

        return redirect('admin/why-choose-us')->with('msg', 'Created Successfully');
    }

    public function edit($id)
    {
        $information = WhyChooseUs::findOrFail($id);
        return view('admin.why-choose-us.edit', compact('information'));
    }

    public function update(Request $request, $id)
    {
        $information = WhyChooseUs::findOrFail($id);

        $information->title = $request->title;
        $information->subtitle = $request->subtitle;

        $information->left_list = $request->left_list ?? [];
        $information->right_list = $request->right_list ?? [];

        // 🔁 Replace images completely if new ones are uploaded
        if ($request->hasFile('images')) {
            // Delete old files from disk
            if (!empty($information->images)) {
                foreach ($information->images as $oldImagePath) {
                    $fullPath = public_path($oldImagePath);
                    if (File::exists($fullPath)) {
                        File::delete($fullPath);
                    }
                }
            }

            // Store new images
            $images = [];
            foreach ($request->file('images') as $file) {
                $name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/why-choose-us'), $name);
                $images[] = 'uploads/why-choose-us/' . $name;
            }

            $information->images = $images;
        }
        // If no new images are uploaded, keep existing ones (do nothing)

        $information->save();

        return redirect('admin/why-choose-us')->with('msg', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $information = WhyChooseUs::findOrFail($id);
        $information->delete();

        return redirect('admin/why-choose-us')->with('msg', 'Deleted Successfully');
    }
}