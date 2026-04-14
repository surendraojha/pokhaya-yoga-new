<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PhotoCategory;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
         $informations = PhotoCategory::all();
        return view('admin.gallery.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $information = new PhotoCategory;
        $this->validate($request, [
           'name' => 'required|unique:photo_categories'
        ]);
        $information->name = $request->name;
        $information->save();
        return redirect('admin/gallery')->with('msg', 'Information Added');
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
        $information = PhotoCategory::find($id);
        return view('admin.gallery.edit', compact('information'));
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
       $information = PhotoCategory::find($id);
        $this->validate($request, [
           'name' => 'required'
        ]);
        $information->name = $request->name;
        $information->save();
        return redirect('admin/gallery')->with('msg', 'Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = PhotoCategory::find($id);

        $information->delete();
        return redirect('admin/gallery')->with('msg', 'Information Deleted');
    }
}
