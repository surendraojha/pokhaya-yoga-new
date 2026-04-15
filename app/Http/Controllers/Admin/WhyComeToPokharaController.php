<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyComeToPokhara;

class WhyComeToPokharaController extends Controller
{
    public function index()
    {
        $information = WhyComeToPokhara::first();
        return view('admin.why-come-to-pokhara.index', compact('information'));
    }

    public function create()
    {
        return view('admin.why-come-to-pokhara.create');
    }

    public function store(Request $request)
    {
        $information = new WhyComeToPokhara;
        $information->title = $request->title;
        $information->content = $request->content;
        $information->save();

        return redirect('admin/why-come-to-pokhara')->with('msg', 'Information Added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $information = WhyComeToPokhara::find($id);
        return view('admin.why-come-to-pokhara.edit', compact('information'));
    }

    public function update(Request $request, $id)
    {
        $information = WhyComeToPokhara::find($id);
        $information->title = $request->title;
        $information->content = $request->content;
        $information->save();

        return redirect('admin/why-come-to-pokhara')->with('msg', 'Information Updated');
    }

    public function destroy($id)
    {
        $information = WhyComeToPokhara::find($id);
        $information->delete();

        return redirect('admin/why-come-to-pokhara')->with('msg', 'Information Deleted');
    }
}