<?php

namespace App\Http\Controllers\Admin;

use App\Models\VideoTestimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


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

        return view('admin.video-testimonial.index',compact('informations'));

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
    public function edit( $id)
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
    public function destroy( $id)
    {
        //
        $information = VideoTestimonial::find($id);

        $information->delete();
        return redirect('admin/video-testimonial')->with('msg', 'Video Testimonial Deleted');

    }
}
