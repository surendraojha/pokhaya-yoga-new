<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = Faq::paginate(15);

        return view('admin.faq.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $information = new Faq;
        // $this->validate($request, [
        //     'title' => 'required',
        //     'content' => 'required',

        // ]);

        $faqs=[];
            if($request->faq){
                foreach ($request->faq as  $faqItem) {
                    $faqs[]=[
                        'question'=>$faqItem['question'],
                        'answer'=> $faqItem['answer'],
                    ];
                }
                $information->faq_content=$faqs;
            }
            else{
                $information->faq_content=null;
            }

        $information->page_slug = $request->slug;
        // dd($information);
        $information->save();
        return redirect('admin/faq')->with('msg', 'Information Added');
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
        $information = Faq::find($id);
        return view('admin.faq.edit', compact('information'));
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
        $information = Faq::find($id);
        // $this->validate($request, [
        //     'title' => 'required',
        //     'content' => 'required',

        // ]);

        $faqs=[];
        if($request->faq){
            foreach ($request->faq as  $faqItem) {
                $faqs[]=[
                    'question'=>$faqItem['question'],
                    'answer'=> $faqItem['answer'],
                ];
            }
            $information->faq_content=$faqs;
        }
        else{
            $information->faq_content=null;
        }


        $information->page_slug = $request->slug;
        

        $information->save();
        return redirect('admin/faq')->with('msg', 'Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = Faq::find($id);

        $information->delete();

        return redirect('admin/faq')->with('msg', 'Information Deleted');
    }
}
