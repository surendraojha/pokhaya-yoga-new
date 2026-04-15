<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommunitySupport;
use Illuminate\Support\Facades\File;

class CommunitySupportController extends Controller
{
    public function index()
    {
        $supports = CommunitySupport::latest()->get();
        return view('admin.community_support.index', compact('supports'));
    }

    public function create()
    {
        return view('admin.community_support.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'stats' => 'nullable|array',
            'image' => 'nullable|image'
        ]);

        $data = new CommunitySupport();

        $data->title = $request->title ?? 'Community Supports';
        $data->description = $request->description;

        $data->stats = $request->stats ?? [];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/community'), $filename);
            $data->image = $filename;
        }

        $data->save();

        return redirect()->route('community_support.index')
            ->with('success', 'Created successfully');
    }

    public function edit($id)
    {
        $information = CommunitySupport::findOrFail($id);
        return view('admin.community_support.edit', compact('information'));
    }

    public function update(Request $request, $id)
    {
        $data = CommunitySupport::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'stats' => 'nullable|array',
            'image' => 'nullable|image'
        ]);

        $data->title = $request->title ?? 'Community Supports';
        $data->description = $request->description;

        $data->stats = $request->stats ?? [];

        if ($request->hasFile('image')) {
            // Delete old image if exists
            $oldPath = public_path('uploads/community/') . $data->image;
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            // Save new image
            $file = $request->file('image');
            $filename = date('ymdhis') . $file->getClientOriginalName();
            $file->move(public_path('uploads/community/'), $filename);
            $data->image = $filename;
        }

        $data->save();

        return redirect()->route('community_support.index')
            ->with('success', 'Updated successfully');
    }

    public function destroy($id)
    {
        $information = CommunitySupport::find($id);
        $path = public_path('uploads/community/') . $information->image;
        if (File::exists($path)) {
            File::delete($path);
        }

        $information->delete();
        return redirect()->back()
            ->with('success', 'Deleted successfully');
    }
}
