<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CurriculamList;
use App\Models\CurriculamCategory;

class CurriculamListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = CurriculamList::paginate(20);
        return view('admin.curriculam-list.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CurriculamCategory::pluck('name', 'id')->toArray();
        return view('admin.curriculam-list.create', compact('categories'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $information = new CurriculamList;
        $request->validate([
           'title' => 'required',
           'content' => 'required',

        ]);

        $information->category_id = $request->category_id;
        $information->title = $request->title;
        $information->content = $request->content;
        $information->order = $request->order;
        $information->save();
        return redirect('admin/curriculam-list')->with('msg', 'Information Added');
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
        $information = CurriculamList::find($id);
        $categories = CurriculamCategory::pluck('name', 'id')->toArray();
        return view('admin.curriculam-list.edit', compact('categories', 'information'));
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
        $information = CurriculamList::find($id);
        $request->validate([
           'title' => 'required',
           'content' => 'required',

        ]);

        $information->category_id = $request->category_id;
        $information->title = $request->title;
        $information->content = $request->content;
        $information->order = $request->order;
        $information->save();
        return redirect('admin/curriculam-list')->with('msg', 'Information Updated');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = CurriculamList::find($id);

        $information->delete();

        return redirect('admin/curriculam-list')->with('msg', 'Information Deleted');
        
    }
}
