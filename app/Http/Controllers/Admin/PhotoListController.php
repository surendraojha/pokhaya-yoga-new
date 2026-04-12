<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PhotoList;
use File;
use Image;
class PhotoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = \App\PhotoList::orderBy('id','desc')->get();
        return view('admin.photo-list.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\PhotoCategory::all()->pluck('name', 'id')->toArray();
        return view('admin.photo-list.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         if($request->hasFile('image'))
            {
                foreach ($request->image as $file) {

            $filename = date('y.m.d.h.i.s').$file->getClientOriginalName();

            // $path = public_path().'uploads';
        // $filename = $file->getClientOriginalName();
        // print_r($filename);
        // die;
            // $file->move($path, $filename);
            $information = new \App\PhotoList;
            //

            $image = Image::make($file->getRealPath());
            $originalPath = public_path() . 'uploads/galary/';
            $image_name = time() . $file->getClientOriginalName();
            $image->resize(null, 600, function ($constraint) {
                $constraint->aspectRatio();
                // $constraint->upsize();
            });
            $image->save($originalPath . $image_name);
            $information->image = $image_name;

            // upload thumbnail
            $originalPath = public_path() . 'uploads/galary/thumbnails/';
            $thumbnail = Image::make($file->getRealPath());
            $thumbnail->resize(250, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $thumbnail->save($originalPath . $image_name);
            //


            // $information->image = $filename;
            $information->photo_category_id = $request->photo_category_id;
            $information->title = $request->title;
            $information->description = $request->description;

            $information->save();
             }
         }
        return redirect('admin/photo-list')->with('msg', 'Information Added');
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
        $categories = \App\PhotoCategory::all()->pluck('name', 'id')->toArray();

        $information = \App\PhotoList::find($id);
      
        return view('admin.photo-list.edit', compact('information', 'categories'));
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
       $information= \App\PhotoList::find($id);


       $oldfile = $information->image;
      //file upload
      if($request->hasFile('image'))
      {
        $oldthumbnails = public_path() . 'uploads/galary/thumbnails/' . $oldfile;
        if (File::exists($oldthumbnails)) {
            File::delete($oldthumbnails);
        }

        $oldfile = public_path() . 'uploads/galary/' . $oldfile;
        if (File::exists($oldfile)) {
            File::delete($oldfile);
        }
         $oldfile = public_path().'uploads/'.$oldfile;
         if(File::exists($oldfile))
         {
            File::delete($oldfile);
         }
          foreach($request->image as $file){

        //  $file = $request->file('image');
        //  $path = public_path().'uploads/';
          $filename = date('ymdhis').$file->getClientOriginalName();
        //  $file->move($path, $filename);
        //thumbnail
        $image = Image::make($file->getRealPath());

        $originalPath = public_path() . 'uploads/galary/';
        $image_name = time() . $file->getClientOriginalName();
        $image->resize(null, 600, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->save($originalPath . $image_name);
        $information->image = $image_name;

        // upload thumbnail
        $originalPath = public_path() . 'uploads/galary/thumbnails/';
        $thumbnail = Image::make($file->getRealPath());
        $thumbnail->resize(250, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $thumbnail->save($originalPath . $image_name);

        //  $information->image = $filename;
      }


    }

    $information->photo_category_id = $request->photo_category_id;
    $information->title= $request->title;
    $information->description = $request->description;

        $information->save();

        return redirect('admin/photo-list')->with('msg','information Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $information = \App\PhotoList::find($id);
       $path = public_path().'uploads/'.$information->image;
      if(File::exists($path))
      {
         File::delete($path);
      }

        $information->delete();



        return redirect('admin/photo-list')->with('msg', 'information Deleted');
    }
}
