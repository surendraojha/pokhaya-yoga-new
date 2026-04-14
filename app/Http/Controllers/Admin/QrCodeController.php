<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Image;
use App\Models\Qr;
use Illuminate\Support\Facades\File;

class QrCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
         $informations = Qr::all();
        return view('admin.qr-code.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.qr-code.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $information = new Qr;
        $request->validate([
           'title' => 'required',
           'url' => 'required',
        ]);
        
        $information->title = $request->title;
        $information->url = $request->url;
        $path = public_path() . 'uploads/qr/' . $request->title.'_'.time().'.png';      
        $qr= QrCode::format('png')->size(300)->generate($request->url, $path);
       
        $information->image = basename($path);       
        $information->save();
        return redirect('admin/qr')->with('msg', 'Qr Code Created Successfully');
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
        $information = Qr::find($id);
        return view('admin.qr-code.edit', compact('information'));
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
       $information = Qr::find($id);
        $request->validate([
           'title' => 'required',
           'url' => 'required',
           'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $information->title = $request->title;
        $information->url = $request->url;

         $oldfile = $information->image;
               
        if($oldfile != ''){                
            $oldfile = public_path(). 'uploads/qr/'.$oldfile;
            if(File::exists($oldfile))
            {
                File::delete($oldfile);
            }
            $path = public_path() . 'uploads/qr/' . $request->title.'_'.time().'.png';      
            $qr= QrCode::format('png')->size(300)->generate($request->url, $path);
            $information->image = basename($path);
        }            
            
        $information->save();
        return redirect('admin/qr')->with('msg', 'Qr Code Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = Qr::find($id);
        
        $path = public_path() . 'uploads/qr/' .$information->image;
         
        if(File::exists($path))
        {            
           File::delete($path);
        }
        
        $information->delete();
        return redirect('admin/qr')->with('msg', 'Qr Code Deleted Successfully');
    }

     public function DownloadQR($qr)
    {

        $file_path = public_path() . 'uploads/qr/' .$qr;

         $headers = [
                'Content-Type' => 'image/png',
            ];
        return response()->download($file_path, $qr, $headers);
    }
}
