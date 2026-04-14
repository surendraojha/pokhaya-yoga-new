<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\File;
use Image;

class BlogUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $informations = BlogUsers::orderBy('created_at', 'desc')->paginate(15);
        
        return view('admin.blog-users.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.blog-users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpeg,png,jpg,webp'
        ]);

        $information = new BlogUsers;

        $information->image = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . 'uploads/blog-users/';
            $filename = date('ymdhis') . $file->getClientOriginalName();
            $file->move($path, $filename);
            $information->image = $filename;
        }

        $information->name = $request->name;
        $information->position = $request->position;
        $information->social_media_url1 = $request->social_media_url1;
        $information->social_media_url2 = $request->social_media_url2;
        $information->year_of_experience = $request->year_of_experience;
        $information->about = $request->about;
        $information->education = $request->education;
        $information->experience = $request->experience;

        $information->save();

        return redirect('admin/blog-users')->with('msg', 'User Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  BlogUsers  $blogUsers
     * @return \Illuminate\Http\Response
     */
    public function show(BlogUsers $blogUsers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  BlogUsers  $blogUsers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $information = BlogUsers::find($id);
        return view('admin.blog-users.edit', compact('information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  BlogUsers  $blogUsers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpeg,png,jpg,webp'
        ]);

        $information = BlogUsers::find($id);

        $oldfile = $information->image;
        $information->image = $oldfile;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . 'uploads/blog-users/';
            $filename = date('ymdhis') . $file->getClientOriginalName();
            $file->move($path, $filename);
            $oldfile = public_path() . 'uploads/blog-users/' . $oldfile;
            if (File::exists($oldfile)) {
                File::delete($oldfile);
            }
            $information->image = $filename;
        }

        $information->name = $request->name;
        $information->position = $request->position;
        $information->social_media_url1 = $request->social_media_url1;
        $information->social_media_url2 = $request->social_media_url2;
        $information->year_of_experience = $request->year_of_experience;
        $information->about = $request->about;
        $information->education = $request->education;
        $information->experience = $request->experience;

        $information->save();
        return redirect('admin/blog-users')->with('msg', 'Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  BlogUsers  $blogUsers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $information = BlogUsers::find($id);
        $path = public_path() . 'uploads/blog-users/' . $information->image;
        if (File::exists($path)) {
            File::delete($path);
        }

        $information->delete();
        return redirect('admin/blog-users')->with('msg', 'User Deleted');
    }
}
