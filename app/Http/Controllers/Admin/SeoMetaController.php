<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SeoMeta;
use Symfony\Contracts\Service\Attribute\Required;

class SeoMetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = SeoMeta::latest()->get();
        return view('admin.seo-meta.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seo-meta.create');
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
            'name' => 'required|unique:seo_metas',
            'auth' => 'required',
            'meta_keyword' => 'required',
            'meta_des' => 'required',
            'meta_title'=>'required',
        ]);

        $information = new SeoMeta;
        $information->name = $request->name;
        $information->title = $request->title;
        $information->auth = $request->auth;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_des = $request->meta_des;
        $information->meta_title = $request->meta_title;

        $information->save();
        return redirect('admin/seo-meta')->with('msg', 'Information Added');
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
        $information = SeoMeta::find($id);
        return view('admin.seo-meta.edit', compact('information'));
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
            'name' => 'required',
            'auth' => 'required',
            'meta_keyword' => 'required',
            'meta_des' => 'required',
            'meta_title' => 'required',

        ]);

        $information = SeoMeta::find($id);
        $information->name = $request->name;
        $information->title = $request->title;
        $information->auth = $request->auth;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_des = $request->meta_des;
        $information->meta_title = $request->meta_title;

        $information->save();
        return redirect('admin/seo-meta')->with('msg', 'Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = SeoMeta::find($id);

        $information->deleted();

        return redirect('admin/seo-meta')->with('msg', 'Information Deleted');

    }
}
