<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FeeList;
use App\Models\FeeCategory;
class FeeListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = FeeList::select('fee_lists.*','fee_categories.title as fee_category')
            ->leftjoin('fee_categories','fee_categories.id','=','fee_lists.category_id')
            ->orderBy('id','desc')
            ->paginate(25);
        return view('admin.fee-list.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = FeeCategory::pluck('title', 'id')->toArray();
        return view('admin.fee-list.create', compact('categories'));
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
            'from' => 'required',
            'to' => 'required',
            'place' => 'required',
            'private_room' => 'required',
            'share_room' => 'required',

        ]);
        $information = new FeeList;
        $information->from = $request->from;
        $information->to = $request->to;
        $information->place = $request->place;
        $information->share_room = $request->share_room;
        $information->private_room = $request->private_room;
        $information->triple_room = $request->triple_room;
        $information->order = $request->order;
        $information->category_id = $request->category_id;
        $information->save();
        return redirect('admin/fee-list')->with('msg', 'Information Added');
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
        $information = FeeList::find($id);
         $categories = FeeCategory::pluck('title', 'id')->toArray();
        return view('admin.fee-list.edit', compact('categories', 'information'));
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
            'from' => 'required',
            'to' => 'required',
            'place' => 'required',
            'private_room' => 'required',
            'share_room' => 'required',

        ]);
        $information = FeeList::find($id);
        $information->from = $request->from;
        $information->to = $request->to;
        $information->place = $request->place;
        $information->share_room = $request->share_room;
        $information->private_room = $request->private_room;
        $information->triple_room = $request->triple_room;
        $information->order = $request->order;
        $information->category_id = $request->category_id;
        $information->save();
        return redirect('admin/fee-list')->with('msg', 'Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = FeeList::find($id);
         $information->delete();

        return redirect('admin/fee-list')->with('msg', 'Information Deleted');

    }
}
