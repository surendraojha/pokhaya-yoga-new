<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccommodationAndFood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AccommodationAndFoodController extends Controller
{
    // Public frontend view (if you need separate frontend, adjust route)
    public function index()
    {
        $items = AccommodationAndFood::active()->get();
        return view('admin.accommodation-and-foods.index', compact('items'));
    }

    public function create()
    {
        return view('admin.accommodation-and-foods.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image',
            'description' => 'required|string',
            'link' => 'nullable|url',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        // Handle image upload to public/uploads/accommodation-and-foods
        $imageName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('uploads/accommodation-and-foods');

            // Create directory if not exists
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $imageName);
        }

        AccommodationAndFood::create([
            'title' => $validated['title'],
            'image' => 'uploads/accommodation-and-foods/' . $imageName,
            'description' => $validated['description'],
            'link' => $validated['link'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('accommodation-and-foods.index')
            ->with('success', 'Item created successfully.');
    }

    public function edit(AccommodationAndFood $accommodationAndFood)
    {
        return view('admin.accommodation-and-foods.edit', compact('accommodationAndFood'));
    }

    public function update(Request $request, AccommodationAndFood $accommodationAndFood)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image',
            'description' => 'required|string',
            'link' => 'nullable|url',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $data = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'link' => $validated['link'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ];

        // Handle new image upload
        if ($request->hasFile('image')) {
            // Delete old image from public directory
            if ($accommodationAndFood->image && File::exists(public_path($accommodationAndFood->image))) {
                File::delete(public_path($accommodationAndFood->image));
            }

            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('uploads/accommodation-and-foods');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $imageName);
            $data['image'] = 'uploads/accommodation-and-foods/' . $imageName;
        }

        $accommodationAndFood->update($data);

        return redirect()->route('accommodation-and-foods.index')
            ->with('success', 'Item updated successfully.');
    }

    public function destroy(AccommodationAndFood $accommodationAndFood)
    {
        // Delete image file from public directory
        if ($accommodationAndFood->image && File::exists(public_path($accommodationAndFood->image))) {
            File::delete(public_path($accommodationAndFood->image));
        }

        $accommodationAndFood->delete();

        return redirect()->route('accommodation-and-foods.index')
            ->with('success', 'Item deleted successfully.');
    }
}