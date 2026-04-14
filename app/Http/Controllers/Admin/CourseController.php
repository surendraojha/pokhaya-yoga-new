<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = Course::orderBy('created_at', 'desc')->get();
        return view('admin.course.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $information = new Course;

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'mimes:jpeg,png,jpg,webp'
        ]);

        $information->image = '';


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // $path = public_path().'uploads';
            $filename = date('ymdhis') . $file->getClientOriginalName();
            // thumbnail

            $image = Image::read($request->file('image'));
            $originalPath = public_path('uploads/course/');
            $image_name = time() . $file->getClientOriginalName();
            $image->resize(null, 600, function ($constraint) {
                $constraint->aspectRatio();
                // $constraint->upsize();
            });
            $image->save($originalPath . $image_name);
            $information->image = $image_name;

            // upload thumbnail
            $originalPath = public_path('uploads/course/thumbnails/');
            $thumbnail = Image::read($request->file('image'));
            $thumbnail->resize(250, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $thumbnail->save($originalPath . $image_name);


            // $file->move($path, $filename);
            // $information->image = $filename;
        }

        $information->title = $request->title;
        $information->content = $request->content;
        $information->slug = $request->slug;
        $information->order = $request->order;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_des = $request->meta_des;


        $information->save();
        return redirect('admin/course')->with('msg', 'Information Added');
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
        $information = Course::find($id);
        return view('admin.course.edit', compact('information'));
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
        $information = Course::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,webp'
        ]);
        $slug = Str::slug($request->title, '-');

        $oldfile = $information->image;
        //file upload
        $information->image = $oldfile;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            //  $path = public_path().'uploads/';
            $filename = date('ymdhis') . $file->getClientOriginalName();
            //  $file->move($path, $filename);
            //  $oldfile = public_path().'uploads/'.$oldfile;
            // thumbnail
            $image = Image::read($request->file('image'));
            $originalPath = public_path() . '/uploads/course/';
            $image_name = time() . $file->getClientOriginalName();
            $image->resize(null, 600, function ($constraint) {
                $constraint->aspectRatio();
                // $constraint->upsize();
            });
            $image->save($originalPath . $image_name);
            $information->image = $image_name;

            // upload thumbnail
            $originalPath = public_path() . '/uploads/course/thumbnails/';
            $thumbnail = Image::read($request->file('image'));
            $thumbnail->resize(250, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            // $file->move($originalPath, $filename);

            $oldthumbnails = public_path() . '/uploads/course/thumbnails/' . $oldfile;
            if (File::exists($oldthumbnails)) {
                File::delete($oldthumbnails);
            }

            $oldfile = public_path() . '/uploads/course/' . $oldfile;
            if (File::exists($oldfile)) {
                File::delete($oldfile);
            }
            $thumbnail->save($originalPath . $image_name);

            //  $information->image = $filename;
        }
        $information->title = $request->title;
        $information->content = $request->content;
        $information->slug = $request->slug;
        $information->order = $request->order;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_des = $request->meta_des;


        $information->save();
        return redirect('admin/course')->with('msg', 'Information Upload');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = Course::findOrFail($id);

        // paths
        $imagePath = public_path('uploads/course/' . $information->image);
        $thumbnailPath = public_path('uploads/course/thumbnails/' . $information->image);

        // delete main image
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        // delete thumbnail
        if (File::exists($thumbnailPath)) {
            File::delete($thumbnailPath);
        }

        $information->delete();

        return redirect('admin/course')->with('msg', 'Information Deleted');
    }
}
