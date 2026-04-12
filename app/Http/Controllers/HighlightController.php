<?php

namespace App\Http\Controllers;

use App\LandingHighlight;
use Illuminate\Http\Request;
use Session;

class HighlightController extends Controller
{
    //
    public function index(){

        $information= LandingHighlight::all();
        //dd($information);
        return view('backend.highlight.index',compact('information'));
    }

    public function store(Request $request){
        $rules = [
            'title'=>'required',
            ];
         $msg = ['title' => 'Title is required !'];
        $validated = $request->validate($rules,$msg);
        $information = new LandingHighlight();
        // dd($request->title);

        $information->title = $request->title;
        $information->save();

        Session::flash('message', 'Submitted Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('highlight.index');

    }

    public function update(Request $request,$id){
        $rules = [
            'title'=>'required',
            ];
         $msg = ['title' => 'Title is required !'];
        $validated = $request->validate($rules,$msg);

        $information = LandingHighlight::find($id);
        // dd($request->title);

        $information->title = $request->title;
        $information->save();

        Session::flash('message', 'Updated Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('highlight.index');

    }

    public function edit($id)
    {
        //

        $information = LandingHighlight::find($id);
        //dd($information);

        return view('backend.highlight.edit',compact('information'));

    }
    public function destroy($id)
    {
        //

        $information = LandingHighlight::find($id)->delete();


        return redirect()->back();

    }

    public function show($id)
    {
        //
    }
}
