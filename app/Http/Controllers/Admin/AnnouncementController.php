<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use File;


class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('here');
        $informations = Announcement::all();
        // dd($informations);
        return view('admin.announcement.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $information = new Announcement;
        $this->validate($request, [
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

        $information->content = $request->content;
        $information->save();
        return redirect('admin/announcements')->with('msg', 'Information Added');
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
        $information = Announcement::find($id);
        return view('admin.announcement.edit', compact('information'));
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

        $information = Announcement::find($id);
        $this->validate($request, [
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
        $information->content = $request->content;
        $information->save();
        return redirect('admin/announcements')->with('msg', 'Information Upload');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $information = Announcement::find($id);
      $path = public_path().'uploads/'.$information->image;
      if(File::exists($path))
      {
         File::delete($path);
      }

        $information->delete();
        return redirect('admin/announcements')->with('msg', 'Information Deleted');
    }
}
