<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OurTeam;
use App\Models\TeamCategory;
use Illuminate\Support\Facades\File;
use Image;

class OurTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = OurTeam::orderBy('created_at', 'desc')->paginate(15);
        // dd($informations);
        return view('admin.our-team.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = TeamCategory::get()->pluck('name', 'id')->toarray();
        return view('admin.our-team.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $information = new OurTeam;
        $request->validate([
            'name' => 'required|',
        ]);
        $information->image = '';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // $path = public_path() . 'uploads';
            $filename = date('ymdhis') . $file->getClientOriginalName();
            $image = Image::make($request->file('image')->getRealPath());
            $originalPath = public_path() . 'uploads/ourTeam/';
            $image_name = time() . $file->getClientOriginalName();
            $image->resize(null, 600, function ($constraint) {
                $constraint->aspectRatio();
                // $constraint->upsize();
            });
            $image->save($originalPath . $image_name);
            $information->image = $image_name;

            // upload thumbnail
            $originalPath = public_path() . 'uploads/ourTeam/thumbnails/';
            $thumbnail = Image::make($request->file('image')->getRealPath());
            $thumbnail->resize(250, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $thumbnail->save($originalPath . $image_name);
            // $file->move($path, $filename);
            // $information->image = $filename;
        }
        $information->name = $request->name;
        $information->content = $request->content;

        $information->order = $request->order;
        $information->team_category_id = $request->team_category_id;
        $information->meta_title = $request->meta_title;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_des = $request->meta_des;

        $information->instagram = $request->instagram;
        $information->facebook  = $request->facebook;
        $information->youtube   = $request->youtube;
        $information->whatsapp  = $request->whatsapp;
        $information->save();

        return redirect('admin/our-team')->with('msg', 'Information Added');
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
        $categories = TeamCategory::get()->pluck('name', 'id')->toarray();
        $information = OurTeam::find($id);
        return view('admin.our-team.edit', compact('information', 'categories'));
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
        $information = OurTeam::find($id);
        $request->validate([
            'name' => 'required|',
        ]);
        $oldfile = $information->image;
        //file upload
        $information->image = $oldfile;


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // $path = public_path() . 'uploads/';
            $filename = date('ymdhis') . $file->getClientOriginalName();

            //thumbnail
            $image = Image::make($request->file('image')->getRealPath());
            $originalPath = public_path() . 'uploads/ourTeam/';
            $image_name = time() . $file->getClientOriginalName();
            $image->resize(null, 600, function ($constraint) {
                $constraint->aspectRatio();
                // $constraint->upsize();
            });

            $image->save($originalPath . $image_name);
            $information->image = $image_name;


            // upload thumbnail
            $originalPath = public_path() . 'uploads/ourTeam/thumbnails/';
            $thumbnail = Image::make($request->file('image')->getRealPath());
            $thumbnail->resize(250, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $oldthumbnails = public_path() . 'uploads/ourTeam/thumbnails/' . $oldfile;
            if (File::exists($oldthumbnails)) {
                File::delete($oldthumbnails);
            }
            $oldfile = public_path() . 'uploads/ourTeam/' . $oldfile;
            if (File::exists($oldfile)) {
                File::delete($oldfile);
            }
            // dd($originalPath . $image_name);
            $thumbnail->save($originalPath . $image_name);

            //
            // $file->move($path, $filename);
            $oldfile = public_path() . 'uploads/' . $oldfile;

            if (File::exists($oldfile)) {
                File::delete($oldfile);
            }
            // $information->image = $filename;
        }
        $information->name = $request->name;
        $information->content = $request->content;

        $information->order = $request->order;
        $information->team_category_id = $request->team_category_id;
        $information->meta_title = $request->meta_title;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_des = $request->meta_des;

        $information->instagram = $request->instagram;
        $information->facebook  = $request->facebook;
        $information->youtube   = $request->youtube;
        $information->whatsapp  = $request->whatsapp;
        $information->save();

        return redirect('admin/our-team')->with('msg', 'Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = OurTeam::find($id);
        $path = public_path() . 'uploads/' . $information->image;
        if (File::exists($path)) {
            File::delete($path);
        }

        $information->delete();



        return redirect('admin/our-team')->with('msg', 'Information Deleted');
    }

    public function delete($id)
    {
        $information = OurTeam::find($id);
        $path = public_path() . 'uploads/' . $information->image;
        if (File::exists($path)) {
            File::delete($path);
        }

        $information->delete();



        return redirect('admin/our-team')->with('msg', 'Information Deleted');
    }
}
