<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use File;

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
            $path = public_path() . 'uploads';
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

        $information = AboutUs::find($id);
        $request->validate([
            'title' => 'required',
            'content' => 'required',

        ]);
        $oldfile = $information->image;
        //file upload
        $information->image = $oldfile;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . 'uploads/';
            $filename = date('ymdhis') . $file->getClientOriginalName();
            $file->move($path, $filename);
            $oldfile = public_path() . 'uploads/' . $oldfile;
            if (File::exists($oldfile)) {
                File::delete($oldfile);
            }
            $information->image = $filename;
        }
        $information->title = $request->title;
        $information->content = $request->content;
        $information->save();
        return redirect('admin/aboutus')->with('msg', 'Information Upload');
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
