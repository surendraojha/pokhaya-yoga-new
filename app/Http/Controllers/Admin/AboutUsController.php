<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Support\Facades\File;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = AboutUs::all();
        return view('admin.aboutus.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $information = new AboutUs;
        $request->validate([
            'title' => 'required',
            'content' => 'required',

        ]);

        $information->image = '';


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path( 'uploads/');
            $filename = date('ymdhis') . $file->getClientOriginalName();
            $file->move($path, $filename);
            $information->image = $filename;
        }

        $information->title = $request->title;
        $information->content = $request->content;
        $information->save();
        return redirect('admin/aboutus')->with('msg', 'Information Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $information = AboutUs::find($id);
        return view('admin.aboutus.edit', compact('information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $information = AboutUs::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,webp'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            $oldPath = public_path('uploads/') . $information->image;
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            // Save new image
            $file = $request->file('image');
            $filename = date('ymdhis') . $file->getClientOriginalName();
            $file->move(public_path('uploads/'), $filename);
            $information->image = $filename;
        }

        // No new image = existing image stays untouched

        $information->title = $request->title;
        $information->content = $request->content;
        $information->save();

        return redirect('admin/aboutus')->with('msg', 'Information Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = AboutUs::find($id);
        $path = public_path() . 'uploads/' . $information->image;
        if (File::exists($path)) {
            File::delete($path);
        }

        $information->delete();
        return redirect('admin/aboutus')->with('msg', 'Information Deleted');
    }
}
