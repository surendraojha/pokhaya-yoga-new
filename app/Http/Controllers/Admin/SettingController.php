<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use File;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $information = \App\Setting::first();
        return view('admin.setting.index', compact('information'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'email' => 'required',
            'number' => 'required',
            'address' => 'required',

        ]);

         $information = new Setting;

          $information->logo = '';

       
                if($request->hasFile('logo'))
      {
         $file = $request->file('logo');
         $path = public_path().'uploads';
         $filename = date('ymdhis').$file->getClientOriginalName();
         $file->move($path, $filename);
         $information->logo = $filename;
      }

      $information->title = $request->title;
      $information->email = $request->email;
      $information->number = $request->number;
      $information->address = $request->address;
      $information->desc = $request->desc;
      $information->visit_us = $request->visit_us;
      $information->contact_info = $request->contact_info;
      $information->facebook = $request->facebook;
      $information->instragram = $request->instragram;
      $information->twitter = $request->twitter;
      $information->youtube = $request->youtube;
      $information->save();

      return back()->with('msg', 'Information Saved');



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
    public function update(Request $request, $id)
    {
 $this->validate($request, [
            'title' => 'required',
            'email' => 'required',
            'number' => 'required',
            'address' => 'required',

        ]);

        $information = Setting::find($id);
         $oldfile = $information->logo;
      //file upload
      $information->logo = $oldfile;
      if($request->hasFile('logo'))
      {
         $file = $request->file('logo');
         $path = public_path().'uploads/';
         $filename = date('ymdhis').$file->getClientOriginalName();
         $file->move($path, $filename);
         $oldfile = public_path().'uploads/'.$oldfile;
         if(File::exists($oldfile))
         {
            File::delete($oldfile);
         }
         $information->logo = $filename;
      }

      $information->title = $request->title;
      $information->email = $request->email;
      $information->number = $request->number;
      $information->address = $request->address;
      $information->desc = $request->desc;
      $information->visit_us = $request->visit_us;
      $information->contact_info = $request->contact_info;
      $information->facebook = $request->facebook;
      $information->instragram = $request->instragram;
      $information->twitter = $request->twitter;
      $information->youtube = $request->youtube;
      $information->save();

      return back()->with('msg', 'Information Updated');
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
