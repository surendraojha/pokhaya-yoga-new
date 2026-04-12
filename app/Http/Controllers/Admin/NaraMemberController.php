<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NaraMember;

class NaraMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = \App\NaraMember::orderBy('created_at', 'desc')->get();
        return view('admin.nara-member.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nara-member.create');
        
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

            'name_of_company' => 'required',
            'address' => 'required',
            
        ]);
        $information = new \App\NaraMember;
        $information->name_of_company = $request->name_of_company;
        $information->address = $request->address;
        $information->M_d = $request->M_d;
        $information->email = $request->email;
        $information->website = $request->website;
        $information->save();
        return redirect('admin/nara-member')->with('msg', 'Information Added');
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
        $information = \App\NaraMember::find($id);
        return view('admin.nara-member.edit', compact('information'));
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

            'name_of_company' => 'required',
            'address' => 'required',
            
        ]);
        $information = \App\NaraMember::find($id);
        $information->name_of_company = $request->name_of_company;
        $information->address = $request->address;
        $information->M_d = $request->M_d;
        $information->email = $request->email;
        $information->website = $request->website;
        $information->save();
        return redirect('admin/nara-member')->with('msg', 'Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $information = \App\NaraMember::find($id);
        $information->delete();
        return redirect('admin/nara-member')->with('msg', 'Information Deleted');
    }
}
