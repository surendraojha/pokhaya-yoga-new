<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notice;
use File;
class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = \App\Notice::orderby('created_at', 'desc')->get();
        return view('admin.notice.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $information = new \App\Notice;
        $this->validate($request, [
           'title' => 'required',
           'content' => 'required',

        ]);
  $slug = str_slug($request->title, '-');


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
        $information->date_for = '0';
        $information->slug = $slug;

        $information->save();
        return redirect('admin/notice')->with('msg', 'Information Added');
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
        $information = \App\Notice::find($id);
        return view('admin.notice.edit', compact('information'));
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
         $information = \App\Notice::find($id);
        $this->validate($request, [
           'title' => 'required',
           'content' => 'required',

        ]);
  $slug = str_slug($request->title, '-');

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
        $information->date_for = '0';
        $information->slug = $slug;

        $information->save();
        return redirect('admin/notice')->with('msg', 'Information Upload');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $information = \App\Notice::find($id);
      $path = public_path().'uploads/'.$information->image;
      if(File::exists($path))
      {
         File::delete($path);
      }

        $information->delete();
        return redirect('admin/notice')->with('msg', 'Information Deleted');
    }
}
