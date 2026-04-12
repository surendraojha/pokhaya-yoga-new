<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Feature;
use File;
use Str;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = Feature::latest()->paginate(10);
        return view('admin.feature.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = Str::slug($request->title, '-');
        $information = new Feature;

         $information->image = '';
       
                if($request->hasFile('image'))
      {
         $file = $request->file('image');
         $path = public_path().'uploads';
         $filename = date('ymdhis').$file->getClientOriginalName();
         $file->move($path, $filename);
         $information->image = $filename;
      }
        $information->title = $request->title;
        $information->icon = $request->icon;
        $information->order = $request->order;
        $information->content = $request->content;
        $information->meta_des = $request->meta_des;
        $information->meta_keyword = $request->meta_keyword;
        $information->slug = $slug;
        $information->save();

        return redirect('admin/feature')->with('msg', 'Information Added');
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
        $information = Feature::find($id);
        return view('admin.feature.edit', compact('information'));
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
        $information = Feature::find($id);
        $slug = Str::slug($request->title , '-');
        $oldfile = $information->image;
      //file upload
      $information->image = $oldfile;
      if($request->hasFile('image'))
      {
         $file = $request->file('image');
         $path = public_path().'uploads/';
         $filename = date('ymdhis').$file->getClientOriginalName();
         $file->move($path, $filename);
         $oldfile = public_path().'uploads/'.$oldfile;
         if(File::exists($oldfile))
         {
            File::delete($oldfile);
         }
         $information->image = $filename;
      }
      $information->title = $request->title;
        $information->icon = $request->icon;
        $information->order = $request->order;
        $information->content = $request->content;
        $information->meta_des = $request->meta_des;
        $information->meta_keyword = $request->meta_keyword;
        $information->slug = $slug;
        $information->save();

        return redirect('admin/feature')->with('msg', 'Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = Feature::find($id);
      $path = public_path().'uploads/'.$information->image;
      if(File::exists($path))
      {
         File::delete($path);
      }

        $information->delete();
        return back()->with('msg', 'Information Deleted');
    }
}
