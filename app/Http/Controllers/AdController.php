<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LandingAd;
use Session;
use File;


class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // dd('here');
        $information= LandingAd::all();


        // dd($information);

        //dd($information);
        return view('backend.ads.index',compact('information'));
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
        $rules = [
                    'title'=>'required',
                    'content'=>'required',
                    'photo'=>'required',
                ];
            $msg = ['title' => 'Title is required !',
                    'content' => 'Content is required !',
                    'photo' => 'Photo is required !'];

        $validated = $request->validate($rules,$msg);
        $information = new LandingAd();
        // dd($request->title);

        $information->title = $request->title;
        $information->content = $request->content;

        // dd($rules);


        if($request->hasFile('photo')) {

            //upload new one
            $file = $request->file('photo');
            $photo = rand(0, 9999) . time() . '.' . $file->getClientOriginalExtension();
            $destination_path =         $path = public_path().'uploads';

            $file->move($destination_path, $photo);

            $information->photo = $photo;
        }



        $information->save();

        Session::flash('message', 'Submitted Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();

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
        $information = LandingAd::find($id);

        //dd($information);

        return view('backend.ads.edit',compact('information'));

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

        //
        $rules = [
                    'title'=>'required',
                    'content'=>'required',
                    'photo'=>'required',

                ];
            $msg = ['title' => 'Title is required !',
            'content' => 'content is required !',
            'photo' => 'photo is required !'];
            $validated = $request->validate($rules,$msg);
        $information =  LandingAd::find($id);
        // dd($request->title);

        $information->title = $request->title;
        $information->content = $request->content;

        if($request->hasFile('photo')) {

            //upload new one
            $file = $request->file('photo');
            $photo = rand(0, 9999) . time() . '.' . $file->getClientOriginalExtension();
            $destination_path = public_path('/uploads');
            $file->move($destination_path, $photo);

            $information->photo = $photo;
        }


        $information->save();

        Session::flash('message', 'Submitted Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('ad.index');




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
        $information = LandingAd::find($id)->delete();


        return redirect()->back();
    }
}
