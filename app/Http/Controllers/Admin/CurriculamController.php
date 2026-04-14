<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Curriculam;
use File;

class CurriculamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $information = Curriculam::first();
        return view('admin.curriculam.index', compact('information'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.curriculam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $information = new Curriculam;
        $this->validate($request, [
           'title' => 'required',
           'content' => 'required',

        ]);
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
        $information->content = $request->content;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_des = $request->meta_des;
        $information->meta_title = $request->meta_title;

        $information->save();
        return redirect('admin/curriculam')->with('msg', 'Information Added');

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
        $information = Curriculam::find($id);
        return view('admin.curriculam.edit', compact('information'));
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
        $information = Curriculam::find($id);
        $this->validate($request, [
           'title' => 'required',
           'content' => 'required',

        ]);

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
        $information->content = $request->content;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_des = $request->meta_des;
        $information->meta_title = $request->meta_title;
        $information->save();
        return redirect('admin/curriculam')->with('msg', 'Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = Curriculam::find($id);
      $path = public_path().'uploads/'.$information->image;
      if(File::exists($path))
      {
         File::delete($path);
      }

        $information->delete();
        return back()->with('msg', 'Information Deleted');
    }
}
