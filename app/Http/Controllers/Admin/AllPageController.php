<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AllPage;
use App\Helpers\Helper;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AllPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = AllPage::orderBy('created_at', 'desc')->get();
        return view('admin.all-page.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.all-page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $information = new AllPage;
        $request->validate([
            'title' => 'required',
            'content' => 'required',

        ]);
        $slug = Str::slug($request->title, '-');
        
        $information->image = '';


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = Helper::uploadImage($file, public_path() . 'uploads/', env("BANNER_WIDTH"), env("BANNER_HEIGHT"));
            $information->image = $image_name;
        }

        $information->title = $request->title;
        $information->content = $request->content;
        $information->slug = strtolower($slug);

        $information->order = $request->order;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_des = $request->meta_des;
        $information->meta_title = $request->meta_title;


        $information->save();
        return redirect('admin/all-page')->with('msg', 'Information Added');
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
        $information = AllPage::find($id);
        return view('admin.all-page.edit', compact('information'));
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
        $information = AllPage::find($id);
        $request->validate([
            'title' => 'required',
            'content' => 'required',

        ]);
        $slug = str_slug($request->title, '-');

        $oldfile = $information->image;
        //file upload
        $information->image = $oldfile;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = Helper::uploadImage($file, public_path() . 'uploads/', env("BANNER_WIDTH"), env("BANNER_HEIGHT"));



            $oldfile = public_path() . 'uploads/' . $oldfile;
            if (File::exists($oldfile)) {
                File::delete($oldfile);
            }
            $information->image = $image_name;
        }
        $information->title = $request->title;
        $information->content = $request->content;
        $information->slug = strtolower($slug);

        $information->order = $request->order;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_des = $request->meta_des;
        $information->meta_title = $request->meta_title;


        $information->save();
        return redirect('admin/all-page')->with('msg', 'Information Upload');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = AllPage::find($id);
        $path = public_path() . 'uploads/' . $information->image;
        if (File::exists($path)) {
            File::delete($path);
        }

        $information->delete();
        return redirect('admin/all-page')->with('msg', 'Information Deleted');
    }
}
