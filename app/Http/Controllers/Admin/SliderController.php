<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = Slider::all();
        return view('admin.slider.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider = new Slider;

        $slider->image = '';


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . 'uploads';
            $filename = date('ymdhis') . $file->getClientOriginalName();
            $file->move($path, $filename);
            $slider->image = $filename;
        }

        $slider->title = $request->title;
        $slider->content = $request->content;
        $slider->save();

        return redirect('admin/slider')->with('msg', 'slider Added');

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
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
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
        $slider = Slider::find($id);


        $oldfile = $slider->image;
        //file upload
        $slider->image = $oldfile;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . 'uploads/';
            $filename = date('ymdhis') . $file->getClientOriginalName();
            $file->move($path, $filename);
            $oldfile = public_path() . 'uploads/' . $oldfile;
            if (File::exists($oldfile)) {
                File::delete($oldfile);
            }
            $slider->image = $filename;
        }

        $slider->title = $request->title;
        $slider->content = $request->content;

        $slider->save();

        return redirect('admin/slider')->with('msg', 'slider Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $path = public_path() . 'uploads/' . $slider->image;
        if (File::exists($path)) {
            File::delete($path);
        }

        $slider->delete();



        return redirect('admin/slider')->with('msg', 'Slider Deleted');
    }
}
