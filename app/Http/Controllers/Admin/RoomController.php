<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomAmenity;
use App\Models\RoomImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informations = Room::with('images', 'amenities')->orderBy('created_at', 'desc')->get();

        return view('admin.room.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.room.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'detailed_description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp',
            'bed_type' => 'required|string|max:255',
            'guests' => 'required|integer|min:1',
            'size' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:255',
            'amenity_icon.*' => 'required_with:amenity_title.*|string',
            'amenity_title.*' => 'required_with:amenity_icon.*|string',
        ]);

        $room = Room::create([
            'title' => $request->title,
            'description' => $request->description,
            'detailed_description' => $request->detailed_description,
            'price' => $request->price,
            'bed_type' => $request->bed_type,
            'guests' => $request->guests,
            'size' => $request->size,
            'badge' => $request->badge,
        ]);

        // Store images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $path = public_path('uploads');
                $filename = date('ymdhis').rand(1000, 9999).$file->getClientOriginalName();
                $file->move($path, $filename);

                RoomImage::create([
                    'room_id' => $room->id,
                    'image' => $filename,
                    'display_order' => $key,
                    'is_featured' => $key === 0,
                ]);
            }
        }

        // Store amenities
        if ($request->filled('amenity_title')) {
            foreach ($request->amenity_title as $key => $title) {
                if ($title && isset($request->amenity_icon[$key])) {
                    RoomAmenity::create([
                        'room_id' => $room->id,
                        'icon' => $request->amenity_icon[$key],
                        'title' => $title,
                    ]);
                }
            }
        }

        return redirect('admin/room')->with('msg', 'Room Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = Room::with('images', 'amenities')->find($id);

        return view('admin.room.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'detailed_description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'bed_type' => 'required|string|max:255',
            'guests' => 'required|integer|min:1',
            'size' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:255',
            'amenity_icon.*' => 'required_with:amenity_title.*|string',
            'amenity_title.*' => 'required_with:amenity_icon.*|string',
        ]);

        $room = Room::find($id);

        $room->update([
            'title' => $request->title,
            'description' => $request->description,
            'detailed_description' => $request->detailed_description,
            'price' => $request->price,
            'bed_type' => $request->bed_type,
            'guests' => $request->guests,
            'size' => $request->size,
            'badge' => $request->badge,
        ]);

        // Handle new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $path = public_path('uploads');
                $filename = date('ymdhis').rand(1000, 9999).$file->getClientOriginalName();
                $file->move($path, $filename);

                RoomImage::create([
                    'room_id' => $room->id,
                    'image' => $filename,
                    'display_order' => RoomImage::where('room_id', $room->id)->max('display_order') + 1,
                ]);
            }
        }

        // Update amenities
        RoomAmenity::where('room_id', $room->id)->delete();
        if ($request->filled('amenity_title')) {
            foreach ($request->amenity_title as $key => $title) {
                if ($title && isset($request->amenity_icon[$key])) {
                    RoomAmenity::create([
                        'room_id' => $room->id,
                        'icon' => $request->amenity_icon[$key],
                        'title' => $title,
                    ]);
                }
            }
        }

        return redirect('admin/room')->with('msg', 'Room Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::find($id);

        // Delete images
        foreach ($room->images as $image) {
            $path = public_path('uploads/'.$image->image);
            if (File::exists($path)) {
                File::delete($path);
            }
            $image->delete();
        }

        // Delete amenities
        RoomAmenity::where('room_id', $room->id)->delete();

        $room->delete();

        return redirect('admin/room')->with('msg', 'Room Deleted Successfully');
    }

    public function deleteImage(string $imageId)
    {
        $image = RoomImage::find($imageId);
        $path = public_path('uploads/'.$image->image);
        if (File::exists($path)) {
            File::delete($path);
        }
        $image->delete();

        return back()->with('msg', 'Image Deleted Successfully');
    }
}
