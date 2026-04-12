<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LandingCourse;
use File;
use Session;




class LandingCourseController extends Controller
{

    public function index()
    {
        
        $information= LandingCourse::first();

        return view('backend.LandingCourse.index', compact('information'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    //     $rules = [
    //         'title'=>'required',
    //         'content'=>'required',
    //     ];
    // $msg = ['title' => 'Title is required !'];
    // $validated = $request->validate($rules,$msg);

        $information = LandingCourse::first();


        if($request->hasFile('banner_image')) {

            //upload new one
            $file = $request->file('banner_image');
            $banner_image = rand(0, 9999) . time() . '.' . $file->getClientOriginalExtension();
            $destination_path = public_path().'uploads/';

            $file->move($destination_path, $banner_image);

            $information->banner_image = $banner_image;
        }
        if($request->hasFile('photo_1')) {
           // dd($request);

            // $old_file = public_path('uploads').'/'.;

            $old_file = public_path().'uploads/'.$information->photo_1;

            if(File::exists($old_file)){
                File::delete($old_file);
            }

            //upload new one
            $file = $request->file('photo_1');
            $photo_1 = rand(0, 9999) . time() . '.' . $file->getClientOriginalExtension();
            $destination_path =

            $path = public_path().'uploads';

            $file->move($destination_path, $photo_1);

            $information->photo_1 = $photo_1;
        }
        if($request->hasFile('photo_2')) {

            //upload new one
            $file = $request->file('photo_2');
            $photo_2 = rand(0, 9999) . time() . '.' . $file->getClientOriginalExtension();
            $destination_path =

            $path = public_path().'uploads';            $file->move($destination_path, $photo_2);

            $information->photo_2 = $photo_2;
        }
        if($request->hasFile('highlight_photo')) {

            //upload new one
            $file = $request->file('highlight_photo');
            $highlight_photo = rand(0, 9999) . time() . '.' . $file->getClientOriginalExtension();
            $destination_path =

            $path = public_path().'uploads';            $file->move($destination_path, $highlight_photo);

            $information->highlight_photo = $highlight_photo;
        }
        if($request->hasFile('outcome_photo')) {

            //upload new one
            $file = $request->file('outcome_photo');
            $outcome_photo = rand(0, 9999) . time() . '.' . $file->getClientOriginalExtension();
            $destination_path =

            $path = public_path().'uploads';            $file->move($destination_path, $outcome_photo);

            $information->outcome_photo = $outcome_photo;
        }
        if($request->hasFile('why_choose_us_photo')) {

            //upload new one
            $file = $request->file('why_choose_us_photo');
            $why_choose_us_photo = rand(0, 9999) . time() . '.' . $file->getClientOriginalExtension();
            $destination_path =

            $path = public_path().'uploads';            $file->move($destination_path, $why_choose_us_photo);

            $information->why_choose_us_photo = $why_choose_us_photo;
        }

        $information->title = $request->title;

        $information->content = $request->content;
        $information->certification_content = $request->certification_content;


        $information->save();

        Session::flash('message', 'Submitted Successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('landing-course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
