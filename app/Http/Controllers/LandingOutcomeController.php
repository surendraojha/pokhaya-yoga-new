<?php

namespace App\Http\Controllers;

use App\LandingOutcome;
use Illuminate\Http\Request;
use Session;

class LandingOutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $information= LandingOutcome::all();
        //dd($information);
        return view('backend.outcome.index', compact('information'));
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
        // $rules = [
        //     'title'=>'required',
        //     'content'=>'required',
        // ];
        //     $msg = ['title' => 'Title is required !',
        //             'content'=>'Content is required !'];
        //     $validated = $request->validate($rules,$msg);
        $information = new LandingOutcome();
        //  dd($request);

        $information->title = $request->title;
        $information->content = $request->content;

        $information->save();

        Session::flash('message', 'Submitted Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('outcome.index');
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
        $information = LandingOutcome::find($id);
        //dd($information);

        return view('backend.outcome.edit',compact('information'));
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
        ];
            $msg = ['title' => 'Title is required !',
                    'content'=>'Content is required !'];
            $validated = $request->validate($rules,$msg);
        $information = LandingOutcome::find($id);
        // dd($request->title);

        $information->title = $request->title;
        $information->content = $request->content;

        $information->save();

        Session::flash('message', 'Updated Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('outcome.index');
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
        $information = LandingOutcome::find($id)->delete();


        return redirect()->back();
    }
}
