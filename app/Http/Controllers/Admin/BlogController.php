<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use App\BlogUsers;
use App\Helpers\Helper;
use File;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Image;
use Illuminate\Support\Facades\Cache;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $informations = \App\Blog::orderBy('created_at', 'desc')->paginate(50);

        return view('admin.blog.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogUsers = \App\BlogUsers::pluck('name', 'id');
        return view('admin.blog.create',compact('blogUsers'));
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
           'content' => 'required',
           'image'=>'mimes:jpeg,png,jpg,webp'


        ]);

        $information = new Blog;
        $title = $request->title;
        $slug = str_slug($title, '-');


       $information->image = '';


        if($request->hasFile('image'))
        {
         $file = $request->file('image');

        $image_name = Helper::uploadImage($file, public_path() . 'uploads/blogs/', env("BANNER_WIDTH"), env("BANNER_HEIGHT"));
        $information->image = $image_name;

         // upload thumbnail
         $originalPath = public_path() . 'uploads/blogs/thumbnails/';

        
            Helper::uploadImage($file, public_path() . 'uploads/blogs/thumbnails/', env("THUMBNAIL_WIDTH"), env("THUMBNAIL_HEIGHT"),$image_name);

        //  $file->move($path, $filename);
        //  $information->image = $filename;
      }
        $information->title = $request->title;
        $information->content = $request->content;
        $slug=Helper::slug($request->slug);
        $information->slug =$slug;

        $information->order = $request->order;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_des = $request->meta_des;
        $information->meta_title = $request->meta_title;
        $information->blog_user_id = $request->blog_user_id;

        $information->save();
        return redirect('admin/blog')->with('msg', 'Information Added');
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
        $information = Blog::find($id);
        $blogUsers = \App\BlogUsers::pluck('name', 'id');

        return view('admin.blog.edit', compact('information','blogUsers'));
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
            'content' => 'required',
            'image' => 'mimes:jpeg,png,jpg,webp'


        ]);
        $title = $request->title;
        $slug = str_slug($title, '-');

        $information = Blog::find($id);
        $oldfile = $information->image;
        //file upload
        $information->image = $oldfile;
        
        if ($request->hasFile('image')) {
            
            
            $oldthumbnails = public_path() . 'uploads/blogs/thumbnails/' . $oldfile;
            if (File::exists($oldthumbnails)) {
                File::delete($oldthumbnails);
            }

            $oldfile = public_path() . 'uploads/blogs/' . $oldfile;
            if (File::exists($oldfile)) {
                File::delete($oldfile);
            }
            //
            if (File::exists($oldfile)) {
                File::delete($oldfile);
            }
            
            $file = $request->file('image');
            //  $path = public_path().'uploads/';
            $filename = date('ymdhis') . $file->getClientOriginalName();
            //  $file->move($path, $filename);
            $oldfile = public_path() . 'uploads/blogs' . $oldfile;

            //thumbnail
            $image_name = Helper::uploadImage($file, public_path() . 'uploads/blogs/', env("BANNER_WIDTH"), env("BANNER_HEIGHT"));

            $information->image = $image_name;

            // upload thumbnail
            $originalPath = public_path() . 'uploads/blogs/thumbnails/';

            Helper::uploadImage($file, public_path() . 'uploads/blogs/thumbnails/', env("THUMBNAIL_WIDTH"), env("THUMBNAIL_HEIGHT"),$image_name);


            //  $information->image = $filename;
        }
        $information->title = $request->title;
        $information->content = $request->content;
        $slug = Helper::slug($request->slug);
        $information->slug = $slug;

        $information->order = $request->order;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_des = $request->meta_des;
        $information->meta_title = $request->meta_title;
        $information->blog_user_id = $request->blog_user_id;
        $information->save();

        Cache::forget('blog_cache' . $information->slug);

        return redirect('admin/blog')->with('msg', 'Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $information = Blog::find($id);
      $path = public_path().'uploads/'.$information->image;
      if(File::exists($path))
      {
         File::delete($path);
      }
        Cache::forget('blog_cache' . $information->slug);

        $information->delete();
        return redirect('admin/blog')->with('msg', 'Information Deleted');

    }


    // upload texteditor image
 public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $destinationPath = 'uploads' . DIRECTORY_SEPARATOR .  'attached-images';

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 755, true);
            }
            $filename = Helper::uploadImage($file, public_path() . 'uploads/attached-images/', env("BANNER_WIDTH"), env("BANNER_HEIGHT"));

            // Save directly to public/uploads/blog_images/








            return response()->json([
                'url' => asset('uploads/attached-images/' . $filename),
            ]);
        }


        return response()->json(['message' => 'No image uploaded'], 400);
    }




}
