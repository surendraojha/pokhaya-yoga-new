<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Intervention\Image\Laravel\Facades\Image;
// use Intervention\Image\ImageManager;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = Testimonial::orderBY('created_at', 'desc')->get();
        return view('admin.testimonial.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'image' => 'mimes:jpeg,png,jpg,webp'
        ]);

        $information = new Testimonial;

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $filename = date('ymdhis') . $file->getClientOriginalName();
            $image = Image::read($request->file('image'));
            // $path = public_path() . 'uploads/';
            $originalPath = public_path('uploads/testimonials/');
            $image_name = time() . $file->getClientOriginalName();
            $image->scale(height: 600);

            $image->save($originalPath . $image_name);
            $information->image = $image_name;

            // upload thumbnail
            $originalPath = public_path('uploads/testimonials/thumbnails/');
            $thumbnail = Image::read($request->file('image'));
            $thumbnail->scale(width: 250);

            $thumbnail->save($originalPath . $image_name);
        }

        $information->name = $request->name;
        $information->content = $request->content;

        $information->save();

        return redirect('admin/testimonial')->with('msg', 'Testimonial Added');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $information = Testimonial::find($id);
        return view('admin.testimonial.edit', compact('information'));
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
        $information = Testimonial::find($id);
        $request->validate([
            'name' => 'required',
            'content' => 'required',
        ]);

        $oldfile = $information->image;

        //file upload
        $information->image = $oldfile;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // $path = public_path() . 'uploads/';
            $filename = date('ymdhis') . $file->getClientOriginalName();

            //thumbnail
            $image = Image::read($request->file('image'));
            $originalPath = public_path('uploads/testimonials/');
            $image_name = time() . $file->getClientOriginalName();
            $image->scale(height: 600);
            $image->save($originalPath . $image_name);
            $information->image = $image_name;

            // upload thumbnail
            $originalPath = public_path('uploads/testimonials/thumbnails/');
            $thumbnail = Image::read($request->file('image'));
            $thumbnail->scale(width: 250);

            // $file->move($originalPath, $filename);

            $oldthumbnails = public_path('uploads/testimonials/thumbnails/') . $oldfile;
            if (File::exists($oldthumbnails)) {
                File::delete($oldthumbnails);
            }

            $oldfile = public_path('uploads/testimonials/') . $oldfile;
            if (File::exists($oldfile)) {
                File::delete($oldfile);
            }
            $thumbnail->save($originalPath . $image_name);
            // $information->image = $filename;
        }
        $information->name = $request->name;
        $information->content = $request->content;
        $information->save();

        return redirect('admin/testimonial')->with('msg', 'Testimonial Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = Testimonial::find($id);
        $path = public_path('uploads/testimonials/') . $information->image;
        $thumbnailPath = public_path('uploads/testimonials/thumbnails/') . $information->image;

        if (File::exists($path)) {
            File::delete($path);
        }

        if (File::exists($thumbnailPath)) {
            File::delete($thumbnailPath);
        }


        $information->delete();



        return redirect('admin/testimonial')->with('msg', 'Testimonial Deleted');
    }
}
