<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AllPage;
use File;
use App\Retreats;

class RetreatPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = \App\Retreats::orderBy('created_at', 'desc')->get();
        
        return view('admin.retreat.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.retreat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $information = new \App\Retreats;

         $information->from = $request->from;
         $information->to = $request->to;

        $information->days = $request->days;
        $information->nights = $request->nights;
        $information->order = $request->order;
        $information->share_room = $request->share_room;
        $information->private_room = $request->private_room;

        $information->price = $request->price;



        // $information->meta_keyword = $request->meta_keyword;
        // $information->meta_des = $request->meta_des;
        // $information->meta_title = $request->meta_title;

        // dd($information);
        $information->save();
        return redirect('admin/retreat-page')->with('msg', 'Information Added');
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
        $information = \App\Retreats::find($id);
        return view('admin.retreat.edit', compact('information'));
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
        $information = \App\Retreats::find($id);

      $information->from = $request->from;
      $information->to = $request->to;
      $information->days = $request->days;
      $information->nights = $request->nights;
      $information->order = $request->order;
      $information->share_room = $request->share_room;
      $information->private_room = $request->private_room;

      $information->price = $request->price;


        $information->save();
        return redirect('admin/retreat-page')->with('msg', 'Information Upload');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = \App\Retreats::find($id);
      $path = public_path().'uploads/'.$information->image;
      if(File::exists($path))
      {
         File::delete($path);
      }

        $information->delete();
        return redirect('admin/retreat-page')->with('msg', 'Information Deleted');
    }
}
