<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $informations = Offer::orderBy('created_at', 'desc')->get();

        return view('admin.offer.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.offer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:offers,title',
            'slug' => 'required|unique:offers,slug',
            'hero_title' => 'nullable|string|max:255',
            'content' => 'nullable',
            'hero_description' => 'nullable',
            'hero_stats' => 'nullable|array',
            'hero_stats.*.big_text' => 'nullable|string|max:100',
            'hero_stats.*.small_text' => 'nullable|string|max:100',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|integer|min:0|max:100',
            'image' => 'nullable|mimes:jpeg,png,jpg,webp',
            'end_date' => 'nullable|date|after:today',
            'is_active' => 'boolean',
            'features_list' => 'nullable|array',
            'features_list.*.text' => 'nullable|string',
            'learn_items' => 'nullable|array',
            'learn_items.*.icon' => 'nullable|string',
            'learn_items.*.title' => 'nullable|string',
            'learn_items.*.description' => 'nullable|string',
        ]);

        $information = new Offer;

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time().'_'.$file->getClientOriginalName();

            // Create directories if they don't exist
            $originalPath = public_path('uploads/offers/');
            $thumbnailPath = public_path('uploads/offers/thumbnails/');

            if (! File::exists($originalPath)) {
                File::makeDirectory($originalPath, 0755, true);
            }

            if (! File::exists($thumbnailPath)) {
                File::makeDirectory($thumbnailPath, 0755, true);
            }

            // Upload main image
            $image = Image::read($request->file('image'));
            $image->scale(height: 600);
            $image->save($originalPath.$image_name);

            // Upload thumbnail
            $thumbnail = Image::read($request->file('image'));
            $thumbnail->scale(width: 250);
            $thumbnail->save($thumbnailPath.$image_name);

            $information->image = $image_name;
        }

        // Generate slug if not provided
        if ($request->slug) {
            $information->slug = Str::slug($request->slug);
        } else {
            $information->slug = Str::slug($request->title);
        }

        $information->title = $request->title;
        $information->hero_title = $request->hero_title;
        $information->content = $request->content;
        $information->hero_description = $request->hero_description;
        $information->price = $request->price;
        $information->discount = $request->discount ?? 0;
        $information->end_date = $request->end_date;
        $information->is_active = $request->has('is_active') ? 1 : 0;

        // Process features list with static icons - remove empty entries
        $featuresList = $request->features_list ?? [];
        $features = array_map(function ($feature) {
            return [
                'icon' => 'fas fa-check-circle',
                'text' => $feature['text'] ?? '',
            ];
        }, $featuresList);
        $features = array_filter($features, function ($feature) {
            return ! empty($feature['text']);
        });
        $information->features_list = ! empty($features) ? array_values($features) : null;

        // Process learn items - remove empty entries
        $learnItemsData = $request->learn_items ?? [];
        $learnItems = array_filter($learnItemsData, function ($item) {
            return ! empty($item['title']) && ! empty($item['description']);
        });
        $information->learn_items = ! empty($learnItems) ? array_values($learnItems) : null;

        // Process hero stats - remove empty entries
        $heroStatsData = $request->hero_stats ?? [];
        $heroStats = array_map(function ($stat) {
            return [
                'big_text' => trim((string) ($stat['big_text'] ?? '')),
                'small_text' => trim((string) ($stat['small_text'] ?? '')),
            ];
        }, $heroStatsData);
        $heroStats = array_filter($heroStats, function ($stat) {
            return ! empty($stat['big_text']) || ! empty($stat['small_text']);
        });
        $information->hero_stats = ! empty($heroStats) ? array_values($heroStats) : null;

        $information->save();

        return redirect('admin/offer')->with('msg', 'Offer Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
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
     * @return Response
     */
    public function edit($id)
    {
        $information = Offer::findOrFail($id);

        return view('admin.offer.edit', compact('information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $information = Offer::findOrFail($id);

        $request->validate([
            'title' => 'required|unique:offers,title,'.$id,
            'slug' => 'required|unique:offers,slug,'.$id,
            'hero_title' => 'nullable|string|max:255',
            'content' => 'nullable',
            'hero_description' => 'nullable',
            'hero_stats' => 'nullable|array',
            'hero_stats.*.big_text' => 'nullable|string|max:100',
            'hero_stats.*.small_text' => 'nullable|string|max:100',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|integer|min:0|max:100',
            'image' => 'nullable|mimes:jpeg,png,jpg,webp',
            'end_date' => 'nullable|date',
            'is_active' => 'boolean',
            'features_list' => 'nullable|array',
            'features_list.*.text' => 'nullable|string',
            'learn_items' => 'nullable|array',
            'learn_items.*.icon' => 'nullable|string',
            'learn_items.*.title' => 'nullable|string',
            'learn_items.*.description' => 'nullable|string',
        ]);

        $oldfile = $information->image;

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time().'_'.$file->getClientOriginalName();

            // Create directories if they don't exist
            $originalPath = public_path('uploads/offers/');
            $thumbnailPath = public_path('uploads/offers/thumbnails/');

            if (! File::exists($originalPath)) {
                File::makeDirectory($originalPath, 0755, true);
            }

            if (! File::exists($thumbnailPath)) {
                File::makeDirectory($thumbnailPath, 0755, true);
            }

            // Upload main image
            $image = Image::read($request->file('image'));
            $image->scale(height: 600);
            $image->save($originalPath.$image_name);

            // Upload thumbnail
            $thumbnail = Image::read($request->file('image'));
            $thumbnail->scale(width: 250);
            $thumbnail->save($thumbnailPath.$image_name);

            $information->image = $image_name;

            // Delete old images
            if ($oldfile) {
                $oldMainImage = public_path('uploads/offers/').$oldfile;
                if (File::exists($oldMainImage)) {
                    File::delete($oldMainImage);
                }

                $oldThumbnail = public_path('uploads/offers/thumbnails/').$oldfile;
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
        $information->hero_title = $request->hero_title;
        $information->content = $request->content;
        $information->hero_description = $request->hero_description;
        $information->price = $request->price;
        $information->discount = $request->discount ?? 0;
        $information->end_date = $request->end_date;
        $information->is_active = $request->has('is_active') ? 1 : 0;

        // Process features list with static icons - remove empty entries
        $featuresList = $request->features_list ?? [];
        $features = array_map(function ($feature) {
            return [
                'icon' => 'fas fa-check-circle',
                'text' => $feature['text'] ?? '',
            ];
        }, $featuresList);
        $features = array_filter($features, function ($feature) {
            return ! empty($feature['text']);
        });
        $information->features_list = ! empty($features) ? array_values($features) : null;

        // Process learn items - remove empty entries
        $learnItemsData = $request->learn_items ?? [];
        $learnItems = array_filter($learnItemsData, function ($item) {
            return ! empty($item['title']) && ! empty($item['description']);
        });
        $information->learn_items = ! empty($learnItems) ? array_values($learnItems) : null;

        // Process hero stats - remove empty entries
        $heroStatsData = $request->hero_stats ?? [];
        $heroStats = array_map(function ($stat) {
            return [
                'big_text' => trim((string) ($stat['big_text'] ?? '')),
                'small_text' => trim((string) ($stat['small_text'] ?? '')),
            ];
        }, $heroStatsData);
        $heroStats = array_filter($heroStats, function ($stat) {
            return ! empty($stat['big_text']) || ! empty($stat['small_text']);
        });
        $information->hero_stats = ! empty($heroStats) ? array_values($heroStats) : null;

        $information->save();

        return redirect('admin/offer')->with('msg', 'Offer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $information = Offer::findOrFail($id);

        // Delete images if they exist
        if ($information->image) {
            $mainImagePath = public_path('uploads/offers/').$information->image;
            $thumbnailPath = public_path('uploads/offers/thumbnails/').$information->image;

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
