<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Offer;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = Offer::orderBy('created_at', 'desc')->get();
        return view('admin.offer.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.offer.create');
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
            'title' => 'required|unique:offers,title',
            'slug' => 'required|unique:offers,slug',
            'content' => 'nullable',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|integer|min:0|max:100',
            'image' => 'nullable|mimes:jpeg,png,jpg,webp',
            'end_date' => 'nullable|date|after:today',
            'is_active' => 'boolean'
        ]);

        $information = new Offer;

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time() . '_' . $file->getClientOriginalName();
            
            // Create directories if they don't exist
            $originalPath = public_path('uploads/offers/');
            $thumbnailPath = public_path('uploads/offers/thumbnails/');
            
            if (!File::exists($originalPath)) {
                File::makeDirectory($originalPath, 0755, true);
            }
            
            if (!File::exists($thumbnailPath)) {
                File::makeDirectory($thumbnailPath, 0755, true);
            }
            
            // Upload main image
            $image = Image::read($request->file('image'));
            $image->scale(height: 600);
            $image->save($originalPath . $image_name);
            
            // Upload thumbnail
            $thumbnail = Image::read($request->file('image'));
            $thumbnail->scale(width: 250);
            $thumbnail->save($thumbnailPath . $image_name);
            
            $information->image = $image_name;
        }

        // Generate slug if not provided
        if ($request->slug) {
            $information->slug = Str::slug($request->slug);
        } else {
            $information->slug = Str::slug($request->title);
        }

        $information->title = $request->title;
        $information->content = $request->content;
        $information->price = $request->price;
        $information->discount = $request->discount ?? 0;
        $information->end_date = $request->end_date;
        $information->is_active = $request->has('is_active') ? 1 : 0;

        $information->save();

        return redirect('admin/offer')->with('msg', 'Offer Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $information = Offer::findOrFail($id);
        return view('admin.offer.show', compact('information'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $information = Offer::findOrFail($id);
        return view('admin.offer.edit', compact('information'));
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
        $information = Offer::findOrFail($id);
        
        $request->validate([
            'title' => 'required|unique:offers,title,' . $id,
            'slug' => 'required|unique:offers,slug,' . $id,
            'content' => 'nullable',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|integer|min:0|max:100',
            'image' => 'nullable|mimes:jpeg,png,jpg,webp',
            'end_date' => 'nullable|date',
            'is_active' => 'boolean'
        ]);

        $oldfile = $information->image;

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time() . '_' . $file->getClientOriginalName();
            
            // Create directories if they don't exist
            $originalPath = public_path('uploads/offers/');
            $thumbnailPath = public_path('uploads/offers/thumbnails/');
            
            if (!File::exists($originalPath)) {
                File::makeDirectory($originalPath, 0755, true);
            }
            
            if (!File::exists($thumbnailPath)) {
                File::makeDirectory($thumbnailPath, 0755, true);
            }
            
            // Upload main image
            $image = Image::read($request->file('image'));
            $image->scale(height: 600);
            $image->save($originalPath . $image_name);
            
            // Upload thumbnail
            $thumbnail = Image::read($request->file('image'));
            $thumbnail->scale(width: 250);
            $thumbnail->save($thumbnailPath . $image_name);
            
            $information->image = $image_name;

            // Delete old images
            if ($oldfile) {
                $oldMainImage = public_path('uploads/offers/') . $oldfile;
                if (File::exists($oldMainImage)) {
                    File::delete($oldMainImage);
                }

                $oldThumbnail = public_path('uploads/offers/thumbnails/') . $oldfile;
                if (File::exists($oldThumbnail)) {
                    File::delete($oldThumbnail);
                }
            }
        }

        // Update slug
        if ($request->slug) {
            $information->slug = Str::slug($request->slug);
        } else {
            $information->slug = Str::slug($request->title);
        }

        $information->title = $request->title;
        $information->content = $request->content;
        $information->price = $request->price;
        $information->discount = $request->discount ?? 0;
        $information->end_date = $request->end_date;
        $information->is_active = $request->has('is_active') ? 1 : 0;

        $information->save();

        return redirect('admin/offer')->with('msg', 'Offer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = Offer::findOrFail($id);
        
        // Delete images if they exist
        if ($information->image) {
            $mainImagePath = public_path('uploads/offers/') . $information->image;
            $thumbnailPath = public_path('uploads/offers/thumbnails/') . $information->image;

            if (File::exists($mainImagePath)) {
                File::delete($mainImagePath);
            }

            if (File::exists($thumbnailPath)) {
                File::delete($thumbnailPath);
            }
        }

        $information->delete();

        return redirect('admin/offer')->with('msg', 'Offer Deleted Successfully');
    }
}