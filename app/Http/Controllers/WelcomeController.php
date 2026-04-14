<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Welcome;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class WelcomeController extends Controller
{
    public function index()
    {
        $informations = Welcome::all();
        return view('admin.welcome.index', compact('informations'));
    }
    public function create()
    {
        return view('admin.welcome.create');
    }
    public function edit($id)
    {
        $information = Welcome::find($id);
        return view('admin.welcome.edit', compact('information'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'video' => 'nullable|string',
        ]);

        $data = $request->only(['title', 'content', 'video']);

        Welcome::create($data);

        return redirect('admin/welcome')->with('msg', 'Information Added');
    }

    public function update(Request $request, $id)
    {
        $welcome = Welcome::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'video' => 'nullable|string',
        ]);

        $data = $request->only(['title', 'content', 'video']);

        $welcome->update($data);

        return redirect('admin/welcome')->with('msg', 'Information Updated');
    }

    public function destroy($id)
    {
        $information = Welcome::find($id);

        $information->delete();
        return redirect('admin/welcome')->with('msg', 'Information Deleted');
    }

}