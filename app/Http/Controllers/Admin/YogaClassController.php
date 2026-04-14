<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\YogaClass;
use Illuminate\Support\Facades\File;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Cache;

class YogaClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = YogaClass::paginate(10);
        return view('admin.yoga-class.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.yoga-class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'title' => 'required',
           'content' => 'required',


        ]);
          $information = new YogaClass;

       $information->image = '';


    if($request->hasFile('image'))
      {
         $file = $request->file('image');

        $image_name = Helper::uploadImage($file, public_path() . '/uploads/', env("BANNER_WIDTH"), env("BANNER_HEIGHT"));
        $information->image = $image_name;

      }


        $information->title = $request->title;
        $information->content = $request->content;
        $information->slug = strtolower($request->slug);
        $information->order = $request->order;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_des = $request->meta_des;
        $information->meta_title = $request->meta_title;
        $information->save();
        return redirect('admin/yoga-class')->with('msg', 'Information Added');
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
        $information = YogaClass::find($id);
        return view('admin.yoga-class.edit', compact('information'));
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
        $request->validate([
           'title' => 'required',
           'content' => 'required',


        ]);


        $information = YogaClass::find($id);
        $oldfile = $information->image;
      //file upload
      $information->image = $oldfile;
      if($request->hasFile('image'))
      {
         $file = $request->file('image');
         $image_name = Helper::uploadImage($file, public_path() . '/uploads/', env("BANNER_WIDTH"), env("BANNER_HEIGHT"));

         $oldfile = public_path().'/uploads/'.$oldfile;
         if(File::exists($oldfile))
         {
            File::delete($oldfile);
         }
         $information->image = $image_name;
      }


        $information->title = $request->title;
        $information->content = $request->content;
        $information->slug = strtolower($request->slug);
        $information->order = $request->order;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_des = $request->meta_des;
        $information->meta_title = $request->meta_title;

        $information->save();
        
        Cache::forget('yoga_class_info_' . $information->slug);

        return redirect('admin/yoga-class')->with('msg', 'Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = YogaClass::find($id);
      $path = public_path().'/uploads/'.$information->image;
      if(File::exists($path))
      {
         File::delete($path);
      }
        Cache::forget('yoga_class_info_' . $information->slug);

        $information->delete();
        return redirect('admin/yoga-class')->with('msg', 'Information Deleted');
    }
}
