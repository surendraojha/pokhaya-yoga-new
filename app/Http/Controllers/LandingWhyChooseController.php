<?php

namespace App\Http\Controllers;

use App\LandingWhyChoose;
use Illuminate\Http\Request;
use Session;

class LandingWhyChooseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $information= LandingWhyChoose::all();
        //dd($information);
        return view('backend.LandingWhyChoose.index',compact('information'));
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
        $information = new LandingWhyChoose();
        // dd($request->title);

        $information->title = $request->title;

        $information->save();

        Session::flash('message', 'Submitted Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
       // return view('backend.keyPoints.index');
        //return redirect()->route('Keypoints.index');
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
        $information = LandingWhyChoose::find($id);
        //dd($information);

        return view('backend.LandingWhyChoose.edit',compact('information'));
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

        $rules = [
            'title'=>'required'
        ];
        $msg = ['title' => 'Title is required !'];
        $validated = $request->validate($rules,$msg);

        $information = LandingWhyChoose::find($id);
        // dd($request->title);

        $information->title = $request->title;

        $information->save();

        Session::flash('message', 'Updated Successfully!');
        Session::flash('alert-class', 'alert-success');
        //return redirect()->back();
        //return view('backend');
        return redirect()->route('whychoose.index');
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
        $information = LandingWhyChoose::find($id);
        if ($information != null) {
            $information->delete();
            return redirect()->back()->with(['message'=> 'Successfully deleted!!']);
        }



        return redirect()->back();
    }
}
