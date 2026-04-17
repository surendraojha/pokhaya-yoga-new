<?php

namespace App\Http\Controllers\Admin;

use App\Models\VideoTestimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\File;

class VideoTestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $informations = VideoTestimonial::orderBY('created_at', 'desc')->get();

        return view('admin.video-testimonial.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.video-testimonial.create');
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
            'title' => 'required|',
            'url' => 'required|',
        ]);

        $information = new VideoTestimonial;

        if ($request->hasFile('image')) {
            $originalPath = public_path('uploads/video-testimonial/');
            $thumbnailPath = public_path('uploads/video-testimonial/thumbnails/');

            if (!File::exists($originalPath)) {
                File::makeDirectory($originalPath, 0755, true);
            }

            if (!File::exists($thumbnailPath)) {
                File::makeDirectory($thumbnailPath, 0755, true);
            }

            $file = $request->file('image');
            $filename = date('ymdhis') . $file->getClientOriginalName();
            $image = Image::read($request->file('image'));
            // $path = public_path() . 'uploads/';

            $image_name = time() . $file->getClientOriginalName();
            $image->scale(height: 600);

            $image->save($originalPath . $image_name);
            $information->image = $image_name;

            // upload thumbnail
            $thumbnail = Image::read($request->file('image'));
            $thumbnail->scale(width: 250);

            $thumbnail->save($thumbnailPath . $image_name);
        }

        $information->title = $request->title;
        $information->content = $request->content;
        $information->url = $request->url;

        $information->save();

        return redirect('admin/video-testimonial')->with('msg', 'Video Testimonial Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  VideoTestimonial  $videoTestimonial
     * @return \Illuminate\Http\Response
     */
    public function show(VideoTestimonial $videoTestimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  VideoTestimonial  $videoTestimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $information = VideoTestimonial::find($id);
        return view('admin.video-testimonial.edit', compact('information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  VideoTestimonial  $videoTestimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $information = VideoTestimonial::find($id);

        $request->validate([
            'title' => 'required|',
            'url' => 'required|',
        ]);

        $oldfile = $information->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // $path = public_path() . 'uploads/';
            $filename = date('ymdhis') . $file->getClientOriginalName();

            //thumbnail
            $image = Image::read($request->file('image'));
            $originalPath = public_path('uploads/video-testimonial/');
            $image_name = time() . $file->getClientOriginalName();
            $image->scale(height: 600);
            $image->save($originalPath . $image_name);
            $information->image = $image_name;

            // upload thumbnail
            $originalPath = public_path('uploads/video-testimonial/thumbnails/');
            $thumbnail = Image::read($request->file('image'));
            $thumbnail->scale(width: 250);

            // $file->move($originalPath, $filename);

            $oldthumbnails = public_path('uploads/video-testimonial/thumbnails/') . $oldfile;
            if (File::exists($oldthumbnails)) {
                File::delete($oldthumbnails);
            }

            $oldfile = public_path('uploads/video-testimonial/') . $oldfile;
            if (File::exists($oldfile)) {
                File::delete($oldfile);
            }
            $thumbnail->save($originalPath . $image_name);
            // $information->image = $filename;
        }

        $information->title = $request->title;
        $information->content = $request->content;
        $information->url = $request->url;

        $information->save();

        return redirect('admin/video-testimonial')->with('msg', 'Video Testimonial Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  VideoTestimonial  $videoTestimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $information = VideoTestimonial::find($id);

        $path = public_path('uploads/video-testimonial/') . $information->image;
        $thumbnailPath = public_path('uploads/video-testimonial/thumbnails/') . $information->image;

        if (File::exists($path)) {
            File::delete($path);
        }

        if (File::exists($thumbnailPath)) {
            File::delete($thumbnailPath);
        }
        $information->delete();
        return redirect('admin/video-testimonial')->with('msg', 'Video Testimonial Deleted');
    }
}
